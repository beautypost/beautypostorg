<?php

App::uses('Component', 'Controller');

class ContactCComponent extends InfoCComponent {


public function setMessage($message,$ContactModel){


$title = $ContactModel->getTitleByID($message['title']);
$onamae = $message['onamae'];
$email = $message['email'];
$comment = $message['comment'];
$day = date("Y/m/d g:i");
$str = <<<EOD

お問い合わせありがとうございました。

お問い合わせいただきました内容について2.3日(営業日)中に
担当者より頂いたメールアドレス宛に返答を致します。

お問い合せ内容
□■――――――――――――――――――――――――――――――――――■□ 
お問い合わせ日時 : $day
お問い合せタイトル : $title
お名前 : $onamae
メールアドレス : $email
コメント : 
$comment
□■――――――――――――――――――――――――――――――――――■□ 

今後共検索比較サイト　ビズラン　をよろしくお願いいたします。

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