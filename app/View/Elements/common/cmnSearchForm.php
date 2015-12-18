
<ul class="search-form-list">
                            <li>
                                <dl>
                                    <dt><i class="fa fa-plus-circle">&#8203;</i>カテゴリ</dt>
                                    <dd>
<select name="data[GenreKisyu]">
<?php echo $this->Useful->option2($GenreKisyu,'Genre','title',$data['GenreKisyu'])?>
</select>

                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt><i class="fa fa-plus-circle">&#8203;</i>目的</dt>
                                    <dd>
<select name="data[GenrePurposes]">
<?php echo $this->Useful->option2($GenrePurposes,'Genre','title',$data['GenrePurposes'])?>
</select>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt><i class="fa fa-plus-circle">&#8203;</i>部位</dt>
                                    <dd>
<select name="data[GenrePoints]">
<?php echo $this->Useful->option2($GenrePoints,'Genre','title',$data['GenrePoints'])?>
</select>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt><i class="fa fa-plus-circle">&#8203;</i>メーカー</dt>
                                    <dd>
<select name="data[GenreMakers]">
<?php echo $this->Useful->option2($GenreMakers,'Genre','title',$data['GenreMakers'])?>
</select>
                                    </dd>
                                </dl>
                            </li>

                            <li class="price w-full">
                                <dl>
                                    <dt><i class="fa fa-plus-circle">&#8203;</i>価格</dt>
                                    <dd>
                                    <input type="number" name="data[GenrePriceLow]" id="sq-pricefrom" step="500" value="<?php echo $data['GenrePriceLow']?>">
                                    <span class="fromto">〜</span>
                                    <input type="number" name="data[GenrePriceHigh]" id="sq-pricefrom" step="500" value="<?php echo $data['GenrePriceHigh']?>">
                                    </dd>
                                </dl>
                            </li>
                            <li class="w-full">
                                <dl>
                                    <dt><i class="fa fa-plus-circle"></i>フリーキーワード</dt>
                                    <dd>
                                        <input type="input" name="data[keyword]" id="sq-keyword" value="<?php echo isset($data['keyword'])?$data['keyword']:''?>">
                                    </dd>
                                </dl>
                            </li>
                        </ul><!-- /.search-form-list -->
                        <footer>
                            <button type="submit" class="button btn-rich-vpk"><span>検索</span></button>
                        </footer>

