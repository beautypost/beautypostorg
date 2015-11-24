<hr>
<form method="get" action="<?php echo WEBROOT?>List/">
機種
<select name="data[GenreKisyu]">
<?php echo $this->Useful->option2($GenreKisyu,'Genre','title',$data['GenreKisyu'])?>
</select>
目的
<select name="data[GenrePurposes]">
<?php echo $this->Useful->option2($GenrePurposes,'Genre','title',$data['GenrePurposes'])?>
</select>
ポイント
<select name="data[GenrePoints]">
<?php echo $this->Useful->option2($GenrePoints,'Genre','title',$data['GenrePoints'])?>
</select>
メーカー
<select name="data[GenreMakers]">
<?php echo $this->Useful->option2($GenreMakers,'Genre','title',$data['GenreMakers'])?>
</select>
値段
<select name="data[GenrePrices]">
<?php echo $this->Useful->option($GenrePrices,$data['GenrePrices'])?>
</select>

<input type="submit">
	</form>




<hr>