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
class AdminuserController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Snsuser');


	public function beforeRender(){
		$this->set('pagetitle','ユーザー管理');
		$this->set('pagecomment','ユーザー情報の編集を行います');

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
	public function Index() {
        $sort = array('created'=>'desc');
		$this->set('Snsusers',$this->Snsuser->getItems('',$sort,100));
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$data = $this->Snsuser->getItemByID($id);
//		var_dump($Snsuser);
		$this->set('data',$data);
		$this->render('input');
	}

	public function delete(){
		$id = $this->params['url']['id'];
		$data = $this->Snsuser->getItemByID($id);
		$data['Snsuser']['valid'] = 0;
		$this->Snsuser->save($data);
//		var_dump($Snsuser);
		$this->set('data',$data);
		$this->Index();
		$this->render('index');
		return;
	}

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Snsuser'] = $this->Snsuser->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Snsuser'])));
            $data['Snsuser'] = $this->request->data;
            $this->set('data',$data);
            return;
        }

        $this->Snsuser->set($this->request->data);
        $this->set('Snsuser','');
        //確認画面へ
        if($this->Snsuser->validates()){
        	$data = $this->Snsuser->data;
	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Snsuser->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Snsuser']) ? $this->params['data']['Snsuser'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Snsuser['Snsuser'] = $_Contact;
			$this->set('Snsuser',$Snsuser);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Snsuser']) ? $this->params['data']['Snsuser'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Snsuser->setData($_data);

        $da['genres'] = implode(',',$da['genres']);
//        var_dump($da['genres']);
        $da['valid'] = 1;
        $this->Snsuser->create();
        $this->Snsuser->save($da,array('validate'=>false));

    }



}
