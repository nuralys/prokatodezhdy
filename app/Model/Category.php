<?php

class Category extends AppModel {
	public $hasAndBelongsToMany = array(
        'City' =>
            array(
                'className' => 'City',
                'joinTable' => 'cities_categories',
                'foreignKey' => 'category_id',
                'associationForeignKey' => 'city_id',
            )
        );
	// public $recursive = 1;
	public $belongsTo = array(
			// 'City' => array(
	  //          'className'  => 'City',
	  //          'joinTable' => 'cities_categories',
	  //           // 'conditions' => array('Recipe.approved' => '1'),
	  //           // 'order'      => 'Recipe.created DESC'
	  //       ),
	        'User' => array(
	            'className'  => 'User',
	            // 'conditions' => array('Recipe.approved' => '1'),
	            // 'order'      => 'Recipe.created DESC'
	        ),
	       
		);

	public $hasMany = array(
	        'Product' => array(
	            'className'  => 'Product',
	            // 'conditions' => array('Recipe.approved' => '1'),
	            // 'order'      => 'Recipe.created DESC'
	        ),
	        'Accessory' => array(
	            'className'  => 'Accessory',
	            // 'recursive' => 2
	            // 'conditions' => array('Recipe.approved' => '1'),
	            // 'order'      => 'Recipe.created DESC'
	        ),
	  //       'City' => array(
	  //          'className'  => 'City',
	  //          'joinTable' => 'cities_categories',
	  // //           // 'conditions' => array('Recipe.approved' => '1'),
	  // //           // 'order'      => 'Recipe.created DESC'
	  //       )
	    );
	public $validate = array(
	        'title' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Введите название'
	        )
	    );
}