
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

<form class="form-horizontal" role="form" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">メールアドレス </label>
        <div class="col-sm-10">
       <?php echo $data['Snsuser']['email']?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">パスワード </label>
        <div class="col-sm-10">
       <?php echo $data['Snsuser']['password']?>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">名前 </label>
        <div class="col-sm-10">
        <?php echo $data['Snsuser']['name']?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">ニックネーム</label>
        <div class="col-sm-10">
      <?php echo $data['Snsuser']['username']?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">性別 </label>
        <div class="col-sm-10">
                                    <?php echo $this->Useful->ViewselectValue($Gender['gender'],$data['Snsuser']['gender'])?>


        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">生年月日 </label>
        <div class="col-sm-10">

                                    <?php echo $this->Useful->ViewselectValue($Year['year'],$data['Snsuser']['year'])?>

                                <span class="unit">年</span>

                                    <?php echo $this->Useful->ViewselectValue($Month['month'],$data['Snsuser']['month'])?>

                                <span class="unit">月</span>

                                    <?php echo $this->Useful->ViewselectValue($Day['day'],$data['Snsuser']['day'])?>

                                <span class="unit">日</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">種別 </label>
        <div class="col-sm-10">
                                    <?php echo $this->Useful->ViewselectValue($Job['job'],$data['Snsuser']['job'])?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Beauty Postメール </label>
        <div class="col-sm-10"><ul>
        <?php echo $this->Useful->ViewselectValue($Mailmagazine['mailmagazine'],$data['Snsuser']['mailmagazine'])?>
        </ul>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">住んでいるエリア </label>
        <div class="col-sm-10">

                                        <?php echo $this->Useful->ViewselectValue($Pref['pref'],$data['Snsuser']['pref'])?>
<br>
                                    <?php echo $data['Snsuser']['address']?>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">肌質 </label>
        <div class="col-sm-10">

                                        <?php echo $this->Useful->ViewselectValue($Skin['skin'],$data['Snsuser']['skin'])?>

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
    <input type="hidden" name="data[Snsuser]" value="<?php echo base64_encode(serialize($data['Snsuser'])) ?>">
    </form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>
    <input type="hidden" name="data[Snsuser]" value="<?php echo base64_encode(serialize($data['Snsuser'])) ?>">
</form>
                                        </div>
                                    </div>


    </div>
    </div>
    </div>
