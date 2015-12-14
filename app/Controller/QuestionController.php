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
class QuestionController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Question','QuestionValue','QuestionLog');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('cssname','content');
        $this->set('bodyclass','page-enquete');

    }


	/**
	 アンケートTOP
	 */
	public function Input(){
        $question = $this->Question->getNewQuestion();

        $session_id = session_id();
        $ret = $this->QuestionLog->getItemBySessionAndID($question['Question']['id'],$session_id);
        if($ret > 0){
            $message = 'すでに投票済みです';
        }else{

            $message = '投票ありがとうございました';
        }
            $this->set('message',$message);
            $this->Detail($question['Question']['id']);
            $this->render('detail');
            return;
    }

    public function Vote(){
        $data = array();
        $this->setRequestValue($data,'question_value_id');
        $this->setRequestValue($data,'question_id');
//        var_dump($data);
        $session_id = session_id();
        $ret = $this->QuestionLog->getItemBySessionAndID($data['question_id'],$session_id);

        if($ret > 0){
            $message = 'すでに投票済みです';
            $this->set('message',$message);
            $this->Detail($data['question_id']);
            $this->render('detail');
            return;
        }

        if(!$data['question_id']){
            $message = '投票してください';
            $this->set('message',$message);
            $this->Detail($data['question_id']);
            $this->render('detail');
            return;
        }

        $message = '投票ありがとうございました';
        $this->set('message',$message);

        $data['session'] = $session_id;
        $this->QuestionLog->save($data);

        $val = $this->QuestionValue->getItemByID($data['question_value_id']);
        $val['QuestionValue']['points']++;
        $this->QuestionValue->save($val);

        $val = $this->Question->getItemByID($data['question_id']);
        $val['Question']['total']++;
        $this->Question->save($val);
        $this->Detail($val['Question']['id']);
        $this->render('detail');
        return;

    }

    // public function Result(){
    //     $question = $this->Question->getNewQuestion();
    //     $this->set('Question',$question);
    // }

    public function index(){
    //getで受け取ったdataをセット
        $data = '';
        $data = $this->setRequestGetValues($data);

        $limit = 10;
        $p = isset($data['p']) ? $data['p'] : 0;
        $question = $this->Question->getItems($limit,$p);
        $this->set('Question',$question);

        $total = $this->Question->getItemsCount('');
        $pager = $this->Pager->getPager($total,$p,$limit);

//      var_dump($pager);
//      var_dump($total);
        $this->set('totalcount',$total);

        $this->set('Pager',$pager);


    }

    public function Detail($id){
        $all = $this->Question->getItems('','');
        $pager = $this->Pager->getPagerDetail($all,'Question',$id);
        $this->set('Pager',$pager);

        $question = $this->Question->getItemByID($id);
        $this->set('Question',$question);
    }

}
