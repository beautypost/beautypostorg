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

define('ADMINCONTROLLER','1');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */


class BaseController extends AppController{
    public $uses = Array('User','Genre');

    public function beforeFilter(){
        $this->layout = 'admin';
        $this->set('error', '');

        //sessioncheck
        $user = $this->Session->read(SESSIONNAME);
        if(!$user){
            $this->login();
        }
//        var_dump($user);

    }


    public function login() {
        $data = $this->setRequestValue($data,'mail');

        $data = $this->setRequestValue($data,'password');

        $user = $this->User->MailPwLogin($data['mail'],$data['password']);
        if(!$user){
            $errormessage = 'メールアドレス又はパスワードをご確認ください';
            $this->set('errormessage',$errormessage);
            $this->layout = 'adminlogin';
            $this->render('/Admin/login');
            return;
        }

        //ログイン完了
        $this->Session->write(SESSIONNAME,$user['username']);
    //            $this->Auth->login($data); //CakePHPのAuthログイン処理
        $this->redirect('/Admin/'); //ログイン後画面へリダイレクト
    }

    public function logout(){
        $this->Session->delete(SESSIONNAME);
    }

    public function beforeRender(){
    $this->set('GenreKisyu',$this->Genre->getKisyu());
    // // 目的で探す
     $this->set('GenrePurposes',$this->Genre->getPurpose());
    // // 部位で探す
    $this->set('GenrePoints',$this->Genre->getPoint());
    //メーカー
    $this->set('GenreMakers',$this->Genre->getMaker());

    // // 価格
    $this->set('GenreBlogs',$this->Genre->getBlog());
    $this->set('GenreColumns',$this->Genre->getColumn());
    $this->set('GenreTypes',$this->Genre->getType());

    $this->set('GenreIcons',$this->Genre->getItemIcon());

    $this->set('GenreValid',$this->Genre->getValid());

    $this->set('AllGenreNames',$this->Genre->getAllGenreName());
    }

}
