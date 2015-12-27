
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li><a href="<?php echo WEBROOT.$this->name?>">美容機器用語集</a></li>
			<li><?php echo $Item['Type']['title']?></li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>/images/glossary/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="美容機器用語集 glosary"><!--
				 --><img src="<?php echo WEBROOT?>/images/glossary/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="美容機器用語集 glosary"><!--
			 --></h2>
			<section id="glossary-detail">
				<h2 class="head-bar ico-arrow"><?php echo $Item['Type']['title']?></h2>

				<div class="section-body">
<?php if($Item['Type']['img1up']):?>
					<div class="item-img">
						<div class="imgframe">
							<div class="inner">
							<?php echo $this->Useful->ItemImg($Item['Type']['img1up'],'','types','fitimg-w');?>
							</div>
						</div>
					</div><!-- /.item-img -->
<?php endif;?>
					<div class="user-text">
						<p><?php echo $Item['Type']['comment']?></p>
					</div>
				</div><!-- /.section-body -->

				<aside class="relative-words">
					<h2 class="head-std ico-arrow">関連用語</h2>
					<ul>
					<?php foreach($rItems as $item):?>
						<li><a href="<?php echo WEBROOT.$this->name.'/detail/'.$item['Type']['id']?>"><?php echo $item['Type']['title']?></a></li>
					<?php endforeach?>
					</ul>
				</aside><!-- /.relative-words -->

				<footer class="tac">
					<a href="<?php echo WEBROOT.$this->name?>" class="button btn-pk">一覧へ戻る</a>
				</footer>
			</section><!-- /#glossary-detail -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->
