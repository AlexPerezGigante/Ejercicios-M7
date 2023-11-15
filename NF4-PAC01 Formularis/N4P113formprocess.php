<?php
if(isset($_POST['submit'])) {
$directorPost=$_POST['director'];
$moviePost= $_POST['movie'];
$commentaryPost=$_POST['commentary'];
$actorPost=$_POST['actor'];
$reviewerPost=$_POST['name'];

echo <<<ENDHTML
<html>
 <head>
  <title>Values on select option</title>
 </head>
 <body>
  <div style="text-align: center;">
    <select name=select>
	<option value"$reviewerPost">$reviewerPost</option>
        <option value"$moviePost">$moviePost</option>
        <option value"$commentaryPost">$commentaryPost</option>
        <option value"$actorPost">$actorPost</option>
	<option value"$directorPost">$directorPost</option>
    </select>
<a href="N4P112form.php">Return to form</a>
  </div>
  
ENDHTML;

} else {

    echo "<a href='N4P112form.php'>Return to form</a>";
}
?>
 </body>
</html>


