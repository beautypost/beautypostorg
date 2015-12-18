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
	public $uses = array('ItemsAccess','Item','RecommendItem','Webrequest','ItemsReview','UserVote','ItemsMonitor');


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
		//want情報
		$wants = $this->Want->getItems();

		$this->set('Wants',$wants);

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
		}else{
			$data = $this->setRequestGetValues($data);
		}

//var_dump($data);
		//pageing
		$data['sort'] = $sort = isset($data['sort']) ? $data['sort'] : '';
		$data['limit'] = $limit = isset($data['limit']) ? $data['limit'] : 10;

		//getで受け取ったdataをセット

		$this->set('data',$data);

		//検索用パラメータ作成
		$conditions = $this->ItemC->setItemValueSearch($data);

		$p = isset($this->params['url']['p']) ? $this->params['url']['p'] : 0;

		$items = $this->Item->getItems($conditions,$data['sort'],$data['limit'],$p);


		$reviewall = array();
		foreach($items as $k => $v){

			//レビュー情報
			$reviews = $this->ItemsReview->getItemsByItemID($v['Item']['id']);

	        $r['total'] = 0;
	        if(count($reviews) != 0){
		        $r = $this->ItemsReview->getTotalReviewByAll($reviews);
	        }
	        $reviewall[$v['Item']['id']]['star'] = $r['total'];
	        $reviewall[$v['Item']['id']]['count'] = count($reviews);


	        //attr情報
	        //genre_id でgenre_attr取得　/sort
//	        $genreAttr = $this->GenreAttr->getItemsByGenreID($v['Item']['genre_id']);
	        //genre_attr_id と item_id で値を取得

		}

		$this->set('ItemsReview',$reviewall);

		$this->set('Items',$items);

		//検索条件でのmaxcount
		$total = $this->Item->getItemsCount($conditions);
		//pagerを作成
		$pager = $this->Pager->getPager($total,$p,$data['limit']);

		$this->set('totalcount',$total);

		$this->set('Pager',$pager);

		$r = $this->Session->read('ItemCompare');
		$this->set('ItemCompare',$r);

		return;
	}


	public function detail($id){
		//getで受け取ったdataをセット

		$item = $this->Item->getItemByID($id);

		if(count($item) == 0){
        	return $this->redirect(array('controller' => 'pages', 'action' => '404'));
        }


		$this->set('Item',$item);

		$this->Item->id = $item['Item']['id'];

		$this->Item->saveField('access',$item['Item']['access']+1);


		//レビュー情報
		$reviews = $this->ItemsReview->getItemsByItemID($id);
        $this->set('Reviews',$reviews);

        $r = array();
        if(count($reviews) != 0){
	        $r = $this->ItemsReview->getTotalReviewByAll($reviews);
        }

        $this->set('totalreview',$r);

		//モニター情報
		$reviews = $this->ItemsMonitor->getItemsByItemID($id);
		$this->set('Monitors',$reviews);
        $r = array();
        if(count($reviews) != 0){
	        $r = $this->ItemsMonitor->getTotalReviewByAll($reviews);
        }



		//関連商品
		$materials = $this->Item->getItemByInId($item['Item']['materials']);
		$this->set('Materials',$materials);
		//コーディネート商品

		$cordinates = $this->Item->getItemByInId($item['Item']['cordinates']);
		$this->set('Coordinates',$cordinates);

		//アクセス保存
		$this->ItemsAccess->create();
		$item['item_id'] = $id;
		$this->ItemsAccess->save($item);

		$attr = $this->Genre->getAttr($item['Item']['genre_id']);
		$this->set('GenreAttr',$attr);


//		var_dump($reviews);

	}



}
