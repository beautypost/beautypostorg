<?php 
/* 
====================================================================================================
 head
==================================================================================================== */
function headContent() {
global $rootpass;

$content = <<< EOT
<meta name="robots" content="INDEX,FOLLOW">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=2.0">
<meta name="format-detection" content="telephone=no">

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function headContent_css($cssname = 'content') {
global $rootpass;

$content = <<< EOT
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{$rootpass}css/reset.css" media="all">
<link rel="stylesheet" href="{$rootpass}css/base.css" media="all">
<link rel="stylesheet" href="{$rootpass}css/{$cssname}.css" media="all">

EOT;
return $content;
}
/* 
====================================================================================================
 body
==================================================================================================== */
function headerContent() {
global $rootpass;
$logo = ($rootpass == './') ? '<img src="'.$rootpass.'common-img/logo.png" width="576" height="144" alt="美容機器コレクション Beauty Post" class="logo fitimg-w">'
                            : '<a href="'.$rootpass.'"><img src="'.$rootpass.'common-img/logo.png" width="576" height="144" alt="美容機器コレクション Beauty Post" class="logo fitimg-w"></a>';

$content = <<< EOT
<div class="layout">
		<h1 id="site-title"><span class="rsp-xxxo">美容機器・美顔器をはじめとする美容機器比較サイト 美容機器コレクション<br></span>{$logo}</h1>
		
		<div class="head-body rsp-xxoo">
			<p class="rsp-xxoo"><span class="attention">今日の紫外線度数</span><span class="attention">美容の最新ニュース</span><br class="rsp-oxxx">をお届け！<wbr><span class="wsnw">他にも特典が満載！</span></p>
			<a href="" class="button btn-rich-vpk"><span>Beauty Post メンバー登録</span></a>
			
			<!--<div id="welcome">
				ようこそGuestさん <a href="">ログアウト</a>
			</div> --><!-- /#welcome -->
		</div><!-- /.head-body -->
	</div><!-- /.layout -->

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function headerGnav() {
global $rootpass;

$content = <<< EOT
<div id="gnav">
		<div class="gnav-inner">
			<ul class="clearfix">
				<li class="gnav-about"><a href="{$rootpass}about/">Beauty Postとは？</a></li>
				<li class="gnav-guide"><a href="{$rootpass}guide/">ご利用ガイド</a></li>
				<li class="gnav-collection"><a href="{$rootpass}collection/">美容機器コレクション</a></li>
				<li class="gnav-voice"><a href="{$rootpass}voice/">体験者の声</a></li>
				<li class="gnav-login"><a href="{$rootpass}login/">ログイン</a></li>
				<!-- <li class="gnav-mypage"><a href="">マイページ</a></li> -->
			</ul>
			
			<div class="menu-btn rsp-ooxx">
				<a id="menu-toggle"><i class="fa fa-bars">&#8203;</i><br>MENU</a>
			</div><!-- /.menu-btn -->
		</div><!-- /.gnav-inner -->
	</div><!-- /#gnav -->
EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function cmnSearchForm() {
global $rootpass;

$content = <<< EOT
<ul class="search-form-list">
							<li>
								<dl>
									<dt><i class="fa fa-plus-circle">&#8203;</i>カテゴリ</dt>
									<dd>
										<select name="sq-category" id="sq-category">
											<option value="" selected>選択してください</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
										</select>
									</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt><i class="fa fa-plus-circle">&#8203;</i>目的</dt>
									<dd>
										<select name="sq-purpose" id="sq-purpose">
											<option value="" selected>選択してください</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
										</select>
									</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt><i class="fa fa-plus-circle">&#8203;</i>部位</dt>
									<dd>
										<select name="sq-parts" id="sq-parts">
											<option value="" selected>選択してください</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
										</select>
									</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt><i class="fa fa-plus-circle">&#8203;</i>メーカー</dt>
									<dd>
										<select name="sq-maker" id="sq-maker">
											<option value="" selected>選択してください</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
										</select>
									</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt><i class="fa fa-plus-circle">&#8203;</i>種類別</dt>
									<dd>
										<select name="sq-type" id="sq-type">
											<option value="" selected>選択してください</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
											<option value="aaa">aaa</option>
										</select>
									</dd>
								</dl>
							</li>
							<li class="price w-full">
								<dl>
									<dt><i class="fa fa-plus-circle">&#8203;</i>価格</dt>
									<dd>
										<input type="number" name="sq-pricefrom" id="sq-pricefrom" step="500"><span class="fromto">～</span><input type="number" name="sq-priceto" id="sq-priceto" step="500">
									</dd>
								</dl>
							</li>
							<li class="w-full">
								<dl>
									<dt><i class="fa fa-plus-circle"></i>フリーキーワード</dt>
									<dd>
										<input type="text" name="sq-keyword" id="sq-keyword" value="">
									</dd>
								</dl>
							</li>
						</ul><!-- /.search-form-list -->

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function cmnEnquete() {
global $rootpass;

$content = <<< EOT
<h2><!-- 
					 --><img src="{$rootpass}common-img/side-enquete-head-full.png" width="882" height="192" class="fitimg-w rsp-ooox" alt="美活アンケート実施中！"><!-- 
					 --><img src="{$rootpass}common-img/side-enquete-head.png" width="480" height="128" class="fitimg-w rsp-xxxo" alt="美活アンケート実施中！"><!-- 
				 --></h2>
				<section>
					<h2 class="enquete-head"><i class="fa fa-chevron-circle-right">&#8203;</i> 第19回美容アンケート投票中</h2>
					<div class="round-contents-body">
						<p>＊＊＊の＊＊＊は？</p>
						<footer>
							<ul class="clearfix">
								<li class="fll"><a href="{$rootpass}enquete-form/" class="button btn-pk">投票する</a></li>
								<li class="flr"><a href="{$rootpass}enquete/" class="button btn-gd">結果を見る</a></li>
							</ul>
						</footer>
					</div><!-- /.round-contents-body -->
				</section>
				
				<section>
					<h2 class="enquete-head"><i class="fa fa-chevron-circle-right">&#8203;</i> 第18回美容アンケート結果発表</h2>
					<div class="round-contents-body">
						<p>＊＊＊の＊＊＊は？</p>
						<div class="answer">
							<p>総回答数：<span class="txt-c-pk">000</span>件</p>
							<table>
								<tr>
									<th><span>解答その1</span></th>
									<td><span class="bar" style="width:60%">&#8203;</span></td>
									<td><span><span class="txt-c-pk">999</span>件</span></td>
								</tr>
								<tr>
									<th><span>解答2</span></th>
									<td><span class="bar" style="width:80%">&#8203;</span></td>
									<td><span><span class="txt-c-pk">999</span>件</span></td>
								</tr>
								<tr>
									<th><span>解答3解答3</span></th>
									<td><span class="bar" style="width:10%">&#8203;</span></td>
									<td><span><span class="txt-c-pk">999</span>件</span></td>
								</tr>
							</table>
						</div><!-- /.answer -->
						<footer>
							<a href="{$rootpass}enquete/" class="button btn-block btn-gd">さらに過去のアンケート結果を見る</a>
						</footer>
					</div><!-- /.round-contents-body -->
				</section>

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function cmnSubContent() {
global $rootpass;

$enquete = cmnEnquete();

$content = <<< EOT
<aside id="sub-area" class="rsp-xxxo">
			<div class="side-bnrs">
				<ul>
					<li><a href="{$rootpass}knowledge/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-knowledge-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="美容機器の基礎知識"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-knowledge-half.jpg" width="568" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="美容機器の基礎知識"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-knowledge.jpg" width="500" height="160" class="fitimg-w hover-fade rsp-xxxo" alt="美容機器の基礎知識"><!-- 
					 --></a></li>
					<li><a href="{$rootpass}type/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-type-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="美容機器の種類"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-type-half.jpg" width="568" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="美容機器の種類"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-type.jpg" width="500" height="220" class="fitimg-w hover-fade rsp-xxxo" alt="美容機器の種類"><!-- 
					 --></a></li>
				</ul>
			</div><!-- /.side-bnrs -->
			
			<section id="side-enquete" class="round-contents enquete-section rsp-xxxo">
				{$enquete}
			</section><!-- /#side-enquete -->
			
			<div class="side-bnrs">
				<ul>
					<li><a href="{$rootpass}privilege/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-privilege-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="Beauty Post メンバー会員特典について"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-privilege-half.jpg" width="568" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="Beauty Post メンバー会員特典について"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-privilege.jpg" width="500" height="140" class="fitimg-w hover-fade rsp-xxxo" alt="Beauty Post メンバー会員特典について"><!-- 
					 --></a></li>
					<li><a href="{$rootpass}voice/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-voice-full.jpg" width="990" height="240" class="fitimg-w hover-fade rsp-oxox" alt="体験者の声" ><!-- 
						 --><img src="{$rootpass}common-img/sbnr-voice-half.jpg" width="569" height="240" class="fitimg-w hover-fade rsp-xoxx" alt="体験者の声"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-voice.jpg" width="500" height="180" class="fitimg-w hover-fade rsp-xxxo" alt="体験者の声"><span class="rsp-xxxo subtxt">美容機器で、本気のスキンケア・ダイエット・アンチエイジングに取り組んでみました。</span><!-- 
					 --></a></li>
				</ul>
			</div><!-- /.side-bnrs -->
			
			<section id="side-news" class="round-contents">
				<h2><!-- 
					 --><img src="{$rootpass}common-img/side-news-head-full.jpg" width="882" height="176" class="fitimg-w rsp-ooox" alt="今旬の美容ニュース"><!-- 
					 --><img src="{$rootpass}common-img/side-news-head.jpg" width="480" height="112" class="fitimg-w rsp-xxxo" alt="今旬の美容ニュース"><!-- 
				 --></h2>
				<div class="round-contents-body">
					<ul>
						<li><a href="{$rootpass}news/"><i class="fa fa-play">&#8203;</i>あああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああああ</a></li>
						<li><a href="{$rootpass}news/"><i class="fa fa-play">&#8203;</i>text text text text text text</a></li>
						<li><a href="{$rootpass}news/"><i class="fa fa-play">&#8203;</i>text text text text text text</a></li>
						<li><a href="{$rootpass}news/"><i class="fa fa-play">&#8203;</i>text text text text text text</a></li>
						<li><a href="{$rootpass}news/"><i class="fa fa-play">&#8203;</i>text text text text text text</a></li>
					</ul>
					<a href="{$rootpass}news/" class="button btn-block btn-pk">さらに見る</a>
				</div>
			</section><!-- /#side-news -->
			
			<div class="side-bnrs">
				<ul>
					<li><a href="{$rootpass}magazine/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-magazine-full.jpg" width="990" height="272" class="fitimg-w hover-fade rsp-oxox" alt="メルマガバックナンバー"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-magazine-half.jpg" width="568" height="272" class="fitimg-w hover-fade rsp-xoxx" alt="メルマガバックナンバー"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-magazine.jpg" width="500" height="140" class="fitimg-w hover-fade rsp-xxxo" alt="メルマガバックナンバー"><!-- 
					 --></a></li>
					<li><a href="{$rootpass}column/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-column-full.jpg" width="990" height="272" class="fitimg-w hover-fade rsp-oxox" alt="Beauty Post コラム"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-column-half.jpg" width="568" height="272" class="fitimg-w hover-fade rsp-xoxx" alt="Beauty Post コラム"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-column.jpg" width="500" height="260" class="fitimg-w hover-fade rsp-xxxo" alt="Beauty Post コラム"><!-- 
					 --></a></li>
					<li class="bnr-maker"><a href="{$rootpass}maker/"><!-- 
						 --><img src="{$rootpass}common-img/sbnr-maker.png" width="500" height="180" class="fitimg-w hover-fade rsp-xxxo" alt="美容機器メーカーの方へ"><!-- 
						 --><span class="rsp-ooox">美容機器メーカーの方へ</span><!-- 
					 --></a></li><!-- /.bnr-maker -->
					<li class="bnr-qr rsp-xxxo">
						<img src="{$rootpass}common-img/side-qr-head.png" width="500" height="116" class="fitimg-w" alt="モバイルサイトはこちら">
						<div class="clearfix">
							<img src="http://placehold.jp/48/c9c9c9/171717/128x128.png?text=QR" width="128" height="128" class="fll" alt="QR">
							<p>テキストテキストテキストテキストテキストテキスト</p>
						</div><!-- /.clearfix -->
					</li><!-- /.bnr-qr -->
				</ul>
			</div><!-- /.side-bnrs -->
		</aside><!-- /#sub-area -->

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function footerContent() {
global $rootpass;

$content = <<< EOT
<footer id="site-footer">
	<div id="fcontent">
		<div class="layout">
			<div id="fhead">
				<img src="{$rootpass}common-img/logo.png" width="576" height="144" alt="美容機器コレクション Beauty Post" class="logo rsp-xxxo">
				<ul>
					<li><a href="{$rootpass}">ホーム</a></li>
					<li><a href="{$rootpass}company/">運営会社</a></li>
					<li><a href="{$rootpass}sitemap/">サイトマップ</a></li>
				</ul>
			</div><!-- /#fhead -->
			
			<div id="fnav">
				<ul>
					<li><a href="{$rootpass}about/">Beauty Post とは？</a></li>
					<li><a href="{$rootpass}guide/">ご利用ガイド</a></li>
					<li><a href="{$rootpass}privilege/">会員特典について</a></li>
					<li><a href="{$rootpass}signup/">Beauty Post メンバー登録</a></li>
				</ul>
				<ul>
					<li><a href="{$rootpass}voice/">体験者の声</a></li>
					<li><a href="{$rootpass}news/">今旬の美容ニュース</a></li>
					<li><a href="{$rootpass}magazine/">メルマガバックナンバー</a></li>
					<li><a href="{$rootpass}column/">Beauty Post コラム</a></li>
				</ul>
				<ul>
					<li><a href="{$rootpass}privacy/">プライバシーポリシー</a></li>
					<li><a href="{$rootpass}rules/">利用規約</a></li>
					<li><a href="{$rootpass}maker/">美容機器メーカーの方へ</a></li>
					<li><a href="{$rootpass}contact/">お問い合わせ</a></li>
				</ul>
			</div><!-- /#fnav -->
		</div><!-- /.layout -->
	</div><!-- /#fcontent -->
	
	<div id="copyright">
		<div class="layout"><p><small>Copyright 2015 Beauty Post. All Rights Reserved.</small></p></div>
	</div><!-- /#copyright -->
</footer><!-- /#site-footer -->

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
function lastContent() {
global $rootpass;

$content = <<< EOT
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{$rootpass}js/jquery-2.1.4.min.js"><\/script>')</script>
<script src="{$rootpass}js/jquery.easing.min.js"></script>
<script src="{$rootpass}js/jquery.common.js"></script>

EOT;
return $content;
}
// -------------------------------------------------------------------------------------------------
 ?>
