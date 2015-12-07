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

                    <footer>
                        <p><label><input type="checkbox" name="data[policy]" required>利用規約及び個人情報の取扱いについてに同意する</label></p>
                        <button type="submit" class="button btn-pk btn-sizeM">登録する</button>
                    </footer>
                </form>
            </section><!-- /#signup-form -->

        </div><!-- /#main-area -->
        <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
    </aside>
    </div>
</div><!-- /#page-area -->
