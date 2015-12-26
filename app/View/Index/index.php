<div id="top-lead">
    <div id="mainvisual">
        <div class="inner"><!--
             --><img src="<?php echo $this->webroot;?>images/mv-half.jpg" width="958" height="592" class="fitimg-w rsp-oxxx" alt=""><!--
             --><img src="<?php echo $this->webroot;?>images/mv-full.jpg" width="1534" height="584" class="fitimg-w rsp-xoxx" alt=""><!--
             --><img src="<?php echo $this->webroot;?>images/mv.jpg" width="2000" height="640" class="rsp-xxxo" alt=""><!--
             --><img src="<?php echo $this->webroot;?>images/catch.png" width="568" height="320" class="rsp-xxox" alt=""><!--
         --></div>
    </div>
    <div class="layout">
        <section id="top-keyword">
            <h2><!--
                 --><img src="<?php echo $this->webroot;?>images/top-keyword-head-full.png" width="882" height="186" class="rsp-ooxx fitimg-w" alt="キーワードランキングTOP5"><!--
                 --><img src="<?php echo $this->webroot;?>images/top-keyword-head.png" width="460" height="116" class="rsp-xxoo" alt="キーワードランキングTOP5"><!--
             --></h2>
            <ul>
<?php $i=0;?>
<?php foreach($AdminKeywords as $Item):?>
<?php $i++;?>
    <?php if($Item['AdminKeyword']['url']):?>
                <li><a href="<?php echo $Item['AdminKeyword']['url'];?>"><span class="number"><img src="<?php echo $this->webroot;?>common-img/ico-key0<?php echo $i?>.png" width="68" height="60" alt="1"></span><span class="keyword"><?php echo $Item['AdminKeyword']['title']?></span></a></li>
    <?php else:?>
                <li><a href="javascript:void(0)"><span class="number"><img src="<?php echo $this->webroot;?>common-img/ico-key0<?php echo $i?>.png" width="68" height="60" alt="1"></span><span class="keyword"><?php echo $Item['AdminKeyword']['title']?></span></a></li>
    <?php endif;?>
<?php endforeach;?>
            </ul>
        </section><!-- /#top-keyword -->
    </div>
</div><!-- /#top-lead -->

