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
class MailMagazineSendController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Snsuser','Mailmagazine');
	public $components = array('MailMagazineC','MailC');

    public function beforeFilter()
    {
        parent::beforeFilter();
        // $this->layout = 'none';
        // $this->Auth->allow('index');
    }

	/**
	itemをお気に入り登録
	**/
	public function index() {

		$mailmagazine = $this->Mailmagazine->getItemsBytime();

    	if(!$mailmagazine){
			return;
		}

		$subject = $mailmagazine['Mailmagazine']['title'];
		$_message = $mailmagazine['Mailmagazine']['body'];

//		$Customers = $this->Snsuser->getItemsByMailMagazineStatus();
        $Customers = $this->Snsuser->getItemByID('49');

		foreach($Customers as $Customer){
			$to = $Customer['Snsuser']['email'];
			$nickname = $Customer['Snsuser']['username'];
            echo $to;
//        $to = 'yamamoto@knsc.jp';
			$message = $this->MailMagazineC->createBody($_message,$nickname);
//			$this->MailC->mailsend($to,$subject,$message);
		}



		$mailmagazine = $this->Mailmagazine->setTime($mailmagazine['Mailmagazine']['id']);


	}

}
