<?php
// App::uses('CakeEmail', 'Network/Email');

class PagesController extends AppController {

	public $uses = array('Page', 'News', 'Category', 'Slide');

	public function home(){
		$page = $this->Page->findById(1);
		// $this->Category->City->recursive = 0;
		// $this->Category->recursive = 0;
		// $cats = $this->Category->find('first', array(
		// 		'conditions' => array('Category.id'=>1),
		// 		'recursive'=>-1));
		$cat = array();
		$cat['sp'] = $this->Category->User->find('all', array(
			'conditions' => array('Category.id'=>1)
		));
		$cat['vp'] = $this->Category->User->find('all', array(
			'conditions' => array('Category.id'=>2)
		));
		$cat['mk'] = $this->Category->User->find('all', array(
			'conditions' => array('Category.id'=>3)
		));
		$cat['do'] = $this->Category->User->find('all', array(
			'conditions' => array('Category.id'=>4)
		));

		$first_news = $this->News->find('first', array(
			'order' => array('News.date' => 'desc')
		));
		$other_news = $this->News->find('all', array(
			'order' => array('News.date' => 'desc'),
			'limit' => 5
		));
		$shift_other_news = array_shift($other_news);
		
		$slides = $this->Slide->find('all');
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$this->set(compact('title_for_layout', 'page', 'meta', 'first_news', 'other_news', 'cats', 'cat', 'slides'));
	}

	public function admin_index(){
		$data = $this->Page->find('all');
		$title_for_layout = 'Pages';
		$this->set(compact('data', 'title_for_layout'));
	}

	public function index($page_alias = null){
		if(is_null($page_alias)){
			throw new NotFoundException("Такой страницы нету");
		}
		$page = $this->Page->findByAlias($page_alias);
		if(!$page){
			throw new NotFoundException("Такой страницы нету");
		}
		
		$title_for_layout = $page['Page']['title'];
		$meta['keywords'] = $page['Page']['keywords'];
		$meta['description'] = $page['Page']['description'];
		$this->set(compact('page_alias', 'page', 'title_for_layout', 'meta'));
	}


	public function admin_edit($id){
		if(is_null($id) || !(int)$id || !$this->Page->exists($id)){
			throw new NotFoundException('Not found...');
		}
		$data = $this->Page->findById($id);
		if(!$id){
			throw new NotFoundException('Not found...');
		}
		if($this->request->is(array('post', 'put'))){
			$this->Page->id = $id;
			$data1 = $this->request->data['Page'];
			if(!isset($data1['img']['name']) || !$data1['img']['name']){
				unset($data1['img']);
			}
			if($this->Page->save($data1)){
				$this->Session->setFlash('Сохранено', 'default', array(), 'good');
				return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка', 'default', array(), 'bad');
			}
		}
		//Заполняем данные в форме
		if(!$this->request->data){
			$this->request->data = $data;
			$title_for_layout = 'Editing material';
			$this->set(compact('id', 'data', 'title_for_layout'));
		}
	}

	public function contactus(){

		if( !empty($this->request->data) ){
			$email = new CakeEmail('smtp');
			$email->from(array('info@uxui.kz' => 'Usability Lab'))
			->to('info@uxui.kz')
			->subject('New letter');
			$message = 'Name: '. $this->request->data['Page']['name'] . ' Телефон: '. $this->request->data['Page']['phone'];
			if( $email->send($message) ){
				$this->Session->setFlash('Письмо успешно отправлено', 'default', array(), 'good');
				//unset($message);
				// return $this->redirect($this->referer());
			}else{
				$this->Session->setFlash('Ошибка!', 'default', array(), 'bad');
				return $this->redirect($this->referer());
			}
		}
	}
}
