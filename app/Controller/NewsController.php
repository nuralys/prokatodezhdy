<?php

class NewsController extends AppController{
	public function admin_index(){
		$data = $this->News->find('all', array(
			'order' => array('id' => 'desc')
		));
		
		$this->set(compact('data'));
	}

	public function admin_add(){
		if($this->request->is('post')){
			$this->News->create();

			$slug = Inflector::slug($this->request->data['News']['title']);
			$slug = mb_strtolower($slug);
			$data[] = $this->request->data['News'];
			$data[] = array('alias'=>$slug);
			$data = array_merge($data[0],$data[1]);

			// debug($data);
			 if(!$data['img']['name']){
			 	unset($data['img']);
			}
			if($this->News->save($data)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				// debug($data);
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
	}
	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->News->exists($id)){
			throw new NotFoundException('Такой страницы нет...');
		}
		$data = $this->News->findById($id);
		if(!$id){
			throw new NotFoundException('Такой страницы нет...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->News->id = $id;
			$data1 = $this->request->data['News'];
			if(empty($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->News->save($data1)){
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
		if (!$this->News->exists($id)) {
			throw new NotFounddException('Такой статьи нет');
		}
		if($this->News->delete($id)){
			$this->Session->setFlash('Удалено', 'default', array(), 'good');
		}else{
			$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
		}
		return $this->redirect($this->referer());
	}

	public function index(){
		
		$title_for_layout = 'Новости';
		$data = $this->News->find('all', array(
			'order' => array('News.date' => 'desc')
		));
		// debug($news);
		$this->set(compact('data', 'title_for_layout'));
	}


	public function view($alias){
		$data = $this->News->findByAlias($alias);

		if(!$data){
			throw new NotFoundException('Такой страницы нет...');
		}

		$other_news = $this->News->find('all', array(
			'conditions' => array('News.alias !=' => $alias),
			'order' => array('News.date' => 'desc')
		));
		$title_for_layout = $data['News']['title'];
		$meta['keywords'] = $data['News']['keywords'];
		$meta['description'] = $data['News']['description'];

		$this->set(compact('data', 'title_for_layout', 'other_news', 'meta'));
	}

	
}