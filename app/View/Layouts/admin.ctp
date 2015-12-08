<?php $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php echo $this->Html->charset(); ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>BeautyPost</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="<?php echo WEBROOT?>js/jquery.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo WEBROOT?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo WEBROOT?>assets/css/font-awesome.min.css" />

        <script src="<?php echo WEBROOT;?>js/tinymce/tinymce.min.js"></script>


<script language="javascript" type="text/javascript">
tinyMCE.init({
    mode : "textareas",
    theme : "modern",
    plugins : "spellchecker,pagebreak,layer,table,save,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,template",

    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // WYSIWYGエディタに適用する CSSファイルを指定する
    content_css : "styles.css",
});
</script>


<script type="text/javascript"><!--
   function dispCheck(uri) {
     // 選択結果で分岐
      if( window.confirm('削除してよろしいですか？') == true ) {
         // OKなら移動
         window.location = uri;
      }
   }
// -->
</script>

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo WEBROOT?>assets/css/ace-fonts.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo WEBROOT?>assets/css/ace.min.css" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo WEBROOT?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo WEBROOT?>assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?php echo WEBROOT?>assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="../assets/js/html5shiv.min.js"></script>
        <script src="../assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

<body class="no-skin">

        <div id="navbar" class="navbar navbar-default">
            <script type="text/javascript">
                try{ace.settings.check('navbar' , 'fixed')}catch(e){}
            </script>

            <div class="navbar-container" id="navbar-container">
                <!-- /section:basics/sidebar.mobile.toggle -->
                <div class="navbar-header pull-left">
                    <!-- #section:basics/navbar.layout.brand -->
                    <a href="#" class="navbar-brand">
                        <small>
                            Beauty Post Admin
                        </small>
                    </a>

                    <!-- /section:basics/navbar.layout.brand -->

                    <!-- #section:basics/navbar.toggle -->

                    <!-- /section:basics/navbar.toggle -->
                </div>
            </div>
        </div>

        <div class="main-container" id="main-container">
            <script type="text/javascript">
                try{ace.settings.check('main-container' , 'fixed')}catch(e){}
            </script>

            <!-- #section:basics/sidebar -->
            <div id="sidebar" class="sidebar responsive">

                <ul class="nav nav-list">
                    <li class="<?php $this->Beautypost->cssActive('Adminquestion')?>">
                       <a href="<?php echo WEBROOT?>Adminquestion">
                            <i class="menu-icon fa fa-pencil-square-o"></i><span class="menu-text">アンケート管理</span>
                       </a>
                        <!-- 選択時-->
                        <b class="arrow"></b>
                    </li>

                    <li class="<?php $this->Beautypost->cssActive('Adminnews')?>">
                       <a href="<?php echo WEBROOT?>Adminkeyword">
                            <i class="menu-icon fa fa-bullhorn"></i><span class="menu-text">キーワード管理</span>
                       </a>
                    </li>
                    <li class="<?php $this->Beautypost->cssActive('Adminblog')?>">
                       <a href="<?php echo WEBROOT?>Adminblog">
                            <i class="menu-icon fa fa-file-text-o"></i><span class="menu-text">お役立ち美容通信管理</span>
                       </a>
                    </li>
                    <li class="<?php $this->Beautypost->cssActive('Admincolumn')?>">
                       <a href="<?php echo WEBROOT?>Admincolumn">
                            <i class="menu-icon fa fa-chevron-right"></i><span class="menu-text">コラム</span>
                       </a>
                    </li>
                    <li class="<?php $this->Beautypost->cssActive('Adminfavorite')?>">
                       <a href="<?php echo WEBROOT?>Adminfavorite">
                            <i class="menu-icon fa fa-chevron-left"></i><span class="menu-text">BeautyPostおすすめ</span>
                       </a>
                    </li>
                    <li class="<?php $this->Beautypost->cssActive('Admintype')?>">
                       <a href="<?php echo WEBROOT?>Admintype">
                            <i class="menu-icon fa fa-bookmark-o"></i><span class="menu-text">用語集</span>
                       </a>
                    </li>

                    <li class="<?php $this->Beautypost->cssActive('Adminitem')?>">
                       <a href="<?php echo WEBROOT?>Adminitem">
                            <i class="menu-icon fa fa-briefcase"></i><span class="menu-text">商品管理</span>
                       </a>
                    </li>
                    <li class="<?php $this->Beautypost->cssActive('Adminuser')?>">
                       <a href="<?php echo WEBROOT?>Adminuser">
                            <i class="menu-icon fa fa-users"></i><span class="menu-text">ユーザー管理</span>
                       </a>
                    </li>
                    <li class="<?php $this->Beautypost->cssActive('Adminmaster')?>">
                       <a href="<?php echo WEBROOT?>Adminmaster">
                            <i class="menu-icon fa fa-book"></i><span class="menu-text">マスタ管理</span>
                       </a>
                    </li>

<!--
                    <li class="<?php $this->Beautypost->cssActive('Adminmailmagazine')?>">
                       <a href="<?php echo WEBROOT?>Adminmailmagazine">
                            <i class="menu-icon fa fa-envelope"></i><span class="menu-text">メルマガ管理</span>
                       </a>
                    </li>
-->

    </ul>

    </div>
            <div class="main-content">
                <!-- /section:basics/content.breadcrumbs -->
                <div class="page-content">

            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('sql_dump'); ?>
        </div>
    </div>

    </body>
</html>

