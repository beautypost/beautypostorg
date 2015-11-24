
<form action="<?php echo WEBROOT?>TwLogin/twitterLogin">
<input  type="submit" value="Twitter で Login"/></form>

ログイン済みです。
<?php echo $user['TwUser']['username']; ?>
<a href="<?php echo WEBROOT?>TwLogin/Logout">logout</a>
