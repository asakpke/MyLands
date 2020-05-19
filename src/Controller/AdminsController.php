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
            'forgotPassword',
            // 'resetPassword',
            'forgotPassword2',
            // 'profile',
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


    public function forgotPassword()
    {
        if ($this->request->is('post')) 
        {
            if (!empty($this->request->data))
            {
                $email = $this->request->data['email'];
                // $admin = $this->Admins->findByEmail($email)->first();
                $admin = $this->Admins->findBySubdomainAndEmail($_SERVER['HTTP_HOST'],$email)->first();
                // dd($admin);

                if (!empty($admin))
                {
                    // $password = sha1(Text::uuid());

                    // $password_token = Security::hash($password, 'sha256', true);

                    // $hashval = sha1($admin->name . rand(O, 100));

                    // $admin->email_verification_hash = $password_token;
                    // $admin->email_verification_hash = md5(uniqid(rand(), true));
                    $admin->forgot_password_hash = md5(uniqid(rand(), true));
                    // $admin->hashval = $hashval;

                    // $reset_token_link = Router::url(['controller' => 'Admins', 'action' => 'resetPassword'], TRUE) . '/' . $password_token . '#' . $hashval;

                    // $emaildata = [$admin->email, $reset_token_link];
                    // $this->getMailer('SendEmail')->send('forgotPasswordEmail', [$emaildata]);

                    $this->Admins->save($admin);
                    $this->Flash->success('Please click on password reset link, sent in your email address to reset password. Do check spam folder if you do not find it in inbox.');

                    // SAS - Send forget password mail
                    // $verification_url = 'http://'.$admin->subdomain.'/Admins/resetPassword/'.$admin->email_verification_hash;
                    // $verification_url = 'http://'.$admin->subdomain.'/Admins/resetPassword/'.$admin->forgot_password_hash;
                    $verification_url = 'http://'.$admin->subdomain.'/Admins/forgotPassword2/'.$admin->forgot_password_hash;
                    // dd($verification_url);
                    $email = new Email('default');
                    $email->from(['aamir@mylands.pk' => 'Aamir Shahzad'])
                        ->template('default', 'default')
                        ->emailFormat('both')
                        // ->emailFormat('html')
                        ->to($admin->email)
                        ->subject($admin->subdomain.' Reset Password Link')
                        ->send("<a href=\"{$verification_url}\">{$verification_url}</a>");
                    // EAS - Send forget password mail
                }
                else
                {
                    $this->Flash->error('Sorry! Email address is not available here.');
                }
            }
        }
    } // forgotPassword()-------------------------------

    // public function resetPassword($token = null) {
    public function forgotPassword2($token = null) {
        if (!empty($token)) {

            // $admin = $this->Admins->findByPasswordResetToken($token)->first();
            $admin = $this->Admins->findByForgotPasswordHash($token)->first();
            // dd($admin);

            if ($admin) {
                // if (!empty($this->request->data)) {
                //     $admin = $this->Admins->patchEntity($admin, [
                //         'password' => $this->request->data['new_password'],
                //         'new_password' => $this->request->data['new_password'],
                //         'confirm_password' => $this->request->data['confirm_password']
                //             ], ['validate' => 'password']
                //     );

                //     $hashval_new = sha1($admin->username . rand(O, 100));
                //     $admin->email_verification_hash = $hashval_new;

                //     if ($this->Admins->save($admin)) {
                //         $this->Flash->success('Your password has been changed successfully');
                //         $emaildata = ['name' => $admin->first_name, 'email' => $admin->email];
                //         $this->getMailer('SendEmail')->send('changePasswordEmail', [$emaildata]); //Send Email functionality

                //         $this->redirect(['action' => 'view']);
                //     } else {
                //         $this->Flash->error('Error changing password. Please try again!');
                //     }
                // }

                // SAS - Auto login & send to change password page
                // Set null ForgotPasswordHash
                $admin->forgot_password_hash = null;
                $this->Admins->save($admin);

                $this->Auth->setUser($admin);
                // return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect('/admin/Admins/profile');
                // EAS - Auto login & send to change password page
            }
            else {
                $this->Flash->error('Sorry your password token has been expired.');
            }
        }
        else {
            $this->Flash->error('Error loading password reset.');
        }

        return $this->redirect('/admins/forgot-password');
        // $this->set(compact('admin'));
        // $this->set('_serialize', ['admin']);
    // } // reset password
    } // forgotPassword2()

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    } // logout()

    public function signup()
    {
        $this->layout = 'bs337';
        $admin = $this->Admins->newEntity();
        $this->set(compact('admin'));

        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['status'] = 'Disabled';
            $data['is_verified'] = 0;
            $data['balance'] = 0;
            $data['subdomain'] = strtolower($data['subdomain']);

            if ($data['subdomain'] == 'www') {
                $this->Flash->error(__('Please try another Subdomain, www is not allowed as Subdomain.'));
                // return $this->redirect(['controller' => 'admins', 'action' => 'signup']);
                return;
            }

            $pos = strrpos($data['subdomain'], '.mylands.pk');

            if ($pos === false) {              
                // $data['subdomain']= strtolower($data['subdomain']).'.mylands.pk';
                // $data['subdomain']= strtolower($data['subdomain']).'.'.$_SERVER['HTTP_HOST'];

                if ($_SERVER['HTTP_HOST'] == 'www.mylands.pk') {
                    $data['subdomain']= strtolower($data['subdomain']).'.mylands.pk';
                }
                else {
                    $data['subdomain']= strtolower($data['subdomain']).'.'.$_SERVER['HTTP_HOST'];
                }
            }

            $data['email_verification_hash'] = md5(uniqid(rand(), true));
            $hasher = new DefaultPasswordHasher();
            $data['pass'] = $hasher->hash($data['pass']);
            $admin = $this->Admins->patchEntity($admin, $data);

            if ($this->Admins->save($admin)) {
                // SAS - Send admin email verification mail
                // $activation_url = 'http://'.$data['subdomain'].'/Admins/verifyEmail/'.$data['email_verification_hash'];
                // $email = new Email('default');
                // $email->from(['aamir@mylands.pk' => 'Aamir Shahzad'])
                //     ->template('default', 'default')
                //     ->emailFormat('both')
                //     // ->emailFormat('html')
                //     ->to($data['email'])
                //     ->subject($data['subdomain'].' Activation Link')
                //     ->send("<a href=\"{$activation_url}\">{$activation_url}</a>");
                // EAS - Send admin email verification mail

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

                // START Fahad - Added CostCats default values for current admin
                $this->loadModel('CostCats');
                $cost_cats = $this->CostCats->find('all')
                    ->where([
                        'admin_id is null',
                ]);

                foreach ($cost_cats as $CostCats) {
                    $costCats['name']= $CostCats->name;
                    // $costCats['name']= 'hashir14';
                    $costCats['remarks']= $CostCats->remarks;
                    // $costCats['remarks']= 'this is hashir14';
                    $costCats['admin_id']= $admin->id;
                    $costCat = $this->CostCats->newEntity();
                    $costCat = $this->CostCats->patchEntity($costCat,$costCats);
                    $this->CostCats->save($costCat);
                }
                // ENDED Fahad -  - Added CostCats default values for current admin                

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
                // EAS - Send admin email verification mail

                $this->Flash->success(__('Please check your email/spam & open verification link in the web browser.'));
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            } // if ($this->Admins->save($admin))

            $this->Flash->error(__('The admin could not be saved. Please, try later.'));
        } // if ($this->request->is('post'))

        // $this->set(compact('admin'));
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