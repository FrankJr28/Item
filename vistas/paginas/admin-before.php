<?php        
    
    $login = new ControladorFormularios();
    
    $login->ctrValidarSesionAdmin();

    $resultado=ControladorFormularios::ctrSeleccionarRegistrosPrestamos();

?>

<div class="container-fluid d-flex flex-column justify-content-between">
   <div class="collapse" id="navbarExternalCont">
        <div class="bg-light p-4">
            <div class="row">
                <a class="navbar-brand" style="color:black;" href="#">Hola <?php echo $_SESSION["admin"]['nombre_a']; ?></a>
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
                <a class="nav-link" href="#">Hola <?php echo $_SESSION["admin"]['nombre_a']; ?></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="logout.php">Cerrar Sesión</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>
</div>

<h4>Solicitudes pendientes</h4>
<div class="table-responsive mb-4 m-3 text-light" style="min-height: 15rem">
    <table class="table table-striped table-hover">
        <thead style="background-color:#69879A; color:#ffffff">
            <tr>
            <th scope="col">N° prestamo</th>
            <th scope="col">Código</th>
            <th scope="col">Solicitante</th>
            <th scope="col">Ubicacion</th>
            <th scope="col" >Inicio</th>
            <th scope="col" >Acciones</th>
            </tr>
        </thead>
        <tbody id="ttable">
            <?php foreach($resultado as $dato): ?>
                <tr>
                    <td>
                        <form method="post" name="forma<?php echo ($dato['id_pres']); ?>" id="form<?php echo ($dato['id_pres']); ?>" action="ver_prestamo.php">
                            <div style="cursor:pointer" class="checkUsuario"><input type="hidden" name="id_pres" value=<?php echo ($dato['id_pres']); ?>><?php echo ($dato['id_pres']); ?></div>
                        </form>
                    </td>
                    <td>
                        <form method="post" name="forma<?php echo ($dato['codigo_u']); ?>" id="form<?php echo ($dato['codigo_u']); ?>" action="ver_usuario.php">
                            <div style="cursor:pointer" class="checkUsuario"><input type="hidden" name="cod" value=<?php echo ($dato['codigo_u']); ?>><?php echo ($dato['codigo_u']); ?></div>
                        </form>
                        
                    </td>
                    <td><?php echo ($dato["nombre_u"]); ?></td>
                    <td><?php echo ($dato["ubicacion"]); ?></td>
                    <td><?php echo date('Y-m-d H:i', strtotime($dato["inicio"])); ?></td>
                    <td class="c-acciones">
                        <a href="#" class="acept"><i class="far fa-thumbs-up m-1" style="color:green;">X</i></a>
                        <a href="#" class="delete"><i class="fas fa-times-circle m-1" style="color:red;">C</i></a>
                        
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</div>