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
}
