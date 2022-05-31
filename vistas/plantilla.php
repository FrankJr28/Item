<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>ITEM | Sistema de préstamos CUSur</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>

        <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>

        <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>

        <link rel="stylesheet" href="./css/styles.css">
        
        <link rel="stylesheet" href="./css/navbar.css"/>       

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <!--                            SWEET ALERT                         -->

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    </head>

    <body id="body-pd">
        <header class="header" id="header">
            <?php
            if(isset($_GET["pagina"]) && $_GET["pagina"]!="inicio" && $_GET["pagina"]!="error"){        
             
                echo'<div class="header_toggle"> <i class="bi bi-list" id="header-toggle"></i> </div>';
            }
            else{
                echo '<div></div>';
            }
            ?>

            <div><H1>ITEM</H1></div>
            <div class="header_img"> <a href="http://cta.cusur.udg.mx/"><img src="./img/logo-CTA.png" alt="CTA-logo"></a></div>
        </header>
        <?php
            if(isset($_GET["pagina"]) && $_GET["pagina"]!="inicio" && $_GET["pagina"]!="error"){           
                echo'<div class="l-navbar" id="nav-bar">
                    <nav class="nav_side">
                        <div> <a href="http://www.cusur.udg.mx/es/" class="nav_logo"> 
                            <img src="img/udg.png" class="img-fluid" alt="UDG-logo" style="width: 20px;">
                            </i> <span class="nav_logo-name">CUSur</span></a>
                            <div class="nav_avatar">
                                <img src="'.
                                ControladorFormularios::ctrObtenerPhoto().'" class="avatar" alt="Avatar Image">
                            </div>
                            <div class="nav_list">';
                            
                            if(isset($_SESSION["admin"])){
                                echo '
                                <a href="index.php?pagina=adminAccept" class="nav_link"> <i class="bi bi-house nav_icon"></i> <span class="nav_name">Inicio</span> </a>
                                <a href="index.php?pagina=generarReporte" class="nav_link"> <i class="bi bi-files nav_icon"></i><span class="nav_name">Generar reportes</span> </a>
                                <a href="index.php?pagina=graficos" class="nav_link"> <i class="bi bi-graph-down nav_icon"></i><span class="nav_name">Gráficos</span> </a>
                                <a href="index.php?pagina=articulos" class="nav_link"> <i class="bi bi-plug-fill nav_icon"></i><span class="nav_name">Artículos</span> </a>
                                <a href="index.php?pagina=usuarios" class="nav_link"> <i class="bi bi-person-square nav_icon"></i><span class="nav_name">Usuario</span> </a>
                                ';
                            }
                            else if(isset($_SESSION["usuario"])){
                                echo '
                                <a href="index.php?pagina=inicio" class="nav_link"> <i class="bi bi-house nav_icon"></i> <span class="nav_name">Inicio</span> </a>
                                <a href="index.php?pagina=infoUsuario" class="nav_link"> <i class="bi bi-person-rolodex nav_icon"></i><span class="nav_name">Actualizar datos</span> </a>
                                ';
                            }
                       echo '</div>
                        </div> 
                        <a href="index.php?pagina=cerrar" class="nav_link">
                            <i class="bi bi-box-arrow-left nav_icon"></i> <span class="nav_name">Cerrar sesión</span> </a>
                    </nav>
                </div>';
            }

        ?>


        <!--Container Main start-->
        <div class="height-100"><!--MARGIN-->
                <div class="margin-cont">
                    <?php 
                        if(isset($_GET["pagina"])){
                            if($_GET["pagina"]=="solicitar" ||
                                $_GET["pagina"]=="admin" ||
                                $_GET["pagina"]=="inicio" ||
                                $_GET["pagina"]=="infoUsuario" ||
                                $_GET["pagina"]=="adminAccept" ||
                                $_GET["pagina"]=="adminActive" ||
                                $_GET["pagina"]=="adminHistory" ||
                                $_GET["pagina"]=="detallePrestamo" ||
                                $_GET["pagina"]=="detalleUsuario" ||
                                $_GET["pagina"]=="generarReporte" ||
                                $_GET["pagina"]=="articulos" ||
                                $_GET["pagina"]=="usuarios" ||
                                $_GET["pagina"]=="graficos" ||
                                $_GET["pagina"]=="crearUsuarios" ||
                                $_GET["pagina"]=="cerrar"){
                            
                                include "paginas/".$_GET["pagina"].".php";

                            }

                            else{
                                if($_GET["pagina"]!="error"){
                                    echo '<script>

                                            window.location = "index.php?pagina=error";
                                        
                                    </script>';
                                }
                                include "paginas/error404.php";
                            
                            }
                        }
                        else{
                            include "paginas/inicio.php";
                        }
                    ?>
                </div>
        </div>
        <!--Container Main end-->


        
        
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="./js/navbar.js"></script>
        
        <script type="text/javascript" src="./js/alerts.js"></script>

        

        
        
        

        <script type="text/javascript" src="./js/file.js"></script>

        <!--
        <script src="popper/popper.min.js"></script>-->



        <!--<script type="module" src="./dist/main.js"></script>-->
        

        <!--Para ver si funciona lo de brenda
        <link rel="stylesheet" href="./css/stylesVw.css">
                    -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>

        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    
        <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> 

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>--> 

     
            <!-- datatables JS -->
        <script type="text/javascript" src="datatables/datatables.min.js"></script>   

        <script type="text/javascript" src="js/articulos.js"></script>

        <?php
            if(isset($_GET["pagina"])){
                if( $_GET["pagina"]=="adminAccept" ||
                    $_GET["pagina"]=="adminActive" ||
                    $_GET["pagina"]=="adminHistory"){
                
                    echo '<script type="text/javascript" src="./js/main.js"></script>';

                }
            }
        ?>
        

    </body>

</html>