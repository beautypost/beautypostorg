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
class AdminblogController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Blog');
    public $components = array('ItemC');



	public function beforeRender(){
		$this->set('pagetitle','お役立ち美容通信管理');
		$this->set('pagecomment','お役立ち美容通信の登録・編集を行います');
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
		$Blog = $this->Blog->getItems();
//		var_dump($Blog);
		$this->set('Blogs',$Blog);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Blog = $this->Blog->getItemByID($id,'admin');
		// var_dump($Blog);
		$this->set('data',$Blog);
		$this->render('input');
	}

	public function delete(){
		$id = $this->params['url']['id'];
		$Blog = $this->Blog->getItemByID($id);
		$Blog['Blog']['valid'] = 0;
		$this->Blog->save($Blog);
//		var_dump($Blog);
		$this->set('data',$Blog);
		$this->Index();
		$this->render('index');
		return;
	}

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Blog'] = $this->Blog->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Blog'])));
            $data['Blog'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Blog->set($this->request->data);
        $this->set('Blog','');
        //確認画面へ
        if($this->Blog->validates()){
        	$data = $this->Blog->data;

            if (isset($_FILES['userfile']["error"])) {
                    foreach ($_FILES['userfile']["error"] as $key => $error) {
                            $ret = '';
                            if ($error == UPLOAD_ERR_OK) {
                                    $ret = $this->ItemC->uploadCheck($errormessages, $_FILES, $key,UploadImagePathBLOG);
                                    $tmp_file_name[$key] = $ret;
                                    $name = 'img'.$key.'up';
                                    $data['Blog'][$name] = $ret;
                            }
//                            var_dump($key);
                    }
            }

	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Blog->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Blog']) ? $this->params['data']['Blog'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Blog['Blog'] = $_Contact;
			$this->set('Blog',$Blog);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Blog']) ? $this->params['data']['Blog'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Blog->setData($_data);
        $da['img1up'] = ($da['img1up'] === 'true') ? '' : $da['img1up'];
        $da['tag'] = ','.implode(',',$da['tag']).',';
//        $da['valid'] = 1;
        $this->Blog->create();
        $this->Blog->save($da,array('validate'=>false));

    }



}
