<?php var_dump($Question)?>
<hr>
<?php echo $Question['Question']['title']?>
<hr>
<form method="post" action="<?php echo WEBROOT?>Question/Vote">

<?php foreach($Question['QuestionValue'] as $Item):?>

<input type=radio name="data[question_value_id]" value="<?php echo $Item['id']?>">
<?php echo $Item['value']?>

<?php endforeach;?>
<input type="hidden" name="data[question_id]" value="<?php echo $Question['Question']['id']?>
">
<input type="submit">
    </form>