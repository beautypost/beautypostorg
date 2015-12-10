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
class AdminattrController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Genre');


	public function beforeRender(){
		$this->set('pagetitle','マスタ項目');
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
		$Genre = $this->Genre->getKisyu();
//		var_dump($Genre);
		$this->set('Genres',$Genre);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Genre = $this->Genre->getItemByID($id);
		// var_dump($Genre);
		$this->set('data',$Genre);
		$this->render('input');
	}


	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Genre'] = $this->Genre->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Genre'])));
            $data['Genre'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Genre->set($this->request->data);
        $this->set('Genre','');
        //確認画面へ
        if($this->Genre->validates()){
        	$data = $this->Genre->data;
	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Genre->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Genre']) ? $this->params['data']['Genre'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Genre['Genre'] = $_Contact;
			$this->set('Genre',$Genre);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Genre']) ? $this->params['data']['Genre'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Genre->setData($_data);
//        $da['valid'] = 1;
        $this->Genre->create();
        $this->Genre->save($da,array('validate'=>false));

    }



}
