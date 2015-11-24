									

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
											<hr />

											<form class="form-horizontal" id="contactIndexForm" method="post" action="<?php echo WEBROOT?>Webrequest/">


														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="onamae">ジャンル</label>
															<div class="col-xs-12 col-sm-4">
																<div class="clearfix">
<?php echo $Webrequest['Webrequest']['genreID']?>
																</div>
															</div>
														</div>

														<div class="form-group">
															<label class="control-label col-xs-12 col-sm-4 no-padding-right" for="onamae">URL</label>
															<div class="col-xs-12 col-sm-4">
																<div class="clearfix">
<input name="data[Webrequest][url]" type="text" value="" id="ContactOnamae" required="required" class="form-control" />
<?php echo isset($errormessages['url'][0])?$errormessages['url'][0]:''?>
																</div>
															</div>
														</div>


											<!-- /section:plugins/fuelux.wizard.container -->
											<hr />
											<div class="wizard-actions">
												<!-- #section:plugins/fuelux.wizard.buttons -->

												<button class="btn btn-success btn-next" data-last="Finish">
													確認画面へ
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>

												<!-- /section:plugins/fuelux.wizard.buttons -->
											</div>

											<!-- /section:plugins/fuelux.wizard -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
<input type="hidden" name="data[Webrequest][genreID]" value="<?php echo $Webrequest['Webrequest']['genreID']?>">									
</form>
