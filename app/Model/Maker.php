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
App::import('Sanitize');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Maker extends AppModel {
    var $useTable = false;
    var $name = 'Maker';
    public $validate = array(
        'company' =>array('rule'=>array('notEmpty'),'message'=>'御社名を入力してください'),
        'name' =>array('rule'=>array('notEmpty'),'message'=>'お名前を入力してください'),
        'email' =>array(
            array('rule'=>array('email',true),'message'=>'正しいメールアドレスを入力してください'),
            'custom'=>array('rule' => 'CheckEmail','message'=>'メールアドレス・メールアドレス（確認）には同じものをご入力ください')
            ),
        'tel' =>array('rule'=>array('notEmpty'),'message'=>'電話番号を入力してください'),
        'zip1' =>array('rule'=>array('notEmpty'),'message'=>'郵便番号1を入力してください'),
        'zip2' =>array('rule'=>array('notEmpty'),'message'=>'郵便番号2を入力してください'),
        'message' =>array('rule'=>array('notEmpty'),'message'=>'お問い合わせ内容を入力してください'),
    );

    public function checkEmail(){


      if($this->data['Maker']['email'] != $this->data['Maker']['email2']){
        return false;
      }else{
        return true;
      }


    }

    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = isset($Item[$k]) ? $Item[$k]:'';
        }

        return $all;

    }

	public function skel(){
        $ret['company'] = '';
        $ret['group'] = '';
        $ret['name'] = '';
		$ret['email2'] = '';
        $ret['email'] = '';
        $ret['tel'] = '';
        $ret['address'] = '';
        $ret['zip1'] = '';
        $ret['zip2'] = '';
        $ret['website'] = '';
		$ret['message'] = '';
		return $ret;
	}


	public function getTitleByID($id){
		$ret = $this->titledata();
		return $ret[$id];
	}

}
