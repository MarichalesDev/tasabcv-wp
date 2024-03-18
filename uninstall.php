<?php

if (!defined('WP_UNINSTALL_PLUGIN')){
   die();
}

function Borrar(){

}

register_uninstall_hook(__FILE__,'Borrar');