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
class MakerController extends AppController {

	public $uses = array('Maker');
	public $components = array('MailC','ContactC');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('cssname','content');
        $this->set('bodyclass','page-maker');
        //検索box用マスタ

    }

    public function index(){}

    /**
    お問い合わせTOP
    **/
    public function input() {
        $this->set('errormessages','');
//        $this->set('title',$this->Maker->titledata());

         //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {
            $data['Maker'] = $this->Maker->skel();
            $this->set('data',$data);
            return;
        }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Maker'])));
            $back =0;
        }

        $this->Maker->set($this->request->data);
//        $this->JobHistory->setAlldata($this->request->data['history'],$this->Admin);
        $this->set('data','');
        //確認画面へ
        if($this->Maker->validates() && ($back == 1)){
            $data = $this->Maker->data;

            $this->set('data',$data);
            $this->render('confirm');
            return;

        }else{
            $errors = $this->Maker->invalidFields();
            $this->set('validationErrors',$errors);
//            var_dump($errors);
//            $Item['Item'] = $Item;
//            var_dump($this->Item->data);
            $this->set('data',$this->Maker->data);
        }

    }



	/**
	お問い合わせ送信
	**/
	public function send() {
		$messages = isset($this->params['data']['Maker']) ? $this->params['data']['Maker'] :null;
		$Maker = (unserialize(base64_decode($messages)));
		$message = $this->ContactC->setMessageMaker($Maker,$this->Maker);
		$this->MailC->mailsend(MAILTO,MakerSUBJECT,$message);
		$this->MailC->mailsend($Maker['email'],MakerSUBJECT,$message);

	}




}
