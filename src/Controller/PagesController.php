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
        $result = $this->loadModel('Lands'); 

        $this->paginate = [
                'limit' => 3,

            // 'conditions' => [
            //     'admin_id' => $this->viewVars['admin']->id,
            // ],
            // 'contain' => [
            //     // 'Admins'
            // ]
        ];
        if (!empty($this->viewVars['admin']->id)) {
            # code...
            // dd($this->viewVars['admin']->id);
        
        $pages = $this->paginate($result->find('all')->where([
                'is_public'=> 1,
                'admin_id'=> $this->viewVars['admin']->id,
            ]));
        }
        else
        {
            $pages = $this->paginate($result->find('all')->where([
                'is_public'=> 1,
                // 'admin_id'=> $this->viewVars['admin']->id,
            ]));
        }
        // $pages = $this->paginate($result);
        $this->set('page',$pages);
        // dd($pages);

        // $this->set('land',$data);
        // if ($this->request->is('post')) {
            // dd($this->request->getData('filter'));

            // $conditions = array(
            // 'admin_id'=>$this->Auth->user('id'),
            // );

            // switch ($this->request->getData('filter')) {

            //     case 'Ascending':
            //         $conditions[] = array('order'=>array('lands.id' => 'ASC'));
            //         break;

            //     case 'Descending':
            //         $conditions[] = array('order'=>array('lands.id' => 'DESC'));
            //         break;
                
            
            // }


        // $result = $this->loadModel('Lands'); 

        
        // $this->Paginator->options([
        //     'url' => [
        //     'sort' => 'id',
        //     'direction' => 'desc',
        //     'page' => 6,
        //     'lang' => 'en'
        //     ]
        // ]);
        
        // dd ($this->viewVars['admin']->id);
        // if (!empty($this->viewVars['admin']->id)) {
        //      $data = $result->find('all')->where([
        //         'is_public'=> 1,
        //         'admin_id'=> $this->viewVars['admin']->id,
        //     ]);
        // }
        // else {
        //     $data = $result->find('all')->where([
        //         'is_public'=> 1,
        //     ]);
        // }

        // // dd($data);
        // // dd($data->toArray());
        // // $this->paginate = [
        // //     'conditions' => $conditions,

        // // ];

        // // $lands = $this->paginate($result);
        
        // $this->set('allLands',$data);
        // }
    }
}
