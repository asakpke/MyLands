<?php
namespace App\Controller\Master;

use App\Controller\AppController;

/**
 * PageElements Controller
 *
 * @property \App\Model\Table\PageElementsTable $PageElements
 *
 * @method \App\Model\Entity\PageElement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PageElementsController extends AppController
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
        $pageElements = $this->paginate($this->PageElements);

        $this->set(compact('pageElements'));
    }

    /**
     * View method
     *
     * @param string|null $id Page Element id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pageElement = $this->PageElements->get($id, [
            'contain' => ['Admins']
        ]);

        $this->set('pageElement', $pageElement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pageElement = $this->PageElements->newEntity();
        if ($this->request->is('post')) {
            $pageElement = $this->PageElements->patchEntity($pageElement, $this->request->getData());
            if ($this->PageElements->save($pageElement)) {
                $this->Flash->success(__('The page element has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page element could not be saved. Please, try again.'));
        }
        $admins = $this->PageElements->Admins->find('list', ['limit' => 200]);
        $this->set(compact('pageElement', 'admins'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Page Element id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pageElement = $this->PageElements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pageElement = $this->PageElements->patchEntity($pageElement, $this->request->getData());
            if ($this->PageElements->save($pageElement)) {
                $this->Flash->success(__('The page element has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The page element could not be saved. Please, try again.'));
        }
        $admins = $this->PageElements->Admins->find('list', ['limit' => 200]);
        $this->set(compact('pageElement', 'admins'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Page Element id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pageElement = $this->PageElements->get($id);
        if ($this->PageElements->delete($pageElement)) {
            $this->Flash->success(__('The page element has been deleted.'));
        } else {
            $this->Flash->error(__('The page element could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
