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
class VoteController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','User','UserVote');
	public $layout = 'base';
	public $itemID;

	/**
	itemをお気に入り登録
	**/
	public function ItemReviewInput() {

		$itemID = isset($this->params['url']['itemID']) ? $this->params['url']['itemID'] : $this->itemID;
		$userID = $this->UserC->getUserID();

		//ITEM情報を取得
		$item = $this->Item->getItemByID($itemID);
		$votehistory = $this->UserVote->getUserVoteByID($itemID,$userID);
		$this->set('UserVote',$votehistory);

		//すでに投票されている
		//同ジャンルで、他に投票がある

		//不正なitemID
		if(!$item){
			throw new NotFoundException();	
		}

		//GenreTITLEを取得
		$this->set('GenreTitle',$this->Genre->getGenreTitleByGenreID($item['Item']['genre_id']));
		$Item = $this->Item->getItemByID($itemID);
		$this->set('Item',$Item);
	    $this->UserVote->bindModel(
	    	array(
	    	'belongsTo' => array(
	        	'Item' => array(
	            	'className'    => 'Item',
		            'foreignKey'   => 'item_id'
	        		)
	        	)
	        )
	     );
		$UserVoteOther = $this->UserVote->getCheckUserVoteByitemIDAndUserIDAndGenreID($itemID,$userID,$item['Item']['genre_id']);
		$this->set('UserVoteOther',$UserVoteOther);
		$votes = array('1'=>'','2'=>'','3'=>'','4'=>'','5'=>'');
		$this->set('votes',$votes);
		$this->set('VoteItems',$votes);
		$this->set('errormessages','');
//		$this->setMetaData($Item);

			if($this->RequestHandler->isMobile()){
				$this->render('m_item_review_input');
		}

	}

	/**
	itemに投票をする
	**/
	public function ItemReviewConfirm() {
//		$itemID = isset($this->request->data['Post']['itemID']) ? $this->requestdata->['itemID'] : '';		
		//1回しか投票できない仕組み
		$itemID = $this->request->data['itemID'];
		$userID = $this->UserC->getUserID();
		// if(!$this->UserVote->getUserVoteHistory($itemID,$userID)){
		// 	return;
		// }
		$item = $this->Item->getItemByID($itemID);
		$genreTitle = $this->Genre->getGenreTitleByGenreID($item['Item']['genre_id']);
//		$vote1 = $this->VoteC->CheckVoteData($this->request->data['vote1']);
		$vote = array();
		$vote[1] = isset($this->request['data']['vote1']) ? $this->request['data']['vote1'] : null;
		$vote[2] = isset($this->request['data']['vote2']) ? $this->request['data']['vote2'] : null;
		$vote[3] = isset($this->request['data']['vote3']) ? $this->request['data']['vote3'] : null;
		$vote[4] = isset($this->request['data']['vote4']) ? $this->request['data']['vote4'] : null;
		$vote[5] = isset($this->request['data']['vote5']) ? $this->request['data']['vote5'] : null;
		// $this->VoteC->CheckAllVoteData($vote,$genreTitle);
		// if($this->VoteC->getMessages()){
		// 	$this->itemID = $itemID;
		// 	$this->ItemReviewInput();
		// 	$this->set('VoteItems',$vote);
		// 	$this->render('ItemReviewInput');
		// 	return;
		// }

//		$this->setMetaData($item);

		$judge=array_filter($vote);
		if(empty($judge)){
			$this->itemID = $itemID;
			$this->ItemReviewInput();
			$this->set('VoteItems',$vote);
			$this->set('errormessages',ERRORMESSAGEVOTE);
			$this->render('ItemReviewInput');

			return;
		}
	    $this->UserVote->bindModel(
	    	array(
	    	'belongsTo' => array(
	        	'Item' => array(
	            	'className'    => 'Item',
		            'foreignKey'   => 'item_id'
	        		)
	        	)
	        )
	     );
		//同じジャンルに登録がある場合は過去のものを消す
		$genreID = $this->Item->getGenreIDByItemID($itemID);
		$OtherVote = $this->UserVote->getCheckUserVoteByitemIDAndUserIDAndGenreID($itemID,$userID,$genreID);
		if($userID != SADMIN){
			if($OtherVote){
				$this->UserVote->create();
				$this->UserVote->delete($OtherVote['UserVote']['id']);

				$item = $this->Item->getItemByID($OtherVote['UserVote']['item_id']);
				$item['Item']['vote_count'] = $item['Item']['vote_count'] - 1;
				$item['Item']['vote1'] = $item['Item']['vote1'] - $OtherVote['UserVote']['vote1'];
				$item['Item']['vote2'] = $item['Item']['vote2'] - $OtherVote['UserVote']['vote2'];
				$item['Item']['vote3'] = $item['Item']['vote3'] - $OtherVote['UserVote']['vote3'];
				$item['Item']['vote4'] = $item['Item']['vote4'] - $OtherVote['UserVote']['vote4'];
				$item['Item']['vote5'] = $item['Item']['vote5'] - $OtherVote['UserVote']['vote5'];
				$item['Item']['vote1_total'] = $OtherVote['UserVote']['vote1'] > 0 ? $item['Item']['vote1_total'] - 1 : $item['Item']['vote1_total'];
				$item['Item']['vote2_total'] = $OtherVote['UserVote']['vote2'] > 0 ? $item['Item']['vote2_total'] - 1 : $item['Item']['vote2_total'];
				$item['Item']['vote3_total'] = $OtherVote['UserVote']['vote3'] > 0 ? $item['Item']['vote3_total'] - 1 : $item['Item']['vote3_total'];
				$item['Item']['vote4_total'] = $OtherVote['UserVote']['vote4'] > 0 ? $item['Item']['vote4_total'] - 1 : $item['Item']['vote4_total'];
				$item['Item']['vote5_total'] = $OtherVote['UserVote']['vote5'] > 0 ? $item['Item']['vote5_total'] - 1 : $item['Item']['vote5_total'];
				$this->Item->create();
				$this->Item->save($item);

			}
		}
		if($userID != SADMIN){
			$voteHistory = $this->UserVote->getUserVoteByID($itemID,$userID);
		}
			if($voteHistory){
				$UserVote['UserVote']['id'] = $voteHistory['UserVote']['id'];
			}

			//UserVote ユーザー投票tableに保存
			$UserVote['UserVote']['item_id'] = $itemID;
			$UserVote['UserVote']['user_id'] = $userID;
			$UserVote['UserVote']['vote1'] = $vote[1];
			$UserVote['UserVote']['vote2'] = $vote[2];
			$UserVote['UserVote']['vote3'] = $vote[3];
			$UserVote['UserVote']['vote4'] = $vote[4];
			$UserVote['UserVote']['vote5'] = $vote[5];

			$this->UserVote->create();
			$this->UserVote->save($UserVote);
		if($userID != SADMIN){
			if($voteHistory){

				$item['Item']['vote_count'] = $item['Item']['vote_count'] - 1;
				$item['Item']['vote1'] = $item['Item']['vote1'] - $voteHistory['UserVote']['vote1'];
				$item['Item']['vote2'] = $item['Item']['vote2'] - $voteHistory['UserVote']['vote2'];
				$item['Item']['vote3'] = $item['Item']['vote3'] - $voteHistory['UserVote']['vote3'];
				$item['Item']['vote4'] = $item['Item']['vote4'] - $voteHistory['UserVote']['vote4'];
				$item['Item']['vote5'] = $item['Item']['vote5'] - $voteHistory['UserVote']['vote5'];
				$item['Item']['vote1_total'] = $voteHistory['UserVote']['vote1'] > 0 ? $item['Item']['vote1_total'] - 1 : $item['Item']['vote1_total'];
				$item['Item']['vote2_total'] = $voteHistory['UserVote']['vote2'] > 0 ? $item['Item']['vote2_total'] - 1 : $item['Item']['vote2_total'];
				$item['Item']['vote3_total'] = $voteHistory['UserVote']['vote3'] > 0 ? $item['Item']['vote3_total'] - 1 : $item['Item']['vote3_total'];
				$item['Item']['vote4_total'] = $voteHistory['UserVote']['vote4'] > 0 ? $item['Item']['vote4_total'] - 1 : $item['Item']['vote4_total'];
				$item['Item']['vote5_total'] = $voteHistory['UserVote']['vote5'] > 0 ? $item['Item']['vote5_total'] - 1 : $item['Item']['vote5_total'];
				$this->Item->create();
				$this->Item->save($item);
			}
		}

		$item = $this->Item->getItemByID($itemID);
		//Item ITEMデータtableを更新
		$item['Item']['vote_count'] = $item['Item']['vote_count'] + 1;
		$item['Item']['vote1'] = $item['Item']['vote1'] + $vote[1];
		$item['Item']['vote2'] = $item['Item']['vote2'] + $vote[2];
		$item['Item']['vote3'] = $item['Item']['vote3'] + $vote[3];
		$item['Item']['vote4'] = $item['Item']['vote4'] + $vote[4];
		$item['Item']['vote5'] = $item['Item']['vote5'] + $vote[5];

		//voteしたものだけをcountする
		$item['Item']['vote1_total'] = $vote[1] > 0 ? $item['Item']['vote1_total'] + 1 : $item['Item']['vote1_total'];
		$item['Item']['vote2_total'] = $vote[2] > 0 ? $item['Item']['vote2_total'] + 1 : $item['Item']['vote2_total'];
		$item['Item']['vote3_total'] = $vote[3] > 0 ? $item['Item']['vote3_total'] + 1 : $item['Item']['vote3_total'];
		$item['Item']['vote4_total'] = $vote[4] > 0 ? $item['Item']['vote4_total'] + 1 : $item['Item']['vote4_total'];
		$item['Item']['vote5_total'] = $vote[5] > 0 ? $item['Item']['vote5_total'] + 1 : $item['Item']['vote5_total'];


//満足度
//一人あたりの満足度 (自分が投票したもの * 5) / 投票した値
//例: 2つの項目のみ投票 A = 3 B = 5 => 合計値8 / 2つの投票 * 5 => 10 ==> 8/10 => 満足度 4/5 
//AAさん 満足度 4/5
//BBさん 満足度 1/5
//全体の満足度 5/10 => 2.5/5

		$this->Item->create();
		$this->Item->save($item);


		$this->set('Item',$this->Item->getItemByID($itemID));

        //$this->getUserData();
	}



	/**
	itemに投票
	**/
	public function setStar() {
		$itemID = isset($this->Request['url']['itemID']) ? $this->Request['url']['itemID'] : '';		
		$star = isset($this->Request['url']['star']) ? $this->Request['url']['star'] : '';				
        //$this->getUserData();
        $data = array('status'=>'success');
		$this->ViewClass = 'Json';
		$this->set(compact('data'));
		$this->set('_serialize','data');
	}

    /**
     metaDataの設定
    **/
	// public function setMetaData($item){
	// 	$keywords = array();
	// 	$genre = $this->Genre->getGenreByGenreID($item['Item']['genre_id']);
	// 	$this->set('genre',$genre);
	// 	$title = $genre['name'].'/'.$item['Item']['name'];
	// 	$keywords = array($genre['name'],$item['Item']['name']);
	// 	$this->metaData = $this->MetaC->setMetaData($title.ITEMPAGETITLE,$keywords,$title.ITEMPAGEDESCRIPTION);        
	// 	$breadcrumb[] = array('name'=>$genre['name'],'link'=>WEBROOT.'list/?genreID='.$genre['id']);
	// 	$breadcrumb[] = array('name'=>$item['Item']['name'],'link'=>WEBROOT.'item/?itemID='.$item['Item']['id']);		
	// 	$this->breadcrumbs = $breadcrumb;
	// }

}
