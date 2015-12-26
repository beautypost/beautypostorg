
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
				 --><img src="<?php echo WEBROOT?>images/mailmagazine/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="メルマガバックナンバー mailmagazine"><!--
				 --><img src="<?php echo WEBROOT?>images/mailmagazine/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="メルマガバックナンバー mailmagazine"><!--
			 --></h2>

			<p class="lead">Beauty Post メンバーに登録いただいた皆様に、美容に役立つ美容ニュースをメルマガでお送りしております。<br class="rsp-xxxo">過去のバックナンバーをご覧になられたい方は、ログインください。</p>

			<ul class="backnumber-list container">
<?php foreach($Mailmagazine as $Item):?>
                <li>
                    <dl>
                        <dt><?php echo $this->Useful->setdate($Item['Mailmagazine']['send_date'],'Y/m/d')?><span class="vol">第<?php echo $Item['Mailmagazine']['number']?>回</span></dt>
                        <dd>
                            <span class="question">
                            <a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $Item['Mailmagazine']['id']?>">
                            <?php echo $Item['Mailmagazine']['title']?>
                        </a>
                            </span>
                        </dd>
                    </dl>
                </li>
<?php endforeach?>

			</ul><!-- /.backnumber-list -->

			<footer>
				<nav class="pagination pg-list">
                        <ul>

<?php if ($Pager['s']):?>
      <li class="nav-prev"><a href="?data[p]=<?php echo $Pager['p']-1?>"><span class="rsp-xxoo">Prev</span></a></li>
<?php endif;?>
                                <ol>
  <?php foreach ($Pager['pager'] as $k =>$v):?>
    <?php if ($Pager['p'] == $v-1):?>
      <li class="nav-now"><a href="?data[p]=<?php echo $v-1?>"><?php echo $v;?></a></li>
    <?php else:?>
      <li><a href="?data[p]=<?php echo $v-1?>"><?php echo $v?></a></li>
    <?php endif;?>
  <?php endforeach;?>
                                </ol>
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
