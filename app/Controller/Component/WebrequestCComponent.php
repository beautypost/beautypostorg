<?php

App::uses('Component', 'Controller');

class WebrequestCComponent extends InfoCComponent {


public function setMessage($message,$Genre,$Genrename){


$day = date("Y/m/d g:i");
$str = <<<EOD

URLの登録がありました


お問い合せ内容
□■――――――――――――――――――――――――――――――――――■□ 
お問い合わせ日時 : $day
URL : $message
ジャンル : $Genre
ジャンル名: $Genrename
□■――――――――――――――――――――――――――――――――――■□ 

□■――――――――――――――――――――――――――――――――――■□ 
検索比較サイト ビズラン
http://bizran.jp
info@bizran.jp
□■――――――――――――――――――――――――――――――――――■□ 

EOD;


return $str;

}




}
?>