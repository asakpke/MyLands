<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
// use Cake\Http\Exception\NotFoundException
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Routing\Router;

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
            // dd($this->Auth->user('id'));

            if ($this->request->data['file']['size'] > 2097152 || $this->request->data['file']['size'] == 0 && $this->request->data['file']['error'] != 4 && $this->request->data['file']['error'] != 0 && $this->request->data['file']['type'] != "image/.jpeg, image/.png, image/.jpg")
            {   
                // echo "<h1>in IF</h1>";
                // die ("ERROR: Large File Size");
                $this->Flash->error(__('ERROR: Large File Size'));
            }
            else {

                $land = $this->Lands->patchEntity($land, $this->request->getData());
                $land['admin_id'] = $this->Auth->user('id');
                // dd($land);
                // exit;
                // pr($land);

                // salar start
                if (!empty($this->request->data['file']['name'])) {

                    $filename = $this->request->data['file']['name'];
                    // $url = Router::url('/',true) . 'img/lands' . $filename;
                    // $uploadpath = '/home/salar/MyLands/webroot/images/';
                    $uploadpath = WWW_ROOT . 'img/lands/';
                    $uploadfile = $uploadpath . $land['admin_id'] .  $filename;

                    // if(($this->request->data['file']['size'] >= "2097152")) {
                    //     $errors[] = 'File too large. File must be less than 2 megabytes.';
                    // }

                    if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)) {

                        $land->main_image = $land['admin_id'] . $filename;
                    }
                    // if ($this->request->data['file']['name'] > 200000) {
                    //     echo "Please upload 2mb file";
                    // }
                }
                // salar end

                $land->demand = str_replace(',','',$land->demand);
                $land->sale = str_replace(',','',$land->sale);
                $land->cost = str_replace(',','',$land->cost);
                
                if ($this->Lands->save($land)) {
                    $this->Flash->success(__('The land has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The land could not be saved. Please, try again.'));
            }
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

        $uploads = $this->Lands->find('all', ['order' => ['Lands.created' => 'DESC']]);
        $uploadsRowNum = $uploads->count();
        $this->set('uploads',$uploads);
        $this->set('uploadsRowNum',$uploadsRowNum);
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
            $existingland = $this->Lands->get($id, [
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

            // $data = $this->request->data;
            // pr($data);
            // pr($this->request->data['file']['name']);

            if ($this->request->data['file']['size'] > 2097152 || $this->request->data['file']['size'] == 0 && $this->request->data['file']['error'] != 4 && $this->request->data['file']['error'] != 0 && $this->request->data['file']['type'] != "image/.jpeg, image/.png, image/.jpg")
            {   
                // echo "<h1>in IF</h1>";
                // die ("ERROR: Large File Size");
                $this->Flash->error(__('ERROR: Large File Size'));
            }
            else {

                // echo "<h1>Its in else</h1>";
                $land = $this->Lands->patchEntity($existingland, $this->request->getData());

                // salar start
                if (!empty($this->request->data['file']['name'])) {

                    // echo "<h1>In not empty file</h1>";

                    // unlink('/home/roshantech/MyLands/webroot/images/' . $land->main_image);
                    // if ($this->request->data['file']['name'] > 200000) {
                    //     echo "Please upload 2mb file";
                    // }

                    $filename = $this->request->data['file']['name'];
                    // $url = Router::url('/',true) . 'images/' . $filename;
                    $uploadpath = WWW_ROOT . 'img/lands/';
                    $uploadfile = $uploadpath . $land['admin_id'] .  $filename;
                    // unlink('/home/roshantech/MyLands/webroot/images/' . $land->main_image);

                    

                    if (move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)) {
                        // echo "<h1>In move upload</h1>";

                        // if(!empty($uploadfile)) {
                            unlink(WWW_ROOT . 'img/lands/' . $existingland->main_image);
                            $land->main_image = $land['admin_id'] . $filename; 
                        // }
                        
                        // $land->main_image = $land['admin_id'] . $filename;   
                    }

                }
                // salar end
                // pr($land);

                // $land = $this->Lands->patchEntity($land, $this->request->getData());
                // echo '<h1>Land</h1>';
                // pr($land);
                // exit;
                

                $land->demand = str_replace(',','',$land->demand);
                $land->sale = str_replace(',','',$land->sale);
                $land->cost = str_replace(',','',$land->cost);

                // pr($land);
                // echo $land;
                

                if ($this->Lands->save($land)) {
                    $this->Flash->success(__('The land has been updated.'));

                    return $this->redirect(['action' => 'index']);
                    // dd($land);
                    
                }
                // unlink($land['admin_id'] . $filename);
                $this->Flash->error(__('The land could not be saved. Please, try again.'));
            }
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
            // 'land',
            // 'admins',
            'landTypes',
            'landStatuses'
        ));
        $this->set('land',$existingland);

        $uploads = $this->Lands->find('all', ['order' => ['Lands.created' => 'DESC']]);
        $uploadsRowNum = $uploads->count();
        $this->set('uploads',$uploads);
        $this->set('uploadsRowNum',$uploadsRowNum);
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
        // salar start
        unlink(WWW_ROOT . 'img/lands/' . $land->main_image);
        // salar
        if ($this->Lands->delete($land)) {
            // dd($this->Lands->delete($land));
            $this->Flash->success(__('The land has been deleted.'));
        } else {
            $this->Flash->error(__('The land could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
