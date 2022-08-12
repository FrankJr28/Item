<div class="mb-4"> 
    <div class="mb-4">
        <h3>Préstamos por aceptar</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-des-3 table-sm" id="tablaDatos2" style="width:100%;">
            <thead>
                <tr>
                    <th>Folio</th>
                    <th># usuario</th>
                    <th>Nombre</th>
                    <th></th>
                    <th>Fecha de solicitud</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tfoot>

            </tfoot>
        </table>
    </div><!--TABLE-->
    <?php
        $viewTabla = new ControladorFormularios;
        $viewTabla->ctrAceptarPrestamo();
        $viewTabla->ctrRechazarPrestamo();
    ?>
</div>