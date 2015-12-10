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
class AdmintypeController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Type');


	public function beforeRender(){
		$this->set('pagetitle','用語集');
		$this->set('pagecomment','用語集の登録・編集を行います');
        parent::beforeRender();
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		$Type = $this->Type->getItems();
//		var_dump($Type);
		$this->set('Types',$Type);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Type = $this->Type->getItemByID($id,'admin');
		// var_dump($Type);
		$this->set('data',$Type);
		$this->render('input');
	}

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Type->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Type'] = $this->Type->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Type'])));
            $data['Type'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Type->set($this->request->data);
        $this->set('Type','');
        //確認画面へ
        if($this->Type->validates()){
        	$data = $this->Type->data;
	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Type->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Type']) ? $this->params['data']['Type'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Type['Type'] = $_Contact;
			$this->set('Type',$Type);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Type']) ? $this->params['data']['Type'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Type->setData($_data);
//        $da['valid'] = 1;
        $this->Type->create();
        $this->Type->save($da,array('validate'=>false));

    }



}
