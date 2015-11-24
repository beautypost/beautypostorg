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
class Hiragana extends AppModel {
    public $name = 'Hiragana';
    var $useTable = false;
    var $totalCount = 0;

    public function now(){
        return date('Y-m-d G:i:s');
    }


    //楽天
    public function getAll(){
        $ret = array();
        $ret['a'] = 'あ';
        $ret['i'] = 'い';
        $ret['u'] = 'う';
        $ret['e'] = 'え';
        $ret['o'] = 'お';
        $ret['ka'] = 'か';
        $ret['ki'] = 'き';
        $ret['ku'] = 'く';
        $ret['ke'] = 'け';
        $ret['ko'] = 'こ';
        $ret['sa'] = 'さ';
        $ret['si'] = 'し';
        $ret['su'] = 'す';
        $ret['se'] = 'せ';
        $ret['so'] = 'そ';
        $ret['ta'] = 'た';
        $ret['ti'] = 'ち';
        $ret['tu'] = 'つ';
        $ret['te'] = 'て';
        $ret['to'] = 'と';
        $ret['na'] = 'な';
        $ret['ni'] = 'に';
        $ret['nu'] = 'ぬ';
        $ret['ne'] = 'ね';
        $ret['no'] = 'の';
        $ret['ha'] = 'は';
        $ret['hi'] = 'ひ';
        $ret['hu'] = 'ふ';
        $ret['he'] = 'へ';
        $ret['ho'] = 'ほ';
        $ret['ma'] = 'ま';
        $ret['mi'] = 'み';
        $ret['mu'] = 'む';
        $ret['me'] = 'め';
        $ret['mo'] = 'も';
        $ret['ya'] = 'や';
        $ret['yu'] = 'ゆ';
        $ret['yo'] = 'よ';
        $ret['ra'] = 'ら';
        $ret['ri'] = 'り';
        $ret['ru'] = 'る';
        $ret['re'] = 'れ';
        $ret['ro'] = 'ろ';
        $ret['wa'] = 'わ';
        return $ret;
    }

    function getItemByID($itemID){
        $r = $this->getAll();
        return $r[$itemID];
    }

    public function getTitleAll(){
        $ret = array();
        $ret['a'] = 'あ';
        $ret['ka'] = 'か';
        $ret['sa'] = 'さ';
        $ret['ta'] = 'た';
        $ret['na'] = 'な';
        $ret['ha'] = 'は';
        $ret['ma'] = 'ま';
        $ret['ya'] = 'や';
        $ret['ra'] = 'ら';
        return $ret;
    }

}
