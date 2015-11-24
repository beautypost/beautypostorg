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
class dtbPresentHistory extends AppModel {
    public $name = 'dtbPresentHistory';
    var $useTable = 'dtb_present_history';    
   public $belongsTo = array(
        'dtbCustomer' => array(
            'className'     => 'dtbCustomer',
            'foreignKey'    => 'customer_id',
//            'conditions'    => array('Comment.status' => '1'),
//            'order'         => 'Comment.created DESC',
            'limit'         => '1',
            'dependent'     => true
        )
    );


    /**
    複数のITEMIDを受け取って複数のITEM情報を取得
    複数
    * @param sessionITEMS
    **/
    public function getCountItemsByPresentIDAndCustomerID($presentID,$customerID) {
        $conditions['conditions'] = array(
            'dtbPresentHistory.customer_id'=>$customerID,
            'dtbPresentHistory.present_id'=>$presentID
            );
        $ret = $this->find('count',$conditions);
        return $ret;
    }

        /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemsByID($itemID,$fields=array()) {
        if(!$itemID){return;}
        $conditions['conditions'] = array(
                            'present_id'=>$itemID,
                            );
        if($fields){
            $conditions['fields'] = $fields;
        }

        $all = $this->find('all',$conditions);
        return $all;
    }



        /**
    PRESENTIDを受け取ってPRESENTIDのカウント数を取得
    単数
    **/
    public function getCountApp($pID) {
        $conditions['conditions'] = array(
            'dtbPresentHistory.present_id'=>$pID
            );
        $ret = $this->find('count',$conditions);
        return $ret;
    }
}
