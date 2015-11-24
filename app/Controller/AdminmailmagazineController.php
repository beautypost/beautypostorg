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
class AdminmailmagazineController extends BaseController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Snsuser','Mailmagazine');

	public function beforeRender(){
		$this->set('pagetitle','メルマガ管理');
		$this->set('pagecomment','メルマガの登録・編集を行います');
	}


	/**
	メルマガ一覧
	**/
	public function index() {



		$genreID = isset($this->params['url']['genreID']) ? $this->params['url']['genreID'] : DEFAULTGENRE;
		$sort = isset($this->params['url']['sort']) ? $this->params['url']['sort'] : DEFUALTSORT;
		$limit = isset($this->params['url']['limit']) ? $this->params['url']['limit'] : PAGELIMIT;
		$offset = isset($this->params['url']['offset']) ? $this->params['url']['offset'] : PAGEOFFSET;

		//記事一覧
		$sort =array();
		$sort['key'] = 'id';
		$sort['value'] = 'DESC';
		$search = '';

		$mailmagazines = $this->Mailmagazine->getItems($search,$sort,$limit,$offset);
		$this->Set('Mailmagazines',$mailmagazines);

	}

}
