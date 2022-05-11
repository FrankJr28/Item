      
    <a class="btn btn-default b-yw-us mb-4" style="width:max-content" data-bs-toggle="collapse" href="#solicitar" role="button" aria-expanded="false" aria-controls="solicitar">Material disponible</a>
    <div class="collapse" id="solicitar">
        <div class="card-group complete">
            <div class="card border-light mb-3">
                <div class="card-header">Adaptadores</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                        <div class="fw-bold">HDMI-VGA</div>
                        </div>
                        <span class="badge bg-primary rounded-pill">1</span>
                    </li>
                    <?php
                        $adaptadores = new ControladorFormularios();
                        $adaptadores->ctrObtenerAdaptadores();
                    ?>
                </ul>
            </div>
            <div class="card border-light mb-3">
                <div class="card-header">Bocinas</div>
                <ul class="list-group list-group-flush">
                    <?php
                        $bocinas = new ControladorFormularios();
                        $bocinas->ctrObtenerBocinas();
                    ?>
                </ul>
            </div>
            <div class="card border-light mb-3">
                <div class="card-header">Cables</div>
                <ul class="list-group list-group-flush">
                    <?php
                        $cables = new ControladorFormularios();
                        $cables->ctrObtenerCables();
                    ?>
                </ul>
            </div>

            <div class="card border-light mb-3">
                <div class="card-header">Laptops</div>
                <ul class="list-group list-group-flush">
                <?php
                    $laptops = new ControladorFormularios();
                    $laptops->ctrObtenerLaptops();
                ?>
                </ul>
            </div>

            <div class="card border-light mb-3">
                <div class="card-header">Proyectores</div>
                <ul class="list-group list-group-flush">
                    <?php
                        $proyectores = new ControladorFormularios();
                        $proyectores ->ctrObtenerProyectores();
                    ?>
                </ul>
            </div>
        </div><!--CARD GROUP-->
        <button class="btn btn-primary  mb-4">Solicitar material</button>
    </div><!--COLLAPSE-->

    <div class="mb-4">
        <h3>Préstamo activo</h3>
        <div class="border rounded txalbord">
            <p>Laptop Lenovo Aspire</p>
        </div>
    </div><!--PRESTAMO ACT-->

    <div class="mb-4">
        <h3>Historial de préstamos</h3>
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-des-3 table-sm">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Inicio</th>
                        <th>Termino</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Larry the Bird</td>
                        <td>jj</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Larry the Bird</td>
                        <td>jj</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Larry the Bird</td>
                        <td>jj</td>
                    </tr>
                </tbody>
            </table>
        </div><!--TABLE-->

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
    </div><!--HIST PREST-->