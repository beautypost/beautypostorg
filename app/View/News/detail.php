<div id="page-area">
  <div class="layout">

      <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
        <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
        <li><a href="<?php echo WEBROOT?>"News/>お役立ち美容通信</a></li>
        <li><?php echo $Blog['Blog']['title']?></li>
      </ol><!-- /#breadcrumb -->

    <div id="main-area" class="layout-main layout-l">
      <article id="news-list">
        <h2><!--
           --><img src="<?php echo WEBROOT?>images/title-full.jpg" width="1440" height="200" class="fitimg-w rsp-xooo" alt="お役立ち美容通信"><!--
           --><img src="<?php echo WEBROOT?>images/title-half.jpg" width="1040" height="200" class="fitimg-w rsp-oxxx" alt="お役立ち美容通信"><!--
         --></h2>


        <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
        <section class="news-entry">
          <header>
            <h2 class="news-title head-bar"><?php echo $Blog['Blog']['title']?></h2>
            <p class="news-date"><?php echo $this->Useful->setdate($Blog['Blog']['entrydate'])?></p>
          </header>

          <div class="news-body">

            <div class="photo">
              <div class="imgframe">
                <div class="inner"><?php echo $this->Useful->ItemImg($Blog['Blog']['img1up'],'300','blogs')?></div>
              </div>
            </div><!-- /.photo -->

            <div class="news-txt">
              <div class="lead-section">
              <p><?php echo $Blog['Blog']['comment']?></p>
              </div>
            </div>
          </div><!-- /.news-body -->

          <footer>
            <ul class="news-category">

            <?php foreach($Blog['Blog']['tags'] as $k => $v):?>
              <li><a href=""><?php echo $this->Useful->selectOptionValue($GenreBlogs,$v)?></a></li>
            <?php endforeach;?>
            </ul><!-- /.news-category -->
            <div class="sns-btns">
              SNS用のタグを設置
            </div>
          </footer>
        </section><!-- /.news-entry -->

      <footer>
                    <nav class="pagination pg-list">
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
      </footer>
    </article>
    </div><!-- /#main-area -->

    <aside id="news-menu" class="layout-sub layout-r">
        <?php echo $this->element('common/cmnSubContentBlog'); ?>
    </aside><!-- /#sub-area -->
  </div>

</div><!-- /#page-area -->
