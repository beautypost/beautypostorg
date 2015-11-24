
  <a href="<?php echo WEBROOT?>Type/Index/1">あ</a>
  <a href="<?php echo WEBROOT?>Type/Index/2">か</a>
  <a href="<?php echo WEBROOT?>Type/Index/3">さ</a>
<br>

<?php foreach($Types as $k => $v):?>
<a href="<?php echo WEBROOT?>Type/detail/<?php echo $v['Type']['id']?>">
<?php echo $v['Type']['title']?>
</a>
<?php endforeach;?>


