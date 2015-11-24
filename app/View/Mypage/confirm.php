
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
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

        <?php echo $this->element('registconfirm'); ?>

            </section><!-- /#signup-form -->
        </div><!-- /#main-area -->
    </div>
</div><!-- /#page-area -->

