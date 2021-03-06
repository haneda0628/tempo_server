<?php
App::uses('AppController', 'Controller');

/**
 * Messages Controller
 *
 * @property Message $Message
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

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
		$this->Message->recursive = 0;
 		$this->loadModel('MembersBranch');
		$this->Paginator->settings = array(
				'conditions' => array( 'MembersBranch.branch_id' => $this->Auth->user('branch_id')),
				'limit' => 10		
		);
		$data = $this->Paginator->paginate('MembersBranch');
		$this->log($data, LOG_DEBUG);
		
		$this->set('membersbranches', $data);
	}
	
	/**
	* view_messages method
 	*
 	* @return void
 	*/	
	public function viewMessages($memberId = null) {
		/*
		* Get member as $memberId.
		*/
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect($this->referer());
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$this->loadModel('MembersBranch');
			$this->log("view messages : memberId id = " .  $memberId, LOG_DEBUG);
			if (!$this->MembersBranch->Member->exists($memberId)) {
				$this->log("view messages : memberId doesn't exist.($memberId)" , LOG_DEBUG);
				throw new NotFoundException(__('Invalid message'));
			}
		}
		$data = $this->Paginator->settings = array('conditions' => array('Message.member_id = ' . $memberId));		
		$data = $this->Paginator->paginate('Message');
		$this->log($data, LOG_DEBUG);
		$this->set('messages', $data);
		
		/*
		* 
		*/
		$user = $this->Auth->user();
		$this->log( $user , LOG_DEBUG);
		
		$this->set(compact('memberId', 'user'));
	}
	
	/**
 * index method
 *
 * @return void
 */
	public function messages() {
		$this->Message->recursive = 0;
		$this->loadModel('MembersBranch');

		$data = $this->MembersBranch->find(
			'all',
			array(
				'conditions' => array( 'MembersBranch.branch_id' => $this->Auth->user('branch_id'))
			)
		);
		
		$this->log($data, LOG_DEBUG);
		$this->Paginator->settings = array(
        	'conditions' => array('Message.member_id' => '1'),
        	'limit' => 10
    	);
    	
		$this->set('messages', $this->Paginator->paginate());
	}

	public function messageForMembers() {
		$this->Message->recursive = 0;
		$this->Paginator->settings = array(
        	'conditions' => array('Message.member_id' => '1'),
        	'limit' => 10
    	);
		$this->set('messages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		}
		$members = $this->Message->Member->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('members', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		$members = $this->Message->Member->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('members', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Message->delete()) {
			$this->Flash->success(__('The message has been deleted.'));
		} else {
			$this->Flash->error(__('The message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
		$this->set('message', $this->Message->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Message->create();
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		}
		$members = $this->Message->Member->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('members', 'users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Message->exists($id)) {
			throw new NotFoundException(__('Invalid message'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Message->save($this->request->data)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
			$this->request->data = $this->Message->find('first', $options);
		}
		$members = $this->Message->Member->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('members', 'users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Message->id = $id;
		if (!$this->Message->exists()) {
			throw new NotFoundException(__('Invalid message'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Message->delete()) {
			$this->Flash->success(__('The message has been deleted.'));
		} else {
			$this->Flash->error(__('The message could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
