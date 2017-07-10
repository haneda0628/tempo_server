<?php
App::uses('AppController', 'Controller');
/**
 * News Controller
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class NewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'HNDImage');

    public function beforeFilter() {
        parent::beforeFilter();
		$this->Auth->allow('newslist');
		$this->Auth->allow('get_with_json');
		//         $this->Security->csrfCheck = false;
    }
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->log('news view.', LOG_DEBUG);
		$this->News->recursive = 0;
		$this->set('news', $this->Paginator->paginate());


	}

	public function newslist() {
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->log('news view.', LOG_DEBUG);
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
	}
	
	public function get_with_json($id = null) {
		$this->News->recursive = 0;
		$this->set('news', $this->Paginator->paginate());
		$this->viewClass = 'Json';
		$this->set('_serialize', array('news'));
	}

	public function imgview($id = null) {
		header('Content-type: image/jpeg');
		$news = $this->News->findById($id);
		$this->set('news', $news);
		echo $news['News']['image'];	
	}

/**
 * add method
 *
 * @return void
 */
 /*
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
*/
	/*
	 * Post news.
	 * 
	*/
	public function add() {
		$this->log('post news.', LOG_DEBUG);

		if ($this->request->is('post')) {
			$this->News->create();

			//Get a file name
			$fileName = $this->request->data['News']['image'];
			
			//Get file data
			$fileData = $fileName['tmp_name'];

			//$this->request->data['News']['image'] = file_get_contents($fileName);
			//Save the post.
			$this->News->create();
			$this->request->data['News']['image'] = $fileData;
		
			$this->log($this->request->data, LOG_DEBUG);

			if ($this->News->save($this->request->data)) {
				$ext = $this->getExtention($fileData);
				$this->log('save news.');
				//Move to the file to a specific folder.
				//File name is upload(user id)_(id).jpg
				
				//$uploadedFileName = $this->News->id.'_'.date('YmdHis').'.'.$ext;
				/*
				 * The file name is always 'news'.
				*/
				$uploadedFileName = 'news.' . $ext;
			    if(!file_exists($this->createImageDirectory($this->News->id))) {
			    		$this->log( 'Create a directory : ' .$this->createImageDirectory($this->News->User->Branch->id) , LOG_DEBUG);
			            mkdir($this->createImageDirectory($this->News->id), 0777, true);
			    }
				move_uploaded_file($fileData,$this->createImageDirectory($this->News->id).'/'.$uploadedFileName);
				$this->Flash->success(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		}

		$users = $this->News->User->find('list');
		$this->set(compact('users'));
	}
	
	
	public function createImageDirectory($name) {
		$this->log('save news.', LOG_DEBUG);
		return '../webroot/images/news/' . $name;
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

	
	//一時ファイルの拡張子取得関数
	private function getExtention($file) {
		$tmp_size = getimagesize($file); // 一時ファイルの情報を取得
		$img = $extension = null;
		switch ($tmp_size[2]) { // 画像の種類を判別
    		case 1 : // GIF
        		$img = imageCreateFromGIF($file);
        		$extension = 'gif';
        		break;
    		case 2 : // JPEG
        		$img = imageCreateFromJPEG($file);
        		$extension = 'jpg';
        		break;
    		case 3 : // PNG
        		$img = imageCreateFromPNG($file);
        		$extension = 'png';
        		break;
    		default : break;
		}
		return $extension;
	}
}
