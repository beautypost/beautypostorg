<?php

App::uses('Component', 'Controller');

class MailCComponent extends Component {

public $components = array('InfoC');

//             $bcc_mail = "pansymaster@becky.ne.jp";

function mailsend($mailto,$subject,$messages){

	mb_language("Ja") ;
	mb_internal_encoding("UTF-8") ;

	$mail_from = MAILFROM;

	$mailfrom="From:" .mb_encode_mimeheader(MAILFROMNAME) ."<$mail_from>";


	if(mb_send_mail($mailto,$subject,$messages,$mailfrom)){
	}

}

function createUpdateMailBody($nick,$trano){

$ret = "

┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　ベッキー♪パンジーひろばの会員期限更新をご希望された方に
　お送りしております。
　もしお心当たりが無い場合は、
　その旨pansymaster@becky.ne.jpまでご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

".$nick." 様

この度は、ベッキー♪パンジーひろばの
会員期限更新のお申し込みを頂き、誠にありがとうございました。


継続特典の「ベッキー♪パンジーひろばオリジナルグッズ」の
発送が完了致しました。
到着まで今しばらくお待ちくださいませ。


発送状況は、下記よりご確認頂けます。

[佐川急便]
PC：http://www.sagawa-exp.co.jp/
モバイル：http://k2k.sagawa-exp.co.jp/m/top.do

[お問い合わせ番号]
".trim($trano)."

※代金引換にてお申し込み頂いた方へ-------------

お受け取りの際、
¥¥4,622（継続年会費¥¥4,298+代引手数料¥¥324）を
佐川配達員へお渡しください。
なお、2週間以上ご入金が確認できなかった場合、
ご入金の確認が取れるまで、
パンジーひろばの閲覧権限を停止させて頂きますので、
予めご了承くださいませ。

-----------------------------------------------

ベッキー♪パンジーひろば
秘書室
pansymaster@becky.ne.jp

今後ともベッキー♪パンジーひろばをよろしくお願いいたします。
*:..。ｏ●☆゜・：，。";


return $ret;
}


public function createSubjectAndBodyByEx($customer,$ExpireCode){
    $r = array();
    switch($ExpireCode){
        case 6:
        case 15:
            $r['subject'] = twoweeksAnd5Days;
            $r['body'] = $this->twoweeksAnd5Days($customer);
            break;
        case 31:
        case 61:
            $r['subject'] = expire1monthAnd2month;
            $r['body'] = $this->expire1monthAnd2month($customer);
            break;
        case 0:
            $r['subject'] = expired;
            $r['body'] = $this->expired($customer);
            break;
    }
    return $r;
}

public function CreateUpdateMailAndSend($customer,$ExpireCode){

            $mailto = $customer['dtbCustomer']['email'];

//            $nick = $customer['dtbCustomer']['nick'];
            $trano = '';
            $r = $this->createSubjectAndBodyByEx($customer,$ExpireCode);
            $messages =$r['body'];
            $subject = $r['subject'];
            //mail送信
            $this->mailsend($mailto,$subject,$messages);
            return;

}


public function ShippingUpdateMailBody($row){

$body ='
[件名]【ベッキー♪パンジーひろば】オリジナルグッズ発送のお知らせ

[本文]
┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　ベッキー♪パンジーひろばの会員期限更新をご希望された方に
　お送りしております。
　もしお心当たりが無い場合は、
　その旨pansymaster@becky.ne.jpまでご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

'.$row['dtbCustomer']['nick'].' 様

この度は、ベッキー♪パンジーひろばの
会員期限更新のお申し込みを頂き、誠にありがとうございました。


継続特典の「ベッキー♪パンジーひろばオリジナルグッズ」の
発送が完了致しました。
到着まで今しばらくお待ちくださいませ。


発送状況は、下記よりご確認頂けます。

[佐川急便]
PC：http://www.sagawa-exp.co.jp/
モバイル：http://k2k.sagawa-exp.co.jp/m/top.do

[お問い合わせ番号]
".trim($data [$trano])."

※代金引換にてお申し込み頂いた方へ-------------

お受け取りの際、
¥¥4,622（継続年会費¥¥4,298+代引手数料¥¥324）を
佐川配達員へお渡しください。
なお、2週間以上ご入金が確認できなかった場合、
ご入金の確認が取れるまで、
パンジーひろばの閲覧権限を停止させて頂きますので、
予めご了承くださいませ。

-----------------------------------------------

ベッキー♪パンジーひろば
秘書室
pansymaster@becky.ne.jp

今後ともベッキー♪パンジーひろばをよろしくお願いいたします。
*:..。ｏ●☆゜・：，。';
return $body;

}

function ShippingCreateMailBodyCreditCard($row,$trano){

$body ='
※本メールは、
ベッキー♪パンジーひろば本会員登録がお済みの方にお送りしています。
もしお心当たりが無い場合は、　その旨contact@becky.ne.jpまで
ご連絡いただければ幸いです。

'.$row['dtbCustomer']['nick'].' 様

ベッキー♪パンジーひろば秘書室よりお知らせです。

いつもベッキー♪パンジーひろばをご利用頂き、ありがとうございます。

本日、会員証を発送させて頂きました。
到着まで今しばらくお待ちください。

商品の発送状況は以下よりご確認ください。
再配達依頼等に関しましては、配達店へお問い合わせくださいませ。

------------------
[佐川急便]
http://www.sagawa-exp.co.jp/

[お問い合わせ番号]
'.trim($trano).'
------------------

今後とも、ベッキー♪パンジーひろばをよろしくお願い致します。


//--------------';

return $body;
}

function ShippingCreateMailBodyDaibiki($row,$trano){

$body ='
※本メールは、
ベッキー♪パンジーひろば本会員登録がお済みの方にお送りしています。
もしお心当たりが無い場合は、その旨contact@becky.ne.jpまで
ご連絡いただければ幸いです。

'.$row['nick'].' 様

ベッキー♪パンジーひろば秘書室よりお知らせです。

いつもベッキー♪パンジーひろばをご利用頂き、ありがとうございます。

本日、会員証を発送させて頂きました。
到着まで今しばらくお待ちください。

商品の発送状況は以下よりご確認ください。
再配達依頼等に関しましては、配達店へお問い合わせくださいませ。

------------------
[佐川急便]
http://www.sagawa-exp.co.jp/

[お問い合わせ番号]
'.trim($trano).'
------------------

商品到着時、商品と引き換えにドライバー(配達人)へ現金でお支払い頂きます。
合計金額は5,322円
（年会費税込4,298円 + 送料税込700円 + 代引手数料税込324円）となりますので、
ご用意頂けますようお願い致します。


今後とも、ベッキー♪パンジーひろばをよろしくお願い致します。

------------------';
return $body;
}


public function expire1monthAnd2month($customer){

$body ='
┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　ベッキー♪パンジーひろば秘書室より会員期間の満了時期が近い方にお送りしています。
　もしお心当たりが無い場合は、
　その旨pansymaster@becky.ne.jpまでご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

'.$customer['dtbCustomer']['nick'].'　様

ベッキー♪パンジーひろば秘書室よりお知らせです。

貴方様の会員資格の有効期限についてご案内致します。

継続を希望される方は、有効期限内に継続の手続き(入金まで)をしていただけますよう、お願いいたします。
また、有効期限が過ぎてしまいますと、再入会はできず、新規会員登録となりますので、会員番号も引き継ぐことができません。予めご了承ください。
会員継続をして頂いた方にはもれなく、継続年数によって変わる「ベッキー♪パンジーひろばオリジナルグッズ（非売品）」をプレゼントさせていただきます。
楽しみに待っていてくださいね！

既にお振り込みをされた方で、本状と行き違いでお振り込みをされた方には、
大変申し訳ありません。

継続をご希望される方は、大変お手数ですが、下記お支払方法をご確認ください。
また、銀行振込をご利用される方は、振込み名義人様の前に必ず会員番号の記載をお願い致します。


【年会費のお支払方法】

□クレジットカード：年会費￥4,298（税込）（*一括払いのみ）『VISA』『Master』『JCB』『AMEX』が使用できます。
http://www.becky.ne.jp/pansy/contents/expire_payment.php?mode=regist&id='.$customer['dtbCustomer']['secret_key'].'&type=1

□代金引換：年会費￥4,298（税込）+代引手数料￥324＝￥4,622を佐川急便配達員へお支払ください。
http://www.becky.ne.jp/pansy/contents/expire_payment.php?mode=regist&id='.$customer['dtbCustomer']['secret_key'].'&type=10

□銀行振込：年会費￥4,298（税込）+　振込手数料をお振込み下さい。
振込先・・・ゆうちょ銀行　〇一九（ゼロイチキユウ）店（019）　当座 0559461
　　　　　　サンミュージックファンクラブ
※振込み名義人様の前に必ず会員番号の記載をお願い致します。
例：会員番号　振込名義人様のお名前

銀行振込の振込口座が変わりました！
※現在は一時的にこちらの口座をご案内させていただきます。
※口座変更の際はまた改めてご連絡させて頂きます。
※既に以前の口座にお振込みして頂きました方でも継続のご案内は完了になります。ご安心下さい。
※本日以降からはこちらの変更後の口座へのお振込みをお願い致します。

----------------------------------------------------------------
【有効期限】
<<' . date("Y年m月d日",strtotime($customer['dtbCustomer']['expire_date'])) . '>>
【申し込み期限】
<<' . date("Y年m月d日",strtotime($customer['dtbCustomer']['expire_date'])) . '>>
----------------------------------------------------------------


今後ともベッキー♪パンジーひろばをよろしくお願いいたします。
*:..。ｏ●☆゜・：，。';
return $body;
}

public function twoweeksAnd5Days($customer){

/*翌月最終日*/
$expireNextdate = date("n月t日",strtotime(date("Y-m-01",strtotime($customer['dtbCustomer']['expire_date']))."+1 month"));
/*翌月最初の日*/
$expireNextone = date("n月1日",strtotime(date("Y-m-01",strtotime($customer['dtbCustomer']['expire_date']))."+1 month"));



$body ="
┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　ベッキー♪パンジーひろば秘書室より会員期間の満了時期が近い方にお送りしています。
　もしお心当たりが無い場合は、
　その旨pansymaster@becky.ne.jpまでご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

".$customer['dtbCustomer']['nick']." 様

ベッキー♪パンジーひろば秘書室よりお知らせです。
貴方様の会員資格の有効期限が、".date("n月j日",strtotime($customer['dtbCustomer']['expire_date']))."までとなっております。
その為、".$expireNextone."から1ヶ月間（".$expireNextdate."まで）を猶予期間とし、現在は、自動延長期間という形になっております。
継続を希望される方は、".$expireNextdate."までに継続の手続き(入金まで)をおこなって頂きますよう、お願い申し上げます。
".$expireNextdate."が過ぎてしまいますと、自動退会となり、お客様のデータは消去させて頂きます。
再入会の際は、新規会員登録となりますので、会員番号も引き継ぐことが出来ません。予めご了承ください。

継続を希望される方は、有効期限内に継続の手続き(入金まで)をおこなって頂きますよう、お願い申し上げます。
自動延長期間中でも会員継続をして頂いた方にはもれなく、
継続年数によって変わる「ベッキー♪パンジーひろばオリジナルグッズ（非売品）」をプレゼントさせていただきます。
楽しみに待っていてくださいね！

既にお振り込みをされた方で、本状と行き違いでお振り込みをされた方には、大変申し訳ありません。

継続をご希望される方は、大変お手数ですが、下記お支払方法をご確認ください。
また、銀行振込をご利用される方は、振込み名義人様の前に必ず会員番号の記載をお願い致します。


【年会費のお支払方法】

□クレジットカード；年会費￥4,298（税込）（*一括払いのみ）『VISA』『Master』『JCB』『AMEX』が使用できます。
http://www.becky.ne.jp/pansy/contents/expire_payment.php?mode=regist&id=".$customer['dtbCustomer']['secret_key']."&type=1

□代金引換：年会費￥4,298（税込）+代引手数料￥324＝￥4,622を佐川急便配達員へお支払ください。
http://www.becky.ne.jp/pansy/contents/expire_payment.php?mode=regist&id=".$customer['dtbCustomer']['secret_key']."&type=10

□銀行振込：年会費￥4,298（税込）+　振込手数料をお振込み下さい。
振込先・・・ゆうちょ銀行　〇一九（ゼロイチキユウ）店（019）　当座 0559461
　　　　　　サンミュージックファンクラブ
※振込み名義人様の前に必ず会員番号の記載をお願い致します。
例：会員番号　振込名義人様のお名前

銀行振込の振込口座が変わりました！
※現在は一時的にこちらの口座をご案内させていただきます。
※口座変更の際はまた改めてご連絡させて頂きます。
※既に以前の口座にお振込みして頂きました方でも継続のご案内は完了になります。ご安心下さい。
※本日以降からはこちらの変更後の口座へのお振込みをお願い致します。

インターネットでのモバイルバンキングでもお振込み頂けます。詳しくは各銀行のホームページなどで振込方法をご確認下さい。

----------------------------------------------------------------
【有効期限】
<<" . date("Y年m月d日",strtotime($customer['dtbCustomer']['expire_date'])) . ">>
【猶予期限】
<<" . date("Y年m月t日",strtotime(date("Y-m-01",strtotime($customer['dtbCustomer']['expire_date']))."+1 month")) . ">>
【申し込み期限】
<<" . date("Y年m月t日",strtotime(date("Y-m-01",strtotime($customer['dtbCustomer']['expire_date']))."+1 month")) . ">>
----------------------------------------------------------------


今後ともベッキー♪パンジーひろばをよろしくお願いいたします。
*:..。ｏ●☆゜・：，。";
return $body;

}

public function expired($customer){

$body ="
┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　ベッキー♪パンジーひろば秘書室より会員継続ご希望の方にお送りしています。
　もしお心当たりが無い場合は、
　その旨pansymaster@becky.ne.jpまでご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

" . $customer['dtbCustomer']['nick']. "　様
ベッキー♪パンジーひろば秘書室よりお知らせです。

以下の継続申し込み専用ページにアクセスし、ご希望の入金方法を選択、
必要項目をご入力いただき、お申し込みください。

継続をお申込みいただいた方にはもれなく
「ベッキー♪パンジーひろばオリジナルグッズ（非売品）」を
プレゼントさせていただきます。

【継続申し込み専用ページ】
◇クレジットカード
http://www.becky.ne.jp/pansy/contents/expire_payment.php?mode=regist&id=".$customer['dtbCustomer']['secret_key']."&type=1
◇代金引換
http://www.becky.ne.jp/pansy/contents/expire_payment.php?mode=regist&id=".$customer['dtbCustomer']['secret_key']."&type=10

※入力されたお客様の情報はSSL暗号化通信により保護されます。
----------------------------------------------------------------
【有効期限】
お申込みいただいた月の翌年同月末日までが有効期限となります。
----------------------------------------------------------------
【支払方法】
◇クレジットカード
　　年会費￥4,298（税込）　※一括のみ
　　『VISA』『Master』『JCB』『AMEX』が使用できます。
◇代金引換
　　年会費￥4,298（税込）+代引手数料￥324＝￥4,622を佐川急便配達員へお支払ください。
◇銀行振込：年会費￥4,298（税込）+　振込手数料をお振込み下さい。
振込先・・・ゆうちょ銀行　〇一九（ゼロイチキユウ）店（019）　当座 0559461
　　　　　　サンミュージックファンクラブ
※振込み名義人様の前に必ず会員番号の記載をお願い致します。
例：会員番号　振込名義人様のお名前

銀行振込の振込口座が変わりました！
※現在は一時的にこちらの口座をご案内させていただきます。
※口座変更の際はまた改めてご連絡させて頂きます。
※既に以前の口座にお振込みして頂きました方でも継続のご案内は完了になります。ご安心下さい。
※本日以降からはこちらの変更後の口座へのお振込みをお願い致します。
----------------------------------------------------------------

今後ともベッキー♪パンジーひろばをよろしくお願いいたします。
*:..。ｏ●☆゜・：，。";
return $body;

}


}
?>