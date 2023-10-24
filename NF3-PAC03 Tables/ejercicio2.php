<?php
$db = mysqli_connect('localhost', 'root', 'root') or die ('No se puede conectar. Verifica tus parámetros de conexión.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

$query = "SELECT AVG(review_rating) AS average_rating FROM reviews";
$result = mysqli_query($db, $query);

if ($result && $row = mysqli_fetch_assoc($result)) {
    $averageRating = $row['average_rating'];
} else {
    $averageRating = 0;
}

mysqli_free_result($result);

echo "<h2>Promedio de calificaciones de revisores: $averageRating</h2>";

// Resto del contenido de tu archivo de detalles
// ...

mysqli_close($db);
?>