<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
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
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class UserVote extends AppModel {
    public $name = 'UserVote';


    public function getUserVoteByID($itemID,$userID){
        $conditions = array(
                            'user_id'=>$userID,
                            'item_id'=>$itemID
                            );
        $ret = $this->find('first',array('conditions'=>$conditions));
        return $ret;        

    }

    public function getUserVoteHistory($userID){
        $conditions = array(
                            'user_id'=>$userID,
                            );
        $ret = $this->find('all',array('conditions'=>$conditions));
        return $ret;        

    }

    public function getItemIDByUserAndGenreID($User,$genreID){
        $conditions = array(
            'UserVote.user_id'=>$User['id'],
            'genre_id'=>$genreID
            );
        $ret = $this->find('first',array('conditions'=>$conditions));
        return $ret;
    }

    public function getCheckUserVoteByitemIDAndUserIDAndGenreID($itemID,$UserID,$genreID){
        $conditions = array(
            'UserVote.user_id'=>$UserID,
            'genre_id'=>$genreID,
            'UserVote.item_id !='=>$itemID
            );
        $ret = $this->find('first',array('conditions'=>$conditions));
        return $ret;

    }


}
