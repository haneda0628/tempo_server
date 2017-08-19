<?php
App::uses('AppController', 'Controller');
/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 * @property PaginatorComponent $Paginator
 */
class CouponsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');

/**
 * index method
 * ログインしているユーザーのBranch IDが同じCouponのみ表示
 * @return void
 */
	public function index() {
		$user = $this->Auth->user();

		//$this->log(var_export($user['branch_id']));

		//ユーザーと同じブランチのもののみを表示
		$this->paginate = array(
			'conditions' => array(
				'Coupon.branch_id' =>  $user['branch_id']
				)
		);

		$this->Coupon->recursive = 0;
		$this->set('coupons', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
		$this->set('coupon', $this->Coupon->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$user = $this->Auth->user();
			$this->Coupon->create();
			
			//ユーザーのBranch IDに紐付け
			//Branch IDに基づいてクーポン発行
			$this->request->data['Coupon']['branch_id'] = $user['branch_id'];
			$this->log(var_export($this->request->data));
			if ($this->Coupon->save($this->request->data)) {
				$this->Flash->success(__('The coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coupon could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Coupon->Branch->find('list');
		$members = $this->Coupon->Member->find('list');
		$this->set(compact('branches', 'members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Coupon->save($this->request->data)) {
				$this->Flash->success(__('The coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coupon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
			$this->request->data = $this->Coupon->find('first', $options);
		}
		$branches = $this->Coupon->Branch->find('list');
		$members = $this->Coupon->Member->find('list');
		$this->set(compact('branches', 'members'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Coupon->id = $id;
		if (!$this->Coupon->exists()) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Coupon->delete()) {
			$this->Flash->success(__('The coupon has been deleted.'));
		} else {
			$this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Coupon->recursive = 0;
		$this->set('coupons', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
		$this->set('coupon', $this->Coupon->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Coupon->create();
			if ($this->Coupon->save($this->request->data)) {
				$this->Flash->success(__('The coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coupon could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Coupon->Branch->find('list');
		$members = $this->Coupon->Member->find('list');
		$this->set(compact('branches', 'members'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Coupon->exists($id)) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Coupon->save($this->request->data)) {
				$this->Flash->success(__('The coupon has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The coupon could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
			$this->request->data = $this->Coupon->find('first', $options);
		}
		$branches = $this->Coupon->Branch->find('list');
		$members = $this->Coupon->Member->find('list');
		$this->set(compact('branches', 'members'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Coupon->id = $id;
		if (!$this->Coupon->exists()) {
			throw new NotFoundException(__('Invalid coupon'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Coupon->delete()) {
			$this->Flash->success(__('The coupon has been deleted.'));
		} else {
			$this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
