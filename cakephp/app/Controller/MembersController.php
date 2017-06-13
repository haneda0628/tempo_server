<?php
App::uses('AppController', 'Controller');
/**
 * Members Controller
 *
 * @property Member $Member
 * @property PaginatorComponent $Paginator
 */
class MembersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

  
  
  
  public function register($id = null) {
    $this->autoRender = FALSE;
    $val = json_encode($this->request->data);
    if ($this->request->is('post')) {
      $this->Member->create();
      if ($this->Member->save($this->request->data)) {
        echo 'ok';
        //$this->Flash->success(__('The member has been saved.'));
        //return $this->redirect(array('action' => 'index'));
      } else {
        //$this->Flash->error(__('The member could not be saved. Please, try again.'));
        echo 'ng';
      }
    }
  }

  
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Member->recursive = 0;
		$this->set('members', $this->Paginator->paginate());
	}
  
  // app/Controller/UserController.php
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('register', 'add', 'all_api');
  }

//    echo 'ok';
    //var_dump($this->request->data);
    //キーがPOST内容になっているので
//    foreach($this->request->data as $key => $value){
//      $data = $key;
//      echo $data;
//    }
    //PHPで使える配列に。
    //$data = json_decode($data,true);
    //echo $data;
    //echo 'OK';
    //$this->Member->create();
    //if ($this->Member->save($this->request->data)) {
    //  echo 'ok';
    //} else {
    //  echo 'ng';
    //}
  
  

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
		$this->set('member', $this->Member->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Member->create();
			if ($this->Member->save($this->request->data)) {
				$this->Flash->success(__('The member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The member could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Member->exists($id)) {
			throw new NotFoundException(__('Invalid member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Member->save($this->request->data)) {
				$this->Flash->success(__('The member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Member.' . $this->Member->primaryKey => $id));
			$this->request->data = $this->Member->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Member->id = $id;
		if (!$this->Member->exists()) {
			throw new NotFoundException(__('Invalid member'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Member->delete()) {
			$this->Flash->success(__('The member has been deleted.'));
		} else {
			$this->Flash->error(__('The member could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
