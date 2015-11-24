            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">
<script type="text/javascript">
$(function(){
　$("#datepicker").datepicker({dateFormat: 'yy-mm-dd',});
　$("#timepicker").timepicker({ timeFormat: 'H:i' });
});
</script>

<form class="form-horizontal" id="contactIndexForm" method="post" action="<?php echo WEBROOT?>AdminMailMagazineEdit/">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">送信日時 </label>
        <div class="col-sm-10">

<input type="hidden" name="data[Mailmagazine][id]" value="<?php echo $Item['Mailmagazine']['id']?>">
<input name="data[Mailmagazine][send_date]" type="text" value="<?php echo $Item['Mailmagazine']['send_date']?>" id="datepicker" required="required" aria-required="true">
<input name="data[Mailmagazine][send_time]" type="text" value="<?php echo $Item['Mailmagazine']['send_time']?>" id="timepicker" required="required" aria-required="true">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-10">
<input class="width100" name="data[Mailmagazine][title]" type="text" value="<?php echo $Item['Mailmagazine']['title']?>"  required="required" aria-required="true" />
	</div>
</div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">本文 </label>
        <div class="col-sm-10">
<textarea rows=15 cols=50 name="data[Mailmagazine][body]" required="required" aria-required="true">
<?php echo $Item['Mailmagazine']['body'];?>
</textarea>
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
<input type="hidden" name="data[id]" value="<?php echo $Item['Mailmagazine']['id']?>">
</form>
    </div>
    </div>
    </div>

