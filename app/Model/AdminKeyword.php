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
class AdminKeyword extends AppModel {
    public $name = 'AdminKeyword';

    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = isset($Item[$k]) ? $Item[$k] : '';
        }
        return $all;

        $genres = array_merge($Item['GenreGenrePoints'],$Item['GenrePurposes']);

        $all['genres'] = $genres;

    }

    public function skel(){
//        $ret['created'] = $this->now();
        $ret['id'] = '';
        $ret['title'] = '';
        $ret['url'] = '';
//        $ret['tag'] = '';
        $ret['valid'] = '';
        $ret['created'] = '';
//        $ret['url'] = '';
    return $ret;
    }

    public function now(){
        return date('Y-m-d G:i:s');
    }

    /**
    GENRETOP (アイテム一覧)　のTOPで表示されるアイテム
    単数
    **/
    public function getItems() {
        $conditions = array();
//         $conditions['conditions'] = array(
// //                            'genre_id'=>$genreID,
// //                            'toprecommend'=>1,
//                             'valid'=>1
//                             );
        if(!defined('ADMINCONTROLLER')){
            $conditions['conditions']['valid'] = 1;
        }
        $all = $this->find('all',$conditions);
        return $all;
    }

    public function getBest(){
        $con['conditions'] = array(
                            'valid'=>1,
                            );
        $con['limit'] = 5;
            $con['order'] = 'created DESC';
        $all = $this->find('all',$con);
        return $all;
    }


    public function getItemByID($id){
        if(!$id){return;}
        $conditions = array(
                            'id'=>$id,
//                            'toprecommend'=>1,
                            'valid'=>1
                            );
        $all = $this->find('first',array('conditions'=>$conditions));
        return $all;
    }

    public function getItemByIDS($id){
        if(!$id){return;}
        $conditions = array(
                            'id'=>$id,
//                            'toprecommend'=>1,
                            'valid'=>1
                            );
        $all = $this->find('all',array('conditions'=>$conditions));
        return $all;
    }

    public function invalid($id,$ret){
            $this->id = $id;
            $ret = ($ret == 0) ? 1: 0;
            $this->saveField('valid',$ret);
    }

    public function countUp($itemID){
        $r = $this->getItemByID($itemID);
        $r['Actress']['count']++;
        $this->create();
        $this->save($r);
    }


}
