
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
      <h2 class="column-head"><?php echo $this->Useful->selectOptionValue($GenreColumns,$tag_id)?></h2>


    <?php foreach($Columns as $k => $v):?>



      <section class="column-entry">
        <div class="section-body">
          <header>
            <p class="column-entrydate fll"><?php echo $this->Useful->setdate($v['Column']['entrydate'],'Y/m/d')?></p>
            <p class="column-entryview flr"><?php echo $v['Column']['count']?> views</p>
            <h2 class="column-entrytitle"><a href="<?php echo WEBROOT.$this->name?>/detail/?id=<?php echo $v['Column']['id']?>"><?php echo $v['Column']['title']?></a></h2>
          </header>
          <div class="column-entrybody">
            <div class="column-eyecatch">
                <div class="column-eyecatch"><?php echo $this->Useful->ItemImg($v['Column']['img1up'],'','Column','fitimg-w');?></div>
            </div>
            <div class="column-entrylead">
              <?php echo $v['Column']['comment']?>
            </div>
            <p class="column-viewmore">
              <a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $v['Column']['id']?>">続きを読む <i class="fa fa-angle-double-right">&#8203;</i></a>
            </p>
          </div>
        </div><!-- /.section-body -->

        <div class="column-boxfoot">
          <div class="column-entryinfo">
            <div class="column-entrycategory">
            <i class="fa fa-folder-open-o"></i> <a href="<?php echo WEBROOT.$this->name?>/category/?tag_id=<?php echo $v['Column']['tag']?>"><?php echo $this->Useful->selectOptionValue($GenreColumns,$tag_id)?></a>
            </div>
            <div class="column-entrysns">
              <ul>
                <li><div class="g-plusone" data-size="medium"></div></li>
                <li><div class="fb-like" data-href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $v['Column']['id']?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></li>
              </ul>
            </div>
          </div><!-- /.column-entryinfo -->
        </div><!-- /.column-boxfoot -->
      </section><!-- /.column-entry -->

    <?php endforeach;?>



      <div class="container">
        <nav class="column-pagination pg-list">
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
      </div>
    </div><!-- /#main-area -->


    <?php echo $this->element('common/cmnSubContentColumn'); ?>


  </div>
</div><!-- /#page-area -->


