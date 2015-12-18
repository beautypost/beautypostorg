<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Beauty Post</title>
<meta name="description" content="">
<meta name="keywords" content="">
<?php echo $this->element('common/headContent'); ?>
<?php echo $this->element('common/headContent_css',array('cssname'=>$cssname)); ?>
<script src="<?php echo WEBROOT?>js/jquery.js"></script>
<script src="<?php echo WEBROOT?>raty/lib/jquery.raty.js"></script>
<link rel="stylesheet" href="<?php echo WEBROOT?>raty/lib/jquery.raty.css">
<script src="<?php echo WEBROOT?>Chart/Chart.js"></script>

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
<header id="site-header">
    <?php echo $this->element('common/headerContent'); ?>
    <?php echo $this->element('common/headerGnav'); ?>
</header><!-- /#site-header -->
<!--
====================================================================================================
 Contents                                                                                #page-area
==================================================================================================== -->

            <?php echo $this->Session->flash(); ?>



<script type="text/javascript">
    function ratystar(id){
            $('.star'+id).raty( {
             readOnly: true,
             space:false,
             score: function() {
                return $(this).attr('data-score');
             },
             path: '<?php echo WEBROOT?>raty/lib/revimages'
            });
            $('.starrev'+id).raty( {
             readOnly: true,
             space:false,
             score: function() {
                return $(this).attr('data-score');
             },
             path: '<?php echo WEBROOT?>raty/lib/images'
            });
        }

    function wants(id){
            $.ajax({
                    type: "GET",
                    url: "<?php echo WEBROOT?>Ajax/setWant/?itemID="+id,
                    success: function(data){
                            if(data != '') {
                                $("#ajwant"+id).html(data)
                            }
                    }
            });
    }
    </script>

            <?php echo $this->fetch('content'); ?>
<!--
====================================================================================================
 Site Common Footer                                                                    #site-footer
==================================================================================================== -->
<?php echo $this->element('common/footerContent'); ?>
<!--
==================================================================================================== -->
</div></div><!-- /#wrapper>/#wrapper -->
<?php echo $this->element('common/lastContent'); ?>
</body>
</html>
            <?php echo $this->element('sql_dump'); ?>