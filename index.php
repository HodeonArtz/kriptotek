<?php
@include "login-register/check_session.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kriptotek</title>
  <link rel="stylesheet" href="preset/preset.css" />
  <link rel="stylesheet" href="style.css" />
</head>

<body style="opacity: 0;">
  <div class="fondo">
    <div class="mouse-circulo"></div>
  </div>

  <!-- Barra de navegación -->
  <nav>
    <div class="logo fade-in">
      <a href="index.php">
        <span>Kriptotek</span>
      </a>
    </div>
    <div class="enlaces fade-in">
      <ul>
        <a href="#nuestra-empresa">
          <li>Nuestra empresa</li>
        </a>
        <?php if (isset($_SESSION["username"])) { ?>
        <?php if ($_SESSION["tipo_user"] == "admin") { ?>
        <a href="contenidos/tablas.php">
          <li>Mostrar contenidos</li>
        </a>
        <?php } ?>
        <a href="contenidos/incidencias/incidencias-page.php">Informar incidencia</a>
        <a href="login-register/logout.php">
          <li>Cerrar sesión</li>
        </a>
        <?php } else { ?>
        <a href="/sintesi/paginaweb/login-register/login-page.php">Iniciar sesión</a>
        <?php } ?>
      </ul>
    </div>
  </nav>
  <!-- Cuerpo principal -->

  <div class="container" id="inicio">
    <!-- "Portada" -->
    <div class="seccion portada">
      <div>
        <div class="images">
          <div>
            <img src="img/cyber.jpg" alt="" srcset="" />
          </div>
          <div>
            <div class="clay clay-1"></div>
          </div>
          <div>
            <div class="clay clay-2"></div>
          </div>
        </div>
        <h1 class="titulo-logo">
          <div class="efecto">Kriptotek</div>
        </h1>
        <h2 class="subtitulo">
          <div>
            Proteja su negocio con nuestros servicios de ciberseguridad
          </div>
        </h2>
      </div>
    </div>
    <!-- "Sobre nuestra empresa" -->
    <div class="seccion nuestra-empresa" id="nuestra-empresa">
      <h1>Sobre nuestra empresa</h1>
      <p>
        <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus
          magnam corrupti amet impedit rerum molestiae vitae adipisci eveniet
          iusto ipsa sit saepe officia explicabo nesciunt, nam recusandae
          dignissimos odit aut.</span><span>Voluptas necessitatibus voluptates ex officiis, molestiae quod
          quaerat inventore quo veritatis dolore et corporis dolor expedita
          sint labore est illo fugiat explicabo distinctio molestias deleniti!
          Praesentium quis quasi quam sed.</span><span>Nobis totam temporibus modi rem distinctio delectus maiores et
          quasi ipsa. Laudantium veritatis animi necessitatibus, architecto
          ipsum possimus ut, quo totam repellat voluptatibus aut a, nostrum
          amet provident sunt cupiditate.</span>
      </p>
      <img src="" alt="" srcset="" />
      <p>
        <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga
          expedita, minus alias repudiandae, quas voluptatibus sed earum ipsam
          accusantium, cumque eveniet est dolorum magni pariatur ad. Animi
          veritatis sequi nam!</span><span>Natus deleniti corporis obcaecati, omnis iusto accusantium
          consectetur blanditiis? Sit voluptatem sed laudantium iste fugit at
          blanditiis, voluptatibus ad quis consequatur odit facere labore, eum
          perferendis autem atque est illo?</span><span>Praesentium animi officia nesciunt ea suscipit deserunt rem
          tenetur
          cupiditate consectetur quae consequuntur nulla hic minima veniam,
          quaerat illo iure sunt architecto cumque debitis quo ut. Veniam
          rerum rem harum.</span>
      </p>
      <p>
        <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam error
          ex placeat illo sequi vitae quas, nulla qui iure minus consectetur
          laborum at repellendus suscipit ad reprehenderit molestias quidem
          beatae.</span><span>Ducimus dolorum a reiciendis libero, eveniet dolores eos iusto
          architecto reprehenderit consequuntur. Necessitatibus,
          exercitationem sed, eum voluptas enim minima, aspernatur incidunt
          fugit pariatur officiis veniam. Hic eveniet placeat perspiciatis
          blanditiis?</span><span>Quis sapiente, sit maxime molestias quibusdam odit inventore
          maiores. Reiciendis nihil, error ad quidem voluptatum commodi
          molestiae numquam officia corrupti voluptas voluptate iure culpa
          autem qui maiores, veritatis officiis debitis!</span>
      </p>
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
  <script src="preset/preset.js"></script>
  <script src="script.js"></script>
</body>

</html>