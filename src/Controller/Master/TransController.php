<?php
namespace App\Controller\Master;

use App\Controller\AppController;
use Cake\I18n\Date;
// use Cake\ORM\TableRegistry;


/**
 * Trans Controller
 *
 * @property \App\Model\Table\TransTable $Trans
 *
 * @method \App\Model\Entity\Tran[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransController extends AppController
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
		$trans = $this->paginate($this->Trans);

		$this->set(compact('trans'));
	}

	/**
	 * View method
	 *
	 * @param string|null $id Tran id.
	 * @return \Cake\Http\Response|void
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function view($id = null)
	{
		$tran = $this->Trans->get($id, [
			'contain' => ['Admins']
		]);

		$this->set('tran', $tran);
	}

	/**
	 * Add method
	 *
	 * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
	 */
	public function add()
	{
		$tran = $this->Trans->newEntity();
		if ($this->request->is('post')) {
			$tran = $this->Trans->patchEntity($tran, $this->request->getData());
			if ($this->Trans->save($tran)) {
				// dd($tran);
				// pr($tran);
				// pr($tran->admin_id);

				// $admin = $this->Admins->get($tran->admin_id);
				// $admin = $this->Admins->get(8);
				// $admin = $this->Admins->findById($tran->admin_id)->first();
				// $admin = TableRegistry::get($tran->admin_id);
				// $admin = TableRegistry::get('Admins');
				// $admin = $admin
				//     ->find()
				//     ->where(['id' => $tran->admin_id])
				//     ->first()
				// ;
				$admin = $this->Trans->Admins->get($tran->admin_id);
				// dd($admin);
				// pr($admin);

				$today = new Date();

				// $next_month = new Date('+1 month');
				// $next_month = new Date('+2 month');
				$next_month = new Date($admin->next_payment);
				// dd($next_month);
				// pr($next_month);
				

				if ($next_month > $today) {
					$next_month->addMonth(1);
				}
				else {
					$next_month = $today->addMonth(1);					
				}

				// dd($next_month);


				$this->Trans->Admins->updateAll(
					[  // fields
						'balance' => $admin->balance + $tran->amount,
						'next_payment' => $next_month->format('Y-m-d'),
						'status' => 'Active',
						'is_verified' => 1,
					],
					[  // conditions
						'id' => $tran->admin_id,
					]
				);

				$this->Flash->success(__('The tran has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tran could not be saved. Please, try again.'));
		}
		$admins = $this->Trans->Admins->find('list', ['limit' => 200]);
		$this->set(compact('tran', 'admins'));
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id Tran id.
	 * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$tran = $this->Trans->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$tran = $this->Trans->patchEntity($tran, $this->request->getData());
			if ($this->Trans->save($tran)) {
				$this->Flash->success(__('The tran has been saved.'));

				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('The tran could not be saved. Please, try again.'));
		}
		$admins = $this->Trans->Admins->find('list', ['limit' => 200]);
		$this->set(compact('tran', 'admins'));
	}

	/**
	 * Delete method
	 *
	 * @param string|null $id Tran id.
	 * @return \Cake\Http\Response|null Redirects to index.
	 * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
	 */
	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$tran = $this->Trans->get($id);
		if ($this->Trans->delete($tran)) {
			$this->Flash->success(__('The tran has been deleted.'));
		} else {
			$this->Flash->error(__('The tran could not be deleted. Please, try again.'));
		}

		return $this->redirect(['action' => 'index']);
	}
}
