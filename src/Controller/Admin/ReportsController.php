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
        $asd = $this->loadModel('Lands'); 

        $data = $result->find('all')
        	->where([
                      'created' => date("Y-m-d"),
                    ]) ;

        $this->set('reports',$data);        


		
        // echo $today;

        // $time = new Time('2020-05-15');
		// $time = new Time('2014-06-18');

  //       echo $time->isYesterday();
  //       echo $time->isThisWeek();
  //       echo $time->isThisMonth();
  //       echo $time->isThisYear();
    }



}