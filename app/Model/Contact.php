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
    var $validate = array(
        'title' =>array('rule' => array('notEmpty'),'required'=>true,'message'=>'タイトルを選択してください'),
        'onamae' =>array('rule'=>array('notEmpty'),'message'=>'お名前を入力してください'),
        'email' => array('rule' => array('email', true),'message' => 'メールアドレスを正しく入力してください。'),
        'comment' =>array('rule'=>array('notEmpty'),'message'=>'お問い合せ内容を入力してください')
        );


	public function skel(){
		$ret['title'] = '';
		$ret['onamae'] = '';
		$ret['email'] = '';
		$ret['comment'] = '';						
		return $ret;
	}

	public function titledata(){
		$ret = array();
		$ret[] = 'facebookIDについて';
		$ret[] = '投票について';
		$ret[] = '登録会社について';
		return $ret;						
	}

	public function getTitleByID($id){
		$ret = $this->titledata();
		return $ret[$id];
	}

}
