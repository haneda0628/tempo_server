<?php
App::uses('AppController', 'Controller');
/**
 * MembersBranches Controller
 *
 * @property MembersBranch $MembersBranch
 * @property PaginatorComponent $Paginator
 */
class MembersBranchesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MembersBranch->recursive = 0;
		$this->set('membersBranches', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MembersBranch->exists($id)) {
			throw new NotFoundException(__('Invalid members branch'));
		}
		$options = array('conditions' => array('MembersBranch.' . $this->MembersBranch->primaryKey => $id));
		$this->set('membersBranch', $this->MembersBranch->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MembersBranch->create();
			if ($this->MembersBranch->save($this->request->data)) {
				$this->Flash->success(__('The members branch has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The members branch could not be saved. Please, try again.'));
			}
		}
		$branches = $this->MembersBranch->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MembersBranch->exists($id)) {
			throw new NotFoundException(__('Invalid members branch'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MembersBranch->save($this->request->data)) {
				$this->Flash->success(__('The members branch has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The members branch could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MembersBranch.' . $this->MembersBranch->primaryKey => $id));
			$this->request->data = $this->MembersBranch->find('first', $options);
		}
		$branches = $this->MembersBranch->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MembersBranch->id = $id;
		if (!$this->MembersBranch->exists()) {
			throw new NotFoundException(__('Invalid members branch'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MembersBranch->delete()) {
			$this->Flash->success(__('The members branch has been deleted.'));
		} else {
			$this->Flash->error(__('The members branch could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MembersBranch->recursive = 0;
		$this->set('membersBranches', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MembersBranch->exists($id)) {
			throw new NotFoundException(__('Invalid members branch'));
		}
		$options = array('conditions' => array('MembersBranch.' . $this->MembersBranch->primaryKey => $id));
		$this->set('membersBranch', $this->MembersBranch->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MembersBranch->create();
			if ($this->MembersBranch->save($this->request->data)) {
				$this->Flash->success(__('The members branch has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The members branch could not be saved. Please, try again.'));
			}
		}
		$branches = $this->MembersBranch->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MembersBranch->exists($id)) {
			throw new NotFoundException(__('Invalid members branch'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MembersBranch->save($this->request->data)) {
				$this->Flash->success(__('The members branch has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The members branch could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MembersBranch.' . $this->MembersBranch->primaryKey => $id));
			$this->request->data = $this->MembersBranch->find('first', $options);
		}
		$branches = $this->MembersBranch->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->MembersBranch->id = $id;
		if (!$this->MembersBranch->exists()) {
			throw new NotFoundException(__('Invalid members branch'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->MembersBranch->delete()) {
			$this->Flash->success(__('The members branch has been deleted.'));
		} else {
			$this->Flash->error(__('The members branch could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
