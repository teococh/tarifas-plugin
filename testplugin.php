<?php

/* 
Plugin Name: testplugin
Plugin URI:
Description: Plugin de pruebas
Version: 0.0.1
*/

function Activar() {
    echo "<h1>ASDASDASDASDASDASDAS</h1>";
}

function Desactivar() {

}



register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__, 'Desactivar');
