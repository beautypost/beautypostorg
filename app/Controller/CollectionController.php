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
class CollectionController extends AppController {


	public $components = array('ItemC','MetaC','MailC');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','RecommendItem','Webrequest','ItemsReview','UserVote');


	public function beforeFilter() {
    	parent::beforeFilter();
		$this->set('cssname','content');
		$this->set('bodyclass','page-collection');
        //検索box用マスタ
        $this->setSearchMaster();

	}

	public function beforeRender(){
        //マスタ
        $this->set('AllGenreNames',$this->Genre->getAllGenreName());
        //部位マスタ
        $this->set('PointGenres',$this->Genre->getPointGenre());


		parent::beforeRender();
	}

	/**
	 * 一覧TOP
	  一覧ページTOP
	 * @param genreID sort limit offset
	 */
	public function index() {

		$data = '';
		if(isset($this->params['url']['data']['SearchData'])){
			$data = unserialize(base64_decode($this->params['url']['data']['SearchData']));
		}
		//getで受け取ったdataをセット
		$data = $this->setRequestGetValues($data);
		$this->set('data',$data);

		//検索用パラメータ作成
		$conditions = $this->ItemC->setItemValueSearch($data);

		//pageing
		$sort = isset($data['sort']) ? $data['sort'] : '';
		$limit = isset($data['limit']) ? $data['limit'] : 10;
		$p = isset($data['p']) ? $data['p'] : 0;

		$items = $this->Item->getItems($conditions,$sort,$limit,$p);

		$this->set('Items',$items);

		//検索条件でのmaxcount
		$total = $this->Item->getItemsCount($conditions);
		//pagerを作成
		$pager = $this->Pager->getPager($total,$p,$limit);

		$this->set('totalcount',$total);

		$this->set('Pager',$pager);

		return;
	}


	public function detail($id){
		//getで受け取ったdataをセット

		$item = $this->Item->getItemByID($id);
		$this->set('Item',$item);

		$wants = $this->Want->getItemsByItemID($id);
		$this->set('Wants',$wants);

		$reviews = $this->ItemsReview->getItemsByItemID($id);
		$this->set('Reviews',$reviews);
//		var_dump($reviews);

	}



}
