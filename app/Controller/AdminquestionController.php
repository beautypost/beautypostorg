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
class AdminquestionController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Question','QuestionValue');


    public function beforeRender(){
        $this->set('pagetitle','アンケート管理');
        $this->set('pagecomment','アンケート情報の・編集を行います');
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
		$news = $this->Question->getItems('','');
//		var_dump($news);
		$this->set('Questions',$news);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$question = $this->Question->getItemByID($id);
		$this->set('data',$question);
		$this->render('input');
	}

    public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
        $this->Question->invalid($id,$valid);
        $this->Index();
        $this->render('index');
        return;
    }

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Question->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Question'] = $this->Question->skel();

            for($x=1;$x<11;$x++){
                $data['QuestionValue'][$x]['value'] = '';
            }



	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Question'])));
            $data['Question'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Question->set($this->request->data);
//var_dump($this->request->data);
//        $this->QuestionValue->set($this->request->data['Questionvalue']);

        $this->set('Question','');
        //確認画面へ
        if($this->Question->validates()){
        	$data = $this->Question->data;
//            $_data = $this->QuestionValue->data;

	        $this->set('data',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Question->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Question']) ? $this->params['data']['Question'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Question['Question'] = $_Contact;
			$this->set('Question',$Question);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Question']) ? $this->params['data']['Question'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Question->setData($_data);
        $da['valid'] = 1;
        //新規アンケート作成
        $this->Question->create();
        $da['end'] = NULL;
        $this->Question->save($da,array('validate'=>false));

        //アンケートIDを用い、項目を追加
        //登録済みの場合は、項目を削除
//var_dump($_data);
        if($_data['id']){
            $id = $_data['id'];
            $this->QuestionValue->deleteItemByItemID($id);
        }else{
            $id = $this->Question->getLastInsertID();
        }
//var_dump($_data);
        for($x=0;$x<10;$x++){
            $_qa = array();
            $_qa['question_id'] = $id;
            $_qa['value'] = $_data['questionvalue'][$x];
                $this->QuestionValue->create();
                $this->QuestionValue->save($_qa);
        }

        $da['start'];
        $qe = $this->Question->getNoEnd();
        $qe['Question']['end'] = $da['start'];
        $this->Question->save($qe);

    }



}
