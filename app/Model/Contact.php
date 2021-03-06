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
class Contact extends AppModel {
    var $useTable = false;
    var $name = 'Contact';
    public $validate = array(
        'email' =>array(
            array('rule'=>array('email',true),'message'=>'正しいメールアドレスを入力してください'),
            'custom'=>array('rule' => 'CheckEmail','message'=>'メールアドレス・メールアドレス（確認）には同じものをご入力ください')
            ),
        'name' =>array('rule'=>array('notEmpty'),'message'=>'お名前を入力してください'),
        'comment' =>array('rule'=>array('notEmpty'),'message'=>'お問い合わせ内容を入力'),

    );

    public function checkEmail(){


      if($this->data['Contact']['email'] != $this->data['Contact']['email2']){
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
        $ret['title'] = '';
        $ret['name'] = '';
		$ret['email2'] = '';
		$ret['email'] = '';
		$ret['comment'] = '';
		return $ret;
	}

	public function titledata(){
		$ret = array();
		$ret[0] = '商品・サービスに関して';
		$ret[1] = 'メンバー登録について';
		$ret[2] = 'メール配信について';
        $ret[3] = 'モニター応募について';
        $ret[4] = 'その他';

		return $ret;
	}

	public function getTitleByID($id){
		$ret = $this->titledata();
		return $ret[$id];
	}

}
