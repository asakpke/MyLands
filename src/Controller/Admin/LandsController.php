<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Lands Controller
 *
 * @property \App\Model\Table\LandsTable $Lands
 *
 * @method \App\Model\Entity\Land[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LandsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Admins']
        ];
        $lands = $this->paginate($this->Lands);

        $this->set(compact('lands'));
    }

    /**
     * View method
     *
     * @param string|null $id Land id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $land = $this->Lands->get($id, [
            'contain' => ['Admins', 'Costs']
        ]);

        $this->set('land', $land);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $land = $this->Lands->newEntity();
        if ($this->request->is('post')) {
            $land = $this->Lands->patchEntity($land, $this->request->getData());
            if ($this->Lands->save($land)) {
                $this->Flash->success(__('The land has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land could not be saved. Please, try again.'));
        }
        $admins = $this->Lands->Admins->find('list', ['limit' => 200]);
        $this->set(compact('land', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Land id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $land = $this->Lands->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $land = $this->Lands->patchEntity($land, $this->request->getData());
            if ($this->Lands->save($land)) {
                $this->Flash->success(__('The land has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land could not be saved. Please, try again.'));
        }
        $admins = $this->Lands->Admins->find('list', ['limit' => 200]);
        $this->set(compact('land', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Land id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $land = $this->Lands->get($id);
        if ($this->Lands->delete($land)) {
            $this->Flash->success(__('The land has been deleted.'));
        } else {
            $this->Flash->error(__('The land could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
