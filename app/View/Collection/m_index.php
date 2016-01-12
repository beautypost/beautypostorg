<script src="<?php echo WEBROOT?>raty/lib/jquery.raty.js"></script>
<script src="<?php echo WEBROOT?>raty/javascripts/labs.js" type="text/javascript"></script>

<script>
jQuery(function($){
 $('a[rel=tooltip]').tooltip();
});
</script>

								<div class="row">
									<div class="col-xs-12">

<div class="navbar navbar-inverse navbar-fixed-bottom kz-sm-nav">
  <div class="navbar-inner">
											<table class="table table-striped table-bordered table-hover table-condensed table-responsive">
												<thead>
													<tr>
<th class="col-xs-6"><?php echo $Genres[$genreID]['title']?></th>
<th class="align-left kz-m-col-th">
<a href="#" data-html="true" rel="tooltip" data-toggle="tooltip" data-placement="left" title="<?php echo nl2br($GenreTitle[1]['comment'])?>"><?php echo $GenreTitle[1]['title']?><i class="ace-icon glyphicon glyphicon-question-sign"></i></a><br>
<a href="#" data-html="true" rel="tooltip" data-toggle="tooltip" data-placement="left" title="<?php echo nl2br($GenreTitle[2]['comment'])?>"><?php echo $GenreTitle[2]['title']?><i class="ace-icon glyphicon glyphicon-question-sign"></i></a><br>
<a href="#" data-html="true" rel="tooltip" data-toggle="tooltip" data-placement="left" title="<?php echo nl2br($GenreTitle[3]['comment'])?>"><?php echo $GenreTitle[3]['title']?><i class="ace-icon glyphicon glyphicon-question-sign"></i></a><br>
<a href="#" data-html="true" rel="tooltip" data-toggle="tooltip" data-placement="left" title="<?php echo nl2br($GenreTitle[4]['comment'])?>"><?php echo $GenreTitle[4]['title']?><i class="ace-icon glyphicon glyphicon-question-sign"></i></a><br>
<a href="#" data-html="true" rel="tooltip" data-toggle="tooltip" data-placement="left" title="<?php echo nl2br($GenreTitle[5]['comment'])?>"><?php echo $GenreTitle[5]['title']?><i class="ace-icon glyphicon glyphicon-question-sign"></i></a><br>
<a href="#" data-html="true" rel="tooltip" data-toggle="tooltip" data-placement="left" title="ビズランユーザーが<br>投票した投票数です。">投票数<i class="ace-icon glyphicon glyphicon-question-sign"></i></a></th>
													</tr>
												</thead>
												</table>
  </div>
</div>


										<?php if(isset($messages)):?>
										<div class="alert alert-block alert-success">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<p>
												<strong>
													<i class="ace-icon fa fa-check"></i>
													サービスをご推薦いただき有り難うございました！<hr>
													お送りいただいたWebサイトのURLが有効であることはもちろんのこと、お客様にしっかりとした商品やサービスを提供できる事業体であることや信頼できる事業体であることをBizran運営事務局の担当者が調査し、掲載の審査とさせていただきます。
												</strong>
											</p>
										</div>
										<?php  endif;?>

										<?php if(isset($errormessages)):?>
										<div class="alert alert-block alert-danger">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<p>
												<strong>
													<i class="ace-icon fa fa-times"></i>
													URLの登録が無いか、該当のURLが見つかりませんでした。
												</strong>
											</p>
										</div>
										<?php endif;?>



										<h1 class="kz-list-header kz-list-title lighter sg-list-title">
												<img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $Genres[$genreID]['icon'];?>" alt="<?php echo $Genres[$genreID]['name']?>">
												<?php echo $Genres[$genreID]['name']?>で検索比較
										</h1>

										<div class="inline">
					                        <?php if($Blogs):?>
					                        <button class="btn btn-success btn-minier inline" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/blog/'"><i class="fa fa-list"></i> 記事一覧</button>
					                        <?php endif;?>
					                        <button class="btn btn-warning btn-minier inline" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/hikaku/'"><i class="ace-icon glyphicon glyphicon-align-left"></i>比較ポイント</button>
					                        <button class="btn btn-danger btn-minier inline" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/yougo/'"><i class="ace-icon fa fa-book"></i>用語集</button>
										</div>

										<p class="spacer20">
											<?php echo $Genres[$genreID]['comment']?>
										</p>
										<!-- <div class="table-responsive"> -->

										<!-- <div class="dataTables_borderWrap"> -->
											<table class="table table-striped table-bordered table-hover table-condensed table-responsive">


												<tbody>
												<?php $i=0?>
												<?php foreach($Items as $key => $value):?>




													<tr>
														<td class="col-xs-6  <?php $this->Bizran->rankingClass($key+1)?>">
															<div class='col-xs-12 align-center'>&nbsp;
															<?php echo number_format($value['Item']['poplar'])?>
