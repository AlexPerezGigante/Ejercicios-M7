<?php

    require("class.customer.php");

    $c1 = new Customer();
    $c1->setCust_code(1);
    $c1->setCust_name("Pepe");
    $c1->setCust_city('Barcelona');
    $c1->setWorking_area("Commercial");
    $c1->setCust_country("Spain");
    $c1->setGrade(2);
    $c1->setOpening_amt(1);
    $c1->setRecieve_amt(23);
    $c1->setPayment_amt(44);
    $c1->setOutstanding_amt(2);
    $c1->setPhone_no("111111111");
    $c1->setAgent_code("123456");

    $c2 = new Customer();
    $c2->setCust_code(2);
    $c2->setCust_name("Juan");
    $c2->setCust_city('Castellón');
    $c2->setWorking_area("Sales");
    $c2->setCust_country("Spain");
    $c2->setGrade(5);
    $c2->setOpening_amt(10);
    $c2->setRecieve_amt(445);
    $c2->setPayment_amt(33);
    $c2->setOutstanding_amt(60);
    $c2->setPhone_no("222222222");
    $c2->setAgent_code("987654");

    echo "<ul> C1";
    echo "<li>Cust_code: " . $c1->getCust_code() . "</li>";
    echo "<li>Cust_name: " . $c1->getCust_name() . "</li>";
    echo "<li>Cust_city: " . $c1->getCust_city() . "</li>";
    echo "<li>Working_area: " . $c1->getWorking_area() . "</li>";
    echo "<li>Cust_country: " . $c1->getCust_country() . "</li>";
    echo "<li>Grade: " . $c1->getGrade() . "</li>";
    echo "<li>Opening_amt: " . $c1->getOpening_amt() . "</li>";
    echo "<li>Recieve_amt: " . $c1->getRecieve_amt() . "</li>";
    echo "<li>Payment_amt: " . $c1->getPayment_amt() . "</li>";
    echo "<li>Outstanding_amt: " . $c1->getOutstanding_amt() . "</li>";
    echo "<li>Phone_no: " . $c1->getPhone_no() . "</li>";
    echo "<li>Agent_code: " . $c1->getAgent_code() . "</li>";
    echo "</ul>";

    echo "<ul> C2";
    echo "<li>Cust_code: " . $c2->getCust_code() . "</li>";
    echo "<li>Cust_name: " . $c2->getCust_name() . "</li>";
    echo "<li>Cust_city: " . $c2->getCust_city() . "</li>";
    echo "<li>Working_area: " . $c2->getWorking_area() . "</li>";
    echo "<li>Cust_country: " . $c2->getCust_country() . "</li>";
    echo "<li>Grade: " . $c2->getGrade() . "</li>";
    echo "<li>Opening_amt: " . $c2->getOpening_amt() . "</li>";
    echo "<li>Recieve_amt: " . $c2->getRecieve_amt() . "</li>";
    echo "<li>Payment_amt: " . $c2->getPayment_amt() . "</li>";
    echo "<li>Outstanding_amt: " . $c2->getOutstanding_amt() . "</li>";
    echo "<li>Phone_no: " . $c2->getPhone_no() . "</li>";
    echo "<li>Agent_code: " . $c2->getAgent_code() . "</li>";
    echo "</ul>";

    $auxiliar = '';
    $auxiliar = $c2->getCust_code();
    $c2->setCust_code($c1->getCust_code());
    $c1->setCust_code($auxiliar);
    $auxiliar = $c2->getCust_name();
    $c2->setCust_name($c1->getCust_name());
    $c1->setCust_name($auxiliar);
    $auxiliar = $c2->getCust_city();
    $c2->setCust_city($c1->getCust_city());
    $c1->setCust_city($auxiliar);
    $auxiliar = $c2->getWorking_area();
    $c2->setWorking_area($c1->getWorking_area());
    $c1->setWorking_area($auxiliar);
    $auxiliar = $c2->getCust_country();
    $c2->setCust_country($c1->getCust_country());
    $c1->setCust_country($auxiliar);
    $auxiliar = $c2->getGrade();
    $c2->setGrade($c1->getGrade());
    $c1->setGrade($auxiliar);
    $auxiliar = $c2->getOpening_amt();
    $c2->setOpening_amt($c1->getOpening_amt());
    $c1->setOpening_amt($auxiliar);
    $auxiliar = $c2->getRecieve_amt();
    $c2->setRecieve_amt($c1->getRecieve_amt());
    $c1->setRecieve_amt($auxiliar);
    $auxiliar = $c2->getPayment_amt();
    $c2->setPayment_amt($c1->getPayment_amt());
    $c1->setPayment_amt($auxiliar);
    $auxiliar = $c2->getOutstanding_amt();
    $c2->setOutstanding_amt($c1->getOutstanding_amt());
    $c1->setOutstanding_amt($auxiliar);
    $auxiliar = $c2->getPhone_no();
    $c2->setPhone_no($c1->getPhone_no());
    $c1->setPhone_no($auxiliar);
    $c1->setAgent_code("123456");
    $auxiliar = $c2->getAgent_code();
    $c2->setAgent_code($c1->getAgent_code());
    $c1->setAgent_code($auxiliar);

    echo "<ul> C1 intercambiado";
    echo "<li>Cust_code: " . $c1->getCust_code() . "</li>";
    echo "<li>Cust_name: " . $c1->getCust_name() . "</li>";
    echo "<li>Cust_city: " . $c1->getCust_city() . "</li>";
    echo "<li>Working_area: " . $c1->getWorking_area() . "</li>";
    echo "<li>Cust_country: " . $c1->getCust_country() . "</li>";
    echo "<li>Grade: " . $c1->getGrade() . "</li>";
    echo "<li>Opening_amt: " . $c1->getOpening_amt() . "</li>";
    echo "<li>Recieve_amt: " . $c1->getRecieve_amt() . "</li>";
    echo "<li>Payment_amt: " . $c1->getPayment_amt() . "</li>";
    echo "<li>Outstanding_amt: " . $c1->getOutstanding_amt() . "</li>";
    echo "<li>Phone_no: " . $c1->getPhone_no() . "</li>";
    echo "<li>Agent_code: " . $c1->getAgent_code() . "</li>";
    echo "</ul>";

    echo "<ul> C2 intercambiado";
    echo "<li>Cust_code: " . $c2->getCust_code() . "</li>";
    echo "<li>Cust_name: " . $c2->getCust_name() . "</li>";
    echo "<li>Cust_city: " . $c2->getCust_city() . "</li>";
    echo "<li>Working_area: " . $c2->getWorking_area() . "</li>";
    echo "<li>Cust_country: " . $c2->getCust_country() . "</li>";
    echo "<li>Grade: " . $c2->getGrade() . "</li>";
    echo "<li>Opening_amt: " . $c2->getOpening_amt() . "</li>";
    echo "<li>Recieve_amt: " . $c2->getRecieve_amt() . "</li>";
    echo "<li>Payment_amt: " . $c2->getPayment_amt() . "</li>";
    echo "<li>Outstanding_amt: " . $c2->getOutstanding_amt() . "</li>";
    echo "<li>Phone_no: " . $c2->getPhone_no() . "</li>";
    echo "<li>Agent_code: " . $c2->getAgent_code() . "</li>";
    echo "</ul>";