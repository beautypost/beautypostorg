            <section id="news-famous">
                <h2 class="head-bar ico-arrow">人気のnews</h2>
                <nav>
                    <ul>
                    <?php $i=1;?>
<?php foreach($BlogAccess as $item):?>
                        <li>
                            <a href="<?php echo WEBROOT?>News/detail/<?php echo $item['Blog']['id']?>">
                                <img src="<?php echo WEBROOT?>common-img/ico-key0<?php echo $i++?>.png" width="64" height="64" class="rank" alt="1">
                                <span class="entry-views"><?php echo $item['Blog']['count']?> views</span>
                                <span class="entry-title"><?php echo $item['Blog']['title']?></span>
                            </a>
                        </li>
<?php endforeach;?>

                    </ul>
                </nav>
            </section><!-- /#news-famous -->

            <section id="news-recent">
                <h2 class="head-bar ico-arrow">新着news</h2>
                <nav>
                    <ul>

<?php foreach($BlogNew as $item):?>
                        <li>
                            <a href="<?php echo WEBROOT?>News/detail/<?php echo $item['Blog']['id']?>">
                                <span class="entry-date"><?php echo $this->Useful->setdate($item['Blog']['entrydate'],'Y/m/d')?></span>
                                <span class="entry-title"><?php echo $item['Blog']['title']?></span>

                            </a>
                        </li>
<?php endforeach;?>
                    </ul>
                </nav>
            </section><!-- /#news-recent -->

            <section id="news-category">
                <h2 class="head-bar ico-arrow">カテゴリー</h2>
                <ul>
                <?php foreach($GenreBlogs as $item):?>
                    <li><a href="<?php echo WEBROOT?>News/index/<?php echo $item['Genre']['id']?>"><?php echo $item['Genre']['title']?></a></li>
                <?php endforeach;?>
                </ul>
            </section><!-- /#news-category -->

