<?php
$texto = $_POST['texto'];
$fuente = $_POST['fuente'];
$color = $_POST['color'];
$size = $_POST['size'];
$checkbox = $_POST['cookie'];

if($checkbox==true){
	setcookie("cookieTexto" , $texto);
	setcookie("cookieFuente" , $fuente);
	setcookie("cookieColor" , $color);
	setcookie("cookieSize" , $size);
}
?>
<html>
<head>
<style>
	.textoCss{
		font-size:
		<?php echo $_COOKIE["cookieSize"];?>
		;
		color:
		<?php echo $_COOKIE["cookieColor"];?>
		;
		font-family:
		<?php echo $_COOKIE["cookieFuente"];?>
		;
	}

</style>
</head>
<body>
<div>
<p class="textoCss">
<?php
echo $_COOKIE["cookieTexto"];
?>
</p>
<br/>

</div>
</body>
</html>
