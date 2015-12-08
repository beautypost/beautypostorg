<?php

App::uses('Component', 'Controller');

class ContactCComponent extends Component {


public function setMessage($message,$ContactModel){


$title = $ContactModel->getTitleByID($message['title']);
$name = $message['name'];
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
お名前 : $name
メールアドレス : $email
コメント :
$comment
□■――――――――――――――――――――――――――――――――――■□


□■――――――――――――――――――――――――――――――――――■□

http://beautypost.jp
info@beautypost.jp
□■――――――――――――――――――――――――――――――――――■□




EOD;


return $str;

}

public function setMessageMaker($message,$ContactModel){


    $name = $message['name'];
    $email = $message['email'];
    $comment = $message['message'];
    $group = $message['group'];
    $company = $message['company'];
    $zip1 = $message['zip1'];
    $zip2 = $message['zip2'];
    $website = $message['website'];
    $tel = $message['tel'];
    $address = $message['address'];



    $day = date("Y/m/d g:i");
    $str = <<<EOD

Beauty Post 編集部です。
この度はお問い合せいただき誠にありがとうござます。

翌営業日以内にご返答しますので、
今しばらくお待ちくださいますようお願いいたします。

お問い合わせ内容
----------------------------------------------------
■御社名        ：$company

□部署名  　　  ：$group

■ご担当者名   ：$name

■メールアドレス    ：$email

■お問い合せ内容
$comment

----------------------------------------------------
※このメールはシステムの自動送信メールから送信をしています。
システム上、お客様さまからの返信には応答しかねますので、予めご了承くださいませ。

-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
　Beauty Post 編集部
　〒104-0061　東京都中央区銀座7-15-8
　Email：info@beauty-post.jp
　URL ：https://beauty-post.jp
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-

EOD;


    return $str;

}


public function setMessagePw($Snsuser,$key){


    $domain = DOMAIN;
    $day = date("Y/m/d g:i");
    $str = <<<EOD
下記URLをクリックして、パスワードの再設定をお願いいたします。

【会員ID(メールアドレス）】
$Snsuser['Snsuser']['email']

■ 新パスワード再設定用URL
https://$domain/forgetpassword/pwinput/?key=$key
※6文字〜12文字の半角英数字で設定をお願いいたします。

【注意事項】
・パスワード再設定用のURLは、セキュリティ保持のため有効期限が設けられています。
  メールを受信されましたら速やかに手続きを行ってください。


【お問い合わせ先】
■ お問い合わせフォーム
http://beauty-post.jp/Contact/

※このメールはBeauty Postのパスワード再設定の手続きが行われた
　メールアドレス宛てにお送りしています。
　心あたりが無い場合は、破棄してください。

-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
　Beauty Post 編集部
　〒104-0061　東京都中央区銀座7-15-8
　Email：info@beauty-post.jp
　URL ：https://beauty-post.jp
-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
EOD;


    return $str;

}


}
?>