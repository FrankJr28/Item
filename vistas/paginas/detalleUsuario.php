<?php

    $validar = new ControladorFormularios();
    $validar->ctrValidarSesionAdmin();

    if(!isset($_POST["codigo"])){
        echo '<script>
            
            window.history.back();

        </script>';
    }

    $usu = ControladorFormularios::ctrObtenerDetalleUsuario();

?>
<div style="height:50px; width: 100%;">

</div>

<div class="mb-4">
    <div class="mb-4">
        <h3>Ver usuario</h3>
    </div>
    <div class="form-view">
        <form class="" action="" method="post">
            <fieldset disabled>
            <div class="row">
                <div class="col-4">
                <label for="start">Código:</label>
                <input type="text" id="start" name="trip-start" value="<?= $usu["codigo_u"] ?>">
                </div><div class="col-1"></div><div class="col-4">
                <label for="start">Nombre:</label>
                <input type="text" id="start" name="trip-start" value="<?= $usu["nombre_u"].' '.$usu["app_u"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                <label for="start">Carrera:</label>
                <input type="text" id="start" name="trip-start" value="<?= $usu["carrera"] ?>">
                </div><div class="col-1"></div><div class="col-4">
                <label for="start">Semestre:</label>
                <input type="text" id="start" name="trip-start" value="<?= $usu["semestre"] ?>o">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                <label for="start">Correo:</label>
                <input type="text" id="start" name="trip-start" value="<?= $usu["correo_u"] ?>">
                </div><div class="col-1"></div><div class="col-4">
                <label for="start">Teléfono:</label>
                <input type="text" id="start" name="trip-start" value="<?= $usu["telefono"] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                <label for="start">Credencial:</label><br><br>
                <img src="./img/proof.jpg" class="img-fluid rounded" alt="Credencial">
                </div><div class="col-4"></div>
            </div>
            <div class="line"></div>
            </fieldset>
            </form>
    </div>
    <div class="mb-3">
        <h4>Historial de préstamos</h4>
    </div>
    <div class="mb-3">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-des-3 table-sm">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Fecha de inicio</th>
                        <th>Fecha de termino</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="location.href='./loan-view.html'">
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr onclick="location.href='./loan-view.html'">
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr onclick="location.href='./loan-view.html'">
                        <td>3</td>
                        <td>Larry the Bird</td>
                        <td>jj</td>
                    </tr>
                    <tr onclick="location.href='./loan-view.html'">
                        <td>4</td>
                        <td>Larry the Bird</td>
                        <td>jj</td>
                    </tr>
                    <tr onclick="location.href='./loan-view.html'">
                        <td>5</td>
                        <td>Larry the Bird</td>
                        <td>jj</td>
                    </tr>
                </tbody>
            </table>
        </div><!--TABLE-->  
    </div>
    <div style="margin-right: 2%;">
        <nav aria-label="HERE">
            <ul class="pagination pagination-sm justify-content-end">
                <li class="page-item active" aria-current="page">
                    <span class="page-link" style="background-color: #216e8a;">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
    </div>
</div>