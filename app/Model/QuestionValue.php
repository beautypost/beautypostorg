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
class QuestionValue extends AppModel {
    public $name = 'QuestionValue';



    /**
    ITEMIDを利用して、リコメンドITEMを取得
    複数
    **/
    public function getItemByID($id) {
        $conditions = array(
            'conditions'=> array('id'=>$id),
            );

        $all = $this->find('first',$conditions);
        return $all;
    }


    function deleteItemByItemID($itemID){

        $delid = $this->getItemsByItemID($itemID,'id');
        foreach($delid as $did){

            $this->delete($did['QuestionValue']['id']);
        }
    }

    public function getItemsByItemID($itemID,$fields=array()) {
        $conditions = array(
            'conditions'=> array('question_id'=>$itemID),
//            'order'     => array($sort['key']=>$sort['value']),
//            'limit'     => $limit,
//            'offset'    => $offset
            );

        if($fields){
            $conditions['fields'] = $fields;
        }

        $all = $this->find('all',$conditions);
        return $all;
    }



}