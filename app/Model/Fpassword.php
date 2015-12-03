<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Fpassword extends AppModel {

    public $name = 'fpassword';

    public $validate = array(
        'email' =>array('rule'=>array('notEmpty'),'message'=>'肌質を選択してください'),
        'year' =>array(
            'custom'=>array('rule' => 'checkDate','message'=>'生年月日を正しく選択してください')
            ),
    );


    public function checkPassword(){

      // 数字のみ許可
      $pattern = '/^[0-9a-zA-Z]+$/';
      $p2 = preg_match($pattern, $this->data['Fpassword']['password']);
      $p1 = preg_match($pattern, $this->data['Fpassword']['password2']);

      if($this->data['Fpassword']['password'] != $this->data['Fpassword']['password2']){
        return false;
      }

      if($p1 != $p2){
        return false;
      }
      return true;

    }

    public function checkDate(){

        if(!$this->checkNumberAll()){
            return false;
        }

        if(checkdate(
        $this->data['Fpassword']['month'],
        $this->data['Fpassword']['day'],
        $this->data['Fpassword']['year']
        )){
            return true;
        }
        return false;
    }

   public function checkNumberAll(){

      // 数字のみ許可
      $pattern = '/^[0-9]+$/';
      $tel1 = preg_match($pattern, $this->data['Fpassword']['year']);
      $tel2 = preg_match($pattern, $this->data['Fpassword']['month']);
      $tel3 = preg_match($pattern, $this->data['Fpassword']['day']);
      // var_dump($tel1.$tel2.$tel3);
      if($tel1 == 1 && $tel2 == 1 && $tel3 == 1){

         return true;
      } else {
         return false;
      }
   }

   public function CheckUserName(){
        if(!$this->data['Snsuser']['username']){
            return false;
        }

        if($this->checkUniqueParam('username',$this->data['Snsuser']['username'])){
            return false;
        }else{
            return true;
        }
   }

   public function CheckEmail(){
        if($this->checkUniqueParam('email',$this->data['Snsuser']['email'])){
            return false;
        }else{
            return true;
        }
   }

   public function setKey($user){

    $pw['beautyid'] = $user['Snsuser']['beautyid'];
    $pw['onetimekey'] = date("YmdHis").$user['Snsuser']['beautyid'];

    $this->create();
    $this->save($pw);
    return $pw['onetimekey'];
   }


    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = isset($Item[$k]) ? $Item[$k]:'';
        }

        return $all;

    }

    public function now(){
        return date('Y-m-d G:i:s');
    }


    public function skel(){
        $ret['created'] = $this->now();
        $ret['id'] = '';
        $ret['job'] = '';
        $ret['gender'] = '';
        $ret['name'] = '';
        $ret['mailmagazine'] = '';
        $ret['first_name'] = '';
        $ret['last_name'] = '';
        $ret['pref'] = '';
        $ret['address'] = '';
        $ret['email'] = '';
        $ret['skin'] = '';
        $ret['year'] = $ret['month'] = $ret['day'] = '';
//        $ret['age'] = '';
        $ret['username'] = '';//nickname
        $ret['password'] = '';
    return $ret;
    }

    public function checkUniqueParam($name,$param){
        $conditions['conditions'] = array($name=>$param);
        $count = $this->find('count',$conditions);

        if($count){
            return true;
        }else{
            return false;
        }
    }


        public function MailPwLogin($mail,$password){
            $con['conditions'] = array(
                'email'=>$mail,
                'password'=>$password
                );
            $r = $this->find('first',$con);
            if(isset($r['Snsuser']['beautyid'])){
                return $r['Snsuser']['beautyid'];
            }
            return;
        }

        //新規登録＆ログイン
        public function twsignin($token){
            //アクセストークンを正しく取得できなかった場合の処理
            if(is_string($token))return; //エラー

            $data['sns_id'] = $token['user_id'];
            $data['username'] = $token['screen_name'];
//            $data['password'] = Security::hash($token['oauth_token']);
            $data['beautyid'] = uniqid();
            $data['sns'] = TWITTERKEY;
            //$data['oauth_token'] = Security::hash($token['oauth_token']);
            //$data['oauth_token_secret'] = Security::hash($token['oauth_token_secret']);

            //バリデーションチェックでエラーがなければ、新規登録
            if($this->validates()){
                $this->save($data);
//                var_dump($data);
            }
            return $data['beautyid']; //ログイン情報
        }

        public function fbsignin($token){
            //アクセストークンを正しく取得できなかった場合の処理
//var_dump($token);
            if(is_string($token))return; //エラー

            $data['Snsuser']['sns_id'] = $token['id'];
            $data['Snsuser']['username'] = $token['name'];
//            $data['mailaddress'] = $token['email'];
//            $data['birthday'] = $token['birthday'];
//            $data['password'] = Security::hash($token['oauth_token']);
            $data['Snsuser']['beautyid'] = uniqid();
            $data['Snsuser']['sns'] = FACEBOOKKEY;
            //$data['oauth_token'] = Security::hash($token['oauth_token']);
            //$data['oauth_token_secret'] = Security::hash($token['oauth_token_secret']);

            //バリデーションチェックでエラーがなければ、新規登録
//            if($this->validates()){
                $this->create();
                $this->save($data);
//var_dump($data);
//            }
            return $data['Snsuser']['beautyid']; //ログイン情報

        }

        public function googlesignin($user){
            $data = array();
            $data['beautyid'] = uniqid();
            $data['email'] = $user['email'];
            $data['username'] = $user['family_name'].' '.$user['given_name'];
            $data['first_name'] = $user['given_name'];
            $data['last_name'] = $user['family_name'];
            $data['sns_id'] = $user['id'];
            $data['sns'] = GOOGLEKEY;
            $data['picture'] = $user['picture'];
//            $data['gender'] = $user['gender'] == 'male' ? 1:2;

            $this->save( $data );
            return $data['beautyid'];
        }

        public function getBeautyidByKey($key){

            $conditions['conditions'] = array(
                                'onetimekey'=>$key,

//                                'valid'=>1,
                                );
            $all = $this->find('first',$conditions);
            return $all['Fpassword']['beautyid'];
        }



        public function getItemByBeautyid($itemID){

            if(!$itemID){return;}
            $conditions['conditions'] = array(
                                'beautyid'=>$itemID,
//                                'valid'=>1,
                                );
            $all = $this->find('first',$conditions);
            return $all;
        }


    function getItemByInId($ids){
        $all = explode(',',$ids);
        $conditions = array(
                            'id' => $all,
                            'valid'=>1,
//                            'otherid'=>1,
                            );
        $ret = $this->find('all',array('conditions'=>$conditions));

        return $ret;
    }

    /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemByID($itemID,$fields=array()) {
        if(!$itemID){return;}
        $conditions['conditions'] = array(
                            'id'=>$itemID,
                            'valid'=>1,
//                            'otherid'=>1,
                            );
        if($fields){
            $conditions['fields'] = $fields;
        }

        $all = $this->find('first',$conditions);
        return $all;
    }


    /**
    複数のITEMIDを受け取って複数のITEM情報を取得
    複数
    * @param sessionITEMS
    **/
    public function getItems($conditions,$sort,$limit,$offset=0) {
        $con['conditions'] = $conditions;
        $con['order'] =$sort;
        $con['limit'] = $limit;
        $con['offset'] = $offset;
        $all = $this->find('all',$con);
//        var_dump($con);
        return $all;
    }



}