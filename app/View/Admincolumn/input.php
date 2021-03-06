
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
<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker();
    $("#datepicker").datepicker("option", "dateFormat", 'yy-mm-dd');
    $( "#datepicker" ).datepicker( "setDate", "<?php echo $data['Column']['entrydate']?>" );

  });
</script>
<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input" enctype="multipart/form-data">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-10">
        <input type="text" name="data[title]" value="<?php echo $data['Column']['title']?>" class="col-xs-10">
        </div>
    </div>



    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">表示日付 </label>
        <div class="col-sm-10">
        <input id="datepicker" type="text" name="data[entrydate]" value="<?php echo $data['Column']['entrydate']?>" class="col-xs-10">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">表示/非表示</label>
        <div class="col-sm-10">
    <select name="data[valid]">
        <?php echo $this->Useful->option($GenreValid['valid'],$data['Column']['valid'])?>
    </select></div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">カテゴリ</label>
        <div class="col-sm-10">
    <select name="data[tag]">
        <?php echo $this->Useful->option2($GenreColumns,'Genre','title',$data['Column']['tag'])?>
    </select></div>
    </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像1</label>
                    <div class="col-sm-10">

<?php if($data['Column']['img1up']):?>
<?php echo $this->Useful->ItemImg($data['Column']['img1up'],300,'Column');?>
<input type="hidden" name="data[img1up]" value="<?php echo $data['Column']['img1up']?>">
<input type="file" name="userfile[1]" />
削除<input type="checkbox" value="" name="data[img1up]">
<?php else:?>
<input type="file" name="userfile[1]" />
<?php endif;?>
                </div></div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">内容 </label>
        <div class="col-sm-10">
            <textarea name="data[comment]" class="col-xs-10" rows="10"><?php echo $data['Column']['comment']?></textarea>
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



<input type="hidden" name="data[id]" value="<?php echo $data['Column']['id']?>">
</form>
    </div>
    </div>
    </div>
