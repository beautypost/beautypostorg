
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

            <form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input" enctype="multipart/form-data">

<?php foreach($AttrNames as $k => $v):?>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <?php echo $v['attr_title']?></label>
                    <div class="col-sm-10"><input type="text" name="data[attrs][<?php echo $v['id']?>]" value="<?php echo isset($Attrs[$v['id']]) ? $Attrs[$v['id']] :''?>" class="col-xs-10"></div>
                </div>
<?php endforeach;?>

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
                <input type="hidden" name="data[id]" value="<?php echo $data['Item']['id']?>">
            </form>
            </div>
        </div>
</div>
