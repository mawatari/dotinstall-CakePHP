<?php

class Post extends AppModel {
	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty',
			'message' => '空白とかｗｗｗ'
		),
		'body' => array(
			'rule' => 'notEmpty'
		)
	);
}
