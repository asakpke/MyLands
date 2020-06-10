<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\I18n\Time;
/**
 * 
 */
class ReportsController extends AppController
{
	public function index($id = null)
    {
        $conditions = array(
            // 'admin_id'=>$this->Auth->user('id'),
            'admin_id'=>0,
            // 'admin_id is null',
        );
        // if ($this->request->is(['get'])){
        $report=$this->request->getQuery('reports');
        // $data=$this->request->getData();
        // pr($report);

        if (!empty($report)) {

            $conditions['admin_id'] = $this->Auth->user('id');
            // dd($conditions);
            // switch ($this->request->getData('reports')) {
            switch ($report) {
                case 'Today':
                    $conditions[] = "DATE(created) = '".date('Y-m-d',strtotime("today"))."'";
                    break;

                case 'Yesterday':
                    $conditions[] = "DATE(created) = '".date('Y-m-d',strtotime("yesterday"))."'";
                    break;
                
                case 'This Month':
                    $conditions[] = "DATE(created) BETWEEN '".date('Y-m-1')."' AND '".date('Y-m-31')."'";
                    // $conditions[] = "DATE(created) BETWEEN '".date('Y-04-1')."' AND '".date('Y-04-31')."'";
                    break;

                case 'This Year':
                    $conditions[] = "DATE(created) BETWEEN '".date('Y-1-1')."' AND '".date('Y-12-31')."'";
                    break;
                case 'Last Year':
                    $conditions[] = "DATE(created) BETWEEN '".date("Y-1-1",strtotime("-1 year"))."'AND '".date("Y-12-31",strtotime("-1 year"))."'";
                    break;
                case 'Custom':
                    $conditions[] = "DATE(created) BETWEEN '".date($this->request->getData('start_date'))."'AND '".date($this->request->getData('end_date'))."'";
                    break;

                // default:
                    
                //     break;
            }

            $result = $this->loadModel('Lands');

            $this->paginate = [
                'limit' => 3,
            ];

            if (!empty($this->viewVars['admin']->id)) {
            // dd($this->viewVars['admin']->id);


                $data = $this->paginate($result->find('all')
                    ->where(
                        // [
                        // 'created'=> $this->request->getData(),
                        // 'lands.created'=> strtotime("today"),
                        // 'lands.created' => $this->request->getData(),

                        // ]
                        $conditions
                    ),
                        array( 'order' => array('Lands.id' => 'desc'))
                );
            }

             $results = $data->toArray();
                // dd($results);
            $this->set('reports',$results);
        }

        // }
    
    

        // $conditions = array(
        //     'admin_id'=>$this->Auth->user('id'),
        // );

        // switch ($this->request->getData('reports')) {
        //     case 'Today':
        //         $conditions[] = "DATE(created) = '".date('Y-m-d',strtotime("today"))."'";
        //         break;

        //     case 'Yesterday':
        //         $conditions[] = "DATE(created) = '".date('Y-m-d',strtotime("yesterday"))."'";
        //         break;
            
        //     case 'This Month':
        //         $conditions[] = "DATE(created) BETWEEN '".date('Y-m-1')."' AND '".date('Y-m-31')."'";
        //         // $conditions[] = "DATE(created) BETWEEN '".date('Y-04-1')."' AND '".date('Y-04-31')."'";
        //         break;

        //     case 'This Year':
        //         $conditions[] = "DATE(created) BETWEEN '".date('Y-1-1')."' AND '".date('Y-12-31')."'";
        //         break;
        //     case 'Last Year':
        //         $conditions[] = "DATE(created) BETWEEN '".date("Y-1-1",strtotime("-1 year"))."'AND '".date("Y-12-31",strtotime("-1 year"))."'";
        //         break;
        //     case 'Custom':
        //         $conditions[] = "DATE(created) BETWEEN '".date($this->request->getData('start_date'))."'AND '".date($this->request->getData('end_date'))."'";
        //         break;

        //     // default:
                
        //     //     break;
        // }

        // $result = $this->loadModel('Lands');
        // $this->paginate = [
        //     'limit' => 3,

        //     // 'conditions' => [
        //     //     'admin_id' => $this->viewVars['admin']->id,
        //     // ],
        //     // 'contain' => [
        //     //     // 'Admins'
        //     // ]
        // ];
        // if (!empty($this->viewVars['admin']->id)) {
        //     // dd($this->viewVars['admin']->id);


        // $data = $this->paginate($result->find('all')
        //     ->where(
        //         // [
        //         // 'created'=> $this->request->getData(),
        //         // 'lands.created'=> strtotime("today"),
        //         // 'lands.created' => $this->request->getData(),

        //         // ]
        //         $conditions
        //     ),
        //         array( 'order' => array('Lands.id' => 'desc'))
        //     );
        // }
        // dd($data);
        // dd($data->toArray());

            // $results = $data->toArray();
            // // dd($results);
            // $this->set('reports',$results);

        // }
    }
        // public function lands(){

}