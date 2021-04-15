<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <!--CSS -->
    <link rel="stylesheet" type="text/css" href="css/estilosphp.css" />

    <title>Hello, world!</title>
  </head>
  <body>

    <?php
      include "header.php";
    ?>    

     <?php

     

      if(!empty($_FILES)){

        $nombreArchivo = $_FILES["files"]["name"];
        $extension = substr($nombreArchivo, strpos($nombreArchivo, "."));
        $midaArchivo = $_FILES["files"]["size"];
        $rutaTemp = $_FILES["files"]["tmp_name"];
        $fecha = getdate();
        $year = strval($fecha["year"]); //strval coge el valor de la cadena de la variable.
        $month = strval($fecha["month"]);
        $day = strval($fecha["day"]);
        $numRandom = strval(rand(0,9));

        $nombreArchivo = ($year.$month.$day.$numRandom.$extension);

        if($extension == ".pdf" || $extension == ".jpg" || $extension == ".rar" || $extension == ".zip" || $extension == ".png" && ($midaArchivo >= 1024000))

          echo "La pujada ha estat satisfactoria"
      }else{

        echo "La pujada és erronea"
      }


      //cookies

      $link = "https://www.google.com";

      $numlinks = 1;
      if (isset($_COOKIE["numlinks"])){

        $numlinks = $:_COOKIE["numlinks"];
        $numlinks++;
      }


      setcookie("numlinks", $numlinks, time() + 60 * 60 * 24 * 1000);

      setcookie("link$numlinks", $link, time() + 60 * 5);

    
      ?>
    <div class="cap">
      <div id="titol">
        <h1>Uy! Transfer</h1>
      </div>
      <div class="enlace">
        <a href="" style="margin-right: 15px;">Enviar archivo</a><span>
        <a href="">Mis ultimos archivos</a>
      </div>
    </div>





    
   
    <footer id="peu"></footer>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>