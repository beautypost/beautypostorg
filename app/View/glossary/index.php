
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li>美容機器用語集</li>
		</ol><!-- /#breadcrumb -->
		<div id="main-area" class="layout-main layout-l">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>images/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="美容機器用語集 glosary"><!--
				 --><img src="<?php echo WEBROOT?>images/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="美容機器用語集 glosary"><!--
			 --></h2>
			<p>基本用語から専門用語まで、美容機器に関する用語を幅広く集めました。</p>
			<section id="glossary-index">
			<?php foreach($GenreTypes as $k => $v):?>
				<?php if(!isset($Items[$k])){continue;}?>
				<section>
					<h2 class="index-group head-std ico-search"><?php echo $v?>行</h2>
						<ul class="index-list">
						<?php foreach($Items[$k] as $Item):?>

							<li><a href="<?php echo WEBROOT.$this->name.'/detail/'.$Item['Type']['id']?>"><?php echo $Item['Type']['title']?></a></li>
						<?php endforeach;?>
						</ul><!-- /.index-list -->
				</section>
<?php endforeach;?>
			</section><!-- /#glossary-index -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

