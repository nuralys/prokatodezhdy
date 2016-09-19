<?php

class CitiesController extends AppController{
	//public $uses = array('City', 'Product');
	//public $components = array('Paginator');

	public function admin_index(){
		$data = $this->City->find('list');
		$this->set(compact('data'));
	}

	public function index($alias = null){
		//$data = $this->City->findByAlias($alias);
		// debug($this->request->params['pass'][1]);
		if(isset($this->request->params['pass'][1]) && !empty($this->request->params['pass'][1])){
			$data = $this->City->Category->findByAlias($this->request->params['pass'][1]);
			// debug($data);
		}
		return $this->set(compact('data'));
	}

	public function view($alias){
		$data = $this->City->findByAlias($alias);
		if (!$data) {
			throw new NotFounddException('Такой категории не существует');
		}
		// debug($data);
		return $this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			
			$this->City->create();
			$data = $this->request->data['City'];
			
			if($this->City->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		$c_list = $this->City->find('list');
		return $this->set(compact('c_list'));

	}

	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->City->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->City->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->City->id = $id;
			$data1 = $this->request->data['City'];
			
			
			if($this->City->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$c_list = $this->City->find('list');
			$this->set(compact('id', 'data', 'c_list'));
		}
	}

	public function admin_delete($id){
		if (!$this->City->exists($id)) {
			throw new NotFounddException('Такой категории нету');
		}
		if($this->City->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

}