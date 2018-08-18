<?php
namespace App\Controller\Master;

use App\Controller\AppController;

/**
 * LandTypes Controller
 *
 * @property \App\Model\Table\LandTypesTable $LandTypes
 *
 * @method \App\Model\Entity\LandType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LandTypesController extends AppController
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
        $landTypes = $this->paginate($this->LandTypes);

        $this->set(compact('landTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Land Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $landType = $this->LandTypes->get($id, [
            'contain' => ['Admins', 'Lands']
        ]);

        $this->set('landType', $landType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $landType = $this->LandTypes->newEntity();
        if ($this->request->is('post')) {
            $landType = $this->LandTypes->patchEntity($landType, $this->request->getData());
            if ($this->LandTypes->save($landType)) {
                $this->Flash->success(__('The land type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land type could not be saved. Please, try again.'));
        }
        $admins = $this->LandTypes->Admins->find('list', ['limit' => 200]);
        $this->set(compact('landType', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Land Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $landType = $this->LandTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $landType = $this->LandTypes->patchEntity($landType, $this->request->getData());
            if ($this->LandTypes->save($landType)) {
                $this->Flash->success(__('The land type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land type could not be saved. Please, try again.'));
        }
        $admins = $this->LandTypes->Admins->find('list', ['limit' => 200]);
        $this->set(compact('landType', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Land Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $landType = $this->LandTypes->get($id);
        if ($this->LandTypes->delete($landType)) {
            $this->Flash->success(__('The land type has been deleted.'));
        } else {
            $this->Flash->error(__('The land type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
