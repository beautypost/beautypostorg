
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">
<h3 class="header smaller lighter blue">アンケートタイトル</h3>

<form class="form-horizontal" role="form" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-10">
           <span class="confirmtext"><?php echo $data['Question']['title']?></span>
       </div>
   </div>
<h3 class="header smaller lighter blue">設問</h3>

<?php for($x=0;$x<=9;$x++):?>
        <div class="form-group">
         <label class="col-sm-2 control-label no-padding-right" for="form-field-1">設問<?php echo $x+1?>:</label>
        <div class="col-sm-10">
            <span class="confirmtext"><?php echo $data['Question']['questionvalue'][$x]?></span>
        </div>
    </div>
<?php endfor;?>
    </form>

                                    <div class="clearfix form-actions">
                                        <div class="col-md-offset-3 col-md-5">
<form method="post" action="<?php echo WEBROOT.$this->name?>/input" style="display:inline">
                                            <button class="btn btn-gray" type="submit">
                                                <i class="ace-icon fa fa-reply bigger-110"></i>
                                                入力画面へ戻る
                                            </button>
<input type="hidden" name="data[back]" value="true">
<input type="hidden" name="data[Question]" value="<?php echo base64_encode(serialize($data['Question'])) ?>">
</form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>

    <input type="hidden" name="data[Question]" value="<?php echo base64_encode(serialize($data['Question'])) ?>">
</form>
    </div>    </div>
    </div>
    </div>
    </div>