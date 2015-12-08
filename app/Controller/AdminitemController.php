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
class AdminitemController extends BaseController {



/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item');
    public $components = array('ItemC');

	public function beforeRender(){
		$this->set('pagetitle','商品管理');
		$this->set('pagecomment','商品の登録・編集を行います');

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
	public function Index() {
        $sort = array('created'=>'desc');
		$this->set('Items',$this->Item->getItems('',$sort,100));
		return;
	}


	public function edit(){
		$id = $this->params['url']['id'];
		$data = $this->Item->getItemByID($id);

        $attr = $this->Genre->getAttr($data['Item']['genre_id']);
        $this->set('GenreAttr',$attr);


//		var_dump($Item);
		$this->set('data',$data);
		$this->render('input');
	}

    public function valid(){
        $id = $this->params['url']['id'];
        $valid = $this->params['url']['valid'];
        $this->Item->invalid($id,$valid);
        $this->Index();
        $this->render('index');
        return;
    }

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Item->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

	public function input(){

        //DATAが入力されていなかった場合(初めて画面が表示された場合)
	    if (!$this->request->is('post')) {
	    	$data['Item'] = $this->Item->skel();
	    	$this->set('data',$data);
	    	return;
	    }

        $back = 1;
        if(isset($this->params['data']['back'])){
            $this->request->data = (unserialize(base64_decode($this->params['data']['Item'])));
            $data['Item'] = $this->request->data;
            if($data['Item']['id']){
                $attr = $this->Genre->getAttr($data['Item']['genre_id']);
                $this->set('GenreAttr',$attr);
            }

            $this->set('data',$data);
            return;
        }

        $this->Item->set($this->request->data);
        $this->set('Item','');
        //確認画面へ
        if($this->Item->validates()){
        	$data = $this->Item->data;


            if (isset($_FILES['userfile']["error"])) {
                    foreach ($_FILES['userfile']["error"] as $key => $error) {
                            $ret = '';
                            if ($error == UPLOAD_ERR_OK) {
                                    $ret = $this->ItemC->uploadCheck($errormessages, $_FILES, $key);
                                    $tmp_file_name[$key] = $ret;
                                    $name = 'img'.$key.'up';
                                    $data['Item'][$name] = $ret;
                            }
//                            var_dump($key);
                    }
            }
//            $this->set('PostUploadFile', $tmp_file_name);
//var_dump($data['Item']);
            $this->set('data',$data);
            if($data['Item']['id']){
                $attr = $this->Genre->getAttr($data['Item']['genre_id']);
                $this->set('GenreAttr',$attr);
            }

	    	$this->render('confirm');
        	return;

        }else{

	        $errors = $this->Item->invalidFields();
	        $this->set('errormessages',$errors);
			$messages = isset($this->params['data']['Item']) ? $this->params['data']['Item'] :null;
			$_Contact = (unserialize(base64_decode($messages)));
			$Item['Item'] = $_Contact;
			$this->set('Item',$Item);
        }



}

    public function Submit() {
        $messages = isset($this->params['data']['Item']) ? $this->params['data']['Item'] :null;
        $_data = (unserialize(base64_decode($messages)));
        $da = $this->Item->setData($_data);

        $da['genres'] = ','.implode(',',$da['genres']).',';
        $da['ico'] = ','.implode(',',$da['ico']).',';
        $da['img1up'] = ($da['img1up'] === 'true') ? '' : $da['img1up'];
        $da['img2up'] = ($da['img2up'] === 'true') ? '' : $da['img2up'];
        $da['img3up'] = ($da['img3up'] === 'true') ? '' : $da['img3up'];
        $da['img4up'] = ($da['img4up'] === 'true') ? '' : $da['img4up'];
        $da['img5up'] = ($da['img5up'] === 'true') ? '' : $da['img5up'];
        $da['img6up'] = ($da['img6up'] === 'true') ? '' : $da['img6up'];
        $da['img7up'] = ($da['img7up'] === 'true') ? '' : $da['img7up'];
        $da['img8up'] = ($da['img8up'] === 'true') ? '' : $da['img8up'];

//var_dump($_data);
//if($_data['img1up']= ''){array_pop($_data,'img1up')}
//        var_dump($da['genres']);
        $da['valid'] = 1;
        $this->Item->create();
        $this->Item->save($da,array('validate'=>false));

    }



}
