<div id="page-area">
    <div class="layout">
        <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
            <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
            <li><a href="<?php echo WEBROOT?>collection">美容機器コレクション</a></li>
            <li><a href="<?php echo WEBROOT?>collection/detail/<?php echo $Item['Item']['id']?>"></a></li>
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
                            <a href="<?php echo WEBROOT?>mypage/input" class="button btn-pk">登録情報を変更</a>
                        </footer>
                    </div>
                </section><!-- /.review-user -->

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
                                            <?php echo $this->Useful->vradioc('point1',$data['ItemsReview']['point1'])?>
                                        </tr>
                                        <tr>
                                            <th>使いやすさ</th>
                                            <?php echo $this->Useful->vradioc('point2',$data['ItemsReview']['point2'])?>
                                        </tr>
                                        <tr>
                                            <th>デザイン</th>
                                            <?php echo $this->Useful->vradioc('point3',$data['ItemsReview']['point3'])?>
                                        </tr>
                                        <tr>
                                            <th>機能</th>
                                            <?php echo $this->Useful->vradioc('point4',$data['ItemsReview']['point4'])?>
                                        </tr>
                                        <tr>
                                            <th>継続性</th>
                                            <?php echo $this->Useful->vradioc('point5',$data['ItemsReview']['point5'])?>
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
                                <?php echo $data['ItemsReview']['title']?>
                            </dd>
                        </dl>
                    </li>
                    <li class="required">
                        <dl>
                            <dt><label for="" class="inner">レビューコメント</label></dt>
                            <dd>
                                <?php echo $data['ItemsReview']['comment']?>
                            </dd>
                        </dl>
                    </li>
                </ul>
                
                <footer>
                    <div class="form-nav-confirm">
                        <form method="post" action="<?php echo WEBROOT.$this->name?>/Submit" class="form-nav-next">
                            <button class="button btn-pk" data-last="Finish" type="submit">
                                この内容で投稿する <i class="fa fa-angle-right">&#8203;</i>
                            </button>
                            <input type="hidden" name="data[ItemsReview]" value="<?php echo base64_encode(serialize($data['ItemsReview'])) ?>">
                            <input type="hidden" name="data[item_id]" value="<?php echo $data['ItemsReview']['item_id']?>">
                        </form>

                        <form  method="post" action="<?php echo WEBROOT.$this->name?>/input" class="form-nav-back">
                            <button class="button btn-nb" data-last="Finish" type="submit">
                                <i class="fa fa-angle-left">&#8203;</i> 入力画面へ戻り修正する
                            </button>
                            <input type="hidden" name="data[back]" value="true">
                            <input type="hidden" name="data[ItemsReview]" value="<?php echo base64_encode(serialize($data['ItemsReview'])) ?>">
                        </form>
                    </div><!-- /.form-nav-confrim -->
                </footer>
            </section><!-- /#review-post -->

        </div><!-- /#main-area -->
        <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
            <?php echo $this->element('common/cmnSubContent'); ?>
        </aside>
    </div>
</div><!-- /#page-area -->