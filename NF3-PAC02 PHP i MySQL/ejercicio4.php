<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));


$noRegistros = 4; // Registros por página
$pagina = 1; // Página por defecto es 1
if ($_GET['pagina']) $pagina = $_GET['pagina']; // Si hay página, la asigna
$busqueda = $_GET['searchs']; // Palabra a buscar

// Utilizo el comando LIMIT para seleccionar un rango de registros
$inicio = ($pagina - 1) * $noRegistros;
$sSQL = "SELECT m.movie_name, d.people_fullname AS director_name, a.people_fullname AS actor_name
          FROM movie m
          JOIN people d ON m.movie_director = d.people_id
          JOIN people a ON m.movie_leadactor = a.people_id
          WHERE m.movie_name LIKE '%$busqueda%'
          LIMIT $inicio, $noRegistros";

$result = mysqli_query($db, $sSQL) or die(mysqli_error($db));

// Exploración de registros
echo "<table>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td height=80 align=center>";
    echo $row["movie_name"] . "<br>";
    echo "</td>";
    echo "<td align=center>$row[director_name]</td>";
    echo "<td align=center>$row[actor_name]</td>";
    echo "</tr>";
}

// Imprimiendo paginación
$sSQL = "SELECT count(*) FROM movie WHERE movie_name LIKE '%$busqueda'";
$result = mysqli_query($db, $sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row[0]; // Almaceno el total
$noPaginas = ceil($totalRegistros / $noRegistros); // Determino la cantidad de páginas
?>
<tr>
    <td colspan="3" align="center"><?php echo "<strong>Total registros: </strong>" . $totalRegistros; ?></td>
    <td colspan="2" align="center"><?php echo "<strong>Página: </strong>" . $pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
    <td colspan="4" align="right"><strong>Página:
        <?php
        for ($i = 1; $i <= $noPaginas; $i++) { // Imprimo las páginas
            if ($i == $pagina)
                echo "<font color='red'>$i </font>"; // No link
            else
                echo "<a href=\"?pagina=" . $i . "&searchs=" . $busqueda . "\" style='color:#000;'> " . $i . "</a>";
        }
        ?>
        </strong></td>
</tr>
</table>
