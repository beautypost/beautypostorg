    <script>

    function ratystar(id){

            $('.starrev'+id).raty( {
             readOnly: true,
             space:false,
             score: function() {
                return $(this).attr('data-score');
             },
             path: '<?php echo WEBROOT?>raty/lib/images'
            });
    }
    </script>
<div id="page-area">
    <div class="layout">
            <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
                <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
                <li><a href="<?php echo WEBROOT?>collection">美容機器コレクション</a></li>
                <li><a href="<?php echo WEBROOT?>collection/detail/<?php echo $Item['Item']['id']?>"><?php echo $Item['Item']['title']?></a></li>
                <li>ユーザーレビュー</li>
            </ol><!-- /#breadcrumb -->
<script>
ratystar(<?php echo $Item['Item']['id']?>)
</script>
        <div id="main-area" class="layout-main layout-l">
            <section id="review-list">
                <h2 class="head-bar">＊＊＊についてのユーザーレビュー</h2>
                <section class="summary">
                    <h2>総合評価</h2>
                    <div class="evaluation">
                        <table class="table-std user-rate">
                            <tbody>
                                <tr>
                                    <th>満足度</th>
                                    <td class="user-rate">
                    <div class="starrev<?php echo $Item['Item']['id']?>" data-score="<?php echo $Item['Item']['rate_monitor']?>"></div>

                                    </td>
                                </tr>
                            </tbody>
                        </table><!-- /.table-std -->
                        <div class="item-chart">
        <div style="width:80%">
            <canvas id="canvas2" height="450" width="450"></canvas>
        </div>
                        </div><!-- /.item-chart -->
                    </div>

                    <footer class="">
                        <a href="<?php echo WEBROOT.$this->name?>/input/<?php echo $Item['Item']['id']?>" class="button btn-gd"><i class="fa fa-pencil-square-o">&#8203;</i> ユーザーレビューを書く</a>
                    </footer>
                </section><!-- /.summary -->

<?php foreach($Reviews as $k => $v):?>


                <section class="review-entry">
                    <header>
                        <h2><?php echo $v['ItemsReview']['title']?></h2>
                        <p class="user-data"><?php echo $this->Useful->age($v['SnsUser']['year'],$v['SnsUser']['month'],$v['SnsUser']['day'])?>才 <?php echo $this->Useful->ViewselectValue($Job['job'],$v['SnsUser']['job'])?> ニックネーム<br class="rsp-oxxx">（レビュー投稿数：999）</p>
                        <p class="post-date"><?php echo date("Y.m.d",strtotime($v['ItemsReview']['created']))?></p>
                    </header>

                    <div class="evaluation">
                        <table class="table-std user-rate">
                            <tbody>
                                <tr>
                                    <th>満足度</th>
                                    <td class="user-rate">
                    <div class="starrev<?php echo $v['ItemsReview']['id']?>" data-score="<?php echo $v['ItemsReview']['total']?>"></div>

                                    </td>
                                </tr>
                            </tbody>
                        </table><!-- /.table-std -->
                        <div class="item-chart">
        <div style="width:80%">
            <canvas id="canvas<?php echo $v['ItemsReview']['id']?>" height="450" width="450"></canvas>
        </div>
                        </div><!-- /.item-chart -->
                    </div><!-- /.evaluation -->

                    <div class="user-txt">
                        <p><?php echo $v['ItemsReview']['comment']?></p>
                    </div><!-- /.user-txt -->
                </section><!-- /.review-entry -->
<script>
ratystar(<?php echo $v['ItemsReview']['id']?>)
</script>
<?php endforeach;?>

                <footer>
                    <nav class="pagination pg-list">
                        <ul>

<?php if ($Pager['s']):?>
      <li class="nav-prev"><a href="?data[p]=<?php echo $Pager['p']-1?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
                                <ol>
  <?php foreach ($Pager['pager'] as $k =>$v):?>
    <?php if ($Pager['p'] == $v-1):?>
      <li class="nav-now"><a href="?data[p]=<?php echo $v-1?>"><?php echo $v;?></a></li>
    <?php else:?>
      <li><a href="?data[p]=<?php echo $v-1?>"><?php echo $v?></a></li>
    <?php endif;?>
  <?php endforeach;?>
                                </ol>
<?php if ($Pager['e']):?>
      <li class="nav-next"><a href="?data[p]=<?php echo $Pager['p']+1?>"><span class="rsp-xxoo">Next</span></a></li>
<?php endif;?>
                        </ul>
                    </nav><!-- /.pagination -->
                </footer>

            </section><!-- /#review-list -->
        </div><!-- /#main-area -->

        <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
        </aside><!-- /#sub-area -->
    </div>
</div><!-- /#page-area -->


<script>

    window.onload = function(){


        var ctx = document.getElementById("canvas2").getContext("2d");
        var data =[10,51,32,55,40];
        rt(ctx,data);

    <?php foreach($Reviews as $k => $v):?>
        var ctx = document.getElementById("canvas<?php echo $v['ItemsReview']['id']?>").getContext("2d");
        var data =[<?php echo $v['ItemsReview']['point1']?>,<?php echo $v['ItemsReview']['point2']?>,<?php echo $v['ItemsReview']['point3']?>,<?php echo $v['ItemsReview']['point4']?>,<?php echo $v['ItemsReview']['point5']?>];
        rt(ctx,data);
    <?php endforeach;?>
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
