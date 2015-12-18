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
class AdminattrController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Genre','Attr','GenreAttr');


	public function beforeRender(){
		$this->set('pagetitle','マスタ項目');
		$this->set('pagecomment','登録・編集を行います');
        parent::beforeRender();
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {

        $attr = $this->Attr->getItems();


//		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';

        foreach($attr as $k => $v){
            $GenreAttr = $this->GenreAttr->getItemByAttrID($v['Attr']['id']);
            $ge = array();
            foreach($GenreAttr as $kk => $vb){
                $ge[] = $vb['GenreAttr']['genre_id'];
            }

            $attr[$k]['Attr']['genres'] = $ge;
        }

        $this->set('Attrs',$attr);
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
        $Attr = $this->Attr->getItemByID($id);

        $GenreAttr = $this->GenreAttr->getItemByAttrID($id);

        foreach($GenreAttr as $k => $v){
            $ge[] = $v['GenreAttr']['genre_id'];
        }
//        var_dump($ge);
        $Attr['Attr']['genres'] = $ge;
		// var_dump($Attr);
		$this->set('data',$Attr);

		$this->render('input');
	}


	public function input(){
        $genres = $this->Genre->getKisyu();
        $this->set('Genres',$genres);

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Attr'] = $this->Attr->skel();
//            $data['GenreAttr'] = $this->GenreAttr->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Attr'])));
            $data['Attr'] = $this->request->data;
            $this->set('data',$data);
            return;
        }


        $this->Attr->set($this->request->data);

        $this->set('Attr','');
        //確認画面へ
        if($this->Attr->validates()){
        	$data = $this->Attr->data;
	        $this->set('data',$data);

	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Attr->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Attr']) ? $this->params['data']['Attr'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Attr['Attr'] = $_Contact;
			$this->set('Attr',$Attr);
        }



	}

    public function Submit() {
        $messages = isset($this->params['data']['Attr']) ? $this->params['data']['Attr'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Attr->setData($_data);
//        $da['valid'] = 1;
        $this->Attr->create();
        $this->Attr->save($da,array('validate'=>false));
        if(!$da['id']){
            $da['id'] = $this->Attr->getLastInsertID();
        }else{

            $GenreAttr = $this->GenreAttr->getItemByAttrID($da['id']);

            foreach($GenreAttr as $k => $v){
                $this->GenreAttr->create();
                $this->GenreAttr->id = $v['GenreAttr']['id'];
                $this->GenreAttr->delete();
            }
        }
        foreach($_data['genres'] as $k=> $v){
            $ga['genre_id'] = $v;
            $ga['attr_id'] = $da['id'];
            $this->GenreAttr->create();
            $this->GenreAttr->save($ga);
        }



    }



}
