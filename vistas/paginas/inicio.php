
<link rel="stylesheet" href="./css/stylesIdx.css"/>

<div class="container-fluid" style="height:50vh">
    <div class="row abs-center">
        <div class="row justify-content-center">
            <button class="btn btn-dark b-round col-xl-2 col-lg-4 col-md-6 col-sm-10 col-xs-12" data-bs-toggle="modal" data-bs-target="#login-modal">    Iniciar Sesión
            </button>
            <div class="w-100"></div>
            <br>
            <a href="#" class="btn btn-primary b-round col-xl-2 col-lg-4 col-md-6 col-sm-10 col-xs-12" style="text-decoration: none" id="btnLoginGoogle"><i class="bi bi-google"></i> Continuar con Google</a>
        </div>
    </div>    
</div>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header modal-head">
                <img src="img/logo-CTA.png" class="img-fluid" alt="logo-CTA">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="login-box">
                    <h1>Iniciar Sesión</h1>
                    <form class="login-margin" action="#" method="post">
                        <label for="username">Usuario</label>
                        <input type="text" name="codigo" placeholder="Ingresar usuario">
                        <label for="password">Contraseña</label>
                        <input type="password" name="contra" placeholder="Ingresar contraseña">
                        <input type="submit" value="Iniciar Sesión"><br>
                        <!--<a href="#">He olvidado mi contraseña</a><br>
                        <a href="#">No tengo una cuenta</a>-->
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
            
    $login = new ControladorFormularios();
    $login->ctrIniciarSesionUsuario();

?>


<script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<!--<script type="text/javascript" src="js/file.js"></script>-->
<script type="module" src="js/index.js"></script>
