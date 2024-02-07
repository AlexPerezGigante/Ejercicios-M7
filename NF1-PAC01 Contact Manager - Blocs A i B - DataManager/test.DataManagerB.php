<?php
require_once('class.DataManagerB.php');


$dataB = new DataManager();

$dataBFecha = $dataB-> getAddressObjectsForEntity(3);
$dataBEmail = $dataB-> getEmailObjectsForEntity(2);
$dataBPhone = $dataB-> getPhoneNumberObjectsForEntity(4);


print_r($dataBFecha[0]->getId());
print_r($dataBEmail[0]->getId());
print_r($dataBPhone[0]->getId());