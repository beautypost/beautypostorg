
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
    <!-- #section:elements.form -->

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">ニックネーム</label>
        <div class="col-sm-10"><span class="confirmtext"><?php echo $data['ItemsMonitor']['user_username']?></span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">性別</label>
        <div class="col-sm-10"><span class="confirmtext">
                                    <?php echo $this->Useful->ViewselectValue($Gender['gender'],$data['ItemsMonitor']['user_gender'])?>
                                </span>
                        </div>
                    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">生年月日</label>
        <div class="col-sm-10">
        <span class="confirmtext">
                                    <?php echo $this->Useful->ViewselectValue($Year['year'],$data['ItemsMonitor']['user_year'])?>

                                <span class="unit">年</span>

                                    <?php echo $this->Useful->ViewselectValue($Month['month'],$data['ItemsMonitor']['user_month'])?>

                                <span class="unit">月</span>

                                    <?php echo $this->Useful->ViewselectValue($Day['day'],$data['ItemsMonitor']['user_day'])?>

                                <span class="unit">日</span>
                            </span>
                                </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">種別</label>
        <div class="col-sm-10">
                <span class="confirmtext">
                                    <?php echo $this->Useful->ViewselectValue($Job['job'],$data['ItemsMonitor']['user_job'])?>
                                </span>
                                </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">肌質</label>
        <div class="col-sm-10">
                <span class="confirmtext">

                                        <?php echo $this->Useful->ViewselectValue($Skin['skin'],$data['ItemsMonitor']['user_skin'])?>
                                    </span>
                                    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">商品</label>
        <div class="col-sm-10">
                <span class="confirmtext">
                                        <?php echo $this->Useful->ViewselectValue($Items,$data['ItemsMonitor']['item_id'])?>
                                        </span>

        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">商品の満足度</label>
        <div class="col-sm-10">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th><span class="rsp-ooxx">0</span><span class="rsp-xxoo">無評価</span></th>
                                                <th>1<span class="rsp-xxoo">点</span></th>
                                                <th>2<span class="rsp-xxoo">点</span></th>
                                                <th>3<span class="rsp-xxoo">点</span></th>
                                                <th>4<span class="rsp-xxoo">点</span></th>
                                                <th>5<span class="rsp-xxoo">点</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>価格</th>
                                                <?php echo $this->Useful->vradioc('point1',$data['ItemsMonitor']['point1'])?>
                                            </tr>
                                            <tr>
                                                <th>使いやすさ</th>
                                                <?php echo $this->Useful->vradioc('point2',$data['ItemsMonitor']['point2'])?>
                                            </tr>
                                            <tr>
                                                <th>デザイン</th>
                                                <?php echo $this->Useful->vradioc('point3',$data['ItemsMonitor']['point3'])?>
                                            </tr>
                                            <tr>
                                                <th>機能</th>
                                                <?php echo $this->Useful->vradioc('point4',$data['ItemsMonitor']['point4'])?>
                                            </tr>
                                            <tr>
                                                <th>継続性</th>
                                                <?php echo $this->Useful->vradioc('point5',$data['ItemsMonitor']['point5'])?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル</label>
        <div class="col-sm-10">
            <span class="confirmtext"><?php echo $data['ItemsMonitor']['title']?></span>
                                </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">
    レビューコメント</label>
        <div class="col-sm-10">
            <span class="confirmtext"><?php echo $data['ItemsMonitor']['title']?></span>
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
    <input type="hidden" name="data[ItemsMonitor]" value="<?php echo base64_encode(serialize($data['ItemsMonitor'])) ?>">
    </form>
<form class="col-xs-5" method="post" action="<?php echo WEBROOT.$this->name?>/Submit" display:inline>
                                            <button class="btn btn-info" type="submit">
                                                <i class="ace-icon fa fa-check bigger-110"></i>
                                                登録する
                                            </button>
    <input type="hidden" name="data[ItemsMonitor]" value="<?php echo base64_encode(serialize($data['ItemsMonitor'])) ?>">
</form>
                                        </div>
                                    </div>


    </div>
    </div>
    </div>