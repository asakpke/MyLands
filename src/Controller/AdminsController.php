<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Mailer\Email;

class AdminsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Admins',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'pass'
                    ],
                    'finder' => 'auth',
                    // 'finder' => 'authAdmin',
                ]
            ],
            'loginAction' => [
                'prefix' => false,
                'controller' => 'Admins',
                'action' => 'login',
            ],
            // 'redirectUrl' => [
            //     'prefix' => true,
            //     'controller' => 'Lands',
            //     'action' => 'index',
            // ],
            'loginRedirect' => array(
                'prefix' => 'admin',
                'controller' => 'Lands',
                'action' => 'index',
            ),
             //use isAuthorized in Controllers
            // 'authorize' => ['Controller'],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer(),
            // 'storage' => 'Session',
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Admin'
            ]
            // 'sessionKey'=>'Auth.Admin',
        ]);

        $this->Auth->allow([
            'login',
            'logout',
            'signup',
            'verifyEmail',
        ]);
    } // initialize()

    public function login()
    {
        if ($this->request->is('post')) {
            $admin = $this->Auth->identify();

            if ($admin) {
                $this->Auth->setUser($admin);
                return $this->redirect($this->Auth->redirectUrl());
            }
            
            $this->Flash->error('Your username or password is incorrect.');
        }
    } // login()

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    } // logout()

    public function signup()
    {
        $this->layout = 'bs337';
        $admin = $this->Admins->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['status'] = 'Disabled';
            $data['is_verified'] = 0;
            $data['balance'] = 0;

            // sheikh salar start----------------------------------
            $data['subdomain'] = strtolower($data['subdomain']);
            
            $pos = strrpos($data['subdomain'], '.mylands.pk');

            if ($pos === false) {
              
              $data['subdomain']= strtolower($data['subdomain']).'.mylands.pk';
            }
            // sheikh salar end------------------------------------

            $data['email_verification_hash'] = md5(uniqid(rand(), true));
            $hasher = new DefaultPasswordHasher();
            $data['pass'] = $hasher->hash($data['pass']);
            $admin = $this->Admins->patchEntity($admin, $data);

            if ($this->Admins->save($admin)) {
                // SAS - Send admin email verification mail
                $activation_url = 'http://'.$data['subdomain'].'/Admins/verifyEmail/'.$data['email_verification_hash'];
                $email = new Email('default');
                $email->from(['aamir@mylands.pk' => 'Aamir Shahzad'])
                    ->template('default', 'default')
                    ->emailFormat('both')
                    // ->emailFormat('html')
                    ->to($data['email'])
                    ->subject($data['subdomain'].' Activation Link')
                    ->send("<a href=\"{$activation_url}\">{$activation_url}</a>");
                // // EAS - Send admin email verification mail

                // sheikh salar start LandType

                $this->loadModel('LandTypes');
                $LandTypes = $this->LandTypes->find('all')
                    ->where([
                        'admin_id is null',
                    ])
                ;

                $saveLandTypeV = 0;
                $saveLandType = array();
                
                foreach ($LandTypes as $LandType) {
                    $saveLandType[$saveLandTypeV]['name'] = $LandType->name;
                    $saveLandType[$saveLandTypeV]['remarks'] = $LandType->remarks;
                    $saveLandType[$saveLandTypeV]['admin_id'] = $admin->id;
                    $saveLandTypeV++;
                }

                if (!empty($saveLandType)) {
                    $LandTypes = $this->LandTypes->newEntities($saveLandType);
                    $this->LandTypes->saveMany($LandTypes);
                }

                // // sheikh salar end LandType

                // // LandStatuses start
                $this->loadModel('LandStatuses');
                $LandStatuses = $this->LandStatuses->find('all')
                    ->where([
                        'admin_id is null',
                    ])
                ;

                $saveLandStatusV = 0;
                $saveLandStatus = array();
                
                foreach ($LandStatuses as $LandStatus) {
                    $saveLandStatus[$saveLandStatusV]['name'] = $LandStatus->name;
                    $saveLandStatus[$saveLandStatusV]['remarks'] = $LandStatus->remarks;
                    $saveLandStatus[$saveLandStatusV]['admin_id'] = $admin->id;
                    $saveLandStatusV++;
                }

                if (!empty($saveLandStatus)) {
                    $LandStatuses = $this->LandStatuses->newEntities($saveLandStatus);
                    $this->LandStatuses->saveMany($LandStatuses);
                }

                // LandStatuses end----------------------------------

                // pageElement start---------------------------------

                $this->loadModel('PageElements');
                $pageElements = $this->PageElements->find('all')
                    ->where([
                        'admin_id is null',
                    ])
                ;

                // $PEData['type'] = 'Logo Image Url';
                // $PEData['content'] = 'This is Logo Image Url';
                // $PEData['admin_id'] = $admin->id;
                
                foreach ($pageElements as $pageElement) {
                    $PEData['type'] = $pageElement->type;
                    $PEData['content'] = $pageElement->content;
                    $PEData['admin_id'] = $admin->id;

                    $pageElement = $this->PageElements->newEntity();
                    $pageElement = $this->PageElements->patchEntity($pageElement,$PEData);
                    $this->PageElements->save($pageElement);

                }

                // pageElement end


                $this->Flash->success(__('Please check your email/spam & open verification link in the web browser.'));
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            } // if ($this->Admins->save($admin))

            $this->Flash->error(__('The admin could not be saved. Please, try later.'));
        } // if ($this->request->is('post'))

        $this->set(compact('admin'));
    } // signup()

    public function verifyEmail($hash)
    {
        $this->layout = 'bs337';
        $admin = $this->Admins->findByEmailVerificationHash($hash)->first();

        if (!empty($admin)) {
            $admin->status = 'Active';
            $admin->email_verification_hash = '';

            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('Your account is activated, login now.'));
            }
            else {
                $this->Flash->error(__('Error in saving record. Please try later or contact administrator.'));
            }

            $this->setAction('login');
        } // if (!empty($admin))
    } // verifyEmail($hash)
} // AdminsController
