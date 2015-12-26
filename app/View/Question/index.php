
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

			<p class="lead">Beauty Postで過去に行った 美活アンケートがご覧いただけます。
            <br class="rsp-xxoo">過去のバックナンバーをご覧になられたい方は、ログインください。</p>

			<ul class="backnumber-list container">
            <?php foreach($Question as $Item):?>
            				<li>
            					<dl>
            						<dt><?php echo $this->useful->setdate($Item['Question']['start'],'Y年m月d日')?><span class="vol">第<?php echo $Item['Question']['number']?>回</span></dt>
            						<dd>
            							<span class="question">
                                        <a href="<?php echo WEBROOT.$this->name?>/detail/<?php echo $Item['Question']['id']?>">
                                            <?php echo $Item['Question']['title']?>
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
                  <li class="nav-prev"><a href="<?php echo WEBROOT.$this->name?>/?p=<?php echo $Pager['p']-1?>"><span class="rsp-xxoo">Prev</span></a></li>
            <?php endif;?>
                                            <ol>
              <?php foreach ($Pager['pager'] as $k =>$v):?>
                <?php if ($Pager['p'] == $v-1):?>
                  <li class="nav-now"><a href="<?php echo WEBROOT.$this->name?>/?p=<?php echo $v-1?>"><?php echo $v;?></a></li>
                <?php else:?>
                  <li><a href="<?php echo WEBROOT.$this->name?>/?p=<?php echo $v-1?>"><?php echo $v?></a></li>
                <?php endif;?>
              <?php endforeach;?>
                                            </ol>
            <?php if ($Pager['e']):?>
                  <li class="nav-next"><a href="<?php echo WEBROOT.$this->name?>/?p=<?php echo $Pager['p']+1?>"><span class="rsp-xxoo">Next</span></a></li>
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

