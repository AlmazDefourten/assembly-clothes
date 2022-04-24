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
	return "<input type='hidden' name='cardProductId' value='".$post->ID."'/>";
}

function inputHiddenPostNameEstimate($attrs){
	return '<input type="hidden" name="action" value="admin_post_estimate_post" />';
}

function formEstimateFun($attrs){
	ob_start();
	global $post;
	?>
	<form  action="<?= admin_url('admin-post.php'); ?>" method="post">
	<input type="hidden" name="action" value="estimate_post" />
<table style="height: 346px;" width="824">
<tbody>
<tr>
<th><strong>Услуги</strong></th>
<th><strong>Стоимость</strong></th>
<th><strong>Сроки</strong></th>
</tr>
<tr>
<td>Технический рисунок</td>
<td><input name="techPicPrice" required="" type="text" /></td>
<td><input name="techPicTime" required="" type="text" /></td>
</tr>
<tr>
<td>Лекала на базовый размер</td>
<td><input name="patternsBaseSizePrice" required="" type="text" /></td>
<td><input name="patternsBaseSizeTime" required="" type="text" /></td>
</tr>
<tr>
<td>Градация на 1 размер</td>
<td><input name="gradationPrice" required="" type="text" /></td>
<td><input name="gradationTime" required="" type="text" /></td>
</tr>
<tr>
<td>Техническое описание модели</td>
<td><input name="techDescriptionPrice" required="" type="text" /></td>
<td><input name="techDescriptionTime" required="" type="text" /></td>
</tr>
<tr>
<td>Спецификация</td>
<td><input name="specificationPrice" required="" type="text" /></td>
<td><input name="specificationTime" required="" type="text" /></td>
</tr>
<tr>
<td>Технологическая карта</td>
<td><input name="techMapPrice" required="" type="text" /></td>
<td><input name="techMapTime" required="" type="text" /></td>
</tr>
<tr>
<td>Раскладка лекал</td>
<td><input name="layoutPatternPrice" required="" type="text" /></td>
<td><input name="layoutPatternTime" required="" type="text" /></td>
</tr>
<tr>
<td>Конфекционная карта</td>
<td><input name="confessionCardPrice" required="" type="text" /></td>
<td><input name="confessionCardTime" required="" type="text" /></td>
</tr>
<tr>
<td>Раскрой</td>
<td><input name="cutPrice" required="" type="text" /></td>
<td><input name="cutTime" required="" type="text" /></td>
</tr>
<tr>
<td>Пошив изделия</td>
<td><input name="tailoringPrice" required="" type="text" /></td>
<td><input name="tailoringTime" required="" type="text" /></td>
</tr>
</tbody>
</table>
<input type='hidden' name='cardProductId' value='<?=$post->ID?>'/>
<input type="submit" value="Отправить" />

</form>
<?php
return ob_get_clean();
}

	add_shortcode('inputHiddenIdCard','inputHiddenIdCardFun');
	add_shortcode('inputHiddenEstimatePost','inputHiddenPostNameEstimate');
	add_shortcode('formEstimate','formEstimateFun');
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





function add_estimate(){
	$techPicPrice=trim(iconv_substr(strip_tags($_POST['techPicPrice']), 0, 100));
	$techPicTime=trim(iconv_substr(strip_tags($_POST['techPicTime']), 0, 100));
	$patternsBaseSizePrice=trim(iconv_substr(strip_tags($_POST['patternsBaseSizePrice']), 0, 100));
	$patternsBaseSizeTime=trim(iconv_substr(strip_tags($_POST['patternsBaseSizeTime']), 0, 100));
	$gradationPrice=trim(iconv_substr(strip_tags($_POST['gradationPrice']), 0, 100));
	$gradationTime=trim(iconv_substr(strip_tags($_POST['gradationTime']), 0, 100));
	$techDescriptionPrice=trim(iconv_substr(strip_tags($_POST['techDescriptionPrice']), 0, 100));
	$techDescriptionTime=trim(iconv_substr(strip_tags($_POST['techDescriptionTime']), 0, 100));
	$specificationPrice=trim(iconv_substr(strip_tags($_POST['specificationPrice']), 0, 100));
	$specificationTime=trim(iconv_substr(strip_tags($_POST['specificationTime']), 0, 100));
	$techMapPrice=trim(iconv_substr(strip_tags($_POST['techMapPrice']), 0, 100));
	$techMapTime=trim(iconv_substr(strip_tags($_POST['techMapTime']), 0, 100));
	$layoutPatternPrice=trim(iconv_substr(strip_tags($_POST['layoutPatternPrice']), 0, 100));
	$layoutPatternTime=trim(iconv_substr(strip_tags($_POST['layoutPatternTime']), 0, 100));
	$confessionCardPrice=trim(iconv_substr(strip_tags($_POST['confessionCardPrice']), 0, 100));
	$confessionCardTime=trim(iconv_substr(strip_tags($_POST['confessionCardTime']), 0, 100));
	$cutPrice=trim(iconv_substr(strip_tags($_POST['cutPrice']), 0, 100));
	$cutTime=trim(iconv_substr(strip_tags($_POST['cutTime']), 0, 100));
	$tailoringPrice=trim(iconv_substr(strip_tags($_POST['tailoringPrice']), 0, 100));
	$tailoringTime=trim(iconv_substr(strip_tags($_POST['tailoringTime']), 0, 100));
	$cardProductId=trim(iconv_substr(strip_tags($_POST['cardProductId']), 0, 100));
	$wendorId=get_current_user_id();	
	// $wendorId=1;
	
	global $wpdb;
	$query=[
		'techPicPrice'=>$techPicPrice,
		'techPicTime'=>$techPicTime,
		'patternsBaseSizePrice'=>$patternsBaseSizePrice,
		'patternsBaseSizeTime'=>$patternsBaseSizeTime,
		'gradationPrice'=>$gradationPrice,
		'gradationTime'=>$gradationTime,
		'techDescriptionPrice'=>$techDescriptionPrice,
		'techDescriptionTime'=>$techDescriptionTime,
		'specificationPrice'=>$specificationPrice,
		'specificationTime'=>$specificationTime,
		'techMapPrice'=>$techMapPrice,
		'techMapTime'=>$techMapTime,
		'layoutPatternPrice'=>$layoutPatternPrice,
		'layoutPatternTime'=>$layoutPatternTime,
		'confessionCardPrice'=>$confessionCardPrice,
		'confessionCardTime'=>$confessionCardTime,
		'cutPrice'=>$cutPrice,
		'cutTime'=>$cutTime,
		'tailoringPrice'=>$tailoringPrice,
		'tailoringTime'=>$tailoringTime,
		'cardProductId'=>$cardProductId,
		'wendorId'=>$wendorId];
		$format=[
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%s',
			'%d',
			'%d'


		];
		$wpdb->insert($wpdb->prefix.'cost_estimate',$query,$format);

		$redirect = home_url();
		if (isset($_POST['redirect'])) {
			$redirect = $_POST['redirect'];
			$redirect = wp_validate_redirect($redirect, home_url());
		}
		// wp_redirect($redirect);
		// die();
	}

	add_action('admin_post_nopriv_estimate_post', 'add_estimate');
	add_action('admin_post_estimate_post', 'add_estimate');
?>
