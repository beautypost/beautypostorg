
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
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">TOP表示 </label>
                    <div class="col-sm-10"><input type="text" name="data[top]" value="<?php echo $data['Item']['top']?>" class="col-xs-10"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">商品名 </label>
                    <div class="col-sm-10"><input type="text" name="data[title]" value="<?php echo $data['Item']['title']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">メーカー</label>
                    <div class="col-sm-10">
                <select name="data[maker]">
                    <?php echo $this->Useful->option2($GenreMakers,'Genre','title',$data['Item']['maker'])?>
                </select></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1">メーカー公式サイト</label>
                    <div class="col-sm-10"><input type="text" name="data[makerurl]" value="<?php echo $data['Item']['makerurl']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 発売日</label>
                    <div class="col-sm-10"><input type="text" name="data[salesdate]" value="<?php echo $data['Item']['salesdate']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 小売り希望価格</label>
                    <div class="col-sm-10"><input type="text" name="data[price]" value="<?php echo $data['Item']['price']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 機種</label>
                    <div class="col-sm-10">
                <select name="data[genre_id]">
                    <?php echo $this->Useful->option2($GenreKisyu,'Genre','title',$data['Item']['genre_id'])?>
                </select></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> アイコン</label>
                    <div class="col-sm-8">
                    <?php echo $this->Useful->checkbox2($GenreIcons['ico'],'ico',$data['Item']['ico'])?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 部位</label>
                    <div class="col-sm-8">
                    <?php echo $this->Useful->checkbox($GenrePoints,'Genre','title',$data['Item']['genres'],'genres')?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 目的・用途</label>
                    <div class="col-sm-10">
                    <?php echo $this->Useful->checkbox($GenrePurposes,'Genre','title',$data['Item']['genres'],'genres')?>

                </div>
            </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品番号</label>
                    <div class="col-sm-10"><input type="text" name="data[code]" value="<?php echo $data['Item']['code']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> JANコード</label>
                    <div class="col-sm-10"><input type="text" name="data[jancode]" value="<?php echo $data['Item']['jancode']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> POSコード</label>
                    <div class="col-sm-10"><input type="text" name="data[poscode]" value="<?php echo $data['Item']['poscode']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 製造国</label>
                    <div class="col-sm-10"><input type="text" name="data[country]" value="<?php echo $data['Item']['country']?>" class="col-xs-10"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品説明</label>
                    <div class="col-sm-10"><textarea name="data[comment]" class="col-xs-10" rows="10"><?php echo $data['Item']['comment']?></textarea></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> サイズ</label>
                    <div class="col-sm-10"><input type="text" name="data[size]" value="<?php echo $data['Item']['size']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 重量</label>
                    <div class="col-sm-10"><input type="text" name="data[weight]" value="<?php echo $data['Item']['weight']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 保証期間</label>
                    <div class="col-sm-10"><input type="text" name="data[warranty]" value="<?php echo $data['Item']['warranty']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> セット内容・付属品</label>
                    <div class="col-sm-10"><input type="text" name="data[set]" value="<?php echo $data['Item']['set']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> カラーバリエーション</label>
                    <div class="col-sm-10"><input type="text" name="data[color]" value="<?php echo $data['Item']['color']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> PR動画URL</label>
                    <div class="col-sm-10"><input type="text" name="data[movie]" value="<?php echo $data['Item']['movie']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 使用方法</label>
                    <div class="col-sm-10"><textarea name="data[example]" class="col-xs-10" rows="10"><?php echo $data['Item']['example']?></textarea></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 使用方法動画URL</label>
                    <div class="col-sm-10"><input type="text" name="data[example_url]" value="<?php echo $data['Item']['example_url']?>" class="col-xs-10"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 商品PRページ</label>
                    <div class="col-sm-10"><input type="text" name="data[pr_site]" value="<?php echo $data['Item']['pr_site']?>" class="col-xs-10"></div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 取扱説明書 カタログ</label>
                    <div class="col-sm-10"><input type="text" name="data[catalog]" value="<?php echo $data['Item']['catalog']?>" class="col-xs-10"></div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像1</label>
                    <div class="col-sm-10"><input type="text" name="data[img1]" value="<?php echo $data['Item']['img1']?>" class="col-xs-10">

