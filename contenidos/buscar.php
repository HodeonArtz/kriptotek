<?php
@include "tablas/conexion.php";
$dato = $_POST["dato"];
$tabla_nombre = $_POST["tabla"];
$select_pk = mysqli_query($conn, "select * from{$tabla_nombre}");
$select = "select * from {$tabla_nombre} where";
?>
