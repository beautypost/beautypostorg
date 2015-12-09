
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="../">Beauty Post</a></li>
			<li>パスワードの再設定</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<section id="signup-form">
				<h2 class="head-bar ico-arrow">パスワードの再設定</h2>
				<div class="section-body">
					<p class="mb16">ご登録のメールアドレスと生年月日を入力してください。<br>
					パスワードを再設定するためのURLをお送りします。</p>
					<p class="kome mb16">メールアドレスが不明の場合は、<a href="../contact/">こちら</a>からお問い合わせください。</p>

					<!-- ▼エラー発生時のみ出力 -->
					<p class="system-msg mb16">メールアドレスまたは、生年月日が異なります。</p>
					<!-- ▲エラー発生時のみ出力 -->

					<form action="<?php echo WEBROOT.$this->name?>" class="contact-form" method="post">
						<ul class="formlist">
							<li class="required">
								<dl>
									<dt><label for="user-mail" class="inner">登録メールアドレス</label></dt>
									<dd><input name="data[email]" id="user-mail" type="email" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
										<dt><span class="inner">生年月日</span></dt>
										<dd>
										<select name="data[year]" tabindex="1" style="width:80px">
												<?php echo $this->Useful->option($Year['year'],$data['Fpassword']['year'])?>
										</select>
										<span class="unit">年</span>
										<select name="data[month]" tabindex="1" style="width:80px">
												<?php echo $this->Useful->option($Month['month'],$data['Fpassword']['month'])?>
										</select>
										<span class="unit">月</span>
										<select name="data[day]" tabindex="1" style="width:80px">
												<?php echo $this->Useful->option($Day['day'],$data['Fpassword']['day'])?>
										</select>
										<span class="unit">日</span>
										</dd>
								</dl>
							</li>
						</ul>

						<footer class="form-nav">
							<button type="submit" class="button btn-pk">送信する</button>
						</footer>
					</form>
				</div>
			</section>
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
				<?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

