
<?php 
session_start();


?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="vistas/css/style.css" type="text/css"> -->
        <link href="vistas/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <!-- JavaScript Bundle with Popper -->
        <script src="vistas/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <body>

        <!-- TITULO  // LOGO -->
        <div class="container-fluid">
            <h3 class="text-center py-3">PRUEBA DE CRUD</h3>
        </div>
        <!-- MENU PRINCIPAL -->
        <div class="container-fluid ">
            <div class="container">
                <ul class="nav nav-justified py-2 nav-pills">
                    <?php if (isset($_GET["pagina"])): ?> 
                        <?php if ($_GET["pagina"] == "ingreso"): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=ingreso" target="target">Ingreso</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?pagina=ingreso" target="target">Ingreso</a>
                            </li>
                        <?php endif ?>
                        <?php if ($_GET["pagina"] == "registro"): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=registro" target="target">Registro</a>
                            </li>    
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?pagina=registro" target="target">Registro</a>
                            </li>
                        <?php endif ?>
                        <?php if ($_GET["pagina"] == "inicio"): ?>
                            <li class="nav-item">
                                <a class="nav-link active " href="index.php?pagina=inicio" target="target">Inico</a>
                            </li>  
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?pagina=inicio" target="target">Inicio</a>
                            </li>
                        <?php endif ?>
                        <?php if ($_GET["pagina"] == "salir"): ?>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.php?pagina=salir" target="target">Salir</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link " href="index.php?pagina=salir" target="target">SALIR</a>
                            </li>
                        <?php endif ?>
                    <?php else: ?>

                        <li class="nav-item">
                            <a class="nav-link " href="index.php?pagina=ingreso" target="target">Ingreso</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="index.php?pagina=registro" target="target">Registro</a>
                        </li>    

                        <li class="nav-item">
                            <a class="nav-link active " href="index.php?pagina=inicio" target="target">Inico</a>
                        </li>  

                        <li class="nav-item">
                            <a class="nav-link " href="index.php?pagina=salir" target="target">Salir</a>
                        </li>

                    <?php endif ?>



                </ul>
            </div>
        </div>


        <!-- CONTENIDO -->
        <div class="container">
            <?php
            if (isset($_GET["pagina"])) {
                if ($_GET["pagina"] == "ingreso" ||
                        $_GET["pagina"] == "registro" ||
                        $_GET["pagina"] == "inicio" ||
                        $_GET["pagina"] == "editar" ||
                        $_GET["pagina"] == "salir") {
                    include "vistas/paginas/" . $_GET["pagina"] . ".php";
                } else {
                    include "vistas/paginas/error404.php";
                }
            } else {
                include "vistas/paginas/inicio.php";
            }
            ?>
        </div>
    </body>
</html>