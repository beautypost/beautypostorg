
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

    <!-- #section:elements.form -->
            <form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">

<?php foreach($AttrNames as $k => $v):?>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> <?php echo $v['attr_title']?></label>
                    <div class="col-sm-10"><?php echo $data['Item']['attrs'][$v['id']]?></div>
                </div>
<?php endforeach;?>



    </form>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-5">
<form method="post" action="<?php echo WEBROOT.$this->name?>/input" style="display:inline">
                                            <button class="btn btn-gray" type="submit">
                                                <i class="ace-icon fa fa-reply bigger-110"></i>
                                                入力画面へ戻る
                                            </button>
    <input type="hidden" name="data[back]" value="true">
    <input type="hidden" name="data[Item]" value="<?php echo base64_encode(serialize($data['Item'])) ?>">
    </form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>
    <input type="hidden" name="data[Item]" value="<?php echo base64_encode(serialize($data['Item'])) ?>">
</form>
                                        </div>
                                    </div>


    </div>
    </div>
    </div>