<a href="#" rel="tooltip" data-toggle="tooltip" title="アクセス数や滞在時間、Bizran上での投票数から、独自のアルゴリズムで算出した数値です。">&nbsp;<i class="ace-icon glyphicon glyphicon-question-sign"></i></a><br>
															</div>
															<div class='col-xs-12 kz-m-col-clear'>
																<div class="col-xs-4 kz-col-clear">
																	<a href="<?php echo WEBROOT.'Item/?itemID='.$value['Item']['id'];?>" target="item<?php echo $value['Item']['id']?>">
																	<img src="<?php echo $this->Bizran->screenshot($value['Item']['id'])?>" width="70" class="img-responsive img-thumbnail" alt="<?php echo $value['Item']['name'];?>"></a>
																</div>
																<div class="col-xs-8 kz-col-r">
																	<a href="<?php echo WEBROOT.'Item/?itemID='.$value['Item']['id'];?>" target="item<?php echo $value['Item']['id']?>">
																		<?php echo $value['Item']['name'];?>
																	</a>
																	<?php echo $this->Useful->CheckAdminID($UserData['id'])&& $value['Item']['affiliate'] ? '【'.$value['Item']['affiliate'].'】':'';?>
																</div>

															<div class='col-xs-12 kz-m-col-clear'>
																<?php echo $value['Item']['title']?>
															</div>
														</div>
														</td>

														<td class="col-xs-6 kz-m-col-star">
<?php $tooltip = '<a href="#" rel="tooltip" data-toggle="tooltip" title="'.$GenreTitle[1]['title'].'"><i class="ace-icon glyphicon glyphicon-question-sign"></i></a>';?>
															<?php $this->Bizran->voteAverageStarView($value,'vote1',4,8,$tooltip);?><br>
<?php $tooltip = '<a href="#" rel="tooltip" data-toggle="tooltip" title="'.$GenreTitle[2]['title'].'"><i class="ace-icon glyphicon glyphicon-question-sign"></i></a>';?>
															<?php $this->Bizran->voteAverageStarView($value,'vote2',4,8,$tooltip);?><br>
<?php $tooltip = '<a href="#" rel="tooltip" data-toggle="tooltip" title="'.$GenreTitle[3]['title'].'"><i class="ace-icon glyphicon glyphicon-question-sign"></i></a>';?>
															<?php $this->Bizran->voteAverageStarView($value,'vote3',4,8,$tooltip);?><br>
<?php $tooltip = '<a href="#" rel="tooltip" data-toggle="tooltip" title="'.$GenreTitle[4]['title'].'"><i class="ace-icon glyphicon glyphicon-question-sign"></i></a>';?>
															<?php $this->Bizran->voteAverageStarView($value,'vote4',4,8,$tooltip);?><br>
<?php $tooltip = '<a href="#" rel="tooltip" data-toggle="tooltip" title="'.$GenreTitle[5]['title'].'"><i class="ace-icon glyphicon glyphicon-question-sign"></i></a>';?>
															<?php $this->Bizran->voteAverageStarView($value,'vote5',4,8,$tooltip);?>
<br>
															<div class="align-center spacer"><?php echo number_format($value['Item']['vote_count'])?>票
															<?php if(!$UserData):?>
																<a href="<?php echo WEBROOT?>Fbconnect/?genreID=<?php echo $genreID?>" class="kz-votebox">
																	<i class="ace-icon fa fa-pencil-square-o"></i><span class="kz-vote">投票</span>
																</a>
															<?php else:?>
																<?php $this->Bizran->voteButton($value,$UserVote);?>
															<?php endif;?>
															</div>


															</td>
													</tr>

												<?php endforeach; ?>

												</tbody>
											</table>
											</section>

<?php if(count($Blogs) > 0): ?>
<hr>
										<h1 class="header kz-list-title lighter sg-list-title">
											<span class="col-xs-12 col-sm-6 kz-list-title-left">
												<img src="<?php echo WEBROOT?>assets/img/genre/post.png" alt="<?php echo $Genres[$genreID]['name']?>">
												<?php echo $Genres[$genreID]['name']?>最新記事
											</span>
										</h1>

                              <?php foreach($Blogs as $Item):?>
                              <div class="profile-activity clearfix">
                                <div>
								<img class="pull-left img-thumbnail" alt="<?php echo $Item['Blog']['title']?>" src="<?php echo WEBROOT.$Item['Blog']['img']?>">
                                  <a class="user" href="<?php echo WEBROOT.'List/'.$Genres[$genreID]['urlname'].'/blog/'.$Item['Blog']['id']?>"><?php echo $Item['Blog']['title']?></a>
                                  <div class="time">
                                    <i class="ace-icon fa fa-clock-o bigger-110"></i>
                                    <?php echo  date("Y/m/d H:i",strtotime($Item['Blog']['created']));?>
                                  </div>
                                </div>
                              </div>
                              <?php endforeach;?>
