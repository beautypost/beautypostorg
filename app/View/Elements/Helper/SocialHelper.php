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
class SocialHelper extends AppHelper {

	/**
	redirect用のURLを生成
	**/
	private function getRedirectUrl(){
		return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") .BASICAUTH. $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
	}

	/**
	画面右上のfacebookログインboxの表示
	**/
	public function show($fbObj){
		if(!$fbObj){
			echo '<a href="'.WEBROOT.'fbconnect/facebook/?rurl='.urlencode($this->getRedirectUrl()).'"><img src="'.WEBROOT.'assets/img/base/fb_login_clr.png" alt="facebooklogin"></a>';
		}else{
			echo '<img class="nav-user-photo kz-nav-user-photo" src="https://graph.facebook.com/'.$fbObj['id'].'/picture?type=large" alt="facebook Photo" />';
			echo $fbObj['name'];
			echo '<a href="'.WEBROOT.'Fbconnect/facebooklogout/?rurl='.urlencode($this->getRedirecturl()).'"><i class="ace-icon fa fa-power-off"></i>ログアウト</a>';

		}
	}



}
