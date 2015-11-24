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

	/**
	お問い合わせTOP
	**/
	public function index() {
		$this->setMetaData('',CONTACTPAGETITLE,CONTACTPAGEKEYWORDS,CONTACTPAGEDESCRIPTION);
        $this->set('errormessages','');

        $this->set('genreID',CONTACTID);
		$this->set('BreadGenres',$this->Genre->getAllStaticGenre());



        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Contact'] = $this->Contact->skel();
	    	$data['Contact']['titleData'] = $this->Contact->titledata();
	    	$this->set('Contact',$data);
	    	return;
	    }

        $this->Contact->set($this->request->data);
        $this->set('Contact','');
        //確認画面へ
        if($this->Contact->validates()){
        	$data = $this->Contact->data;
	    	$data['Contact']['titleData'] = $this->Contact->titledata();        	
	        $this->set('Contact',$data);
	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Contact->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Contact']) ? $this->params['data']['Contact'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Contact['Contact'] = $_Contact;
	    	$Contact['Contact']['titleData'] = $this->Contact->titledata();

			$this->set('Contact',$Contact);
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
