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


/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FbconnectController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();



/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */

    public $name = 'Fbconnect';

    function index(){}

    function showdata(){//トップページ
        $facebook = $this->UserC->createFacebook(); //【2】アプリに接続
        $myFbData = $this->Session->read('beautypost');//【3】facebookのデータ
        $this->set('beautypost', $myFbData);
    }

    //facebookの認証処理部分
    public function facebook(){
        // $rurl = (isset($this->params['url']['rurl']) && $this->params['url']['rurl']) ? $this->params['url']['rurl'] : DOMAIN;
        // if($rurl){
        //     $this->Session->write('rurl',$rurl);
        //     $redirecturl = $rurl;
        //     $this->log($redirecturl);
        // }else{
        //     $redirecturl = $this->Session->read('rurl');
        //     $this->log($redirecturl);
        // }

        $this->autoRender = false;
        $this->facebook = $this->UserC->createFacebook();
        $user = $this->facebook->getUser();       //【4】ユーザ情報取得
        //すでに登録済みか否か
        $asns = $this->Snsuser->getItemBySNSid($user,FACEBOOKKEY);
// var_dump($asns);
// var_dump($user);
// exit;
        //ログインOK
        if($asns){
                    $this->Cookie->write(SESSIONNAME, $asns['Snsuser']['beautyid'], false, LOGINTIME);
                    $this->redirect(REDIRECTURL);
        }

        if($user){//認証後
            $me = $this->facebook->api('/me','GET',array('locale'=>'ja_JP'));  //【5】ユーザ情報を日本語で取得
//            $bid = $this->Snsuser->fbsignin($me);

//            $this->Session->write('BeautyPostUser',$bid);//【6】ユーザ情報をセッションに保存
            $this->redirect(
                        array(
                            'controller' => 'Regist',
                            'action' => 'input',
                            '?' => array(
                                'sns_id' => $me['id'],
                                'sns' => FACEBOOKKEY,
                                'username'=>$me['name']
                            )
                            )
                        );

        }else{//認証前

            $url = $this->facebook->getLoginUrl(array('scope' => 'email','canvas' => 1,'fbconnect' => 0));   //【7】スコープの確認

            $this->redirect($url);

        }
    }

    public function facebooklogout(){
        $this->Session->delete('BeautyPostUser');
        $rurl = isset($this->params['url']['rurl']) ? $this->params['url']['rurl'] : null;
        if($rurl){
            $this->Session->write('reurl',$rurl);
            $redirecturl = $rurl;
            $this->log($redirecturl);
        }else{
            $redirecturl = $this->Session->read('reurl');
            $this->log($redirecturl);
        }

        $this->facebook = $this->UserC->createFacebook();
        $user = $this->facebook->getUser();       //【4】ユーザ情報取得
        if(!$this->Session->read('BeautyPostUser')){
            $this->redirect($rurl);
            return;
        }

        $this->redirect($this->UserC->getLogoutURL());
    }



}
