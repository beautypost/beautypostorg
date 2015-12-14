
<!--
====================================================================================================
 Column Header                                                                       #column-header
==================================================================================================== -->
<header id="column-header">
  <div class="layout">
    <h1>Beauty Post <span>美活コラム</span></h1>
  </div>
</header><!-- /#column-header -->
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
  <div class="layout">

    <div id="main-area" class="layout-main layout-l">
      <section class="column-topcategory">
        <h2 class="column-head">カテゴリ</h2>
        <div class="section-body">
          <div class="column-entryblocklist">

         <?php foreach($Columns as $k => $v):?>
            <section class="column-entryblock">
              <a href="./detail.html">
                <div class="column-eyecatch"><img src="http://lorempixel.com/400/300/people/1" alt="" class="fitimg-w"></div>
                <div class="column-blockbody">
                  <p class="column-entrydate"><?php echo $v['Column']['created']?></p>
                  <h3 class="column-entryblocktitle"><?php echo $v['Column']['title']?></h3>
                  <p class="column-entryview">100,000 views</p>
                </div>
              </a>
            </section>

    <?php endforeach;?>


          </div>
        </div>
        <div class="column-boxfoot">
          <p class="column-viewmore">
            <a href="<?php echo WEBROOT.$this->name?>detail/?id=<?php echo $v['Column']['id']?>">もっと見る <i class="fa fa-angle-double-right">&#8203;</i></a>
          </p>
        </div>
      </section><!-- /.column-topcategory -->

      <section class="column-topcategory">
        <h2 class="column-head">カテゴリ</h2>
        <div class="section-body">
          <div class="column-entryblocklist">
         <?php foreach($Columns as $k => $v):?>

            <section class="column-entryblock">
              <a href="./detail.html">
                <div class="column-eyecatch"><img src="http://lorempixel.com/400/300/people/1" alt="" class="fitimg-w"></div>
                <div class="column-blockbody">
                  <p class="column-entrydate"><?php echo $v['Column']['created']?></p>
                  <h3 class="column-entryblocktitle"><?php echo $v['Column']['title']?></h3>
                  <p class="column-entryview">100,000 views</p>
                </div>
              </a>
            </section>
    <?php endforeach;?>

          </div>
        </div>
        <div class="column-boxfoot">
          <p class="column-viewmore">
            <a href="<?php echo WEBROOT.$this->name?>detail/?id=<?php echo $v['Column']['id']?>">もっと見る <i class="fa fa-angle-double-right">&#8203;</i></a>
          </p>
        </div>
      </section><!-- /.column-topcategory -->
         <?php foreach($Columns as $k => $v):?>

      <section class="column-topcategory">
        <h2 class="column-head">カテゴリ</h2>
        <div class="section-body">
          <div class="column-entryblocklist">

            <section class="column-entryblock">
              <a href="./detail.html">
                <div class="column-eyecatch"><img src="http://lorempixel.com/400/300/people/1" alt="" class="fitimg-w"></div>
                <div class="column-blockbody">
                  <p class="column-entrydate">2015.12.13</p>
                  <h3 class="column-entryblocktitle">タイトルが入りますタイトルが入りますタイトル</h3>
                  <p class="column-entryview">100,000 views</p>
                </div>
              </a>
            </section>
    <?php endforeach;?>

          </div>
        </div>
        <div class="column-boxfoot">
          <p class="column-viewmore">
            <a href="./list.html">もっと見る <i class="fa fa-angle-double-right">&#8203;</i></a>
          </p>
        </div>
      </section><!-- /.column-topcategory -->
    </div><!-- /#main-area -->

    <aside id="column-sub" class="layout-sub layout-r">
      <section class="column-famous container">
        <h2 class="column-sidehead">人気のコラムランキング</h2>
        <div class="section-body">
          <nav>
            <ul>
         <?php foreach($Columns as $k => $v):?>

              <li>
                <a href="./detail.html">
                  <img src="<?php echo WEBROOT; ?>common-img/ico-key01.png" width="64" height="64" class="rank" alt="1">
                  <span class="column-entryview">100,999 views</span>
                  <span class="entry-title">タイトルタイトルタイトルタイトルタイトルタイトル</span>
                </a>
              </li>
    <?php endforeach;?>


            </ul>
          </nav>
        </div>
      </section>

      <section class="column-recent container">
        <h2 class="column-sidehead">新着コラム</h2>
        <div class="section-body">
          <nav>
            <ul>

         <?php foreach($Columns as $k => $v):?>

              <li>
                <a href="./detail.html">
                  <span class="column-entrydate">2015/12/66</span>
                  <span class="entry-title">タイトルタイトルタイトルタイトルタイトルタイトル</span>
                </a>
              </li>


            </ul>
          </nav>
        </div>
      </section>
    <?php endforeach;?>

      <section class="column-category container">
        <h2 class="column-sidehead">カテゴリ</h2>
        <div class="section-body">
          <nav>
            <ul>
              <li><a href="./list.html">カテゴリ1</a></li>
              <li><a href="./list.html">カテゴリ2</a></li>
              <li><a href="./list.html">カテゴリ3</a></li>
              <li><a href="./list.html">カテゴリ4</a></li>
            </ul>
          </nav>
        </div>
      </section>

      <div class="column-bnr">
        <a href="<?php echo WEBROOT; ?>"><img src="<?php echo WEBROOT; ?>common-img/logo.png" class="fitimg-w" alt="美容機器コレクション Beauty Post"></a>
      </div>
    </aside><!-- /#column-sub -->
  </div>
</div><!-- /#page-area -->
<!--
====================================================================================================
 Column Footer                                                                       #column-footer
==================================================================================================== -->
<footer id="column-footer">
  <div class="layout">
    <nav id="column-fnav">
      <ul>
        <li><a href=""><i class="fa fa-home">&#8203;</i> ホーム</a></li>
        <li><a href=""><i class="fa fa-pencil">&#8203;</i> ライター募集</a></li>
        <li><a href=""><i class="fa fa-building">&#8203;</i> 運営者会社</a></li>
        <li><a href=""><i class="fa fa-envelope-o">&#8203;</i> お問い合わせ</a></li>
      </ul>
    </nav><!-- /#column-fnav -->
  </div>
  <div id="column-copyright">
    <div class="layout"><p><small>Copyright 2015 Beauty Post. All Rights Reserved.</small></p></div>
  </div><!-- /#copyright -->
</footer><!-- /#column-footer -->
<!--
==================================================================================================== -->
</div></div><!-- /#wrapper>/#wrap-inner -->
<?php  //lastContent(); ?>
</body>
</html>
