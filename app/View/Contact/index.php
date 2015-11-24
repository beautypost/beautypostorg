


            <div>
              <h1 class="kz-header">
                <i class="menu-icon fa fa-envelope-o"></i>&nbsp;お問い合わせ
              </h1>
              <p>
                  「<a href="<?php echo WEBROOT?>pages/faq">よくあるご質問</a>」でもご不明な点がある場合には、以下のお問い合わせフォームよりご連絡ください。

              </p>
            </div><!-- /.page-header -->            						

<?php
if (isset($validationErrors) && is_array($validationErrors)) {
    foreach ($validationErrors as $key => $values) {
        foreach ($values as $value) {
            echo '<p class="error">'.$value.'</p>';
        }
        // echo $this->Form->error('Model.'.$key);
    }
}
?>

									<div class="widget-body">
										<div class="widget-main">
											<!-- #section:plugins/fuelux.wizard -->
											<div id="fuelux-wizard" data-target="#step-container">
												<!-- #section:plugins/fuelux.wizard.steps -->
												<ul class="wizard-steps">
													<li data-target="#step1" class="active">
														<span class="step">1</span>
														<span class="title">お問い合せ内容入力</span>
													</li>

													<li data-target="#step2">
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
										<div class="col-xs-12">
											<form class="form-horizontal" id="contactIndexForm" method="post" action="<?php echo WEBROOT?>contact/">
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="title">お問い合せ内容</label>
															<div class="col-xs-12 col-sm-8">
																<div class="clearfix">
																	<select id="title" name="data[Contact][title]" tabindex="1">
																	<?php echo $this->Useful->option('data[Contact][title]',$Contact['Contact']['titleData'],$Contact['Contact']['title'])?>
																	</select>
																</div>
															</div>
														</div>

														<div class="space-2"></div>

														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="ContactOnamae">お名前</label>

															<div class="col-xs-12 col-sm-4">
																<div class="clearfix">
																<input name="data[Contact][onamae]" type="text" value="<?php echo $Contact['Contact']['onamae']?>" id="ContactOnamae" required="required" class="form-control" aria-required="true" />
																<?php echo isset($errormessages['onamae'][0])?$errormessages['onamae'][0]:''?>
																</div>
															</div>
														</div>
														<div class="space-2"></div>

														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="ContactEmail">ご返信用メールアドレス</label>
															<div class="col-xs-12 col-sm-4">
																<div class="clearfix">
																<input name="data[Contact][email]" type="email" value="<?php echo $Contact['Contact']['email']?>" id="ContactEmail" required="required" class="form-control">
																<?php echo isset($errormessages['email'][0])?$errormessages['email'][0]:''?>
																</div>
															</div>
														</div>


														<div class="space-2"></div>
														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="comment">お問い合せ内容</label>
															<div class="col-xs-12 col-sm-4">
																<div class="clearfix">
																	<textarea class="form-control" name="data[Contact][comment]" id="comment" rows="6" required="required" tabindex="2" accesskey="2" placeholder="ご意見・ご感想をご記入ください"><?php echo $Contact['Contact']['comment']?></textarea>
																	<?php echo isset($errormessages['comment'][0])?$errormessages['comment'][0]:''?>
																</div>
															</div>
														</div>


											<!-- /section:plugins/fuelux.wizard.container -->

													<div class="clearfix form-actions">
														<!-- #section:plugins/fuelux.wizard.buttons -->
														<div class="center">
															<button class="btn btn-success btn-next" data-last="Finish" tabindex="9" accesskey="9">
																確認画面へ
																<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
															</button>
														</div>
														<!-- /section:plugins/fuelux.wizard.buttons -->
													</div>
													<!-- /section:plugins/fuelux.wizard -->
													</form>																							
										</div>

									</div>

