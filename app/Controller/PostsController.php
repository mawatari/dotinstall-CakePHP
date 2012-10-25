<?php

class PostsController extends AppController {

	public $helper = array('Html', 'Form');

	public function index() {
		$params = array(
			'order' => 'modified desc',
		);
		$this->set('posts', $this->Post->find('all', $params));
		$this->set('title_for_layout', '記事一覧');
	}

	public function view($id = null) {
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}

	public function add() {
		if ($this->request->is('post')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('Success!');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('failed!');
			}
		}
	}

	public function edit($id = null) {
		$this->Post->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Post->read();
		} else {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('success!');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('failed!');
			}
		}
	}

	public function delete($id = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash('Deleted!');
			$this->redirect(array('action' => 'index'));
		}
	}

}
