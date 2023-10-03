<?php
session_unset();
?>
<html>
 <head>
  <title>Please Log In</title>
 </head>
 <body>
  
  <form method="post" action="ejercicio6final.php">
   <p>Usuario: 
    <input type="text" name="usuario"/>
   </p>
   <p>Contraseña: 
    <input type="password" name="contra"/>
   </p>
   <p>
    <input type="submit" name="submit" value="Submit"/>
   </p>
  </form>
<?php include "ejercicio2.php";?>
 </body>
</html>
