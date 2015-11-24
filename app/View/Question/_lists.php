
<?php foreach($Questions as $Item):?>
<?php echo $Item['Question']['title']?>
<?php foreach($Item['QuestionValue'] as $ItemVal):?>
<?php echo $ItemVal['value']?>
<?php echo $ItemVal['points']?>
<BR>
<?php endforeach?>
<hr>
<?php endforeach?>
