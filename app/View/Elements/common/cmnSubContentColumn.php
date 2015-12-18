    <aside id="column-sub" class="layout-sub layout-r">
      <section class="column-famous container">
        <h2 class="column-sidehead">人気のコラムランキング</h2>
        <div class="section-body">
          <nav>
            <ul>
         <?php foreach($RankingColumns as $k => $v):?>

              <li>
                  <a href="<?php echo WEBROOT?>Column/detail/<?php echo $v['Column']['id']?>">
                  <img src="<?php echo WEBROOT; ?>common-img/ico-key0<?php echo $k+1?>.png" width="64" height="64" class="rank" alt="1">
                  <span class="column-entryview"><?php echo $v['Column']['count']?> views</span>
                  <span class="entry-title"><?php echo $v['Column']['title']?></span>
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

         <?php foreach($NewColumns as $k => $v):?>

              <li>
                  <a href="<?php echo WEBROOT?>Column/detail/<?php echo $v['Column']['id']?>">
                  <span class="column-entrydate"><?php echo $this->Useful->setdate($v['Column']['created'],'Y/m/d')?></span>
                  <span class="entry-title"><?php echo $v['Column']['title']?></span>
                </a>
              </li>
    <?php endforeach;?>

            </ul>
          </nav>
        </div>
      </section>


      <section class="column-category container">
        <h2 class="column-sidehead">カテゴリ</h2>
        <div class="section-body">
          <nav>
            <ul>
         <?php foreach($GenreColumn as $k => $v):?>
              <li><a href="<?php echo WEBROOT?>Column/category/<?php echo $v['Genre']['id']?>"><?php echo $v['Genre']['title']?></a></li>
        <?php endforeach;?>
            </ul>
          </nav>
        </div>
      </section>

      <div class="column-bnr">
        <a href="<?php echo WEBROOT; ?>"><img src="<?php echo WEBROOT; ?>common-img/logo.png" class="fitimg-w" alt="美容機器コレクション Beauty Post"></a>
      </div>
    </aside><!-- /#column-sub -->
