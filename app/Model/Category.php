<?php

class Category extends AppModel {
	public $belongsTo = 'City';
	// public $hasOne = 'User';
	public $hasMany = array(
	        'Product' => array(
	            'className'  => 'Product',
	            // 'conditions' => array('Recipe.approved' => '1'),
	            // 'order'      => 'Recipe.created DESC'
	        ),
	        'Accessory' => array(
	            'className'  => 'Accessory',
	            // 'conditions' => array('Recipe.approved' => '1'),
	            // 'order'      => 'Recipe.created DESC'
	        )
	    );
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите название'
	        )
	    );
}