<div class="main-content">
    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
        <!-- PAGE CONTENT BEGINS -->
    <div class="col-xs-12">
<h3 class="header smaller lighter green">
<?php echo $AllGenreNames[$data['Genre']['genre_id']]?>マスタ
    </h3>


<form class="form-horizontal" role="form" action="<?php echo WEBROOT.$this->name?>/input">

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
<?php if($data['Genre']['genre_id'] == GENREPOINT):?>
<?php echo $PointGenres[$data['Genre']['group_id']]?>
<?php endif;?>
タイトル:
</label>
        <div class="col-sm-10">
           <span class="confirmtext">
<?php echo $data['Genre']['title']?></span>
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
<input type="hidden" name="data[Genre]" value="<?php echo base64_encode(serialize($data['Genre'])) ?>">
</form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>
    <input type="hidden" name="data[Genre]" value="<?php echo base64_encode(serialize($data['Genre'])) ?>">
</form>
    </div>    </div>
    </div>
    </div>
    </div>
