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
class Genre extends AppModel {
    var $name = 'Genre';
//    var $useTable = false;
    /**
    GENRETOP (アイテム一覧)　のTOPで表示されるアイテム
    単数
    **/
    public function getAllGenre() {
        return $this->Genres();
    }

    public function setData($Item){
        $all = $this->skel();
        foreach($all as $k => $v){
            $all[$k] = $Item[$k];
        }
        return $all;
    }

    public function now(){
        return date('Y-m-d G:i:s');
    }


    public function skel(){
//        $ret['created'] = $this->now();
        $ret['id'] = '';
        $ret['title'] = '';
        $ret['genre_id'] = '';
        $ret['group_id'] = '';
        $ret['attr1']='';
        $ret['attr2']='';
        $ret['attr3']='';
        $ret['attr4']='';
        $ret['attr5']='';
        $ret['attr6']='';
        $ret['attr7']='';
        $ret['attr8']='';
        $ret['attr9']='';
        $ret['attr10']='';
//        $ret['url'] = '';
    return $ret;
    }


    /**
    id sequence
    name genreメニュー　breadcrmbs で利用
    icon  genreメニュー　breadcrmbs で利用
    children 子供がいる場合にid を配列で記載
    comment TOPページ・listページで利用
    **/
    public function Genres(){

// 機器別                     1
// 目的                      2
// 部位                      3
// メーカー                        4
$genre = '';
        return $genre;
    }

    public function getAttr($genreID){

        $all = $this->getItemByID($genreID);
        return $all;
    }

    public function getKisyu(){
        $conditions['conditions'] = array('genre_id'=>GENREKISYU);
        $all = $this->find('all',$conditions);

       App::import('Model','Item'); //別モデルを呼び出し， HogeRelationを使う
        $item = new Item;


        foreach($all as $k => $v){
            $count = $item->getItemsCount(array('genre_id'=>$v['Genre']['id'],'valid'=>1));
            $all[$k]['Genre']['count'] = $count;
        }
        return $all;

    }

    public function getPurpose(){
        $conditions['conditions'] = array('genre_id'=>GENREPURPOSE);
        $all = $this->find('all',$conditions);

       App::import('Model','Item'); //別モデルを呼び出し， HogeRelationを使う
        $item = new Item;


        foreach($all as $k => $v){
            $count = $item->getItemsCount(array('genres like'=>'%,'.$v['Genre']['id'].',%','valid'=>1));
            $all[$k]['Genre']['count'] = $count;
        }
        return $all;

    }

    public function getPoint(){
        $conditions['conditions'] = array('genre_id'=>GENREPOINT);
        $conditions['order'] = array('group_id');
        $all = $this->find('all',$conditions);


        return $all;

    }

    public function getMaker(){
        $conditions['conditions'] = array('genre_id'=>GENREMAKER);
        return $this->find('all',$conditions);
    }

    public function getBlog(){
        $conditions['conditions'] = array('genre_id'=>GENREBLOG);
        return $this->find('all',$conditions);
    }

    public function getColumn(){
        $conditions['conditions'] = array('genre_id'=>GENRECOLUMN);
        $ret = $this->find('all',$conditions);
        $all = array();
        foreach($ret as $k => $v){
            $all[$v['Genre']['id']] = $v;
        }
        return $all;
    }

    public function getPrice(){
        $ret['100'] = '1000円〜2000円';
        $ret['200'] = '2000円〜3000円';
        $ret['300'] = '3000円〜4000円';
        $ret['400'] = '4000円〜5000円';
        return $ret;
    }

    public function allSearchGenreID(){
        $ret = array(//'GenreKisyu',
                    'GenrePurposes',
                    'GenrePoints');
        return $ret;
    }

    public function getAllGenreName(){
        $ret[GENREKISYU] = GENREKISYUNAME;
        $ret[GENREPURPOSE] = GENREPURPOSENAME;
        $ret[GENREPOINT] = GENREPOINTNAME;
        $ret[GENREMAKER] = GENREMAKERNAME;
        $ret[GENREBLOG] = GENREBLOGNAME;
        $ret[GENRECOLUMN] = GENRECOLUMNNAME;
        return $ret;

    }

    public function getLimit(){
        $ret[10] = '10件';
        $ret[25] = '25件';
        $ret[50] = '50件';
        return $ret;
    }


    public function getSort(){
        $ret[0] ='アクセスの多い順';
        $ret[1] ='モニター評価が高い順';
        $ret[2] ='ユーザー評価が高い順';
        $ret[3] ='Wantが多い順';
        $ret[4] ='発売日順';
        $ret[5] ='価格の安い順';
        return $ret;
    }

