<div id="page-area">
  <div class="layout">

      <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
        <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
        <li>コラム</li>
      </ol><!-- /#breadcrumb -->
    <div id="main-area" class="layout-main layout-l">
      <article id="news-list">

        <h2>コラム
        </h2>


         <?php foreach($Columns as $k => $v):?>
        <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
        <section class="news-entry">
          <header>
            <h2 class="news-title head-bar"><?php echo $v['Column']['title']?></h2>
            <p class="news-date"><?php echo $v['Column']['created']?></p>
          </header>

          <div class="news-body">
          <!--
            <div class="photo">
              <div class="imgframe">
                <div class="inner"><img src="http://placehold.jp/128/a1a1a1/cccccc/800x600.png?text=DUMMY" alt=""></div>
              </div>
            </div><!-- /.photo -->

            <div class="news-txt">
              <div class="lead-section">
              <p><?php echo $v['Column']['comment']?></p>
              </div>
              <p class="more"><a href="<?php echo WEBROOT.'Column/detail/'.$v['Column']['id']?>">続きを読む</a></p>
            </div>
          </div><!-- /.news-body -->

          <footer>
            <ul class="news-category">
              <li><a href=""><?php $v['Column']['tag']?></a></li>
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
        <?php echo $this->element('common/cmnSubContent'); ?>
    </aside><!-- /#sub-area -->
  </div>

</div><!-- /#page-area -->
