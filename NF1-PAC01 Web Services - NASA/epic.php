<?php
require("class.epic.php");
require("class.pdofactory.php");
// require("abstract.databoundobject.php");



$strDSN = "pgsql:dbname=database;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    $html = file_get_contents("https://api.nasa.gov/EPIC/api/natural/date/2024-04-01?api_key=6J4svqcOu2frR97o8HUU45JmgqFiYcFIzfDwxduP");


    $json = json_decode($html);
    

    $identifier = $json[0]->identifier;
    // $identifier = intval($identifier);

    $caption = $json[0]->caption;
    $date = $json[0]->date;
    $image = $json[0]->image;
    $version = $json[0]->version;



    $objEpic = new Epic($objPDO);

    $objEpic->setIdentifier($identifier);
    $objEpic->setCaption($caption) ;
    $objEpic->setDate($date) ;
    $objEpic->setImage($image);
    $objEpic->setVersion($version);

    $objEpic->Save();

    print "id: " . $objEpic->getID() . "</br>";
    print "ident: " . $objEpic->getIdentifier() ."</br>";
    print "caption: " . $objEpic->getCaption() ."</br>";
    print "date: " . $objEpic->getDate() ."</br>";
    print "image: " . $objEpic->getImage() ."</br>";
    print "version: " . $objEpic->getVersion() ."</br>";

    $table = "
                <div>
                <h2>Epic Api Nasa</h2>
                <table border='1' cellpadding='2' cellspacing='2'
                 style='width: 70%; margin-left: auto; margin-right: auto;'>
                 <tr>
                  <th>Id in database</th>
                  <th>Identifier</th>
                  <th>Caption</th>
                  <th>Date</th>
                  <th>Image</th>
                  <th>Version</th>
                  </tr>";

   
 $table.="
 </tr><tr>
    <td> ". $objEpic->getID() . "</td>
    <td> ". $objEpic->getIdentifier() . "</td>
    <td> ". $objEpic->getCaption() . "</td>
    <td> ". $objEpic->getDate() . "</td>
    <td> ". $objEpic->getImage() . "</td>
    <td> ". $objEpic->getVersion() . "</td>
    </tr></table>
</div>";



echo $table;


?>