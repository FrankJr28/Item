<?php

class controladorArticulos{
    
    /*                  Obtener Registros                   */

    public function ctrObtenerAdaptadores(){

        $informacion = ModeloArticulos::mdlObtenerAdaptadores();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-hover table-bordered table-des-3 table-sm" id="adminAdapt">
                <thead>
                    <tr>
                        <th scope="col">Adaptador Id</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Disponible</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $dato){

                    //<tr data-bs-toggle="modal" data-bs-target="#editarArtCab" id="'.$dato["id_c"].$index.'" data-valor="'.$dato["id_c"].'" data-marca="'.$dato["marca_c"].'" data-conexion="'.$dato["conexion"].'"class="cab" value="10">

                    /*
                     $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtBoc" data-id="'.$dato["id_b"].'" data-marca="'.$dato["marca_b"].'" data-modelo="'.$dato["modelo_b"].'" class="boc">
                    */

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtAdapt" data-id="'.$dato["id_a"].'" data-marca="'.$dato["marca_a"].'" data-modelo="'.$dato["modelo_a"].'" data-obs="'.$dato["obs_a"].'" data-disp="'.$dato["disp_a"].'" class="adapt">
                                <td>'.$dato["id_a"].'</td>
                                <td>'.$dato["marca_a"].'</td>
                                <td>'.$dato["modelo_a"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <i class="bi bi-circle-fill text-secondary';
                                        
                                        if($dato["disp_a"])
                                            $info.=' text-success';

                                        $info.='"></i>
                                    </div>
                                </td>
                            </tr>';

                }

