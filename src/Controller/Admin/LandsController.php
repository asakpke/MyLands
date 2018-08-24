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
        $this->paginate = [
            // // 'condition' => [
            'conditions' => [
            // 'where' => [
                'Lands.admin_id' => $this->Auth->user('id')
            // 	// 'admin_id =' => $this->Auth->user('id')
            ],
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
            // pr($data);
            $land = $this->Lands->patchEntity($land, $this->request->getData());
            $land['admin_id'] = $this->Auth->user('id');
            // dd($land);
            // pr($land);

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
            // echo '<h1>Land</h1>'
            // pr($land);
            // exit;
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
