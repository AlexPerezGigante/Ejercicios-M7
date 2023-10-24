<?php
// Conecta a la base de datos
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('No se puede conectar. Verifica tus parámetros de conexión.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

// Inserta la primera reseña
$query1 = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
          VALUES (1, '2023-10-18', 'Ferran Torres', 'Pensé que esta era una gran película. Aunque mi novia me hizo verla en contra de mi voluntad.', 4)";
if (mysqli_query($db, $query1)) {
    echo "Reseña 1 agregada.<br>";
} else {
    echo "Error al agregar la reseña 1: " . mysqli_error($db);
}

// Inserta la segunda reseña
$query2 = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
          VALUES (2, '2023-10-18', 'Lamine Yamal', 'Me gustó más Eraserhead.', 2)";
if (mysqli_query($db, $query2)) {
    echo "Reseña 2 agregada.<br>";
} else {
    echo "Error al agregar la reseña 2: " . mysqli_error($db);
}

// Inserta la tercera reseña
$query3 = "INSERT INTO reviews (review_movie_id, review_date, reviewer_name, review_comment, review_rating)
          VALUES (3, '2023-10-18', 'Marc Guiu', 'Ojalá la hubiera visto antes.', 5)";
if (mysqli_query($db, $query3)) {
    echo "Reseña 3 agregada.<br>";
} else {
    echo "Error al agregar la reseña 3: " . mysqli_error($db);
}

// Cierra la conexión a la base de datos
mysqli_close($db);
?>