<?php

class controladorArticulos{

    public function ctrObtenerLaptops(){

        $informacion = ModeloArticulos::mdlObtenerLaptops();

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

                    $info.='<tr>
                                <td>'.$dato["id_l"].'</td>
                                <td>'.$dato["marca_l"].'</td>
                                <td>'.$dato["modelo_l"].'</td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" disabled>
                                </div>
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
    
}

?>