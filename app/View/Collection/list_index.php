
								<!-- PAGE CONTENT BEGINS -->
<div class="row index-row">

	<div class="col-xs-12">
	<h2 class="kz-header"><?php echo $Genres[$genreID]['name']?>一覧</h2>
	</div>
	<div class="col-sm-12">
	<?php echo $Genres[$genreID]['comment']?>
	</div>
										<?php $Children = $this->Bizran->childrenlist($genreID,$Genres)?>
											<?php foreach($Children as $Child):?>
													<div class="col-sm-12 col-xs-12 kz-index-child align-left spacer20">
													<a href="<?php echo WEBROOT.'List/'.$Child['urlname'].'/';?>">
													<img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $Child['icon'];?>" alt="<?php echo $Child['name']?>I">																														
														<?php echo $Child['name']?>
													</a><br>
													<?php echo $Child['comment']?>
													</div>
<?php endforeach;?>