<?php 

  include("./config.php");
  $con = conectar();
  
  $id = $_GET['id'];
  $sql = "SELECT * FROM casa WHERE id=".$id;
  $qry = $con->query($sql);
  if ($qry) {
    while($row = $qry->fetch_assoc()){
      $nombre = $row['nombre'];
      $proyecto = $row['proyecto'];
      $precio = $row['precio'];
      $descripcion = $row['descripcion'];
      $imagen = $row['imagen'];
      $dormitorio = $row['dormitorio'];
      $bano = $row['bano'];
      $salaestar = $row['salaestar'];
    } 
    $qry->free();
  }
  function Plural($e){
    $p;
    if($e>0){
      $p = "s";
    }
    return $p;

  }

?>
<!doctype html>
<html lang="es-ES">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $proyecto," - ",$nombre;?></title>
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

  <?php echo "<a class='transicion cerrar ico-cerrar' onclick='redireccion(&#34;proyecto&#34;,&#34;",$proyecto,"&#34;)'></a>"?>
  <a class="transicion cerrar ico-home" onclick="redireccion('index','0')">INICIO</a>

  <div class="transition transition-entrada">
    <img src="./images/imanquehue-logo.svg" alt="">
  </div>
  <div class="transition transition-salida">
    <img src="./images/imanquehue-logo.svg" alt="">
  </div>

  <div class="full casa">
    <div class="row">
      <div class="c75-s casa-img">
        <?php echo "<img src='./images/",$proyecto,"/",$imagen,".jpg' alt='",$nombre," - ",$proyecto," - Piedra Roja'>"; ?>
      </div>
      <div class="c25-s casa-info">
        <div class="casa-caracteristicas">
          <div>
            <h2><?php echo $proyecto; ?></h2>
            <h1><?php echo $nombre; ?></h1>
            <p><span>Desde UF <?php echo (numero($precio)); ?></span></p>
            <p><?php echo $descripcion; ?></p>
            <div class="lista-iconos">
              <div>
                <img src="./images/ico-dormitorio.svg" alt="">
                <p><?php echo $dormitorio; ?> dormitorio<?php echo (Plural($dormitorio)); ?></p>
              </div>
              <div>
                <img src="./images/ico-bano.svg" alt="">
                <p><?php echo $bano; ?> baño<?php echo (Plural($bano)); ?></p>
              </div>
              <?php 
                if($salaestar>0){
                  echo "<div><img src='./images/ico-salaestar.svg' alt=''><p>Sala de estar</p></div>";
                }
                ?>
            </div>
          </div>
        </div>
        <div class="casa-planta" >
          <div class="planta-conte"onclick="Planta(1)">
            <div><?php echo "<img src='./images/",$proyecto,"/planta-",$imagen,".png' alt=''>"; ?></div>
            <button>Ampliar Planta</button>
          </div>
          <span class="cerrar-planta"onclick="Planta(0)"></span>
        </div>
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