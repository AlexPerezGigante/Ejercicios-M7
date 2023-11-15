<?php
if(isset($_POST['submit'])) {
$num1Post=$_POST['num1'];
$num2Post= $_POST['num2'];
$num3Post=$_POST['num3'];
$selectPost=$_POST['select'];
$resul=0;

switch ($selectPost){
  case '+':
    $resul=$num1Post+$num2Post+$num3Post;
  break;
   case '-':
    $resul=$num1Post-$num2Post-$num3Post;
  break;
 case 'x':
    $resul=$num1Post*$num2Post*$num3Post;
  break;
 case '/':
    $resul=$num1Post/$num2Post/$num3Post;
  break;
}

echo <<<ENDHTML
<html>
 <head>
  <title>Values on select option</title>
 </head>
 <body>
  <div style="text-align: center;">
    <p>$num1Post $selectPost $num2Post $selectPost $num3Post = $resul</p>
<a href="N4P114form.php">Return to form</a>
  </div>
  
ENDHTML;

} else {

    echo "<a href='N4P114form.php'>Return to form</a>";
}
?>
 </body>
</html>


