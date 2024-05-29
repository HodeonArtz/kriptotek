<?php
@include "../contenidos/tablas/conexion.php";
/* Coge el tiempo y la hora actual */
$actual_datetime = date("Y-m-d h:i:sa");
$str_query;
$insert = false;

//// Esta declaración de if realiza el insert si hay $_POST
// Si el formulario se ha enviado, o sea, si el post no está vacío, se realiza el inserto
if ($_POST) {
  $str_query = "insert into user_web values('normal', '{$_POST["username"]}','{$_POST["email"]}','{$_POST["password"]}', 'usuario','$actual_datetime')";
  $insert = mysqli_query($conexion, $str_query);
}

// si el insert se realiza correctamente, se redirige a la página de login
if ($insert) {
  header("Location: login.php");
  exit();
}

// si no, cargame la página.
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error en el registro</title>
  <link rel="stylesheet" href="../preset/preset.css" />
  <script defer src="https://kit.fontawesome.com/4bf9d03b76.js" crossorigin="anonymous"></script>
  <script src="../preset/preset.js" defer></script>
  <link rel="stylesheet" href="style.css" />

</head>

<body>
  <!-- Nav -->
  <nav class="nav-1">
    <div class="enlaces fade-in">
      <ul>
        <a href="login-page.php">
          <li>
            <i class="fa-solid fa-arrow-left"></i>
            <span>Volver</span>
          </li>
        </a>
      </ul>
    </div>
  </nav>
  <main class="main-content">
    <h1>Error: no se ha podido registrarse</h1>
    <p>Los datos introducidos son incorrectos o se ha producido un error al registrarse.
      Porfavor, inténtelo de nuevo.</p>
  </main>
  <!-- Footer -->
  <footer>
    <div class="copy">&copy; Kriptotek</div>
    <div class="logo">
      <a href="#inicio"> kriptotek </a>
    </div>
    <div class="enlaces"></div>
  </footer>
</body>

</html>