    public function getType(){
        $ret[0] = 'あ';
        $ret[1] = 'か';
        $ret[2] = 'さ';
        $ret[3] = 'た';
        $ret[4] = 'な';
        $ret[5] = 'は';
        $ret[6] = 'ま';
        $ret[7] = 'や';
        $ret[8] = 'ら';
        $ret[9] = 'わ';
        $ret[10] = 'ABCDE';
        $ret[11] = 'FGHIJ';
        $ret[12] = 'LMNOP';
        $ret[13] = 'QRSTU';
        $ret[14] = 'VWXYZ';
return $ret;
    }

 /*
$ret[3] ='フェイシャルケア';
$ret[4] ='ボディケア';
$ret[5] ='フットケア';
$ret[6] ='ヘアケア';
$ret[7] ='デンタルケア';
$ret[8] ='ネイルケア';
*/

    public function getPointWithGroup(){
        $group = $this->getPointGenre();
       App::import('Model','Item'); //別モデルを呼び出し， HogeRelationを使う
        $item = new Item;

        foreach($group as $g => $v){
            $conditions['conditions'] = array('group_id'=>$g,'genre_id'=>GENREPOINT);
            $all= $this->find('all',$conditions);

            foreach($all as $k => $v){
                $count = $item->getItemsCount(array('genres like'=>'%,'.$v['Genre']['id'].',%','valid'=>1));
                $all[$k]['Genre']['count'] = $count;
            }

            $ret[$g] = $all;

        }
        return $ret;
    }


    public function getPointGenre(){
        $ret[GENREPOINTFACE] ='フェイシャルケア';
        $ret[GENREPOINTBODY] ='ボディケア';
        $ret[GENREPOINTFOOT] ='フットケア';
        $ret[GENREPOINTHAIR] ='ヘアケア';
        $ret[GENREPOINTDENTAL] ='デンタルケア';
        $ret[GENREPOINTNAIL] ='ネイルケア';
        return $ret;
    }

    public function getGenreSubpageByGenreName($name){
        $genre = $this->GenreSubpage();
        return $genre[$name];
    }

    /**
    GenreID を元にGenreデータを取得
    **/
    public function getGenreByGenreID($id){
        $all = $this->Genre();
        return isset($all[$id])? $all[$id] : '';
    }



    /**
    genreIDを元にGenreTitleを取得
    List画面で、各項目titleを表示する
    **/
    public function getGenreTitleByGenreID($genreID){
        $genreID = isset($genreID)? $genreID : DEFAULTGENRE;
        $genre = $this->GenreTitle();
        return $genre[$genreID];
    }

    /**
    ITEMIDを受け取ってITEM情報を取得
    単数
    **/
    public function getItemByID($itemID,$fields=array()) {
        if(!$itemID){return;}
        $conditions['conditions'] = array(
                            'id'=>$itemID,
//                            'valid'=>1,
                            );
        if($fields){
            $conditions['fields'] = $fields;
        }

        $all = $this->find('first',$conditions);

        return $all;
    }


    /**
    urlNameを元にGenreIDを取得
    **/
    public function getGenreIDByUrlName($urlname){
        $genres = $this->Genre();

        foreach($genres as $genre){
            if($genre['urlname'] == $urlname){
                return $genre['id'];
            }
        }

        return DEFAULTGENRE;
    }

    public function getGenreByUrlName($urlname){
        $genres = $this->Genre();

        foreach($genres as $genre){
            if($genre['urlname'] == $urlname){
                return $genre;
            }
        }

        return '';

    }

    /**
    urlNameを元にGenreIDを取得
    **/
    public function getUrlnameByGenreID($genreID){
        $genres = $this->Genre();
        return $genres[$genreID]['urlname'];
    }


    /**
    staticページ(genreに属さないページの一覧を取得)
    **/
    public function getAllStaticGenre(){
        return $this->GenreStatic();
    }

    /**
    staticページの情報をGenreIDを用い取得
    **/
    public function getStatigGenreByGenreID($genreID){
        $genre = $this->GenreStatic();
        return isset($genre[$genreID]) ? $genre[$genreID] : null;
    }

    /**
    staticページの情報をpagenameを用い取得
    **/
    public function getStaticGenreIDByPageName($pagename){
        $genres = $this->GenreStatic();
        foreach($genres as $genre){
            if($genre['pagename'] == $pagename){
                return $genre['id'];
            }
        }
        return null;
    }

