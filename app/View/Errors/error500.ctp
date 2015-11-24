

								<!-- #section:pages/error -->
								<div class="error-container">
									<div class="well">
										<h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="ace-icon fa fa-sitemap"></i>
												404
											</span>
											Page Not Found
										</h1>
										<hr />
										<h3 class="lighter smaller">お探しのページは見つかりませんでした。</h3>
<p class="lighter smaller">										
<?php printf(
		__d('cake', 'The requested address %s was not found on this server.'),
		"<strong>'{$url}'</strong>"
	); ?>
</p>
<br/>

										<div>

											<div class="space"></div>

											<ul class="list-unstyled spaced inline bigger-110 margin-15">
												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													入力いただいたURLは正しいですか？
													<br>
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													<a href="<?php echo WEBROOT?>faq/">FAQ</a>をご確認ください。
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													現在の状況をお問い合わせください。&nbsp;<a href="<?php echo WEBROOT?>contact">お問い合わせフォーム</a>
												</li>
											</ul>
										</div>

										<hr />
										<div class="space"></div>

										<div class="center">
											<a href="javascript:history.back()" class="btn btn-grey">
												<i class="ace-icon fa fa-arrow-left"></i>
												一つ前のページに戻る
											</a>

											<a href="<?php echo WEBROOT?>" class="btn btn-primary">
												<i class="ace-icon fa fa-home"></i>
												TOPページヘ
											</a>
										</div>
									</div>
								</div>

								<!-- /section:pages/error -->

