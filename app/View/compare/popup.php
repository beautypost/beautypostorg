<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Beauty Post</title>
<meta name="description" content="">
<meta name="keywords" content="">
<?php echo $this->element('common/headContent'); ?>
<?php echo $this->element('common/headContent_css',array('cssname'=>$cssname)); ?>
</head>
<!--
#################################################################################################### -->
<body id="pagetop" class="page-compare-popup">
    <?php echo $this->element('common/gtm'); ?>
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->
<div class="tableWrap">
	<table id="demoTable">
		<colgroup><col id="demoTableCol1"></colgroup>
		<thead>
			<tr>
				<th>商品名</th>
				<?php foreach($Items as $Item):?>

					<td><?php echo $Item['Item']['id']?><?php echo $Item['Item']['title']?></td>
				<?php endforeach;?>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th class="txt">画像</th>
				<?php foreach($Items as $Item):?>
					<td>
						<ul class="item-taglist">
            <?php echo $this->Useful->getIco($Icos,$Item['Item']['ico'])?>
						</ul>
						<a href="<?php echo WEBROOT?>collection/detail/<?php echo $Item['Item']['id']?>" class="imgframe" target="_parent">
							<div class="inner">
								<img src="<?php echo $Item['Item']['img1']?>" class="fitimg-w hover-fade" alt="">
							</div>
						</a>
					</td>
				<?php //echo $Item['Item']['title']?>
				<?php endforeach;?>
			</tr>
		</tbody>
		<tbody class="table-head">
			<tr><td><span>基本情報</span></td></tr>
		</tbody>
		<tbody>
			<tr>
				<th>小売希望価格</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo $Item['Item']['price']?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>メーカー名</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo $this->Useful->selectOptionValue($GenreMakers,$Item['Item']['maker'])?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>発売日</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo date("Y.m.d",strtotime($Item['Item']['salesdate']))?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>カラーバリエーション</th>
				<?php foreach($Items as $Item):?>
				<td>
				<?php echo $Item['Item']['color']?>
				</td>
				<?php endforeach;?>
			</tr>
		</tbody>
		<tbody class="table-head">
			<tr><td><span>詳細情報</span></td></tr>
		</tbody>
		<tbody>
			<tr>
				<th>サイズ</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo $Item['Item']['size']?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>重量</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo $Item['Item']['weight']?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>保証期間</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo $Item['Item']['warranty']?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>セット内容</th>
				<?php foreach($Items as $Item):?>
				<td><?php echo $Item['Item']['set']?></td>
				<?php endforeach;?>
			</tr>

            <?php foreach($genres as $k => $genre):?>
                <?php foreach($genre as $kk=>$val):?>
    			<tr>
    				<th><?php echo $kk.$val?></th>

                        <?php foreach($itemGenreValues[$kk] as $k => $v):?>
                            <td>&nbsp;
                            <?php if(isset($v[0]['GenreAttrItem']['value'])):?>
                                <?php echo $v[0]['GenreAttrItem']['value']?>
                            <?php endif;?>
                            </td>
                        <?php endforeach;?>

                </tr>
                <?php endforeach;?>
            <?php endforeach;?>


		</tbody>
		<tbody class="table-head">
			<tr><td><span>ユーザーレビュー評価</span></td></tr>
		</tbody>
		<tbody>
			<tr>
				<th>ユーザーレビュー件数</th>
				<?php foreach($totalreview['count'] as $r):?>
				<td><?php echo $r?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>満足度</th>
				<?php foreach($totalreview['total'] as $r):?>
				<td><?php echo $r?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>価格</th>
				<?php foreach($totalreview['p1'] as $r):?>
				<td><?php echo $r?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>使いやすさ</th>
				<?php foreach($totalreview['p2'] as $r):?>
				<td><?php echo $r?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>デザイン</th>
				<?php foreach($totalreview['p3'] as $r):?>
				<td><?php echo $r?></td>
				<?php endforeach;?>
			</tr>
			<tr>
				<th>機能</th>
				<?php foreach($totalreview['p4'] as $r):?>
				<td><?php echo $r?></td>
				<?php endforeach;?>
			</tr>
            <tr>
                <th>継続性</th>
                <?php foreach($totalreview['p5'] as $r):?>
                <td><?php echo $r?></td>
                <?php endforeach;?>
            </tr>

		</tbody>
	</table>
</div>
<!--
====================================================================================================
 Site Common Footer                                                                    #site-footer
