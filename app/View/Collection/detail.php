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
                                <a href="" class="imgframe">
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
                                            <dd><?php echo $this->Useful->selectOptionValue($GenreMakers,$Item['Item']['maker'])?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>発売日</dt>
                                            <dd><?php echo date("Y.m.d",strtotime($Item['Item']['salesdate']))?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>商品種類</dt>
                            <dd><?php  echo $this->Useful->selectOptionValue($GenreKisyu,$Item['Item']['genre_id'])?></dd>


                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>部位</dt>
                            <dd><?php  echo $this->Useful->checkboxvalue($GenrePoints,'Genre','title',$Item['Item']['genres'])?></dd>

                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>商品番号</dt>
                                            <dd><?php echo $Item['Item']['jancode']?></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt>目的・用途</dt>
                            <dd><?php  echo $this->Useful->checkboxvalue($GenrePurposes,'Genre','title',$Item['Item']['genres'])?></dd>

                                        </dl>
                                    </li>
                                </ul>
                            </div><!-- /.item-info -->
                            <div class="btn-want" id="wants">
                            <?php if(!$this->Useful->checkwant($UserData['Snsuser']['id'],$Item['Item']['id'],$Wants)):?>
                                <a onclick="wants(<?php echo $Item['Item']['id']?>)"><i class="fa fa-heart">&#8203;</i> Want!</a>
                            <?php endif;?>
                            <span class="num"><?php echo $Item['Item']['wants']?></span></div>
                            <dl class="item-price"><dt>小売希望価格</dt><dd><span><?php echo number_format($Item['Item']['price'])?></span>円</dd></dl>
                        </div><!-- /.item-summary -->
<script>

function wants(id){

//alert( $( this ).val()); // valueを表示
        $.ajax({
                type: "GET",
                url: "<?php echo WEBROOT?>Ajax/setWant/?itemID="+id,
                success: function(data){
                        if(data != '') {
                            $("#wants").html(data)
                        }
                }

        });
}
</script>
                        <div class="item-info2">
                            <div class="item-gallery">
                                <ul>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img1']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img2']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img3']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img4']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img5']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img6']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img7']?>" alt="" class="hover-fade"></div></a></li>
                                    <li><a href="" class="imgframe"><div class="inner"><img src="<?php echo $Item['Item']['img8']?>" alt="" class="hover-fade"></div></a></li>
                                </ul>
                            </div><!-- /.item-gallery -->
                            <p class="item-external"><a href="<?php echo $Item['Item']['makerurl']?>" target="_blank" class="button btn-nb btn-sizeS">メーカー<span class="rsp-xooo">のWeb</span>サイトで<span class="rsp-xooo">最新</span>スペックをを確認<span class="rsp-xooo">する</span></a></p>
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
                            <tr>
                                <th>サイズ</th>
                                <td><?php echo $Item['Item']['size']?></td>
                            </tr>
                            <tr>
                                <th>重量</th>
                                <td><?php echo $Item['Item']['weight']?></td>
                            </tr>
                            <tr>
                                <th>保証期間</th>
                                <td><?php echo $Item['Item']['warranty']?></td>
                            </tr>
                            <tr>
                                <th>セット内容・付属品</th>
                                <td><?php echo $Item['Item']['set']?></td>
                            </tr>
                            <tr>
                                <th>カラーバリエーション</th>
                                <td><?php echo $Item['Item']['color']?></td>
                            </tr>
                        </table>
                        <div class="youtube">
                            <div class="inner">
                                <iframe width="420" height="315" src="<?php echo $Item['Item']['movie']?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div><!-- /.section-body -->
                </section><!-- /.item-detail -->

                <section class="item-howtouse">
                    <h2 class="head-bar ico-arrow">使用方法</h2>
                    <div class="section-body">
                        <div>
                            <p><?php echo $Item['Item']['example']?></p>
                        </div>
                        <div class="youtube">
                            <div class="inner">
                                <iframe width="420" height="315" src="<?php echo $Item['Item']['example_url']?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div><!-- /.section-body -->
                </section><!-- /.item-howtouse -->
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
                                        <div class="starrev" data-score="3"></div>
                                        <span>（レビュー：<a href="<?php echo WEBROOT?>review/"><?php echo $Item['Item']['monitor']?>件</a>）</span>
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
                            <div style="width:80%">
                                <canvas id="canvas1" height="450" width="450"></canvas>
                            </div>
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
                                                        <div class="starrev" data-score="3">
                                                        </dd>
                                                    </dl>
                                                    <p class="author">（<?php echo date("Y.m.d",strtotime($v['ItemsMonitor']['created']))?> <?php echo $this->Useful->age($v['SnsUser']['year'],$v['SnsUser']['month'],$v['SnsUser']['day'])?>才 <?php echo $this->Useful->ViewselectValue($Job['job'],$v['SnsUser']['job'])?>）</p>
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
                                        <div class="starrev" data-score="3">
                                        <span>（レビュー：<a href="<?php echo WEBROOT?>Review/index/<?php echo $Item['Item']['id']?>"><?php echo $Item['Item']['review']?>件</a>）</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table><!-- /.table-std -->

                        <div class="item-review-body">
                            <div class="item-chart">
        <div style="width:80%">
            <canvas id="canvas2" height="450" width="450"></canvas>
        </div>
                            </div><!-- /.item-chart -->

                            <section class="review-topics">
                                <div class="round-thin-contents">
                                    <h2 class="round-head">ユーザーレビュートピック</h2>


                                    <div class="section-body">
                                        <ul>
<?php foreach($Reviews as $k => $v):?>
<!-- review-->
                                            <li>
                                                <a href="">
                                                    <p class="title"><?php echo $v['ItemsReview']['title']?></p>
                                                    <dl>
                                                        <dt>満足度</dt>
                                                        <dd class="user-rate">
                                                        <div class="starrev" data-score="3">
                                                        </dd>
                                                    </dl>
                                                    <p class="author">（<?php echo date("Y.m.d",strtotime($v['ItemsReview']['created']))?> <?php echo $this->Useful->age($v['SnsUser']['year'],$v['SnsUser']['month'],$v['SnsUser']['day'])?>才 <?php echo $this->Useful->ViewselectValue($Job['job'],$v['SnsUser']['job'])?>）</p>
                                                </a>
                                            </li>
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
                                <footer><a href="<?php echo WEBROOT?>Review/input/?itemID=<?php echo $Item['Item']['id']?>" class="button btn-gd btn-sizeS"><i class="fa fa-pencil-square-o">&#8203;</i> ユーザーレビューを書く</a></footer>
<?php endif;?>


                </section><!-- /.item-u-review.item-review -->

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
            </section><!-- /#collection-list -->
        </div><!-- /#main-area -->

    <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
    </aside>
    </div>
</div><!-- /#page-area -->



    <script>

    window.onload = function(){
        var ctx = document.getElementById("canvas1").getContext("2d");
        var data =[5,4,5,5,4];
        rt(ctx,data);
        var ctx = document.getElementById("canvas2").getContext("2d");
        var data =[10,51,32,55,40];
        rt(ctx,data);

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
