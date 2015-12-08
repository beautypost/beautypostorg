<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

//facebook login
App::import('Vendor','facebook',array('file' => 'facebook'.DS.'src'.DS.'facebook.php'));

//twitter login
//App::import('Vendor','twitter',array('file' => 'twitter'.DS.'lib'.DS.'twitteroauth'.DS.'twitteroauth.php'));


/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $ext = '.php';
  var $metaData = array();
  var $breadcrumbs = array();
  var $SnsuserData;

 public $uses = array('Genre','User','Snsuser','Question','News','Blog','Want');
 public $helpers = array('Useful','Session','Beautypost');
 public $components = array('Pager','Session','UserC','CheckC','MetaC','RequestHandler','NewsC','QuestionC');

  public function beforeFilter(){
        $this->set('genreID','');
        $this->set('subpage','');
        $this->set('pagetitle','');
        $this->set('cssname','');
        $this->set('bodyclass','');


        //ログイン確認
        $this->SnsuserData = $this->UserC->getUserData();
//        var_dump($this->SnsuserData);
        //UserDATAを取得
        $this->set('UserData',$this->SnsuserData);

  }


  public function beforeRender(){

        //FacebookLogout用URLを設定
        $this->set('FbLogoutURL',$this->UserC->getLogoutURL());
        $this->set('redirecturl',REDIRECTURL);

        //metaDataの設定
        $this->set('metaData',$this->metaData);
        //metaがうまく設定されていない場合error_logに出力する
        $this->CheckC->NullCheckMetaData($this->name.'::'.$this->action,$this->metaData);

        //breadcrumbの設定
        $this->set('breadcrumbs',$this->breadcrumbs);
        // $this->set('year',$this->Genre->getYearRange());
        // $this->set('month',$this->Genre->getMonthRange());
        // $this->set('day',$this->Genre->getDayRange());
        $sort['created'] ='DESC';
        $this->set('blogs',$this->Blog->getItems($sort,5,''));
        //性別
        $this->set('gender',$this->Genre->getGender());
        $this->set('Job',$this->Genre->getJob());

        //アンケート
        $this->set('Questions',$this->Question->getItems(QUESTIONSUBLIMIT,''));

        //NEWS
        $sort['CREATED'] ='DESC';
        $this->set('News',$this->News->getItems($sort,NEWSSUBLIMIT));
        $this->set('GenreTypes',$this->Genre->getType());

        //アイコンマスタ
        $this->set('Icos',$this->Genre->getItemIcon());


        if($this->RequestHandler->isMobile()){
          $this->set('mobile',true);
        }


  }



    /**
     metaDataの設定
    **/
  public function setMetaData($genreID,$title,$keywords,$description){
    $genre = $this->Genre->getGenreByGenreID($genreID);
    if($genre){
      $this->set('genre',$genre);
      $keywords .= $genre['name'];
      $title = $genre['name'];
      $this->metaData = $this->MetaC->setMetaData($title.LISTPAGETITLE,$keywords,$genre['comment']);
    }else{
      $this->metaData = $this->MetaC->setMetaData($title,$keywords,$description);
    }

  }

  public function setRequestValue(&$data,$val){
    $data[$val] =  isset($this->params['data'][$val]) ? $this->params['data'][$val] :null;
    return $data;
  }

  public function setRequestGetValues($data){
    if(!isset($this->params['url']['data'])){
      return;
    }
    $_data = $this->params['url']['data'];
//    var_dump($_data);
    foreach($_data as $k => $v){
//      var_dump($k.$v);
      $data[$k] =  isset($v) ? $v :null;
    }
    return $data;
  }

  public function setRequestGetValue($key){
    if(!isset($this->params['url'][$key])){
      return;
    }else{
      return $this->params['url'][$key];
    }
  }

  public function setSearchMaster(){
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
    $this->set('Sorts',$this->Genre->getSort());
    $this->set('Limits',$this->Genre->getLimit());
  }


}
