<?php

class PostsController extends AppController {
	public $helper = array('Html', 'Form');

	public function index() {
		$params = array(
			'order' => 'modified desc',
			'limit' => 2
		);
		$this->set('posts', $this->Post->find('all', $params));
		$this->set('title_for_layout', '記事一覧');
	}
}
