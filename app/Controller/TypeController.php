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
class TypeController extends AppController {


	public $components = array('ItemC','MetaC','MailC','BlogC');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','Type','Webrequest');

	public function beforeRender(){
		$this->set('bodyclass','page-news');
		$this->set('cssname','content');

	}


	public function index($category=''){
//var_dump($category);
		//一覧表示
		$sort['created'] = 'DESC';
		$items = $this->Type->getItems($sort,100,0,$category);

		$this->set('Types',$items);
		return;

	}

	public function detail($id){

			$type = $this->Type->getItemByID($id);
			$this->set('Item',$type);
			return;

	}

    public function delete(){
        $id = $this->params['url']['id'];
        $this->Column->delete($id);
        $this->set('message',$id.'を削除しました');
        $this->Index();
        $this->render('index');
    }

}
