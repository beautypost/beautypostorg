
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

<?php
if (isset($validationErrors) && is_array($validationErrors)) {
    foreach ($validationErrors as $key => $values) {
        foreach ($values as $value) {
            echo '<p class="error">'.$value.'</p>';
        }
        // echo $this->Form->error('Model.'.$key);
    }
}
?>

<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input"  enctype="multipart/form-data">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-10">
        <input type="text" name="data[title]" value="<?php echo $data['Type']['title']?>" class="col-xs-10">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">五十音</label>
        <div class="col-sm-10">
    <select name="data[category]">
        <?php echo $this->Useful->option($GenreTypes,$data['Type']['category'])?>
    </select></div>
    </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像1</label>
                    <div class="col-sm-10">

<?php if($data['Type']['img1up']):?>
<?php echo $this->Useful->ItemImg($data['Type']['img1up'],300,'types');?>
<input type="hidden" name="data[img1up]" value="<?php echo $data['Type']['img1up']?>">
<input type="file" name="userfile[1]" />
削除<input type="checkbox" value="" name="data[img1up]">
<?php else:?>
<input type="file" name="userfile[1]" />
<?php endif;?>
                </div></div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">内容 </label>
        <div class="col-sm-10">
            <textarea name="data[comment]" class="col-xs-10" rows="10"><?php echo $data['Type']['comment']?></textarea>
        </div>
    </div>
                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button class="btn btn-success" type="submit">
                                                確認画面へ
                                            </button>
                                            &nbsp; &nbsp; &nbsp;
                                            <button class="btn" type="reset">
                                                <i class="ace-icon fa fa-undo bigger-110"></i>
                                                Reset
                                            </button>
                                        </div>
                                    </div>
<input type="hidden" name="data[id]" value="<?php echo $data['Type']['id']?>">
</form>
    </div>
    </div>
    </div>
