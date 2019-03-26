<?php
/*
Plugin Name: WP CambiaInsultos DAM
Plugin URI: http://link to your plugin homepage
Description: This plugin replaces words with your own choice of words.
Version: 1
Author: Andrea Cabezas
Author URI: http://link to your website
License: GPL2 etc
License URI: https://link to your plugin license

Copyright YEAR PLUGIN_AUTHOR_NAME (email : zadendrew@hotmail.com)
(Plugin Name) is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

(Plugin Name) is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with (Plugin Name). If not, see (http://link to your plugin license).
*/

function modo_mantenimiento_on() {
  if( !current_user_can( 'edit_themes' ) || !is_user_logged_in() ) {
    wp_die( 'Estamos en mantenimiento. Vuelve pronto.', 
    'Estamos en mantenimiento. Vuelve pronto.', array( 'response' => '503') );
  }
}
add_action( 'get_header', 'modo_mantenimiento_on' );


function insult_shortcodes_init()
{
function insult_shortcode($atts = [], $content = null)
{
// do something to $content
$content = "<div id='insult'><script>alert('Hi');</script></div>";

global $wpdb;

$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'insultos';

$sql = "CREATE TABLE $table_name (
id mediumint(9) NOT NULL AUTO_INCREMENT,
insulto VARCHAR(50) NOT NULL,
insremplazo VARCHAR(50) NOT NULL,
PRIMARY KEY (id)
) $charset_collate;";

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

  $wpdb->insert( 'wp5_insultos', 
  
    array( 
      'id' => 1,
      'insulto' => 'imbécil', 
      'insremplazo' => '*' 
    )
    );
     
  $wpdb->insert( 'wp5_insultos', 
  
    array(
      'id' => 2,
      'insulto' => 'gilipollas', 
      'insremplazo' => '****!!!' 
      )
  );
  
       
  $wpdb->insert( 'wp5_insultos', 
  
    array(
      'id' => 3,
      'insulto' => 'caraculo', 
      'insremplazo' => '**' 
      )
  );
$listado[]=array();
$listado[]="http://18.217.199.187/wordpress";
for($i=0; $i &lt; count($listado); $i++){
  $url=fopen($listado[$i],"r");
  if($url){
    $texto="";
    while(!feof($url)){
      $texto .=fgets($url,512);
    }
  }
  //Separamos por lineas el texto leído
  $lineas = explode("\n",$texto);
  for($y=0; $y &lt; count($lineas); $y++){
    //Procesamos cada linea
  }
}
// always return
return $content;
}
add_shortcode('insult', 'insult_shortcode');
}
add_action('init', 'insult_shortcodes_init');
?>