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

function idCardFun($attrs){
	global $post;
	return $post->ID;
}

function inputHiddenPostNameEstimate($attrs){
	return '<input type="hidden" name="action" value="admin_post_estimate_post" />';
}

function formFurnitureFun($attrs){

	ob_start();
	global $post;
	global $wpdb;

	$furns = $wpdb->get_results("SELECT DISTINCT
    p.ID,
    t.name,
    t.term_id,
    (
        SELECT
            wat.attribute_label
        FROM
            wp_woocommerce_attribute_taxonomies wat
        WHERE
            wat.attribute_name LIKE REPLACE(tt.taxonomy, 'pa_', '')
    ) AS 'type'
	FROM
    wp_posts AS p
	INNER JOIN
    wp_term_relationships AS tr
    ON p.id = tr.object_id
	INNER JOIN
    wp_term_taxonomy AS tt
    ON tt.term_taxonomy_id = tr.term_taxonomy_id
	INNER JOIN
    wp_terms AS t
    ON t.term_id = tt.term_id
	WHERE
    p.ID = $productId
    AND
    tt.taxonomy = 'pa_фурнитура'
    AND
    p.post_type = 'product'
    AND
    tt.taxonomy LIKE 'pa_%'");
	$result = "";
	foreach($furns as $furn) {
		$result .= "<td><?=$furn.name?></td>";
	}

	#$prices = $wodb->get_results("")
	$results = "";

	?>
	<form  action="<?= admin_url('admin-post.php'); ?>" method="post">
	<input type="hidden" name="action" value="estimate_post" />
	<input type="hidden" name="redirect" value="<?=get_page_uri()?>"/>
	<table style="height: 346px;" width="1600">
	<tbody>
	<tr><?php$result?></tr>

	
	</tbody>
	</table>
	<?php
	return ob_get_clean();

}

function formSupplierFun($attrs){
	ob_start();
	global $post;
	global $wpdb;

	$sups = $wpdb->get_results("SELECT * FROM $wpdb->prefix"."cost_estimate a JOIN $wpdb->prefix"."users b ON b.ID = a.wendorId");

	?>
	<form  action="<?= admin_url('admin-post.php'); ?>" method="post">
	<input type="hidden" name="action" value="estimate_post" />
	<input type="hidden" name="redirect" value="<?=get_page_uri()?>"/>
	<table style="height: 346px;" width="1600">
	<tbody>
		
	<tr>
	<td> Имя </td>
	<td> Стоимость </td>
	<td> Лекала на базовый размер</td>
	<td> Градация на 1 размер</td>
	<td> Техническое описание модели</td>
	<td> Спецификация</td>
	<td> Технологическая карта</td>
	<td> Раскладка лекал</td>
	<td> Конфекционная карта</td>
	<td> Раскрой</td>
	<td> Пошив изделия</td>
	<td> Общая сумма</td>
	</tr>

	 <?php
	foreach($sups as $sup){
		$summa = $sup->techPicPrice + $sup->patternsBaseSizePrice + $sup->gradationPrice + $sup->techDescriptionPrice + $sup->specificationPrice + $sup->techMapPrice + $sup->layoutPatternPrice + $sup->confessionCardPrice + $sup->cutPrice + $sup->tailoringPrice;
		?>
		<tr>
		<td><?=$sup->display_name?></td>
		<td><?=$sup->techPicPrice?></td>
		<td><?=$sup->patternsBaseSizePrice?></td>
		<td><?=$sup->gradationPrice?></td>
		<td><?=$sup->techDescriptionPrice?></td>
		<td><?=$sup->specificationPrice?></td>
		<td><?=$sup->techMapPrice?></td>
		<td><?=$sup->layoutPatternPrice?></td>
		<td><?=$sup->confessionCardPrice?></td>
		<td><?=$sup->cutPrice?></td>
		<td><?=$sup->tailoringPrice?></td>
		<td><?=$summa?></td>
		</tr>
		<tr>
		<td> Сроки (Сутки)</td>	
		<td><?=$sup->techPicTime?></td>
		<td><?=$sup->patternsBaseSizeTime?></td>
		<td><?=$sup->gradationTime?></td>
		<td><?=$sup->techDescriptionTime?></td>
		<td><?=$sup->specificationTime?></td>
		<td><?=$sup->techMapTime?></td>
		<td><?=$sup->layoutPatternTime?></td>
		<td><?=$sup->confessionCardTime?></td>
		<td><?=$sup->cutTime?></td>
		<td><?=$sup->tailoringTime?></td>
		</tr>
		<?php
	}
	?>
	</tbody>
	</table>
	<?php
	return ob_get_clean();
}


function formEstimateFun($attrs){
	ob_start();
	global $post;
	global $wpdb;
	$id_user=get_current_user_id();
	$post_exist=$wpdb->get_row("SELECT * FROM $wpdb->prefix"."cost_estimate WHERE wendorId=$id_user");
	if(!$post_exist){
	?>
	<form  action="<?= admin_url('admin-post.php'); ?>" method="post">
	<input type="hidden" name="action" value="estimate_post" />
	<input type="hidden" name="redirect" value="<?=get_page_uri()?>"/>
<table style="height: 346px;" width="824">
<tbody>
<tr>
<th><strong>Услуги</strong></th>
<th><strong>Стоимость</strong></th>
<th><strong>Сроки (Сутки)</strong></th>
</tr>
<tr>
<td>Технический рисунок</td>
<td><input name="techPicPrice" required="" type="number" /></td>
<td><input name="techPicTime" required="" type="number" /></td>
</tr>
<tr>
<td>Лекала на базовый размер</td>
<td><input name="patternsBaseSizePrice" required="" type="number" /></td>
<td><input name="patternsBaseSizeTime" required="" type="number" /></td>
</tr>
<tr>
<td>Градация на 1 размер</td>
<td><input name="gradationPrice" required="" type="number" /></td>
<td><input name="gradationTime" required="" type="number" /></td>
</tr>
<tr>
<td>Техническое описание модели</td>
<td><input name="techDescriptionPrice" required="" type="number" /></td>
<td><input name="techDescriptionTime" required="" type="number" /></td>
</tr>
<tr>
<td>Спецификация</td>
<td><input name="specificationPrice" required="" type="number" /></td>
<td><input name="specificationTime" required="" type="number" /></td>
</tr>
<tr>
<td>Технологическая карта</td>
<td><input name="techMapPrice" required="" type="number" /></td>
<td><input name="techMapTime" required="" type="number" /></td>
</tr>
<tr>
<td>Раскладка лекал</td>
<td><input name="layoutPatternPrice" required="" type="number" /></td>
<td><input name="layoutPatternTime" required="" type="number" /></td>
</tr>
<tr>
<td>Конфекционная карта</td>
<td><input name="confessionCardPrice" required="" type="number" /></td>
<td><input name="confessionCardTime" required="" type="number" /></td>
</tr>
<tr>
<td>Раскрой</td>
<td><input name="cutPrice" required="" type="number" /></td>
<td><input name="cutTime" required="" type="number" /></td>
</tr>
<tr>
<td>Пошив изделия</td>
<td><input name="tailoringPrice" required="" type="number" /></td>
<td><input name="tailoringTime" required="" type="number" /></td>
</tr>
</tbody>
</table>
<input type='hidden' name='cardProductId' value='<?=$post->ID?>'/>
<input type="hidden" name="getMethod" value="insert"/>
<input type="submit" value="Отправить" />

</form>
<?php
	}else{
		?>
		<form  action="<?= admin_url('admin-post.php'); ?>" method="post">
	<input type="hidden" name="action" value="estimate_post" />
	<input type="hidden" name="redirect" value="<?=get_page_uri()?>"/>
<table style="height: 346px;" width="824">
<tbody>
<tr>
<th><strong>Услуги</strong></th>
<th><strong>Стоимость</strong></th>
<th><strong>Сроки (Сутки)</strong></th>
</tr>
<tr>
<td>Технический рисунок</td>
<td><input name="techPicPrice" required="" type="number" value="<?=$post_exist->techPicPrice?>"/></td>
<td><input name="techPicTime" required="" type="number" value="<?=$post_exist->techPicTime?>"/></td>
</tr>
<tr>
<td>Лекала на базовый размер</td>
<td><input name="patternsBaseSizePrice" required="" type="number" value="<?=$post_exist->patternsBaseSizePrice?>"/></td>
<td><input name="patternsBaseSizeTime" required="" type="number" value="<?=$post_exist->patternsBaseSizeTime?>"/></td>
</tr>
<tr>
<td>Градация на 1 размер</td>
<td><input name="gradationPrice" required="" type="number" value="<?=$post_exist->gradationPrice?>"/></td>
<td><input name="gradationTime" required="" type="number" value="<?=$post_exist->gradationTime?>"/></td>
</tr>
<tr>
<td>Техническое описание модели</td>
<td><input name="techDescriptionPrice" required="" type="number" value="<?=$post_exist->techDescriptionPrice?>"/></td>
<td><input name="techDescriptionTime" required="" type="number" value="<?=$post_exist->techDescriptionTime?>"/></td>
</tr>
<tr>
<td>Спецификация</td>
<td><input name="specificationPrice" required="" type="number" value="<?=$post_exist->specificationPrice?>"/></td>
<td><input name="specificationTime" required="" type="number" value="<?=$post_exist->specificationTime?>"/></td>
</tr>
<tr>
<td>Технологическая карта</td>
<td><input name="techMapPrice" required="" type="number" value="<?=$post_exist->techMapPrice?>"/></td>
<td><input name="techMapTime" required="" type="number" value="<?=$post_exist->techMapTime?>"/></td>
</tr>
<tr>
<td>Раскладка лекал</td>
<td><input name="layoutPatternPrice" required="" type="number" value="<?=$post_exist->layoutPatternPrice?>"/></td>
<td><input name="layoutPatternTime" required="" type="number" value="<?=$post_exist->layoutPatternTime?>"/></td>
</tr>
<tr>
<td>Конфекционная карта</td>
<td><input name="confessionCardPrice" required="" type="number" value="<?=$post_exist->confessionCardPrice?>"/></td>
<td><input name="confessionCardTime" required="" type="number" value="<?=$post_exist->confessionCardTime?>"/></td>
</tr>
<tr>
<td>Раскрой</td>
<td><input name="cutPrice" required="" type="number" value="<?=$post_exist->cutPrice?>"/></td>
<td><input name="cutTime" required="" type="number" value="<?=$post_exist->cutTime?>"/></td>
</tr>
<tr>
<td>Пошив изделия</td>
<td><input name="tailoringPrice" required="" type="number" value="<?=$post_exist->tailoringPrice?>"/></td>
<td><input name="tailoringTime" required="" type="number" value="<?=$post_exist->tailoringTime?>"/></td>
</tr>
</tbody>
</table>
<input type='hidden' name='cardProductId' value='<?=$post->ID?>'/>
<input type="hidden" name="getMethod" value="update"/>
<input type="submit" value="Отправить" />

</form>
		
		
		<?php

	}
return ob_get_clean();
}

	add_shortcode('inputHiddenIdCard','inputHiddenIdCardFun');
	add_shortcode('inputHiddenEstimatePost','inputHiddenPostNameEstimate');
	add_shortcode('formEstimate','formEstimateFun');
	add_shortcode('buttonEstimate', 'buttonEstimate');
	add_shortcode('idCard','idCardFun');
	add_shortcode('formSupplier','formSupplierFun');
	add_shortcode('formFurniture','formFurnitureFun')


function buttonEstimate($attrs) {
    ob_start();
    if (current_user_can('estimate_crud')) {
        ?>
        <div class="wp-block-button"><a class="wp-block-button__link"><span class="popup-trigger popmake-42 " data-popup-id="42" data-do-default="0">Смета затрат</span></a></div>
        <?php
    }
    return ob_get_clean();
}
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
		if(trim(iconv_substr(strip_tags($_POST['getMethod']), 0, 100))=="insert"){
			$wpdb->insert($wpdb->prefix.'cost_estimate',$query,$format);
		}else{
			$wpdb->update($wpdb->prefix.'cost_estimate',$query,['wendorId'=>$wendorId]);
		}
		

		$redirect = home_url();
		if (isset($_POST['redirect'])) {
			$redirect = $_POST['redirect'];
			$redirect = wp_validate_redirect($redirect, home_url());
		}
		wp_redirect($redirect);
		die();
	}

	add_action('admin_post_nopriv_estimate_post', 'add_estimate');
	add_action('admin_post_estimate_post', 'add_estimate');
?>
