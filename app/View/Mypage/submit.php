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
            <section id="signup-form">
                <h2 class="head-bar ico-arrow">登録情報変更</h2>
                <p class="system-msg">ユーザー登録情報を変更しました。</p>
                <form>
                    <ul class="formlist">
                        <li class="required">
                            <dl>
                                <dt><label for="user-mail" class="inner">メールアドレス</label></dt>
                                <dd><?php echo $data['Snsuser']['email']?></dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-pass" class="inner">パスワード</label></dt>
                                <dd>********</dd>
                            </dl>
                        </li>
                    </ul><!-- /.formlist -->

                    <p class="head-category">基本情報</p>

                    <ul class="formlist">
                        <li class="optional">
                            <dl>
                                <dt><label for="user-realname" class="inner">名前</label></dt>
                                <dd><?php echo $data['Snsuser']['name']?></dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-name" class="inner">ニックネーム</label></dt>
                                <dd><?php echo $data['Snsuser']['username']?></dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">性別</span></dt>
                                <dd>
                                    <?php echo $this->Useful->ViewselectValue($Gender['gender'],$data['Snsuser']['gender'])?>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">生年月日</span></dt>
                                <dd>
                                    <?php echo $this->Useful->ViewselectValue($Year['year'],$data['Snsuser']['year'])?>年
                                <span class="unit">年</span>
                                    <?php echo $this->Useful->ViewselectValue($Month['month'],$data['Snsuser']['month'])?>月
                                <span class="unit">月</span>
                                    <?php echo $this->Useful->ViewselectValue($Day['day'],$data['Snsuser']['day'])?>日
                                <span class="unit">日</span>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-cluster" class="inner">種別</label></dt>
                                <dd>
                                    <?php echo $this->Useful->ViewselectValue($Job['job'],$data['Snsuser']['job'])?>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">Beauty Postメール</span></dt>
                                <dd>
                                    <?php echo $this->Useful->ViewselectValue($Mailmagazine['mailmagazine'],$data['Snsuser']['mailmagazine'])?>肌質
                                </dd>
                            </dl>
                        </li>
                    </ul><!-- /.formlist -->

                    <div class="extra">
                        <ul class="formlist">
                            <li class="required">
                                <dl>
                                    <dt><label for="user-address" class="inner">住んでいるエリア</label></dt>
                                    <dd>
                                        <?php echo $this->Useful->ViewselectValue($Pref['pref'],$data['Snsuser']['pref'])?>
                                        <?php echo $data['Snsuser']['address']?>
                                    </dd>
                                </dl>
                            </li>
                            <li class="required">
                                <dl>
                                    <dt><label for="user-skintype" class="inner">肌質</label></dt>
                                    <dd>
                                        <?php echo $this->Useful->ViewselectValue($Skin['skin'],$data['Snsuser']['skin'])?>
                                    </dd>
                                </dl>
                            </li>
                        </ul><!-- /.formlist -->
                    </div>
                </form>

                <footer class="form-nav">
                    <a href="<?php echo WEBROOT?>Mypage/" class="button btn-vpk">マイページトップヘ戻る</a>
                </footer>

            </section><!-- /#signup-form -->
        </div><!-- /#main-area -->
    </div>
</div><!-- /#page-area -->