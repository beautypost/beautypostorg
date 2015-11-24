
								<!-- PAGE CONTENT BEGINS -->
<div class="row index-row">



	<div class="col-xs-12">
	<h2 class="kz-header">ジャンル一覧</h2>
	</div>

	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
			<?php $i=0;?>
			<?php foreach($Genres as $key => $genre):?>
				<?php if($this->Bizran->checkParent($Genres,$genre['id'])):?>
					<?php continue;?>
				<?php endif;?>
				<?php $i++;?>
				<?php if (($i %2) == 1):?>
					<div class="clearfix"></div>
				<?php endif;?>
				<div class="col-sm-6 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
							<span>
								<img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $genre['icon'];?>" alt="<?php echo $genre['name'];?>I">
								<a href="<?php echo WEBROOT.'List/'.$genre['urlname'];?>"><?php echo $genre['name']?></a>
								</span>
								<?php if(!$genre['children']):?>
								&nbsp;&nbsp;
								<small>
								<a href="<?php echo WEBROOT.'List/'.$genre['urlname'];?>/hikaku/"><i class="ace-icon glyphicon glyphicon-align-left"></i>比較ポイント</a>
								&nbsp;<a href="<?php echo WEBROOT.'List/'.$genre['urlname'];?>/yougo/"><i class="ace-icon fa fa-book"></i>用語集</a>								
								</small>
							<?php endif;?>
							</h3>
						</div>
						<div class="widget-body">
							<div class="widget-main">
									<?php if($genre['children']):?>
										<?php $Children = $this->Bizran->childrenlist($genre['id'],$Genres)?>
										<div class="row">
											<?php foreach($Children as $Child):?>
													<div class="col-sm-12 col-xs-12 kz-index-child align-left">
													<a href="<?php echo WEBROOT.'List/'.$Child['urlname'].'/';?>">
													<img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $Child['icon'];?>" alt="<?php echo $Child['name']?>I">																														
														<?php echo $Child['name']?>
													</a>
													&nbsp;&nbsp;
								<small>
								<a href="<?php echo WEBROOT.'List/'.$genre['urlname'];?>/hikaku/"><i class="ace-icon glyphicon glyphicon-align-left"></i>比較ポイント</a>
								&nbsp;<a href="<?php echo WEBROOT.'List/'.$genre['urlname'];?>/yougo/"><i class="ace-icon fa fa-book"></i>用語集</a>								
								</small>

													</div>
					<div class="clearfix"></div>
											<?php endforeach;?>
										</div>
									<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
		</div>
	</div>

	<div class="col-xs-12">
	<h2 class="kz-header">サイト概要</h2>
	</div>

	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>Fbconnect/"><i class="ace-icon fa fa-facebook-square"></i>&nbsp;ログインについて</a>
							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>


	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>pages/about"><i class="ace-icon bz-icon-bz-logo"></i>&nbsp;ビズランについて</a>							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>

	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>pages/faq/"><i class="ace-icon glyphicon glyphicon-question-sign"></i>&nbsp;よくある質問</a>
							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>


	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>pages/company"><i class="ace-icon fa fa-flag"></i>&nbsp;運営者情報</a>
							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>


	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>contact"><i class="ace-icon fa fa-envelope-o"></i>&nbsp;お問い合わせ</a>
							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>



	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>pages/privacy"><i class="ace-icon fa fa-info-circle"></i>&nbsp;プライバシーポリシー</a>
							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>

	<div class="col-xs-12">
		<div class="tab-content no-border padding-24">
				<div class="col-sm-12 col-xs-12">
					<div class="widget-box transparent">
						<div class="widget-header widget-header-middle header-color-blue2">
							<h3 class="widget-title kz-index-list-title sg-icon">
<a href="<?php echo WEBROOT?>pages/terms"><i class="ace-icon fa fa-exclamation-circle"></i>&nbsp;利用規約</a>
							</h3>
						</div>
					</div>
				</div>
		</div>
	</div>

</div>


