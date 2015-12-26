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
class Question extends AppModel {
    public $name = 'Question';

    public $hasMany = array(
        'QuestionValue' => array(
            'className' => 'QuestionValue',
            'conditions' => array('value !=' => ''),
            'order' => 'id'
        )
    );
    public function invalid($id,$ret){
            $this->id = $id;
            $ret = ($ret == 0) ? 1: 0;
            $this->saveField('valid',$ret);
    }
    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = $Item[$k];
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
        $ret['number'] = '';
        $ret['start'] = '';
        $ret['end'] = '';
//        $ret['url'] = '';
    return $ret;
    }

    /**
    ITEMIDを利用して、リコメンドITEMを取得
    複数
    **/
    public function getItems($limit='',$offset=0,$order='') {
        $date =date('Y-m-d 00:00:00');
//        var_dump($date);
        $conditions = array(
//            'conditions'=> array('item_id'=>$id),
            'order'     => array('start DESC'),
            'conditions'=>array(
                'and'=>array(
                array('start <='=>$date,
//                    'end >='=>$date
                    ),
                ),
            )
            );

        if($limit){
            $conditions['limit'] = $limit;
        }

        if($offset){
            $conditions['offset'] = $offset;
        }

        if(!defined('ADMINCONTROLLER')){
            $conditions['conditions']['valid'] = 1;
        }

        $all = $this->find('all',$conditions);

        foreach($all as $k => $v){
            $total = 0;
            foreach($v['QuestionValue'] as $kk => $vv){
                $total +=$vv['points'];
            }
//            var_dump($total);
            $all[$k]['Question']['totalpoints'] = $total;
        }
        return $all;
    }

    public function getItemByID($id) {
        $conditions = array(
            'conditions'=> array('id'=>$id),
            );

        $all = $this->find('first',$conditions);
        return $all;
    }

    public function getItemsCount($conditions){
        $con = '';
        if($conditions){
            $con['conditions'] = $conditions;
        }


        $count = $this->find('count',$con);
        return $count;
    }

    /**
    ITEMIDを利用して、リコメンドITEMを取得
    複数
    **/
    public function getNewQuestion() {
        $conditions = array(
//            'conditions'=> array('valid'=>1),
            'order'     => array('start DESC'),
            );

        $all = $this->find('first',$conditions);
        return $all;
    }

}