==================================================================================================== -->
<!--
==================================================================================================== -->
<?php echo $this->element('common/lastContent'); ?>
<script>
	    (function($){

        $(function(){
            // スクロールが発生した時に処理を行う
            $(window).scroll(function () {

                var $table = $("#demoTable");          // テーブルの要素を取得
                var $thead = $table.children("thead");  // thead取得
                var toffset = $table.offset();          // テーブルの位置情報取得
                // テーブル位置+テーブル縦幅 < スクロール位置 < テーブル位置
                if(toffset.top + $table.height()< $(window).scrollTop()
                  || toffset.top > $(window).scrollTop()){
                    //クローンテーブルが存在する場合は消す
                    var $clone = $("#clonetable");
                    if($clone.length > 0){
                        $clone.css("display", "none");
                    }
                    console.log('fire');
                }
                // テーブル位置 < スクロール位置 < テーブル位置+テーブル縦幅
                else if(toffset.top <= $(window).scrollTop()){
                    // クローンテーブルが存在するか確認
                    var $clone = $("#clonetable");
                    if($clone.length == 0){
                        // 存在しない場合は、theadのクローンを作成
                        $clone= $thead.clone(true);
                        // idをclonetableとする
                        $clone.attr("id", "clonetable");
                        // body部に要素を追加
                        $clone.appendTo("body");
                        // theadのCSSをコピーする
                        StyleCopy($clone, $thead);
                        // theadの子要素(tr)分ループさせる
                        for(var i = 0; i < $thead.children("tr").length; i++)
                        {
                            // i番目のtrを取得
                            var $theadtr = $thead.children("tr").eq(i);
                            var $clonetr = $clone.children("tr").eq(i);
                            // trの子要素(th)分ループさせる
                            for (var j = 0; j < $theadtr.eq(i).children("th").length; j++){
                                // j番目のthを取得
                                var $theadth = $theadtr.eq(i).children("th").eq(j);
                                var $cloneth = $clonetr.eq(i).children("th").eq(j);
                                // thのCSSをコピーする
                                StyleCopy($cloneth, $theadth);
                            }
                        }
                    }

                    // コピーしたtheadの表示形式をtableに変更
                    $clone.css("display", "table");
                    // positionをブラウザに対し絶対値とする
                    $clone.css("position", "fixed");
                    $clone.css("border-collapse", "collapse");
                    // positionの位置を設定(left = 元のテーブルのleftとする)
                    $clone.css("left", toffset.left - $(window).scrollLeft());

                    // positionの位置を設定(topをブラウザの一番上とする)
                    $clone.css("top", "0");
                    // 表示順番を一番優先させる
                    $clone.css("z-index", 99);
                }


            });

            // CSSのコピー
            function StyleCopy($copyTo, $copyFrom){
                $copyTo.css("width",
                            $copyFrom.css("width"));
                $copyTo.css("height",
                            $copyFrom.css("height"));

                $copyTo.css("padding-top",
                            $copyFrom.css("padding-top"));
                $copyTo.css("padding-left",
                            $copyFrom.css("padding-left"));
                $copyTo.css("padding-bottom",
                            $copyFrom.css("padding-bottom"));
                $copyTo.css("padding-right",
                            $copyFrom.css("padding-right"));

                $copyTo.css("background",
                            $copyFrom.css("background"));
                $copyTo.css("background-color",
                            $copyFrom.css("background-color"));
                $copyTo.css("vertical-align",
                            $copyFrom.css("vertical-align"));

                $copyTo.css("border-top-width",
                            $copyFrom.css("border-top-width"));
                $copyTo.css("border-top-color",
                            $copyFrom.css("border-top-color"));
                $copyTo.css("border-top-style",
                            $copyFrom.css("border-top-style"));

                $copyTo.css("border-left-width",
                            $copyFrom.css("border-left-width"));
                $copyTo.css("border-left-color",
                            $copyFrom.css("border-left-color"));
                $copyTo.css("border-left-style",
                            $copyFrom.css("border-left-style"));

                $copyTo.css("border-right-width",
                            $copyFrom.css("border-right-width"));
                $copyTo.css("border-right-color",
                            $copyFrom.css("border-right-color"));
                $copyTo.css("border-right-style",
                            $copyFrom.css("border-right-style"));

                $copyTo.css("border-bottom-width",
                            $copyFrom.css("border-bottom-width"));
                $copyTo.css("border-bottom-color",
                            $copyFrom.css("border-bottom-color"));
                $copyTo.css("border-bottom-style",
                            $copyFrom.css("border-bottom-style"));
            }
        });
    })(jQuery);
</script>
</body>
</html>
