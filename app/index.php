<?php 
  
  include("./config.php");
  $con = conectar();
  $sql = "SELECT * FROM proyectos ORDER BY id ASC";
  $qry = $con->query($sql);

?>
<!doctype html>
<html lang="es-ES">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Imanquehue Sin IVA</title>
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
  <!--[if lt IE 8]>
    <p class="browsehappy">Estás usando un navegador <strong>desactualizado</strong>.Por favor <a href="http://browsehappy.com/">actualiza tu navegador</a>Para mejorar la experien
  <![endif]-->

  <div class="transition transition-entrada">
    <img src="./images/imanquehue-logo.svg" alt="">
  </div>
  <div class="transition transition-salida">
    <img src="./images/imanquehue-logo.svg" alt="">
  </div>
  
  <div class="full home">
    <div class="titulo">
      <h1>PIEDRA ROJA</h1>
      <p>PROYECTOS</p>
      <span class="master-pr"onclick="master()">VER MASTER PLAN</span>
    </div>
    <div class="proyectos">
      <div class="row lista-proyectos">
        <?php  
          if ($qry) {
            while($row = $qry->fetch_assoc()){
              echo "<div class='c25-s'>
              <a class='transicion' onclick='redireccion(&#34;proyecto&#34;,&#34;",$row['nombre'],"&#34;)'>",$row['nombre'],"<p>",$row['subtitulo'],"</p></a></div>";
            }
          }
          $con->close();
        ?>
      </div>
    </div>
    <div class="master-g" onclick="master()">
      <div>
        <a class="ico-cerrar"></a>
        <img src="./images/masterplan-piedraroja.jpg" alt="">
      </div>
    </div>
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