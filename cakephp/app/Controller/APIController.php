<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class APIController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash');

  
  // app/Controller/UserController.php
  public function beforeFilter() {
    parent::beforeFilter();
    $this->autoRender = FALSE;
    $this->Auth->allow('view', 'add', 'home', 'register', 'login', 'send_message', 'get_message', 'chat', 'get_news', 'get_coupons', 'get_stamps');

  }
  
  //chat用のUI
  public function chat() {
  	    $this->autoRender = TRUE;
         $this->loadModel('Message');
    	$messages =   $this->Message->find('all');
    	$this->set(compact('messages'));
		
		if ($this->request->is('post')) {
			$this->Message->create();
			//$this->log(var_export($this->request->data['Message']));
			
			/*
			$obj = (
				'contents' => $this->request->data['contents'],
				'is_receive' =>  0,
				'message_type' =>  1,
				'user_id' =>  1,
				'member_id' =>  1
			);
			*/
			$obj = array('Message' => 
				array(
				'contents' => $this->request->data['Message']['contents'],
				'is_receive' =>  0,
				'message_type' =>  1,
				'user_id' =>  1,
				'member_id' =>  1
				)
			);
			if ($this->Message->save($obj)) {
				$this->Flash->success(__('The message has been saved.'));
				return $this->redirect(array('action' => 'chat'));
			} else {
				$this->Flash->error(__('The message could not be saved. Please, try again.'));
			}
		}

    	//echo var_export($data);
  }
  
    /*
  	API for getting coupon information.
  */
  public function get_stamps() {
  	$this->log('get stamps..');
  	$this->autoRender = FALSE;
	$this->response->type('json');		
	// 今回はJSONのみを返すためViewのレンダーを無効化	    
	if($this->request->is('ajax')) {
		$this->log('This is ajax data.');
	}  	
	
	//if ($this->request->is('post')) {	    
		$this->log('method is post');
        $json_string = file_get_contents('php://input');
        $this->log(var_export($json_string, true));
        $obj = json_decode($json_string, true);
        
        $this->loadModel('Stamp');
 		$news_obj =   $this->Stamp->find('all');
		
		$stamps = array();

		foreach($news_obj as $val) {
			array_push($stamps, $val['Stamp']);
		}
		
	    $code = 1;
	    $this->log(var_export($stamps, true));
		return json_encode(compact('code', 'stamps'));		
	//}
  }
  
  /*
  	API for getting coupon information.
  */
  public function get_coupons() {
  	$this->log('get coupon..');
  	$this->autoRender = FALSE;
	$this->response->type('json');		
	// 今回はJSONのみを返すためViewのレンダーを無効化	    
	if($this->request->is('ajax')) {
		$this->log('This is ajax data.');
	}  	
	
	//if ($this->request->is('post')) {	    
		$this->log('method is post');
        $json_string = file_get_contents('php://input');
        $this->log(var_export($json_string, true));
        $obj = json_decode($json_string, true);
        
        $this->loadModel('Coupon');
 		$news_obj =   $this->Coupon->find('all');
		
		$coupons = array();

		foreach($news_obj as $val) {
			array_push($coupons, $val['Coupon']);
		}
		
	    $code = 1;
	    $this->log(var_export($coupons, true));
		return json_encode(compact('code', 'coupons'));		
	//}
  }
  
  /*
   * get news.
  */
  public function get_news() {
  	$this->log('get news..');
  	$this->autoRender = FALSE;
	$this->response->type('json');		
	// 今回はJSONのみを返すためViewのレンダーを無効化	    
	if($this->request->is('ajax')) {
		$this->log('This is ajax data.');
	}  	
	
	//if ($this->request->is('post')) {	    
		$this->log('method is post', LOG_DEBUG);
        $json_string = file_get_contents('php://input');
        $this->log(var_export($json_string, true));
        $obj = json_decode($json_string, true);
        
        $this->loadModel('News');
 		$news_obj =   $this->News->find('all');
		
		$news = array();

		foreach($news_obj as $val) {
			//array_push($val['News'], array('imageURL' => 'url'));
			$dirname = '../webroot/images/news/' . $val['News']['id'] . '/';
		    $this->log($dirname, LOG_DEBUG);
			if(file_exists($dirname . 'news.jpg')) {
				$val['News']['imageURL'] = 'news.jpg';
			} else if(file_exists($dirname . 'news.png')) {
				$val['News']['imageURL'] = 'news.png';		
			}
			
			array_push($news, $val['News']);
		}
		
	    $code = 1;
	    $this->log(var_export($news, true), LOG_DEBUG);
		return json_encode(compact('code', 'news'));		
	//}
  }
  
  public function get_message() {
  	$this->log('send message..');
  	$this->autoRender = FALSE;
	$this->response->type('json');		
	// 今回はJSONのみを返すためViewのレンダーを無効化	    
	if($this->request->is('ajax')) {
		$this->log('This is ajax data.');
	}
			//POSTデータ解析
	if ($this->request->is('post')) {	    
		$this->log('method is post');
        $json_string = file_get_contents('php://input');
        $this->log(var_export($json_string, true));
        $obj = json_decode($json_string, true);
        
        $this->loadModel('Message');
 		$messages =   $this->Message->find('all');

	    $code = 1;
		return json_encode(compact('code', 'messages'));		
	}
  }
  
  public function send_message() {
  	$this->log('send message..');
  	$this->autoRender = FALSE;
	$this->response->type('json');		
	// 今回はJSONのみを返すためViewのレンダーを無効化	    
	if($this->request->is('ajax')) {
		$this->log('This is ajax data.');
	}
			//POSTデータ解析
	if ($this->request->is('post')) {	    
		$this->log('method is post');
        $json_string = file_get_contents('php://input');
        $this->log(var_export($json_string, true));
        $obj = json_decode($json_string, true);
        
        $this->loadModel('Message');
 		$this->Message->create();
 		if ($this->Message->save($obj)) {
	            //ログイン成功
	            $this->log('Load success(1).');
	            $code = 1;
	    		return json_encode(compact('code'));
		} 
		$this->log('Something is wrong.(3).');
	    $code = 3;
	    $error = 'Something is wrong.';
	    $this->log($e->getMessage());
		return json_encode(compact('code', 'error'));		
		
	}
	//$this->log('This is ajax data.');
  }
  
  
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->News->recursive = 0;
		$this->set('news', $this->Paginator->paginate());
	}
	
	public function home() {
		$this->loadModel('Member');
		$this->loadModel('Slide');
		$options = array('conditions' => array('Member.' . $this->Member->primaryKey => '29'));
		$data = $this->Member->find('first', $options);
		echo var_dump($data);
	}
	
	public function login() {
	    $this->log('login');
	    $this->autoRender = FALSE;
	    // ContentTypeをJSONにする
	    $this->response->type('json');		
	    
	   	// 今回はJSONのみを返すためViewのレンダーを無効化	    
		if($this->request->is('ajax')) {
		    $this->log('This is ajax data.');
		}
		
		//POSTデータ解析
		if ($this->request->is('post')) {	    
		    $this->log('method is post');
            $json_string = file_get_contents('php://input');
            $this->log(var_export($json_string, true));
            $obj = json_decode($json_string, true);

            if(!isset($obj['username']) || $obj['username'] === '') {
                $this->log('User name is not set.');
		        $code = 2;
		        $error = 'User is not set.';
			    return json_encode(compact('code', 'error'));
            }
            
            try {
	            $this->log('Load Member module.username = '.$obj['username']);
	            $this->loadModel('Member');
	    		$this->Member->create();
	    		
	    		//2017/6/14 3:31 パスワード制御は後ほど追加すること。
			    $options = array('conditions' => array('Member.username' => $obj['username']));
			    
	            $this->log('Find member.');			    
				$data = $this->Member->find('first', $options);
	            
	            if($data == null) {
	            	//ログイン失敗
	            	$this->log('Login failure(3).');
	            	$code = 3;
	            	$error = 'Login failure becase no data is saved in the db.';
	    			return json_encode(compact('code', 'error'));
	            } else {
	            	//ログイン成功
	            	$this->log('Load success(1).');
	            	$code = 1;
	    			return json_encode(compact('code'));
	            }
	            $this->log(var_export($obj, true)); 
	         } catch(Exception $e) {
	         	//ユーザー検索失敗時の処理
    			$this->log('Could not find the specified user with an exception.(3).');
    		    $code = 3;
    		    $error = 'Could not find the specified user with an exception.';
    		    $this->log($e->getMessage());
    			return json_encode(compact('code', 'error'));		
	         }
         }
	}


