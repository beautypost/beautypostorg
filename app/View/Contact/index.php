<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li>よくある質問・お問い合わせ</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="head-bar ico-arrow">よくある質問・お問い合わせ</h2>
			<section id="faq">
				<h2 class="head-std ico-arrow">よくある質問</h2>
				<div class="section-body">
					<ul class="faq-list">
						<li>
							<dl class="faq-entry">
								<dt class="faq-q">BeautyPostメンバーに登録したのですが、退会はできますか？</dt>
								<dd class="faq-a">お問い合せフォームより、ご登録いただいているメールアドレスとニックネームをお知らせください。<br>退会の手続きをさせて頂きます。</dd>
							</dl>
						</li>
						<li>
							<dl class="faq-entry">
								<dt class="faq-q">今届いている美容ニュースの配信先の変更（停止）はできますか？</dt>
								<dd class="faq-a">ログインいただき、マイページのメールアドレス変更よりお手続き頂けます。<br>
								停止についても同様にマイページよりお手続きください。</dd>
							</dl>
						</li>
						<li>
							<dl class="faq-entry">
								<dt class="faq-q">モニターに応募するにはどうしたらいいですか？</dt>
								<dd class="faq-a">モニター応募については、メンバーの方のマイページとBeauty Postメールにてお知らせしています。<br>
								最新情報をいち早く確認されたい方はBeauty Postメールのご登録をオススメしております。</dd>
							</dl>
						</li>
					</ul>
				</div>
			</section><!-- /faq -->

			<section id="user-form">
				<h2 class="head-std ico-arrow">お問い合わせ</h2>
				<div class="section-body">

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

					<form action="<?php echo WEBROOT.$this->name?>" class="contact-form" method="post">
						<ul class="formlist">
							<li class="required">
								<dl>
									<dt><label for="user-subject" class="inner">お問い合わせの種類</label></dt>
									<dd>
										<select name="data[title]" id="user-subject" required>

										<?php echo $this->Useful->option($title,$data['Contact']['title'])?>
										</select>
									</dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-realname" class="inner">お名前</label></dt>
									<dd><input name="data[name]" id="user-realname" type="text" value="<?php echo $data['Contact']['name']?>" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-mail" class="inner">メールアドレス</label></dt>
									<dd><input name="data[email]" id="user-mail" type="email" value="<?php echo $data['Contact']['email']?>" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-mail-confirm" class="inner">メールアドレス（確認）</label></dt>
									<dd><input name="data[email2]" id="user-mail-confirm" type="email" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-message" class="inner">お問い合わせ内容</label></dt>
									<dd><textarea name="data[comment]" id="user-message" cols="30" rows="10"  required><?php echo $data['Contact']['comment']?></textarea></dd>
								</dl>
							</li>
						</ul><!-- /.formlist -->

						<div class="form-foot container">
							<p>上記お問い合わせフォームよりご送信いただく、お客様の個人情報、およびご質問の内容は、当社の個人情報の取り扱いに従い、厳重に取り扱います。詳しくは「<a class="ullink" href="<?php echo WEBROOT; ?>pages/privacy/" target="_blank">プライバシーポリシー</a>」のページをご覧ください。<br>
							お問い合わせフォームをご使用の際は、プライバシーポリシーの内容にご了承の上で送信いただくようお願いいたします。</p>
							<div class="form-nav">
								<button class="button btn-vpk">
									入力内容確認画面へ <i class="fa fa-angle-right">&#8203;</i>
								</button>
							</div><!-- /.form-nav -->
						</div><!-- /.form-foot -->
					</form>
				</div>
			</section><!-- /#user-form -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
			<?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->