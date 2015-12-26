
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li>メルマガバックナンバー</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>images/mailmagazine/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="メルマガバックナンバー enquête"><!--
				 --><img src="<?php echo WEBROOT?>images/mailmagazine/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="メルマガバックナンバー enquête"><!--
			 --></h2>

            <div>
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
            </div>

			<section class="enquete-section">
				<header>
					<h2 class="head-bar ico-arrow"><span class="rsp-xooo"><?php echo $this->Useful->setdate($Mailmagazine['Mailmagazine']['send_date'],'Y/m/d')?> </span>vol.<?php echo $Mailmagazine['Mailmagazine']['number']?></h2>
					<p><?php echo $Mailmagazine['Mailmagazine']['title']?></p>
				</header>

				<div class="section-body answer">


				</div><!-- /.section-body -->
				<div class="enquete-txt">
					<p><?php echo $Mailmagazine['Mailmagazine']['comment']?></p>
				</div>
			</section>

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
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

