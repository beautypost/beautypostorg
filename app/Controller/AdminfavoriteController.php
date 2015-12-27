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
class AdminfavoriteController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Favorite');


	public function beforeRender(){
		$this->set('pagetitle','BeautyPostからのお知らせ');
		$this->set('pagecomment','登録・編集を行います');
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
		$Favorite = $this->Favorite->getItems();
//		var_dump($Favorite);
		$this->set('Favorites',$Favorite);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Favorite = $this->Favorite->getItemByID($id,'admin');
		// var_dump($Favorite);
		$this->set('data',$Favorite);
		$this->render('input');
	}

    public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
        $this->Favorite->invalid($id,$valid);
        $this->Index();
        $this->render('index');
        return;
    }

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Favorite->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Favorite'] = $this->Favorite->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Favorite'])));
            $data['Favorite'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Favorite->set($this->request->data);
        $this->set('Favorite','');
        //確認画面へ
        if($this->Favorite->validates()){
        	$data = $this->Favorite->data;
	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Favorite->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Favorite']) ? $this->params['data']['Favorite'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Favorite['Favorite'] = $_Contact;
			$this->set('Favorite',$Favorite);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Favorite']) ? $this->params['data']['Favorite'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Favorite->setData($_data);
//        $da['valid'] = 1;
        $this->Favorite->create();
        $this->Favorite->save($da,array('validate'=>false));

    }



}
