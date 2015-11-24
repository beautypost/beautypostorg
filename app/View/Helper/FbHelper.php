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
class FbHelper extends AppHelper {

	/**
	redirect用のURLを生成
	**/
	private function getRedirectUrl(){
		return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") .BASICAUTH. $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	}

	/**
	画面右上のfacebookログインboxの表示
	**/
	public function show($fbObj,$FbLogoutURL){


			echo '<div class="navbar-buttons navbar-header pull-right" role="navigation">';
//			echo '<ul class="nav ace-nav">';
//			echo '<li class="light-blue">';

			echo '<ul class="nav ace-nav">';
			echo '<li>';


		if(!$fbObj){

			echo '<a href="'.WEBROOT.'fbconnect/facebook/?rurl='.urlencode($this->getRedirectUrl()).'"><img src="'.WEBROOT.'assets/img/base/fb_login_clr.png" alt="facebooklogin"></a>';
		}else{

			echo '<a data-toggle="dropdown" href="#" class="dropdown-toggle">';
			echo '<img class="nav-user-photo kz-nav-user-photo" src="https://graph.facebook.com/'.$fbObj['id'].'/picture?type=large" alt="facebook Photo" />';
			echo '<span class="user-info">';
			echo $fbObj['name'];
			echo '</span>';
			echo '<i class="ace-icon fa fa-caret-down"></i>';
			echo '</a>';

			echo '<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">';
			// echo '<li>';
			// echo '<a href="'.WEBROOT.'mypage/">';
			// echo '<i class="ace-icon fa fa-user"></i>';
			// echo 'Profile';
			// echo '</a>';
			// echo '</li>';

			echo '<li class="divider"></li>';

			echo '<li>';
			echo '<a href="'.WEBROOT.'Fbconnect/facebooklogout/?rurl='.urlencode($this->getRedirecturl()).'"><i class="ace-icon fa fa-power-off"></i>ログアウト</a>';
			echo '</li>';
			echo '</ul>';


		}
			echo '</li>';
			echo '</ul>';

			echo '</div>';
	}



}
