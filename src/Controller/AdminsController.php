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
    }

    public function login()
    {
        // echo (new DefaultPasswordHasher)->hash('welcome');
        if ($this->request->is('post')) {
            // $hasher = new DefaultPasswordHasher();
            // echo $hasher->hash('abc').'<br>';
            // echo $hasher->hash('abc').'<br>';
            // echo $hasher->hash('abc').'<br>';
            $admin = $this->Auth->identify();
            // echo '$admin = ';
            // pr($admin);
            // exit;

            if ($admin) {
                $this->Auth->setUser($admin);
                return $this->redirect($this->Auth->redirectUrl());
                // echo 'You are logged in';
                // exit;
            }
            
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    public function signup()
    {

        $this->layout = 'bs337';
        $admin = $this->Admins->newEntity();
        if ($this->request->is('post')) {
            // dd($this->request->getData());
            // pr($this->request->getData());
            // die('$this->request->getData()');

            $data = $this->request->getData();
            $data['status'] = 'Disabled';
            $data['is_verified'] = 0;
            $data['balance'] = 0;

            // sheikh salar start----------------------------------

            //   if ($data['subdomain'] != " " && strrpos(
            // $data['subdomain'] , '.mylands.pk')) {
            //     echo "Please only enter domain name";
            //     exit();
            // }

            $subdomain = strtolower($data['subdomain']);
          //  $findme   = '.mylands.pk';
            //$pos = strpos($mystring, $findme);
           $pos = strrpos($mystring, '.mylands.pk');

            if ($pos === false) {
                // echo "The string '$findme' was not found in the string '$mystring'";
                 $subdomain= strtolower($subdomain).'.mylands.pk';
            } else {
                // echo "The string '$findme' was found in the string '$mystring'";
                // echo " and exists at position $pos";
            }

            // sheikh salar end------------------------------------

            // $data['subdomain'] = strtolower($data['subdomain']).'.mylands.pk';



            $data['email_verification_hash'] = md5(uniqid(rand(), true));
            
            $hasher = new DefaultPasswordHasher();
            $data['pass'] = $hasher->hash($data['pass']);

            $admin = $this->Admins->patchEntity($admin, $data);
            // pr($admin);
            // dd($admin);
            
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
                // EAS - Send admin email verification mail

                $this->Flash->success(__('Please check your email & open verification link in the web browser.'));
                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            }

            $this->Flash->error(__('The admin could not be saved. Please, try later.'));
        }
        $this->set(compact('admin'));
    }

    public function verifyEmail($hash)
    {
        // $this->autoRender = false;
        $this->layout = 'bs337';

        $admin = $this->Admins->findByEmailVerificationHash($hash)->first();;
        // echo $admin->subdomain;
        // dd($admin);
        // pr($admin);

        if (!empty($admin)) {
            $admin->status = 'Active';
            $admin->email_verification_hash = '';

            if ($this->Admins->save($admin)) {
                // die('<h1>Status/verification updated</h1>');
                $this->Flash->success(__('Your account is activated, login now.'));
            }
            else {
                // die('<h1>NOT Empty but faild to save</h1>');
                $this->Flash->error(__('Error in saving record. Please try later or contact administrator.'));
            }

            // return $this->redirect('/admins/login');
            // return $this->redirect('http://'.$admin->subdomain);
			// return $this->redirect(
			// 	['controller' => 'Admins', 'action' => 'login']
			// );
            $this->setAction('login');
        }
        // else {
        //     die('<h1>Empty</h1>');
        // }

        // $is_exist = $this->Admins->exists(['email_verification_hash' => $hash]);
        // // dd($is_exist);
        // if ($is_exist) {
        //     die('yes');
        // }
        // else {
        //     die('no');
        // }
    }
}