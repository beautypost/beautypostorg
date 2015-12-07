<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class LoginController extends AppController {


	public $components = array('ItemC','MetaC','MailC');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

	public function beforeFilter() {
		$this->set('errormessage','');
    	parent::beforeFilter();
	}

	public function beforeRender(){
		$this->set('cssname','content');
		$this->set('bodyclass','page-login single-col');

	}

	/**
	 * 一覧TOP
	  一覧ページTOP
	 * @param genreID sort limit offset
	 */
	public function index() {
		if($this->SnsuserData){
			return $this->redirect(
            array('controller' => 'Mypage', 'action' => 'index')
	        );
		}
		$this->set('redirecturl','');
	}


	public function mailLogin(){
		$data = $this->setRequestValue($data,'email');

		$data = $this->setRequestValue($data,'password');
		if(!isset($data['email']) || !isset($data['password'])){
			$errormessage = 'メールアドレス又はパスワードを入力ください';
			$this->set('errormessage',$errormessage);
			$this->render('index');
			return;
		}

		$beautyid = $this->Snsuser->MailPwLogin($data['email'],$data['password']);

		if(!$beautyid){
			$errormessage = 'メールアドレス又はパスワードをご確認ください';
			$this->set('errormessage',$errormessage);
			$this->render('index');
			return;
		}



		//ログイン完了
	    $this->Session->write(SESSIONNAME,$beautyid);
	//            $this->Auth->login($data); //CakePHPのAuthログイン処理
	    $this->redirect(REDIRECTURL); //ログイン後画面へリダイレクト

	}


	public function Logout(){

		//ログイン完了
	    $this->Session->write(SESSIONNAME,'');
	//            $this->Auth->login($data); //CakePHPのAuthログイン処理
	    $this->redirect(REDIRECTURL); //ログイン後画面へリダイレクト

	}

	// /**
	//   検索TOP
	//  * @param words
	// **/
	// public function search() {

	// 	$words = isset($this->params->data['Post']['words']) ? $this->params->data['Post']['words'] : '';
	// 	/**
	// 	* 検索ワードが指定されなかった場合
	// 	**/
	// 	$items = $this->ItemC->getItemBySearchWords($words);
	// 	$this->set('Items',$items);
	// 	$this->set('Words',$words);

	// 	$this->setMetaData($words.LISTPAGETITLE,$words,$words.LISTPAGEDESCRIPTION);
	// }




}
