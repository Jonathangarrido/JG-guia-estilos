<?php 
  
  function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $db = "imAplicacion";

    $con = new mysqli($host,$user,$pass,$db);

    if($con->connection_error){
      die("DB connection failed". $con->connection_error);
    }
    if (!$con->set_charset("utf8")) {
    }

    return $con;
  }

  function numero($numero){
    $cambio = str_replace(",",".",number_format($numero));
    return $cambio;
  }

 ?>