<?php 

  include("./config.php");
  $con = conectar();
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM proyectos WHERE nombre='".$id."'";
  $qry = $con->query($sql);

  $proyect = strtolower(str_replace(" ","-",$id));

  if ($qry) {
    while($row = $qry->fetch_assoc()){
      $nombre = $row['nombre'];
      $descripcion = $row['descripcion'];
      $master_descripcion = $row['master_descripcion'];
    } 
    $qry->free();
  }

  

  
?>
<!doctype html>
<html lang="es-ES">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $nombre; ?></title>
  <meta name="description" content="">
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Coloca favicon.ico y apple-touch-icon(s) en el directorio raíz -->

  <!-- bower:css -->
  <!-- endbower -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./stylesheets/main.css">
  <!-- endinject -->
  <!-- endbuild -->
</head>
<body>

  <!-- <div class="animacion animacion-in2"><img src="./images/imanquehue-logo.svg" alt=""></div> -->
  <!-- <div class="animacion animacion-out"></div> -->
  

  <a class="transicion cerrar ico-cerrar" onclick="redireccion('index','0')"></a>
  <a class="transicion cerrar ico-home" onclick="redireccion('index','0')">INICIO</a>

 <!--  <div class="barra">
    <a href='./index.php' class='transicion'>Home</a>
  </div> -->

   <div class="transition transition-entrada">
    <img src="./images/imanquehue-logo.svg" alt="">
  </div>
  <div class="transition transition-salida">
    <img src="./images/imanquehue-logo.svg" alt="">
  </div>

  <div class="full proyecto">
      <div class="row descripcion">
        <div class="c40-s descripcion-info">
          <div>
            <h1><?php echo $nombre; ?></h1>
            <p><?php  echo $descripcion; ?></p>
          </div>
        </div>
        <div class="c60-s descripcion-img">
          <?php  echo "<img src='./images/",$nombre,"/fondo.jpg' alt='",$nombre," - Piedra Roja'>"; ?>
        </div>
      </div>
    
      <div class="row contenido">
        <div class="c70-s contenido-master">
          <?php  echo "<div class='master-",$proyect,"'>"; ?>
            <p class="font-titulo">MASTERPLAN</p>
            <p><?php  echo $master_descripcion; ?></p>
          </div>
          <div>
            <?php  echo "<img src='./images/",$nombre,"/masterplan.png' alt='",$nombre," Master Plan- Piedra Roja'>"; ?>
          </div>
        </div>
        <div class="c30-s contenido-casas">
          <div class="h5 font-titulo ">CASAS</div>
          <div>
            <ul>
              <?php 
                $sql2 = "SELECT * FROM casa WHERE proyecto='".$nombre."'";
                $qry2 = $con->query($sql2);
                if ($qry2) {
                  while($row2 = $qry2->fetch_assoc()){
                   // echo "<li><a class='transicion' href='casa.php?id=",$row2['id'],"'>",$row2['nombre'],"<br><span>Desde UF ",numero($row2['precio']),"</span></a></li>";
                   echo "<li><a class='transicion' onclick='redireccion(&#34;casa&#34;,&#34;",$row2['id'],"&#34;)'>",$row2['nombre'],"<br><span>Desde UF ",numero($row2['precio']),"</span></a></li>";
                  } 
                  $qry2->free();
                }
                $con->close();
              ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="franja"></div>
  </div>
  
  <!-- build:js js/vendor.min.js -->
  <!-- bower:js -->
  <script src="./lib/jquery/dist/jquery.js"></script>
  <!-- <script src="./lib/bxslider-4/dist/jquery.bxslider.js"></script> -->
  <!-- endbower -->
  <!-- endbuild -->

  <!-- build:js js/app.min.js -->
  <!-- inject:js -->
  <script src="./scripts/app.js"></script>
  <!-- endinject -->
  <!-- endbuild -->

</body>
</html>