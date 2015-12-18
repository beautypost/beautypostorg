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
class Item extends AppModel {
    public $name = 'Item';

    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = isset($Item[$k]) ? $Item[$k] : '';
        }
        return $all;

        $genres = array_merge($Item['GenreGenrePoints'],$Item['GenrePurposes']);

        $all['genres'] = $genres;

    }

    public function now(){
        return date('Y-m-d G:i:s');
    }


    public function skel(){
//        $ret['created'] = $this->now();
        $ret['id'] = '';

$ret['title'] = '';
$ret['img1'] = '';
$ret['img2'] = '';
$ret['img3'] = '';
$ret['img4'] = '';
$ret['img5'] = '';
$ret['img6'] = '';
$ret['img7'] = '';
$ret['img8'] = '';
$ret['img1up'] = '';
$ret['img2up'] = '';
$ret['img3up'] = '';
$ret['img4up'] = '';
$ret['img5up'] = '';
$ret['img6up'] = '';
$ret['img7up'] = '';
$ret['img8up'] = '';
$ret['maker'] = '';
$ret['makerurl'] = '';
$ret['salesdate'] = '';
$ret['price'] = '';
$ret['genres'] = array();
$ret['maker'] = '';
$ret['jancode'] = '';
$ret['comment'] = '';
$ret['genre_id'] = '';
$ret['size'] = '';
$ret['weight'] = '';
$ret['warranty'] = '';
$ret['set'] = '';
$ret['color'] = '';
$ret['movie'] = '';
$ret['example'] = '';
$ret['example_url'] = '';
$ret['rate'] = '';
$ret['recommends'] = '';
$ret['ico'] = '';
$ret['materials'] = '';
$ret['result'] = '';
$ret['cordinates'] = '';
$ret['country'] = '';
$ret['poscode'] = '';
$ret['code'] = '';
$ret['pr_site'] = '';
$ret['catalog'] = '';

//        $ret['url'] = '';
    return $ret;
    }

    /**
    GENRETOP (アイテム一覧)　のTOPで表示されるアイテム
    単数
    **/
    function getPointItems($genreID='',$limit=5) {
        $conditions['conditions'] = array(
                            'review >='=>1,
                            'valid'=>1,
                            );
        $conditions['order'] = array('review DESC');
        $conditions['limit'] = $limit;
        $all = $this->find('all',$conditions);
        return $all;
    }

    function getItemByInId($all){
        if(!is_array($all)){
            $all = explode(',',$all);
        }
        $conditions = array(
                            'id' => $all,
                            'valid'=>1,
//                            'otherid'=>1,
                            );
        $ret = $this->find('all',array('conditions'=>$conditions));

        return $ret;
    }


    /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemByID($itemID,$fields=array()) {
        if(!$itemID){return;}
        $conditions['conditions'] = array(
                            'id'=>$itemID,
                            'valid'=>1,
//                            'otherid'=>1,
                            );
        if($fields){
            $conditions['fields'] = $fields;
        }

        $all = $this->find('first',$conditions);
        return $all;
    }

    /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getRankingItems($limit=5) {
        $conditions['conditions'] = array(
                            'valid'=>1,
                            );
        $conditions['order']     = array('access'=>'DESC');
        $conditions['limit'] = $limit;
        return $this->find('all',$conditions);
    }

    /**
    複数のITEMIDを受け取って複数のITEM情報を取得
    複数
    * @param sessionITEMS
    **/
    public function getItems($conditions,$sort,$limit,$offset=0) {
        $con['conditions'] = $conditions;

        if(isset($sort)){
            $con['order'] = $this->getSort($sort);
        }
        $con['limit'] = $limit;
        $con['offset'] = $offset;
//        var_dump($con);
        $all = $this->find('all',$con);

        if(!defined('ADMINCONTROLLER')){
            $conditions['conditions']['valid'] = 1;
        }

//        var_dump($con);
        return $all;
    }


    public function invalid($id,$ret){
            $this->id = $id;
            $ret = ($ret == 0) ? 1: 0;
            $this->saveField('valid',$ret);
    }

    public function getSort($ite){
        switch($ite){
            case 0: $ret['access'] = 'DESC';break;//アクセス数
            case 1: $ret['monitor'] = 'DESC';break;//モニター評価
            case 2: $ret['review'] = 'DESC';break;//ユーザー評価
            case 3: $ret['wants'] = 'DESC';break;//want
            case 4: $ret['salesdate'] = 'ASC';break;//発売日
            case 5: $ret['price'] = 'ASC';break;//価格
            default: $ret['access'] = 'DESC';
        }

        return $ret;
    }



    public function getItemsCount($conditions){
        $con['conditions'] = $conditions;
        $count = $this->find('count',$con);
        return $count;
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

    public function getGenreIDByItemID($itemID){
        $conditions = array(
                            'id'=>$itemID,
                            'valid'=>1,
//                            'otherid'=>1,
                            );
        $all = $this->find('first',array('conditions'=>$conditions));

        return $all['Item']['genre_id'];

    }


}
