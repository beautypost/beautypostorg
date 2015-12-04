            <div class="side-bnrs">
                <ul>
                    <li><a href="<?php echo WEBROOT?>pages/knowledge/"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-knowledge-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="美容機器の基礎知識"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-knowledge-half.jpg" width="568" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="美容機器の基礎知識"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-knowledge.jpg" width="500" height="160" class="fitimg-w hover-fade rsp-xxxo" alt="美容機器の基礎知識"><!--
                     --></a></li>
                    <li><a href="<?php echo WEBROOT?>Glossary/"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-type-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="美容機器の種類"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-type-half.jpg" width="568" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="美容機器の種類"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-type.jpg" width="500" height="220" class="fitimg-w hover-fade rsp-xxxo" alt="美容機器の種類"><!--
                     --></a></li>
                </ul>
            </div><!-- /.side-bnrs -->

            <section id="side-enquete" class="round-contents enquete-section rsp-xxxo">
                <?php echo $this->element('common/cmnEnquete')?>
            </section><!-- /#side-enquete -->

            <div class="side-bnrs">
                <ul>
                    <li><a href="<?php echo WEBROOT?>pages/privilege/"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-privilege-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="Beauty Post メンバー会員特典について"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-privilege-half.jpg" width="568" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="Beauty Post メンバー会員特典について"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-privilege.jpg" width="500" height="140" class="fitimg-w hover-fade rsp-xxxo" alt="Beauty Post メンバー会員特典について"><!--
                     --></a></li>
                    <li><a href="<?php echo WEBROOT?>pages/voice/"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-voice-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="体験者の声" ><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-voice-half.jpg" width="569" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="体験者の声"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-voice.jpg" width="500" height="180" class="fitimg-w hover-fade rsp-xxxo" alt="体験者の声"><span class="rsp-xxxo subtxt">美容機器で、本気のスキンケア・ダイエット・アンチエイジングに取り組んでみました。</span><!--
                     --></a></li>
                </ul>
            </div><!-- /.side-bnrs -->

            <section id="side-news" class="round-contents">
                <h2><!--
                     --><img src="<?php echo WEBROOT?>common-img/side-news-head-full.jpg" width="882" height="176" class="fitimg-w rsp-ooox" alt="今旬の美容ニュース"><!--
                     --><img src="<?php echo WEBROOT?>common-img/side-news-head.jpg" width="480" height="112" class="fitimg-w rsp-xxxo" alt="今旬の美容ニュース"><!--
                 --></h2>
                <div class="round-contents-body">
                    <ul>
                    <?php foreach($blogs as $key => $v):?>
                        <li><a href="<?php echo WEBROOT?>News/detail/<?php echo $v['Blog']['id']?>"><i class="fa fa-play">&#8203;</i><?php echo $v['Blog']['title']?></a></li>
                    <?php endforeach;?>
                    </ul>
                    <a href="<?php echo WEBROOT?>News/" class="button btn-block btn-pk">さらに見る</a>
                </div>
            </section><!-- /#side-news -->

            <div class="side-bnrs">
                <ul>
                    <li><a href="<?php echo WEBROOT?>Mailmagazine/"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-magazine-full.jpg" width="990" height="272" class="fitimg-w hover-fade rsp-oxox" alt="メルマガバックナンバー"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-magazine-half.jpg" width="568" height="272" class="fitimg-w hover-fade rsp-xoxx" alt="メルマガバックナンバー"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-magazine.jpg" width="500" height="140" class="fitimg-w hover-fade rsp-xxxo" alt="メルマガバックナンバー"><!--
                     --></a></li>
                    <li><a href="<?php echo WEBROOT?>Column/"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-column-full.jpg" width="990" height="272" class="fitimg-w hover-fade rsp-oxox" alt="Beauty Post コラム"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-column-half.jpg" width="568" height="272" class="fitimg-w hover-fade rsp-xoxx" alt="Beauty Post コラム"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-column.jpg" width="500" height="260" class="fitimg-w hover-fade rsp-xxxo" alt="Beauty Post コラム"><!--
                     --></a></li>
                    <li class="bnr-maker"><a href="<?php echo WEBROOT?>Maker"><!--
                         --><img src="<?php echo WEBROOT?>common-img/sbnr-maker.png" width="500" height="180" class="fitimg-w hover-fade rsp-xxxo" alt="美容機器メーカーの方へ"><!--
                         --><span class="rsp-ooox">美容機器メーカーの方へ</span><!--
                     --></a></li><!-- /.bnr-maker -->
                    <li class="bnr-qr rsp-xxxo">
                        <img src="<?php echo WEBROOT?>common-img/side-qr-head.png" width="500" height="116" class="fitimg-w" alt="モバイルサイトはこちら">
                        <div class="clearfix">
                            <img src="http://placehold.jp/48/c9c9c9/171717/128x128.png?text=QR" width="128" height="128" class="fll" alt="QR">
                            <p>テキストテキストテキストテキストテキストテキスト</p>
                        </div><!-- /.clearfix -->
                    </li><!-- /.bnr-qr -->
                </ul>
            </div><!-- /.side-bnrs -->
