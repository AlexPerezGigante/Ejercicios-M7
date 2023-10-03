<?php
$texto = $_POST['texto'];
$fuente = $_POST['fuente'];
$color = $_POST['color'];
$size = $_POST['size'];
?>
<html>
<head>
<style>
	.textoCss{
		font-size:
		<?php echo "$size";?>
		;
		color:
		<?php echo "$color";?>
		;
		font-family:
		<?php echo "$fuente";?>
		;
	}

</style>
</head>
<body>
<div>
<label>
<p class="textoCss">
<?php
echo "$texto";
?>
</p>
<br/>
</div>
</body>
</html>