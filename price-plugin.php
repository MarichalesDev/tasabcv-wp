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

function activar(){
    if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) 
        and current_user_can( 'activate_plugins' ) ) {
           wp_die('Este plugin necesita que esté activado el plugin 
                   "Woocommerce" por lo que no se puede activar.. <br>
                    <a href="' . admin_url( 'plugins.php' ) . '">&laquo; 
                    Volver a la página de Plugins</a>');
    }
}

function desactivar(){
    flush_rewrite_rules();
}

register_activation_hook( __FILE__ ,'activar' );
register_deactivation_hook(__FILE__,'desactivar');


add_action('admin_menu', 'administrador');

function administrador(){
    add_menu_page(
     'Tasa BCV',
     'Tasa BCV',
     'manage_options',
     'sp_menu',
     'menu',
     '0',
     '1'
    );
    add_submenu_page(
    'woocommerce', 
    'Tasa BCV',
    'Tasa BCV',
    'edit_posts',
    'sp_menu',
    'menu'
        );

}

function tasabcv( $tasa ) {
    $tasa.= '360VES';
    return $tasa;
  }
  add_filter( 'woocommerce_get_price_html', 'tasabcv' );


function menu(){
  include 'tasa.php';
}
