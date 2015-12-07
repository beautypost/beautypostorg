<div id="gnav">
        <div class="gnav-inner">
            <ul class="clearfix">
                <li class="gnav-about"><a href="<?php echo $this->webroot?>pages/about/">Beauty Postとは？</a></li>
                <li class="gnav-guide"><a href="<?php echo $this->webroot?>pages/guide/">使い方ガイド</a></li>
                <li class="gnav-collection"><a href="<?php echo $this->webroot?>Collection/">美容機器コレクション</a></li>
                <li class="gnav-report"><a href="<?php echo $this->webroot?>pages/report/">モニター体験レポート</a></li>
<?php if(!isset($UserData['Snsuser']['id'])):?>
                <li class="gnav-login"><a href="<?php echo $this->webroot?>Login/">ログイン</a></li>
<?php else:?>
                <li class="gnav-mypage"><a href="<?php echo WEBROOT?>Mypage/">マイページ</a></li>
<?php endif;?>
            </ul>
            <div class="menu-btn rsp-ooxx">
                <a id="menu-toggle"><i class="fa fa-bars">&#8203;</i><br>MENU</a>
            </div><!-- /.menu-btn -->
        </div><!-- /.gnav-inner -->
    </div><!-- /#gnav -->