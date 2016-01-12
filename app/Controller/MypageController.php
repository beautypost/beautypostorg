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

require_once '../Vendor/lib/HttpSample.class.php';


App::uses('AppController', 'Controller');

//facebook login
App::import('Vendor','facebook',array('file' => 'facebook'.DS.'src'.DS.'facebook.php'));


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MypageController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Tenki','UserVote','ItemsReview','Favorite');


    public $name = 'Mypage';

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('cssname','content');
        $this->set('bodyclass','page-mypage');


        $rurl = isset($this->params['url']['rurl']) ? $this->params['url']['rurl']:$this->Session->read('rurl');
        if($rurl){
            $this->Session->write('rurl',$rurl);
            $this->set('rurl',$rurl);
        }
    }

    public function beforeRender(){
        parent::beforeRender();
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
        $this->set('cssname','content');

        //want情報
        $wants = $this->Want->getItems();

        $this->set('Wants',$wants);



        $this->setSearchMaster();
    }


 	/**
	MypageTOP
 	**/
    function index(){

		//レビューしたアイテム取得
		// $userID = $this->SnsuserData['Snsuser']['id'];
  //           $belongsTo = array(
  //               'Item' => array(
  //                   'className' => 'Item',
  //                   'foreignKey' => 'item_id'
  //               ));
  //       $this->UserVote->bindModel(array('belongsTo' => $belongsTo));
  //       if(!$userID){
  //           $this->redirect('/Login');
  //       }


        $this->set('Favorites',$this->Favorite->getItems());

//		$HistoryItems = $this->UserVote->getUserVoteHistory($userID);

//		$this->set('HistoryItems',$HistoryItems);
        $areaCode = $this->SnsuserData['Snsuser']['pref'];
        $skinCode = $this->SnsuserData['Snsuser']['skin'];
		//metaDATA設定
//		$this->setMetaData();
        //乾燥肌注意報
        $hada = $this->Tenki->getTenki($areaCode,$skinCode,4);

        //日焼け
        $hiyake = $this->Tenki->getTenki($areaCode,$skinCode,6);
        $this->set('hada',$hada);
        $this->set('hiyake',$hiyake);

    }


    function deleteVote(){
    	$itemID = $this->params['url']['itemID'];
    	$this->UserVote->delete($itemID);
    	$this->index();
    	$this->render('index');
    	return;
    }

 	/**
	Mypage レビュー一覧
 	**/
    function review(){
        $userID =$this->SnsuserData['Snsuser']['id'];
        $items = $this->ItemsReview->getItemsByUserID($userID);
//        var_dump($items);
        $this->set('Items',$items);
        $r = $this->Session->read('ItemCompare');
        $this->set('ItemCompare',$r);

    }

    function want(){
        $userID =$this->SnsuserData['Snsuser']['id'];
        $items = $this->Want->getItemsByUserID($userID);
        $r = $this->Session->read('ItemCompare');
        $this->set('ItemCompare',$r);

        $this->set('Items',$items);

    }

    function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {
            $this->set('data',$this->SnsuserData);
            return;
        }
        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Snsuser'])));
            $back =0;
        }

        $this->Snsuser->set($this->request->data);
//        $this->JobHistory->setAlldata($this->request->data['history'],$this->Admin);
        $this->set('data','');
        //確認画面へ
        if($this->Snsuser->validates() && ($back == 1)){
            $data = $this->Snsuser->data;
            $this->set('data',$data);
            $this->render('confirm');
            return;

        }else{
            $errors = $this->Snsuser->invalidFields();
            $this->set('validationErrors',$errors);
//            $Item['Item'] = $Item;
//            var_dump($this->Item->data);
            $this->set('data',$this->Snsuser->data);

        }

    }

    function submit(){

        $messages = isset($this->params['data']['Snsuser']) ? $this->params['data']['Snsuser'] :null;
        $_data = (unserialize(base64_decode($messages)));
//var_dump($_data);
        $da = $this->Snsuser->setData($_data);
        // $da['beautyid'] = uniqid();
        // $da['sns'] = WEBKEY;
        // $data['Snsuser'] = $da;
//        $this->set('data',$data);
        $this->Snsuser->create();
        $this->Snsuser->save($da,array('validate'=>false));

        $this->set('pagename','登録-登録完了');


    }



 //    /**
 //    metaDataの設定
 //    **/
	// public function setMetaData(){
	// 	$this->set('BreadGenres',$this->Genre->getAllStaticGenre());
	// 	$genreID = $this->Genre->getGenreIDByPageName('mypage');
	// 	$this->set('genreID',$genreID);

	// 	$genre = $this->Genre->getStatigGenreByGenreID($genreID);
	// 	$this->metaData = $this->MetaC->setMetaData(MYPAGETITLE,MYPAGEKEYWORDS,MYPAGEDESCRIPTION);

	// }


}
