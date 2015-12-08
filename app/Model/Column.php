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
class Column extends AppModel {
    public $name = 'Column';



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
        $ret['title'] = '';
        $ret['comment'] = '';
        $ret['tag'] = '';
        $ret['valid'] = '';
        $ret['created'] = '';
        $ret['entrydate'] = '';
//        $ret['url'] = '';
    return $ret;
    }


    public function checkAdminID($id){

    if($id ==''){return;}
        if(strstr(ADMINID,$id)){
            return true;
        }
        return;
    }


    /**
    GENRETOP (アイテム一覧)　のTOPで表示されるアイテム
    単数
    **/
    public function getItemGenreTop($genreID) {
        $conditions = array(
                            'genre_id'=>$genreID,
                            'valid'=>1,
                            'created <='=>$this->now()
                            );
        $all = $this->find('first',array('conditions'=>$conditions));
        return $all;
    }

    public function getBlogsByIDs($items,$userID){

        if(!$items){return;}
        $items = explode(',',$items);

        if($this->checkAdminID($userID)){
            $conditions = array('id'=>$items);
        }else{
            $conditions = array('id'=>$items,'valid'=>1,'created <='=>$this->now());
        }

        $all = $this->find('all',array('conditions'=>$conditions));
        return $all;
    }

    /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemByID($itemID,$userID) {

            $conditions['conditions'] = array('id'=>$itemID);

        if(!defined('ADMINCONTROLLER')){
            $conditions['conditions']['valid'] = 1;
        }

        $all = $this->find('first',$conditions);
        return $all;
    }


    public function invalid($id,$ret){
            $this->id = $id;
            $ret = ($ret == 0) ? 1: 0;
            $this->saveField('valid',$ret);
    }

    /**
    複数のITEMIDを受け取って複数のITEM情報を取得
    複数
    * @param sessionITEMS
    **/
    public function getItems($sort='',$limit='',$offset='',$tag='') {
        $conditions = array();
        // if(!$this->checkAdminID($userID)){
        //     $conditions['conditions'][] = array('valid'=>1,'created <='=>$this->now());
        // }
        // if($genreID){
        //     $conditions['conditions'][] = array('genre_id'=>$genreID);
        // }
        if($tag){
            $conditions['conditions'][] = array('tag'=>$tag);
        }

        if($sort){
            $conditions['order']     = $sort;
        }
        if($limit){
            $conditions['limit']     = $limit;
        }
        if($offset){
            $conditions['offset']    = $offset;
        }

        if(!defined('ADMINCONTROLLER')){
            $conditions['conditions']['valid'] = 1;
        }


        $all = $this->find('all',$conditions);
        return $all;
    }


    public function getItemsAllCount($userID,$genreID){
        $conditions = array();
        if(!$this->checkAdminID($userID)){
            $conditions['conditions'][] = array('valid'=>1,'created <='=>$this->now());
        }
        if($genreID){
            $conditions['conditions'][] = array('genre_id'=>$genreID);
        }

        $count = $this->find('count',$conditions);
        return $count;
    }



    /**
     ジャンルID　並び順　表示件数　開始番号　を受け取ってITEM情報を取得
     複数
     * @param genreID sort limit offset
    **/
    public function getItemsByGenreID($userID,$genreID,$sort,$limit,$offset) {
        if($this->checkAdminID($userID)){
        $conditions = array(
            'conditions'=> array('genre_id'=>$genreID),
            'order'     => array($sort['key']=>$sort['value']),
            'limit'     => $limit,
            'offset'    => $offset
            );
        }else{
        $conditions = array(
            'conditions'=> array('genre_id'=>$genreID,'valid'=>1,'created <='=>$this->now()),
            'order'     => array($sort['key']=>$sort['value']),
            'limit'     => $limit,
            'offset'    => $offset
            );

        }
        $all = $this->find('all',$conditions);

        return $all;
    }

    public function getItemsCountByGenreID($genreID) {
        $conditions = array(
            'conditions'=> array('genre_id'=>$genreID,'valid'=>1),
            );

        $all = $this->find('count',$conditions);

        return $all;
    }

    public function getItemCountByAllGenre($genres){
        $ret_genres = array();
        foreach($genres as $genre){
            $count = $this->getItemsCountByGenreID($genre['id']);
            if($count > 0){
                $ret_genres[$genre['id']] = $genre;
            }
        }
        return $ret_genres;
    }


    /**
    検索ワードを受け取ってITEM情報を取得
    複数
    **/
    public function getItemsBySearchWords($searchWords) {
        $conditions = array(
            'conditions'=> array('OR'=>array('name LIke'=>'%'.$searchWords.'%','catchcopy LIke'=>'%'.$searchWords.'%')),
//            'order'     => array('id'=>
            );

        $all = $this->find('all',$conditions);
        return $all;
    }


    public function setCountUp($item){
        $hits = $item['Column']['count'] +1;
        $data = array(
            'Column' => array(
                'id' => $item['Column']['id'],
                'count' => $hits,
                'modified' => false
            )
        );
        $this->save($data, false, array('count'));
        //記事中で紹介されたサイト

    }


}
