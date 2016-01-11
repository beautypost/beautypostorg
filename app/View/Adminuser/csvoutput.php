<?php

$this->Csv->addRow($th);

foreach($Snsusers as $Item){
    $this->Csv->addField($Item['Snsuser']['id']);
    $this->Csv->addField($Item['Snsuser']['email']);
    $this->Csv->addField($Item['Snsuser']['password']);
    $this->Csv->addField($Item['Snsuser']['name']);
    $this->Csv->addField($Item['Snsuser']['username']);
    $this->Csv->addField($this->Useful->ViewselectValue($Gender['gender'],$Item['Snsuser']['gender']));
    $this->Csv->addField($this->Useful->ViewselectValue($Year['year'],$Item['Snsuser']['year']));
    $this->Csv->addField($this->Useful->ViewselectValue($Month['month'],$Item['Snsuser']['month']));
    $this->Csv->addField($this->Useful->ViewselectValue($Day['day'],$Item['Snsuser']['day']));
    $this->Csv->addField($this->Useful->ViewselectValue($Job['job'],$Item['Snsuser']['job']));
    $this->Csv->addField($this->Useful->ViewselectValue($Mailmagazine['mailmagazine'],$Item['Snsuser']['mailmagazine']));
    $this->Csv->addField($this->Useful->ViewselectValue($Pref['pref'],$Item['Snsuser']['pref']));
    $this->Csv->addField($Item['Snsuser']['address']);
    $this->Csv->addField($this->Useful->ViewselectValue($Skin['skin'],$Item['Snsuser']['skin']));
$this->Csv->endRow();
}



$this->Csv->setFilename($filename);
echo $this->Csv->render(true, 'sjis', 'utf-8');
?>



