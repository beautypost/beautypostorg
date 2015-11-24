<div class="page-content-area">
<div class="page-header">
<h1><?php echo $Item['Item']['name'];?></h1>
</div>
<div>
<p class="lead">
<?php echo $Item['Item']['catchcopy'];?>
</p>
</div>
													<div class="row">
														<div class="col-xs-12 col-sm-3 center">
															<span class="profile-picture">
																<img class="editable img-responsive" alt="<?php echo $Item['Item']['name'];?>" id="avatar2" src="<?php echo $Item['Item']['pic_logo']?>" />
															</span>

															<div class="space space-4"></div>

															<a href="http://<?php echo $Item['Item']['url']?>" class="btn btn-sm btn-block kz-btn-website">
																<i class="ace-icon glyphicon glyphicon-home bigger-120"></i>
																<span class="bigger-110">WEBサイト</span>
															</a>
															<a href="<?php echo $Item['Item']['mailaddress']?>" class="btn btn-sm btn-block kz-btn-contact">
																<i class="ace-icon fa fa-envelope bigger-120"></i>
																<span class="bigger-110">お問い合わせ</span>
															</a>
															<a href="<?php echo $Item['Item']['url_blog']?>" class="btn btn-sm btn-block kz-btn-blog">
																<i class="ace-icon fa fa-pencil bigger-120"></i>
																<span class="bigger-110">ブログ</span>
															</a>


															<a href="<?php echo $Item['Item']['mailaddress']?>" class="btn btn-sm btn-block kz-btn-facebook">
																<i class="ace-icon fa fa-facebook-square bigger-120"></i>
																<span class="bigger-110">Facebook</span>
															</a>

															<a href="<?php echo $Item['Item']['mailaddress']?>" class="btn btn-sm btn-block kz-btn-twitter">
																<i class="ace-icon fa fa-twitter-square bigger-120"></i>
																<span class="bigger-110">Twitter</span>
															</a>


															<div class="space space-4"></div>

									<div class="infobox-container">
										<!-- #section:pages/dashboard.infobox -->
										<div class="infobox infobox-green kz-infobox">
											<div class="infobox-icon">
												<i class="ace-icon glyphicon glyphicon-signal"></i>
											</div>

											<div class="infobox-data">
												<span class="infobox-data-number">32</span>
												<div class="infobox-content">2 reviews</div>
											</div>

											<!-- #section:pages/dashboard.infobox.stat -->
											<div class="stat stat-success">8%</div>

											<!-- /section:pages/dashboard.infobox.stat -->
										</div>
</div>

															<div class="space space-4"></div>
																<form method="post" action="<?php echo WEBROOT?>item/">
																<input type="hidden" name="data[itemID]" value="<?php echo $Item['Item']['id']?>">
																<div class="btn-group btn-corner">
																				<button class="btn kz-btn" name="fav" type="submit" value="5">
																				<i class="ace-icon glyphicon glyphicon-star bigger-10"></i>
																				</button>

																				<button class="btn kz-btn">
																				<i class="ace-icon glyphicon glyphicon-star"></i>
																				</button>
																				<button class="btn kz-btn">
																				<i class="ace-icon glyphicon glyphicon-star"></i>
																				</button>
																				<button class="btn kz-btn">
																				<i class="ace-icon glyphicon glyphicon-star"></i>
																				</button>
																				<button class="btn kz-btn">
																				<i class="ace-icon glyphicon glyphicon-star"></i>
																				</button>

																</div>
																</form>


														</div><!-- /.col -->

														<div class="col-xs-12 col-sm-9">

															<div class="profile-user-info">
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">会社名</div>
  																	<div class="profile-info-value"><span><?php  echo $Item['Item']['name'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">会社名(かな)</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['name_kana'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">本社所在地</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['zip'];?><?php echo $Item['Item']['address'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">電話番号</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['tel'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">FAX</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['fax'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">代表取締役</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['president'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">資本金</div>
  																	<div class="profile-info-value"><span><?php echo number_format($Item['Item']['capital']);?>円</span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">従業員数</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['employee'];?>名</span></div>
																</div>
																
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">WEBサイト</div>
  																	<div class="profile-info-value"><span><a href="<?php echo $Item['Item']['url'];?>"><?php echo $Item['Item']['url'];?></a></span></div>
																</div>

																<div class="profile-info-row">
																	<div class="kz-profile-info-name">サービス紹介URL</div>
  																	<div class="profile-info-value"><span><a href="<?php echo $Item['Item']['url_service'];?>"><?php echo $Item['Item']['url_service'];?></a></span></div>
																</div>
																<!--
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">サービスデモURL</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['url_demo'];?></span></div>
																</div>
																<div class="profile-info-row">
																	<div class="kz-profile-info-name">サービスデモYouTube</div>
  																	<div class="profile-info-value"><span><?php echo $Item['Item']['url_youtube'];?></span></div>
																</div>
-->
															</div>
														</div><!-- /.col -->
													</div><!-- /.row -->

													<div class="space-20"></div>

													<div class="row">
														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-check-square-o bigger-110"></i>
																		詳細情報
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main">
																		<?php echo nl2br($Item['Item']['comment'])?>
																	</div>
																</div>
															</div>
														</div>

														<div class="col-xs-12 col-sm-6">
															<div class="widget-box transparent">
																<div class="widget-header widget-header-small header-color-blue2">
																	<h4 class="widget-title smaller">
																		<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
																		アクセス情報
																	</h4>
																</div>

																<div class="widget-body">
																	<div class="widget-main padding-16">
																		<div class="clearfix">
																				<button class="btn btn-app btn-danger btn-sm">
																				<i class="ace-icon fa fa-trash-o bigger-200"></i>
																				Delete
																				</button>
																				<button class="btn btn-app btn-danger btn-sm">
																				<i class="ace-icon fa fa-trash-o bigger-200"></i>
																				Delete
																				</button>
																				<button class="btn btn-app btn-danger btn-sm">
																				<i class="ace-icon fa fa-trash-o bigger-200"></i>
																				Delete
																				</button>
																				<button class="btn btn-app btn-danger btn-sm">
																				<i class="ace-icon fa fa-trash-o bigger-200"></i>
																				Delete
																				</button>
																				<button class="btn btn-app btn-danger btn-sm">
																				<i class="ace-icon fa fa-trash-o bigger-200"></i>
																				Delete
																				</button>
																				<button class="btn btn-app btn-danger btn-sm">
																				<i class="ace-icon fa fa-trash-o bigger-200"></i>
																				Delete
																				</button>																				
																		</div>

																		<div class="hr hr-16"></div>

																	</div>
																</div>
															</div>
														</div>
													</div>
												</div><!-- /#home -->