                $info.='</tbody>
                </table>';               
                        
            }

            else{
                $info="No hay Adaptadores";
            }

            echo $info;

        }

    }

    public function ctrObtenerBocinas(){

        $informacion = ModeloArticulos::mdlObtenerBocinas();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm" id="adminBoc">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Disponible</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $dato){

                    //<tr data-bs-toggle="modal" data-bs-target="#editarArtCab" id="'.$dato["id_c"].$index.'" data-valor="'.$dato["id_c"].'" data-marca="'.$dato["marca_c"].'" data-conexion="'.$dato["conexion"].'"class="cab" value="10">

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtBoc" data-id="'.$dato["id_b"].'" data-marca="'.$dato["marca_b"].'" data-modelo="'.$dato["modelo_b"].'" data-obs="'.$dato["obs_b"].'" data-disp="'.$dato["disp_b"].'" class="boc">
                                
                                <td>'.$dato["id_b"].'</td>
                                <td>'.$dato["marca_b"].'</td>
                                <td>'.$dato["modelo_b"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <i class="bi bi-circle-fill text-secondary';
                                        
                                        if($dato["disp_b"])
                                            $info.=' text-success';

                                        $info.='"></i>
                                    </div>
                                </td>
                            </tr>';

                }

                $info.='</tbody>
                </table>';               
                        
            }

            else{
                $info="No hay Adaptadores";
            }

            echo $info;

        }

    }

    public function ctrObtenerCables(){

        $informacion = ModeloArticulos::mdlObtenerCables();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm" id="adminCab">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Conexion</th>
                        <th scope="col">Disponible</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $index => $dato){

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtCab" id="'.$dato["id_c"].$index.'" data-valor="'.$dato["id_c"].'" data-marca="'.$dato["marca_c"].'" data-conexion="'.$dato["id_tc"].'" data-disp="'.$dato["disp_c"].'" class="cab" >
                                <td>'.$dato["id_c"].'</td>
                                <td>'.$dato["marca_c"].'</td>
                                <td>'.$dato["conexion"].'</td>

                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <i class="bi bi-circle-fill text-secondary';
                                        
                                        if($dato["disp_c"])
                                            $info.=' text-success';

                                        $info.='"></i>
                                    </div>
                                </td>
                            </tr>';

                }

                $info.='</tbody>
                </table>';               
                        
            }

            else{
                $info="No hay Adaptadores";
            }

            echo $info;

        }

    }

    public function ctrObtenerLaptops(){

        $informacion = ModeloArticulos::mdlObtenerLaptops();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm" id="adminLap">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">N° Serie</th>
                        <th scope="col">Disponible</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $dato){

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtLap" data-id="'.$dato["id_l"].'" data-marca="'.$dato["marca_l"].'" data-modelo="'.$dato["modelo_l"].'" data-snL="'.$dato["sn_l"].'" data-obs="'.$dato["obs_l"].'" data-disp="'.$dato["disp_l"].'" class="lap">
                                <td>'.$dato["id_l"].'</td>
                                <td>'.$dato["marca_l"].'</td>
                                <td>'.$dato["modelo_l"].'</td>
                                <td>'.$dato["sn_l"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <i class="bi bi-circle-fill text-secondary';
                                        
                                        if($dato["disp_l"])
                                            $info.=' text-success';

                                        $info.='"></i>
                                    </div>
                                </td>
                            </tr>';

                }

                $info.='</tbody>
                </table>';               
                        
            }

            else{
                $info="No hay laptops";
            }

            echo $info;

        }

    }
    
    public function ctrObtenerProyectores(){

        $informacion = ModeloArticulos::mdlObtenerProyectores();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm" id="adminProy">
                <thead>
                    <tr data-bs-toggle="modal" data-bs-target="#editarArt">
                        <th scope="col">Id</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Disponible</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $dato){

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtProy" data-id="'.$dato["id_p"].'" data-marca="'.$dato["marca_p"].'" data-modelo="'.$dato["modelo_p"].'" data-snp="'.$dato["sn_p"].'" data-disp="'.$dato["disp_p"].'" class="proy">
                                <td>'.$dato["id_p"].'</td>
                                <td>'.$dato["marca_p"].'</td>
                                <td>'.$dato["modelo_p"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <i class="bi bi-circle-fill text-secondary';
                                        
                                        if($dato["disp_p"])
                                            $info.=' text-success';

                                        $info.='"></i>
                                    </div>
                                </td>
                            </tr>';

                }

                $info.='</tbody>
                </table>';               
                        
            }

            else{
                $info="No hay laptops";
            }

            echo $info;

        }

    }

    public function ctrObtenerTipoConexion(){

        $conexiones= ModeloArticulos::mdlObtenerTipoConexion();

        foreach($conexiones as $dato){
            echo "<option value=".$dato["id_tc"].">".$dato["conexion"]."</option>";        
        }

    }

    /*                  Fin Obtener Registros                   */

    /*                  Actualizar Registros                    */

    static public function ctrActualizarAdaptador(){
        
        if(isset($_POST["ida"])){

            $ar = array('id' => $_POST["ida"],
                            'marca' => $_POST["marcaa"],
                            'modelo' => $_POST["modeloa"],
                            'obs' => $_POST["obsa"],
                            'disp' => 0
                        );

            if(isset($_POST["disp-a"])){
                $ar['disp']=1;
            }

            $respuesta = ModeloArticulos::mdlActualizarAdaptador($ar);

            return $respuesta;
        
        }

    }

    static public function ctrActualizarBocina(){
        
        if(isset($_POST["idb"])){

            $ar = array('id' => $_POST["idb"],
                            'marca' => $_POST["marcab"],
                            'modelo' => $_POST["modelob"],
                            'obs' => $_POST["obsb"],
                            'disp' => 0
                        );
            
            if(isset($_POST["disp-b"])){
                $ar['disp']=1;
            }

            $respuesta = ModeloArticulos::mdlActualizarBocina($ar);

            return "ok";
        
        }

    }

    static public function ctrActualizarCable(){
        
        if(isset($_POST["idc"])){

            $ar = array('id' => $_POST["idc"],
                            'marca' => $_POST["marcac"],
                            'conexion' => $_POST["conexion"],
                            'disp' => 0
                        );

            if(isset($_POST["disp-c"])){
                $ar['disp']=1;
            }

            $respuesta = ModeloArticulos::mdlActualizarCable($ar);

            return $respuesta;
        
        }

    }

    static public function ctrActualizarLaptop(){

        if(isset($_POST["idl"])){
            
            $ar = array('id' => $_POST["idl"],
                        'marca' => $_POST["marcal"],
                        'modelo' => $_POST["modelol"],
                        'sn' => $_POST["sn"],
                        'obs' => $_POST["obs"],
                        'disp' => 0
                    );

            if(isset($_POST["disp-l"])){
                $ar['disp']=1;
            }

            $respuesta = ModeloArticulos::mdlActualizarLaptop($ar);

            return $respuesta;

        }

    }

    static public function ctrActualizarProyector(){
        
        if(isset($_POST["idp"])){
            
            $ar = array('id' => $_POST["idp"],
                        'marca' => $_POST["marcap"],
                        'modelo' => $_POST["modelop"],
                        'sn' => $_POST["snp"],
                        'obs' => $_POST["obsp"],
                        'disp' => 0
                    );

            if(isset($_POST["disp-p"])){
                $ar['disp']=1;
            }

            $respuesta = ModeloArticulos::mdlActualizarProyector($ar);

            return $respuesta;

        }

    }

    /*                  Fin Actualizar Registros                    */

    /*                  Insertar Registros                      */

    static public function ctrInsertarAdaptador(){
        
        if(isset($_POST["id-a"])){
            if(!isset($_POST["disp-a"]))
                $_POST["disp-a"]=0;
            $ar = array('id' => $_POST["id-a"],
                            'marca' => $_POST["marca-a"],
                            'modelo' => $_POST["modelo-a"],
                            'obs' => $_POST["obs-a"],
                            'disp' => $_POST["disp-a"]
                        );

            $respuesta = ModeloArticulos::mdlInsertarAdaptador($ar);

            return $respuesta;
        
        }

    }

    static public function ctrInsertarBocina(){
        
        if(isset($_POST["id-b"])){
            if(!isset($_POST["disp-b"]))
                $_POST["disp-b"]=0;
            $ar = array('id' => $_POST["id-b"],
                            'marca' => $_POST["marca-b"],
                            'modelo' => $_POST["modelo-b"],
                            'obs' => $_POST["obs-b"],
                            'disp' => $_POST["disp-b"]
                        );

            $respuesta = ModeloArticulos::mdlInsertarBocina($ar);

            return "ok";
        
        }

    }

    static public function ctrInsertarCable(){
        
        if(isset($_POST["id-c"])){
            
            if(!isset($_POST["disp-c"]))
                $_POST["disp-c"]=0;

            $ar = array('id' => $_POST["id-c"],
                            'marca' => $_POST["marca-c"],
                            'conexion' => $_POST["conexion-c"],
                            'disp' => $_POST["disp-c"]
                        );

            $respuesta = ModeloArticulos::mdlInsertarCable($ar);

            return $respuesta;
        
        }

    }

    static public function ctrInsertarLaptop(){

        if(isset($_POST["id-l"])){
            
            if(!isset($_POST["disp-l"]))
                $_POST["disp-l"]=0;

            $ar = array('id' => $_POST["id-l"],
                        'marca' => $_POST["marca-l"],
                        'modelo' => $_POST["modelo-l"],
                        'sn' => $_POST["sn-l"],
                        'obs' => $_POST["obs-l"],
                        'disp' => $_POST["disp-l"]
                    );

            $respuesta = ModeloArticulos::mdlInsertarLaptop($ar);

            return $respuesta;

        }

    }

    static public function ctrInsertarProyector(){
        
        if(isset($_POST["id-p"])){
            
            if(!isset($_POST["disp-p"]))
                $_POST["disp-p"]=0;

            $ar = array('id' => $_POST["id-p"],
                        'marca' => $_POST["marca-p"],
                        'modelo' => $_POST["modelo-p"],
                        'sn' => $_POST["sn-p"],
                        'obs' => $_POST["obs-p"],
                        'disp' => $_POST["disp-p"]
                    );

            $respuesta = ModeloArticulos::mdlInsertarProyector($ar);

            //return "ok";
            return $respuesta;

        }

    }

    /*                  Fin Insertar Registros                  */

    /*                  Eliminar Registros                  */

    static public function ctrEliminarAdaptador(){

        if(isset($_POST["EliAdapt"])){

            $respuesta = ModeloArticulos::mdlEliminarAdaptador($_POST["EliAdapt"]);

            return $respuesta;
        
        }

    }

    static public function ctrEliminarBocina(){

        if(isset($_POST["idEliBoc"])){

            $respuesta = ModeloArticulos::mdlEliminarBocina($_POST["idEliBoc"]);

            return $respuesta;
        
        }

    }

    static public function ctrEliminarCable(){
        
        if(isset($_POST["idEliCab"])){

            $respuesta = ModeloArticulos::mdlEliminarCable($_POST["idEliCab"]);

            return $respuesta;
        
        }

    }

    static public function ctrEliminarLaptop(){

        if(isset($_POST["idEliLap"])){

            $respuesta = ModeloArticulos::mdlEliminarLaptop($_POST["idEliLap"]);

            return $respuesta;
        
        }

    }

    static public function ctrEliminarProyector(){

        if(isset($_POST["idEliProy"])){

            $respuesta = ModeloArticulos::mdlEliminarLaptop($_POST["idEliProy"]);

            return $respuesta;
        
        }

    }
    
    /*                  Fin Eliminar Registros              */


}

?>