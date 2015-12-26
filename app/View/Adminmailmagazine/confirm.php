
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

<form class="form-horizontal" role="form" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">番号 </label>
        <div class="col-sm-10">
        <span class="confirmtext"><?php echo $data['Mailmagazine']['number']?></span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-5">
        <span class="confirmtext"><?php echo $data['Mailmagazine']['title']?></span>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">送信日付 </label>
        <div class="col-sm-10">
        <span class="confirmtext"><?php echo $data['Mailmagazine']['send_date']?></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">内容 </label>
        <div class="col-sm-9">
            <span class="confirmtext"><?php echo $data['Mailmagazine']['comment']?></span>
        </div>
    </div>
    </form>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-5">
<form method="post" action="<?php echo WEBROOT.$this->name?>/input" style="display:inline">
                                            <button class="btn btn-gray" type="submit">
                                                <i class="ace-icon fa fa-reply bigger-110"></i>
                                                入力画面へ戻る
                                            </button>
    <input type="hidden" name="data[back]" value="true">
    <input type="hidden" name="data[Mailmagazine]" value="<?php echo base64_encode(serialize($data['Mailmagazine'])) ?>">
    </form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>
    <input type="hidden" name="data[Mailmagazine]" value="<?php echo base64_encode(serialize($data['Mailmagazine'])) ?>">
</form>
                                        </div>
                                    </div>


    </div>
    </div>
    </div>
