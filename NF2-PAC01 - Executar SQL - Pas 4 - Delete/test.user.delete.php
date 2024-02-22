<?php

        require("class.user2.php");
        require("class.pdofactory.php");

        print "Running...<br />";

        $strDSN = "pgsql:dbname=database;host=localhost;port=5432";
        $objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
        $objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



        $objUser = new User($objPDO);

        $objUser->setFirstName("usuarioDelete1");
        $objUser->setLastName("AusuarioDelete1");
        $objUser->setUsername("UsenameDelete1");
        $objUser->setPassword("password D 1");
        $objUser->setEmailAddress("del1@email.com");
        $objUser->setDateLastLogin("2024-03-25");
        $objUser->setTimeLastLogin("20:20:33");
        $objUser->setDateAccountCreated("2024-03-25");
        $objUser->setTimeAccountCreated("20:20:33");

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

        $objUser2 = new User($objPDO);

        $objUser2->setFirstName("usuarioDelete2");
        $objUser2->setLastName("AusuarioDelete2");
        $objUser2->setUsername("UsenameDelete2");
        $objUser2->setPassword("password D 2");
        $objUser2->setEmailAddress("del2@email.com");
        $objUser2->setDateLastLogin("2003-01-05");
        $objUser2->setTimeLastLogin("15:01:14");
        $objUser2->setDateAccountCreated("2002-06-30");
        $objUser2->setTimeAccountCreated("15:25:43");

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

        $objUser3 = new User($objPDO);

        $objUser3->setFirstName("usuarioDelete3");
        $objUser3->setLastName("AusuarioDelete3");
        $objUser3->setUsername("UsenameDelete3");
        $objUser3->setPassword("password D 3");
        $objUser3->setEmailAddress("del3@email.com");
        $objUser3->setDateLastLogin("2015-02-24");
        $objUser3->setTimeLastLogin("14:35:14");
        $objUser3->setDateAccountCreated("2010-06-29");
        $objUser3->setTimeAccountCreated("23:48:01");

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


        $objUser->Save();
        $objUser2->Save();
        $objUser3->Save();

        $auxiliar = '';
        $auxiliar = $objUser2->getFirstName();
        $objUser2->setFirstName($objUser->getFirstName());
        $objUser->setFirstName($auxiliar);
        $auxiliar = $objUser2->getLastName();
        $objUser2->setLastName($objUser->getLastName());
        $objUser->setLastName($auxiliar);
        $auxiliar = $objUser2->getUsername();
        $objUser2->setUsername($objUser->getUsername());
        $objUser->setUsername($auxiliar);
        $auxiliar = $objUser2->getPassword();
        $objUser2->setPassword($objUser->getPassword());
        $objUser->setPassword($auxiliar);
        $auxiliar = $objUser2->getEmailAddress();
        $objUser2->setEmailAddress($objUser->getEmailAddress());
        $objUser->setEmailAddress($auxiliar);
        $auxiliar = $objUser2->getDateLastLogin();
        $objUser2->setDateLastLogin($objUser->getDateLastLogin());
        $objUser->setDateLastLogin($auxiliar);
        $auxiliar = $objUser2->getTimeLastLogin();
        $objUser2->setTimeLastLogin($objUser->getTimeLastLogin());
        $objUser->setTimeLastLogin($auxiliar);
        $auxiliar = $objUser2->getDateAccountCreated();
        $objUser2->setDateAccountCreated($objUser->getDateAccountCreated());
        $objUser->setDateAccountCreated($auxiliar);
        $auxiliar = $objUser2->getTimeAccountCreated();
        $objUser2->setTimeAccountCreated($objUser->getTimeAccountCreated());
        $objUser->setTimeAccountCreated($auxiliar);

        $objUser3->setFirstName("usuarioDelete3Actualizado");
        $objUser3->setLastName("AusuarioDelete2Actualizado");
        $objUser3->setUsername("UsenameDelete2Actualizado");
        $objUser3->setPassword("password D 2Actualizado");
        $objUser3->setEmailAddress("del2@emailActualizado.com");
        $objUser3->setDateLastLogin("2013-01-05");
        $objUser3->setTimeLastLogin("15:21:14");
        $objUser3->setDateAccountCreated("2012-08-31");
        $objUser3->setTimeAccountCreated("02:01:02");

        $objUser->Save();
        $objUser2->Save();
        $objUser3->Save();
       
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

        $objUser->MarkForDeletion();
	unset($objUser);

        $objUser2->MarkForDeletion();
	unset($objUser2);

        $objUser3->MarkForDeletion();
	unset($objUser3);

