<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li><a href="<?php echo WEBROOT?>">マイページ</a></li>
			<li>レビュー商品一覧</li>
		</ol><!-- /#breadcrumb -->

		<div class="layout-main layout-r">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>images/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="マイページ My Page"><!--
				 --><img src="<?php echo WEBROOT?>images/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="マイページ My Page"><!--
			 --></h2>
		</div><!-- /.layout-main.layout-r -->

		<aside id="mypage-menu" class="layout-sub layout-l">
            <?php echo $this->element('common/cmnMypage')?>
		</aside><!-- /#mypage-menu -->

		<div id="main-area" class="layout-main layout-r">
			<section id="collection-list">
				<h2 class="head-std ico-arrow">レビュー商品一覧</h2>
				<p>直近3か月にレビューを行った商品の一覧です。</p>

				<?php foreach($Items as $Item):?>
				<?php echo $this->element('ItemList',array('Item'=>$Item));?>
				<?php endforeach;?>

			</section><!-- /#collection-list -->
		</div><!-- /#main-area -->
	</div>
</div><!-- /#page-area -->

