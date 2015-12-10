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
class AdminmasterController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Genre');


    public function beforeRender(){
        parent::beforeRender();
        $this->set('pagetitle','マスタ管理');
        $this->set('pagecomment','マスタ情報の・編集を行います');
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

    // // 機器で探す　
     $this->set('GenreKisyu',$this->Genre->getKisyu());
    // // 目的で探す
     $this->set('GenrePurposes',$this->Genre->getPurpose());
    // // 部位で探す
    $this->set('GenrePoints',$this->Genre->getPoint());
    //メーカー
    $this->set('GenreMakers',$this->Genre->getMaker());
    // // 価格
    $this->set('GenrePrices',$this->Genre->getPrice());

    //部位をグループごとに分類
    $this->set('GenrePointsWithGroups',$this->Genre->getPointWithGroup());
    $this->set('PointGenre',$this->Genre->getPointGenre());

//		$news = $this->Genre->getItems();
//		var_dump($Genre);
//		$this->set('Genre',$Genre);
//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$Genre = $this->Genre->getItemByID($id);
//		var_dump($Genre);
		$this->set('data',$Genre);
		$this->render('input');
	}

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Genre->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
            $genreid = $this->params['url']['genreID'];
            $groupid = $this->params['url']['groupID'];

	    	$data['Genre'] = $this->Genre->skel();
            $data['Genre']['genre_id'] = $genreid;
            $data['Genre']['group_id'] = $groupid;
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
        $da['valid'] = 1;
//var_dump($da);
//exit;
        $this->Genre->create();
        $this->Genre->save($da,array('validate'=>false));

    }



}
