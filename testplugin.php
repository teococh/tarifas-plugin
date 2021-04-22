<?php

/* 
Plugin Name: testplugin
Plugin URI:
Description: Plugin de pruebas
Version: 0.0.1
*/

function Activar() {
   
    global $wpdb;

    $tableprefix = $wpdb->prefix . 'tarifas';

    $sql = "CREATE TABLE $tableprefix (
            `tarifa_id` INT NOT NULL AUTO_INCREMENT,
                `minutos` VARCHAR(15) NOT NULL ,
                `gigas` VARCHAR(15) NOT NULL , 
                `precio` INT(5) NOT NULL , 
                PRIMARY KEY (`tarifa_id`));
            );";

    

    // Ejecutamos la consulta:
   
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

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
    
}

function MostrarContenido() {
    echo "<h1>Contenido de la pagina</h1>";
}

function EncolarBootstrapJS($hook) {

    wp_enqueue_script('bootstrapJS', plugins_url('tarifas-plugin\admin/bootstrap/js/bootstrap.min.js'),__FILE__,array('jquery'));
}
add_action("admin_enqueue_scripts", 'EncolarBootstrapJS');
 
function EncolarBootstrapCSS($hook) {

    wp_enqueue_style('bootstrapCSS', plugins_url('tarifas-plugin\admin/bootstrap/css/bootstrap.min.css'),__FILE__);
}
add_action("admin_enqueue_scripts", 'EncolarBootstrapCSS');

function EncolarTarifasJs($hook) {

    if ($hook != "tarifas-plugin/admin/principal.php") {
        return;
    }
    wp_enqueue_script('tarifasJS', plugins_url('tarifas-plugin\admin\js\script-tarifas.js'),__FILE__,array('jquery'));
}
add_action("admin_enqueue_scripts", 'EncolarTarifasJs');




function imprimirshortcode($atts) {
    $_short = new codigocorto;

}



register_activation_hook(__FILE__, 'Activar');
register_deactivation_hook(__FILE__, 'Desactivar');
