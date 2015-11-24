<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class NewsController extends AppController {


	public $components = array('ItemC','MetaC','MailC','BlogC');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','Blog','Webrequest');

	public function beforeRender(){
		$this->set('bodyclass','page-news');
		$this->set('cssname','content');
		$sort['count'] = 'DESC';
		$this->set('BlogAccess',$this->Blog->getItems($sort,BLOGPAGESUBLIMIT,0,''));
		$sort['created'] = 'DESC';
		$this->set('BlogNew',$this->Blog->getItems($sort,BLOGPAGESUBLIMIT,0,''));
    // // 価格
    $this->set('GenreBlogs',$this->Genre->getBlog());

	}


	public function index($tag='',$offset=''){

		//一覧表示
		$sort['created'] = 'DESC';
		$items = $this->Blog->getItems($sort,BLOGPAGELIMIT,$offset,$tag);

		$this->set('Blogs',$items);

	}

	public function detail($id){

		if($id>0){
			$item = $this->Blog->getItemByID($id,'');
			if(!$item){
				return;
			}
			//カウントアップ
			$this->Blog->setCountUp($item);
			$this->set('Blog',$item);
			$this->render('detail');
			return;
		}

	}


}
