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
class ContactController extends AppController {

	public $uses = array('Contact');
	public $components = array('MailC','ContactC');


    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('cssname','content');
        $this->set('bodyclass','page-contact');
        //検索box用マスタ

    }

	/**
	お問い合わせTOP
	**/
	public function index() {
        $this->set('errormessages','');
        $this->set('title',$this->Contact->titledata());

         //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Contact'] = $this->Contact->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Contact'])));
            $back =0;
        }

        $this->Contact->set($this->request->data);
//        $this->JobHistory->setAlldata($this->request->data['history'],$this->Admin);
        $this->set('data','');
        //確認画面へ
        if($this->Contact->validates() && ($back == 1)){
            $data = $this->Contact->data;

            $this->set('data',$data);
            $this->render('confirm');
            return;

        }else{
            $errors = $this->Contact->invalidFields();
            $this->set('validationErrors',$errors);
//            var_dump($errors);
//            $Item['Item'] = $Item;
//            var_dump($this->Item->data);
            $this->set('data',$this->Contact->data);
        }

	}



	/**
	お問い合わせ送信
	**/
	public function send() {
		$messages = isset($this->params['data']['Contact']) ? $this->params['data']['Contact'] :null;
		$Contact = (unserialize(base64_decode($messages)));
		$message = $this->ContactC->setMessage($Contact,$this->Contact);
		$this->MailC->mailsend(MAILTO,CONTACTSUBJECT,$message);
		$this->MailC->mailsend($Contact['email'],CONTACTSUBJECT,$message);

	}




}
