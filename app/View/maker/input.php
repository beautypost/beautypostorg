
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li><a href="<?php echo WEBROOT?>">美容機器メーカーの方へ</a></li>
			<li>商品掲載に関するお問い合わせ</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="head-bar ico-arrow">商品掲載に関するお問い合わせ</h2>

			<div id="user-form">
				<p>Beauty Pos tに御社商品を掲載してみませんか？<br>
				ご興味のあるご担当者の方は、お手数ですが、まずは下記フォームにて必要事項をお送り下さい。</p>
				<div class="section-body">
					<form action="<?php echo WEBROOT.$this->name?>/input/" class="Contact-form h-adr" method="post">
						<span class="p-country-name" style="display:none;">Japan</span>
						<ul class="formlist">
							<li class="required">
								<dl>
									<dt><label for="maker-company" class="inner">御社名</label></dt>
									<dd><input name="data[company]" id="maker-company" type="text" value="<?php echo $data['Maker']['company']?>" required></dd>
								</dl>
							</li>
							<li class="optional">
								<dl>
									<dt><label for="maker-group" class="inner">部署名</label></dt>
									<dd><input name="data[group]" id="maker-group" type="text" value="<?php echo $data['Maker']['group']?>"></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-name" class="inner">ご担当者名</label></dt>
									<dd><input name="data[name]" id="maker-name" type="text" value="<?php echo $data['Maker']['name']?>" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-mail" class="inner">メールアドレス</label></dt>
									<dd><input name="data[email]" id="maker-mail" type="email" value="<?php echo $data['Maker']['email']?>" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-mail-confirm" class="inner">メールアドレス（確認）</label></dt>
									<dd><input name="data[email2]" id="maker-mail-confirm" type="email" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-tel" class="inner">電話番号</label></dt>
									<dd><input name="data[tel]" id="maker-tel" type="text" value="<?php echo $data['Maker']['tel']?>" required></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><span class="inner">住所</span></dt>
									<dd>
										<input type="text" name="data[zip1]" id="maker-zip1" class="formparts-sizeZip p-postal-code" maxlength="3" value="<?php echo $data['Maker']['zip1']?>" required> －
										<input type="text" name="data[zip2]" id="maker-zip2" class="formparts-sizeZip p-postal-code" maxlength="4" value="<?php echo $data['Maker']['zip2']?>" required><br>
										<input type="text" name="data[address]" id="maker-address" class="formparts-mv p-region p-locality p-street-address p-extended-address" value="<?php echo $data['Maker']['address']?>" required>
									</dd>
								</dl>
							</li>
							<li class="optional">
								<dl>
									<dt><label for="maker-website" class="inner">会社ホームページ</label></dt>
									<dd><input name="data[website]" id="maker-website" type="text" value="<?php echo $data['Maker']['website']?>"></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-message" class="inner">お問い合わせ内容</label></dt>
									<dd><textarea name="data[message]" id="user-message" cols="30" rows="10" required><?php echo $data['Maker']['message']?></textarea></dd>
								</dl>
							</li>
						</ul><!-- /.formlist -->

						<div class="form-foot container">
							<p>上記お問い合わせフォームよりご送信いただく、お客様の個人情報、およびご質問の内容は、当社の個人情報の取り扱いに従い、厳重に取り扱います。詳しくは「個人情報について」のページをご覧ください。<br>
							お問い合わせフォームをご使用の際は、個人情報保護方針の内容にご了承の上で送信いただくようお願いいたします。</p>
							<div class="form-nav">
								<button class="button btn-vpk">送信</button>
							</div>
						</div>
					</form>
				</div>
			</div><!-- /#user-form -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

