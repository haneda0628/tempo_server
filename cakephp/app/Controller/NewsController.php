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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->News->recursive = 0;
		$this->set('news', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->News->exists($id)) {
			throw new NotFoundException(__('Invalid news'));
		}
		$options = array('conditions' => array('News.' . $this->News->primaryKey => $id));
		$this->set('news', $this->News->find('first', $options));
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

	//投稿
	public function post() {

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

			if ($this->News->save($this->request->data)) {
				$ext = $this->getExtention($fileData);

				//Move to the file to a specific folder.
				//File name is upload(user id)_(id).jpg
				
				$uploadedFileName = $this->News->id.'_'.date('YmdHis').'.'.$ext;
			    if(!file_exists($this->createImageDirectory($this->News->User->id))) {
			    		$this->log( 'Create a directory : ' .$this->createImageDirectory($this->News->User->id) , LOG_DEBUG);
			            mkdir($this->createImageDirectory($this->News->User->id), 0777, true);
			    }
				move_uploaded_file($fileData,$this->createImageDirectory($this->News->User->id).'/'.$uploadedFileName);
				$this->Flash->success(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		}

		$users = $this->News->User->find('list');
		$this->set(compact('users'));
	}
	public function createImageDirectory($userId) {
		return '../webroot/images/'.$userId. '/news';
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
