<div id="page-area">
    <div class="layout">
            <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
                <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
                <li><a href="<?php echo WEBROOT?>collection">美容機器コレクション</a></li>
                <li><a href="<?php echo WEBROOT?>collection/detail/<?php echo $Item['Item']['id']?>"><?php echo $Item['Item']['title']?></a></li>
                <li>ユーザーレビュー</li>
            </ol><!-- /#breadcrumb -->
        <div id="main-area" class="layout-main layout-l">
            <section id="review-post">
                    <h2 class="head-bar"><?php echo $Item['Item']['title']?>についてのユーザーレビュー</h2>

                    <section class="review-user round-thin-contents">
                        <h2 class="round-head">登録情報</h2>
                        <div class="p16">
                            <ul>
                                <li>
                                    <dl>
                                        <dt>ニックネーム</dt>
                                        <dd><?php echo $UserData['Snsuser']['username']?></dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt>性別</dt>
                                        <dd><?php echo $this->Useful->ViewselectValue($Gender['gender'],$UserData['Snsuser']['gender'])?></dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt>年齢</dt>
                                        <dd><?php echo $this->Useful->age($UserData['Snsuser']['year'],$UserData['Snsuser']['month'],$UserData['Snsuser']['day'])?></dd>
                                    </dl>
                                </li>
                                <li>
                                    <dl>
                                        <dt>種別</dt>
                                        <dd><?php echo $this->Useful->ViewselectValue($Job['job'],$UserData['Snsuser']['job'])?></dd>
                                    </dl>
                                </li>
                            </ul>
                            <footer>
                                <a href="<?php echo WEBROOT?>mypage/input/?rurl=<?php echo urlencode('Review/input/?itemID='.$Item['Item']['id'])?>" class="button btn-pk">登録情報を変更</a>
                            </footer>
                        </div>
                    </section><!-- /.review-user -->

                <form method="post" action="<?php echo WEBROOT.$this->name?>/input">
                    <ul class="review-data formlist">
                        <li class="wide required">
                            <dl>
                                <dt><span class="inner">商品の満足度</span></dt>
                                <dd>
                                    <table>
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
                                                <?php echo $this->Useful->vradio('point1',$data['ItemsReview']['point1'])?>
                                            </tr>
                                            <tr>
                                                <th>使いやすさ</th>
                                                <?php echo $this->Useful->vradio('point2',$data['ItemsReview']['point2'])?>
                                            </tr>
                                            <tr>
                                                <th>デザイン</th>
                                                <?php echo $this->Useful->vradio('point3',$data['ItemsReview']['point3'])?>
                                            </tr>
                                            <tr>
                                                <th>機能</th>
                                                <?php echo $this->Useful->vradio('point4',$data['ItemsReview']['point4'])?>
                                            </tr>
                                            <tr>
                                                <th>継続性</th>
                                                <?php echo $this->Useful->vradio('point5',$data['ItemsReview']['point5'])?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="" class="inner">タイトル</label></dt>
                                <dd>
                                    <input type="text" name="data[title]" value="<?php echo $data['ItemsReview']['title']?>" required>
                                </dd>
                            </dl>
                        </li>
                        <li class="required">
                            <dl>
                                <dt><label for="" class="inner">レビューコメント</label></dt>
                                <dd>
                                    <textarea name="data[comment]" id="" cols="30" rows="10" required><?php echo $data['ItemsReview']['title']?></textarea>
                                </dd>
                            </dl>
                        </li>
                    </ul>

                    <footer>
                        <p class="mb16"><span class="wsnw"><a href="<?php echo WEBROOT?>pages/rules/" target="_blank">利用規約</a>と<a href="<?php echo WEBROOT?>pages/privacy/" target="_blank">プライバシーポリシー</a>に</span><span class="wsnw">同意いただきレビューをご投稿ください。</span></p>
                        <div class="form-nav">
                            <button class="button btn-vpk">
                                投稿内容確認画面へ <i class="fa fa-angle-right">&#8203;</i>
                            </button>
                        </div>
                    </footer>
                    <input type="hidden" name="data[item_id]" value="<?php echo $Item['Item']['id']?>">
                </form>
            </section><!-- /#review-post -->

        </div><!-- /#main-area -->
                <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
    </aside>
    </div>
</div><!-- /#page-area -->