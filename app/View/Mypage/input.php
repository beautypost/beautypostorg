
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
                <p>登録情報変更フォームをご利用の際は、必ず「個人情報保護方針」をご一読ください。<br>
                その内容に同意していただけましたら、下記フォームに必要事項をご入力の上、<br>
                「登録内容を変更する」ボタンをクリックしてください。</p>
                <form method="post" action="<?php echo WEBROOT.$this->name?>/input">
<?php if(isset($validationErrors)):?>
<?php foreach($validationErrors as $k => $v):?>
    <?php echo $v[0]?><br>
<?php endforeach;?>
<?php endif;?>
        <?php echo $this->element('registinput'); ?>

                    <footer>
                        <p><label><input type="checkbox" required>利用規約及び個人情報の取扱いについてに同意する</label></p>
                        <button type="submit" class="button btn-pk btn-sizeM">登録情報を変更する</button>
                    </footer>
                    <input type="hidden" name="data[id]" value="<?php echo $data['Snsuser']['id']?>">
                </form>
            </section><!-- /#signup-form -->
        </div><!-- /#main-area -->
    </div>
</div><!-- /#page-area -->

