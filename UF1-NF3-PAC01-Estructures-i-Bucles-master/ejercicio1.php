<html>
<head>
<title> Ejercicio 1</title>
</head>
<body>
<div>
<?php
date_default_timezone_set("America/New_York");
echo "Two day ago it was ";
$dosDiasAnterior = date("M d Y", mktime(0, 0, 0, date("m"), date("d")-2, date("Y")));
echo $dosDiasAnterior;
echo "<br/>";
echo "The next month is ";
echo date("F",mktime(0,0,0,date("m"),date("d"),date("y")));
echo "<br/>";
echo "There are ";
echo date("t",mktime(0,0,0,date("m")+1,date("d"),date("y")));
echo " days left in next month";
echo "<br/>";
$mes = 12-date("m");
echo "There are ";
echo $mes;
echo " months left in the current year";
?>
<br/>
</div>
</body>
</html>