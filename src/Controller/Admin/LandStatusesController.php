<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * LandStatuses Controller
 *
 * @property \App\Model\Table\LandStatusesTable $LandStatuses
 *
 * @method \App\Model\Entity\LandStatus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LandStatusesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
        	'conditions' => [
                'LandStatuses.admin_id' => $this->Auth->user('id')
            ],
            // 'contain' => ['Admins']
        ];
        $landStatuses = $this->paginate($this->LandStatuses);

        $this->set(compact('landStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Land Status id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $landStatus = $this->LandStatuses->get($id, [
        	'conditions' => [
                'LandStatuses.admin_id' => $this->Auth->user('id')
            ],
            'contain' => [
            	// 'Admins',
            	'Lands'
            ]
        ]);

        $this->set('landStatus', $landStatus);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $landStatus = $this->LandStatuses->newEntity();
        if ($this->request->is('post')) {
            $landStatus = $this->LandStatuses->patchEntity($landStatus, $this->request->getData());
            $landStatus['admin_id'] = $this->Auth->user('id');

            if ($this->LandStatuses->save($landStatus)) {
                $this->Flash->success(__('The land status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land status could not be saved. Please, try again.'));
        }
        // $admins = $this->LandStatuses->Admins->find('list', ['limit' => 200]);
        $this->set(compact(
        	'landStatus'
        	// 'admins'
        ));
    }

    /**
     * Edit method
     *
     * @param string|null $id Land Status id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $landStatus = $this->LandStatuses->get($id, [
        	'conditions' => [
                'LandStatuses.admin_id' => $this->Auth->user('id')
            ],
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $landStatus = $this->LandStatuses->patchEntity($landStatus, $this->request->getData());
            if ($this->LandStatuses->save($landStatus)) {
                $this->Flash->success(__('The land status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land status could not be saved. Please, try again.'));
        }

        // $admins = $this->LandStatuses->Admins->find('list', ['limit' => 200]);
        $this->set(compact(
        	'landStatus'
        	// 'admins'
        ));
    }

    /**
     * Delete method
     *
     * @param string|null $id Land Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $landStatus = $this->LandStatuses->get($id, [
        	'conditions' => [
                'LandStatuses.admin_id' => $this->Auth->user('id')
            ],
        ]);

        if ($this->LandStatuses->delete($landStatus)) {
            $this->Flash->success(__('The land status has been deleted.'));
        } else {
            $this->Flash->error(__('The land status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
