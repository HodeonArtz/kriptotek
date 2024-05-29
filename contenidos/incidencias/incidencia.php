<?php
@include "../tablas/conexion.php";
@include "../../login-register/check_session.php";
session_start();
$is_not_user();
$actual_datetime = date("Y-m-d h:i:sa");
if ($_POST) {
  $sql_str = "insert into incidencias values(default, '{$_POST["tipo"]}', '{$_POST["email"]}','$actual_datetime', '{$_POST["gravedad"]}','No resuelto', null)";
  $insert = mysqli_query($conexion, $sql_str);
}
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
        <a href="incidencias-page.php">
          <li>
            <i class="fa-solid fa-arrow-left"></i>
            <span>Volver</span>
          </li>
        </a>
      </ul>
    </div>
  </nav>
  <main class="main-content">
    <!-- ----------- Successful ------------ -->
    <?php if ($insert && mysqli_affected_rows($conexion) > 0) { ?>
    <h1>Incidencia enviada</h1>
    <p>
      La incidencia ha sido enviada correctamente. El ID de su incidencia es: <?php echo mysqli_insert_id(
        $conexion
      ); ?>
    </p>
    <?php } elseif (mysqli_errno($conexion) == 1452) { ?>
    <!-- ----------- No client ------------ -->
    <h1>ERROR: Incidencia no enviada</h1>
    <p>El e-mail introducido no es correcto o usted no es cliente de la empresa.</p>
    <?php } else { ?>
    <!-- ----------- ERROR ------------ -->
    <h1>ERROR: Incidencia no enviada</h1>
    <p>Ha ocurrido un error al enviar la incidencia.</p>
    <?php } ?>
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