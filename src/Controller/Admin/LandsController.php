<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
// use Cake\Http\Exception\NotFoundException
use Cake\Datasource\Exception\RecordNotFoundException;

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
        $search = $this->request->getQuery('search');

        $cond = array(
            'Lands.admin_id' => $this->Auth->user('id'),
        );

        if (!empty($search)) {
            $cond['OR']['Lands.name LIKE'] = "%{$search}%";
            $cond['OR']['LandTypes.name LIKE'] = "%{$search}%";
            $cond['OR']['Lands.acre'] = (float)$search;
            $cond['OR']['Lands.kanal'] = (float)$search;
            $cond['OR']['Lands.marla'] = (float)$search;
            $cond['OR']['Lands.location LIKE'] = "%{$search}%";
            $cond['OR']['Lands.city LIKE'] = "%{$search}%";
            $cond['OR']['Lands.khewat LIKE'] = "%{$search}%";
            $cond['OR']['Lands.khasra LIKE'] = "%{$search}%";
            $cond['OR']['Lands.patwar_halka LIKE'] = "%{$search}%";
            $cond['OR']['Lands.best_for LIKE'] = "%{$search}%";
            $cond['OR']['Lands.demand'] = $search;
            $cond['OR']['Lands.sale'] = $search;
            $cond['OR']['Lands.cost'] = $search;
            $cond['OR']['Lands.remarks LIKE'] = "%{$search}%";
            $cond['OR']['Lands.purchased'] = $search;
            $cond['OR']['LandStatuses.name LIKE'] = "%{$search}%";
        }

        $this->paginate = [
            // // 'condition' => [
            'conditions' =>  $cond,
            // [
            // // 'where' => [
            //     'Lands.admin_id' => $this->Auth->user('id')
            // //   // 'admin_id =' => $this->Auth->user('id')
            // ],
            // 'finder' => [
            //     'Lands.admin_id' => $this->Auth->user('id')
            // ],
            'contain' => [
                // 'Admins',
                'LandTypes',
                'LandStatuses',
            ],
        ];
        $lands = $this->paginate($this->Lands);
        // pr($lands);

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
        try {
            $land = $this->Lands->get($id, [
                'conditions' => [
                    'Lands.admin_id' => $this->Auth->user('id')
                    // 'admin_id' => $this->Auth->user('id')
                ],
                'contain' => [
                    // 'Admins',
                    'LandTypes',
                    'LandStatuses',
                    'Costs'
                ]
            ]);
        } 
        // catch (NotFoundException $e) {
        // catch (\NotFoundException $e) {
        // catch (/NotFoundException $e) {
        catch (RecordNotFoundException $e) {
        // catch () {
            // pr($e);
            // die('Invalid ID');
            die();
        }
        

        $this->set('land', $land);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // pr($this->Auth->user('id'));
        $land = $this->Lands->newEntity();
        if ($this->request->is('post')) {
            // $data = $this->request->getData();
            // dd($data);
            // exit();
            $land = $this->Lands->patchEntity($land, $this->request->getData());
            $land['admin_id'] = $this->Auth->user('id');
            // dd($land);
            // exit;
            // pr($land);

            $land->demand = str_replace(',','',$land->demand);
            $land->sale = str_replace(',','',$land->sale);
            $land->cost = str_replace(',','',$land->cost);
            
            if ($this->Lands->save($land)) {
                $this->Flash->success(__('The land has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land could not be saved. Please, try again.'));
        }
        // $admins = $this->Lands->Admins->find('list', ['limit' => 200]);
        $landTypes = $this->Lands->LandTypes->find('list', [
            'limit' => 200,
            'conditions' => [
                'LandTypes.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $landStatuses = $this->Lands->LandStatuses->find('list', [
            'limit' => 200,
            'conditions' => [
                'LandStatuses.admin_id' => $this->Auth->user('id')
            ]
        ]);
        // $this->set(compact('land', 'admins', 'landTypes', 'landStatuses'));
        $this->set(compact('land', 'landTypes', 'landStatuses'));
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
        try {
            $land = $this->Lands->get($id, [
                'conditions' => [
                    'Lands.admin_id' => $this->Auth->user('id')
                ],
                'contain' => []
            ]);
            // pr($land);
        } 
        // catch (Exception $e) {
        catch (RecordNotFoundException $e) {
           // die('Invalid ID'); 
           die(); 
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $land = $this->Lands->patchEntity($land, $this->request->getData());
            // echo '<h1>Land</h1>';
            // pr($land);
            // exit;
            $land->demand = str_replace(',','',$land->demand);
            $land->sale = str_replace(',','',$land->sale);
            $land->cost = str_replace(',','',$land->cost);

            if ($this->Lands->save($land)) {
                $this->Flash->success(__('The land has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The land could not be saved. Please, try again.'));
        }
        // $admins = $this->Lands->Admins->find('list', ['limit' => 200]);
        $landTypes = $this->Lands->LandTypes->find('list', [
            'limit' => 200,
            'conditions' => [
                'LandTypes.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $landStatuses = $this->Lands->LandStatuses->find('list', [
            'limit' => 200,
            'conditions' => [
                'LandStatuses.admin_id' => $this->Auth->user('id')
            ]
        ]);
        $this->set(compact(
            'land',
            // 'admins',
            'landTypes',
            'landStatuses'
        ));
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

        try {
            $land = $this->Lands->get($id, [
                'conditions' => [
                    'Lands.admin_id' => $this->Auth->user('id')
                ]
            ]);
        } 
        catch (RecordNotFoundException $e) {
           die(); 
        }

        if ($this->Lands->delete($land)) {
            $this->Flash->success(__('The land has been deleted.'));
        } else {
            $this->Flash->error(__('The land could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
