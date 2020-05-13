<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
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
    }

}