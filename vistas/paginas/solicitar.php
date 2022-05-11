<link rel="stylesheet" href="./css/user-styles.css">   

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!--
<div class="container">
    <input type="checkbox" id="btn-car">
    
    
    <div class="lista-car">
        <div class="card fade w-50">
            <div class="card-header"><i class=""></i>
                <h5><i class="bi bi-bag-fill"></i>Préstamo actual</h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item actit d-flex align-items-start">
                    <h6>Artículos solicitados</h6>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">
                    <h6>Id-item</h6>
                    <button type="button" class="btn-close btn-sm"></button>
                </li>                          
                <li class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">
                        <h6>Id-item</h6>
                        <button type="button" class="btn-close btn-sm"></button>
                </li>
            </ul> 
            <div class="card-footer">
                <label for="btn-car" type="button" class="card-btn b-cn">Seguir agregando</label>
                <button id="btn-sol" class="card-btn b-yw">Solicitar préstamo</button>
            </div>  
        </div>
    </div>

    
    <div class="btn-car">
        <label for="btn-car" class="bi bi-bag-fill"></label>
    </div>

</div>
-->
<!-- Material disponible -->   

<?php
    if(isset($_POST["adapt"])){
        echo "Hola" ;

        echo '<script>

            if ( window.history.replaceState ) {

                window.history.replaceState( null, null, window.location.href );

            }

        </script>';

    }
?>

<div class="mb-4">
    <h3>Material disponible</h3>

    <div class="">
        <!-- NAV TABS -->   
        <ul class="nav nav-tabs tabs" id="tabslist">
            <li id="tabitem1" class="nav-item">
                <a class="nav-link" href="#item1">
                    <i class="fa fa-brands fa-usb"></i>
                    <span class="tab-text">Adaptadores</span>
                </a>
            </li>
            <li id="tabitem2" class="nav-item">
                <a class="nav-link" href="#item2">
                    <i class="bi bi-speaker-fill"></i>
                    <span class="tab-text">Bocinas</span>
                </a>
            </li>
            <li id="tabitem3" class="nav-item">
                <a class="nav-link" href="#item3">
                    <i class="fa fa-regular fa-plug"></i>
                    <span class="tab-text">Cables</span>
                </a>
            </li>
            <li id="tabitem4" class="nav-item">
                <a class="nav-link" href="#item4">
                    <i class="fa fa-light fa-laptop"></i>
                    <span class="tab-text">Laptops</span>
                </a>
            </li>
            <li id="tabitem5" class="nav-item">
                <a class="nav-link" href="#item5">
                    <i class="fa fa-light fa-desktop"></i>
                    <span class="tab-text">Monitores</span>
                </a>
            </li>
        </ul>
        <!-- NAV TABS ENDS --> 
    
    </div>
        <!-- TABS CONTENT --> 
        <div class="material">
            <article id="item1">
                <div class="list-group" id="contenedor-adaptadores">
                    <a class="list-group-item actit d-flex justify-content-between align-items-start">
                        <h6>Adaptador Id</h6>
                        <h6>Solicitar</h6>
                    </a>
                    <?php
                        $adaptadores = new ControladorFormularios();
                        $adaptadores->ctrObtenerAdaptadores();
                    ?>
                </div>
            </article>

            <article id="item2">
                <div class="list-group" id="contenedor-bocinas">
                    <a class="list-group-item actit d-flex justify-content-between align-items-start">
                        <h6>Bocina Id</h6>
                        <h6>Solicitar</h6>
                    </a>
                    <?php
                        $bocinas = new ControladorFormularios();
                        $bocinas->ctrObtenerBocinas();
                    ?>
                </div>
            </article>
            <article id="item3">
                <div class="list-group" id="contenedor-cables">
                    <a class="list-group-item actit d-flex justify-content-between align-items-start">
                        <h6>Cable Id</h6>
                        <h6>Solicitar</h6>
                    </a>
                    <?php
                        $cables = new ControladorFormularios();
                        $cables->ctrObtenerCables();
                    ?>
                </div>
            </article>

            <article id="item4">
                <ul class="list-group list-group-flush" id="contenedor-laptops">

                    <?php
                        $laptops = new ControladorFormularios();
                        $laptops->ctrObtenerLaptops();
                    ?>

                </ul>
            </article>

            

            <article id="item5">
                <ul class="list-group list-group-flush">
        
                    <?php
                        $proyectores = new ControladorFormularios();
                        $proyectores->ctrObtenerProyectores();
                    ?>
                    
                </ul>
            </article>
        </div><!-- TABS CONTENT ENDS--> 

    <!--WRAP-->

    

            <div><!-- modal-monitor-->
                <div class="modal fade" id="modal-monitor" tabindex="-1" aria-labelledby="modal-monitor" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <i class="fa fa-light fa-desktop"></i>
                            <h5 class="modal-title" id="exampleModalLabel">Monitores</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="list-group">
                                <a class="list-group-item actit d-flex justify-content-between align-items-start">
                                    <h6>Monitor Id</h6>
                                    <h6>Solicitar</h6>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">
                                    <h6>Id-item</h6>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                    </div>
                                </a>
                                <a class="list-group-item d-flex justify-content-between align-items-start list-group-item-action ">
                                    <h6>Id-item</h6>
                                    <div>
                                        <button type="button" class="no-dis" disabled> </button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div><!-- modal-monitor ends-->

</div><!--MATERIAL DISPONIBLE FIN-->

<script type="text/javascript" src="./js/alerts.js"></script>                

<script type="text/javascript" src="./js/user.js"></script>

<script src="https://kit.fontawesome.com/b4ec81d6df.js" crossorigin="anonymous"></script>
