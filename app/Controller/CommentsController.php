<?php

class CommentsController extends AppController {

	public $helper = array('Html', 'Form');

	public function add() {
		if ($this->request->is('post')) {
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('Success!');
				$this->redirect(array('controller' => 'posts', 'action' => 'views', $this->data['Comment']['post_id']));
			} else {
				$this->Session->setFlash('failed!');
			}
		}
	}

}
