
<!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
<section id="item-<?php echo $Item['Item']['id']?>" class="collection-item box-contents">
    <header class="collection-head">
        <div>
            <div class="item-check">
            <input type="checkbox" id="item-ck-<?php echo $Item['Item']['id']?>" name="item-ck-<?php echo $Item['Item']['id']?>" value="<?php echo $Item['Item']['id']?>" onclick="compareItem(<?php echo $Item['Item']['id']?>)" <?php echo $this->Useful->checked($ItemCompare,$Item['Item']['id'])?>></div>
            <h2 class="item-name"><label for="item-ck-<?php echo $Item['Item']['id']?>"><?php echo $Item['Item']['title']?></label></h2>
            <ul class="item-taglist">

            <?php echo $this->Useful->getIco($Icos,$Item['Item']['ico'])?>
            </ul>
        </div>
    </header>
    <div class="box-contents-body collection-body">
        <div class="item-face">
            <div class="item-img">
                <a href="<?php echo WEBROOT?>Collection/detail/?id=<?php echo $Item['Item']['id']?>" class="imgframe">
                    <div class="inner">
                        <img src="<?php echo $Item['Item']['img1']?>" class="hover-fade" alt="">
                    </div>
                </a>
            </div><!-- /.item-img -->
            <dl class="item-price"><dt>小売希望価格</dt><dd><span><?php echo number_format($Item['Item']['price'])?></span>円</dd></dl>
        </div><!-- .item-face -->
        <div class="item-summary">
            <dl class="item-rate">
                <dt>モニター評価</dt>
                <?php if($Item['Item']['monitor'] > 0):?>
                <dd class="monitor-rate">
                    <div class="starrev<?php echo $Item['Item']['id']?>" data-score="<?php echo $Item['Item']['rate_monitor']?>"></div>
                    <span>（レビュー：<a href="<?php echo WEBROOT?>Monitor/index/<?php echo $Item['Item']['id']?>"><?php echo $Item['Item']['monitor']?>件</a>）</span>
                    <p><?php echo $Item['Item']['result']?></p>
                </dd>
                <?php endif;?>
                <dt>ユーザーレビュー</dt>
                <dd class="user-rate">
                    <div class="star<?php echo $Item['Item']['id']?>" data-score="<?php echo $Item['Item']['rate_review']?>"></div>
                    <span>（レビュー：<a href="<?php echo WEBROOT?>Review/index/<?php echo $Item['Item']['id']?>"><?php echo $Item['Item']['review']?>件</a>）</span>
                </dd>
            </dl><!-- /.item-rate -->

            <script>
            ratystar(<?php echo $Item['Item']['id']?>)
            </script>

            <div class="item-info">
                <ul>
                    <li>
                        <dl>
                            <dt class="lts-1">メーカー名</dt>
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
                </ul>
            </div><!-- /.item-info -->
        <?php if($this->Useful->checkwant($UserData['Snsuser']['id'],$Item['Item']['id'],$Wants)):?>
             <div class="btn-want is-wanted" id="ajwant<?php echo $Item['Item']['id']?>"><a href=""><i class="fa fa-heart">&#8203;</i> Want!</a><span class="num"><?php echo $Item['Item']['wants']?></span></div>
        <?php else:?>
            <div id="ajwant<?php echo $Item['Item']['id']?>"><div class="btn-want"><a onclick="wants(<?php echo $Item['Item']['id']?>)"><i class="fa fa-heart">&#8203;</i> Want!</a><span class="num"><?php echo $Item['Item']['wants']?></span></div></div>
        <?php endif;?>


            <p class="more"><a href="<?php echo WEBROOT?>collection/detail/<?php echo $Item['Item']['id']?>" class="button btn-vpk">詳細を見る<i class="fa fa-chevron-circle-right">&#8203;</i></a></p>
        </div><!-- /.item-summary -->
    </div><!-- /.box-contents-body -->
</section><!-- /.collection-item -->
<!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
