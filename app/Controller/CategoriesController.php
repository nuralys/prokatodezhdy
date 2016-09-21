<?php

class CategoriesController extends AppController{
	public $uses = array('Category', 'Product');
	public $components = array('Paginator');

	public function admin_index(){
		$data = $this->Category->find('list');
		$this->set(compact('data'));
	}

	public function index(){
		if(isset($this->request->params['pass'][1]) && !empty($this->request->params['pass'][1])){
			
			$city_id = $this->Category->City->find('first', array(
				'conditions' => array('alias'=>$this->request->params['pass'][0]),
				'fields' => 'City.id',
				// 'recursive' => -1
			));
			// debug($city_id);
			// $cat_id = $city_id['Category']['id'];
			$city_id = $city_id['City']['id'];
			// $this->Category->bindModel(array(
			//     'hasAndBelongsToMany' => array(
			//         'City' => array('conditions' => array('alias'=>$this->request->params['pass'][0]),
			// 			'joinTable' => 'cities_categories',
			//         )),
			//     'hasMany' => array(
			//         'Product' => array('conditions' => array(
			//         	'Product.city_id'=>$city_id,
			//         	'recursive' => -1
			//         	//'Product.categor_id' => 
			//         	)
			//         )
			//      ),
			//     'hasMany' => array(
			//         'Accessory' => array('conditions' => array('Accessory.city_id'=>$city_id))
			//         )
			//     )
			    
			// );
			// $data2 = $this->Category->find('all');
			
			// debug($data2);
			// die;
			// $this->Category->bindModel(array(
			//     'hasMany' => array(
			//         'Product' => array('conditions' => array('Product.city_id'=>$city_id))
			//         )
			//     )
			// );
			// $product
			$data = $this->Category->find('first', array(
				'conditions' => array(
					'Category.alias' => $this->request->params['pass'][1],
					//'AND' => array('Product.city_id' => 2)
					// 'Product.city_id' => $city_id,

					),
				// 'recursive' => -1

			));
			// debug($data);
			$user_id = $data['Category']['user_id'];
			// debug($user_id);
			$ui = $this->Category->User->findById($user_id);
		}
		return $this->set(compact('data', 'ui'));
	}

	public function view($alias){
		$data = $this->Category->findByAlias($alias);
		if (!$data) {
			throw new NotFounddException('Такой категории не существует');
		}
		// debug($data);
		return $this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			$this->Category->create();
			$data = $this->request->data['Category'];
			
			if($this->Category->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$c_list = $this->Category->find('list');
		return $this->set(compact('c_list'));

	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Category->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Category->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Category->id = $id;
			$data1 = $this->request->data['Category'];
			
			
			if($this->Category->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$c_list = $this->Category->find('list');
			$this->set(compact('id', 'data', 'c_list'));
		}
	}

	public function admin_delete($id){
		if (!$this->Category->exists($id)) {
			throw new NotFounddException('Такой категории нету');
		}
		if($this->Category->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}