/*
 * jquery-auto-height.js
 *
 * Copyright (c) 2010 Tomohiro Okuwaki (http://www.tinybeans.net/blog/)
 * Licensed under MIT Lisence:
 * http://www.opensource.org/licenses/mit-license.php
 * http://sourceforge.jp/projects/opensource/wiki/licenses%2FMIT_license
 *
 * Since:   2010-04-19
 * Update:  2013-08-16
 * version: 0.04
 * Comment:
 *
 * jQuery 1.2 <-> 1.10.2
 *
 */

 (function($){
    $.fn.autoHeight = function(options){
        var op = $.extend({

            column  : 0,
            clear   : 0,
            height  : 'min-height',
            linehgieht: false,
            reset   : '',
            descend : function descend (a,b){ return b-a; }

        },options || {}); // optionsに値があれば上書きする

        var self = $(this);
        var n = 0,
            hMax,
            hList = new Array(),
            hListLine = new Array();
            hListLine[n] = 0;

        // 要素の高さを取得
        self.each(function(i){
            if (op.reset == 'reset') {
                $(this).removeAttr('style');
            }
            var h = $(this).height();
            hList[i] = h;
            if (op.column > 1) {
                // op.columnごとの最大値を格納していく
                if (h > hListLine[n]) {
                    hListLine[n] = h;
                }
                if ( (i > 0) && (((i+1) % op.column) == 0) ) {
                    n++;
                    hListLine[n] = 0;
                };
            }
        });

        // 取得した高さの数値を降順に並べ替え
        hList = hList.sort(op.descend);
        hMax = hList[0];

        // 高さの最大値を要素に適用
        var ie6 = typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined";
        if (op.column > 1) {
            for (var j=0; j<hListLine.length; j++) {
                for (var k=0; k<op.column; k++) {
                    if (ie6) {
                        self.eq(j*op.column+k).height(hListLine[j]);
                    } else {
                        self.eq(j*op.column+k).css({
                            'min-height': hListLine[j]
                        });
                        if (op.lineheight) {
                            self.eq(j*op.column+k).css({
                                'line-height' : hListLine[j] + 'px'
                            });
                        }
                    }
                    if (k == 0 && op.clear != 0) {
                        self.eq(j*op.column+k).css('clear','both');
                    }
                }
            }
        } else {
            if (ie6) {
                self.height(hMax);
            } else {
                self.css({
                    'min-height': hMax
                });
                if (op.lineheight) {
                    self.css({
                        'line-height': hMax + 'px'
                    });
                }
            }
        }
    };
})(jQuery);

jQuery(function($){
    var bpS = 480;
    var bpM = 768;
    var bpL = 1024;
    $(window).resize(function(){
        if (window.innerWidth < bpS) {
            $('.js-ah-xooo').removeAttr('style');
        } else if (bpS <= window.innerWidth && window.innerWidth < bpM) {
            $('.js-ah-xooo').autoHeight({reset:'reset'});
        } else if (bpM <= window.innerWidth && window.innerWidth < bpL) {
            $('.js-ah-xooo').autoHeight({reset:'reset'});
        } else {
            $('.js-ah-xooo').autoHeight({reset:'reset'});
        }
    }).trigger('resize');
    
    $(window).resize(function(){
        $('.report-gallery').each(function(){
            if (window.innerWidth < bpS) {
                $(this).find('.caption').removeAttr('style');
            } else if (bpS <= window.innerWidth && window.innerWidth < bpM) {
                $(this).find('.caption').autoHeight({column:2,lineheight:true,reset:'reset'});
            } else if (bpM <= window.innerWidth && window.innerWidth < bpL) {
                $(this).find('.caption').autoHeight({column:3,lineheight:true,reset:'reset'});
            } else {
                $(this).find('.caption').autoHeight({column:3,lineheight:true,reset:'reset'});
            }
        });
    }).trigger('resize');
});
