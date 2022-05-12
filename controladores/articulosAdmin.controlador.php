<?php

class controladorArticulos{
    
    /*                  Obtener Registros                   */

    public function ctrObtenerAdaptadores(){

        $informacion = ModeloArticulos::mdlObtenerAdaptadores();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm">
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

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtAdapt" data-id="'.$dato["id_a"].'" class="adapt">
                                <td>'.$dato["id_a"].'</td>
                                <td>'.$dato["marca_a"].'</td>
                                <td>'.$dato["modelo_a"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <input class="form-check-input" type="checkbox" disabled>
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
            
                $info='<table class="table table-sm">
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

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtBoc" data-id="'.$dato["id_b"].'" class="boc">
                                
                                <td>'.$dato["id_b"].'</td>
                                <td>'.$dato["marca_b"].'</td>
                                <td>'.$dato["modelo_b"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <input class="form-check-input" type="checkbox" disabled>
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
            
                $info='<table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Disponible</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $index => $dato){

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtCab" id="'.$dato["id_c"].$index.'" data-valor="'.$dato["id_c"].'" class="cab" value="10">
                                <td>'.$dato["id_c"].'</td>
                                <td>'.$dato["marca_c"].'</td>
                                <td>'.$dato["conexion"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <input class="form-check-input" type="checkbox" disabled>
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
            
                $info='<table class="table table-sm">
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

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtLap" data-id="'.$dato["id_l"].'" class="lap">
                                <td>'.$dato["id_l"].'</td>
                                <td>'.$dato["marca_l"].'</td>
                                <td>'.$dato["modelo_l"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <input class="form-check-input" type="checkbox" disabled>
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
            
                $info='<table class="table table-sm">
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

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarArtProy" data-id="'.$dato["id_p"].'" class="proy">
                                <td>'.$dato["id_p"].'</td>
                                <td>'.$dato["marca_p"].'</td>
                                <td>'.$dato["modelo_p"].'</td>
                                <td>
                                    <div class="form-check form-switch m-auto">
                                        <input class="form-check-input" type="checkbox" disabled>
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

    /*                  Fin Obtener Registros                   */

    /*                  Modificar Registros                     */



    /*                  Fin Modificar Registros                 */

}

?>