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
<body id="pagetop"  <?php if($bodyclass):?>class="<?php echo $bodyclass?>"<?php endif;?>>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.5&appId=176047709119503";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php echo $this->element('common/googleAnalytics')?>
<div class="menu-overlay">&#8203;</div>
<div id="wrapper"><div id="wrap-inner">
<!--
====================================================================================================
 Site Common Header                                                                    #site-header
==================================================================================================== -->
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->

            <?php echo $this->Session->flash(); ?>

            <?php echo $this->fetch('content'); ?>
<!--
====================================================================================================
 Column Footer                                                                       #column-footer
==================================================================================================== -->
<footer id="column-footer">
  <div class="layout">
    <nav id="column-fnav">
      <ul>
        <li><a href="<?php echo WEBROOT?>"><i class="fa fa-home">&#8203;</i> ホーム</a></li>
        <li><a href="<?php echo WEBROOT?>"><i class="fa fa-pencil">&#8203;</i> ライター募集</a></li>
        <li><a href="<?php echo WEBROOT?>"><i class="fa fa-building">&#8203;</i> 運営者会社</a></li>
        <li><a href="<?php echo WEBROOT?>"><i class="fa fa-envelope-o">&#8203;</i> お問い合わせ</a></li>
      </ul>
    </nav><!-- /#column-fnav -->
  </div>
  <div id="column-copyright">
    <div class="layout"><p><small>Copyright 2015 Beauty Post. All Rights Reserved.</small></p></div>
  </div><!-- /#copyright -->
</footer><!-- /#column-footer -->
<!--
==================================================================================================== -->

</div></div><!-- /#wrapper>/#wrapper -->
<script src="https://apis.google.com/js/platform.js" async defer>
  {lang: 'ja'}
</script>
</body>
</html>
            <?php echo $this->element('sql_dump'); ?>