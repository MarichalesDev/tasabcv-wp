<?php
/*
Plugin Name: price-plugin
Plugin URI: http://
Description: plugin para precios woocomerce
Version: 1.0
Author: Julio Marichales
Author URI: http://URI_del_Autor_del_Plugin
License: Marichalesdev
*/

function Activar(){
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) 
        and current_user_can( 'activate_plugins' ) ) {
           wp_die('Este plugin necesita que esté activado el plugin 
                   "Woocommerce" por lo que no se puede activar.. <br>
                    <a href="' . admin_url( 'plugins.php' ) . '">&laquo; 
                    Volver a la página de Plugins</a>');
    }
}

function Desactivar(){
    flush_rewrite_rules();
}

register_activation_hook( __FILE__ ,'Activar' );
register_deactivation_hook(__FILE__,'Desactivar');


add_action('admin_menu', 'Administrador');

function Administrador(){
    add_menu_page(
     'Tasa BCV',
     'Tasa BCV',
     'manage_options',
     'sp_menu',
     'Menu',
     '0',
     '1'
    );
    add_submenu_page(
    'woocommerce', 
    'Tasa BCV',
    'Tasa BCV',
    'edit_posts',
    'sp_menu',
    'Menu',
        );

}


function Menu(){
    include 'tasa.php';
}
