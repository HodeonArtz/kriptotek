<?php
@include "../../login-register/check_session.php";
session_start();
$is_not_user();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Informar una incidencia - Kriptotek</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="../../preset/preset.css" />
  <!-- JS -->
  <script defer src="https://kit.fontawesome.com/4bf9d03b76.js" crossorigin="anonymous"></script>
  <script src="../../preset/preset.js" defer></script>
  <script src="script.js" defer></script>
</head>

<body>
  <!-- Nav -->
  <nav class="nav-1">
    <div class="enlaces fade-in">
      <ul>
        <a href="/sintesi/paginaweb">
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
        <h1 class="titulo-menu">Informar sobre una incidencia</h1>
        <form action="incidencia.php" method="post">
          <label for="tipo">Tipo de incidencia</label>
          <input type="text" required placeholder="Tipo de incidencia" name="tipo" id="tipo" autofocus>
          <label for="email">Correo electrónico</label>
          <input type="email" required placeholder="Escriba su correo electrónico" name="email" id="email"
            title="Escriba su correo electrónico">
          <label for="gravedad">Gravedad</label>
          <input type="text" required placeholder="Indica la gravedad de la incidencia" name="gravedad" id="gravedad"
            title="Indica si es alta, media, o baja">
          <input type="submit" value="Informar">
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