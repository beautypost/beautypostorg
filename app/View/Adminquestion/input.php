
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
<h3 class="header smaller lighter blue">アンケートタイトル</h3>
<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-8">
            <input type=hidden name="data[id]" value="<?php echo $data['Question']['id']?>">
<input type="text" name="data[title]" value="<?php echo $data['Question']['title']?>" class="form-control">
        </div>
    </div>

<h3 class="header smaller lighter blue">設問</h3>

<?php for($x=0;$x<=9;$x++):?>
        <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">設問<?php echo $x+1?>: </label>
        <div class="col-sm-8">
<?php $r = isset($data['QuestionValue'][$x]['value']) ? $data['QuestionValue'][$x]['value'] : ''?>
<input type="text" name="data[questionvalue][<?php echo $x?>]" value="<?php echo $r?>" class="form-control"><br>
        </div>
    </div>
<?php endfor;?>

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