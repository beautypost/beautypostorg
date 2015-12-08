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
class ColumnController extends AppController {


	public $components = array('ItemC','MetaC','MailC','BlogC');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','Column','Webrequest');

	public function beforeFilter(){
		$this->set('bodyclass','page-column');
		$this->set('cssname','content');

	}

	public function beforeRender(){
        //マスタ
        $this->set('AllGenreNames',$this->Genre->getAllGenreName());
        //部位マスタ
        $this->set('PointGenres',$this->Genre->getPointGenre());


		parent::beforeRender();
	}

	public function index($tag='',$offset=''){

		//pageing
		$sort = isset($data['sort']) ? $data['sort'] : '';
		$limit = isset($data['limit']) ? $data['limit'] : 10;
		$p = isset($data['p']) ? $data['p'] : 0;

		//一覧表示
		$sort['created'] = 'DESC';
		$items = $this->Column->getItems($sort,BLOGPAGELIMIT,$offset,$tag);

		$this->set('Columns',$items);

		//検索条件でのmaxcount
		$total = $this->Column->getItemsAllCount('','');
		//pagerを作成
		$pager = $this->Pager->getPager($total,$p,$limit);

		$this->set('totalcount',$total);

		$this->set('Pager',$pager);


	}

	public function detail($id){

		$item = $this->Column->getItemByID($id,'');

		if(count($item) == 0){
	        return $this->redirect(
	            array('controller' => 'pages', 'action' => '404')
	        );
		}
		$tag = '';
		//カウントアップ
		$this->Column->setCountUp($item);

		$this->set('Column',$item);

		$all = $this->Column->getItems('','','',$tag);
		$pager = $this->Pager->getPagerDetail($all,'Column',$id);
		$this->set('Pager',$pager);

	}


}
