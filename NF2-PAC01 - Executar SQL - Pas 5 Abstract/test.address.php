<?php
        require("abstract.databoundobject.php");
        require("class.pdofactory.php");
        require("class.address.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new Address($objPDO);

        $objUser->setAddress("Calle1");
        $objUser->setAddress2("Calle2");
        $objUser->setDistrict("District1");

        $objUser->setCityId(2);
        $objUser->setPostalCode(111111);
        $objUser->setPhone(123456789);
        $objUser->setLastUpdate("2021-08-20 14:25:30");

        print "Address is " . $objUser->getAddress() . "<br />";
        print "Address2 is " . $objUser->getAddress2() . "<br />";
        print "District is " . $objUser->getDistrict() . "<br />";
        print "CityId is " . $objUser->getCityId() . "<br />";

        print "PostalCode is " . $objUser->getPostalCode() . "<br />";
        print "Address2 is " . $objUser->getLastName() . "<br />";
        print "Phone is " . $objUser->getPhone() . "<br />";
        print "LastUpdate is " . $objUser->getLastUpdate() . "<br />";


        print "Saving...<br />";

        $objUser->Save();

        $id = $objUser->getID();
        print "ID in database is " . $id . "<br />";

        print "<br/>Updating Address</br>";

        $objUser->setAddress("CalleActualizada1");
        $objUser->setAddress2("CalleActualizada2");
        $objUser->setDistrict("DistrictActualizado1");

        $objUser->setCityId(4);
        $objUser->setPostalCode(121212);
        $objUser->setPhone(333333333);
        $objUser->setLastUpdate("2001-02-19 22:00:33");
        
        print "UAddress is " . $objUser->getAddress() . "<br />";
        print "UAddress2 is " . $objUser->getAddress2() . "<br />";
        print "UDistrict is " . $objUser->getDistrict() . "<br />";
        print "UCityId is " . $objUser->getCityId() . "<br />";

        print "UPostalCode is " . $objUser->getPostalCode() . "<br />";
        print "UAddress2 is " . $objUser->getLastName() . "<br />";
        print "UPhone is " . $objUser->getPhone() . "<br />";
        print "ULastUpdate is " . $objUser->getLastUpdate() . "<br />";

        print "Saving...<br />";
        $objUser->Save();

        print "Destroying object...<br />";
        $objUser->MarkForDeletion();
        unset($objUser);
?>
