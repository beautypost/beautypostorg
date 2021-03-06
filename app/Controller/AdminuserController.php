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
    public $helpers = array('Csv');

	public function beforeRender(){
		$this->set('pagetitle','ユーザー管理');
		$this->set('pagecomment','ユーザー情報の編集を行います');
        $this->set('Gender',$this->Genre->getGender());
        $this->set('Pref',$this->Genre->getPref());
        $this->set('Job',$this->Genre->getJob());
        $this->set('Skin',$this->Genre->getSkin());
//        $this->set('Age',$this->Genre->getAgeRange());
//        var_dump($this->Genre->getYearRange());
        $this->set('Year',$this->Genre->getYearRange());
        $this->set('Month',$this->Genre->getMonthRange());
        $this->set('Day',$this->Genre->getDayRange());
        $this->set('Mailmagazine',$this->Genre->getMailmagazine());

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
		$this->set('Snsusers',$this->Snsuser->getItems('',$sort,1000));
		return;
	}




	public function edit(){
		$id = $this->params['url']['id'];

		$data = $this->Snsuser->getItemByID($id);

		$this->set('data',$data);
		$this->render('input');

//var_dump($data);

	}

	public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
		$this->Snsuser->invalid($id,$valid);
		$this->Index();
		$this->render('index');
		return;
	}

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Snsuser->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
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
//        if($this->Snsuser->validates()){

	        $this->set('data',$this->Snsuser->data);
	    	$this->render('confirm');
        // 	return;

        // }else{

	       //  $errors = $this->Snsuser->invalidFields();
        //     $this->set('validationErrors',$errors);
        //     $data = $this->Snsuser->data;
        //     $this->set('data',$data);
        // }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Snsuser']) ? $this->params['data']['Snsuser'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Snsuser->setData($_data);

//        $da['genres'] = implode(',',$da['genres']);
//        var_dump($da['genres']);
        $da['valid'] = 1;
        $this->Snsuser->create();
        $this->Snsuser->save($da,array('validate'=>false));

    }


    public function Csvoutput(){
        $sort = array('created'=>'desc');
        $Snsusers = $this->Snsuser->getItems('',$sort,1000);
        $this -> layout = false;
        $filename = 'ダウンロードテスト' . date('YmdHis');

        // 表の一行目を作成
        $th = array('ID','メールアドレス','パスワード','名前','ニックネーム','性別','生年月日:年','生年月日:月','生年月日:日','種別','Beautypostメール','住んでいるエリア:県','住んでいるエリア:住所','肌質');
        // 表の内容を取得
        // $column = array('id', 'username', 'mail_address')
        // $td = $this->Test->find('all', array('fields' => $column));
        // $this -> set(compact('filename', 'th', 'td'));
        $this->set('filename',$filename);
        $this->set('th',$th);
        $this->set('Snsusers',$Snsusers);

    }


}
