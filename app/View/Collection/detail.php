<div id="page-area">
    <div class="layout">
        <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
            <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
            <li><a href="<?php echo WEBROOT?>collection/">美容機器コレクション</a></li>
            <li><?php echo $Item['Item']['title']?></li>
        </ol><!-- /#breadcrumb -->

        <div id="main-area" class="layout-main layout-l">
            <section id="collection-detail" class="collection-item">
                <div class="box-contents">
                    <header class="collection-head">
                        <div>
                            <h2 class="item-name"><?php echo $Item['Item']['title']?></h2>
                            <ul class="item-taglist">
                                <?php echo $this->Useful->getIco($Icos,$Item['Item']['ico'])?>
                            </ul>
                        </div>
                    </header>
                    <div class="box-contents-body collection-body">
                        <div class="item-face">
                            <div class="item-img">
                                <a href="<?php echo $Item['Item']['img1']?>" class="imgframe swipebox">
                                    <div class="inner">
                                        <img src="<?php echo $Item['Item']['img1']?>" class="fitimg-w hover-fade" alt="">
                                    </div>
                                </a>
                            </div><!-- /.item-img -->
                        </div><!-- .item-face -->
                        <div class="item-summary">
                            <div class="item-info">
                                <ul>
                                    <li>
                                        <dl>
                                            <dt>メーカー名</dt>
                                            <dd><?php echo $this->Useful->checkNull($this->Useful->selectOptionValue($GenreMakers,$Item['Item']['maker']))?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>発売日</dt>
                                            <dd><?php echo $this->Useful->checkNull(date("Y.m.d",strtotime($Item['Item']['salesdate'])))?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>商品種類</dt>
                                            <dd><?php  echo $this->Useful->checkNull($this->Useful->selectOptionValue($GenreKisyu,$Item['Item']['genre_id']))?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>部位</dt>
                                            <dd><?php  echo $this->Useful->checkNull($this->Useful->checkboxvalue($GenrePoints,'Genre','title',$Item['Item']['genres']))?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>商品番号</dt>
                                            <dd><?php echo $this->Useful->checkNull($Item['Item']['jancode'])?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>目的・用途</dt>
                                            <dd><?php  echo $this->Useful->checkNull($this->Useful->checkboxvalue($GenrePurposes,'Genre','title',$Item['Item']['genres']))?></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div><!-- /.item-info -->

                            <?php if($this->Useful->checkwant($UserData['Snsuser']['id'],$Item['Item']['id'],$Wants)):?>
                                    <div class="btn-want is-wanted">
                            <?php else:?>
                                    <div class="btn-want">
                            <?php endif;?>
                            <a onclick="wants(<?php echo $Item['Item']['id']?>)"><i class="fa fa-heart">&#8203;</i> Want!</a><span class="num"><?php echo $Item['Item']['wants']?></span></div>
                            <?php if($Item['Item']['price']):?>
                                <dl class="item-price"><dt>最安値（税別）</dt><dd><span><?php echo number_format($Item['Item']['price'])?></span>円</dd></dl>
                            <?php endif;?>
                        </div><!-- /.item-summary -->

                        <div class="item-info2">
                            <div class="item-gallery">
                                <ul>
                                <?php for($x=1;$x<9;$x++):?>
                                    <?php if($Item['Item']['img'.$x]):?>
                                    <li><a href="<?php echo $Item['Item']['img'.$x]?>" class="imgframe swipebox"><div class="inner"><img src="<?php echo $Item['Item']['img'.$x]?>" alt="" class="hover-fade"></div></a></li>
                                <?php endif;?>
                                <?php endfor;?>
                                </ul>
                            </div><!-- /.item-gallery -->
                            <p class="item-external"><a href="<?php echo $Item['Item']['makerurl']?>" target="_blank" class="button btn-nb btn-sizeS">メーカー<span class="rsp-xooo">のWeb</span>サイトで<span class="rsp-xooo">最新</span>スペックを確認<span class="rsp-xooo">する</span></a></p>
                            <div class="attention">
                                <ul class="kome">
                                    <li>スペック情報を含め、掲載している価格やスペック・付属品・画像などの情報は保証をいたしかねます。</li>
                                    <li>実際に購入される場合は、各メーカーへお問い合わせください。</li>
                                    <li>掲載情報に誤りがあった場合は、こちらまでご連絡ください。</li>
                                </ul>
                            </div><!-- /.attention -->
                        </div><!-- /.item-info2 -->

                        <div class="item-txt">
                            <p><?php echo $Item['Item']['comment']?></p>
                        </div><!-- /.item-txt -->
                    </div><!-- /.box-contents-body -->
                </div><!-- /.collection-item -->

                <section class="item-detail">
                    <h2 class="head-bar ico-arrow">商品詳細</h2>
                    <div class="section-body">
                        <table class="table-std">
                        <?php if($Item['Item']['size']):?>
                            <tr>
                                <th>サイズ</th>
                                <td><?php echo $Item['Item']['size']?></td>
                            </tr>
                        <?php endif;?>
                        <?php if($Item['Item']['weight']):?>
                            <tr>
                                <th>重量</th>
                                <td><?php echo $Item['Item']['weight']?></td>
                            </tr>
                        <?php endif;?>
                        <?php if($Item['Item']['warranty']):?>
                            <tr>
                                <th>保証期間</th>
                                <td><?php echo $Item['Item']['warranty']?></td>
                            </tr>
                        <?php endif;?>
                        <?php if($Item['Item']['set']):?>
                            <tr>
                                <th>セット内容・付属品</th>
                                <td><?php echo $Item['Item']['set']?></td>
                            </tr>
                        <?php endif;?>
                        <?php if($Item['Item']['color']):?>
                            <tr>
                                <th>カラーバリエーション</th>
                                <td><?php echo $Item['Item']['color']?></td>
                            </tr>
                        <?php endif;?>
                        </table>
                        <?php if($Item['Item']['movie']):?>
                        <div class="youtube">
                            <div class="inner">
                                <iframe width="420" height="315" src="<?php echo $Item['Item']['movie']?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php endif;?>
                        <?php if($Item['Item']['pr_site']):?>
                        <p class="item-external"><a href="<?php echo $Item['Item']['pr_site']?>" target="_blank" class="button btn-nb btn-sizeS">商品PRページ</a></p>
                        <?php endif;?>
                    </div><!-- /.section-body -->
                </section><!-- /.item-detail -->

                <?php if($Item['Item']['example'] || $Item['Item']['example_url']):?>
                <section class="item-howtouse">
                    <h2 class="head-bar ico-arrow">使用方法</h2>
                    <div class="section-body">
                        <div>
                            <p><?php echo $Item['Item']['example']?></p>
                        </div>
                        <?php if($Item['Item']['example_url']):?>
                        <div class="youtube">
                            <div class="inner">
                                <iframe width="420" height="315" src="<?php echo $Item['Item']['example_url']?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    <?php endif;?>
                        <?php if($Item['Item']['catalog']): ?>
                        <p class="item-external"><a href="<?php echo $Item['Item']['catalog']?>" target="_blank" class="button btn-pdf btn-sizeS"><i class="fa fa-file-pdf-o">&#8203;</i>　取扱説明書カタログ</a></p>
                    <?php endif;?>
                    </div><!-- /.section-body -->
                </section><!-- /.item-howtouse -->
                <?php endif;?>

                <?php if(count($Monitors)>0):?>
                <section class="item-m-review item-review">
                    <h2 class="head-bar ico-arrow">モニター体験レビュー</h2>
                    <div class="section-body">
                        <dl class="about-monitor">
                            <dt>モニター体験レビューとは</dt>
                            <dd>メーカー指導のもと、使用方法などを正しくレクチャーしていただき、実際に体験された方の評価です。</dd>
                        </dl>

                        <table class="table-std monitor-rate">
                            <tbody>
                                <tr>
                                    <th>満足度</th>
                                    <td class="monitor-rate">
                                        <div class="starrev" data-score="<?php echo $totalMonitors['total']?>"></div>
                                        <span>（レビュー：<a href="<?php echo WEBROOT?>review/monitor/<?php echo $Item['Item']['id']?>"><?php echo count($Monitors)?>件</a>）</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>結果</th>
                                    <td><?php echo $Item['Item']['result']?></td>
                                </tr>
                            </tbody>
                        </table><!-- /.table-std -->

                        <div class="item-review-body">
                            <div class="item-chart">
                                <!-- <div style="width:80%"> -->
                                    <canvas id="canvas1" height="450" width="450"></canvas>
                                <!-- </div> -->
                            </div><!-- /.item-chart -->

                            <section class="review-topics">
                                <div class="round-thin-contents">
                                    <h2 class="round-head">モニター体験レビュートピック</h2>
                                    <div class="section-body">
                                        <ul>
                                            <!-- review-->
                                            <?php foreach($Monitors as $k => $v):?>
                                            <!-- review-->
                                            <li>
                                                <a href="">
                                                    <p class="title"><?php echo $v['ItemsMonitor']['title']?></p>
                                                    <dl>
                                                        <dt>満足度</dt>
                                                        <dd class="user-rate">
                                                        <div class="starrev<?php echo $v['ItemsMonitor']['id']?>" data-score="<?php echo $v['ItemsMonitor']['total']?>">
                                                        </dd>
                                                    </dl>
                                                    <p class="author">（<?php echo date("Y.m.d",strtotime($v['ItemsMonitor']['created']))?> <?php echo $this->Useful->age($v['ItemsMonitor']['user_year'],$v['ItemsMonitor']['user_month'],$v['ItemsMonitor']['user_day'])?>才 <?php echo $this->Useful->ViewselectValue($Job['job'],$v['ItemsMonitor']['user_job'])?>）</p>
                                                </a>
                                            </li>
                                            <!-- review-->
                                            <?php endforeach;?>
                                        </ul>
                                        <p class="more"><a href="<?php echo WEBROOT?>Review/monitor/<?php echo $Item['Item']['id']?>">more<br><i class="fa fa-caret-down">&#8203;</i></a></p>
                                    </div><!-- /.section-body -->
                                </div><!-- /.round-thin-contents -->
                                <footer><!-- <a href="" class="button btn-pk btn-sizeS">モニター体験レビューを詳しく見る</a> --></footer>
                            </section><!-- /.review-topics -->
                        </div><!-- /.item-review-body -->
                    </div><!-- /.section-body -->
                </section><!-- /.item-m-review.item-review -->
                <?php endif;?>

                <section class="item-u-review item-review">
                    <h2 class="head-bar ico-arrow">ユーザーレビュー</h2>
                    <?php if(count($Reviews)>0):?>
                    <div class="section-body">
                        <table class="table-std user-rate">
                            <tbody>
                                <tr>
                                    <th>満足度</th>
                                    <td class="user-rate">
                                        <div class="starrev0" data-score="<?php echo $totalreview['total']?>">
                                        <span>（レビュー：<a href="<?php echo WEBROOT?>Review/index/<?php echo $Item['Item']['id']?>"><?php echo count($Reviews)?>件</a>）</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table><!-- /.table-std -->
                        <script>
                        ratystar(0)
                        </script>
                        <div class="item-review-body">
                            <div class="item-chart">
                                <!-- <div style="width:80%"> -->
                                    <canvas id="canvas2" height="450" width="450"></canvas>
                                <!-- </div> -->
                            </div><!-- /.item-chart -->

                            <section class="review-topics">
                                <div class="round-thin-contents">
                                    <h2 class="round-head">ユーザーレビュートピック</h2>
                                    <div class="section-body">
                                        <ul>
                                            <?php foreach($Reviews as $k => $v):?>
                                            <!-- review-->
                                            <li>
                                                <a href="<?php echo WEBROOT?>Review/index/<?php echo $Item['Item']['id']?>">
                                                    <p class="title"><?php echo $v['ItemsReview']['title']?></p>
                                                    <dl>
                                                        <dt>満足度</dt>
                                                        <dd class="user-rate">
                                                        <div class="starrev<?php echo $v['ItemsReview']['id']?>" data-score="<?php echo $v['ItemsReview']['total']?>">
                                                        </dd>
                                                    </dl>
                                                    <p class="author">（<?php echo date("Y.m.d",strtotime($v['ItemsReview']['created']))?> <?php echo $this->Useful->age($v['SnsUser']['year'],$v['SnsUser']['month'],$v['SnsUser']['day'])?>才 <?php echo $this->Useful->ViewselectValue($Job['job'],$v['SnsUser']['job'])?>）</p>
                                                </a>
                                            </li>

                                            <script>
                                            ratystar(<?php echo $v['ItemsReview']['id']?>)
                                            </script>
                                            <!-- review-->
                                            <?php endforeach;?>

                                        </ul>
                                    </div><!-- /.section-body -->
                                    <p class="more"><a href="<?php echo WEBROOT?>Review/index/<?php echo $Item['Item']['id']?>">more<br><i class="fa fa-caret-down">&#8203;</i></a></p>
                                </div><!-- /.round-thin-contents -->

                                <footer><a href="<?php echo WEBROOT?>Review/input/?itemID=<?php echo $Item['Item']['id']?>" class="button btn-gd btn-sizeS"><i class="fa fa-pencil-square-o">&#8203;</i> ユーザーレビューを書く</a></footer>
                            </section><!-- /.review-topics -->
                        </div><!-- /.item-review-body -->
                    </div><!-- /.section-body -->
                    <?php else:?>

                    <footer><a href="<?php echo WEBROOT?>Review/input/?itemID=<?php echo $Item['Item']['id']?>&rurl=" class="button btn-gd btn-sizeS"><i class="fa fa-pencil-square-o">&#8203;</i> ユーザーレビューを書く</a></footer>
                    <!-- ここまで　-->
                    <?php endif;?>
                </section><!-- /.item-u-review.item-review -->

                <?php if(count($Materials) > 0):?>
                <section class="item-relative">
                    <h2 class="head-std ico-arrow">関連商品</h2>
                    <ul class="collection-gallery">
                    <!-- gallary-->
                        <?php foreach($Materials as $k => $v):?>
                        <li><a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $v['Item']['id']?>"><!--
                             --><div class="item-thumbnail">
                                        <div class="imgframe">
                                            <div class="inner">
                                                <img src="<?php echo $v['Item']['img1']?>" alt="" class="over-fade">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="item-name"><?php echo $v['Item']['title']?></p><!--
                             --></a>
                        </li>
                        <?php endforeach;?>
                    <!-- gallary-->
                    </ul><!-- /.collection-gallery -->
                    <footer>
                        <a href="./spec/" class="button btn-pk">関連商品をまとめて比較</a>
                    </footer>
                </section><!-- /.item-relative -->
                <?php endif;?>

                <?php if(count($Coordinates) > 0):?>
                <section class="item-cordinate">
                    <h2 class="head-std ico-arrow">この商品におすすめコーディネート商品</h2>
                    <ul class="collection-gallery">

                    <?php foreach($Coordinates as $k => $v):?>
                    <!-- gallary-->
                        <li><a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $v['Item']['id']?>"><!--
                             --><div class="item-thumbnail">
                                        <div class="imgframe">
                                            <div class="inner">
                                                <img src="<?php echo $v['Item']['img1']?>" alt="" class="over-fade">
                                            </div>
                                        </div>
                                    </div>
                                    <p class="item-name"><?php echo $v['Item']['title']?></p><!--
                             --></a></li>
                    <!-- gallary-->
                    <?php endforeach;?>
                    </ul><!-- /.collection-gallery -->
                    <footer>
                        <a href="./spec/" class="button btn-pk">おすすめ商品をまとめて比較</a>
                    </footer>
                </section><!-- /.item-cordinate -->
                <?php endif;?>

            </section><!-- /#collection-list -->
        </div><!-- /#main-area -->

        <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
            <?php echo $this->element('common/cmnSubContent'); ?>
        </aside>
    </div>
