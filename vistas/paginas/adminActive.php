<?php        
    $login = new ControladorFormularios();    
    $login->ctrValidarSesionAdmin();
?>
<div class="mb-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link" href="index.php?pagina=adminAccept"><i class="bi bi-clipboard-minus-fill"></i> Por aceptar<a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page"  href="index.php?pagina=adminActive"><i class="bi bi-hourglass-split"></i> Activos</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="index.php?pagina=adminHistory"><i class="bi bi-clock-history"></i> Historial</a>
        </li>
    </ul>
</div>

<div class="mb-4">
    <div class="mb-4">
        <h3>Préstamos activos</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-des-3 table-sm" id="tablaDatos" style="width:100%;">
            <thead>
                <tr>
                    <th>Folio</th>
                    <th># de usuario</th>
                    <th>Nombre</th>
                    <th>inicio</th>
                    <th>Hora</th>
                    <th>Finalizar</th>
                </tr>
            </thead>
            
        </table>
    </div><!--TABLE-->

    <?php
    
        $viewTabla = new ControladorFormularios;
        $viewTabla->ctrFinalizarPrestamo();
        
    ?>


</div>

<script type="text/javascript" src="datatables/datatables.min.js"></script>
<script type="text/javascript" src="./js/tablas/tablaAdminActive.js"></script>