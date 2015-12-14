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
class TwLoginController extends AppController {

	/**
	 * @param genreID sort limit offset
	 */
    public $name = 'TwLogin';
//    public $layout = "bootstrap"; //board.ctp レイアウトを利用
    public $uses = array('User'); //Userモデルを追加
        /****認証周り*****/
    public $components = array(
            'DebugKit.Toolbar', //デバッグきっと
            'TwitterKit.Twitter', //twitter
            // 'Auth' => array( //ログイン機能を利用する
            //     'authenticate' => array(
            //         'Form' => array(
            //             'userModel' => 'User'
            //         )
            //     ),
            //     //ログイン後の移動先
            //     'loginRedirect' => array('controller' => 'Index', 'action' => 'index/'),
            //     //ログアウト後の移動先
            //     'logoutRedirect' => array('controller' => 'TwLogin', 'action' => 'login'),
            //     //ログインページのパス
            //     'loginAction' => array('controller' => 'TwLogin', 'action' => 'login'),
            //     //未ログイン時のメッセージ
            //     'authError' => 'あなたのお名前とパスワードを入力して下さい。',
            // )
        );

        public function beforeFilter(){//login処理の設定
//             $this->Auth->allow('twitterLogin', 'login', 'oauthCallback');
//             $this->set('user',$this->Auth->user()); // ctpで$userを使えるようにする 。
        }

		public function twitterLogin(){//twitterのOAuth用ログインURLにリダイレクト
//            $this->redirect($this->Twitter->getAuthenticateUrl(null, true));
            // var_dump(DOMAIN.'TwLogin/oauthCallback');
            // exit;
            $this->redirect($this->Twitter->getAuthenticateUrl(null, true));
        }

        //ログインアクション
        public function login(){}

        public function logout(){
//            $this->Auth->logout();
            $this->Session->destroy(); //セッションを完全削除
            $this->Session->setFlash(__('ログアウトしました'));
            $this->redirect(array('action' => 'login'));
        }

        function oauthCallback() {
            if(!$this->Twitter->isRequested()){//認証が実施されずにリダイレクト先から遷移してきた場合の処理
                $this->flash(__('invalid access.'), '/', 5);
                return;
            }
            $this->Twitter->setTwitterSource('twitter');//アクセストークンの取得を実施
            $token = $this->Twitter->getAccessToken();
// var_dump($token);
// exit;
            //すでに登録済みかどうか
            $result = $this->Snsuser->getItemBySNSid($token['user_id'],TWITTERKEY);
//var_dump($result);

            //登録済みログイン
            if(!empty( $result )){
                $this->Cookie->write(SESSIONNAME, $result['Snsuser']['beautyid'], false, LOGINTIME);
                $this->redirect(REDIRECTURL);
            }else{
            //新規登録ログイン
                $this->redirect(
                            array(
                                'controller' => 'Regist',
                                'action' => 'input',
                                '?' => array(
                                    'sns_id' => $token['user_id'],
                                    'sns' => TWITTERKEY,
                                    'username'=>$token['screen_name'],
//                                            'email'=>$user['email'],
                                )
                                )
                            );
            }
//exit;

        }

        public function index(){}


}
