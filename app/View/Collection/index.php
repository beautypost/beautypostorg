
<div id="page-area">
    <div class="layout">

            <ol id="breadcrumb" class="breadcrumb rsp-xxoo">
                <li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
                <li><a href="<?php echo WEBROOT.$this->name?>">美容機器コレクション</a></li>

            </ol><!-- /#breadcrumb -->
        <div id="main-area" class="layout-main layout-l">

            <section id="collection-list">
                <h2 class="head-bar ico-search">美容機器 一覧</h2>
                <div class="results clearfix">
                    <p><span><?php echo $totalcount?>件</span>の美容機器があります。</p>
                    <a href="" id="filter-switch" class="button btn-sizeS btn-pk"><i class="fa fa-plus-circle">&#8203;</i>条件を追加</a>
                </div><!-- /.results -->

                <div id="filter" class="results-filter">
                <form method="get" action="<?php echo WEBROOT?>Collection/" name="searchform">
                        <?php echo $this->element('common/cmnSearchForm',array('GenreKisyu'=>$GenreKisyu,'GenrePurposes'=>$GenrePurposes)); ?>
                </div><!-- /.results-filter -->

                <div class="results-sort mt32">
                    <ul>
                        <li>
                            <dl>
                                <dt>表示件数</dt>
                                <dd>
                                    <select name="data[limit]" id="view-number" onChange="searchform.submit()">
                                        <?php echo $this->Useful->option($Limits,$data['limit'],1);?>
                                    </select>
                                </dd>
                            </dl>
                        </li>
                        <li>
                            <dl>
                                <dt>表示順</dt>
                                <dd>
                                    <select name="data[sort]" id="view-sort" onChange="searchform.submit()">
                                        <?php echo $this->Useful->option($Sorts,$data['sort'],1);?>
                                    </select>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                    <a href="" class="button btn-rich-pk"><span><i class="fa fa-check-square-o">&#8203;</i> チェックした商品を比較</span></a>
                </div><!-- /.results-sort -->
</form>

<?php foreach($Items as $Item):?>
<?php echo $this->element('ItemList',array('Item'=>$Item));?>
<?php endforeach;?>

<script type="text/javascript">
            $('.star').raty( {
             readOnly: true,
             space:false,
             score: function() {
                return $(this).attr('data-score');
             },
             path: '<?php echo WEBROOT?>raty/lib/images'
            });
            $('.starrev').raty( {
             readOnly: true,
             space:false,
             score: function() {
                return $(this).attr('data-score');
             },
             path: '<?php echo WEBROOT?>raty/lib/revimages'
            });
            </script>
                <div class="results-sort">
                    <a href="" class="button btn-rich-pk"><span><i class="fa fa-check-square-o">&#8203;</i> チェックした商品を比較</span></a>
                    <ul>
                        <li>
                            <dl>
                                <dt>表示件数</dt>
                                <dd>
                                    <select name="data[limit]" id="view-number">
                                        <?php echo $this->Useful->option($Limits,$data['limit']);?>
                                    </select>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div><!-- /.results-sort -->

                <footer>
                    <nav class="pagination pg-list">
                        <ul>

<?php if ($Pager['s']):?>
      <li class="nav-prev"><a href="?data[p]=<?php echo $Pager['p']-1?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
                                <ol>
  <?php foreach ($Pager['pager'] as $k =>$v):?>
    <?php if ($Pager['p'] == $v-1):?>
      <li class="nav-now"><a href="?data[p]=<?php echo $v-1?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><?php echo $v;?></a></li>
    <?php else:?>
      <li><a href="?data[p]=<?php echo $v-1?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><?php echo $v?></a></li>
    <?php endif;?>
  <?php endforeach;?>
                                </ol>
<?php if ($Pager['e']):?>
      <li class="nav-next"><a href="?data[p]=<?php echo $Pager['p']+1?>"><span class="rsp-xxoo">Next</span></a></li>
<?php endif;?>
                        </ul>
                    </nav><!-- /.pagination -->
                </footer>
            </section><!-- /#collection-list -->
        </div><!-- /#main-area -->
        <aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
        </aside><!-- /#sub-area -->
    </div>
</div><!-- /#page-area -->