    public function getMailmagazine() {
        $Items['mailmagazine'][0] = '受け取らない';
        $Items['mailmagazine'][1] = '受け取る';
        return $Items;
    }

    public function getGender() {
        $Items['gender'][0] = '女';
        $Items['gender'][1] = '男';
        return $Items;
    }

    public function getValid() {
        $Items['valid'][0] = '非表示';
        $Items['valid'][1] = '表示';
        return $Items;
    }

    //年齢
    public function getAgeRange(){
        for($i=18;$i<65;$i++){
            $Items['age'][$i] = $i;
        }
        return $Items;
    }

    //週
    public function getWeekRange(){
        for($i=1;$i<6;$i++){
            $Items['weekrange'][$i] = $i;
        }
        return $Items;
    }

    //年
    public function getYearRange(){
        for($i=1;$i<50;$i++){
            $k = $i+1960;
            $Items['year'][$k] = $k;
        }
        return $Items;
    }
    //月
    public function getMonthRange(){
        for($i=1;$i<13;$i++){
            $Items['month'][$i] = $i;
        }
        return $Items;
    }

    //日
    public function getDayRange(){
        for($i=1;$i<32;$i++){
            $Items['day'][$i] = $i;
        }
        return $Items;
    }

    //契約形態
    public function getJob(){
        $Items['job'][0] = 'OL';
        $Items['job'][1] = '会社員';
        $Items['job'][3] = 'アルバイト/パート';
        $Items['job'][4] = '化粧品販売員';
        $Items['job'][5] = 'その他';
    return $Items;
    }

    public function getSkin(){
        $Items['skin'][1] = '敏感肌';
        $Items['skin'][2] = '乾燥肌';
        $Items['skin'][4] = '混合肌';
        $Items['skin'][3] = '脂性肌';

    return $Items;
    }

    public function getItemIcon(){
        $Items['ico'][0] = 'NEW';
        $Items['ico'][1] = '注目';
        $Items['ico'][2] = '人気';
        $Items['ico'][3] = 'サンプル有';
    return $Items;
    }


    //都道府県
    public function getPref() {
        $Items['pref']['1'] = '北海道';
        $Items['pref']['2'] = '青森県';
        $Items['pref']['3'] = '岩手県';
        $Items['pref']['4'] = '宮城県';
        $Items['pref']['5'] = '秋田県';
        $Items['pref']['6'] = '山形県';
        $Items['pref']['8'] = '茨城県';
        $Items['pref']['7'] = '福島県';
        $Items['pref']['9'] = '栃木県';
        $Items['pref']['10'] = '群馬県';
        $Items['pref']['11'] = '埼玉県';
        $Items['pref']['12'] = '千葉県';
        $Items['pref']['13'] = '東京都';
        $Items['pref']['14'] = '神奈川県';
        $Items['pref']['15'] = '新潟県';
        $Items['pref']['16'] = '富山県';
        $Items['pref']['17'] = '石川県';
        $Items['pref']['18'] = '福井県';
        $Items['pref']['19'] = '山梨県';
        $Items['pref']['20'] = '長野県';
        $Items['pref']['21'] = '岐阜県';
        $Items['pref']['22'] = '静岡県';
        $Items['pref']['23'] = '愛知県';
        $Items['pref']['24'] = '三重県';
        $Items['pref']['25'] = '滋賀県';
        $Items['pref']['26'] = '京都府';
        $Items['pref']['27'] = '大阪府';
        $Items['pref']['28'] = '兵庫県';
        $Items['pref']['29'] = '良県';
        $Items['pref']['30'] = '和歌山県';
        $Items['pref']['31'] = '鳥取県';
        $Items['pref']['32'] = '島根県';
        $Items['pref']['33'] = '岡山県';
        $Items['pref']['34'] = '広島県';
        $Items['pref']['35'] = '山口県';
        $Items['pref']['36'] = '徳島県';
        $Items['pref']['37'] = '香川県';
        $Items['pref']['38'] = '愛媛県';
        $Items['pref']['39'] = '高知県';
        $Items['pref']['40'] = '福岡県';
        $Items['pref']['41'] = '佐賀県';
        $Items['pref']['42'] = '長崎県';
        $Items['pref']['43'] = '熊本県';
        $Items['pref']['44'] = '大分県';
        $Items['pref']['45'] = '宮崎県';
        $Items['pref']['46'] = '鹿児島県';
        $Items['pref']['47'] = '沖縄県';
        return $Items;
    }

    public function getPoins(){
        for($i=0;$i<6;$i++){
            $Items['point'][$i] = $i;
        }
        return $Items;
    }

}
