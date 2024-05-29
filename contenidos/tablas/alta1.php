<?php
// Conexión
include "conexion.php";
include "admin-only.php";
// Todos los datos del formulario menos el de la variable de la tabla
$datos = implode(
  "','",
  array_filter($_POST, fn($dato) => $dato != $_POST["table"])
); // Resultado de ejemplo: "dato1 ',' dato2 ',' dato3 ',' dato4"

$nombre_tabla = $_POST["table"];

$insert = "insert into $nombre_tabla values ('$datos');";
// Resultado: "insert into tabla1 values (' dato1 ',' dato2 ',' dato3 ',' dato4 ');"
echo "$insert <br> No se puede insertar datos en estos momentos.";
//  mysqli_query($conexion, $insert);

/* header("Location: $nombre_tabla.php");
 exit(); */
?>
