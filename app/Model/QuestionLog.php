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
class QuestionLog extends AppModel {
    public $name = 'QuestionLog';


    /**
    ITEMIDを利用して、リコメンドITEMを取得
    複数
    **/
    public function getItemBySessionAndID($question_id,$session) {
        $conditions = array(
            'conditions'=> array(
                'question_id'=>$question_id,
                'session'=>$session
                ),
            );

        return $this->find('count',$conditions);
    }

    /**
    ITEMIDを利用して、リコメンドITEMを取得
    複数
    **/
    public function getNewQuestion() {
        $conditions = array(
//            'conditions'=> array('valid'=>1),
            'order'     => array('created'),
            );

        $all = $this->find('first',$conditions);
        return $all;
    }

}
