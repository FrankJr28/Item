
<div class="row flex-grow-1 d-flex justify-content-center">

    <div class="col-12 col-sm-10 col-md-8 col-lg-6 d-flex">
        
        <div class="col-12 align-self-center  border bg-light">
            
            <div class="row"><h4>Iniciar Sesión</h4></div>

            <form method="post" action="#" id="formlogin">

                <div class="mb-3 ">

                    <label for="exampleFormControlInput1" class="form-label">Código</label>

                    <input type="number" class="form-control" id="cod" name="codigo">

                </div>

                <div class="mb-3">

                    <label for="exampleFormControlTextarea1" class="form-label">Contraseña</label>

                    <input type="password" class="form-control" id="pass" name="contra">

                </div>

                <!--<div class="mb-3 d-flex justify-content-end">-->

                <div class="mb-3 ">

                    <button type="submit" class="form-control btn btn-primary ">Iniciar Sesión</button>

                </div>

                <div class="mb-3 ">

                    <button type="submit" class="form-control btn btn-danger ">Continuar con Google</button>

                </div>

            </form>

            <?php
            
                $login = new ControladorFormularios();
                $login->ctrIniciarSesionUsuario();

            ?>

            

        </div>

    </div>

</div>