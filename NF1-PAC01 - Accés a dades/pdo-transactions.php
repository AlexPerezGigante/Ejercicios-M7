<?php

require("class.pdofactory.php");
print "Running...<br />";

$strDSN = "pgsql:dbname=database;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

	// begin the transaction

	$strQuery1 = "INSERT INTO userapp (\"nom\", \"group\", \"isActive\") VALUES ('Cardinal', 'GroupCar', false)";
	$strQuery2 = "INSERT INTO ERRORuserapp (\"nom\", \"group\", \"isActive\") VALUES ('Memphis', 'GroupMem',  true)";	

	$objPDO->beginTransaction();

	$objPDO->exec($strQuery1);
	$objPDO->exec($strQuery2);

	// commit the transaction
	$objPDO->commit();

} catch (Exception $e) {

	// rollback the transaction
	$objPDO->rollBack();
	echo "Failed: ".$e->getMessage();
}