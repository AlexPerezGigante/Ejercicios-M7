<?php
        require("abstract.databoundobject.php");
        require("class.pdofactory.php");
        require("class.city.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new City($objPDO);

        $objUser->setCity("Ciudad1");
        $objUser->setCountryId(8);
        $objUser->setLastUpdate("2022-10-21 05:33:40");

        print "City is " . $objUser->getCity() . "<br />";
        print "CountryId is " . $objUser->getCountryId() . "<br />";

        print "LastUpdate is " . $objUser->getLastUpdate() . "<br />";


        print "Saving...<br />";

        $objUser->Save();

        $id = $objUser->getID();
        print "ID in database is " . $id . "<br />";

        print "<br/>Updating City</br>";

        $objUser->setCity("Barcelona");
        $objUser->setCountryId(2);
        $objUser->setLastUpdate("2023-12-02 15:23:45");
        
        print "City Updated is " . $objUser->getCity() . "<br />";
        print "CountryId Updated is " . $objUser->getCountryId() . "<br />";

        print "LastUpdate Updated is " . $objUser->getLastUpdate() . "<br />";

        print "Saving...<br />";
        $objUser->Save();

        print "Destroying object...<br />";
        $objUser->MarkForDeletion();
        unset($objUser);
?>
