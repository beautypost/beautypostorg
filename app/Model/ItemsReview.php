<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class ItemsReview extends AppModel {
    public $name = 'ItemsReview';
    public $belongsTo = array(
        'SnsUser' => array(
            'className' => 'Snsuser',
            'foreignKey' => 'user_id',
//            'conditions'=>array(),
//            'dependent' => true,
            'order' => 'ItemsReview.created'
        )
    );

    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = isset($Item[$k]) ? $Item[$k] : '';
        }
        return $all;
    }

    public function now(){
        return date('Y-m-d G:i:s');
    }


    public function skel(){
//        $ret['created'] = $this->now();
        $ret['id'] = '';
        $ret['item_id'] ='';
        $ret['user_id'] ='';
        $ret['title'] = '';
        $ret['comment'] ='';
        $ret['point1'] ='';
        $ret['point2'] ='';
        $ret['point3'] ='';
        $ret['point4'] ='';
        $ret['point5'] ='';
        $ret['valid'] = '';
    return $ret;
    }

    public function invalid($id,$ret){
            $this->id = $id;
            $ret = ($ret == 0) ? 1: 0;
            $this->saveField('valid',$ret);
    }


    /**
    GENRETOP (アイテム一覧)　のTOPで表示されるアイテム
    単数
    **/
    function getItemGenreTop($genreID) {
        $conditions = array(
                            'genre_id'=>$genreID,
//                            'valid'=>1
                            );
        $all = $this->find('first',array('conditions'=>$conditions));
        return $all;
    }

    /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemByID($itemID) {
        if(!$itemID){return;}
        $conditions = array(
                            'id'=>$itemID,
                           'ItemsReview.valid'=>1
                            );
        $all = $this->find('first',array('conditions'=>$conditions));
        return $all;
    }



    /**
    複数のITEMIDを受け取って複数のITEM情報を取得
    複数
    * @param sessionITEMS
    **/
    public function getItems($sort='',$limit=100,$offset=0) {
        $conditions = array(
//                            'conditions'=> array('ItemsReview.valid'=>1),
                            'limit'     => $limit,
                            'offset'    => $offset
                            );

        if($sort){
            $conditions['order']     = array($sort['key']=>$sort['value']);
        }

        $all = $this->find('all',$conditions);
        return $all;
    }

    public function getItemsByUserID($userID){

            $conditions = array('user_id'=>$userID);
            $all = $this->find('all',array('conditions'=>$conditions));
            $itemids = array();
//            var_dump($all);
            foreach($all as $k => $v){
                $itemids[] = $v['ItemsReview']['item_id'];
            }

            App::import('Model','Item');
            $item = new Item();
            $ret = $item->getItemByInId($itemids);

        return $ret;
    }

    /**
     ジャンルID　並び順　表示件数　開始番号　を受け取ってITEM情報を取得
     複数
     * @param genreID sort limit offset
    **/
    public function getItemsByItemID($itemID) {
        $conditions = array(
            'conditions'=> array('item_id'=>$itemID,'ItemsReview.valid'=>1),
            // 'order'     => array($sort['key']=>$sort['value']),
            // 'limit'     => $limit,
            // 'offset'    => $offset
            );

        if(ADMINCONTROLLER){
            $conditions['conditions']['ItemsReview.valid'] = '';
        }

        $all = $this->find('all',$conditions);
        $ret = array();
        foreach($all as $k => $v){
            $v['ItemsReview']['total'] = ($v['ItemsReview']['point1'] + $v['ItemsReview']['point2'] + $v['ItemsReview']['point3'] + $v['ItemsReview']['point4'] + $v['ItemsReview']['point5']) /5;
            $ret[$k] = $v;
        }

        return $ret;
    }

    public function getReviewCountByitemID($itemID){
        $conditions = array(
            'conditions'=> array('item_id'=>$itemID)
            );
        return $this->find('count',$conditions);
    }


    public function getTotalReviewByAll($tr){
        $p1 = $p2 = $p3 = $p4 = $p5 = 0;
        foreach($tr as $k=>$v){
            $p1 +=$v['ItemsReview']['point1'];
            $p2 +=$v['ItemsReview']['point2'];
            $p3 +=$v['ItemsReview']['point3'];
            $p4 +=$v['ItemsReview']['point4'];
            $p5 +=$v['ItemsReview']['point5'];
        }
        $total = count($tr);

        $r['p1'] = $p1 / $total;
        $r['p2'] = $p2 / $total;
        $r['p3'] = $p3 / $total;
        $r['p4'] = $p4 / $total;
        $r['p5'] = $p5 / $total;
        $r['total'] = ($p1+$p2+$p3+$p4+$p5) / ($total*5);
        return $r;
    }

    /**
    検索ワードを受け取ってITEM情報を取得
    複数
    **/
    public function getItemsBySearchWords($searchWords) {
        $conditions = array(
            'conditions'=> array('OR'=>array('name Like'=>'%'.$searchWords.'%')),
//            'order'     => array('id'=>
            );

        $all = $this->find('all',$conditions);
        return $all;
    }


}
