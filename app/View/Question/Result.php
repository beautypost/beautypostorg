<?php echo $message?>

<hr>
<?php echo $Question['Question']['title']?>
<hr>

<?php foreach($Question['QuestionValue'] as $Item):?>

<?php echo $Item['id']?>:
<?php echo $Item['value']?>:
<?php echo $Item['points']?>

<?php endforeach;?>



