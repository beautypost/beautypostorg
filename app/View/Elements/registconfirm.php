
                    <ul class="formlist">
                        <li class="required">
                            <dl>
                                <dt><label for="user-mail" class="inner">メールアドレス</label></dt>
                                <dd>
<?php echo $data['Snsuser']['email']?>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-pass" class="inner">パスワード</label></dt>
                                <dd>***</dd>
                            </dl>
                        </li>
                    </ul><!-- /.formlist -->

                    <p class="head-category">基本情報</p>

                    <ul class="formlist">
                        <li class="optional">
                            <dl>
                                <dt><label for="user-realname" class="inner">名前</label></dt>
                                <dd>
                                <?php echo $data['Snsuser']['name']?>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-name" class="inner">ニックネーム</label></dt>
                                <dd>
<?php echo $data['Snsuser']['username']?>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">性別</span></dt>
                                <dd>
                                    <ul>
                                        <li><?php echo $this->Useful->ViewselectValue($Gender['gender'],$data['Snsuser']['gender'])?></li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">生年月日</span></dt>
                                <dd>
<?php echo $this->Useful->ViewselectValue($Year['year'],$data['Snsuser']['year'])?>

                                <span class="unit">年</span>
<?php echo $this->Useful->ViewselectValue($Month['month'],$data['Snsuser']['month'])?>

                                <span class="unit">月</span>
<?php echo $this->Useful->ViewselectValue($Day['day'],$data['Snsuser']['day'])?>

                                <span class="unit">日</span>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-cluster" class="inner">種別</label></dt>
                                <dd>
<?php echo $this->Useful->ViewselectValue($Job['job'],$data['Snsuser']['job'])?>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">Beauty Postメール</span></dt>
                                <dd>
                                    <ul>
                                    <li>
<?php echo $this->Useful->ViewselectValue($Mailmagazine['mailmagazine'],$data['Snsuser']['mailmagazine'])?>
    </li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                    </ul><!-- /.formlist -->

                    <div class="extra">
                        <p class="kome">あなたのエリアと肌質に合わせた美容ニュースをお届けしますので、メールマガジンご希望の方は下記もご入力下さい。</p>
                        <ul class="formlist">
                            <li class="required">
                                <dl>
                                    <dt><label for="user-address" class="inner">住んでいるエリア</label></dt>
                                    <dd>
<?php echo $this->Useful->ViewselectValue($Pref['pref'],$data['Snsuser']['pref'])?>
<?php echo $data['Snsuser']['address']?>
                                    </dd>
                                </dl>
                            </li>
                            <li class="required">
                                <dl>
                                    <dt><label for="user-skintype" class="inner">肌質</label></dt>
                                    <dd>
<?php echo $this->Useful->ViewselectValue($Skin['skin'],$data['Snsuser']['skin'])?>

                                    </dd>
                                </dl>
                            </li>
                        </ul><!-- /.formlist -->
                    </div>

                    <footer>
                        <p><label><input type="checkbox" checked>利用規約及び個人情報の取扱いについてに同意する</label></p>

<form class="form-horizontal" role="form" method="post" action="<?php echo WEBROOT.$this->name?>/input">
<button class="button btn-pk btn-sizeM" data-last="Finish" type="submit">
入力画面へ戻る
</button>
<input type="hidden" name="data[back]" value="true">
<input type="hidden" name="data[Snsuser]" value="<?php echo base64_encode(serialize($data['Snsuser'])) ?>">
</form>
<form method="post" action="<?php echo WEBROOT.$this->name?>/Submit">
    <button class="button btn-pk btn-sizeM" data-last="Finish" type="submit">
    登録
    </button>
    <input type="hidden" name="data[Snsuser]" value="<?php echo base64_encode(serialize($data['Snsuser'])) ?>">
</form>


                    </footer>
