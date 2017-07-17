<?php
App::uses('AppController', 'Controller');
/**
 * Stamps Controller
 *
 * @property Stamp $Stamp
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class StampsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Stamp->recursive = 0;
		$this->set('stamps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Stamp->exists($id)) {
			throw new NotFoundException(__('Invalid stamp'));
		}
		$options = array('conditions' => array('Stamp.' . $this->Stamp->primaryKey => $id));
		$this->set('stamp', $this->Stamp->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stamp->create();
			if ($this->Stamp->save($this->request->data)) {
				$this->Flash->success(__('The stamp has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stamp could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Stamp->Branch->find('list');
		$members = $this->Stamp->Member->find('list');
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
		if (!$this->Stamp->exists($id)) {
			throw new NotFoundException(__('Invalid stamp'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stamp->save($this->request->data)) {
				$this->Flash->success(__('The stamp has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stamp could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stamp.' . $this->Stamp->primaryKey => $id));
			$this->request->data = $this->Stamp->find('first', $options);
		}
		$branches = $this->Stamp->Branch->find('list');
		$members = $this->Stamp->Member->find('list');
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
		$this->Stamp->id = $id;
		if (!$this->Stamp->exists()) {
			throw new NotFoundException(__('Invalid stamp'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Stamp->delete()) {
			$this->Flash->success(__('The stamp has been deleted.'));
		} else {
			$this->Flash->error(__('The stamp could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Stamp->recursive = 0;
		$this->set('stamps', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Stamp->exists($id)) {
			throw new NotFoundException(__('Invalid stamp'));
		}
		$options = array('conditions' => array('Stamp.' . $this->Stamp->primaryKey => $id));
		$this->set('stamp', $this->Stamp->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Stamp->create();
			if ($this->Stamp->save($this->request->data)) {
				$this->Flash->success(__('The stamp has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stamp could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Stamp->Branch->find('list');
		$members = $this->Stamp->Member->find('list');
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
		if (!$this->Stamp->exists($id)) {
			throw new NotFoundException(__('Invalid stamp'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Stamp->save($this->request->data)) {
				$this->Flash->success(__('The stamp has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The stamp could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Stamp.' . $this->Stamp->primaryKey => $id));
			$this->request->data = $this->Stamp->find('first', $options);
		}
		$branches = $this->Stamp->Branch->find('list');
		$members = $this->Stamp->Member->find('list');
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
		$this->Stamp->id = $id;
		if (!$this->Stamp->exists()) {
			throw new NotFoundException(__('Invalid stamp'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Stamp->delete()) {
			$this->Flash->success(__('The stamp has been deleted.'));
		} else {
			$this->Flash->error(__('The stamp could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
