            <div>

              <h1 class="kz-header">
                <i class="menu-icon fa fa-envelope-o"></i>&nbsp;お問い合わせ
              </h1>
              <p>
                  「<a href="<?php echo WEBROOT?>pages/faq">よくあるご質問</a>」でもご不明な点がある場合には、以下のお問い合わせフォームよりご連絡ください。

              </p>
            </div><!-- /.page-header -->   

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
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
									<hr />

									<div class="row">
										<div class="col-xs-12 form-horizontal">

														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="title">お問い合せ内容</label>
															<div class="col-xs-12 col-sm-8 kz-val">
																<?php echo $Contact['Contact']['titleData'][$Contact['Contact']['title']]?>
															</div>
														</div>

														<div class="space-2"></div>

														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="ContactOnamae">お名前</label>

															<div class="col-xs-12 col-sm-8 kz-val">
															<?php echo $Contact['Contact']['onamae']?>
															</div>
														</div>
														<div class="space-2"></div>

														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="ContactEmail">ご返信用メールアドレス</label>
															<div class="col-xs-12 col-sm-4 kz-val">
															<?php echo $Contact['Contact']['email']?>
															</div>
														</div>


														<div class="space-2"></div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="comment">お問い合せ内容</label>
															<div class="col-xs-12 col-sm-4 kz-val">
															<?php echo $Contact['Contact']['comment']?>
															</div>
														</div>
										</div>
									</div>

<hr>
													<div class="clearfix">
														<form method="post" action="<?php echo WEBROOT?>contact/index">
															<div class="col-xs-12 col-lg-6 align-right">
																<span>												
																	<button class="btn btn-gray btn-before" data-last="Finish" type="submit">
																		<i class="ace-icon fa fa-arrow-left"></i>入力画面へ戻る
																	</button>
																	<input type="hidden" name="data[Contact]" value="<?php echo base64_encode(serialize($Contact['Contact'])) ?>">
																</span>
															</div>
														</form>
														<form method="post" action="<?php echo WEBROOT?>contact/send">												
															<div class="col-xs-12 col-lg-6">
																<span>												
																	<button class="btn btn-success btn-next" data-last="Finish" type="submit">
																		お問い合せ内容送信<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
																	</button>
																	<input type="hidden" name="data[Contact]" value="<?php echo base64_encode(serialize($Contact['Contact'])) ?>">
																</span>
															</div>
														</form>												
													</div>



