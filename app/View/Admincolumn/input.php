
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
$(function(){
　$("#datepicker").datepicker({dateFormat: 'yy-mm-dd',});
});
</script>
<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-10">
        <input type="text" name="data[title]" value="<?php echo $data['Column']['title']?>" class="col-xs-10">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">作成日付 </label>
        <div class="col-sm-10">
        <input id="datepicker" type="text" name="data[created]" value="<?php echo $data['Column']['created']?>" class="col-xs-10">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">カテゴリ</label>
        <div class="col-sm-10">
    <select name="data[tag]">
        <?php echo $this->Useful->option2($GenreColumns,'Genre','title',$data['Column']['tag'])?>
    </select></div>
    </div>


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
