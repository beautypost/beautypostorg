<?php

if(
    ($_SERVER["HTTP_HOST"] == 'localhost')||
    ($_SERVER["HTTP_HOST"] == '127.0.0.1')
){
	define('WEBROOT','/beautypost/');
	define('FBDEBUG',1);
//	define('FBDEBUG',0);
	define('DOMAIN','http://localhost/beautypost');

 define('UploadImagePath','/Library/WebServer/Documents/beautypost/app/webroot/images/item/');


}else{
	define('DOMAIN','http://beauty-post.jp');
	define('WEBROOT','/');
	define('FBDEBUG',0);
}

define('REDIRECTURL',DOMAIN);

define('TWITTERKEY',1);
define('FACEBOOKKEY',2);
define('GOOGLEKEY',3);
define('SESSIONNAME','BeautyPostUser');

define('WEBKEY',4);

define('QUESTIONSUBLIMIT',2);
define('NEWSSUBLIMIT',5);
define('BLOGPAGELIMIT',10);
define('BLOGPAGESUBLIMIT',5);
define('LIMIT',15);
define('PAGESTART',0);
define('PAGERLIMIT',5);

define('GENREKISYU',1);
define('GENREPURPOSE',2);
define('GENREPOINT',3);
define('GENREMAKER',4);
define('GENREBLOG',5);
define('GENRECOLUMN',6);


define('GENREPOINTFACE',3);
define('GENREPOINTBODY',4);
define('GENREPOINTFOOT',5);
define('GENREPOINTHAIR',6);
define('GENREPOINTDENTAL',7);
define('GENREPOINTNAIL',8);

define('GENREKISYUNAME','機種');
define('GENREPURPOSENAME','目的');
define('GENREPOINTNAME','部位');
define('GENREMAKERNAME','メーカー');
define('GENREBLOGNAME','ブログ');
define('GENRECOLUMNNAME','コラム');



define('NEWSADD',1);
define('NEWSSALE',2);
define('NEWSPOST',3);

define('CONTACTID',104);

define('OFFSET',0);

define('BLOGPAGEITEMSLIMIT',3);

define('INDEXNEWSOFFSET',0);
define('INDEXNEWSLIMIT',10);
define('INDEXITEMLIMIT',3);

define('NEWSOFFSET',0);
define('NEWSLIMIT',15);
define('NEWSTOPLIMIT',3);
define('SADMIN','admin');
define('ADMINID',SADMIN.',903396276342027,1475559396029318');
define('BLOGIMAGEPATH',WEBROOT.'img/blog/');

define('NOWPRINTING','assets/img/screenshot/nowprinting.png');

define('FBAPPID','517655641733289');
define('FBSECRET','084291de7eff7e242d43c394b9cb7027');


//twitter api
// define('CONSUMER_KEY', 'PhxzNu7lfUBgpCIPpKlA7amsi' );
// define('CONSUMER_SECRET', '1vQnYCCr2rPEosaRlw73GvroGPqVp9vPy2x6F8rjk7m7jzDOSX' );
// define('OAUTH_CALLBACK', 'http://127.0.0.1/beautypost/UserLogin/Twittercallback.php' );
define('ACCESS_TOKEN','2872409804-LTblc08GJ0uKiclmbygLCmEv4mNwGD2RXwubeGX');
define('ACCESS_TOKEN_SECRET','4qLlUhhQPU0CvOvJeuuvBeUUGBMCvM0J9qLP8I3aq5cKD');

//Google App Details
define('GOOGLE_APP_NAME', 'BeautyPost');
define('GOOGLE_OAUTH_CLIENT_ID', '585636120855-ng718bo96ir98id20oebhitue8u5kg3r.apps.googleusercontent.com');
define('GOOGLE_OAUTH_CLIENT_SECRET', '767h_2AfdmrBueeuAp_xRZ5K');
define('GOOGLE_OAUTH_REDIRECT_URI', DOMAIN.'/Googlelogin/google_login');
define("GOOGLE_SITE_NAME", 'http://beauty-post.jp');

// /*******Google ******/
// require_once '../Vendor/Google/src/config.php';
// require_once '../Vendor/Google/src/Google_Client.php';
// require_once '../Vendor/Google/src/contrib/Google_PlusService.php';
// require_once '../Vendor/Google/src/contrib/Google_Oauth2Service.php';


define('PAGETITLE','お問い合わせ');



define('REQUESTPAGETITLE','サービスお申込み');
define('REQUESTPAGEDESCRIPTION','サービスお申込み');

define('ERRORMESSAGEVOTE','必ず一つは投票を行ってください');
define('WEBREQUESTSUBJECT','URL登録を受け付けました');
define('DEFUALTSORT',' service.id DESC');
define('PAGELIMIT',100);
define('PAGEOFFSET',0);
define('DEFAULTGENRE',1);

//define('VOTEMAX',5);
//define('BASICAUTH','bizran:123123@');
define('BASICAUTH','');
define('CONTACTSUBJECT','お問い合わせ::');
define('MAILTO','info2@knsc.jp');
define('MAILFROM','info@bizran.jp');

define('MYPAGETITLE','マイページ');
define('MYPAGEKEYWORDS','マイページ');
define('MYPAGEDESCRIPTION','マイページ情報になります');

define('FACEBOOKPAGETITLE','Facebookログイン');


?>