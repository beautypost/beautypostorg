
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

<?php
if (isset($validationErrors) && is_array($validationErrors)) {
    echo '<div class="alert alert-danger">';
    foreach ($validationErrors as $key => $values) {
            echo '<p class="error">'.$values[0].'</p>';
        // echo $this->Form->error('Model.'.$key);
    }
    echo '</div>';
}
?>

<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">メールアドレス </label>
        <div class="col-sm-10">
        <input type="text" name="data[email]" value="<?php echo $data['Snsuser']['email']?>" class="col-xs-10">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">パスワード </label>
        <div class="col-sm-10">
        <input type="text" name="data[password]" value="<?php echo $data['Snsuser']['password']?>" class="col-xs-10">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">パスワード確認 </label>
        <div class="col-sm-10">
        <input type="text" name="data[password2]" value="<?php echo $data['Snsuser']['password']?>" class="col-xs-10">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">名前 </label>
        <div class="col-sm-10">
        <input type="text" name="data[name]" value="<?php echo $data['Snsuser']['name']?>" class="col-xs-10">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">ニックネーム</label>
        <div class="col-sm-10">
        <input type="text" name="data[username]" value="<?php echo $data['Snsuser']['username']?>" class="col-xs-10">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">性別 </label>
        <div class="col-sm-10">
                                    <?php echo $this->Useful->radio('data[gender]',$Gender['gender'],$data['Snsuser']['gender'])?>


        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">生年月日 </label>
        <div class="col-sm-10">
                                <select name="data[year]" tabindex="1" style="width:80px">
                                    <?php echo $this->Useful->option($Year['year'],$data['Snsuser']['year'])?>
                                </select>
                                <span class="unit">年</span>
                                <select name="data[month]" tabindex="1" style="width:80px">
                                    <?php echo $this->Useful->option($Month['month'],$data['Snsuser']['month'])?>
                                </select>
                                <span class="unit">月</span>
                                <select name="data[day]" tabindex="1" style="width:80px">
                                    <?php echo $this->Useful->option($Day['day'],$data['Snsuser']['day'])?>
                                </select>
                                <span class="unit">日</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">種別 </label>
        <div class="col-sm-10">
                                <select name="data[job]" tabindex="1" style="width:80px">
                                    <?php echo $this->Useful->option($Job['job'],$data['Snsuser']['job'])?>
                                </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">Beauty Postメール </label>
        <div class="col-sm-10"><ul>
        <?php echo $this->Useful->radio('data[mailmagazine]',$Mailmagazine['mailmagazine'],$data['Snsuser']['mailmagazine'])?>
        </ul>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">住んでいるエリア </label>
        <div class="col-sm-10">
                                    <select name="data[pref]" tabindex="1" style="width:80px">
                                        <?php echo $this->Useful->option($Pref['pref'],$data['Snsuser']['pref'])?>
                                    </select><br>
                                    <input type="text" name="data[address]" value="<?php echo $data['Snsuser']['address']?>" class="col-xs-8">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">肌質 </label>
        <div class="col-sm-10">
                                    <select name="data[skin]" tabindex="1" style="width:80px">
                                        <?php echo $this->Useful->option($Skin['skin'],$data['Snsuser']['skin'])?>
                                    </select>
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
<input type="hidden" name="data[id]" value="<?php echo $data['Snsuser']['id']?>">
</form>
    </div>
    </div>
    </div>
