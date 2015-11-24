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
App::uses('BaseController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdminkeywordController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('AdminKeyword');


	public function beforeRender(){
		$this->set('pagetitle','AdminKeywords管理');
		$this->set('pagecomment','AdminKeywordsの登録・編集を行います');
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function Index() {
		$AdminKeywords = $this->AdminKeyword->getItems();
//		var_dump($AdminKeywords);
		$this->set('AdminKeywords',$AdminKeywords);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$AdminKeywords = $this->AdminKeyword->getItemByID($id);
//		var_dump($AdminKeywords);
		$this->set('data',$AdminKeywords);
		$this->render('input');
	}

	public function delete(){
		$id = $this->params['url']['id'];
		$AdminKeywords = $this->AdminKeyword->getItemByID($id);
		$AdminKeywords['AdminKeyword']['valid'] = 0;
		$this->AdminKeyword->save($AdminKeywords);
//		var_dump($AdminKeywords);
		$this->set('data',$AdminKeywords);
		$this->Index();
		$this->render('index');
		return;
	}

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['AdminKeyword'] = $this->AdminKeyword->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['AdminKeywords'])));
            $data['AdminKeyword'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->AdminKeyword->set($this->request->data);
        $this->set('AdminKeyword','');
        //確認画面へ
        if($this->AdminKeyword->validates()){
        	$data = $this->AdminKeyword->data;
	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->AdminKeyword->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['AdminKeyword']) ? $this->params['data']['AdminKeyword'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$AdminKeywords['AdminKeyword'] = $_Contact;
			$this->set('AdminKeyword',$AdminKeywords);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['AdminKeyword']) ? $this->params['data']['AdminKeyword'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->AdminKeyword->setData($_data);
        $da['valid'] = 1;
        $this->AdminKeyword->create();
        $this->AdminKeyword->save($da,array('validate'=>false));

    }



}
