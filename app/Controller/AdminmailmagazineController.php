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
class AdminmailmagazineController extends BaseController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Snsuser','Mailmagazine');

	public function beforeRender(){
		$this->set('pagetitle','メルマガ管理');
		$this->set('pagecomment','メルマガの登録・編集を行います');
	}


	/**
	メルマガ一覧
	**/
	public function index() {

		$sort = isset($this->params['url']['sort']) ? $this->params['url']['sort'] : DEFUALTSORT;
		$limit = isset($this->params['url']['limit']) ? $this->params['url']['limit'] : PAGELIMIT;
		$offset = isset($this->params['url']['offset']) ? $this->params['url']['offset'] : PAGEOFFSET;

		//記事一覧
		$sort =array();
		$sort['key'] = 'id';
		$sort['value'] = 'DESC';
		$search = '';

		$mailmagazines = $this->Mailmagazine->getItems($search,$sort,$limit,$offset);
		$this->Set('Mailmagazines',$mailmagazines);

	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Mailmagazine = $this->Mailmagazine->getItemByID($id);
		// var_dump($Mailmagazine);
		$this->set('data',$Mailmagazine);
		$this->render('input');
	}

    public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
        $this->Mailmagazine->invalid($id,$valid);
        $this->Index();
        $this->render('index');
        return;
    }

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Mailmagazine->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Mailmagazine'] = $this->Mailmagazine->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Mailmagazine'])));
            $data['Mailmagazine'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Mailmagazine->set($this->request->data);
        $this->set('Mailmagazine','');
        //確認画面へ
        if($this->Mailmagazine->validates()){
        	$data = $this->Mailmagazine->data;

	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Mailmagazine->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Mailmagazine']) ? $this->params['data']['Mailmagazine'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Mailmagazine['Mailmagazine'] = $_Contact;
			$this->set('Mailmagazine',$Mailmagazine);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Mailmagazine']) ? $this->params['data']['Mailmagazine'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Mailmagazine->setData($_data);

//        $da['valid'] = 1;
        $this->Mailmagazine->create();
        $this->Mailmagazine->save($da,array('validate'=>false));

    }


}
