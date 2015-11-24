<div id="page-area">
  <div class="layout">
    <div id="main-area">
      <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
        <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
        <li>お役立ち美容通信</li>
      </ol><!-- /#breadcrumb -->

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


      </article>
    </div>

    </div>
</div><!-- /#page-area -->
