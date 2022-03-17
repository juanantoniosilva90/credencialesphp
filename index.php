<?php
error_reporting(0);
include_once('php/myDBC.php');
 
$objeto = new myDBC();
$imagenes = $objeto->seleccionar_images();
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>credenciales</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    </head>
    <body>
        <div class="wrap">
            <header>
               credenciales
            </header>
 
            <section id="generar">
                <nav>
                    <div id="generarPDF">
                        <a href="php/creaPDF.php" target="_blank">
                            <img src="images/generar.jpg">
                        </a>
                        <center>Generar <br> Gafetes</center>
                    </div>
                </nav>
            </section>
 
            <section id="principal">
                <form id="formulario" action="php/subir.php" method="POST" enctype="multipart/form-data">
                    <div class="campos">
                        <label > Nombre </label>
                        <input type="text" name="nick" required/>
                    </div>
 
                    <div class="campos">
                        <label> Correo </label>
                        <input type="email" name="email" required/>
                    </div>
 
                    <div class="campos">
                        <label> Edad </label>
                        <input type="number" min="15" max="70" name="edad" required/>
                    </div>
 
                    <div class="campos">
                        <label for="imagen">Imagen:</label>
                        <input type="file" name="hugo" id="imagen" />
                        <input type="submit" name="subir" value="Subir"/>
                    </div>
                </form>
 
            </section> 
 
            <section id="mostrar_imagenes">
                <?php
                    foreach($imagenes as  $imagen){
                        echo '<div class="todas">';
                        echo '<img src="'.$imagen['ruta'].'"/>';
                        echo '</div>';
                    }
                ?>
            </section>
        </div>
    </body>
</html>