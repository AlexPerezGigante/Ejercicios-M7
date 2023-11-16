<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));

$isactor=0;
$isdirector=0;
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'INSERT INTO
            movie
                (movie_name, movie_year, movie_type, movie_leadactor,
                movie_director)
            VALUES
                ("' . $_POST['movie_name'] . '",
                 ' . $_POST['movie_year'] . ',
                 ' . $_POST['movie_type'] . ',
                 ' . $_POST['movie_leadactor'] . ',
                 ' . $_POST['movie_director'] . ')';
        break;
case 'people':
	if(isset($_POST['people_isactor'])){
	  $isactor=1;
	}
	if(isset($_POST['people_isdirector'])){
	  $isdirector=1;
	}
	$query = 'INSERT INTO
            people
                (people_fullname, people_isactor, people_isdirector)
            VALUES
                ("' . $_POST['people_fullname'] . '",
                 ' . $isactor . ',
                 ' . $isdirector . ')';
    break;
    }
    break;
    
case 'edit':
    switch ($_GET['type']) {
    case 'movie':
        $query = 'UPDATE movie SET
                movie_name = "' . $_POST['movie_name'] . '",
                movie_year = ' . $_POST['movie_year'] . ',
                movie_type = ' . $_POST['movie_type'] . ',
                movie_leadactor = ' . $_POST['movie_leadactor'] . ',
                movie_director = ' . $_POST['movie_director'] . '
            WHERE
                movie_id = ' . $_POST['movie_id'];
        break;
	case 'people':
     	   if(isset($_POST['people_isactor'])){
	     $isactor=1;
	   }
	   if(isset($_POST['people_isdirector'])){
	     $isdirector=1;
	   }
	   $query = 'UPDATE people SET
                people_fullname = "' . $_POST['people_fullname'] . '",
                people_isactor = ' . $isactor . ',
                people_isdirector = ' . $isdirector . '
            WHERE
                people_id = ' . $_POST['people_id'];
            break;
    }
    break;

}

if (isset($query)) {
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>
