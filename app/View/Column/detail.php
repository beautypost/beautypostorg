
<!--
====================================================================================================
 Column Header                                                                       #column-header
==================================================================================================== -->
<header id="column-header">
  <div class="layout">
    <h1><a href="<?php echo WEBROOT?>">Beauty Post <span>美活コラム</span></a></h1>
  </div>
</header><!-- /#column-header -->
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
  <div class="layout">

    <div id="main-area" class="layout-main layout-l">
      <article class="column-entry">
        <div class="section-body">
          <header class="column-entryhead">
            <p class="column-entrydate fll"><?php echo $Column['Column']['created']?></p>
            <p class="column-entryview flr"><?php echo $Column['Column']['count']?> views</p>
            <h2 class="column-entrytitle"><?php echo $Column['Column']['title']?></h2>

            <div class="column-entryinfo">
              <div class="column-entrycategory"><i class="fa fa-folder-open-o"></i> <a href="./list.html">カテゴリ</a></div>
              <div class="column-entrysns">SNS</div>
            </div><!-- /.column-entryinfo -->
          </header>
          <div class="column-entrybody">
            <div class="column-eyecatch">
              <img src="http://lorempixel.com/400/300/people/1" alt="" class="fitimg-w">
            </div>
            <div class="column-entrylead">
              <?php echo $Column['Column']['comment']?>
            </div>
            <div class="column-entrytxt">
              <p><?php echo $Column['Column']['comment']?></p>
            </div><!-- /.column-entrytxt -->
          </div>
        </div><!-- /.section-body -->

        <div class="column-boxfoot">
          <div class="column-entryinfo">
            <div class="column-entrycategory"><i class="fa fa-folder-open-o"></i> <a href="./list.html">カテゴリ</a></div>
            <div class="column-entrysns">SNS</div>
          </div><!-- /.column-entryinfo -->
        </div><!-- /.column-boxfoot -->
      </article><!-- /.column-entry -->

      <div class="container">
        <nav class="column-pagination pg-list">
          <ul>
            <li class="nav-prev"><a href="#"><span class="rsp-xxoo">Prev</span></a></li>
            <li class="nav-back"><a href="./list.html">一覧へ戻る</a></li>
            <li class="nav-next"><a href="#"><span class="rsp-xxoo">Next</span></a></li>
          </ul>
        </nav><!-- /.pagination -->
      </div>
    </div><!-- /#main-area -->


    <?php echo $this->element('common/cmnSubContentColumn'); ?>


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
