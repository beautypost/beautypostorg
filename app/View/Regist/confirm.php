<div id="page-area">
    <div class="layout">
            <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
                <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
                <li>会員登録フォーム</li>
            </ol><!-- /#breadcrumb -->

        <div id="main-area" class="layout-main layout-l">
            <section id="signup-form">
                <h2 class="head-bar ico-arrow">Beauty Postメンバー登録</h2>
<form>
        <?php echo $this->element('registconfirm'); ?>
    </form>
            </section><!-- /#signup-form -->

        </div><!-- /#main-area -->
                <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
    </aside>
    </div>
</div><!-- /#page-area -->
