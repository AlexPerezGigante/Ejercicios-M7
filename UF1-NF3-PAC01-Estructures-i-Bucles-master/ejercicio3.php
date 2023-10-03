<html>
<head>
<title> Ejercicio 3</title>
</head>
<body>
<div>
<?php
date_default_timezone_set("America/New_York");
$dia = date("d");
$mes = date("m");
echo "Today is ";
echo $dia, " ", $mes, "<br/>";

if($mes >= 3 && $mes <=6){
	if($mes>3 &&$mes<6){
		echo "Have a nice Spring";
	}
	else{
		if($mes==3 && $dia >=21){
			echo "Have a nice Spring";
		}
		if($mes==6 && $dia <=20){
			echo "Have a nice Spring";
		}
	}
	
}
if($mes >= 6 && $mes <=9){
	if($mes>6 &&$mes<9){
		echo "Have a nice Summer";
	}
	else{
		if($mes==6 && $dia >=21){
			echo "Have a nice Summer";
		}
		if($mes==9 && $dia <=22){
			echo "Have a nice Summer";
		}
	}
	
}
if($mes >= 9 && $mes <=12){
	if($mes>9 &&$mes<12){
		echo "Have a nice Autumn";
	}
	else{
		if($mes==9 && $dia >=23){
			echo "Have a nice Autumn";
		}
		else{
			if($mes==12 && $dia <=21){
				echo "Have a nice Autumn";
			}
			else{
				echo "Have a nice Winter";
			}
		}
		
	}
	
}

if($mes >= 1 && $mes <=3){
	if($mes<3){
		echo "Have a nice Winter";
	}
	else{
		if($mes==3 && $dia <=20){
			echo "Have a nice Winter";
		}
	}
	
}

?>
<br/>
</div>
<footer>
	<?php include "ejercicio2.php";?>
</footer>
</body>
</html>