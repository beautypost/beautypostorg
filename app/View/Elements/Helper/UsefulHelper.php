<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppHelper', 'View/Helper');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class UsefulHelper extends AppHelper {
	/**
	配列を , カンマ区切りの文字列に変換　最後の, もトル。
	配列でない場合は、そのまま渡す
	**/
	public function roop($data,$sep){
		$all ='';
		$ret = '';
		if(is_array($data)){
			foreach($data as $k => $v){
				$all .= $v.$sep;
			}
			if($all){
				$ret = substr($all, 0, -1);
			}
		}else{
			$ret = $data;
		}
		return $ret;
	}

	/**
	html select 用 option 生成
	**/
	public function option($name,$options,$set){
		$ret = '';

		foreach($options as $key => $val){
			$ret .= "<option value=$key";
			$ret .= ($set == $key) ? ' selected ' :'';
			$ret .= '>'.$val.'</option>';
		}
		return $ret;
	}
	public function selectValue($options,$set){
		return $options[$set];
	}

	public function checkAdminID($id){
		if(strstr(ADMINID,$id)){
			return true;
		}
		return;
	}

}
