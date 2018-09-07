<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class AdminsController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow([
            'login',
            'logout',
            'signup',
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
            $data['subdomain'] = $data['subdomain'].'.mylands.pk';
            
            $hasher = new DefaultPasswordHasher();
            $data['pass'] = $hasher->hash($data['pass']);

            $admin = $this->Admins->patchEntity($admin, $data);
            // pr($admin);
            // dd($admin);
            
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('Please check your email & click activation link.'));

                return $this->redirect(['controller' => 'pages', 'action' => 'home']);
            }

            $this->Flash->error(__('The admin could not be saved. Please, try later.'));
        }
        $this->set(compact('admin'));
    }
}