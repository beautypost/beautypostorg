
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

<form class="form-horizontal" role="form" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
        <div class="col-sm-10">
        <span class="confirmtext"><?php echo $data['Blog']['title']?></span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">日付 </label>
        <div class="col-sm-10">
        <span class="confirmtext"><?php echo $data['Blog']['entrydate']?></span>
        </div>
    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">TAG</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $this->Useful->checkboxvalue($GenreBlogs,'Genre','title',$data['Blog']['tag'])?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像1</label>
                    <div class="col-sm-10">


                    <span class="confirmtext">
                    <?php if($data['Blog']['img1up']):?>
                        <br>
                    <img src="<?php echo WEBROOT.'images/blogs/'.$data['Blog']['img1up']?>" width="300"></span>
                    <?php else:?>
                        登録なし
                    <?php endif;?>

                    </div>
                </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">コメント </label>
        <div class="col-sm-9">
            <span class="confirmtext"><?php echo $data['Blog']['comment']?></span>
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
    <input type="hidden" name="data[Blog]" value="<?php echo base64_encode(serialize($data['Blog'])) ?>">
    </form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>
    <input type="hidden" name="data[Blog]" value="<?php echo base64_encode(serialize($data['Blog'])) ?>">
</form>
                                        </div>
                                    </div>


    </div>
    </div>
    </div>
