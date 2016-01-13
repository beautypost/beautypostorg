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
class AdminmonitorController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Snsuser','ItemsMonitor','Item');
    public $components = array('ItemC');

	public function beforeRender(){
		$this->set('pagetitle','モニター管理');
		$this->set('pagecomment','モニター情報の登録・編集を行います');
        $this->set('tinymce',1);

        $this->set('Gender',$this->Genre->getGender());
        $this->set('Pref',$this->Genre->getPref());
        $this->set('Job',$this->Genre->getJob());
        $this->set('Skin',$this->Genre->getSkin());
//        $this->set('Age',$this->Genre->getAgeRange());
//        var_dump($this->Genre->getYearRange());
        $this->set('Year',$this->Genre->getYearRange());
        $this->set('Month',$this->Genre->getMonthRange());
        $this->set('Day',$this->Genre->getDayRange());




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
        $sort = array('created'=>'desc');
		$this->set('Items',$this->ItemsMonitor->getItems('',1000));

		return;
	}


	public function edit(){
        $items = $this->Item->getItems('','','');

        foreach($items as $key => $val){
            $ret[$val['Item']['id']] = $val['Item']['id'].':'.$val['Item']['title'];
        }

        $this->set('Items',$ret);
		$id = $this->params['url']['id'];
		$data = $this->ItemsMonitor->getItemByID($id);

//var_dump($data);
        $this->set('data',$data);
		$this->render('input');
	}

    public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
        $this->ItemsMonitor->invalid($id,$valid);
        $this->Index();
        $this->render('index');
        return;
    }

    public function delete(){
        $id = $this->params['url']['id'];
        $this->ItemsMonitor->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){
        $items = $this->Item->getItems('','','');

        foreach($items as $key => $val){
            $ret[$val['Item']['id']] = $val['Item']['id'].':'.$val['Item']['title'];
        }

        $this->set('Items',$ret);
        $this->set('pagename','登録');
        $this->set('errormessages','');

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {
            $_data = $this->ItemsMonitor->skel();
            $data['ItemsMonitor'] = $_data;

            $this->set('data',$data);
            return;
        }
        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['ItemsMonitor'])));
            $back =0;
        }

        $this->ItemsMonitor->set($this->request->data);

//        $this->JobHistory->setAlldata($this->request->data['history'],$this->Admin);
//        $this->set('data','');
        //確認画面へ
        if($this->ItemsMonitor->validates() && ($back == 1)){
            $data = $this->ItemsMonitor->data;

            $this->set('data',$data);
            $this->render('confirm');
            return;

        }else{
            $errors = $this->ItemsMonitor->invalidFields();
            $this->set('validationErrors',$errors);
//            $Item['Item'] = $Item;
//           var_dump($this->Item->data);
            $this->set('data',$this->ItemsMonitor->data);
        }
    }

    public function Submit() {
        $messages = isset($this->params['data']['ItemsMonitor']) ? $this->params['data']['ItemsMonitor'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->ItemsMonitor->setData($_data);

        $da['valid'] = 1;
        $this->ItemsMonitor->create();
        $this->ItemsMonitor->save($da,array('validate'=>false));







    }



}
