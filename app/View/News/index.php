<div id="page-area">
  <div class="layout">

      <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
        <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
        <li>お役立ち美容通信</li>
      </ol><!-- /#breadcrumb -->

    <div id="main-area" class="layout-main layout-l">
      <article id="news-list">
        <h2><!--
           --><img src="<?php echo WEBROOT?>images/title-full.jpg" width="1440" height="200" class="fitimg-w rsp-xooo" alt="お役立ち美容通信"><!--
           --><img src="<?php echo WEBROOT?>images/title-half.jpg" width="1040" height="200" class="fitimg-w rsp-oxxx" alt="お役立ち美容通信"><!--
         --></h2>


         <?php foreach($Blogs as $k => $v):?>
        <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
        <section class="news-entry">
          <header>
            <h2 class="news-title head-bar"><?php echo $v['Blog']['title']?></h2>
            <p class="news-date"><?php echo $this->Useful->setdate($v['Blog']['created'],'Y/m/d')?></p>
          </header>

          <div class="news-body">

            <div class="photo">
              <div class="imgframe">
                <div class="inner"><?php echo $this->Useful->ItemImg($v['Blog']['img1up'],'300','blogs')?></div>
              </div>
            </div><!-- /.photo -->

            <div class="news-txt">
              <div class="lead-section">
              <p><?php echo $v['Blog']['comment']?></p>
              </div>
              <p class="more"><a href="<?php echo WEBROOT.'News/detail/'.$v['Blog']['id']?>">続きを読む</a></p>
            </div>
          </div><!-- /.news-body -->
          <footer>
            <ul class="news-category">
            <?php foreach($v['Blog']['tags'] as $kk => $vv):?>
              <li><a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $vv?>"><?php echo $this->Useful->selectOptionValue($GenreBlogs,$vv)?></a></li>
            <?php endforeach;?>
            </ul><!-- /.news-category -->
            <div class="sns-btns">
              sns
            </div>
          </footer>
        </section><!-- /.news-entry -->
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
    </article>
    </div><!-- /#main-area -->

    <aside id="news-menu" class="layout-sub layout-r">
        <?php echo $this->element('common/cmnSubContentBlog'); ?>
    </aside><!-- /#sub-area -->
  </div>

</div><!-- /#page-area -->
