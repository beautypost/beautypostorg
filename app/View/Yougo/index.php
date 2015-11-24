                <div class="row">
                  <div class="col-xs-12">
<?php if(isset($mobile)):?>
                    <h1 class="header kz-list-title lighter sg-list-title">
                        <img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $Genres[$genreID]['icon'];?>">
                      <?php echo $Genres[$genreID]['name']?>用語集
                    </h1>
                        <span class="inline">
                        <button class="btn btn-info inline <?php echo isset($mobile) ? 'kz-btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/'"><i class="ace-icon fa fa-undo"></i>戻る</button>
                        <?php if($Blogs):?><button class="btn btn-success inline <?php echo isset($mobile) ? 'kz-btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/blog/'"><i class="fa fa-list"></i> 記事一覧</button><?php endif;?>                        
                        <button class="btn btn-warning inline <?php echo isset($mobile) ? 'kz-btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/hikaku/'"><i class="ace-icon glyphicon glyphicon-align-left"></i>比較ポイント</button>
                        <button class="btn btn-danger inline <?php echo isset($mobile) ? 'kz-btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/yougo/'"><i class="ace-icon fa fa-book"></i>用語集</button>
                     </span>
<?php else:?>
                    <h1 class="header kz-list-title lighter sg-list-title">
                      <span class="col-xs-12 col-sm-6 kz-list-title-left">
                        <img src="<?php echo WEBROOT?>assets/img/genre/<?php echo $Genres[$genreID]['icon'];?>" alt="<?php echo $Genres[$genreID]['name']?>">
                      <?php echo $Genres[$genreID]['name']?>用語集
                      </span>
                        <span class="col-xs-12 col-sm-6 align-right inline">
                        <button class="btn btn-info inline <?php echo isset($mobile) ? 'btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/'"><i class="ace-icon fa fa-undo"></i>戻る</button>
                        <?php if($Blogs):?><button class="btn btn-success inline <?php echo isset($mobile) ? 'btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/blog/'"><i class="fa fa-list"></i> 記事一覧</button><?php endif;?>                        
                        <button class="btn btn-warning inline <?php echo isset($mobile) ? 'btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/hikaku/'"><i class="ace-icon glyphicon glyphicon-align-left"></i>比較ポイント</button>
                        <button class="btn btn-danger inline <?php echo isset($mobile) ? 'btn-minier' : 'sg-rad-btn'?>" onclick="location.href='<?php echo WEBROOT?>List/<?php echo $Genres[$genreID]['urlname']?>/yougo/'"><i class="ace-icon fa fa-book"></i>用語集</button>
                      </span>
                    </h1>
<?php endif;?>
<div class="spacer30">
                                <?php foreach($Items as $Item):?>

                                  <h2 class="kz-header kz-header-point"><i class="ace-icon fa fa-pencil-square-o"></i><?php echo $Item['Yougo']['title'];?>
                                  <?php echo $this->Useful->CheckAdminID($UserData['id']) ? '['.$Item['Yougo']['id'].']':'';?>
                                  </h2>
                                  <p>
                                  <?php echo nl2br($Item['Yougo']['comment']);?>
                                  </p>
                                <?php endforeach;?>

          <div class="well well-sm spacer30"> お問い合わせはこちらよりお問い合わせください&nbsp;
            <i class="ace-icon fa fa-hand-o-right blue"></i>
            <a href="<?php echo WEBROOT?>contact/">お問い合わせフォームへ</a><br>
          </div>
</div>
</div>
</div>