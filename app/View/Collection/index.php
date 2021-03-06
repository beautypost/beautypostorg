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

                <form method="get" action="<?php echo WEBROOT?>Collection/" name="searchform">
                    <div id="filter" class="results-filter">
                        <?php echo $this->element('common/cmnSearchForm',array('GenreKisyu'=>$GenreKisyu,'GenrePurposes'=>$GenrePurposes)); ?>
                    </div><!-- /.results-filter -->

                    <div class="results-sort mt32">
                        <ul>
                            <li>
                                <dl>
                                    <dt>表示件数</dt>
                                    <dd>
                                        <select name="data[limit]" id="view-number" onChange="searchform.submit()">
                                            <?php echo $this->Useful->option($Limits,$data['limit']);?>
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt>表示順</dt>
                                    <dd>
                                        <select name="data[sort]" id="view-sort" onChange="searchform.submit()">
                                            <?php echo $this->Useful->option($Sorts,$data['sort']);?>
                                        </select>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                        <?php if(isset($UserData['Snsuser']['id'])):?>
                            <a href="<?php echo WEBROOT?>Compare/" class="button btn-rich-pk" target="_new"><span><i class="fa fa-check-square-o">&#8203;</i> チェックした商品を比較</span></a>
                        <?php else:?>
                            <a href="<?php echo WEBROOT?>Login/?message=<?php echo NOLOGINMESSAGE?>" class="button btn-rich-pk"><span><i class="fa fa-check-square-o">&#8203;</i> チェックした商品を比較</span></a>
                        <?php endif;?>
                    </div><!-- /.results-sort -->
                </form>

                <script type="text/javascript">
                    function ratystar(id){
                        $('.star'+id).raty( {
                         readOnly: true,
                         space:false,
                         score: function() {
                            return $(this).attr('data-score');
                         },
                         path: '<?php echo WEBROOT?>raty/lib/images'
                        });
                        $('.starrev'+id).raty( {
                         readOnly: true,
                         space:false,
                         score: function() {
                            return $(this).attr('data-score');
                         },
                         path: '<?php echo WEBROOT?>raty/lib/revimages'
                        });
                    }

                    function wants(id){
                        $.ajax({
                            type: "GET",
                            url: "<?php echo WEBROOT?>Ajax/setWant/?itemID="+id,
                            success: function(data){
                                if(data != '') {
                                    $("#ajwant"+id).html(data)
                                }
                            }
                        });
                    }

                    function compareItem(id){

                        $.ajax({
                            type: "GET",
                            url: "<?php echo WEBROOT?>Ajax/setCompare/?itemID="+id,
                            success: function(data){

                            }
                        });
                    }
                </script>

                <?php foreach($Items as $Item):?>
                <?php echo $this->element('ItemList',array('Item'=>$Item));?>
                <?php endforeach;?>

                <div class="results-sort">
                    <?php if(isset($UserData['Snsuser']['id'])):?>
                        <a href="<?php echo WEBROOT?>Compare/" class="button btn-rich-pk" target="_new"><span><i class="fa fa-check-square-o">&#8203;</i> チェックした商品を比較</span></a>
                    <?php else:?>
                        <a href="<?php echo WEBROOT?>Login/?message=<?php echo NOLOGINMESSAGE?>" class="button btn-rich-pk"><span><i class="fa fa-check-square-o">&#8203;</i> チェックした商品を比較</span></a>
                    <?php endif;?>
                    <ul>
                        <li>
                            <dl>
                                <dt>表示件数</dt>
                                <dd>
                                        <select name="data[sort]" id="view-sort2" onChange="searchform.submit()">
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
<?php if ($Pager['p'] > 0):?>
      <li class="nav-prev"><a href="?p=<?php echo $Pager['p']-1?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
                            <li>
                                <ol>
  <li class="sp-hide"><a href="?p=1&data[SearchData]=<?php echo base64_encode(serialize($data))?>">1</a></li>
                <li class="sp-hide">…</li>
  <?php foreach ($Pager['pager'] as $k =>$v):?>
    <?php if ($Pager['p'] == $v-1):?>
      <li class="nav-now"><a href="?p=<?php echo $v-1?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><?php echo $v;?></a></li>
    <?php else:?>

    <?php if (($Pager['p']+3 > $v-1) && ($Pager['p']-3 < $v-1)):?>
      <li class="sp-hide"><a href="?p=<?php echo $v-1?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><?php echo $v?></a></li>
    <?php endif;?>

    <?php endif;?>
  <?php endforeach;?>
                <li class="sp-hide">…</li>
  <li class="sp-hide"><a href="?p=<?php echo $Pager['pend']?>&data[SearchData]=<?php echo base64_encode(serialize($data))?>"><?php echo $Pager['pend']?></a></li>
                                </ol>
                            </li>
<?php if ($Pager['p']+1 != $Pager['pend']):?>
      <li class="nav-next"><a href="?p=<?php echo $Pager['p']+1?>"><span class="rsp-xxoo">Next</span></a></li>
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


