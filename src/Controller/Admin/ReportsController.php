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

        $now = Time::now();
		echo $now->year;
		echo '-'. $now->month; 
		echo '-'. $now->day; 
    }



}