<?php
$tabla = "incidencias";
include "admin-only.php";
include "conexion.php";
$se_busca = $_POST ? true : false;
$select_str = $se_busca
  ? /* búsqueda */
  "select * from incidencias where id = '{$_POST["dato"]}';"
  : /* select */
  "select * from incidencias;";
$select = mysqli_query($conexion, $select_str);
include "p-key.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Incidencias - Kriptotek</title>
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
      <h1>Incidencias</h1>
      <?php if (mysqli_num_rows($select) > 0) { ?>

      <select name="columna" id="select-columna">
        <option value="nothing" class="select-opt">
          Seleccionar columna
        </option>
      </select>
      <select name="columna" id="select-categoria">
        <option value="nothing">Seleccionar categoría</option>
      </select>
      <div class="overx-auto">
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Tipo</th>
              </th>
              <th>Cliente (E-Mail)</th>
              <th>Fecha y hora</th>
              <th>Gravedad</th>
              <th>Estado</th>
              <th>Solución</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($campo = mysqli_fetch_array($select)) { ?>
            <tr>
              <?php for ($i = 0; $i < mysqli_num_fields($select); $i += 1) { ?>
              <td class="<?php echo $i == $primaryKeyIndex ? "p-key" : ""; ?>">
                <?php echo $campo[$i]; ?>
              </td>
              <?php } ?>
            </tr>
            <?php } ?>
          </tbody>
          <!-- Alta -->
          <form action="alta1.php" method="post" id="altaForm" class="alta-form">
            <tr class="alta">
              <td>
                <input type="number" name="id" id="id" form="altaForm" placeholder="ID" require>
              </td>
              <td>
                <input type="text" name="tipo" id="tipo" required placeholder="Tipo de incidencia" form="altaForm">
              </td>
              <td>
                <input type="email" name="email" id="email" placeholder="E-Mail del cliente" form="altaForm" require>
              </td>
              <td>
                <input type="datetime-local" name="fechahora" id="fechahora" form="altaForm">
                <input type="hidden" name="table" id="table" form="altaForm" value="<?php echo $tabla; ?>" require>
              </td>
              <td>
                <input type="text" name="gravedad" id="gravedad" placeholder="Gravedad" form="altaForm"
                  title='Indica si la gravedad de la incidencia no es tan "importante" (Baja) o "importante" (Alta)'
                  require>
              </td>
              <td>
                <input type="text" name="estado" id="estado" placeholder="Estado" form="altaForm"
                  title='Indica si la incidencia está resuelta, no resuelta o si se está resolviendo.'>
              </td>
              <td>
                <input type="text" name="solucion" id="solucion" form="altaForm" placeholder="Solución"
                  title="Indica la solución que se le ha dado a la incidencia si está resuelta.">
                <input type="hidden" name="table" id="table" form="altaForm" value="<?php echo $tabla; ?>">
              </td>
            </tr>
          </form>
        </table>
        <span class="aclaracion"><i>*Antes de insertar la incidencia, debe de comprobar que el e-mail del cliente está
            presente en la tabla
            "<a href="clientes.php">Clientes</a>".</i></span>
      </div>
      <div class="flechas-navegar">
        <div class="anterior">
          <a href="clientes.php">
            <i class="fa-solid fa-arrow-left"></i>
            Tabla anterior
          </a>
        </div>
        <div class="siguiente">
          <a href="facturas.php">
            Siguiente tabla
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
        <?php } else { ?>
        <h3 class="rows_not_found">No se ha podido encontrar ningún resultado</h3>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Altas y bajas -->
  <!-- Borrar pero oculto -->
  <form action="baja1.php" method="post" class="form-baja esconder-mensaje">
    <div class="overlay"></div>
    <input type="hidden" name="column" id="" value="<?php echo $primaryKey; ?>">
    <input type="hidden" class="delete-value" name="pkey">
    <input type="text" value="<?php echo $tabla; ?>" name="table">
    <div class="mensaje">
      <h1>¿Está seguro que quiere borrar esta incidencia?</h1>
      <div class="buttons">
        <button type="submit" class="input">Sí</button>
        <button type="button" class="no-borrar" onclick="esconderMensaje()">No</button>
      </div>
    </div>
  </form>
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
  <!-- JS -->
  <script src="https://kit.fontawesome.com/4bf9d03b76.js" crossorigin="anonymous"></script>
  <script src="../../preset/preset.js"></script>
  <script src="../script.js"></script>
  <script src="tabla.js"></script>

</body>

</html>