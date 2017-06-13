<?php
App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class SignsupController extends AppController {
        
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('register');
//         $this->Security->csrfCheck = false;
    }
    
/**
 * Components
 *
 * @var array
 */

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
}