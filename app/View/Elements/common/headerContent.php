<?php
if($this->name == 'Index'){
    $logo = '<img src="'.WEBROOT.'common-img/logo.png" width="576" height="144" alt="美容機器コレクション Beauty Post" class="logo fitimg-w">';
}else{
    $logo = '<a href="'.$this->webroot.'"><img src="'.$this->webroot.'common-img/logo.png" width="576" height="144" alt="美容機器コレクション Beauty Post" class="logo fitimg-w"></a>';
}
?>
<div class="layout">
        <h1 id="site-title"><span class="rsp-xxxo">美容機器・美顔器をはじめとする美容機器比較サイト 美容機器コレクション<br></span><?php echo $logo?></h1>

        <div class="head-body rsp-xxoo">
            <p class="rsp-xxoo"><span class="attention">今日の紫外線度数</span><span class="attention">美容の最新ニュース</span><br class="rsp-oxxx">をお届け！<span class="wsnw">他にも特典が満載！</span></p>
<?php if(!isset($UserData['Snsuser']['id'])):?>
            <a href="<?php echo $this->webroot?>Login/" class="button btn-rich-vpk"><span>Beauty Post メンバー登録</span></a>
<?php else:?>
            <div id="welcome">
                ようこそ<?php echo $UserData['Snsuser']['username']?>さん <a href="<?php echo WEBROOT?>Login/logout">ログアウト</a>
            </div><!-- /#welcome -->
<?php endif;?>
        </div><!-- /.head-body -->
    </div><!-- /.layout -->