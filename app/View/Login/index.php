<div id="page-area">
    <div class="layout">
        <div id="main-area">
            <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
                <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
                <li>会員ログイン</li>
            </ol><!-- /#breadcrumb -->

            <?php if($errormessage):?>
            <div class="error-msg container">
                <p><?php echo $errormessage?></p>
            </div><!-- /.error-msg -->
            <?php endif;?>

            <div id="login-section" class="container">
                <section id="login-form">
                    <h2 class="head-bar ico-arrow">ログイン</h2>

                        <form action="<?php echo WEBROOT?>login/mailLogin" method="post">
                        <div class="box-contents">
                            <dl class="box-contents-body">
                                <dt>会員ID（またはメールアドレス）</dt>
                                <dd><input type="text" name="data[email]"></dd>
                                <dt>パスワード</dt>
                                <dd><input type="text" name="data[password]"></dd>
                            </dl>
                        </div>
                        <div class="form-footer">
                            <p class="remember">
                                <label><input type="checkbox" name="data[stat]" value="1">ログイン状態を保存する（1ヶ月間）</label>
                            </p>
                            <button class="button btn-vpk btn-sizeM">ログイン</button>
                            <ul>
                                <li><a href="<?php echo WEBROOT?>Forgetpassword/">パスワードを忘れた方</a></li>
                                <li><a href="<?php echo WEBROOT?>Regist/input/?sns=<?php echo WEBKEY?>">まだアカウントをお持ちでない方</a></li>
                            </ul>
                        </div><!-- /.form-footer -->
                        <input type="hidden" name="sns" value="<?php echo WEBKEY?>">
                    </form>
                </section><!-- /#login-form -->
                <section id="login-social">
                    <h2 class="head-bar ico-arrow"><span class="wsnw">ソーシャル連携で登録／</span><span class="wsnw">ログイン</span></h2>
                    <div class="section-body">
                        <ul>
                            <li>
                            <a href="<?php echo WEBROOT?>Googlelogin/login/" class="button btn-google"><i class="fa fa-google-plus"></i><span>利用規約に同意して</span>Google経由でログイン</a>
                            </li>
                            <li>
                            <a href="<?php echo WEBROOT?>fbconnect/facebook/" class="button btn-facebook"><i class="fa fa-facebook-official"></i><span>利用規約に同意して</span>Facebook経由でログイン</a>
                            </li>
                            <li>
                            <a href="<?php echo WEBROOT?>TwLogin/twitterLogin" class="button btn-twitter"><i class="fa fa-twitter"></i><span>利用規約に同意して</span>Twitter経由でログイン</a>
                            </li>
                        </ul>
                        <footer>
                            <p>許可なく Facebook、Google+、Twitterに投稿することはありません。<br class="rsp-xxxo">
                            <a href="<?php echo WEBROOT?>pages/guide">利用規約</a>と<a href="<?php echo WEBROOT?>pages/privacy">プライバシーポリシー</a>に同意いただきログインください。</p>
                        </footer>
                    </div><!-- /.section-body -->
                </section><!-- /#login-social -->
            </div><!-- /#login-section -->

            <section id="visitor-section">
                <h2 class="head-bar ico-arrow">はじめてご利用の方はこちら</h2>
                <div class="section-body">
                    <p><span class="wsnw">まだアカウントをお持ちでない方は、</span><wbr><span class="wsnw">メンバー登録（無料）を行ってください。</span></p>
                    <div class="signup">
                        <a href="<?php echo WEBROOT?>regist/input/" class="button btn-pk btn-sizeM">メンバー登録</a>
                    </div>
                </div>

                <section id="privilege">
                    <div class="section-body">
                        <h2><img src="<?php echo WEBROOT?>images/login/privilege-head.png" width="928" height="104" alt="Beauty Postメンバー会員特典について"></h2>
                        <ul>
                            <li>
                                <img src="<?php echo WEBROOT; ?>images/login/privilege01.png" class="fitimg-w" alt="美容天気予報（天気や紫外線×肌質）を毎日GET♪">
                            </li>
                            <li>
                                <img src="<?php echo WEBROOT; ?>images/login/privilege02.png" class="fitimg-w" alt="美容機器のモニター参加やサンプルがもらえる">
                            </li>
                            <li>
                                <img src="<?php echo WEBROOT; ?>images/login/privilege03.png" class="fitimg-w" alt="気になる商品の「スペック比較」ができる！">
                            </li>
                            <li>
                                <img src="<?php echo WEBROOT; ?>images/login/privilege04.png" class="fitimg-w" alt="商品のレビュー投稿ができる！！">
                            </li>
                            <li>
                                <img src="<?php echo WEBROOT; ?>images/login/privilege05.png" class="fitimg-w" alt="Want！ボタンでほしい商品をクリップ">
                            </li>
                            <li>
                                <img src="<?php echo WEBROOT; ?>images/login/privilege06.png" class="fitimg-w" alt="みんなの美活アンケートやお役立ち美容通信もチェック！">
                            </li>
                        </ul>
                        <footer>
                            <a href="<?php echo WEBROOT; ?>pages/privilege/" class="button btn-pk">詳しくはこちら</a>
                        </footer>
                    </div><!-- /.section-body -->
                </section><!-- /#privilege -->
            </section><!-- /#visitor-section -->

        </div><!-- /#main-area -->
    </div>
</div><!-- /#page-area -->
