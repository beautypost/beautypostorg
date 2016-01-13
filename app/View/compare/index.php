
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li><a href="<?php echo WEBROOT?>Collection">美容機器コレクション</a></li>
			<li>商品比較</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<section id="sp-compare">
				<h2 class="head-bar ico-arrow">商品比較</h2>
				<div class="compare-custom">
					<form action="<?php echo WEBROOT.$this->name?>">
						<dl>
							<dt><i class="fa fa-filter"></i> 比較項目を選択</dt>
							<dd>
								<select name="compare" id="">
								<?php echo $this->Useful->option($Compare,$compare)?>
								</select>
							</dd>
						</dl>
						<input type="submit">
					</form>
				</div>

				<ul class="compare-list">
				<?php foreach($Items as $item):?>
					<li>
						<a href="<?php echo WEBROOT?>Collection/detail/<?php echo $item['Item']['id']?>">
							<div class="photo">
								<div class="imgframe">
									<div class="inner"><img src="<?php echo $item['Item']['img1']?>"></div>
								</div>
							</div>
							<div class="info">
								<p class="item-name"><?php echo $item['Item']['id']?><?php echo $item['Item']['title']?></p>
								<p class="compare-info"><?php echo $this->Useful->selectValue($Compare,$compare)?>：
								<?php
								if(isset($itemGenreValues[$compare][$item['Item']['id']][0]['GenreAttrItem']['value'])){
									echo $itemGenreValues[$compare][$item['Item']['id']][0]['GenreAttrItem']['value'];
								}
								?>
								</p>
							</div>
						</a>
					</li>
				<?php endforeach;?>

				</ul>
			</section><!-- /#sp-compare -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

