<?php
namespace App\Controller;

use App\Controller\AppController;
// use Cake\Auth\DefaultPasswordHasher;

class MastersController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Masters',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'pass'
                    ],
                    'finder' => 'auth',
                    // 'finder' => 'authMaster',
                ]
            ],
            'loginAction' => [
                'prefix' => false,
                'controller' => 'Masters',
                'action' => 'login',
            ],
            // 'redirectUrl' => [
            //     'prefix' => true,
            //     'controller' => 'Lands',
            //     'action' => 'index',
            // ],
            'loginRedirect' => array(
                'prefix' => 'master',
                'controller' => 'Admins',
                'action' => 'index',
            ),
             //use isAuthorized in Controllers
            // 'authorize' => ['Controller'],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer(),
            // 'storage' => 'Session',
            'storage' => [
                'className' => 'Session',
                'key' => 'Auth.Master'
            ]
            // 'sessionKey'=>'Auth.Master',
        ]);

        $this->Auth->allow([
            'login',
            'logout',
            'forgotPassword',
            'forgotPassword2',
        ]);
    }

    public function login()
    {
        // echo (new DefaultPasswordHasher)->hash('salar');
        if ($this->request->is('post')) {
            // $hasher = new DefaultPasswordHasher();
            // echo $hasher->hash('abc').'<br>';
            // echo $hasher->hash('abc').'<br>';
            // echo $hasher->hash('abc').'<br>';
            $master = $this->Auth->identify();
            // echo '$master = ';
            // pr($master);
            // dd($master);
            // exit;

            if ($master) {
                $this->Auth->setUser($master);
                return $this->redirect($this->Auth->redirectUrl());
                // echo 'You are logged in';
                // exit;
            }
            
            $this->Flash->error('Your username or password is incorrect.');
        }
    }

    public function forgotPassword()
    {
        if ($this->request->is('post')) 
        {
            if (!empty($this->request->data))
            {
                $email = $this->request->data['email'];
                // $admin = $this->Admins->findByEmail($email)->first();
                $master = $this->Masters->findBySubdomainAndEmail($_SERVER['HTTP_HOST'],$email)->first();
                // dd($admin);

                if (!empty($master))
                {
                    $master->forgot_password_hash = md5(uniqid(rand(), true));

                    $this->Masters->save($master);
                    $this->Flash->success('Please click on password reset link, sent in your email address to reset password. Do check spam folder if you do not find it in inbox.');

                    // SAS - Send forget password mail
                    // $verification_url = 'http://'.$admin->subdomain.'/Admins/resetPassword/'.$admin->email_verification_hash;
                    // $verification_url = 'http://'.$admin->subdomain.'/Admins/resetPassword/'.$admin->forgot_password_hash;
                    $verification_url = 'http://Masters/forgotPassword2/'.$master->forgot_password_hash;
                    // dd($verification_url);
                    $email = new Email('default');
                    $email->from(['aamir@mylands.pk' => 'Aamir Shahzad'])
                        ->template('default', 'default')
                        ->emailFormat('both')
                        // ->emailFormat('html')
                        ->to($master->email)
                        ->subject($master.' Reset Password Link')
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

    public function forgotPassword2($token = null) {
        if (!empty($token)) {

            // $admin = $this->Admins->findByPasswordResetToken($token)->first();
            $master = $this->Masters->findByForgotPasswordHash($token)->first();
            // dd($admin);

            if ($master) {
                
                $master->forgot_password_hash = null;
                $this->Masters->save($master);

                $this->Auth->setUser($master);
                // return $this->redirect($this->Auth->redirectUrl());
                return $this->redirect('/master/Masters/profile');
                // EAS - Auto login & send to change password page
            }
            else {
                $this->Flash->error('Sorry your password token has been expired.');
            }
        }
        else {
            $this->Flash->error('Error loading password reset.');
        }

        return $this->redirect('/masters/forgot-password');
        // $this->set(compact('admin'));
        // $this->set('_serialize', ['admin']);
    // } // reset password
    } // forgotPassword2()

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
