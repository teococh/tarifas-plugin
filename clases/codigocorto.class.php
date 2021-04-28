<?php
   
    class codigocorto{

       public function ObtenerTarifa($tarifaid) {
           global $wpdb;
            $tabla = "{$wpdb->prefix}tarifas";
            $query = "SELECT * FROM $tabla WHERE tarifa_id='$tarifaid'";
            $datos = $wpdb->get_results($query,ARRAY_A);

            if (empty($datos)) {
                $datos = array();
            }
            return $datos;

       }

       function Generador($tarifaid){

        $data = $this->ObtenerTarifa($tarifaid);

        foreach ($data as $key => $value) {
            $id = $value['tarifa_id'];
            $minutos = $value['minutos'];
            $gigas = $value['gigas'];
            $precio = $value['precio'];
        }
        
        
        $html = "
        <table class='wp-list-table widefat fixed striped pages'>
            <thead>
                <th><b>id tarifa</b></th>
                <th><b>minutos</b></th>
                <th><b>gigas</b></th>
                <th><b>precio</b></th>
            </thead>
            <tbody id='the-list'>
                <tr>
                    <td>$id</td>
                    <td>$minutos</td>
                    <td>$gigas</td>
                    <td>$precio</td>
                </tr>
            </tbody>
        </table>
        ";

        return $html;
       }

    }
?>