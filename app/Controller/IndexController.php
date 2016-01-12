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
class IndexController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Item','News','Genre','AdminKeyword');
	public $components = array('ItemC','QuestionC','UserC');


	public function beforeFilter() {
		$this->set('cssname','top');
		$this->set('bodyclass','pagetop');
    	parent::beforeFilter();
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
	 BeautyPostTOP
	 */
	public function index() {
		$this->set('cssname','top');
//		$use = $this->UserC->getUserData();
//		var_dump($use);

		//人気のキーワード
		$this->set('AdminKeywords',$this->AdminKeyword->getItems());
		//注目の美容機器
		$this->set('PointItems',$this->Item->getPointItems());

		//みんなが見た美容機器
		$this->set('RankingItems',$this->Item->getRankingItems());

		//部位をグループごとに分類
		$this->set('GenrePointsWithGroups',$this->Genre->getPointWithGroup());

		//検索box用masteをセット
		$this->setSearchMaster();

		//取得したパラメータをセット
		$data = $this->setRequestGetValues('');
		$this->set('data',$data);

// //アンケートbox
// $questions = $this->QuestionC->getQuestions();
// $this->set('Questions',$questions);

// //アンケートbox
// $Newquestion = $this->QuestionC->getNewQuestion();
// $this->set('Newquestion',$Newquestion);


//旬の美容ニュース
// $sort['key'] = 'created';
// $sort['value'] = 'DESC';
// $this->set('News',$this->News->getItems($sort,5,0));
//TOPで表示されるおすすめサービス
//$this->set('Item',$this->Item->getItemTop());
}


	/**
	RSSFEED出力
	*/
	public function feed(){

		$sort =array();
		$sort['key'] = 'created';
		$sort['value'] = 'DESC';

		$topNews = $this->Blog->getItems('',$sort,INDEXNEWSLIMIT,INDEXNEWSOFFSET,'',array(BLOGTAGNEWS,BLOGTAGITEM));
		$this->layout = '';
		$entries = $this->RssC->getData(SITENAME,DOMAIN,INDEXPAGEDESCRIPTION,RSSFILENAME,$topNews,$this->Genre->getAllGenre());
//		var_dump($entries);
		$this->set('entries',$entries);

	    parent::beforeFilter();
	    $this->RequestHandler->respondAs('text/xml; charset=UTF-8');

	}

	// public function ping(){
	// 	$this->layout = '';
	// 	$this->BlogC->sendPing();
	// 	exit;
	// }

}
