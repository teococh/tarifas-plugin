<?php

/* 
Plugin Name: testplugin
Plugin URI:
Description: Plugin de pruebas
Version: 0.0.1
*/

function Activar() {
   
}

function Desactivar() {

}

add_action('admin_menu','CrearMenu');

function CrearMenu(){
    add_menu_page(
        'tarifas', // Nombre de la pagina
        'sferaTarifas', // Nombre del menu
        'manage_options', // CApability
        'sp_menu', // Slug
        'MostrarContenido', // Funcion del contenido
            plugin_dir_url(__FILE__).'admin/img/icono.png',
            '1'
    );
}

function MostrarContenido() {
    echo "<h1>Contenido de la pagina</h1>";
}

register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__, 'Desactivar');
