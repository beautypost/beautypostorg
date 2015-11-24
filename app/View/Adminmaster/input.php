
<div class="main-content">
    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">

        <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
<h3 class="header smaller lighter green">
<?php echo $AllGenreNames[$data['Genre']['genre_id']]?>マスタ
    </h3>


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

<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
<?php if($data['Genre']['genre_id'] == GENREPOINT):?>
<?php echo $PointGenres[$data['Genre']['group_id']]?>
<?php endif;?>
タイトル:</label>
        <div class="col-sm-10">
<input type="text" name="data[title]" value="<?php echo $data['Genre']['title']?>">
<input type="hidden" name="data[genre_id]" value="<?php echo $data['Genre']['genre_id']?>">
<input type="hidden" name="data[id]" value="<?php echo $data['Genre']['id']?>">
<input type="hidden" name="data[group_id]" value="<?php echo $data['Genre']['group_id']?>">

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
</form>
    </div>
    </div>
    </div>