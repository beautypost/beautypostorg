<?php

App::uses('Component', 'Controller');

class UserCComponent extends Component {
    var $name = 'UserC';
    var $components = array('Session');

   public function initialize(Controller $controller) {
        $this->controller = $controller;

    }

  private function loadModel($modelName) {
      if (!empty($this->{$modelName})) {
      // すでに存在すればそのままreturn
          return;
      } elseif (!empty($this->controller->{$modelName})) {
      // 呼び出し元のコントローラでusesしてあれば$this->{モデル名}に参照渡し
          $this->{$modelName} = $this->controller->{$modelName};
      } else {
      // コントローラでusesしていなければコンポーネントでモデルを読み込む
          App::uses($modelName, 'Model');
          $this->{$modelName} = new $modelName;
      }
  }



    public function createFacebook() {
        return new Facebook(
                            array(
                                'appId' => FBAPPID,
                                'secret' => FBSECRET
                                )
                            );
    }


    public function getUserData(){//トップページ
//        $facebook = $this->createFacebook(); //【2】アプリに接続
        $id = $this->Session->read(SESSIONNAME);//【3】facebookのデータ
//var_dump($id);
        $id ='5604ab8c39b3e';
        $this->loadModel('Snsuser');
        $ret = $this->Snsuser->getItemByBeautyid($id);
        return $ret;

        // $fbdummy = array(
        //   "id"=> "759586317432247",
        //   "birthday"=> "03/30/1978",
        //   "email"=> "mkazuoyamamoto@gmail.com",
        //   "first_name"=> "和男",
        //   "gender"=> "男性",
        //   "last_name"=> "山本",
        //   "link"=> "https://www.facebook.com/app_scoped_user_id/759586317432247/",
        //   "locale"=> "en_US",
        //   "name"=> "山本 和男",
        //   "timezone"=>9,
        //   "updated_time"=> "2014-06-05T15:57:42+0000",
        //   "verified"=>true
        // );

        // if(FBDEBUG){
        //   return $fbdummy;
        // }else{
        //   return $myFbData;
        // }

    }

    public function getLogoutURL(){
        $facebook = $this->createFacebook(); //【2】アプリに接続
        return $facebook->getLogoutUrl();
    }

    public function getUserID(){
      $data = $this->getUserData();
      if(!isset($data['Snsuser']['id'])){return;}
      return $data['Snsuser']['id'];
    }

	/**
	アイテムIDをsessionに指定
	**/
    public function setHistoryItemSession($itemID) {
//    	$this->session->set('items',$itemID);

    }



	/**
	アイテムIDを閲覧履歴から取得
	**/
    public function getHistoryItemSession() {
//    	$this->session->get();

    }



    /**
    レビューしたアイテムの一覧を取得
    **/
    public function getReviewItems($userID) {
        $ret = 'reviews';
        return $ret;
    }


	/**
	アイテムIDをお気に入りに追加
	**/
    public function setFavoriteItem($itemID) {

    }

	/**
	お気に入りアイテムを取得
	**/
    public function getFavoriteItem() {

    }

	/**
	アイテムIDを閲覧履歴登録DB
	**/
    public function setHistoryItems($itemID) {

    }
	/**
	アイテムIDを閲覧履歴DBから取得
	**/
    public function getHistoryItems() {

    }





}
?>