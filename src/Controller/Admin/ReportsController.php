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
    
    if ($this->request->is('post')){

        $result = $this->loadModel('Lands'); 

        $data = $result->find('all')
            ->where([
                // 'created'=> $this->request->getData(),
                // 'lands.created'=> strtotime("today"),
                'lands.created' => $this->request->getData(),

            ]);
        $this->set('reports',$data); 

    }
 
    
		
        // echo $today;

        // $time = new Time('2020-05-15');
		// $time = new Time('2014-06-18');

  //       echo $time->isYesterday();
  //       echo $time->isThisWeek();
  //       echo $time->isThisMonth();
  //       echo $time->isThisYear();
    }



}