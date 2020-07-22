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

        // $this->loadComponent('Auth');    
        // // pr($this->Auth->user('id'));
        // $result = $this->loadModel('Lands');
        // $land = $this->result->get($this->Auth->user('id'), [
        //     'contain' => []
        // ]);
        // $data = $land->find('all')
        //             ->where([
        //                 'is_public'=> 1,
        //  'admin_id'=> $this->Auth->user('id'),
        //             ]);z
        $result = $this->loadModel('Lands'); 

        $this->paginate = [
                'limit' => 3,
        ];

        $search = $this->request->getQuery('search');

        $cond = array(
            'is_public'=> 1,
        );

        if (!empty($search)) {
            $cond['OR']['Lands.name LIKE'] = "%{$search}%";
            $cond['OR']['LandTypes.name LIKE'] = "%{$search}%";
            $cond['OR']['Lands.acre'] = (float)$search;
            $cond['OR']['Lands.kanal'] = (float)$search;
            $cond['OR']['Lands.marla'] = (float)$search;
            $cond['OR']['Lands.location LIKE'] = "%{$search}%";
            $cond['OR']['Lands.city LIKE'] = "%{$search}%";
            $cond['OR']['Lands.khewat LIKE'] = "%{$search}%";
            $cond['OR']['Lands.khasra LIKE'] = "%{$search}%";
            $cond['OR']['Lands.patwar_halka LIKE'] = "%{$search}%";
            $cond['OR']['Lands.best_for LIKE'] = "%{$search}%";
            $cond['OR']['Lands.demand'] = $search;
            $cond['OR']['Lands.sale'] = $search;
            $cond['OR']['Lands.cost'] = $search;
            $cond['OR']['Lands.remarks LIKE'] = "%{$search}%";
            $cond['OR']['Lands.purchased'] = $search;
            $cond['OR']['LandStatuses.name LIKE'] = "%{$search}%";
        }

        if (!empty($this->viewVars['admin']->id)) {
            // dd($this->viewVars['admin']->id);
        
            // $pages = $this->paginate($result->find('all')->where([
            //     'is_public'=> 1,
            //     'admin_id'=> $this->viewVars['admin']->id,
            //     // 'order' => array('Lands.id' => 'DESC'),
            // ]),
            //     array( 'order' => array('Lands.id' => 'desc'))
            // );

            $cond['Lands.admin_id'] = $this->viewVars['admin']->id;
        }
        // else
        // {
            // $this->paginate = [
            //     // 'conditions' =>  [
            //     //     'is_public'=> 1,
            //     // ],
            //     'conditions' =>  $cond,
            //     'contain' => [
            //         // 'Admins',
            //         'LandTypes',
            //         'LandStatuses',
            //     ],
            //     'order' => array('Lands.id' => 'desc'),
            // ];
            // // $pages = $this->paginate($result->find('all')->where([
            // //     'is_public'=> 1,
            // //     // 'admin_id'=> $this->viewVars['admin']->id,
            // // ]),
            // //     array( 'order' => array('Lands.id' => 'desc'))
            // // );
            // $pages = $this->paginate($this->Lands);
            // dd($pages);
        // }
        // $pages = $this->paginate($result);
        // $results = $pages->toArray();
        // dd($results);

        // dd($cond);
        // pr($cond);

        $this->paginate = [
            // 'conditions' =>  [
            //     'is_public'=> 1,
            // ],
            'conditions' =>  $cond,
            'contain' => [
                // 'Admins',
                'LandTypes',
                'LandStatuses',
            ],
            'order' => array('Lands.id' => 'desc'),
        ];
        // $pages = $this->paginate($result->find('all')->where([
        //     'is_public'=> 1,
        //     // 'admin_id'=> $this->viewVars['admin']->id,
        // ]),
        //     array( 'order' => array('Lands.id' => 'desc'))
        // );
        $pages = $this->paginate($this->Lands);

        $this->set('page',$pages);
        // $this->set('page',$results);

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
    }
}
