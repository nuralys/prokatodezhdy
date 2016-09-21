<?php

class City extends AppModel {
	public $hasAndBelongsToMany = array(
        'Category' =>
            array(
                'className' => 'Category',
                'joinTable' => 'cities_categories',
                
            )
            );
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'Введите название'
        )
    );
}