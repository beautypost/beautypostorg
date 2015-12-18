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
class AdmincolumnController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Column');
    public $components = array('ItemC');


	public function beforeRender(){
		$this->set('pagetitle','BeautyPostコラム');
		$this->set('pagecomment','BeautyPostコラムの登録・編集を行います');
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
		$Column = $this->Column->getItems();
//		var_dump($Column);
		$this->set('Columns',$Column);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Column = $this->Column->getItemByID($id,'admin');
		// var_dump($Column);
		$this->set('data',$Column);
		$this->render('input');
	}

    public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
        $this->Column->invalid($id,$valid);
        $this->Index();
        $this->render('index');
        return;
    }

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Column->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Column'] = $this->Column->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Column'])));
            $data['Column'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Column->set($this->request->data);
        $this->set('Column','');
        //確認画面へ
        if($this->Column->validates()){
        	$data = $this->Column->data;

            if (isset($_FILES['userfile']["error"])) {
                    foreach ($_FILES['userfile']["error"] as $key => $error) {
                            $ret = '';
                            if ($error == UPLOAD_ERR_OK) {
                                    $ret = $this->ItemC->uploadCheck($errormessages, $_FILES, $key,UploadImagePathColumn);
                                    $tmp_file_name[$key] = $ret;
                                    $name = 'img'.$key.'up';
                                    $data['Column'][$name] = $ret;
                            }

                    }
            }


	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Column->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Column']) ? $this->params['data']['Column'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Column['Column'] = $_Contact;
			$this->set('Column',$Column);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Column']) ? $this->params['data']['Column'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Column->setData($_data);
        $da['img1up'] = ($da['img1up'] === 'true') ? '' : $da['img1up'];

//        $da['valid'] = 1;
        $this->Column->create();
        $this->Column->save($da,array('validate'=>false));

    }



}