<div id="page-area">
    <div class="layout">
        <div id="main-area" class="layout-main layout-r">
            <section id="top-collection" class="rsp-xxoo">
                <h2 class="head-std ico-arrow"><span class="wsnw">美容機器コレクション</span><span class="subtitle wsnw">～自分にあった美容機器を探す～</span></h2>
                <div class="section-body">
                    <p>Beauty Postは、国内最大の美容機器の情報（比較）サイトです。フェイシャルエステやクリニック、脱毛にリラクゼーション、美容院、デンタルクリニック、ネイル…。美活は好きだけど、気が付くと「超多忙」「寝不足で悪循環？」なんてことがよくあります。忙しいヒトにとって、必要不可欠である美容機器の“正しい選択”をお手伝いすることで、働く女性から子育てに追われるママさん、エステ後のホームケアや、エステに行きづらいメンズまで、忙しいヒトの”美活”を応援しています。</p>
                </div><!-- /.section-body -->
                <img src="<?php echo $this->webroot;?>images/top-lead-img.png" width="360" height="360" alt="">
            </section><!-- /#top-Collection/-->

            <section id="top-rank">
                <h2 class="head-std ico-arrow">美容機器ランキング</h2>
                <div class="section-body">
                    <section class="box-contents">
                        <h2 class="box-head">注目の美容機器</h2>
                        <div class="box-contents-body">
                            <ol class="ranking-list">
                            <?php $i=1;?>
                                <?php foreach($PointItems as $Item):?>
                                <li class="item">
                                    <a href="<?php echo $this->webroot;?>Collection/detail/<?php echo $Item['Item']['id']?>">
                                        <dl class="item-access">
                                            <dt class="item-rank"><img src="<?php echo $this->webroot;?>common-img/ico-rank0<?php echo $i++?>.png" width="64" height="64" alt="<?php echo $i?>位"></dt>
                                            <dd>
                                                <p class="item-view"><b><?php echo $Item['Item']['access']?></b> アクセス</p>
                                                <p class="item-want"><b><?php echo $Item['Item']['wants']?></b> Want</p>
                                            </dd>
                                        </dl>
                                        <div class="item-thumbnail">
                                            <div class="imgframe">
                                                <div class="inner">
                                                    <img src="<?php echo $Item['Item']['img1']?>" class="hover-fade" alt="<?php echo $Item['Item']['title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <dl>
                                                <dt class="item-name"><?php echo $Item['Item']['title']?></dt>
                                                <dd class="item-info">
                                                    <dl><dt>メーカー名</dt><dd><?php echo $this->Useful->selectOptionValue($GenreMakers,$Item['Item']['maker'])?></dd></dl>
                                                    <dl><dt>発売日</dt><dd><?php echo date("Y.m.d",strtotime($Item['Item']['salesdate']))?></dd></dl>
                                                </dd>
                                            </dl>
                                        </div><!-- /.item-body -->
                                    </a>
                                </li><!-- /.item -->
                                <?php endforeach;?>
                            </ol><!-- /.ranking-list -->
                        </div><!-- /.box-contents-body -->
                        <p class="more"><a href="<?php echo $this->webroot;?>Collection/">more<br><i class="fa fa-caret-down">&#8203;</i></a></p>
                    </section><!-- /.box-contents -->

                    <section class="box-contents">
                        <h2 class="box-head">みんなが見た美容機器</h2>
                        <div class="box-contents-body">
                            <ol class="ranking-list">
                            <?php $i=1;?>
                            <?php foreach($RankingItems as $Item):?>
                                <li class="item">
                                    <a href="<?php echo $this->webroot;?>Collection/detail/<?php echo $Item['Item']['id']?>">
                                        <dl class="item-access">
                                            <dt class="item-rank"><img src="<?php echo $this->webroot;?>common-img/ico-rank0<?php echo $i++?>.png" width="64" height="64" alt="<?php echo $i?>位"></dt>
                                            <dd>
                                                <!-- p class="item-view"><b><?php echo $Item['Item']['access']?></b> アクセス</p -->
                                                <p class="item-want"><b><?php echo $Item['Item']['wants']?></b> Want</p>
                                            </dd>
                                        </dl>
                                        <div class="item-thumbnail">
                                            <div class="imgframe">
                                                <div class="inner">
                                                    <img src="<?php echo $Item['Item']['img1']?>" class="hover-fade" alt="<?php echo $Item['Item']['title']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <dl>
                                                <dt class="item-name"><?php echo $Item['Item']['title']?></dt>
                                                <dd class="item-info">
                                                    <dl><dt>メーカー名</dt><dd><?php echo $this->Useful->selectOptionValue($GenreMakers,$Item['Item']['maker'])?></dd></dl>
                                                    <dl><dt>発売日</dt><dd><?php echo date("Y.m.d",strtotime($Item['Item']['salesdate']))?></dd></dl>
                                                </dd>
                                            </dl>
                                        </div><!-- /.item-body -->
                                    </a>
                                </li><!-- /.item -->
