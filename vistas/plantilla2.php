<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charsert="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0,
    minimun-scale=1.0">
    <title>Help Desk</title>
    <link rel="icon" href="img/logo1.ico" >
    
    <!--                            BOOTSTRAP                       -->

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <!--                            CSS                             -->
    
    <link rel="stylesheet" type="text/css" href="css/plantilla.css">
    
    <link rel="stylesheet" type="text/css" href="css/avisoCookies.css">
    
    <link rel="stylesheet" type="text/css" href="css/chat.css">

</head>

<body>

    <div id="contenedor_carga">
        <div id="carga"></div>
    </div>

    <!--                            HEADER                          -->

    <div class="header">

        <div class="header-element">
        
            <div class="header-element-content" id="logoCusur">
                <a href="http://www.cusur.udg.mx/es/"><img src="./img/ludgycus.png" ></a>
            </div>
        
        </div>
        
        <div class="header-element" class="header-background">
        
            <div class="header-element-content">
                <h1>ITEM</h1>
            </div>
        
        </div>

        <div class="header-element">
        
            <div class="header-element-content" id="logoCta" class="header-background">
                <a href="http://cta.cusur.udg.mx/"><img src="./img/logoCTA.png"></a>
            </div>
        
        </div>

    </div>

    <!--                            FIN HEADER                          -->

    <div class="main-body">

        <?php 
            if(isset($_GET["pagina"])){
                if($_GET["pagina"]=="solicitar" ||
                    $_GET["pagina"]=="admin"){
                
                    include "paginas/".$_GET["pagina"].".php";

                }

                else{

                    include "paginas/error404.php";
                
                }
            }
            else{
                include "paginas/inicio.php";
            }
        ?>

    </div>

   
    <!--                           FOOTER                          -->
    <div class="footer">

        <div>
            <p>CTA CUSUR © 2020. CRÉDITOS DE SITIO | PÓLÍTICA DE PRIVACIDAD Y MANEJO DE DATOS</p>
        </div>
    
    </div>

   <!--                           FIN FOOTER                          --> 

   
    <!--                            CHAT BAR BLOCK                          -->

    <div class="chat-bar-collapsible" id="charbc">
        <button id="chat-button" type="button" class="collapsible">
            <i id="chat-icon" style="color: red;" class="fas fa-times"></i>
        </button>

        <div class="content">
            <div class="full-chat-block">
                <!-- Message Container -->
                <div class="outer-container">
                    <div class="chat-container">
                        <!-- Messages -->
                        <div id="chatbox">
                        </div>

                        <!-- User input box -->
                        <div class="chat-bar-input-block">

                            <div id="userInput">

                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Presione 'Enter' para enviar">
                                <p></p>
                            
                            </div>

                            <div class="chat-bar-icons">
                                <!--<i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                    onclick="heartButton()"></i>-->
                                <i id="chat-icon" style="color: #333;" class="fa fa-arrow-right"
                                    onclick="sendButton()"></i>
                            </div>

                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--                           FIN CHAT BAR BLOCK                          -->

    <!--                           Aviso Cookkies                          -->
   
   <div class="aviso-cookies" id="aviso-cookies">
        
        <h3 class="titulo-c">Cookies</h3>
        
        <p class="parrafo-c">Utilizamos cookies propias para mejorar nuestros servicios.</p>
        
        <button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
        
        <a class="enlace" href="http://localhost/Helpdesk/index.php?pagina=aviso-cookies">Aviso de Cookies</a>
    
    </div>

    <div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>

    <!--                           FIN FOOTER                          --> 

    <script src="vistas/js/aviso-cookies.js"></script>

</body>

</html>