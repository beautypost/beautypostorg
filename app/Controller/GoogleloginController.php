<?php


/*******Google ******/
require_once '../Vendor/Google/src/config.php';
require_once '../Vendor/Google/src/Google_Client.php';
require_once '../Vendor/Google/src/contrib/Google_PlusService.php';
require_once '../Vendor/Google/src/contrib/Google_Oauth2Service.php';


/**
 * This UsersController class will have functions that handles user registeration,
 * login, forget password and other functionalities
 * @author muni
 * @copyright www.smarttutorials.net
 */
Class GoogleloginController extends AppController{
    /**
     * This beforeFilter will excuted before excting other
     * functions, this will some function to excute before get
     * logged in
     * (non-PHPdoc)
     * @see Controller::beforeFilter()
     */
    public function beforeFilter(){
//      $this->Auth->allow('fblogin', 'fb_login', 'google_login', 'googlelogin', 'register', 'forget_password', 'check_email', 'check_email_exists', 'check_password' );
        parent::beforeFilter();
    }


    public function login(){
        $this->autoRender = false;
//      require_once '../Config/google_login.php';
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');
        $url = $client->createAuthUrl();
        $this->redirect($url);
    }


    public function google_login(){

        $this->autoRender = false;
//      require_once '../Config/google_login.php';
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login','https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');

        $plus       = new Google_PlusService($client);
        $oauth2     = new Google_Oauth2Service($client);
        if(isset($_GET['code'])) {
            $client->authenticate(); // Authenticate
//            $_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
        }
//var_dump('aaaa');
        if(isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        if ($client->getAccessToken()) {
            $_SESSION['access_token'] = $client->getAccessToken();
            $user         = $oauth2->userinfo->get();
            // var_dump($user);
            // exit;
                if(!empty($user)){
                    //すでに登録済みかどうか
                    $result = $this->Snsuser->getItemBySNSid($user['id'],GOOGLEKEY);
                    //登録済みログイン
                    if(!empty( $result )){
                        $bid = $result['Snsuser']['beautyid'];
                    }else{
                    //新規登録ログイン
                        $bid = $this->Snsuser->googlesignin($user);
                    }

                    $this->Session->write(SESSIONNAME,$bid);
                    $this->redirect(REDIRECTURL);


                }else{
                    //認証失敗indexに戻る

                }
        }

        exit;
    }

}