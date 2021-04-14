<?php

/* 
Plugin Name: testplugin
Plugin URI:
Description: Plugin de pruebas
Version: 0.0.1
*/

function Activar() {
   

    // TODO Conexion con la base de datos para crear las tablas necesarias 
    global $wpdb;

    

}

function Desactivar() {

}

add_action('admin_menu','CrearMenu');

function CrearMenu(){
    add_menu_page(
        'tarifas', // Nombre de la pagina
        'sferaTarifas', // Nombre del menu
        'manage_options', // CApability
        plugin_dir_path(__FILE__).'admin/principal.php', // Slug
        null, // Funcion del contenido
            plugin_dir_url(__FILE__).'admin/img/icono.svg',
            '1'
    );
    
    add_submenu_page(
        'sp_menu', // parent slug
        'Ajustes', // Titulo
        'Ajustes', // Titulo menu
        'manage_options', //
        'sp_menu_ajustes',
        'Submenu'
    );
}

function MostrarContenido() {
    echo "<h1>Contenido de la pagina</h1>";
}

function Submenu() {
    echo "pruebas";
}


register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__, 'Desactivar');