<?php endif;?>

<hr>
		<div class="sg-rec-title">
			<h4><img src="<?php echo WEBROOT?>assets/img/base/bz-bnr.png" alt="ランキング掲載ビジネスサービス募集中！"></h4>
		</div>
		<div class="col-sm-6">
			<p>このランキングに掲載ご希望の企業、商品またはサービスがある方は、入力欄に該当のWebサイトのURLを記入してください。</p>
			<p>Bizran運営事務局による審査を行い、随時掲載をいたします。ランキング掲載による利用料金はかかりません。</p>
			<p>URLの入力後、確認画面等はございませんので、内容をご確認の上、「サービスを推薦する」ボタンをクリックしてください。</p>
		</div>
		<div class="col-sm-6">
		    <ul class="sg-note-list">
		      <li><i class="fa fa-exclamation-triangle"></i>&nbsp;Bizran運営事務局による審査に伴い、推薦ジャンル(現在表示中のジャンル)以外に登録される可能性もあります。</li>
		      <li><i class="fa fa-exclamation-triangle"></i>&nbsp;送信されたすべてのサービスが登録されるとは限りません。</li>
		      <li><i class="fa fa-exclamation-triangle"></i>&nbsp;推薦されたサービスがビズランに掲載される時期について、保証はいたしかねますのでご了承ください。</li>
		    </ul>
		</div>

		<div class="col-sm-6 col-xs-12 col-md-offset-3 spacer10">
			<form  id="WebrequestIndexForm" method="post" action="<?php echo WEBROOT?>list/webrequest/">
				<div class="input-group">
					<input name="data[Webrequest][url]" type="text" value="http://" id="url" placeholder="http://" class="form-control" required="required" />
					<input type="hidden" name="data[Webrequest][genreID]" value="<?php echo $genreID?>">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-info btn-next btn-sm" data-last="Finish" tabindex="1" accesskey="1">
						<strong>サービスを推薦する</strong>
						<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</span>
				</div>
				<span class="help-block"><i class="fa fa-exclamation-triangle"></i>http:// からご入力ください</span>
			</form>
		</div>


<!-- Modal -->
<div class="modal fade large" id="voteModal" tabindex="2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="kz-modal-content">
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="4" accesskey="3">閉じる</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">

window.closeModal = function(){
    $('#voteModal').modal('hide');
};

	$(function() {

			$('.star').raty( {
			 readOnly: true,
			 space:false,
			 score: function() {
			    return $(this).attr('data-score');
			 },
			 path: '<?php echo WEBROOT?>raty/lib/images'
			});
		});


$('a.btn-xs').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');

    $('.modal-body').html('<iframe class="kz-vote-box-frame" title="vote-box" width="100%" height="645" scrolling="no" allowtransparency="true" src="<?php echo WEBROOT?>Vote/ItemReviewInput/?itemID=' + url + '"><\/iframe>');
});


$('#voteModal').on('hidden.bs.modal', function () {
	location.reload();
});

</script>

		<!-- page specific plugin scripts -->
		<script src="<?php echo WEBROOT?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo WEBROOT?>assets/js/jquery.dataTables.bootstrap.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				var oTable1 =
				$('#list-table-2')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					null,
					  {"asSorting":["desc","asc"]},
					  {"asSorting":["desc","asc"]},
					  {"asSorting":["desc","asc"]},
					  {"asSorting":["desc","asc"]},
					  {"asSorting":["desc","asc"]},
					  {"asSorting":["desc","asc"]},
					  {"asSorting":["desc","asc"]},
					],
					"aaSorting": [],
					  "columnDefs": [
					    { "orderable": false, "targets": 0 }
					  ],
					'iDisplayLength': 50,
					'lengthChange':false,
					'searching':false,

					//,
					//"sScrollY": "200px",
					"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
					language: {
				        search: "検索:",
					    info:" _TOTAL_ 件中 _START_ から _END_ まで表示",
					    infoEmpty: "登録はありません",
					    lengthMenu:"_MENU_件表示",
					    zeroRecords:"登録はありません",
					    paginate:{
					    	first:"先頭へ",
					    	previous:"前へ",
					    	next:"次へ",
					    	last:"最後へ",
					    }

				    }
			    } );
				/**
				var tableTools = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "../../copy_csv_xls_pdf.swf",
			        "buttons": [
			            "copy",
			            "csv",
			            "xls",
						"pdf",
			            "print"
			        ]
			    } );
			    $( tableTools.fnContainer() ).insertBefore('#sample-table-2');
				*/




			})
		</script>

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo WEBROOT?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo WEBROOT?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
</div>
</div>
