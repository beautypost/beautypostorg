<?php
 
define('APP_ID', '1448329078773143');
define('APP_SECRET', '0d0665fb6442e692a29c3e20d03a9035');
define('CALLBACK', 'http://bizran.jp/callback.php');
 
$authURL = 'http://www.facebook.com/dialog/oauth?client_id=' .
    APP_ID . '&redirect_uri=' . urlencode(CALLBACK);
 
header("Location: " . $authURL);