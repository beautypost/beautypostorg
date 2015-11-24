
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div id="page-area">
	<div class="layout">
		<ol id="breadcrumb" class="breadcrumb rsp-xxoo">
			<li><a href="<?php echo WEBROOT?>">Beauty Post</a></li>
			<li><a href="<?php echo WEBROOT?>">マイページ</a></li>
			<li>登録情報変更</li>
		</ol><!-- /#breadcrumb -->

		<div class="layout-main layout-r">
			<h2 class="pagetitle"><!--
				 --><img src="<?php echo WEBROOT?>images/pagetitle-full.jpg" width="1984" height="256" class="fitimg-w rsp-xooo" alt="マイページ My Page"><!--
				 --><img src="<?php echo WEBROOT?>images/pagetitle-half.jpg" width="768" height="184" class="fitimg-w rsp-oxxx" alt="マイページ My Page"><!--
			 --></h2>
		</div><!-- /.layout-main.layout-r -->

		<aside id="mypage-menu" class="layout-sub layout-l">
            <?php echo $this->element('common/cmnMypage')?>
		</aside><!-- /#mypage-menu -->

		<div id="main-area" class="layout-main layout-r">
			<section id="signup-form">
				<h2 class="head-bar ico-arrow">登録情報変更</h2>
				<p>登録情報変更フォームをご利用の際は、必ず「個人情報保護方針」をご一読ください。<br>
				その内容に同意していただけましたら、下記フォームに必要事項をご入力の上、<br>
				「登録内容を変更する」ボタンをクリックしてください。</p>
				<form action="">
					<ul class="formlist">
						<li class="required">
							<dl>
								<dt><label for="user-mail" class="inner">メールアドレス</label></dt>
								<dd><input name="user-mail" id="user-mail" type="email" required></dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><label for="user-pass" class="inner">パスワード</label></dt>
								<dd><input name="user-pass" id="user-pass" type="password" required></dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><label for="user-pass-confirm" class="inner">パスワード（確認）</label></dt>
								<dd><input name="user-pass-confirm" id="user-pass-confirm" type="password" required></dd>
							</dl>
						</li>
					</ul><!-- /.formlist -->

					<p class="head-category">基本情報</p>

					<ul class="formlist">
						<li class="optional">
							<dl>
								<dt><label for="user-realname" class="inner">名前</label></dt>
								<dd><input name="user-realname" id="user-realname" type="text"></dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><label for="user-name" class="inner">ニックネーム</label></dt>
								<dd><input name="user-name" id="user-name" type="text" required></dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><span class="inner">性別</span></dt>
								<dd>
									<ul>
										<li><label><input type="radio" name="user-gender" value="女性" checked required>女性</label></li>
										<li><label><input type="radio" name="user-gender" value="男性" required>男性</label></li>
									</ul>
								</dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><span class="inner">生年月日</span></dt>
								<dd>
									<select name="user-birth-year" id="user-birth-year">
										<option value="">----</option>
										<option value="1991">1991</option>
										<option value="1992">1992</option>
										<option value="1993">1993</option>
										<option value="1994">1994</option>
										<option value="1995">1995</option>
										<option value="1996">1996</option>
										<option value="1997">1997</option>
										<option value="1998">1998</option>
										<option value="1999">1999</option>
										<option value="2000">2000</option>
										<option value="2001">2001</option>
										<option value="2002">2002</option>
										<option value="2003">2003</option>
										<option value="2004">2004</option>
										<option value="2005">2005</option>
										<option value="2006">2006</option>
										<option value="2007">2007</option>
										<option value="2008">2008</option>
										<option value="2009">2009</option>
										<option value="2010">2010</option>
										<option value="2011">2011</option>
										<option value="2012">2012</option>
										<option value="2013">2013</option>
										<option value="2014">2014</option>
										<option value="2015">2015</option>
									</select><span class="unit">年</span>
									<select name="user-birth-month" id="user-birth-month">
										<option value="">--</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select><span class="unit">月</span>
									<select name="user-birth-day" id="user-birth-day">
										<option value="">--</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
										<option value="13">13</option>
										<option value="14">14</option>
										<option value="15">15</option>
										<option value="16">16</option>
										<option value="17">17</option>
										<option value="18">18</option>
										<option value="19">19</option>
										<option value="20">20</option>
										<option value="21">21</option>
										<option value="22">22</option>
										<option value="23">23</option>
										<option value="24">24</option>
										<option value="25">25</option>
										<option value="26">26</option>
										<option value="27">27</option>
										<option value="28">28</option>
										<option value="29">29</option>
										<option value="30">30</option>
										<option value="31">31</option>
									</select><span class="unit">日</span>
								</dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><label for="user-cluster" class="inner">種別</label></dt>
								<dd>
									<select name="user-cluster" id="user-cluster" required>
										<option value="" selected>選択して下さい</option>
										<option value="あいうえお">あいうえお</option>
										<option value="かきくけこ">かきくけこ</option>
										<option value="さしすせそ">さしすせそ</option>
									</select>
								</dd>
							</dl>
						</li>
						<li class="required">
							<dl>
								<dt><span class="inner">Beauty Postメール</span></dt>
								<dd>
									<ul>
										<li><label><input type="radio" name="user-magazine" value="YES" checked>受け取る</label></li>
										<li><label><input type="radio" name="user-magazine" value="NO">受け取らない</label></li>
									</ul>
								</dd>
							</dl>
						</li>
					</ul><!-- /.formlist -->

					<div class="extra">
						<p class="kome">あなたのエリアと肌質に合わせた美容ニュースをお届けしますので、メールマガジンご希望の方は下記もご入力下さい。</p>
						<ul class="formlist">
							<li class="required">
								<dl>
									<dt><label for="user-address" class="inner">住んでいるエリア</label></dt>
									<dd>
										<select name="user-address" id="user-address" required>
											<option value="" selected>選択して下さい</option>
											<option value="あいうえお">あいうえお</option>
											<option value="かきくけこ">かきくけこ</option>
											<option value="さしすせそ">さしすせそ</option>
										</select>
									</dd>
								</dl>
							</li>
							<li class="required">
								<dl>
									<dt><label for="user-skintype" class="inner">肌質</label></dt>
									<dd>
										<select name="user-skintype" id="user-skintype" required>
											<option value="">選択して下さい</option>
											<option value="あいうえお">あいうえお</option>
											<option value="かきくけこ">かきくけこ</option>
											<option value="さしすせそ">さしすせそ</option>
										</select>
									</dd>
								</dl>
							</li>
						</ul><!-- /.formlist -->
					</div>

					<footer>
						<p><label><input type="checkbox">利用規約及び個人情報の取扱いについてに同意する</label></p>
						<button type="submit" class="button btn-pk btn-sizeM">登録情報を変更する</button>
					</footer>
				</form>
			</section><!-- /#signup-form -->
		</div><!-- /#main-area -->
	</div>
</div><!-- /#page-area -->

