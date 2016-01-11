<div id="page-area">
    <div class="layout">
        <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
            <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
            <li>マイページ</li>
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
            <section id="mp-advisory">
                <header>
                    <h2 class="advisory-head"><img src="<?php echo WEBROOT; ?>images/mypage/advisory-head.png" class="fitimg-w" alt="あなたの美容天気予報"></h2>
                    <div class="advisory-status">
                        <ul>
                            <li><dl><dt>登録地域</dt><dd><?php echo $this->Useful->ViewselectValue($Pref['pref'],$UserData['Snsuser']['pref'])?></dd></dl></li>
                            <li><dl><dt>肌質</dt><dd><?php echo $this->Useful->ViewselectValue($Skin,$UserData['Snsuser']['skin'])?></dd></dl></li>
                        </ul>
                    </div><!-- /.advisory-status -->
                </header>

                <div class="section-body">
                    <section class="advisory-dryair level<?php echo $hada['level']?>">
                        <h2><img src="<?php echo WEBROOT; ?>images/mypage/dryair1.png" alt="" class="fitimg-w"></h2>
                        <div class="section-body">
                            <img src="<?php echo WEBROOT; ?>images/mypage/advisory-boxtop.png" alt="" class="fitimg-w">
                            <p class="js-ah-xooo"><?php echo $hada['comment']?></p>
                            <img src="<?php echo WEBROOT; ?>images/mypage/advisory-boxbtm.png" alt="" class="fitimg-w">
                        </div><!-- /.section-body -->
                    </section><!-- /.advisory-dryair -->

                    <section class="advisory-sunburn level<?php echo $hiyake['level']?>">
                        <h2><img src="<?php echo WEBROOT; ?>images/mypage/sunburn2.png" alt="" class="fitimg-w"></h2>
                        <div class="section-body">
                            <img src="<?php echo WEBROOT; ?>images/mypage/advisory-boxtop.png" alt="" class="fitimg-w">
                            <p class="js-ah-xooo"><?php echo $hiyake['comment']?></p>
                            <img src="<?php echo WEBROOT; ?>images/mypage/advisory-boxbtm.png" alt="" class="fitimg-w">
                        </div><!-- /.section-body -->
                    </section><!-- /.advisory-sunburn -->
                </div>
                <footer>
                    <p class="tar"><small>&#169; Craid &amp; Yuka Natsumi </small></p>
                </footer>
            </section><!-- /#mp-advisory -->

            <section id="mp-news">
                <h2 class="head-bar ico-arrow">Beauty Postからのお知らせ</h2>

                <div class="mp-news-list">
                <?php foreach($Favorites as $k => $v):?>
                    <section class="mp-news-entry">
                        <h2 class="mp-news-head"><?php echo $v['Favorite']['title']?></h2>
                        <div class="sec-body">
                            <?php echo $v['Favorite']['comment']?>
                        </div>
                        <?php if($v['Favorite']['url']):?>
                        <footer class="tar"><a href="<?php echo $v['Favorite']['url']?>" class="button btn-pk">モニターに応募する</a></footer>
                    <?php endif;?>
                    </section><!-- /.mp-news-entry -->
                <?php endforeach;?>

                </div><!-- /.mp-news-list -->
            </section><!-- /#mp-news -->
        </div><!-- /#main-area -->
    </div>
</div><!-- /#page-area -->
