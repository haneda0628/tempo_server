<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');
  
  // app/Controller/UserController.php
  public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('login', 'add', 'all_api');
  }
    
  /*
  This is the top screen after login.
  @param void
  @return void
  */
  public function home() {
    
  }
  
  
  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function all_api($id = null) {
    $this->autoRender = FALSE;
    echo  json_encode($this->User->find('all'));
  }
  
  // app/Controller/UserController.php
  public function login() {
    $this->layout = 'hndLoginLayout';
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }
  }

  
  // app/Controller/UserController.php
  public function login2() {
    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        $this->redirect($this->Auth->redirect());
      } else {
        $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }
  }
  
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
			    //Create image directory
			    $this->log( 'Create a directory : ' .'../webroot/images/'.$this->User->id , LOG_DEBUG);
			    if(!file_exists('../webroot/images/'.$this->User->id)) {
			            mkdir('../webroot/images/'.$this->User->id, 0777, true);
			    }
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		}
		$branches = $this->User->Branch->find('list');
		$this->set(compact('branches'));
	}

/**
 * add method
 *
 * @return void
 */
    //code : 
    // success : 1
    // save error : 2
    // is not post data : 5
	public function register() {
	    // 今回はJSONのみを返すためViewのレンダーを無効化
		$this->viewClass = 'Json';
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
			    //Create image directory
			    $this->log( 'Create a directory : ' .'../webroot/images/'.$this->User->id , LOG_DEBUG);
			    if(!file_exists('../webroot/images/'.$this->User->id)) {
			            mkdir('../webroot/images/'.$this->User->id, 0777, true);
			    }
			    $this->set('code','1');
			    $this->set('_serialize', array('code'));
			} else {
			    $this->set('code','2');
			    $this->set('_serialize', array('code'));

			}
		} else {
		    $this->set('code','5');
			$this->set('_serialize', array('code'));
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Flash->success(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$branches = $this->User->Branch->find('list');
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Flash->success(__('The user has been deleted.'));
		} else {
			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
