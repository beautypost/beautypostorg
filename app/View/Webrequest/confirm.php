									<div class="widget-body">
										<div class="widget-main">
											<!-- #section:plugins/fuelux.wizard -->
											<div id="fuelux-wizard" data-target="#step-container">
												<!-- #section:plugins/fuelux.wizard.steps -->
												<ul class="wizard-steps">
													<li data-target="#step1">
														<span class="step">1</span>
														<span class="title">お問い合せ内容入力</span>
													</li>

													<li data-target="#step2" class="active">
														<span class="step">2</span>
														<span class="title">入力内容の確認</span>
													</li>

													<li data-target="#step3">
														<span class="step">3</span>
														<span class="title">メール送信</span>
													</li>

												</ul>

												<!-- /section:plugins/fuelux.wizard.steps -->
											</div>

											<hr />

											<div class="col-xs-12 col-sm-12">
												<div class="col-xs-12 col-sm-4 no-padding-right">お問い合せ内容</div>
												<div class="col-xs-12 col-sm-8">
													<div class="clearfix"><?php echo $Contact['Contact']['titleData'][$Contact['Contact']['title']]?></div>
												</div>
											</div>

											<div class="col-xs-12 col-sm-12">
												<div class="col-xs-12 col-sm-3">お名前</div>
												<div class="col-xs-12 col-sm-9">
													<div class="clearfix"><?php echo $Contact['Contact']['onamae']?></div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12">
												<div class="col-xs-12 col-sm-3">ご返信用メールアドレス</div>
												<div class="col-xs-12 col-sm-9">
													<div class="clearfix"><?php echo $Contact['Contact']['email']?></div>
												</div>
											</div>														
											<div class="col-xs-12 col-sm-12">
												<div class="col-xs-12 col-sm-3">お問い合せ内容</div>
												<div class="col-xs-12 col-sm-9">
													<div class="clearfix"><?php echo $Contact['Contact']['comment']?></div>
												</div>
											</div>



											<!-- /section:plugins/fuelux.wizard.container -->
											<hr />

											<div class="wizard-actions">
														<div class="col-xs-12 col-sm-12">
															<div class="col-xs-12 col-sm-6">											
																<!-- #section:plugins/fuelux.wizard.buttons -->
																<form method="post" action="<?php echo WEBROOT?>contact/index">												
																<button class="btn btn-gray btn-before" data-last="Finish" type="submit">
																	<i class="ace-icon fa fa-arrow-left"></i>入力画面へ戻る
																</button>
																<input type="hidden" name="data[Contact]" value="<?php echo base64_encode(serialize($Contact['Contact'])) ?>">
																</form>
															</div>
															<div class="col-xs-12 col-sm-6 no-padding-left">											
																<form method="post" action="<?php echo WEBROOT?>contact/send">												
																<button class="btn btn-success btn-next" data-last="Finish" type="submit">
																	お問い合せ内容送信<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																</button>
																<input type="hidden" name="data[Contact]" value="<?php echo base64_encode(serialize($Contact['Contact'])) ?>">
																</form>
															</div>
														</div>
												<!-- /section:plugins/fuelux.wizard.buttons -->
											</div>

											<!-- /section:plugins/fuelux.wizard -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
