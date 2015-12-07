
            <!-- /section:basics/sidebar -->
            <div class="main-content">
                    <?php $this->Useful->pagetitle($pagetitle,$pagecomment)?>
                        <div class="row">
                            <div class="col-xs-12">

    <!-- #section:elements.form -->
            <form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
                <!-- #section:elements.form -->
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">タイトル </label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['title']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">メーカー</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $this->Useful->selectOptionValue($GenreMakers,$data['Item']['maker'])?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">メーカー公式サイト</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['makerurl']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 発売日</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo date("Y/m/d",strtotime($data['Item']['salesdate']))?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 小売り希望価格</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo number_format($data['Item']['price'])?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品種類</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php  echo $this->Useful->checkboxvalue($GenreKisyu,'Genre','title',$data['Item']['genre_id'])?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> アイコン</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php  echo $this->Useful->checkboxvalue2($GenreIcons['ico'],$data['Item']['ico'])?></span></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 部位</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php  echo $this->Useful->checkboxvalue($GenrePoints,'Genre','title',$data['Item']['genres'])?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 目的・用途</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php  echo $this->Useful->checkboxvalue($GenrePurposes,'Genre','title',$data['Item']['genres'])?></span></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品番号・JANコード</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['jancode']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品説明</label>
                    <div class="col-sm-10"><?php echo $data['Item']['comment']?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> サイズ</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['size']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 重量</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['weight']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 保証期間</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['warranty']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> セット内容・付属品</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['set']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> カラーバリエーション</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['color']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> PR動画URL</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['movie']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 使用方法</label>
                    <div class="col-sm-10"><?php echo $data['Item']['example']?></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 使用方法動画URL</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['example']?></span></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像1</label>
                    <div class="col-sm-10">
                    <span class="confirmtext"><?php echo $data['Item']['img1']?></span><br>
                    <span class="confirmtext">
                    <?php if($data['Item']['img1up']):?>
                        <br>
                    <img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img1up']?>" width="300"></span>
                    <?php else:?>
                        登録なし
                    <?php endif;?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像2</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img2']?></span>
                    <?php if($data['Item']['img2up']):?>
                        <br>
                        <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img2up'];?>" width="300"></span>
                    <?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像３</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img3']?></span>
                    <?php if($data['Item']['img3up']):?>

                    <br>
                    <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img3up']?>" width="300"></span>
                    <?php endif;?>


                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像４</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img4']?></span>
                    <?php if($data['Item']['img4up']):?>

                    <br>
                    <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img4up']?>" width="300"></span>
                    <?php endif;?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像５</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img5']?></span>
                    <?php if($data['Item']['img5up']):?>

                    <br>
                    <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img5up']?>" width="300"></span>
                    <?php endif;?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像6</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img6']?></span>
                    <?php if($data['Item']['img6up']):?>

                    <br>
                    <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img6up']?>" width="300"></span>
                    <?php endif;?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像7</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img7']?></span>
                    <?php if($data['Item']['img7up']):?>

                    <br>
                    <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img7up']?>" width="300"></span>
                    <?php endif;?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像8</label>
                    <div class="col-sm-10"><span class="confirmtext"><?php echo $data['Item']['img8']?></span>
                    <?php if($data['Item']['img8up']):?>
                    <br>
                    <span class="confirmtext"><img src="<?php echo WEBROOT.'images/item/'.$data['Item']['img8up']?>" width="300"></span>
                    <?php endif;?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 肌水分量</label>
                    <div class="col-sm-10"><?php echo $data['Item']['result']?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 関連商品</label>
                    <div class="col-sm-10"><?php echo $data['Item']['materials']?></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> コーディネート商品</label>
                    <div class="col-sm-10"><?php echo $data['Item']['cordinates']?></div>
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
