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
			
			$cat_id = $this->Category->find('first', array(
				'conditions' => array('Category.alias'=>$this->request->params['pass'][1]),
				'recursive'=>-1));
			$cat_id = $cat_id['Category']['id'];

			$city_id = $this->Category->User->City->find('first', array(
				'conditions' => array('City.alias'=>$this->request->params['pass'][0]),
				'recursive'=>-1));
			$city_id = $city_id['City']['id'];
			$user = $this->Category->User->find('first', array(
				'conditions' => array('User.city_id'=>$city_id),
				'AND' => array('User.category_id'=>$cat_id),
				'recursive'=>-1));
			$user_id = $user['User']['id'];
			$products = $this->Category->User->Product->find('all', array(
				'conditions' => array('Product.user_id'=>$user_id),
				'recursive'=>-1
			));
			$accessories = $this->Category->User->Accessory->find('all', array(
				'conditions' => array('Accessory.user_id'=>$user_id),
				'recursive'=>-1
			));
			$title_for_layout = $user['User']['meta_title'];
			$meta['keywords'] = $user['User']['keywords'];
			$meta['description'] = $user['User']['description'];
		return $this->set(compact('products', 'accessories', 'user', 'title_for_layout', 'meta'));
		}
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
			$this->set(compact('id', 'data'));
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