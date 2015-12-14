
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li>アンケートバックナンバー</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>images/enquete/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="美活アンケートバックナンバー enquête"><!--
				 --><img src="<?php echo WEBROOT?>images/enquete/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="美活アンケートバックナンバー enquête"><!--
			 --></h2>

			<p class="lead">Beauty Postで過去に行った 美活アンケートがご覧いただけます。<br class="rsp-xxoo">過去のバックナンバーをご覧になられたい方は、ログインください。</p>

			<ul class="backnumber-list container">
<?php foreach($Questions as $Item):?>
				<li>
					<dl>
						<dt><?php echo $Item['Question']['start']?><span class="vol">第<?php echo $Item['Question']['id']?>回</span></dt>
						<dd>
							<span class="question"><?php echo $Item['Question']['title']?></span>
						</dd>
					</dl>
				</li>
<?php endforeach?>
			</ul><!-- /.backnumber-list -->

                <footer>
                    <nav class="pagination pg-list">
<ul>
<?php if ($Pager['p'] > 0):?>
      <li class="nav-prev"><a href="?p=<?php echo $Pager['p']-1?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
                            <li>
                                <ol>
  <li class="sp-hide"><a href="?p=1">1</a></li>
                <li class="sp-hide">…</li>
  <?php foreach ($Pager['pager'] as $k =>$v):?>
    <?php if ($Pager['p'] == $v-1):?>
      <li class="nav-now"><a href="?p=<?php echo $v-1?>?>"><?php echo $v;?></a></li>
    <?php else:?>

    <?php if (($Pager['p']+3 > $v-1) && ($Pager['p']-3 < $v-1)):?>
      <li class="sp-hide"><a href="?p=<?php echo $v-1?>?>"><?php echo $v?></a></li>
    <?php endif;?>

    <?php endif;?>
  <?php endforeach;?>
                <li class="sp-hide">…</li>
  <li class="sp-hide"><a href="?p=<?php echo $Pager['pend']?>"><?php echo $Pager['pend']?></a></li>
                                </ol>
                            </li>
<?php if ($Pager['p']+1 != $Pager['pend']):?>
      <li class="nav-next"><a href="?p=<?php echo $Pager['p']+1?>"><span class="rsp-xxoo">Next</span></a></li>
<?php endif;?>
                        </ul>
                    </nav><!-- /.pagination -->
                </footer>
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

