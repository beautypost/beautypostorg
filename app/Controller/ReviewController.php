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
class ReviewController extends AppController {

	public $uses = array('ItemsReview','Item','ItemsMonitor');
//	public $components = array('MailC');


    public function beforeRender(){
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
        $this->set('Point',$this->Genre->getPoint());
        $this->set('cssname','content');
        $this->set('bodyclass','page-collection');
        parent::beforeRender();

    }


    public function index($id){

        //レビュー総合
        $item = $this->Item->getItemByID($id);
        $this->set('Item',$item);


        //レビュー情報一覧
        $tr = $this->ItemsReview->getItemsByItemID($id);
        $this->set('Reviews',$tr);
        $p1 = $p2 = $p3 = $p4 = $p5 = 0;
        foreach($tr as $k=>$v){
            $p1 +=$v['ItemsReview']['point1'];
            $p2 +=$v['ItemsReview']['point2'];
            $p3 +=$v['ItemsReview']['point3'];
            $p4 +=$v['ItemsReview']['point4'];
            $p5 +=$v['ItemsReview']['point5'];
        }
        $total = count($tr);

        $r['p1'] = $p1 / $total;
        $r['p2'] = $p2 / $total;
        $r['p3'] = $p3 / $total;
        $r['p4'] = $p4 / $total;
        $r['p5'] = $p5 / $total;

        $this->set('totalreview',$r);

    }


    public function monitor($id){

        //レビュー総合
        $item = $this->Item->getItemByID($id);
        $this->set('Item',$item);


        //レビュー情報一覧
        $tr = $this->ItemsMonitor->getItemsByItemID($id);
        $this->set('Monitors',$tr);
        $p1 = $p2 = $p3 = $p4 = $p5 = 0;

        foreach($tr as $k=>$v){
            $p1 +=$v['ItemsMonitor']['point1'];
            $p2 +=$v['ItemsMonitor']['point2'];
            $p3 +=$v['ItemsMonitor']['point3'];
            $p4 +=$v['ItemsMonitor']['point4'];
            $p5 +=$v['ItemsMonitor']['point5'];
        }
        $total = count($tr);

        $r['p1'] = $p1 / $total;
        $r['p2'] = $p2 / $total;
        $r['p3'] = $p3 / $total;
        $r['p4'] = $p4 / $total;
        $r['p5'] = $p5 / $total;

        $this->set('totalreview',$r);

    }

    /**
    レビュー登録
    **/
    public function input() {
        $this->set('pagename','新規登録');
        $this->set('errormessages','');
        $itemid = $this->setRequestGetValue('itemID');
        $item = $this->Item->getItemByID($itemid);
        $this->set('Item',$item);
        //DATAが入力されていなかった場合(初めて画面が表示された場合)
        if (!$this->request->is('post')) {
            $_data = $this->ItemsReview->skel();
            $data['ItemsReview'] = $_data;
            $data['ItemsReview']['item_id'] = $itemid;

            $this->set('data',$data);
            return;
        }
        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['ItemsReview'])));
            $back =0;
        }

        $this->ItemsReview->set($this->request->data);

//        $this->JobHistory->setAlldata($this->request->data['history'],$this->Admin);
//        $this->set('data','');
        //確認画面へ
        if($this->ItemsReview->validates() && ($back == 1)){
            $data = $this->ItemsReview->data;

            $this->set('data',$data);
            $this->render('confirm');
            return;

        }else{
            $errors = $this->ItemsReview->invalidFields();
            $this->set('validationErrors',$errors);
//            $Item['Item'] = $Item;
//           var_dump($this->Item->data);
            $this->set('data',$this->ItemsReview->data);
        }

    }



    /**
    登録
    **/
    public function Submit() {
        $messages = isset($this->params['data']['ItemsReview']) ? $this->params['data']['ItemsReview'] :null;
        $_data = (unserialize(base64_decode($messages)));
//var_dump($_data);
        $da = $this->ItemsReview->setData($_data);
        $da['user_id'] = $this->SnsuserData['Snsuser']['id'];
//        $da['sns'] = WEBKEY;
//        var_dump($da);
//var_dump($this->SnsuserData);
        $this->ItemsReview->create();
        $this->ItemsReview->save($da,array('validate'=>false));

        $this->set('pagename','登録完了');
    }



}
