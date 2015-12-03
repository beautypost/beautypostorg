
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="../">Beauty Post</a></li>
			<li>パスワードの再設定</li>
		</ol><!-- /#breadcrumb -->

		<div id="main-area" class="layout-main layout-l">
			<h2 class="head-bar ico-arrow">パスワードの再設定</h2>
			<p class="mb16">下記メールアドレスへパスワード再設定ページへのURLを送信しました。</p>
			<p class="mb16"><b><?php echo $Snsuser['Snsuser']['email']?></b></p>
			<p>メールに記載されておりますURLをクリックして、パスワードの再設定を行ってください。</p>
		</div><!-- /#main-area -->

		<aside id="sub-area" class="layout-sub layout-r rsp-xxxo">
        <?php echo $this->element('common/cmnSubContent'); ?>
		</aside><!-- /#sub-area -->
	</div>
</div><!-- /#page-area -->
