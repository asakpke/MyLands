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

    public function logout()
    {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }
}
