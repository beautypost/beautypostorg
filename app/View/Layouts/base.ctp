<?php $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<?php echo $this->Html->charset(); ?>

		<title><?php echo $metaData['Pagetitle']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/font-awesome.min.css" />



		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/ace.min.css" id="main-ace-style" />

		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/kz-css.css" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo WEBROOT;?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?PHP echo WEBROOT?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo WEBROOT;?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->


		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?PHP echo WEBROOT?>assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?PHP echo WEBROOT?>assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?PHP echo WEBROOT?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?PHP echo WEBROOT?>assets/js/bootstrap.min.js"></script>


<script src="<?php echo WEBROOT?>raty/lib/jquery.raty.js"></script>
<script src="<?php echo WEBROOT?>raty/javascripts/labs.js" type="text/javascript"></script>


<!-- Facebook Conversion Code for 投票 -->
<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6020462925316', {'value':'0.00','currency':'JPY'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6020462925316&amp;cd[value]=0.00&amp;cd[currency]=JPY&amp;noscript=1" /></noscript>

	</head>

	<body class="no-skin kz-body">

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
        	<?php echo $this->element('sql_dump'); ?>




								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->

<?php if($_SERVER["HTTP_HOST"] != 'localhost'):?>
		<!-- basic scripts -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53636116-1', 'auto');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');

</script>
<?php endif;?>

	</body>
</html>

