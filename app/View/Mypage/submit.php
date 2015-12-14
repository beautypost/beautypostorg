<div id="page-area">
    <div class="layout">
        <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
            <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
            <li><a href="<?php echo WEBROOT?>">マイページ</a></li>
            <li>登録情報変更</li>
        </ol><!-- /#breadcrumb -->

        <div class="layout-main layout-r">
            <h2 class="pagetitle"><!--
                 --><img src="<?php echo WEBROOT?>images/mypage/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="マイページ My Page"><!--
                 --><img src="<?php echo WEBROOT?>images/mypage/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="マイページ My Page"><!--
             --></h2>
        </div><!-- /.layout-main.layout-r -->

        <aside id="mypage-menu" class="layout-sub layout-l">
            <?php echo $this->element('common/cmnMypage')?>
        </aside><!-- /#mypage-menu -->

        <div id="main-area" class="layout-main layout-r">
            <section id="signup-completion">
                <h2 class="head-bar ico-arrow">Beauty Postメンバー情報編集</h2>
                <div class="sec-body tac">
                    <p class="completion-msg">編集完了しました！</p>
                    <p class="txt"><br class="rsp-oxxx">
                    引き続きBeauty postをご利用ください。</p>
                    <div class="box-contents">
                        <p class="box-contents-body">次回、ログインの際にはご登録のメールアドレスが<br class="rsp-xxox">IDとなりますので、ID入力欄に入力してください。<br>
                        ID、パスワードをお忘れの場合は、お問い合わせフォームよりお問い合わせください。</p>
                    </div>
                </div>
                <footer class="form-nav">
                    <ul>
                        <li><a href="<?php echo WEBROOT?>Mypage/" class="button btn-vpk">マイページへ</a></li>
                    </ul>
                </footer>
            </section><!-- /#signup-completion -->
        </div><!-- /#main-area -->


    </div>
</div><!-- /#page-area -->