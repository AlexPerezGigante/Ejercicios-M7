<?php
        require("abstract.databoundobject.php");
        require("class.pdofactory.php");
        require("class.country.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", 
            array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new Country($objPDO);

        $objUser->setCountry("Italy Delete");
        $objUser->setLastUpdate("2015-01-02 10:02:45");

        print "Country is " . $objUser->getCountry() . "<br />";

        print "LastUpdate is " . $objUser->getLastUpdate() . "<br />";


        print "Saving...<br />";

        $objUser->Save();

        $id = $objUser->getID();
        print "ID in database is " . $id . "<br />";

        print "<br/>Updating country</br>";

        $objUser->setCountry("Bosnia Delete");
        $objUser->setLastUpdate("2019-07-15 23:45:02");
        
        print "Country Updated is " . $objUser->getCountry() . "<br />";

        print "LastUpdate Updated is " . $objUser->getLastUpdate() . "<br />";

        print "Saving...<br />";
        $objUser->Save();

        print "Destroying object...<br />";
        $objUser->MarkForDeletion();
        unset($objUser);
?>
