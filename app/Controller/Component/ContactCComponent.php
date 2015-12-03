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

    お問い合わせありがとうございました。

    お問い合わせいただきました内容について2.3日(営業日)中に
    担当者より頂いたメールアドレス宛に返答を致します。

    お問い合せ内容
    □■――――――――――――――――――――――――――――――――――■□
    お問い合わせ日時 : $day
    会社名 : $company
    部署名 : $group
    担当者名 : $name
    メールアドレス : $email
    電話番号 : $tel
    住所 : $zip1 $zip2 $address
    会社ホームページ : $website
    お問い合わせ内容 :
    $comment
    □■――――――――――――――――――――――――――――――――――■□


    □■――――――――――――――――――――――――――――――――――■□

    http://beautypost.jp
    info@beautypost.jp
    □■――――――――――――――――――――――――――――――――――■□

EOD;


    return $str;

}


public function setMessagePw($Snsuser,$key){


    $domain = DOMAIN;
    $day = date("Y/m/d g:i");
    $str = <<<EOD

    お問い合わせありがとうございました。

    お問い合せ内容
    □■――――――――――――――――――――――――――――――――――■□
    お問い合わせ日時 : $day
    変更URL $domain/forgetpassword/pwinput/?key=$key
    □■――――――――――――――――――――――――――――――――――■□


    □■――――――――――――――――――――――――――――――――――■□

    http://beautypost.jp
    info@beautypost.jp
    □■――――――――――――――――――――――――――――――――――■□

EOD;


    return $str;

}


}
?>