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
    	// $admin = $this->Admins->get($this->Auth->user('id'), [
     //        'contain' => []
     //    ]);
    // $start_date = $this->request->query('start_date');
    // $end_date = $this->request->query('end_date');

    // $this->paginate = [
    //     'conditions' => [
    //         'DATE(lands.created) >=' => $start_date,
    //         'DATE(lands.created) <=' => $end_date,

    //     ]
    // ];


    if ($this->request->is('post')){
        // dd($this->request->getData());
        // dd($this->request->getData('reports'));
        // dd(strtotime("today"));
        // dd(date('Y-m-d',strtotime("today")));
        // dd(date('Y-m-d',strtotime($this->request->getData('reports'))));

        $conditions = array(
            'admin_id'=>$this->Auth->user('id'),
        );

        switch ($this->request->getData('reports')) {
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
        }

        $result = $this->loadModel('Lands');

        $data = $result->find('all')
            ->where(
                // [
                // 'created'=> $this->request->getData(),
                // 'lands.created'=> strtotime("today"),
                // 'lands.created' => $this->request->getData(),

                // ]
                $conditions
            );
        // dd($data);
        // dd($data->toArray());

            $results = $data->toArray();

            $this->set('reports',$results);

    }
    
    }
}