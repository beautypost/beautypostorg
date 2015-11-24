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
class WebrequestController extends AppController {

	public $uses = array('Webrequest');
	public $components = array('MailC','WebrequestC');
	public $layout = 'base';


	/**
	お問い合わせTOP
	**/
	public function index() {
		$this->setMetaData();
        $this->set('errormessages','');

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {

	    	$Webrequest['Webrequest']['genreID'] = $this->params['url']['genreID'];	    	
	    	$this->set('Webrequest',$Webrequest);

	    	return;
	    }

	    //完了
        if(!$this->Webrequest->validates()){

		$genreID = isset($this->request['data']['Webrequest']['genreID']) ? $this->request['data']['Webrequest']['genreID'] : null;
		$url = isset($this->request['data']['Webrequest']['url']) ? $this->request['data']['Webrequest']['url'] : null;		
		$genre = $this->Genre->getGenreByGenreID($genreID);

			$message = $this->WebrequestC->setMessage($url,$genreID,$genre['name']);

			$this->MailC->mailsend(MAILTO,WEBREQUESTSUBJECT,$message);
	    	$this->render('send');
        	return;

        }else{

	        $errors = $this->Webrequest->invalidFields();
	        $this->set('errormessages',$errors);


//var_dump('aaaa');
//        	$errormessages = 'URLにerrorがあります';
//        	$this->set('errormessages',$errormessages);
        }

	}



   /**
    * metaDataの設定
    **/
	public function setMetaData(){
		$this->set('BreadGenres',$this->Genre->getAllStaticGenre());
		$genreID = $this->Genre->getGenreIDByPageName('contact');
		$this->set('genreID',$genreID);

		$genre = $this->Genre->getStatigGenreByGenreID($genreID);
		$this->metaData = $this->MetaC->setMetaData($genre['name'],'',$genre['comment']);        


	}


}
