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
class CompareController extends AppController {


	public $components = array('ItemC','MetaC','MailC','Pager','RequestHandler');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','RecommendItem','Webrequest','Blog','UserVote');


	public function beforeFilter() {
    	parent::beforeFilter();
		$this->set('cssname','content');
		$this->set('bodyclass','page-collection');

	}

	public function beforeRender(){
        //マスタ
        $this->set('AllGenreNames',$this->Genre->getAllGenreName());
        //部位マスタ
        $this->set('PointGenres',$this->Genre->getPointGenre());
        //アイコンマスタ
        $this->set('Icos',$this->Genre->getItemIcon());

        //検索box用マスタ
        $this->setSearchMaster();

		parent::beforeRender();
	}

	/**
	 * 一覧TOP
	  一覧ページTOP
	 * @param genreID sort limit offset
	 */
	public function index() {
        $all = $this->Session->read('ItemCompare');
        var_dump($all);
//		$all = array(111,177,185);
		$items = $this->Item->getItemByInId($all);
//var_dump(count($items));
		$this->set('Items',$items);

		if(!$this->RequestHandler->isMobile()){
			$this->layout = null;
			$this->render('popup');
		}

		return;
	}


	public function detail($id){
		//getで受け取ったdataをセット

		$item = $this->Item->getItemByID($id);
		$this->set('Item',$item);
	}



}