<?php endforeach?>
                            </ol><!-- /.ranking-list -->
                        </div><!-- /.box-contents-body -->
                        <p class="more"><a href="<?php echo $this->webroot;?>Collection/?sort=access">more<br><i class="fa fa-caret-down">&#8203;</i></a></p>
                    </section><!-- /.box-contents -->
                </div><!-- /.section-body -->
            </section><!-- /#top-rank -->

            <section id="top-enquete" class="round-contents enquete-section rsp-ooox">
                <?php echo $this->element('common/cmnEnquete'); ?>
            </section><!-- /top-enquete -->

            <section id="topsearch-machine">
                <h2 class="head-std ico-search">機器で探す</h2>
                <div class="section-body">
                    <ul class="search-category-list">
                        <?php foreach($GenreKisyu as $Item):?>
                        <li><a href="<?php echo $this->webroot;?>Collection/?data[GenreKisyu]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                    </ul>
                </div><!-- /.section-body -->
            </section><!-- /#topsearch-machine -->

            <section id="topsearch-purpse">
                <h2 class="head-std ico-search">目的で探す</h2>
                <div class="section-body">
                    <ul class="search-category-list">
                        <?php foreach($GenrePurposes as $Item):?>
                        <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePurposes]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                    </ul>
                </div><!-- /.section-body -->
            </section><!-- /#topsearch-purpse -->

            <section id="topsearch-parts">
                <h2 class="head-std ico-search">部位で探す</h2>

                <section id="tsp01" class="box-contents">
                    <h2 class="box-head">フェイシャルケア</h2>
                    <div class="parts-ico"><img src="<?php echo $this->webroot;?>common-img/ico-illust-facial.png" width="120" height="120" alt="フェイシャルケアイメージ"></div>
                    <div class="box-contents-body">
                        <ul class="search-category-list">
                            <?php foreach($GenrePointsWithGroups[GENREPOINTFACE] as $Item):?>
                            <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePoints]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                            <?php endforeach;?>
                        </ul>
                    </div><!-- /.box-contents-body -->
                </section><!-- /#tsp01 -->

                <section id="tsp02" class="box-contents">
                    <h2 class="box-head">ボディケア</h2>
                    <div class="parts-ico"><img src="<?php echo $this->webroot;?>common-img/ico-illust-body.png" width="120" height="120" alt="ボディケアイメージ"></div>
                    <div class="box-contents-body">
                        <ul class="search-category-list">
                        <?php foreach($GenrePointsWithGroups[GENREPOINTBODY] as $Item):?>
                            <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePurposes]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div><!-- /.box-contents-body -->
                </section><!-- /#tsp02 -->

                <section id="tsp03" class="box-contents">
                    <h2 class="box-head">フットケア</h2>
                    <div class="parts-ico"><img src="<?php echo $this->webroot;?>common-img/ico-illust-foot.png" width="120" height="120" alt="フットケアイメージ"></div>
                    <div class="box-contents-body">
                        <ul class="search-category-list">
                        <?php foreach($GenrePointsWithGroups[GENREPOINTFOOT] as $Item):?>
                            <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePurposes]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div><!-- /.box-contents-body -->
                </section><!-- /#tsp03 -->

                <section id="tsp04" class="box-contents">
                    <h2 class="box-head">ヘアケア</h2>
                    <div class="parts-ico"><img src="<?php echo $this->webroot;?>common-img/ico-illust-hair.png" width="120" height="120" alt="ヘアケアイメージ"></div>
                    <div class="box-contents-body">
                        <ul class="search-category-list">
                        <?php foreach($GenrePointsWithGroups[GENREPOINTHAIR] as $Item):?>
                            <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePurposes]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div><!-- /.box-contents-body -->
                </section><!-- /#tsp04 -->

                <section id="tsp05" class="box-contents">
                    <h2 class="box-head">デンタルケア</h2>
                    <div class="parts-ico"><img src="<?php echo $this->webroot;?>common-img/ico-illust-dental.png" width="120" height="120" alt="デンタルケアイメージ"></div>
                    <div class="box-contents-body">
                        <ul class="search-category-list">
                        <?php foreach($GenrePointsWithGroups[GENREPOINTDENTAL] as $Item):?>
                            <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePurposes]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div><!-- /.box-contents-body -->
                </section><!-- /#tsp05 -->

                <section id="tsp06" class="box-contents">
                    <h2 class="box-head">ネイルケア</h2>
                    <div class="parts-ico"><img src="<?php echo $this->webroot;?>common-img/ico-illust-nail.png" width="120" height="120" alt="ネイルケアイメージ"></div>
                    <div class="box-contents-body">
                        <ul class="search-category-list">
                        <?php foreach($GenrePointsWithGroups[GENREPOINTNAIL] as $Item):?>
                            <li><a href="<?php echo $this->webroot;?>Collection/?data[GenrePurposes]=<?php echo $Item['Genre']['id']?>"><?php echo $Item['Genre']['title']?><span class="num">（<?php echo $Item['Genre']['count'];?>）</span></a></li>
                        <?php endforeach;?>
                        </ul>
                    </div><!-- /.box-contents-body -->
                </section><!-- /#tsp06 -->
            </section><!-- /#topsearch-parts -->
        <form method="get" action="<?php echo WEBROOT?>Collection/" name="searchform">
            <section id="topsearch-detail">
                <h2 class="head-std ico-search">詳細検索</h2>
                <div class="section-body">
                        <?php echo $this->element('common/cmnSearchForm',array('GenreKisyu'=>$GenreKisyu,'GenrePurposes'=>$GenrePurposes,'GenrePointsWithGroups'=>$GenrePointsWithGroups)); ?>
                </div><!-- /.section-body -->
            </section><!-- /#topsearch-detail -->
        </form>
        </div><!-- /#main-area -->
        <aside id="sub-area" class="layout-sub layout-l rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
        </aside><!-- /#sub-area -->
    </div>
</div><!-- /#page-area -->

