
<!--
====================================================================================================
 Column Header                                                                       #column-header
==================================================================================================== -->
<header id="column-header">
  <div class="layout">
    <h1><a href="<?php echo WEBROOT?>Column/">Beauty Post <span>美活コラム</span></a></h1>
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
            <p class="column-entrydate fll"><?php echo $this->Useful->setdate($Column['Column']['entrydate'],'Y/m/d')?></p>
            <p class="column-entryview flr"><?php echo $Column['Column']['count']?> views</p>
            <h2 class="column-entrytitle"><?php echo $Column['Column']['title']?></h2>
            <div class="column-entryinfo">
            <div class="column-entrycategory"><i class="fa fa-folder-open-o"></i> <a href="<?php echo WEBROOT.$this->name?>/category/<?php echo $Column['Column']['tag']?>"><?php echo $this->Useful->selectOptionValue($GenreColumns,$Column['Column']['tag'])?></a></div>
              <div class="column-entrysns">
                <ul>
                  <li><div class="g-plusone" data-size="medium"></div></li>
                  <li><div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
                </ul>
              </div>
            </div><!-- /.column-entryinfo -->
          </header>
          <div class="column-entrybody">
                <div class="column-eyecatch"><?php echo $this->Useful->ItemImg($Column['Column']['img1up'],'','Column','fitimg-w');?></div>

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
            <div class="column-entrycategory"><i class="fa fa-folder-open-o"></i> <a href="<?php echo WEBROOT.$this->name?>/category/<?php echo $Column['Column']['tag']?>"><?php echo $this->Useful->selectOptionValue($GenreColumns,$Column['Column']['tag'])?></a></div>
            <div class="column-entrysns">
              <ul>
                <li><div class="g-plusone" data-size="medium"></div></li>
                <li><div class="fb-like" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
              </ul>
            </div>
          </div><!-- /.column-entryinfo -->
        </div><!-- /.column-boxfoot -->
      </article><!-- /.column-entry -->

      <div class="container">
        <nav class="column-pagination pg-list">
          <ul>
<?php if ($Pager['s']):?>
      <li class="nav-prev"><a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $Pager['s']?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
      <li class="nav-back"><a href="<?php echo WEBROOT.$this->name?>"><span class="rsp-xxoo">一覧へ戻る</span></a></li>
<?php if ($Pager['e']):?>
      <li class="nav-next"><a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $Pager['e']?>"><span class="rsp-xxoo">Next</span></a></li>
<?php endif;?>
          </ul>
        </nav><!-- /.pagination -->
      </div>
    </div><!-- /#main-area -->


    <?php echo $this->element('common/cmnSubContentColumn'); ?>


  </div>
</div><!-- /#page-area -->


