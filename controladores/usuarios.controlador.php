<?php

class controladorUsuarios{

    public function ctrObtenerUsuarios(){

        $informacion = ModeloUsuarios::mdlObtenerUsuarios();

        $info="Ocurrió un error";

        if($informacion!="error"){

            if($informacion){
            
                $info='<table class="table table-sm" id="adminCab">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Paterno</th>
                        <th scope="col">Materno</th>
                        <th scope="col">Correo/th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Carrera</th>
                        <th scope="col">Semestre</th>
                    </tr>
                </thead>
                <tbody>';

                foreach($informacion as $index => $dato){

                    $info.='<tr data-bs-toggle="modal" data-bs-target="#editarUsuario" data-id="'.$dato["codigo_u"].'" data-nombre="'.$dato["nombre_u"].'" data-app="'.$dato["app_u"].'"class="cab" >
                                <td>'.$dato["codigo_u"].'</td>
                                <td>'.$dato["nombre_u"].'</td>
                                <td>'.$dato["app_u"].'</td>
                                <td>'.$dato["apm_u"].'</td>
                                <td>'.$dato["correo_u"].'</td>
                                <td>'.$dato["telefono"].'</td>
                                <td>'.$dato["carrera"].'</td>
                                <td>'.$dato["semestre"].'</td>
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

}

?>