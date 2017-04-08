<?php
App::uses('AppController', 'Controller');
/**
 * Slides Controller
 *
 * @property Slide $Slide
 * @property PaginatorComponent $Paginator
 */
class SlidesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'HNDImage');

	public function download() {
		
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Slide->recursive = 0;
		$this->set('slides', $this->Paginator->paginate());
	}
	
		//投稿
	public function post() {
		if ($this->request->is('post')) {
			$this->Slide->create();
			
			//Get a file name
			$fileName1 = $this->request->data['Slides']['image1'];
			$fileName2 = $this->request->data['Slides']['image2'];
			$fileName3 = $this->request->data['Slides']['image3'];
			
			//Get file data
			$fileData1 = $fileName1['tmp_name'];
			$fileData2 = $fileName2['tmp_name'];
			$fileData3 = $fileName3['tmp_name'];

			//$this->request->data['News']['image'] = file_get_contents($fileName);
			//Save the post.
			$this->Slide->create();
			$this->request->data['Slides']['image1'] = $fileData1;
			$this->request->data['Slides']['image2'] = $fileData2;
			$this->request->data['Slides']['image3'] = $fileData3;

			if ($this->Slide->save($this->request->data)) {
				$ext1 = $this->HNDImage->getExtention($fileData1);
				$ext2 = $this->HNDImage->getExtention($fileData2);
				$ext3 = $this->HNDImage->getExtention($fileData3);

				//格納用ディレクトリ作成
				if(!file_exists($this->createImageDirectory($this->Slide->Branch->id))) {
			    		$this->log( 'Create a directory : ' .$this->createImageDirectory($this->Slide->Branch->id) , LOG_DEBUG);
			            mkdir($this->createImageDirectory($this->Slide->Branch->id), 0777, true);
			    }

				//Move to the file to a specific folder.
				//File name is upload imageXX.jpg
				$uploadedFileName1 =  'image1'.'.'.$ext1;
				$uploadedFileName2 =  'image1'.'.'.$ext1;
				$uploadedFileName3 =  'image3'.'.'.$ext1;

				move_uploaded_file($fileData,'../webroot/images/'.$this->Slide->Branch->id.'/'.$uploadedFileName1);
				move_uploaded_file($fileData,'../webroot/images/'.$this->Slide->Branch->id.'/'.$uploadedFileName2);
				move_uploaded_file($fileData,'../webroot/images/'.$this->Slide->Branch->id.'/'.$uploadedFileName3);

				//$this->HNDImage->registerImage($this->request->data['News']['image']['tmp_name'] , $this->request->user_id . '_' .  $this->News->id);
				$this->Flash->success(__('The news has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The news could not be saved. Please, try again.'));
			}
		}
		//$users = $this->Slides->User->find('list');
		//$this->set(compact('users'));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
		$this->set('slide', $this->Slide->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Slide->create();
			if ($this->Slide->save($this->request->data)) {
				$this->Flash->success(__('The slide has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The slide could not be saved. Please, try again.'));
			}
		}
		$branches = $this->Slide->Branch->find('list');
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
		if (!$this->Slide->exists($id)) {
			throw new NotFoundException(__('Invalid slide'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Slide->save($this->request->data)) {
				$this->Flash->success(__('The slide has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The slide could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Slide.' . $this->Slide->primaryKey => $id));
			$this->request->data = $this->Slide->find('first', $options);
		}
		$branches = $this->Slide->Branch->find('list');
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
		$this->Slide->id = $id;
		if (!$this->Slide->exists()) {
			throw new NotFoundException(__('Invalid slide'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Slide->delete()) {
			$this->Flash->success(__('The slide has been deleted.'));
		} else {
			$this->Flash->error(__('The slide could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
