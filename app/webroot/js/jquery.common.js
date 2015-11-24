$(function(){
	
// -------------------------------------------------------------------------------------------------
// ナビゲーション関連
// -------------------------------------------------------------------------------------------------

	// まず必要ないものを隠す
	//$('#gnavsp').hide();
	//$('#fsp_foot').find('ul').hide();
	//
	//// トグルスイッチ設定
	//$('#hcontact').find('.btn_menu').click(function(){
	//	$(this).toggleClass('on');
	//	$('#gnavsp').slideToggle();
	//	return false;
	//});
	//$('#fsp_btn').find('.btn_menu').click(function(){
	//	$(this).toggleClass('on');
	//	$('#fsp_foot').find('ul').slideToggle();
	//	return false;
	//});
	
	
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
	$('a[href*=#]').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length && target;
			if (target.length) {
				var targetOffset = target.offset().top;
				$('html,body').animate({scrollTop: targetOffset}, 500, "easeOutQuint");
				return false;
			}
		}
	});

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
