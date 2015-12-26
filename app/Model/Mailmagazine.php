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
class Mailmagazine extends AppModel {
    public $name = 'Mailmagazine';
//    var $useTable = 'dtb_mailmagazine';

    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = isset($Item[$k]) ? $Item[$k] : '';
        }
        return $all;

    }

    public function skel(){
//        $ret['created'] = $this->now();
        $ret['id'] = '';

$ret['send_date'] = '';
$ret['send_flag'] = '';
$ret['title'] = '';
$ret['body'] = '';
$ret['comment'] = '';
$ret['number'] = '';
$ret['send_exec_date'] = '';

//        $ret['url'] = '';
    return $ret;
    }


    /**
    複数のITEMIDを受け取って複数のITEM情報を取得
    複数
    * @param sessionITEMS
    **/
    public function getItems($limit,$offset) {
            $conditions = array();
            $conditions['limit']     = $limit;
            $conditions['offset']    = $offset;


        $all = $this->find('all',$conditions);
        return $all;
    }

        /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemByID($itemID,$fields=array()) {
        if(!$itemID){return;}
        $conditions['conditions'] = array(
                            'id'=>$itemID,
                            );
        if($fields){
            $conditions['fields'] = $fields;
        }

        $all = $this->find('first',$conditions);
        return $all;
    }

    public function getItemsBytime(){

        $now = date('Y-m-d G:i:00');

        $conditions['conditions'] = array('send_date <'=>$now,'send_flag'=>0);
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

    public function setTime($id){

        $data = $this->getItemByID($id);
        $data['dtbMailmagazine']['send_flag'] = 1;
        $data['dtbMailmagazine']['send_exec_date'] = date('Y-m-d G:i:00');
        $this->create();
        $this->save($data);
    }

}
