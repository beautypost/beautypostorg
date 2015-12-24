<div id="page-area">
    <div class="layout">
        <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
            <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
            <li>会員登録フォーム</li>
        </ol><!-- /#breadcrumb -->

        <div id="main-area" class="layout-main layout-l">
            <section id="signup-form">
                <h2 class="head-bar ico-arrow">Beauty Postメンバー登録</h2>
                <?php

                if (isset($validationErrors) && is_array($validationErrors) && count($validationErrors)>0) {
                echo '<div class="error-msg container">';
                    foreach ($validationErrors as $key => $values) {
                //        foreach ($values as $value) {
                            echo '<p>'.$values[0].'</p>';
                //        }
                        // echo $this->Form->error('Model.'.$key);
                    }
                    echo '</div>';
                }
                ?>

                <form method="post" action="<?php echo WEBROOT.$this->name?>/input">
                    <?php echo $this->element('registinput'); ?>

                    <footer class="signup-footer">
                        <p class="label_wrap"><label><input type="checkbox" name="data[policy]" required>利用規約及びプライバシーポリシーに同意する</label></p>
                        <p class="link_rules"><a href="<?php echo WEBROOT; ?>pages/rules/" target="_blank">利用規約はこちら <i class="fa fa-chevron-circle-right">&#8203;</i></a>
                        <span class="rsp-xxoo">　</span><br class="rsp-ooxx">
                        <a href="<?php echo WEBROOT; ?>pages/privacy/" target="_blank">プライバシーポリシーはこちら <i class="fa fa-chevron-circle-right">&#8203;</i></a></p>
                        <div class="form-nav">
                            <button type="submit" class="button btn-vpk">
                                登録内容確認画面へ <i class="fa fa-angle-right">&#8203;</i>
                            </button>
                        </div>
                    </footer>
                </form>
            </section><!-- /#signup-form -->

        </div><!-- /#main-area -->
        <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
    </aside>
    </div>
</div><!-- /#page-area -->
