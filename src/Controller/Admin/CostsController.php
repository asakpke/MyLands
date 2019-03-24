<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Costs Controller
 *
 * @property \App\Model\Table\CostsTable $Costs
 *
 * @method \App\Model\Entity\Cost[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CostsController extends AppController
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
                // 'Lands.admin_id' => $this->Auth->user('id'),
                // 'CostCats.admin_id' => $this->Auth->user('id'),
                'Costs.admin_id' => $this->Auth->user('id'),
            ],
            'contain' => ['Lands', 'CostCats']
        ];
        $costs = $this->paginate($this->Costs);
        // dd($costs);

        $this->set(compact('costs'));
    }

    /**
     * View method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cost = $this->Costs->get($id, [
        	'conditions' => [
                // 'Lands.admin_id' => $this->Auth->user('id'),
                // 'CostCats.admin_id' => $this->Auth->user('id'),
                'Costs.admin_id' => $this->Auth->user('id'),
            ],
            'contain' => ['Lands', 'CostCats']
        ]);

        $this->set('cost', $cost);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cost = $this->Costs->newEntity();

        if ($this->request->is('post')) {
            $cost = $this->Costs->patchEntity($cost, $this->request->getData());
            $cost['admin_id'] = $this->Auth->user('id');

            $cost->cost = str_replace(',','',$cost->cost);

            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }

        $lands = $this->Costs->Lands->find('list', [
        	'limit' => 200,
        	'conditions' => [
                'Lands.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $costCats = $this->Costs->CostCats->find('list', [
        	'limit' => 200,
        	'conditions' => [
                'CostCats.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $this->set(compact('cost', 'lands', 'costCats'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cost = $this->Costs->get($id, [
            'conditions' => [
                'Costs.admin_id' => $this->Auth->user('id'),
            ],
            'contain' => []
        ]);
        // dd($cost);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $cost = $this->Costs->patchEntity($cost, $this->request->getData());

            $cost->cost = str_replace(',','',$cost->cost);

            if ($this->Costs->save($cost)) {
                $this->Flash->success(__('The cost has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cost could not be saved. Please, try again.'));
        }

        $lands = $this->Costs->Lands->find('list', [
            'limit' => 200,
            'conditions' => [
                'Lands.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $costCats = $this->Costs->CostCats->find('list', [
            'limit' => 200,
            'conditions' => [
                'CostCats.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $this->set(compact('cost', 'lands', 'costCats'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cost id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cost = $this->Costs->get($id, [
            'conditions' => [
                'Costs.admin_id' => $this->Auth->user('id')
            ],
        ]);

        if ($this->Costs->delete($cost)) {
            $this->Flash->success(__('The cost has been deleted.'));
        } else {
            $this->Flash->error(__('The cost could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
