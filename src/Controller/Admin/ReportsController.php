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
    	$admin = $this->Admins->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        $result = $this->loadModel('Reports'); 

        $data = $result->find('all');

        $this->set('reports',$data);        


		
        // echo $today;

        // $time = new Time('2020-05-15');
		$today = new Time('today');
		$this->set('times',$today);
        //echo $time->isYesterday();
        // echo $time->isThisWeek();
        // echo $time->isThisMonth();
        // echo $time->isThisYear();

    }



}