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


<script>

function wants(id){

//alert( $( this ).val()); // valueを表示
        $.ajax({
                type: "GET",
                url: "<?php echo WEBROOT?>Ajax/setWant/?itemID="+id,
                success: function(data){
                        if(data != '') {
                            $("#ajwant").html(data)
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