<?php
require_once('class.DataManagerA.php');

$dataA = new DataManager();

$dataFecha = $dataA-> getAddressData(2);
$dataEmail = $dataA-> getEmailData(2);
$dataPhone = $dataA-> getPhoneNumberData(2);
$dataEntity = $dataA-> getEntityData(2);

echo "getAddressData:";
print_r($dataFecha);
echo "</br>getEmailData:";
print_r($dataEmail);
echo "</br>getPhoneNumberData:";
print_r($dataPhone);
echo "</br>getEntityData:";
print_r($dataEntity);
