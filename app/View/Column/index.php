
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
    <?php foreach($Columns as $kv => $kvv):?>
      <section class="column-topcategory">
        <h2 class="column-head"><?php echo $GenreColumn[$kv]['Genre']['title']?></h2>
        <div class="section-body">
          <div class="column-entryblocklist">

         <?php foreach($kvv as $k => $v):?>
            <section class="column-entryblock">
              <a href="<?php echo WEBROOT.$this->name?>/detail/?id=<?php echo $v['Column']['id']?>">
                <div class="column-eyecatch"><?php echo $this->Useful->ItemImg($v['Column']['img1up'],'','Column','fitimg-w');?></div>
                <div class="column-blockbody">
                  <p class="column-entrydate"><?php echo $this->Useful->setdate($v['Column']['entrydate'],'Y.m.d')?></p>
                  <h3 class="column-entryblocktitle"><?php echo $v['Column']['title']?></h3>
                  <p class="column-entryview"><?php echo $v['Column']['count']?> views</p>
                </div>
              </a>
            </section>

    <?php endforeach;?>


          </div>
        </div>
        <div class="column-boxfoot">
          <p class="column-viewmore">
            <a href="<?php echo WEBROOT.$this->name?>/category/<?php echo $v['Column']['tag']?>">もっと見る <i class="fa fa-angle-double-right">&#8203;</i></a>
          </p>
        </div>
      </section><!-- /.column-topcategory -->
    <?php endforeach;?>
    </div><!-- /#main-area -->

    <?php echo $this->element('common/cmnSubContentColumn'); ?>


  </div>
</div><!-- /#page-area -->

