
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li><a href="<?php echo WEBROOT.$this->name?>">アンケートバックナンバー</a></li>
			<li>第<?php echo $Question['Question']['id']?>回 美容アンケート</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>images/enquete/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="美活アンケートバックナンバー enquête"><!--
				 --><img src="<?php echo WEBROOT?>images/enquete/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="美活アンケートバックナンバー enquête"><!--
			 --></h2>

			<div>
				<nav class="pagination pg-list">
					<ul>
						<li class="nav-prev"><a href="#">Prev</a></li>
						<li class="nav-back"><a href="<?php echo WEBROOT.$this->name?>">一覧へ戻る</a></li>
						<li class="nav-next"><a href="#">Next</a></li>
					</ul>
				</nav><!-- /.pagination -->
			</div>

			<section class="enquete-section">
				<header>
					<h2 class="head-bar ico-arrow"><span class="rsp-xooo"><?php  echo date("Y.m.d",strtotime($Question['Question']['start']))?> </span>第<?php echo $Question['Question']['id']?>回 美容アンケート</h2>
<?php if(isset($message)):?>
            <div class="error-msg container">
                <p><?php echo $message?></p>
            </div><!-- /.error-msg -->
<?php endif;?>

					<p><?php echo $Question['Question']['title']?></p>
				</header>


				<div class="section-body answer">
					<p class="total">総回答数：<span class="txt-c-pk"><?php echo $Question['Question']['total']?></span>件</p>
					<table>
<?php foreach($Question['QuestionValue'] as $Item):?>
						<tr>
							<th><span><?php echo $Item['value']?></span></th>
							<td><span class="bar" style="width:<?php echo $Item['points']?>%">&#8203;</span></td>
							<td><span><span class="txt-c-pk"><?php echo $Item['points']?></span>件</span></td>
						</tr>
<?php endforeach;?>
					</table>

				</div><!-- /.section-body -->
				<!--
				<div class="enquete-txt">
					<p>アンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキストアンケート感想テキスト</p>
				</div>
				-->
			</section>

			<footer>
				<nav class="pagination pg-list">
					<ul>
<?php if ($Pager['s']):?>
      <li class="nav-prev"><a href="?data[p]=<?php echo $Pager['p']-1?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
						<li class="nav-back"><a href="<?php echo WEBROOT.$this->name?>">一覧へ戻る</a></li>
<?php if ($Pager['e']):?>
      <li class="nav-next"><a href="?data[p]=<?php echo $Pager['p']+1?>"><span class="rsp-xxoo">Next</span></a></li>
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

