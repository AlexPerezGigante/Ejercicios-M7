<?php
require("class.twitter.php");
require("class.pdofactory.php");

$strDSN = "pgsql:dbname=database;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root",array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $objTwitter = new Twitter($objPDO, 2);

    

    $table = "
                <div>
                <h2>Twitter api</h2>
                <table border='1' cellpadding='2' cellspacing='2'
                 style='width: 70%; margin-left: auto; margin-right: auto;'>
                 <tr>
                  <th>ID</th>
                  <th>Url</th>
                  <th>Author name</th>
                  <th>Type</th>
                  <th>Html(compiled)</th>
                  <th>Html(code)</th>
                  </tr>";


   
 $table.="
 </tr><tr>
    <td> ". $objTwitter->getID() . "</td>
    <td> ". $objTwitter->getUrl() . "</td>
    <td> ". $objTwitter->getAuthor_name() . "</td>
    <td> ". $objTwitter->getType() . "</td>
    <td> ". htmlspecialchars_decode($objTwitter->getHtml()) . "</td>
    <td> ". $objTwitter->getHtml() . "</td>
    </tr></table>
</div>";



echo $table;


?>