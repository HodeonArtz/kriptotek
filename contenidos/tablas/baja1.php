<?php
include "conexion.php";
include "admin-only.php";

$delete = "delete from {$_POST["table"]} where {$_POST["column"]} = '{$_POST["pkey"]}'";

// mysqli_query($conexion, $delete);

echo "$delete <br> Borrado deshabilitado";

/* header("Location: {$_POST["table"]}.php");
 exit(); */

?>
