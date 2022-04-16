<?php
/**
 * Plugin Name: assembly-clothes
 * Description: топ плагин
 * Plugin URI:  /`
 * Author URI:  /
 * Author:      Имя автора
 * Version:     Версия плагина, например 1.0 
 */
function inputHiddenIdCardFun($attrs){
	global $post;
	echo "<input type='hidden' value='".$post->ID."'/>";
}

	add_shortcode('inputHiddenIdCard','inputHiddenIdCardFun');
	global $jal_db_version;
$jal_db_version = "1.0";

function jal_install () {
   global $wpdb;
   global $jal_db_version;

   $table_name = $wpdb->prefix . "liveshoutbox";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  id mediumint(9) NOT NULL AUTO_INCREMENT,
	  time bigint(11) DEFAULT '0' NOT NULL,
	  name tinytext NOT NULL,
	  text text NOT NULL,
	  url VARCHAR(55) NOT NULL,
	  UNIQUE KEY id (id)
	);";

      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);

      $rows_affected = $wpdb->insert( $table_name, array( 'time' => current_time('mysql'), 'name' => $welcome_name, 'text' => $welcome_text ) );
 
      add_option("jal_db_version", $jal_db_version);

   }
}
register_activation_hook(__FILE__,'jal_install');
?>
