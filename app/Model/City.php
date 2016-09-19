<?php

class City extends AppModel {
	public $hasMany =  'Category';
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty',
            'message' => 'Введите название'
        )
    );
}