<?php
session_start();
$_SESSION['username'] = $_POST['usuario'];
$_SESSION['userpass'] = $_POST['contra'];

//Check username and password information
if (($_SESSION['username'] == 'Joe') and
    ($_SESSION['userpass'] == '12345')) {
    $_SESSION['cont']+=1;

} else {
    echo 'Sorry, but you don\'t have permission to view this page!';
    exit();     
}
?>
<html>
 <head>
  <title>Contador</title>
 </head>
 <body>
<p>
<?php
echo "Has entrado en la pagina ";
echo $_SESSION['cont'];
echo " veces!";
echo "</p>";
include "ejercicio2.php";
?>
</body>
</html>
