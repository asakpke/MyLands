<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

/**
 * 
 */
class AdminsController extends AppController
{
	
	public function profile($id = null) {

        $admin = $this->Admins->get($this->Auth->user('id'), [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();
            $hasher = new DefaultPasswordHasher();
            $data['pass'] = $hasher->hash($data['pass']);

            $admin = $this->Admins->patchEntity($admin, $data);
            
            if ($this->Admins->save($admin)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'profile']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('admin'));

    } // profile
}