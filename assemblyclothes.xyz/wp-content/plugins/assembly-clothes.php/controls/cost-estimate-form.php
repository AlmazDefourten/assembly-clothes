<?php
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
	// $wendorId=get_current_user_id();	
	$wendorId=1;
	
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

		$wpdb->insert('cost estimate',$query,$format);
		$wpdb->insert

?>