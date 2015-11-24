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
class ItemController extends AppController {




/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','UserHistory','RecommendItem','LinkLog');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {

		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : null;

		if(!$itemID){
			throw new NotFoundException();
		}

		//ITEM情報を取得
		$item = $this->Item->getItemByID($itemID);
		$this->log('LINKERROR::itemID='.$itemID.':USERID:'.$this->UserC->getUserID());
		if(!$item){
			throw new NotFoundException();			
		}

		$af = 0;
		if($item['Item']['affiliate_link']){
			$url = $item['Item']['affiliate_link'];
			$af = 1;
		}else{
			$url = $item['Item']['url'];
		}

		$this->LinkLog->create();
		$LinkLog['LinkLog']['af'] = $af;
		$LinkLog['LinkLog']['item_id'] = $itemID;
		$LinkLog['LinkLog']['user_id'] = $this->UserC->getUserID();
		$LinkLog['LinkLog']['ip_address'] = $this->request->clientIp(false);
		$this->LinkLog->save($LinkLog);


		$this->redirect($url);

// 		if(!$item){
// 			$this->setMetaData();			
// //			return;
// 		}
// 		$this->set('Item',$item);

// 		$this->set('genreID',$item['Item']['genre_id']);
// 		//recommendITEMを取得
// 		$recommendItems = $this->RecommendItem->getRecommendItems($itemID);
// 		$this->set('RecommendItems',$recommendItems);

// 		//User閲覧履歴ITEMを取得
// 		$userHistoryItems = $this->UserHistory->getHistoryItemsByUserID($this->userID);
// 		$this->set('UserHistoryItems',$userHistoryItems);

// 		//ジャンルTOPITEMを取得
// //		$GenreTopItem = $this->Item->getItemGenreTop();
// //		$this->set('GenreTopItem',$GenreTopItem);

// 		//sessionにITEMIDを設定
// 		$this->UserC->setHistoryItemSession($itemID);

// 		$this->setMetaData($item);

	}





    /**
     metaDataの設定
    **/
	public function setMetaData($item){
		$keywords = array('test');
		$genre = $this->Genre->getGenreByGenreID($item['Item']['genre_id']);
		$this->set('genre',$genre);
		$title = $genre['name'].'/'.$item['Item']['name'];
		$keywords = array($genre['name'],$item['Item']['name']);
		$this->metaData = $this->MetaC->setMetaData($title.ITEMPAGETITLE,$keywords,$title.ITEMPAGEDESCRIPTION);        
		$breadcrumb[] = array('name'=>$genre['name'],'link'=>WEBROOT.'list/?genreID='.$genre['id']);
		$breadcrumb[] = array('name'=>$item['Item']['name'],'link'=>WEBROOT.'item/?itemID='.$item['Item']['id']);		
		$this->breadcrumbs = $breadcrumb;
	}


}