</div><!-- /#page-area -->
    </div>
<script>
    window.onload = function(){
        <?php if(count($Monitors)>0):?>
        var ctx = document.getElementById("canvas1").getContext("2d");
        var data =[<?php echo $totalMonitors['p1']?>,<?php echo $totalMonitors['p2']?>,<?php echo $totalMonitors['p3']?>,<?php echo $totalMonitors['p4']?>,<?php echo $totalMonitors['p5']?>];
            rt(ctx,data);
        <?php endif;?>
        <?php if(count($totalreview) > 0):?>
        var ctx = document.getElementById("canvas2").getContext("2d");
        var data =[<?php echo $totalreview['p1']?>,<?php echo $totalreview['p2']?>,<?php echo $totalreview['p3']?>,<?php echo $totalreview['p4']?>,<?php echo $totalreview['p5']?>];
        rt(ctx,data);
        <?php endif;?>
    }

    function rt(ctx,datas){
        var radarChartData = {
            labels: [ "価格", "使いやすさ", "デザイン", "性能", "継続性"],
            datasets: [
                {
                    fillColor: "rgba(230,220,220,0.2)",
                    strokeColor: "rgba(165,141,59,1)",
                    pointColor: "rgba(165,141,59,1)",
                    pointStrokeColor: "#fff",
                    data: datas,

                }
            ]
        };

        window.myRadar = new Chart(ctx).Radar(radarChartData, {
            responsive: true,
            scaleLineColor: "rgba(0,0,0,0.2)",
        });
    }
</script>
