$(function(){
	
// -------------------------------------------------------------------------------------------------
// ナビゲーション関連
// -------------------------------------------------------------------------------------------------
	
	$('#menu-toggle,.menu-overlay').click(function(){
		$('body').toggleClass('menu-on');
		return false;
	});
	
	$('#filter').hide();
	$('#filter-switch').click(function(){
		$(this).toggleClass('btn-pk');
		$('#filter').slideToggle();
		return false;
	});

// -------------------------------------------------------------------------------------------------
// ページ内スムーススクロール設定
// -------------------------------------------------------------------------------------------------
	// html要素でのスクロールが可能かどうかを判別
	var isHtmlScroll = (function(){
		var html = $('html'), top = html.scrollTop();
		var el = $('<div></div>').height(1).prependTo('body');
		html.scrollTop(1);
		var rs = !!html.scrollTop();
		html.scrollTop(top);
		el.remove();
		return rs;
	})();
	
	// スムーススクロール実装
	$('a[href^=#]').click(function() {
		var target = $(this.hash);
		target = target.length && target;
		if (target.length) {
			var tgto = target.offset().top;
			$(isHtmlScroll ? 'html' : 'body').animate({scrollTop: tgto}, 500, "swing");
			return false;
		}
	});
	
	// スクロールストップ処理
	function scrollStop() { $(isHtmlScroll ? 'html' : 'body').queue([]).stop(); }
	// マウススクロールイベントでスクロール中断（Firefox / IE8）
	if (window.addEventListener) {
		window.addEventListener('DOMMouseScroll', scrollStop, false);
	} else {
		document.onmousewheel = scrollStop; // ↓のwindow.onmousewheelに続けて書くと、FirefoxにおいてNicescrollなどが機能しなくなる
	}
	// マウススクロールイベントでスクロール中断（IE9+・Chrome）
	window.onmousewheel = scrollStop;

// -------------------------------------------------------------------------------------------------
// 画像サムネイル設定
// -------------------------------------------------------------------------------------------------
	var imgframes = $('.imgframe .inner');
	function imgFrameFix() {
		imgframes.each(function(){
			th = $(this).height();
			$(this).css('line-height',th + 'px');
		});
	}
	imgFrameFix();
	$(window).on('resize',imgFrameFix);

// -------------------------------------------------------------------------------------------------

});
