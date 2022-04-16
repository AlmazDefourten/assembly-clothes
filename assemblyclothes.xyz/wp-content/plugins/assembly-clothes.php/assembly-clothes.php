<?php
/**
 * Plugin Name: assembly-clothes
 * Description: топ плагин
 * Plugin URI:  /
 * Author URI:  /
 * Author:      Имя автора
 * Version:     Версия плагина, например 1.0 
 */
	function testShortCode($attrs){
		return "hellow world!";
	}

	add_shortcode('test','testShortCode');
	

?>