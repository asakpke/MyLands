<?php
namespace App\Controller;

class PagesController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        // $this->Auth->allow([
        //     'home',
        // ]);
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

//         $this->set('land',$data);
        
        $result = $this->loadModel('Lands');       
        $data = $result->find('all')
                    ->where([
                        'is_public'=> 1,
//                        'admin_id'=> $this->Auth->user('id'),
                    ]);

        $this->set('land',$data);

    }
}
