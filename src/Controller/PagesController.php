<?php
namespace App\Controller;

class PagesController extends AppController
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
            'home',
        ]);
    }
    
    public function home()
    {
        // $this->layout = false;
        // $this->layout = 'default';
        $this->layout = 'bs337';
        // $this->layout = 'bs413';
        // echo $this->request->env('HTTP_HOST');

//         $this->loadComponent('Auth');    
//         // pr($this->Auth->user('id'));
//         $result = $this->loadModel('Lands');
//         $land = $this->result->get($this->Auth->user('id'), [
//             'contain' => []
//         ]);
//         $data = $land->find('all')
//                     ->where([
//                         'is_public'=> 1,
// //                        'admin_id'=> $this->Auth->user('id'),
//                     ]);

        // $this->set('land',$data);
        
        $result = $this->loadModel('Lands'); 
        
        // dd ($this->viewVars['admin']->id);
        if (!empty($this->viewVars['admin']->id)) {
             $data = $result->find('all')->where([
                'is_public'=> 1,
                'admin_id'=> $this->viewVars['admin']->id,
            ]);
        }
        else {
            $data = $result->find('all')->where([
                'is_public'=> 1,
            ]);
        }
            
        $this->set('allLands',$data);
    }
}
