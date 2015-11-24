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
App::uses('BaseController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class AdminMailMagazineEditController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Snsuser','Mailmagazine');
	/**
	お問い合わせTOP
	**/
    /**
    お問い合わせTOP
    **/
    public function index() {

        $this->set('errormessages','');

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {

            $mailmagazineID = isset($this->params['url']['mailmagazineID']) ? $this->params['url']['mailmagazineID'] : '';
            $Item = $this->Mailmagazine->getItemByID($mailmagazineID);

            if(!$Item){
                $this->Set('Item',$this->Mailmagazine->getFieldList());
                return;
            }

            $Item['Mailmagazine']['send_time'] = date('H:i',strtotime($Item['Mailmagazine']['send_date']));
            $Item['Mailmagazine']['send_date'] = date('Y-m-d',strtotime($Item['Mailmagazine']['send_date']));
            $this->Set('Item',$Item);
            return;
        }

        //確認処理実行
        $this->Mailmagazine->set($this->request->data);
        $data = $this->Mailmagazine->data;
        $this->set('Item',$data);
        //validate OK 確認画面表示
        if($this->Mailmagazine->validates()){
            $this->render('confirm');
            return;
        }else{
            //validate error もう一度入力画面へ
            $errors = $this->Mailmagazine->invalidFields();
            $this->set('errormessages',$errors);
            return;
        }

    }

    //戻るボタンより、戻った場合
    public function InputField(){
            $messages = isset($this->params['data']['Mailmagazine']) ? $this->params['data']['Mailmagazine'] :null;
            $Item['Mailmagazine'] = (unserialize(base64_decode($messages)));
            $this->set('Item',$Item);
            $this->render('index');
    }


    /**
    お問い合わせ送信
    **/
    public function submit() {
        $messages = isset($this->params['data']['Mailmagazine']) ? $this->params['data']['Mailmagazine'] :null;
        $Item = (unserialize(base64_decode($messages)));

        $time = $Item['send_time'];
        $date = $Item['send_date'];
        $Item['send_date'] = $date.' '.$time.':00';
        $Item['send_flag'] = 0;
        $fieldList = array('send_date,title,body','send_flag');



        $this->Mailmagazine->save($Item,$fieldList);
    }
}
