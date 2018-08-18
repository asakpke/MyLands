<?php
namespace App\Controller\Master;

use App\Controller\AppController;

/**
 * CostCats Controller
 *
 * @property \App\Model\Table\CostCatsTable $CostCats
 *
 * @method \App\Model\Entity\CostCat[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CostCatsController extends AppController
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
        $costCats = $this->paginate($this->CostCats);

        $this->set(compact('costCats'));
    }

    /**
     * View method
     *
     * @param string|null $id Cost Cat id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $costCat = $this->CostCats->get($id, [
            'contain' => ['Admins', 'Costs']
        ]);

        $this->set('costCat', $costCat);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $costCat = $this->CostCats->newEntity();
        if ($this->request->is('post')) {
            $costCat = $this->CostCats->patchEntity($costCat, $this->request->getData());
            if ($this->CostCats->save($costCat)) {
                $this->Flash->success(__('The cost cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost cat could not be saved. Please, try again.'));
        }
        $admins = $this->CostCats->Admins->find('list', ['limit' => 200]);
        $this->set(compact('costCat', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cost Cat id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $costCat = $this->CostCats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $costCat = $this->CostCats->patchEntity($costCat, $this->request->getData());
            if ($this->CostCats->save($costCat)) {
                $this->Flash->success(__('The cost cat has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost cat could not be saved. Please, try again.'));
        }
        $admins = $this->CostCats->Admins->find('list', ['limit' => 200]);
        $this->set(compact('costCat', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cost Cat id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $costCat = $this->CostCats->get($id);
        if ($this->CostCats->delete($costCat)) {
            $this->Flash->success(__('The cost cat has been deleted.'));
        } else {
            $this->Flash->error(__('The cost cat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
