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
class RegistController extends AppController {

	public $uses = array('Snsuser');
	public $components = array('MailC');


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
    }

    /**
    派遣者登録
    **/
    public function input() {
        $this->set('pagename','新規登録');
        $this->set('errormessages','');

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {
            $data['Snsuser'] = $this->Snsuser->skel();
            $this->set('data',$data);
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



    /**
    登録
    **/
    public function Submit() {
        $messages = isset($this->params['data']['Snsuser']) ? $this->params['data']['Snsuser'] :null;
        $_data = (unserialize(base64_decode($messages)));
//var_dump($_data);
        $da = $this->Snsuser->setData($_data);
        $da['beautyid'] = uniqid();
        $da['birthday'] = $da['year'].$da['month'].$da['day'];
        $da['sns'] = WEBKEY;

        $this->Snsuser->create();
        $this->Snsuser->save($da,array('validate'=>false));



        //ログイン完了
        $this->Session->write(SESSIONNAME,$da['beautyid']);



        $this->set('pagename','登録-登録完了');
    }



}
