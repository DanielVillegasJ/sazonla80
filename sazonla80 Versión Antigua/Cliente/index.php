<?php
session_start();
include("settings/conexion.php");
$connect = conexion();

$sql1 = "SELECT * FROM producto";
$query1 = mysqli_query($connect, $sql1);
// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['documento_usuario'])) {
  $documento_usuario = $_SESSION['documento_usuario'];
  // Utiliza el documento del usuario de la sesión para obtener sus datos
  $sql = "SELECT * FROM usuario WHERE documento_usuario = '$documento_usuario'";
  $query = mysqli_query($connect, $sql);
  if ($row = mysqli_fetch_array($query)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>  
    <script src="script.js" defer></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Sazón la 80</title>
</head>
<body>
    <nav class="navfijo">
        <div class="logo">
          <img src="img/logo.png" alt="Logo" class="center-image">
        </div>
        <div class="button">
          <a class="button-link" id="user-menu-toggle">User <i class='fa fa-user'></i></a>
          <div class="dropdown-content" id="user-menu">
            <a href="settings/settings.php">Configuración</a>
            <a href="../log_in/salir.php">Cerrar sesión</a>
          </div>
        </div>
        <br><hr>
        <div class="nav-options">
            <ul>
              <br>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="../productos/index.php">Menú</a></li>
                <br>
            </ul>
        </div>
    </nav>
  

    <div class="contenedor">CONTENEDORVACIO</div>
    <br class="spacing">
    <br><br><br>
    

    <div class="slider">
      <ul>
          <li>
            <div class="image-container">
              <img src="img/mejorplato.jpg" alt="">
              <div class="overlay-text">
                <p>DISFRUTA DE NUESTROS <br><span style="color: #c45f37 ;">MEJORES PLATOS</span><br> PIDE AHORA!!!</p>
                <a href="../productos/index.php" class="ver-plato"><button class="ver-plato">Comprar plato</button></a>
              </div>
            </div>
          </li>
          <li>
            <div class="image-container">
              <img src="img/mejorplato2.avif" alt="">
              <div class="overlay-text">
                <p>DISFRUTA DE NUESTROS <br><span style="color: #c45f37;">RECOMENDADOS</span> <br> PLATOS!!!</p>
                <a href="../productos/index.php" class="ver-plato"><button class="ver-plato">Comprar plato</button></a>
              </div>
            </div>
          </li>
          <li>
            <div class="image-container">
              <img src="img/menudeldia.webp" alt="">
              <div class="overlay-text">
                <p>DISFRUTA DE NUESTRAS <br><span style="color: #c45f37;">PROMOCIONES</span><br> SEMANALES!!!</p>
                <a href="../productos/index.php" class="ver-plato"><button class="ver-plato">Comprar plato</button></a>
              </div>
            </div>
          </li>
          <li>
            <div class="image-container">
              <img src="img/pechuparrilla.webp" alt="">
              <div class="overlay-text">
                <p>DISFRUTA DE NUESTRO <br><span style="color: #c45f37;">NUEVO PLATOS</span><br> PIDE AHORA!!!</p>
                <a href="../productos/index.php" class="ver-plato"><button class="ver-plato">Comprar plato</button></a>
              </div>
            </div>
          </li>
      </ul>
  </div>

  <br class="spacing"> <br class="spacing">
  <br><br>

<section class="carrucel">
    <div class="wrapper">
        <i id="left" class="arrow-left"></i>
        <ul class="carousel">
        <?php while ($row = mysqli_fetch_array($query1)): ?>
            <li class="card">
              <div class="img"><img src="data:image/jpeg;base64,<?= base64_encode($row['imagen']) ?>" alt="imagen-producto"/>
              </div><p><?= $row["descripcion"]?></p>
              <p style="align-text:left; ">Valor: <?= $row["precio"] ?>$ </p>
              <span><?= $row["nombre_producto"]?></span>
              <a href="menu/menu.php?codigo_prod=<?= $row['codigo_prod']?>" ?><span> Pidelo aqui →</span></a>
            </li>
          <?php endwhile ?>
        </ul>
        <i id="right" class="arrow-right"></i>
      </div>
</section>
  

<br><br><br class="spacing"><br class="spacing"><br class="spacing"><hr><br>
<br class="spacing">

<a href="../productos/index.php">
  <div class="cuadro">
      <img src="img/poio.jpg" alt="Imagen">
      <div class="texto">
          <h1>EAEMARIA OMBEE</h1><br>
          <p>La sazon de la 80 si es unica antojatee y pedite cualquiera de nuestros platos aqui →</p>
      </div>
  </div>
</a>


<br class="spacing"><br class="spacing"><br class="spacing"><br><br>


<div class="rectanguloimg"></div>

<div class="rectangulo">
  <div class="redes-sociales">
      <a href="#" class="enlace"><i class='fa fa-facebook-square'></i></a>
      <a href="#" class="enlace"><i class='fa fa-twitter-square'></i></a>
      <a href="#" class="enlace"><i class='fa fa-instagram'></i></a>
  </div>
  <div class="titulo">
      <a href="#" class="enlace">@sazonla80_Oficial</a>
      <a href="#" class="enlace">SAZON LA 80</a>
  </div>
</div>


<br class="spacing"><br><hr>


<div class="rectangulocont">
  <img src="img/logo.png" alt="Logo" class="logocont">
  <div class="slogan">El sabor de la 80</div>
  <div class="contactos">
      <p>¡CONTACTANOS!<br>contacto@ejemplo.com     (123) 456-7890</p>
  </div>
  <div class="metodo-pago">
    <i class='fa fa-cc-mastercard'></i>
    <i class='fa fa-cc-visa'></i>
    <i class='fa fa-cc-paypal'></i>
    <i class="fa fa-cc-diners-club"></i>
  </div>
</div>
<hr>



<footer>
  <div class="footer">
      <p>&copy; 2023 Sazon la 80 - Todos los derechos reservados</p>
  </div>
</footer>

<script>
  document.getElementById("user-menu-toggle").addEventListener("click", function() {
    var menu = document.getElementById("user-menu");
    if (menu.style.display === "block") {
      menu.style.display = "none";
    } else {
      menu.style.display = "block";
    }
  });
</script>
</body>
</html>                                  
<?php 
} else {
    echo "Usuario no encontrado.";
}
} else {
echo "El usuario no ha iniciado sesión.";
}
?>  