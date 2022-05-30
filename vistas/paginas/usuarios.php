<link rel="stylesheet" href="./css/styleFormR.css">

<div class="mb-4">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php?pagina=usuarios"><i class="bi bi-plus-circle"></i> Nuevo<a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=crearUsuarios"><i class="bi bi-person-square"></i> Usuarios</a>
        </li>
    </ul>
</div>

<h3>Nuevo usuario</h3>

<form action="" class="form">
    <div class="form-container">
    <div class="row m-3">
        <div class="row m-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <input type="text" id="codigo" class="form-input" placeholder=" ">
                    <label for="codigo" class="form-label">Código</label>
                    <span class="form-line"></span>
                    <!--  <p class="error_phrase">El código debe tener de 8 a 9 dígitos (sólo números)</p>-->
                </div>  
            </div>  
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <input type="text" id="nombre" class="form-input" placeholder=" ">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span class="form-line"></span>
                    <!-- <p class="error_phrase">El nombre no puede tener números</p>-->
                </div>
            </div>
        </div>

        <div class="row m-2">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <input type="password" id="pass" class="form-input" placeholder=" ">
                    <label for="pass" class="form-label">Contraseña</label>
                    <span class="form-line"></span>
                    <!--<p class="error_phrase">La contraseña debe tener de 4 a 12 caracteres</p>-->
                </div>  
            </div>  
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <input type="password" id="pass2" class="form-input" placeholder=" ">
                    <label for="pass2" class="form-label">Comprobación</label>
                    <span class="form-line"></span>
                    <!--<p class="error_phrase">Las contraseñas deben ser iguales</p>-->
                </div>
            </div>
        </div>

        <div class="row m-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <select id="carrera" class="form-select-sm form-s-select" aria-label=".form-select-sm example">
                        <option selected id="carrera">Carrera</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <!--<input type="text" id="carrera" class="form-input" placeholder=" ">
                    <label for="carrera" class="form-label">Carrera</label>-->
                    <span class="form-line"></span>
                    <!--<p class="error_phrase">Seleccione una opcción</p>-->
                </div>
            </div>  
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <select id="semestre" class="form-select-sm form-s-select" aria-label=".form-select-sm example">
                        <option selected id="semestre">Semestre</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                    <!--<input type="text" id="semestre" class="form-input" placeholder=" ">
                    <label for="semestre" class="form-label">Semestre</label>-->
                    <span class="form-line"></span>
                </div>
            </div>
        </div>

        <div class="row m-3">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <input type="email" id="mail" class="form-input" placeholder=" ">
                    <label for="mail" class="form-label">Correo</label>
                    <span class="form-line"></span>
                    <!--<p class="error_phrase">Sólo son válidos los signos ".", "_", "-"</p>-->
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                    <input type="text" id="tel" class="form-input" placeholder=" ">
                    <label for="tel" class="form-label">Teléfono</label>
                    <span class="form-line"></span>
                    <!--<p class="error_phrase">El teléfono debe contener 10 dígitos</p>-->
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col">
                <input type="submit" class="form-submit" value="Registrar">
            </div>
        </div>
    </div>
    </div>
</form>