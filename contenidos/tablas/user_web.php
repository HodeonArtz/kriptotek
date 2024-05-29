<?php
$tabla = "user_web";
include "admin-only.php";
include "conexion.php";
$se_busca = $_POST ? true : false;
$select_str = $_POST
  ? /* búsqueda */ "select * from user_web where username = '{$_POST["dato"]}';"
  : /* select */ "select * from user_web;";
$select = mysqli_query($conexion, $select_str);
include "p-key.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Usuarios de la página web - Kriptotek</title>
  <link rel="stylesheet" href="../../preset/preset.css" />
  <link rel="stylesheet" href="../style.css" />
  <link rel="stylesheet" href="tabla.css" />
</head>

<body>
  <!-- Nav -->
  <nav class="nav-1">
    <div class="enlaces fade-in">
      <ul>
        <a href="../tablas.php">
          <li>
            <i class="fa-solid fa-arrow-left"></i>
            <span>Mostrar contenidos</span>
          </li>
        </a>
      </ul>
    </div>
    <div class="enlaces fade-in navegar">
      <ul>
        <a href="../../index.php">
          <li>
            <i class="fa-solid fa-house"></i>
            <span>Volver a inicio</span>
          </li>
        </a>
      </ul>
    </div>
  </nav>
  <!-- Cuerpo principal -->
  <div class="container">
    <div class="seccion tabla">
      <h1>Usuarios de la página web</h1>
      <?php if (mysqli_num_rows($select) > 0) { ?>
      <div class="overx-auto">
        <h3 class="filtrarh2">Filtrar por:</h3>
        <select name="columna" id="select-columna">
          <option value="nothing" class="select-opt">
            Seleccionar columna
          </option>
        </select>
        <select name="columna" id="select-categoria">
          <option value="nothing">Seleccionar categoría</option>
        </select>

        <table>
          <thead>
            <tr>
              <th>Tipo de usuario</th>
              <th>Nombre de usuario</th>
              <th>E-Mail</th>
              <th>Contraseña</th>
              <th>Rol</th>
              <th>Fecha de registro</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($campo = mysqli_fetch_array($select)) { ?>
            <tr>
              <?php for ($i = 0; $i < mysqli_num_fields($select); $i += 1) { ?>

              <td class="<?php echo $i == $primaryKeyIndex ? "p-key" : ""; ?>">

                <?php echo $i != 3 ? $campo[$i] : "************"; ?>
              </td>
              <?php } ?>
            </tr>
            <?php } ?>

          </tbody>
          <!-- Alta -->
          <form action="alta1.php" method="post" id="altaForm" class="alta-form">
            <tr class="alta">
              <td>
                <select name="tipo_usuario" id="tipo_usuario" form="altaForm">
                  <option value="normal">normal</option>
                  <option value="admin">admin</option>
                </select>
              </td>
              <td>
                <input type="text" name="usuario" id="usuario" required placeholder="Nombre de usuario" form="altaForm">
              </td>
              <td>
                <input type="email" name="email" id="email" placeholder="E-Mail" form="altaForm">
              </td>
              <td>
                <input type="password" name="password" id="password" placeholder="Contraseña" require form="altaForm">
              </td>
              <td>
                <input type="text" name="rol" id="rol" placeholder="Rol" form="altaForm">
              </td>
              <td>
                <input type="datetime-local" name="fechahora" id="fechahora" form="altaForm" class="fechahoraReal">
                <input type="hidden" name="table" id="table" form="altaForm" value="<?php echo $tabla; ?>">
              </td>

            </tr>
          </form>
        </table>
      </div>
      <div class="flechas-navegar">
        <div class="anterior">
          <a href="facturas.php">
            <i class="fa-solid fa-arrow-left"></i>
            Tabla anterior
          </a>
        </div>
        <div class="siguiente">
          <a href="user_sys.php">
            Siguiente tabla
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
      <?php } else { ?>
      <h3 class="rows_not_found">No se ha podido encontrar ningún resultado</h3>
      <?php } ?>
    </div>

  </div>
  <!-- Footer -->
  <footer>
    <div class="copy">&copy; Kriptotek</div>
    <div class="logo">
      <a href="../../index.php"> kriptotek </a>
    </div>
    <div class="enlaces"></div>
  </footer>
  <!-- boton back to top -->
  <div class="back-to-top back-hidden">
    <i class="fa-solid fa-arrow-up"></i>
  </div>
  <!-- Altas y bajas -->
  <!-- Mensaje para borrar -->
  <form action="baja1.php" method="post" class="form-baja esconder-mensaje">
    <div class="overlay">
    </div>
    <!-- Indica el nombre del campo que es clave primaria -->
    <input type="hidden" name="column" id="" value="<?php echo $primaryKey; ?>">

    <!-- Indica el valor que hace referencia al registro que se va a borrar -->
    <input type="hidden" class="delete-value" name="pkey">

    <!-- Indica el nombre de la tabla donde se va a borrar el registro -->
    <input type="hidden" value="<?php echo $tabla; ?>" name="table">
    <div class="mensaje">
      <h1>¿Está seguro que quiere borrar este usuario?</h1>
      <div class="buttons">
        <button type="submit" class="input">Sí</button>
        <button type="button" class="no-borrar" onclick="esconderMensaje()">No</button>
      </div>
    </div>
  </form>
  <!-- JS -->
  <script src="https://kit.fontawesome.com/4bf9d03b76.js" crossorigin="anonymous"></script>
  <script src="../../preset/preset.js"></script>
  <script src="../script.js"></script>
  <script src="tabla.js"></script>
</body>

</html>