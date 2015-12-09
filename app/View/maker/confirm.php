
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
					<form action="<?php echo WEBROOT.$this->name?>/input/" class="contact-form h-adr" method="post">
						<span class="p-country-name" style="display:none;">Japan</span>
						<ul class="formlist">
							<li class="required">
								<dl>
									<dt><label for="maker-company" class="inner">御社名</label></dt>
									<dd><?php echo $data['Maker']['company']?></dd>
								</dl>
							</li>
							<li class="optional">
								<dl>
									<dt><label for="maker-group" class="inner">部署名</label></dt>
									<dd><?php echo $data['Maker']['group']?></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-name" class="inner">ご担当者名</label></dt>
									<dd><?php echo $data['Maker']['name']?>></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-mail" class="inner">メールアドレス</label></dt>
									<dd><?php echo $data['Maker']['email']?></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="maker-tel" class="inner">電話番号</label></dt>
									<dd><?php echo $data['Maker']['tel']?></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><span class="inner">住所</span></dt>
									<dd>
										<?php echo $data['Maker']['zip1']?> -
										<?php echo $data['Maker']['zip2']?><br>
										<?php echo $data['Maker']['address']?>
									</dd>
								</dl>
							</li>
							<li class="optional">
								<dl>
									<dt><label for="maker-website" class="inner">会社ホームページ</label></dt>
									<dd><?php echo $data['Maker']['website']?></dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-message" class="inner">お問い合わせ内容</label></dt>
									<dd><?php echo $data['Maker']['message']?></dd>
								</dl>
							</li>
						</ul><!-- /.formlist -->
					</form>

					<div class="form-foot container">
						<p>上記お問い合わせフォームよりご送信いただく、お客様の個人情報、およびご質問の内容は、当社の個人情報の取り扱いに従い、厳重に取り扱います。詳しくは「個人情報について」のページをご覧ください。<br>
						お問い合わせフォームをご使用の際は、個人情報保護方針の内容にご了承の上で送信いただくようお願いいたします。</p>
						<div class="form-nav-confirm">
							<form method="post" action="<?php echo WEBROOT.$this->name?>/send" class="form-nav-next">
								<button class="button btn-success btn-next btn-vpk" data-last="Finish" type="submit">
									この内容で送信する <i class="fa fa-angle-right">&#8203;</i>
								</button>
								<input type="hidden" name="data[Maker]" value="<?php echo base64_encode(serialize($data['Maker'])) ?>">
							</form>
							
							<form method="post" action="<?php echo WEBROOT.$this->name?>/input" class="form-nav-back">
								<button class="button btn-nb btn-before" data-last="Finish" type="submit">
									<i class="fa fa-angle-left">&#8203;</i> 入力画面へ戻り修正する
								</button>
								<input type="hidden" name="data[Maker]" value="<?php echo base64_encode(serialize($data['Maker'])) ?>">
								<input type="hidden" name="back" value="1">
							</form>
						</div><!-- /.form-nav-confirm -->
					</div><!-- /.form-foot -->
					
				</div>
			</div><!-- /#user-form -->
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->

