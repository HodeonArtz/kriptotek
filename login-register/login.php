<?php
@include "../contenidos/tablas/conexion.php";
@include "check_session.php";
session_start();
// $is_not_user();

// Global
if ($_POST) {
  $select_str = "select * from user_web where username = '{$_POST["username"]}'";
  $select = mysqli_query($conexion, $select_str);
  $usuario = mysqli_fetch_assoc($select);
  $_SESSION["reload"] = 0;

  if (
    mysqli_num_rows($select) === 1 &&
    $usuario["contraseña"] === $_POST["password"]
  ) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["tipo_user"] = $usuario["tipo_user"];
    $_SESSION["email"] = $usuario["email"];
    $_SESSION["is_logged"] = "succesful";
  } else {
    $_SESSION["is_logged"] = "invalid";
  }
}

$check_session(function () {
  header("Location: /sintesi/paginaweb/login-register/login-page.php");
  exit();
});

if ($usuario["tipo_user"] === "admin") {
  header("Location: /sintesi/paginaweb/contenidos/tablas.php");
  exit();
}
header("Location: /sintesi/paginaweb/");
exit();
/* $_SESSION["username"] = $_POST["username"];
    $_SESSION["tipo_user"] = $usuario["tipo_user"];
    $_SESSION["email"] = $usuario["email"];
    $_SESSION["is_logged"] = "succesful"; */

/* $_SESSION["is_logged"] = "invalid"; */
?>
