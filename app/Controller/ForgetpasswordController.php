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
class ForgetpasswordController extends AppController {

	public $uses = array('Snsuser','Fpassword');
	public $components = array('MailC','ContactC');

	/**
	お問い合わせTOP
	**/
	public function index() {

        $this->set('Year',$this->Genre->getYearRange());
        $this->set('Month',$this->Genre->getMonthRange());
        $this->set('Day',$this->Genre->getDayRange());

        $this->set('errormessages','');

         //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Fpassword'] = $this->Fpassword->skel();
	    	$this->set('Fpassword',$data);
	    	return;
	    }

        $this->Fpassword->set($this->request->data);
        $this->set('Fpassword','');
        $user = $this->Snsuser->getUserByMailAndBirth($this->request->data['email']
            ,$this->request->data['year'],$this->request->data['month'],$this->request->data['day']
            );


        //確認画面へ
        if(!$this->Fpassword->validates() || !$user){
	        $errors = $this->Fpassword->invalidFields();
	        $this->set('errormessages',$errors);
//            var_dump($errors);
			$messages = isset($this->params['data']['Fpassword']) ? $this->params['data']['Fpassword'] :null;
			$Fpassword['Fpassword'] = $messages;
			$this->set('Fpassword',$Fpassword);
            return;
        }


        $key = $this->Fpassword->setKey($user);

        $message = $this->ContactC->setMessagePw($user,$key);
        $this->MailC->mailsend(MAILTO,FpasswordSUBJECT,$message);
        $this->MailC->mailsend($user['Snsuser']['email'],FpasswordSUBJECT,$message);
        $this->set('Snsuser',$user);
        $this->render('send');


	}





    public function pwinput() {
        $this->set('errormessages','');

         //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {
            $data['Fpassword'] = $this->Fpassword->skel();
            $this->set('Fpassword',$data);

            $key = $this->params['url']['key'];
            $bid = $this->Fpassword->getBeautyidByKey($key);
            $user = $this->Snsuser->getItemByBeautyid($bid);
            $this->set('Snsuser',$user);
            return;
        }

            $this->Fpassword->set($this->request->data);
            $Snsuser = $this->Snsuser->getItemByBeautyid($this->request->data['beautyid']);
            $this->set('Snsuser',$Snsuser);

        if(!$this->Fpassword->checkPassword()){
            $this->set('errormessages','パスワードはうんぬかんぬん');
            return;
        }

        $this->Snsuser->setPassword($Snsuser['Snsuser']['id'],$this->request->data['password']);
        $this->render('submit');

    }

}
