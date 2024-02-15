<?php

        require("class.user.select.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $objUser = new User($objPDO, 1);
        print "Primer usuario: <br />";
        print "ID: " . $objUser->getID() . "<br />";
        print "First name is " . $objUser->getFirstName() . "<br />";
        print "Last name is " . $objUser->getLastName() . "<br />";
        print "Password is " . $objUser->getUsername() . "<br />";
        print "Username is " . $objUser->getPassword() . "<br />";
        print "Email is " . $objUser->getEmailAddress() . "<br />";
        print "Date last login is " . $objUser->getDateLastLogin() . "<br />";
        print "Time last login is " . $objUser->getTimeLastLogin() . "<br />";
        print "Date account created is " . $objUser->getDateAccountCreated() . "<br />";
        print "Time account created is " . $objUser->getTimeAccountCreated() . "<br/><br/>";

        $objUser2 = new User($objPDO, 2);
        print "Segundo usuario: <br />";
        print "ID: " . $objUser2->getID() . "<br />";
        print "First name is " . $objUser2->getFirstName() . "<br />";
        print "Last name is " . $objUser2->getLastName() . "<br />";
        print "Password is " . $objUser2->getUsername() . "<br />";
        print "Username is " . $objUser2->getPassword() . "<br />";
        print "Email is " . $objUser2->getEmailAddress() . "<br />";
        print "Date last login is " . $objUser2->getDateLastLogin() . "<br />";
        print "Time last login is " . $objUser2->getTimeLastLogin() . "<br />";
        print "Date account created is " . $objUser2->getDateAccountCreated() . "<br />";
        print "Time account created is " . $objUser2->getTimeAccountCreated() . "<br/><br/>";

        $objUser3 = new User($objPDO, 3);
        print "Tercer usuario: <br />";
        print "ID: " . $objUser3->getID() . "<br />";
        print "First name is " . $objUser3->getFirstName() . "<br />";
        print "Last name is " . $objUser3->getLastName() . "<br />";
        print "Password is " . $objUser3->getUsername() . "<br />";
        print "Username is " . $objUser3->getPassword() . "<br />";
        print "Email is " . $objUser3->getEmailAddress() . "<br />";
        print "Date last login is " . $objUser3->getDateLastLogin() . "<br />";
        print "Time last login is " . $objUser3->getTimeLastLogin() . "<br />";
        print "Date account created is " . $objUser3->getDateAccountCreated() . "<br />";
        print "Time account created is " . $objUser3->getTimeAccountCreated() . "<br/><br/>";
        
        



?>
