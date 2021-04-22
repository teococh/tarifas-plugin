<?php
   
    class codigocorto{

        public function ObtenerTarifa( $tarifa ) {
            global $wpdb;

            $tabla = "{$wpdb->prefix}tarifas";
            $query = "SELECT * FROM $tabla WHERE tarifa_id = '$tarifa'";
            $datos = $wpdb-get_results($query,ARRAY_A);
            if (empty($datos)) {
                $datos = "";
            }
            return $datos;
        }



    }
?>