<?php
@include "check_session.php";
session_start();
if ($check_session(function () {})) {
  header("Location: /sintesi/paginaweb/index.php");
  exit();
}
if (
  isset($_SESSION["reload"]) &&
  $_SESSION["is_logged"] == "invalid" &&
  $_SESSION["reload"] < 2
) {
  $_SESSION["reload"] += 1;
}
?>

<!-- ------------------------------ -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar sesión - Kriptotek</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../preset/preset.css" />
  <!-- JS -->
  <script defer src="https://kit.fontawesome.com/4bf9d03b76.js" crossorigin="anonymous"></script>
  <script src="../preset/preset.js" defer></script>
  <script src="script.js" defer></script>
</head>

<body>
  <!-- Nav -->
  <nav class="nav-1">
    <div class="enlaces fade-in">
      <ul>
        <a href="../index.php">
          <li>
            <i class="fa-solid fa-house"></i>
            <span>Volver al inicio</span>
          </li>
        </a>
      </ul>
    </div>
  </nav>
  <main class="main-content">
    <div class="forms-account">
      <div class="form form-account form-login">
        <h1 class="titulo-menu">Iniciar sesión</h1>
        <form action="login.php" method="post">
          <label for="login-username">Nombre de usuario</label>
          <input type="text" required placeholder="Introduzca su nombre de usuario" name="username" id="login-username"
            autofocus />
          <label for="login-password">Contraseña</label>
          <input type="password" required placeholder="Introduzca su contraseña" name="password" id="login-password" />
          <input type="submit" value="Inicia sesión" />
          <p class="change-menu">
            ¿No tienes cuenta?
            <span class="btn-span btn-registrar">Regístrate</span>.
          </p>
          <?php if (
            isset($_SESSION["is_logged"]) &&
            $_SESSION["reload"] <= 1 &&
            $_SESSION["is_logged"] === "invalid"
          ) { ?>
          <p class="invalid">
            Nombre de usuario o contraseña incorrecta.
          </p>
          <?php } ?>
        </form>

      </div>
      <div class="form form-account form-register esconder-form">
        <h1 class="titulo-menu">Crear un usuario</h1>
        <form action="registrar-cuenta.php" method="post">
          <label for="register-username">Nombre de usuario</label>
          <input type="text" required placeholder="Introduzca un nuevo nombre de usuario" name="username"
            id="register-username" />
          <label for="register-email">Correo electrónico</label><input type="email" name="email" id="register-email"
            placeholder="Introduzca un E-Mail" />
          <label for="register-password">Contraseña</label>
          <input type="password" name="password" id="register-password" placeholder="Introduzca una contraseña" />
          <input type="submit" value="Registrar cuenta" />
          <p class="change-menu">
            ¿Ya tienes cuenta?
            <span class="btn-span btn-login">Inicia sesión</span>.
          </p>

        </form>
      </div>
    </div>
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