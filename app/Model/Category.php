<?php

class Category extends AppModel {

	public $hasMany = array(
		'User' => array(
		        'className'  => 'User',
		     )
	    );
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите название'
	        ),
	        'alias' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите alias'
	        )
	    );
}