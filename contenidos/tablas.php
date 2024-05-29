<?php
@include "../login-register/check_session.php";
session_start();
$is_not_user();
$is_not_admin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tablas</title>
  <link rel="stylesheet" href="../preset/preset.css" />
  <link rel="stylesheet" href="style.css" />
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
  <!-- Cuerpo principal -->
  <div class="container" id="inicio">
    <div class="seccion listado-tablas">
      <h1>Tablas de la base de datos</h1>
      <div class="tablas">
        <!-- usuarios web -->
        <div class="usuarios-web cerrado">
          <div class="titulo">
            <h2>
              Usuarios de la página web
              <a href="tablas/user_web.php"><i class="fa-solid fa-table"></i></a>
            </h2>
            <i class="fa-solid fa-caret-left despliegue"></i>
          </div>
          <div class="desc">
            <p>
              Entrando a esta tabla podremos ver los usuarios registrados en
              la página web.
            </p>
            <div class="boton">
              <a href="tablas/user_web.php">Mostrar tabla <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="tablas-buscar">
              <form action="tablas/user_web.php" method="post">
                <label for="username">Buscar usuario:</label>
                <input type="text" required placeholder="Buscar por nombre de usuario (username)"
                  title="Buscar por nombre de usuario (username)" name="dato" id="username" />
                <input type="hidden" name="se_busca" value="true" />
                <button type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- usuarios sys -->
        <div class="usuarios-sys">
          <div class="titulo">
            <h2>
              Usuarios del sistema
              <a href="tablas/user_sys.php"><i class="fa-solid fa-table"></i></a>
            </h2>
            <i class="fa-solid fa-caret-left despliegue"></i>
          </div>
          <div class="desc">
            <p>
              Entrando a esta tabla podremos ver los usuarios registrados en
              los servidores.
            </p>
            <div class="boton">
              <a href="tablas/user_sys.php">Mostrar tabla <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="tablas-buscar">
              <form action="tablas/user_sys.php" method="post">
                <label for="username-2">Buscar usuario:</label>
                <input type="text" required placeholder="Buscar por nombre de usuario (username)"
                  title="Buscar por nombre de usuario (username)" name="dato" id="username-2" />
                <input type="hidden" name="se_busca" value="true" />
                <button type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- clientes -->
        <div class="clientes">
          <div class="titulo">
            <h2>
              Clientes
              <a href="tablas/clientes.php"><i class="fa-solid fa-table"></i></a>
            </h2>
            <i class="fa-solid fa-caret-left despliegue"></i>
          </div>
          <div class="desc">
            <p>
              Entrando a esta tabla podremos ver los clientes incorporados a
              nuestra empresa.
            </p>
            <div class="boton">
              <a href="tablas/clientes.php">Mostrar tabla <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="tablas-buscar">
              <form action="tablas/clientes.php" method="post">
                <label for="email">Buscar cliente:</label>
                <input type="email" required placeholder="Buscar por E-Mail del cliente (email)"
                  title="Buscar por E-Mail del cliente (email)" name="dato" id="email" />
                <input type="hidden" name="se_busca" value="true" />
                <button type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- incidencias -->
        <div class="incidencias">
          <div class="titulo">
            <h2>
              Incidencias
              <a href="tablas/incidencias.php"><i class="fa-solid fa-table"></i></a>
            </h2>
            <i class="fa-solid fa-caret-left despliegue"></i>
          </div>
          <div class="desc">
            <p>
              Entrando a esta tabla se podrá ver las incidencias de cada
              cliente.
            </p>
            <div class="boton">
              <a href="tablas/incidencias.php">Mostrar tabla <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="tablas-buscar">
              <form action="tablas/incidencias.php" method="post">
                <label for="id">Buscar incidencia:</label>
                <input type="number" required placeholder="Buscar por ID de la incidencia (id)"
                  title="Buscar por ID de la incidencia (id)" name="dato" id="id" />
                <input type="hidden" name="se_busca" value="true" />
                <button type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </div>
        <!-- facturas -->
        <div class="facturas">
          <div class="titulo">
            <h2>
              Facturas
              <a href="tablas/facturas.php"><i class="fa-solid fa-table"></i></a>
            </h2>
            <i class="fa-solid fa-caret-left despliegue"></i>
          </div>
          <div class="desc">
            <p>
              Entrando a esta tabla podremos ver las facturas de cada cliente.
            </p>
            <div class="boton">
              <a href="tablas/facturas.php">Mostrar tabla <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="tablas-buscar">
              <form action="tablas/facturas.php" method="post">
                <label for="id-2">Buscar factura:</label>
                <input type="number" required placeholder="Buscar por ID de la factura (idfacturas)"
                  title="Buscar por ID de la factura (id)" name="dato" id="id-2" />
                <input type="hidden" name="se_busca" value="true" />
                <button type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer>
    <div class="copy">&copy; Kriptotek</div>
    <div class="logo">
      <a href="#inicio"> kriptotek </a>
    </div>
    <div class="enlaces"></div>
  </footer>
  <!-- boton back to top -->
  <div class="back-to-top back-hidden">
    <i class="fa-solid fa-arrow-up"></i>
  </div>
  <!-- JS -->
  <script src="https://kit.fontawesome.com/4bf9d03b76.js" crossorigin="anonymous"></script>
  <script src="../preset/preset.js"></script>
  <script src="script.js"></script>
</body>

</html>