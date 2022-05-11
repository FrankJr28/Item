

<div class="container-fluid d-flex flex-column justify-content-between">
   <div class="collapse" id="navbarExternalCont">
        <div class="bg-light p-4">
            <div class="row">
                <a class="navbar-brand" style="color:black;" href="#">Hola <?php echo $_SESSION["usuario"]['nombre_u']; ?></a>
            </div>
            <div class="row">
                <a class="navbar-brand active" style="color:black;" href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarExternalCont" aria-controls="navbarExternalCont" aria-expanded="false" aria-label="Toggle navigation" id="nvbtn">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                <a class="nav-link" href="#">Hola <?php echo $_SESSION["usuario"]['nombre_u']; ?></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="logout.php">Cerrar Sesión</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid">
    <button type="submit" class="btn btn-primary">Solicitar</button>

    <div class="bg-success">
        
        <div class="bg-info">
            <h5 class="text-white">Laptops</h5>
            <?php
                $laptops = new ControladorFormularios();
                $laptops->ctrObtenerLaptops();
            ?>
        </div>

        <div class="bg-info">
            <h5 class="text-white">Bocinas</h5>
            <?php
                $bocinas = new ControladorFormularios();
                $bocinas->ctrObtenerBocinas();
            ?>
        </div>

        <div class="bg-info">
            <h5 class="text-white">Proyectores</h5>
            <?php
                $proyectores = new ControladorFormularios();
                $proyectores ->ctrObtenerProyectores();
            ?>
        </div>

        <div class="bg-info">
            <h5 class="text-white">cables</h5>
            <?php
                $cables = new ControladorFormularios();
                $cables->ctrObtenerCables();
            ?>
        </div>

        <div class="bg-info">
            <h5 class="text-white">adaptadores</h5>
            <?php
                $adaptadores = new ControladorFormularios();
                $adaptadores->ctrObtenerAdaptadores();
            ?>
        </div>

    </div>
</div>

<div class="modal" tabindex="-1" id="modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Materiales</h5>
                <button type="button" class="btn-danger" data-dismiss="modal" aria-label="Close">&times</button>
            </div>
            <form action="" method="post">
                
                <div class="modal-body" id="modal-body">
                    <!---<p>Modal body text goes here.</p>-->
                    <div class="justify-content-start">
                    <h6>Camaras:</h6><div id="camaras-s"></div>
                    </div>
                </div>
                
                <div class="modal-body">
                    <h6>Microfonos:</h6> <div id="microfonos-s"></div>
                </div>
                
                <div class="modal-body">
                    <h6>Lamparas</h6> <div id="lamparas-s"></div>
                </div>
                
                <div class="modal-body">
                    <h6>Proyectores</h6> <div id="proyectores-s"></div>
                </div>
                
                <div class="modal-body">
                    <h6>Flash:</h6> <div id="flash-s"></div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </div>
            </form>
        </div>
    </div>
</div>