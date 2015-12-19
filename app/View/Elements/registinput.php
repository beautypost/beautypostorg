
                    <ul class="formlist">
                        <li class="required">
                            <dl>
                                <dt><label for="user-mail" class="inner">メールアドレス</label></dt>
                                <dd>
                                <input type="text" name="data[email]" value="<?php echo $data['Snsuser']['email']?>" required>

                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-pass" class="inner">パスワード</label></dt>
                                <dd><input name="data[password]" id="user-pass" type="password" required></dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-pass-confirm" class="inner">パスワード（確認）</label></dt>
                                <dd><input name="data[password2]" id="user-pass-confirm" type="password" required></dd>
                            </dl>
                        </li>
                    </ul><!-- /.formlist -->

                    <p class="head-category">基本情報</p>

                    <ul class="formlist">
                        <li class="optional">
                            <dl>
                                <dt><label for="user-realname" class="inner">名前</label></dt>
                                <dd><input type="text" name="data[name]" value="<?php echo $data['Snsuser']['name']?>"></dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-name" class="inner">ニックネーム</label></dt>
                                <dd><input type="text" name="data[username]" value="<?php echo $data['Snsuser']['username']?>" required></dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">性別</span></dt>
                                <dd>
                                    <ul>
                                    <?php echo $this->Useful->radio('data[gender]',$Gender['gender'],$data['Snsuser']['gender'])?>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">生年月日</span></dt>
                                <dd>
                                <select name="data[year]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Year['year'],$data['Snsuser']['year'])?>
                                </select>
                                <span class="unit">年</span>
                                <select name="data[month]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Month['month'],$data['Snsuser']['month'])?>
                                </select>
                                <span class="unit">月</span>
                                <select name="data[day]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Day['day'],$data['Snsuser']['day'])?>
                                </select>
                                <span class="unit">日</span>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="user-cluster" class="inner">種別</label></dt>
                                <dd>
                                <select name="data[job]" tabindex="1" style="width:80px" required>
                                    <?php echo $this->Useful->option($Job['job'],$data['Snsuser']['job'])?>
                                </select>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><span class="inner">Beauty Postメール</span></dt>
                                <dd>
                                    <ul>
                                    <?php echo $this->Useful->radio('data[mailmagazine]',$Mailmagazine['mailmagazine'],$data['Snsuser']['mailmagazine'])?>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                    </ul><!-- /.formlist -->

                    <div class="extra">
                        <ul class="formlist">
                            <li class="required">
                                <dl>
                                    <dt><label for="user-address" class="inner">住んでいるエリア</label></dt>
                                    <dd>
                                    <select name="data[pref]" tabindex="1" style="width:80px" required>
                                        <?php echo $this->Useful->option($Pref['pref'],$data['Snsuser']['pref'])?>
                                    </select>
                                    <input type="text" name="data[address]" value="<?php echo $data['Snsuser']['address']?>" required>
                                    </dd>
                                </dl>
                            </li>
                            <li class="required">
                                <dl>
                                    <dt><label for="user-skintype" class="inner">肌質</label></dt>
                                    <dd>
                                    <select name="data[skin]" tabindex="1" style="width:80px" required>
                                        <?php echo $this->Useful->option($Skin['skin'],$data['Snsuser']['skin'])?>
                                    </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul><!-- /.formlist -->
                    </div>
<input type="hidden" name="data[sns]" value="<?php echo $data['Snsuser']['sns']?>">
<input type="hidden" name="data[sns_id]" value="<?php echo $data['Snsuser']['sns_id']?>">


