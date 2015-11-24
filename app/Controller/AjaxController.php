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
class AjaxController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','Want');


	/**
	itemをお気に入り登録
	**/
	public function setFavorite() {
		$itemID = isset($this->Request['url']['itemID']) ? $this->Request['url']['itemID'] : '';
        //$this->getUserData();
		$this->setMetaData();
	}

	/**
	itemに投票
	**/
	public function setWant() {
		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : '';
//		var_dump($itemID);
//		$star = isset($this->Request['url']['star']) ? $this->Request['url']['star'] : '';
        //$this->getUserData();
        $it = $this->Item->getItemByID($itemID,array('id','wants'));
//        var_dump($it);
        $it['Item']['wants']++;
		$this->Item->save($it);

		$data['user_id'] = $this->SnsuserData['Snsuser']['id'];
		$data['item_id'] = $itemID;

		$this->Want->create();
		$this->Want->save($data);

		echo '<i class="fa fa-heart">&#8203;</i> Want!<span class="num">'.$it['Item']['wants'].'</span>';
		exit;
	}


}