<?php if($data['Item']['img1up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img1up'],300);?>
<input type="hidden" name="data[img1up]" value="<?php echo $data['Item']['img1up']?>">
<br />
<input type="file" name="userfile[1]" />
削除<input type="checkbox" value="" name="data[img1up]">
<?php else:?>
<input type="file" name="userfile[1]" />
<?php endif;?>
                </div></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像2</label>
                    <div class="col-sm-10"><input type="text" name="data[img2]" value="<?php echo $data['Item']['img2']?>" class="col-xs-10">
<?php if($data['Item']['img2up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img2up'],300);?>
<input type="hidden" name="data[img2up]" value="<?php echo $data['Item']['img2up']?>">
<br />
<input type="file" name="userfile[2]" />
削除<input type="checkbox" value="true" name="data[img2up]">
<?php else:?>
<input type="file" name="userfile[2]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像３</label>
                    <div class="col-sm-10"><input type="text" name="data[img3]" value="<?php echo $data['Item']['img3']?>" class="col-xs-10">
<?php if($data['Item']['img3up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img3up'],300);?>
<input type="hidden" name="data[img3up]" value="<?php echo $data['Item']['img3up']?>">
<br />
<input type="file" name="userfile[3]" />
削除<input type="checkbox" value="true" name="data[img3up]">
<?php else:?>
<input type="file" name="userfile[3]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像４</label>
                    <div class="col-sm-10"><input type="text" name="data[img4]" value="<?php echo $data['Item']['img4']?>" class="col-xs-10">
<?php if($data['Item']['img4up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img4up'],300);?>
<input type="hidden" name="data[img4up]" value="<?php echo $data['Item']['img4up']?>">
<br />
<input type="file" name="userfile[4]" />
削除<input type="checkbox" value="true" name="data[img4up]">
<?php else:?>
<input type="file" name="userfile[4]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像５</label>
                    <div class="col-sm-10"><input type="text" name="data[img5]" value="<?php echo $data['Item']['img5']?>" class="col-xs-10">
<?php if($data['Item']['img5up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img5up'],300);?>
<input type="hidden" name="data[img5up]" value="<?php echo $data['Item']['img5up']?>">
<br />
<input type="file" name="userfile[5]" />
削除<input type="checkbox" value="true" name="data[img5up]">
<?php else:?>
<input type="file" name="userfile[5]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像6</label>
                    <div class="col-sm-10"><input type="text" name="data[img6]" value="<?php echo $data['Item']['img6']?>" class="col-xs-10">
<?php if($data['Item']['img6up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img6up'],300);?>
<input type="hidden" name="data[img6up]" value="<?php echo $data['Item']['img6up']?>">
<br />
<input type="file" name="userfile[6]" />
削除<input type="checkbox" value="true" name="data[img6up]">
<?php else:?>
<input type="file" name="userfile[6]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像7</label>
                    <div class="col-sm-10"><input type="text" name="data[img7]" value="<?php echo $data['Item']['img7']?>" class="col-xs-10">
<?php if($data['Item']['img7up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img7up'],300);?>
<input type="hidden" name="data[img7up]" value="<?php echo $data['Item']['img7up']?>">
<br />
<input type="file" name="userfile[7]" />
削除<input type="checkbox" value="true" name="data[img7up]">
<?php else:?>
<input type="file" name="userfile[7]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 画像8</label>
                    <div class="col-sm-10"><input type="text" name="data[img8]" value="<?php echo $data['Item']['img8']?>" class="col-xs-10">
<?php if($data['Item']['img8up']):?>
<?php echo $this->Useful->Itemimg($data['Item']['img8up'],300);?>
<input type="hidden" name="data[img8up]" value="<?php echo $data['Item']['img8up']?>">
<br />
<input type="file" name="userfile[8]" />
削除<input type="checkbox" value="true" name="data[img8up]">
<?php else:?>
<input type="file" name="userfile[8]" />
<?php endif;?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 平均値</label>
                    <div class="col-sm-10"><input type="text" name="data[result]" value="<?php echo $data['Item']['result']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 関連商品</label>
                    <div class="col-sm-10"><input type="text" name="data[materials]" value="<?php echo $data['Item']['materials']?>" class="col-xs-10"></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> コーディネート商品</label>
                    <div class="col-sm-10"><input type="text" name="data[cordinates]" value="<?php echo $data['Item']['cordinates']?>" class="col-xs-10"></div>
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
                <input type="hidden" name="data[id]" value="<?php echo $data['Item']['id']?>">
            </form>
            </div>
        </div>
</div>
