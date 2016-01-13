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
class CompareController extends AppController {


	public $components = array('ItemC','MetaC','MailC','Pager','RequestHandler');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('ItemsReview','GenreAttrItem','Attr','GenreAttr','Item','RecommendItem','Webrequest','Blog','UserVote');


	public function beforeFilter() {
    	parent::beforeFilter();
		$this->set('cssname','content');
		$this->set('bodyclass','page-collection');

	}

	public function beforeRender(){
        //マスタ
        $this->set('AllGenreNames',$this->Genre->getAllGenreName());
        //部位マスタ
        $this->set('PointGenres',$this->Genre->getPointGenre());
        //アイコンマスタ
        $this->set('Icos',$this->Genre->getItemIcon());
//        $this->set('Compare',$this->Genre->getCompareTitle());
        $this->set('CompareKey',$this->Genre->getCompareKey());

        //検索box用マスタ
        $this->setSearchMaster();

		parent::beforeRender();
	}

	/**
	 * 一覧TOP
	  一覧ページTOP
	 * @param genreID sort limit offset
	 */
	public function index() {


        $compare = $this->setRequestGetValue('compare');
        if(!$compare){
            $compare = 0;
        }
        $this->set('compare',$compare);

        $all = $this->Session->read('ItemCompare');
//        var_dump($all);
//		$all = array(111,177,185);
		$items = $this->Item->getItemByInId($all);
//var_dump(count($items));
		$this->set('Items',$items);
        $itemgenre = $reviews = array();
        foreach($items as $item){
            $itemgenre[$item['Item']['genre_id']] = $item['Item']['genre_id'];
            $reviews[$item['Item']['id']] = $this->ItemsReview->getItemsByItemID($item['Item']['id']);
        }
    $ats = $atrs = $rr = $ats2 = $itemGenreValues = array();
    $attrs = $this->GenreAttr->getItemBygenreID($itemgenre);

    foreach($attrs as $at){

//        if(isset($at['genreAttr'])){
        $atrs[$at['GenreAttr']['genre_id']][] = $at['GenreAttr']['attr_id'];
        $ats[] = $at['GenreAttr']['attr_id'];
        $atss[$at['GenreAttr']['id']] = $at['GenreAttr']['attr_id'];
        $ats2[$at['GenreAttr']['attr_id']] = $at['GenreAttr']['attr_id'];
//    }
    }
    //var_dump($atss);
    //var_dump($atrs);
    $atItems = $this->Attr->getItemsByID($ats);

    foreach($atItems as $i){
        $r[$i['Attr']['id']] =$i['Attr']['title'];
    }

    //var_dump($r);

    //var_dump($atItems);
    foreach($atrs as $k => $v){
        foreach($v as $vv){
            $rr[$k][$vv] = $r[$vv];
        }
    //$atrs['key'] = $ats$v
    }

    $this->set('genres',$rr);
    //var_dump($ats2);
    foreach($ats2 as $k => $v){
        foreach($items as $item){
            $itemGenreValues[$v][$item['Item']['id']] = $this->GenreAttrItem->getItemByItemIDAndAttrID($item['Item']['id'],$v);
        }
    }

    $this->set('itemGenreValues',$itemGenreValues);



    //レビュー情報
    $this->set('Reviews',$reviews);

    $r = $rvr = array();
    foreach($reviews as $k => $rev){

    if(count($rev) != 0){
        $r[$k] = $this->ItemsReview->getTotalReviewByAll($rev);
        $r[$k]['count'] = count($rev);
    }
    }


    foreach($items as $item){
        $rvr['count'][$item['Item']['id']]  = isset($r[$item['Item']['id']]['count']) ?$r[$item['Item']['id']]['count']:'';
        $rvr['total'][$item['Item']['id']] = isset($r[$item['Item']['id']]['total']) ? $r[$item['Item']['id']]['total'] : '';
        $rvr['p1'][$item['Item']['id']] = isset($r[$item['Item']['id']]['p1']) ? $r[$item['Item']['id']]['p1']:'';
        $rvr['p2'][$item['Item']['id']] = isset($r[$item['Item']['id']]['p2']) ? $r[$item['Item']['id']]['p2']:'';
        $rvr['p3'][$item['Item']['id']] = isset($r[$item['Item']['id']]['p3']) ? $r[$item['Item']['id']]['p3']:'';
        $rvr['p4'][$item['Item']['id']] = isset($r[$item['Item']['id']]['p4']) ? $r[$item['Item']['id']]['p4']:'';
        $rvr['p5'][$item['Item']['id']] = isset($r[$item['Item']['id']]['p5']) ? $r[$item['Item']['id']]['p5']:'';

    }

    $this->set('totalreview',$rvr);
    //var_dump($rvr);


		if(!$this->RequestHandler->isMobile()){
            $this->layout = null;
			$this->render('popup');
		}else{

            $compare = array();
            foreach($rr as $k => $genre){
                foreach($genre as $kk=>$val){
                    $compare[$kk] =$val;
                }
            }


            $this->set('Compare',$compare);


        }

		return;
	}


	public function detail($id){
		//getで受け取ったdataをセット

		$item = $this->Item->getItemByID($id);
		$this->set('Item',$item);
	}



}
