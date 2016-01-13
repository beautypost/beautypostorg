
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

<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
    <!-- #section:elements.form -->

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">ニックネーム</label>
        <div class="col-sm-10"><input type="text" name="data[user_username]" value="<?php echo $data['ItemsMonitor']['user_username']?>" required></div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">性別</label>
        <div class="col-sm-10">
                                    <?php echo $this->Useful->radio('data[user_gender]',$Gender['gender'],$data['ItemsMonitor']['user_gender'])?>
                        </div>
                    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">生年月日</label>
        <div class="col-sm-10">
                                <select name="data[user_year]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Year['year'],$data['ItemsMonitor']['user_year'])?>
                                </select>
                                <span class="unit">年</span>
                                <select name="data[user_month]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Month['month'],$data['ItemsMonitor']['user_month'])?>
                                </select>
                                <span class="unit">月</span>
                                <select name="data[user_day]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Day['day'],$data['ItemsMonitor']['user_day'])?>
                                </select>
                                <span class="unit">日</span>
                                </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">種別</label>
        <div class="col-sm-10">
                                <select name="data[user_job]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Job['job'],$data['ItemsMonitor']['user_job'])?>
                                </select>
                                </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">肌質</label>
        <div class="col-sm-10">
                                    <select name="data[user_skin]" tabindex="1" style="width:80px" required>
                                        <?php echo $this->Useful->option($Skin['skin'],$data['ItemsMonitor']['user_skin'])?>
                                    </select>
                                    </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">商品</label>
        <div class="col-sm-10">
                                    <select name="data[item_id]" tabindex="1" style="width:80px" required>
                                        <?php echo $this->Useful->option($Items,$data['ItemsMonitor']['item_id'])?>
                                    </select>

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
                                                <?php echo $this->Useful->vradio('point1',$data['ItemsMonitor']['point1'])?>
                                            </tr>
                                            <tr>
                                                <th>使いやすさ</th>
                                                <?php echo $this->Useful->vradio('point2',$data['ItemsMonitor']['point2'])?>
                                            </tr>
                                            <tr>
                                                <th>デザイン</th>
                                                <?php echo $this->Useful->vradio('point3',$data['ItemsMonitor']['point3'])?>
                                            </tr>
                                            <tr>
                                                <th>機能</th>
                                                <?php echo $this->Useful->vradio('point4',$data['ItemsMonitor']['point4'])?>
                                            </tr>
                                            <tr>
                                                <th>継続性</th>
                                                <?php echo $this->Useful->vradio('point5',$data['ItemsMonitor']['point5'])?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル</label>
        <div class="col-sm-10">
                                    <input class="col-sm-8" type="text" name="data[title]" value="<?php echo $data['ItemsMonitor']['title']?>" required>
                                </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1">レビューコメント</label>


        <div class="col-sm-10">
                                    <textarea name="data[comment]" id="" cols="80" rows="10"><?php echo $data['ItemsMonitor']['title']?></textarea>
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

            <input type="hidden" name="data[id]" value="<?php echo $data['ItemsMonitor']['id']?>">
            </form>
    </div>
    </div>
    </div>