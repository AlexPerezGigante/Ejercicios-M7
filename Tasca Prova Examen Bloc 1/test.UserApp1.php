<?php
        require("abstract.databoundobject.php");
        require("class.pdofactory.php");
        require("class.userApp.php");

        

        print "Running...<br />";

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $objUser = new UserApp($objPDO);

        $objUser->setNom("nom1");
        $objUser->setGroup("Grup1");
        $objUser->setCreated("2014-02-02 12:25:14");
        $objUser->setLastUpdate("2015-01-02 10:02:45");
        $objUser->setIsActive(true);
        print "Saving...<br />";
        $objUser->Save();

        

        
        $id = $objUser->getID();
        print "ID in database is " . $id . "<br />";
        print "nom is " . $objUser->getNom() . "<br />";
        print "Group is " . $objUser->getGroup() . "<br />";
        print "Created is " . $objUser->getCreated() . "<br />";
        print "LastUpdate is " . $objUser->getLastUpdate() . "<br />";
        print "Is active:  " . $objUser->getIsActive() . "<br />";


        $objUser2 = new UserApp($objPDO);

        $objUser2->setNom("nom2");
        $objUser2->setGroup("Grup2");
        $objUser2->setCreated("2015-03-10 14:15:45");
        $objUser2->setLastUpdate("2016-01-22 11:24:01");
        $objUser2->setIsActive(true);
        print "</br>Saving...<br />";
        $objUser2->Save();


        $id = $objUser2->getID();
        print "ID in database is " . $id . "<br />";
        print "nom is " . $objUser2->getNom() . "<br />";
        print "Group is " . $objUser2->getGroup() . "<br />";
        print "Created is " . $objUser2->getCreated() . "<br />";
        print "LastUpdate is " . $objUser2->getLastUpdate() . "<br />";
        print "Is active:  " . $objUser2->getIsActive() . "<br />";

        $objUser3 = new UserApp($objPDO);

        $objUser3->setNom("nom3");
        $objUser3->setGroup("Grup3");
        $objUser3->setCreated("2016-01-15 01:55:35");
        $objUser3->setLastUpdate("2022-11-25 15:40:33");
        $objUser3->setIsActive(true);
        print "</br>Saving...<br />";
        $objUser3->Save();


        $id = $objUser3->getID();
        print "ID in database is " . $id . "<br />";
        print "nom is " . $objUser3->getNom() . "<br />";
        print "Group is " . $objUser3->getGroup() . "<br />";
        print "Created is " . $objUser3->getCreated() . "<br />";
        print "LastUpdate is " . $objUser3->getLastUpdate() . "<br />";
        print "Is active:  " . $objUser3->getIsActive() . "<br />";

        

        

        

        print "<br/>Updating Item 3</br></br>";

        $objUser3->setNom("nom3 Modificado");
        $objUser3->setGroup("Grup3 Modificado");
        $objUser3->setCreated("2023-05-06 15:35:44");
        $objUser3->setLastUpdate("2024-02-26 02:25:14");
        $objUser3->setIsActive(0);
        
        $id = $objUser3->getID();
        print "ID in database is " . $id . "<br />";
        print "nom is " . $objUser3->getNom() . "<br />";
        print "Group is " . $objUser3->getGroup() . "<br />";
        print "Created is " . $objUser3->getCreated() . "<br />";
        print "LastUpdate is " . $objUser3->getLastUpdate() . "<br />";
        print "Is active:  " . $objUser3->getIsActive() . "<br />";

        print "Saving...<br />";
        $objUser3->Save();

        print "Destroying object...<br />";
        $objUser3->MarkForDeletion();
        unset($objUser3);
?>
