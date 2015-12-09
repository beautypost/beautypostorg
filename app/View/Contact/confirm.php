<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li>よくある質問・お問い合わせ</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="head-bar ico-arrow">よくある質問・お問い合わせ</h2>

			<section id="user-form">
				<h2 class="head-std ico-arrow">お問い合わせ内容確認</h2>
				<div class="section-body">

					<form action="<?php echo WEBROOT.$this->name?>" class="contact-form" method="post">
						<ul class="formlist">
							<li class="required">
								<dl>
									<dt><label for="user-subject" class="inner">お問い合わせの種類</label></dt>
									<dd>
										<?php echo $this->Useful->selectValue($title,$data['Contact']['title'])?>
									</dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-realname" class="inner">お名前</label></dt>
									<dd><?php echo $data['Contact']['name']?></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-mail" class="inner">メールアドレス</label></dt>
									<dd><?php echo $data['Contact']['email']?></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-message" class="inner">お問い合わせ内容</label></dt>
									<dd><?php echo $data['Contact']['comment']?></dd>
								</dl>
							</li>
						</ul><!-- /.formlist -->
					</form>

					<div class="form-foot container">
						<p>上記お問い合わせフォームよりご送信いただく、お客様の個人情報、およびご質問の内容は、当社の個人情報の取り扱いに従い、厳重に取り扱います。詳しくは「個人情報について」のページをご覧ください。<br>
						お問い合わせフォームをご使用の際は、個人情報保護方針の内容にご了承の上で送信いただくようお願いいたします。</p>
						<div class="form-nav-confirm">
							<form method="post" action="<?php echo WEBROOT.$this->name?>/send" class="form-nav-next">
								<button class="button btn-success btn-vpk btn-next" data-last="Finish" type="submit">
									この内容で送信する <i class="fa fa-angle-right">&#8203;</i>
								</button>
								<input type="hidden" name="data[Contact]" value="<?php echo base64_encode(serialize($data['Contact'])) ?>">
							</form>
							
							<form method="post" action="<?php echo WEBROOT.$this->name?>/index" class="form-nav-back">
								<button class="button btn-nb btn-before" data-last="Finish" type="submit">
									<i class="fa fa-angle-left">&#8203;</i> 入力画面へ戻り修正する
								</button>
								<input type="hidden" name="data[Contact]" value="<?php echo base64_encode(serialize($data['Contact'])) ?>">
								<input type="hidden" name="back" value="1">
							</form>
						</div><!-- /.form-nav-confirm -->
					</div><!-- /.form-foot -->

				</div>
			</section><!-- /#user-form -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->