/**
 * register method
 *
 * @return void
 */
    //code : 
    // success : 1
    // save error : 2
    // is not post data : 5
	public function register() {
	    $this->log('register');
	    $this->autoRender = FALSE;
	    // ContentTypeをJSONにする
	    $this->response->type('json');

	    // 今回はJSONのみを返すためViewのレンダーを無効化	    
		if($this->request->is('ajax')) {
		    $this->log('This is ajax data.');
		}
		if ($this->request->is('post')) {	    
		    $this->log('method is post');
		    
            $json_string = file_get_contents('php://input');
            $this->log(var_export($json_string, true));
            
            $obj = json_decode($json_string, true);
             
            $this->log(var_export($obj, true)); 
            //ユーザーなし
            if(!isset($obj['username']) || $obj['username'] === '') {
                $this->log('User name is not set.');
		        $code = 2;
		        $error = 'User is not set.';
			    return json_encode(compact('code', 'error'));
            }
            
            //Member作成、読み込み
			$this->loadModel('Member');
			$this->Member->create();
			try {
    			if ($this->Member->save($obj)) {
    			    //Create image directory
    			    //$this->log( 'Create a directory : ' .'../webroot/images/'.$this->User->id , LOG_DEBUG);
    			    if(!file_exists('../webroot/images/'.$this->Member->id)) {
    			            mkdir('../webroot/images/'.$this->Member->id, 0777, true);
    			    }
    			    $code = 1;
    			    return json_encode(compact('code'));
    			} else {
    			    //ユーザー作成失敗時の処理
    			    $this->log('User creation failure(2).');
    		        $code = 2;
    		        $error = 'Member creation failure.';
    			    return json_encode(compact('code', 'error'));
    			}
			} catch (Exception $e) {
    			//ユーザー作成失敗時の処理
    			$this->log('User creation failure(3).');
    		    $code = 3;
    		    $error = 'Member creation failure.';
    		    $this->log($e->getMessage());
    			return json_encode(compact('code', 'error'));			    
			}
		} else {
		    //MethodがPostでない
		    $code = 5;
		    $error = 'The method is not post.';
			return json_encode(compact('code', 'error'));
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
    	$this->autoRender = FALSE;
    	echo   $this->User->find('all');
  }

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->News->create();
			if ($this->News->save($this->request->data)) {
				$this->Flash->success(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		}
		$users = $this->News->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->News->save($this->request->data)) {
				$this->Flash->success(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
			$this->request->data = $this->News->find('first', $options);
		}
		$users = $this->News->User->find('list');
		$this->set(compact('users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->News->id = $id;
		if (!$this->News->exists()) {
			throw new NotFoundException(__('Invalid news'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->News->delete()) {
			$this->Flash->success(__('The news has been deleted.'));
		} else {
			$this->Flash->error(__('The news could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
