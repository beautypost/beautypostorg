
<style scoped>
div.page-content {
		padding: 0px 0px 0px !important;
	}
	div.index-row {
		margin-left: 0!important;
		margin-right: 0!important;
	}
</style>


	<div class="sg-top-wrap">
		<div class="col-xs-8 sg-top-left">
			<h1><img src="<?php echo WEBROOT?>assets/img/base/top-catch.png" alt="おすすめのビジネスサービスに投票。あなたが求めるジャンルで比較できる。新しいビジネスサービス比較サイト。"></h1>
			<p class="sg-bz-bgnr"><a href="<?php echo WEBROOT?>pages/about/"><img src="<?php echo WEBROOT?>assets/img/base/faq-bnr.png" alt="はじめての方へ"></a></p>
		</div>
		<div class="col-xs-4 sg-top-right"></div>
	</div>


<!-- PAGE CONTENT BEGINS -->
									<div class="row index-row">
									<div class="col-xs-12">
									<div class="no-border padding-24">

		<?php $i=0;?>
		<?php foreach($Genres as $key => $genre):?>
			<?php if($this->Bizran->checkParent($Genres,$genre['id'])):?>
				<?php continue;?>
			<?php endif;?>
			<?php $i++;?>
			<?php if (($i %3) == 1):?>
				<div class="clearfix"></div>
			<?php endif;?>
		<div class="col-sm-4 col-xs-12">
			<div class="widget-box transparent">
				<div class="widget-header widget-header-middle header-color-blue2 kz-widget-header">
					<h2 class="widget-title kz-index-list-title sg-icon">
						<img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $genre['icon'];?>" alt="<?php echo $genre['name'];?>I">
						<a href="<?php echo WEBROOT.'List/'.$genre['urlname'];?>"><?php echo $genre['name']?></a>
					</h2>
					<img src="<?php echo WEBROOT?>assets/img/base/top_<?php echo $genre['id'];?>.jpg" class="img-responsive" alt="<?php echo $genre['name']?>一覧">
				</div>
				<div class="widget-body">
					<div class="widget-main">
						<?php echo $genre['comment']?>
							<?php if($genre['children']):?>
								<?php $Children = $this->Bizran->childrenlist($genre['id'],$Genres)?>
								<div class="row">
									<?php $ii=0;?>
									<?php foreach($Children as $Child):?>
										<?php if (($ii %2) == 0):?>
											<div class="clearfix"></div>
										<?php endif;?>
										<?php $ii++;?>
											<div class="col-sm-6 col-xs-12 kz-index-child align-left">
												<a href="<?php echo WEBROOT.'List/'.$Child['urlname'];?>/">
													<img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $Child['icon'];?>" alt="<?php echo $Child['name']?>I">
													<?php echo $Child['name']?>
												</a>
											</div>
									<?php endforeach;?>
								</div>
							<?php endif;?>
					</div>
				</div>
			</div>
		</div>		
		<?php endforeach;?>


		<?php if(count($News) > 0): ?>
			<hr>
			<h1 class="header kz-list-title lighter sg-list-title">
				<span class="col-xs-12 col-sm-6 kz-list-title-left">
					<img src="<?php echo WEBROOT?>assets/img/genre/post.png" alt="最新記事">
					ビズラン 最新ニュース
<a href="<?php echo DOMAIN?>/Index/feed/"><i class="ace-icon fa fa-rss-square orange"></i></a>
				</span>
			</h1>

          <?php foreach($News as $Item):?>
              <div class="profile-activity clearfix">
                <div>
                <?php if($Item['Blog']['img']):?>
                <img class="new-tag" src="<?php echo WEBROOT?>assets/img/blog/new-tag.png" alt="">
				<img class="pull-left img-thumbnail kz-top-img" alt="<?php echo $Item['Blog']['title']?>" src="<?php echo WEBROOT.$Item['Blog']['img'];?>">                
	            <?php else:?>
				<img src="<?php echo WEBROOT?>assets/img/base/about03.png" alt="ビズランの想い。応援したいサービスにぜひ投票を！">
				<img class="pull-left img-thumbnail kz-top-img" alt="<?php echo $Item['Blog']['title']?>" src="<?php echo WEBROOT.'assets/img/genre/'.$Genres[$Item['Blog']['genre_id']]['icon']?>">
				<?php endif;?>
                  <?php if (isset($Item['Blog']['link'])):?>
                      <a class="user" href="<?php echo WEBROOT.'List/'.$Genres[$Item['Blog']['genre_id']]['urlname']?>"><?php echo $Item['Blog']['title']?></a>
                  <?php else:?>
                      <a class="user" href="<?php echo WEBROOT.'List/'.$Genres[$Item['Blog']['genre_id']]['urlname'].'/blog/'.$Item['Blog']['id']?>"><?php echo $Item['Blog']['title']?></a>
				  <?php endif;?>

                  <div class="time">
<span class="label btn-info arrowed-right arrowed-in kz-top-label">
<a href="<?php echo WEBROOT?>List/<?php echo $Genres[$Item['Blog']['genre_id']]['urlname']?>">
<?php echo $Genres[$Item['Blog']['genre_id']]['name'];?>
</a>
</span>
<?php $this->Bizran->newsIcon($Item,$Genres);?>
                  
                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                    <?php echo  date("Y/m/d H時i分",strtotime($Item['Blog']['created']));?>
                  </div>
                </div>
              </div>
          <?php endforeach;?>
		<?php endif;?>

</div>
</div>
</div>
