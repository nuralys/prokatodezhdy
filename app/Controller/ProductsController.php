<?php

class ProductsController extends AppController{
	public function admin_index(){
		$data = $this->Product->find('all', array(
			'order' => array('Product.id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->Product->create();
			$data = $this->request->data['Product'];
			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->Product->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Product->id = $id;
			$data1 = $this->request->data['Product'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Product->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$categories = $this->Product->Category->find('list');
			$this->set(compact('id', 'data', 'categories'));
		}
	}

	public function admin_delete($id){
		if (!$this->Product->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->Product->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Новости';
		$data = $this->Product->find('all', array(
			'order' => array('Product.id' => 'desc')
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($id){
		if(is_null($id) || !(int)$id || !$this->Product->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->Product->findById($id);
		$user_id = $data['Category']['user_id'];
		$ui = $this->Product->Category->User->findById($user_id);

		$title_for_layout = $data['Product']['title'];

		$this->set(compact('data', 'title_for_layout', 'ui'));
	}

	public function search(){
		$search = !empty($_GET['q']) ? $_GET['q'] : null ;
		if( is_null($search)){
			return $this->set('search_res', 'Введите поисковый запрос');
		}
		$search_res = $this->Product->find('all', array(
			'conditions' => array('Product.title LIKE' => '%'.$search.'%')
			));
		$title_for_layout = 'Поиск';
		$this->set(compact('search_res', 'title_for_layout'));
		
	}

	public function edit($id){
		if(!$this->Auth->user()){
			return $this->redirect('/users/login');
		}

		$data = $this->Auth->user();
		$id = $data['id'];
		$data = $this->User->find('first', array(
			'conditions' => array('User.id' => $id),
		'recursive' => -1));
	}

	
}