
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li>パスワードの再設定</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<section id="signup-form">
				<h2 class="head-bar ico-std">パスワードの再設定</h2>
				<div class="section-body">
				<?php echo $errormessages?>
					<p>パスワードを再設定してください。<br>新しいパスワードを設定してください。今までのパスワードは無効となります。</p>
					<form action="<?php echo WEBROOT.$this->name?>/pwinput/" method="post">
						<ul class="formlist">
							<li>
								<dl>
									<dt>登録メールアドレス</dt>
									<dd><input type="mail" value="<?php echo $Snsuser['Snsuser']['email']?>" disabled></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-pass" class="inner">パスワード</label></dt>
									<dd><input name="data[password]" id="user-pass" type="password" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-pass-confirm" class="inner">パスワード（確認）</label></dt>
									<dd><input name="data[password2]" id="user-pass-confirm" type="password" required></dd>
								</dl>
							</li>
						</ul>

						<footer>
							<button type="submit" class="button btn-pk">パスワードの再設定</button>
						</footer>
						<input type="hidden" name="data[beautyid]" value="<?php echo $Snsuser['Snsuser']['beautyid']?>">
					</form>
				</div>
			</section>
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

