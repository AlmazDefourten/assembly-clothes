<?php
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Add styles inline.
		wp_add_inline_style( 'twentytwentytwo-style', twentytwentytwo_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

if ( ! function_exists( 'twentytwentytwo_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', twentytwentytwo_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'twentytwentytwo_editor_styles' );


if ( ! function_exists( 'twentytwentytwo_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions twentytwentytwo_styles() and twentytwentytwo_editor_styles() above.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return string
	 */
	function twentytwentytwo_get_font_face_styles() {

		return "
		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) . "') format('woff2');
		}

		@font-face{
			font-family: 'Source Serif Pro';
			font-weight: 200 900;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Italic.ttf.woff2' ) . "') format('woff2');
		}
		";

	}

endif;

if ( ! function_exists( 'twentytwentytwo_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (it is used
	 * on every heading, for example). The other font is only needed if there is any applicable content in italic style,
	 * and therefore preloading it would in most cases regress performance when that font would otherwise not be loaded
	 * at all.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/SourceSerif4Variable-Roman.ttf.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'twentytwentytwo_preload_webfonts' );
add_action( 'wp_enqueue_scripts', 'truemisha_jquery' );
 
function truemisha_jquery() {
	wp_enqueue_script( 'jquery' );
}

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

add_action('wp_ajax_getListOfVendors', 'listOfVendors');
add_action( 'wp_ajax_nopriv_getListOfVendors', 'listOfVendors' ); 
class Person{
	public $sum=0;
	public $time=0;
	public $cardId;
	public $wendorId;

	public function setSum( $sum){
		$this->sum=$sum;
	}

	public function setTime( $time){
		$this->time=$time;
	}

	public function setCardId( $cardId){
		$this->cardId=$cardId;
	}

	public function setWendorId( $wendorId){
		$this->wendorId=$wendorId;
	}
	
}

function sortObjectSetBy($objectSetForSort, $sortBy){

	usort($objectSetForSort, function($object1,$object2) use ($sortBy){
						  if($object1->$sortBy == $object2->$sortBy) return 0;
						  return ($object1->$sortBy > $object2->$sortBy) ? -1 : 1;});
 
	return $objectSetForSort;
 }

 function remove_utf8_bom($text)
 {
	 $bom = pack('H*','EFBBBF');
	 $text = preg_replace("/^$bom/", '', $text);
	 return $text;
 }

function listOfVendors() {
	$_REQUEST   = array_map('stripslashes_deep', $_REQUEST);
    $techPic = json_decode($_REQUEST['techPic']);
    $patternsBaseSize = json_decode($_REQUEST['patternsBaseSize']);
    $gradation = json_decode($_REQUEST['gradation']);
    $techDescription = json_decode($_REQUEST['techDescription']);
    $specification = json_decode($_REQUEST['specification']);
    $techMap = json_decode($_REQUEST['techMap']);
    $layoutPattern = json_decode($_REQUEST['layoutPattern']);
    $confessionCard = json_decode($_REQUEST['confessionCard']);
    $cut = json_decode($_REQUEST['cut']);
    $tailoring = json_decode($_REQUEST['tailoring']);
	$quantity = json_decode($_REQUEST['dopPrice']);
    $dopPrice=json_decode($_REQUEST['dopPrice'], true);
	$req = $_REQUEST['dopPrice'];
	$req_decode = json_decode($req);
	var_dump($req_decode);
	var_dump($quantity);
	var_dump($test);
	echo $test;
	var_dump($dopPrice);
	echo $dopPrice['material'][0];
	 $furniturs=$dopPrice['furniturs'];
	 $material=$dopPrice['material']; 
	 var_dump($dopPrice);
    $response = "<p>";
    global $wpdb;
    global $post;
    $card_id = json_decode($_REQUEST['cardId']);
    $id_user=get_current_user_id();
    $sql = "SELECT *";
   //  if ($techPic == 1) {
   //     $sql .= "techPicPrice, techPicTime, ";
   //  }
   //  if ($patternsBaseSize == 1) {
   //      $sql .= " patternsBaseSizePrice, patternsBaseSizeTime,";
   //  }
   //  if ($gradation == 1) {
   //      $sql .= " gradationPrice, gradationTime,";
   //  }
   //  if ($techDescription == 1) {
   //      $sql .= " techDescriptionPrice, techDescriptionTime,";
   //  }
   //  if ($specification == 1) {
   //      $sql .= " specificationPrice, specificationTime,";
   //  }
   //  if ($techMap == 1) {
   //      $sql .= " techMapPrice, techMapTime,";
   //  }
   //  if ($layoutPattern == 1) {
   //      $sql .= " layoutPatternPrice, layoutPatternTime,";
   //  }
   //  if ($confessionCard == 1) {
   //      $sql .= " confessionCardPrice, confessionCardTime,";
   //  }
   //  if ($cut == 1) {
   //      $sql .= " cutPrice, cutTime,";
   //  }
   //  if ($tailoring == 1) {
   //      $sql .= " tailoringPrice, tailoringTime,";
   //  }
    $sql .= " FROM wp_cost_estimate WHERE cardProductId=$card_id";
    
    $results = $wpdb->get_results($sql);
	 $persons=[];
	 foreach($results as $result){
		 $sum=0;
		 $time=0;
		if ($techPic == 1) {
			$sum+=$result->techPicPrice;
			$time+=$result->techPicTime;
		}
		if ($patternsBaseSize == 1) {
			$sum+=$result->patternsBaseSizePrice;
			$time+=$result->patternsBaseSizeTime;
		}
		if ($gradation == 1) {
			$sum+=$result->gradationPrice;
			$time+=$result->gradationTime;
		}
		if ($techDescription == 1) {
			$sum+=$result->techDescriptionPrice;
			$time+=$result->techDescriptionTime;
		}
		if ($specification == 1) {
			$sum+=$result->specificationPrice;
			$time+=$result->specificationTime;
		}
		if ($techMap == 1) {
			var_dump($dopPrice);
			var_dump($material);
			$sum+=$result->techMapPrice;
			$time+=$result->techMapTime;
			if($material!="none"){
				$materialRow=$wpdb->get_row("SELECT DISTINCT p.ID, t.name, t.term_id, ( SELECT wat.attribute_label FROM wp_woocommerce_attribute_taxonomies wat WHERE wat.attribute_name LIKE REPLACE(tt.taxonomy, 'pa_', '') ) AS 'type' FROM wp_posts AS p INNER JOIN wp_term_relationships AS tr ON p.id = tr.object_id INNER JOIN wp_term_taxonomy AS tt ON tt.term_taxonomy_id = tr.term_taxonomy_id INNER JOIN wp_terms AS t ON t.term_id = tt.term_id WHERE p.id ='$card_id' AND tt.taxonomy in ('pa_фурнитура','pa_материал') AND p.post_type = 'product' AND tt.taxonomy LIKE 'pa_%' and NAME!='Нет' AND NAME='$material' ORDER BY type");
				$materialPrice=$wpdb->get_row("SELECT * FROM `wp_furns_price` WHERE term_id='$materialRow->temr_id'");
				$sum+=$materialPrice->price;
			}
			foreach($furniturs as $furnitur){
				$furniturRow=$wpdb->get_row("SELECT DISTINCT p.ID, t.name, t.term_id, ( SELECT wat.attribute_label FROM wp_woocommerce_attribute_taxonomies wat WHERE wat.attribute_name LIKE REPLACE(tt.taxonomy, 'pa_', '') ) AS 'type' FROM wp_posts AS p INNER JOIN wp_term_relationships AS tr ON p.id = tr.object_id INNER JOIN wp_term_taxonomy AS tt ON tt.term_taxonomy_id = tr.term_taxonomy_id INNER JOIN wp_terms AS t ON t.term_id = tt.term_id WHERE p.id ='$card_id' AND tt.taxonomy in ('pa_фурнитура','pa_материал') AND p.post_type = 'product' AND tt.taxonomy LIKE 'pa_%' and NAME!='Нет' AND NAME='$furnitur->name' ORDER BY type");
				$furniturPrice=$wpdb->get_row("SELECT * FROM `wp_furns_price` WHERE term_id='$furniturRow->temr_id'");
				var_dump($furniturPrice);
				$sum+=$furniturPrice->price*$furnitur->quan;
			}

		}
		if ($layoutPattern == 1) {
			$sum+=$result->layoutPatternPrice;
			$time+=$result->layoutPatternTime;
		}
		if ($confessionCard == 1) {
			$result_conf = "123";
			$sum+=$result->confessionCardPrice;
			$time+=$result->confessionCardTime;
			foreach ($dopPrice as $key => $value) {
				echo $key;
				echo $value;
			}
			$furns = $dopPrice['furniturs'];
			foreach ($furns as $furn) {
				$furn_name = $furn->name;
				echo "<p>$furn_name</p>";
				$price = $wpdb->get_results("SELECT price FROM `wp_furns_price` WHERE term_id=(SELECT DISTINCT t.term_id FROM wp_posts AS p INNER JOIN wp_term_relationships AS tr ON p.id = tr.object_id INNER JOIN wp_term_taxonomy AS tt ON tt.term_taxonomy_id = tr.term_taxonomy_id INNER JOIN wp_terms AS t ON t.term_id = tt.term_id WHERE p.ID = $card_id AND tt.taxonomy = 'pa_фурнитура' AND p.post_type = 'product' AND tt.taxonomy LIKE 'pa_%' AND t.name = $furn_name)") * $furn->quan;
				$result_conf .= "<p> $furn_name Цена: $price </p>";
			}
			echo $result_conf;
		}
		if ($cut == 1) {
			$sum+=$result->cutPrice;
			$time+=$result->cutTime;
		}
		if ($tailoring == 1) {
			$sum+=$result->tailoringPrice;
			$time+=$result->tailoringTime;
		}
		$person=new Person();
		$person->setCardId($result->cardId);
		$person->setWendorId($result->wendorId);
		$person->setSum($sum);
		$person->setTime($time);
		$persons[]=$person;
	 }


    $personsPriceSort=sortObjectSetBy($persons,'sum');
	 $personsTimeSort=sortObjectSetBy($persons,'time');
	 $personMax=$personsPriceSort[0];
	 $personMin=$personsPriceSort[count($personsPriceSort)-1];
	 $personFast=$personsTimeSort[count($personsTimeSort)-1];
	 $personAvg=$personsPriceSort[intdiv(count($personsPriceSort),2)];
	 
	 

   //  $avgsum_results = $wpdb->get_results("SELECT AVG(techPicPrice) as techPicPriceAvg,
   //  AVG(techPicTime) as techPicTimeAvg,
   //  AVG(patternsBaseSizePrice) as patternsBaseSizePriceAvg,
   //  AVG(patternsBaseSizeTime) as patternsBaseSizeTimeAvg,
   //  AVG(gradationPrice) as gradationPriceAvg,
   //  AVG(gradationTime) as gradationTimeAvg,
   //  AVG(techDescriptionPrice) as techDescriptionPriceAvg,
   //  AVG(techDescriptionTime) as techDescriptionTimeAvg,
   //  AVG(specificationPrice) as specificationPriceAvg,
   //  AVG(specificationTime) as specificationTimeAvg,
   //  AVG(techMapPrice) as techMapPriceAvg,
   //  AVG(techMapTime) as techMapTimeAvg,
   //  AVG(layoutPatternPrice) as layoutPatternPriceAvg,
   //  AVG(layoutPatternTime) as layoutPatternTimeAvg,
   //  AVG(confessionCardPrice) as confessionCardPriceAvg,
   //  AVG(confessionCardTime) as confessionCardTimeAvg,
   //  AVG(cutPrice) as cutPriceAvg,
   //  AVG(cutTime) as cutTimeAvg,
   //  AVG(tailoringPrice) as tailoringPriceAvg,
   //  AVG(tailoringTime) as tailoringTimeAvg,
   //  min(techPicPrice) as techPicPricemin,
   //  min(techPicTime) as techPicTimemin,
   //  min(patternsBaseSizePrice) as patternsBaseSizePricemin,
   //  min(patternsBaseSizeTime) as patternsBaseSizeTimemin,
   //  min(gradationPrice) as gradationPricemin,
   //  min(gradationTime) as gradationTimemin,
   //  min(techDescriptionPrice) as techDescriptionPricemin,
   //  min(techDescriptionTime) as techDescriptionTimemin,
   //  min(specificationPrice) as specificationPricemin,
   //  min(specificationTime) as specificationTimemin,
   //  min(techMapPrice) as techMapPricemin,
   //  min(techMapTime) as techMapTimemin,
   //  min(layoutPatternPrice) as layoutPatternPricemin,
   //  min(layoutPatternTime) as layoutPatternTimemin,
   //  min(confessionCardPrice) as confessionCardPricemin,
   //  min(confessionCardTime) as confessionCardTimemin,
   //  min(cutPrice) as cutPricemin,
   //  min(cutTime) as cutTimemin,
   //  min(tailoringPrice) as tailoringPricemin,
   //  min(tailoringTime) as tailoringTimemin,
   //  max(techPicPrice) as techPicPricemax,
   //  max(techPicTime) as techPicTimemax,
   //  max(patternsBaseSizePrice) as patternsBaseSizePricemax,
   //  max(patternsBaseSizeTime) as patternsBaseSizeTimemax,
   //  max(gradationPrice) as gradationPricemax,
   //  max(gradationTime) as gradationTimemax,
   //  max(techDescriptionPrice) as techDescriptionPricemax,
   //  max(techDescriptionTime) as techDescriptionTimemax,
   //  max(specificationPrice) as specificationPricemax,
   //  max(specificationTime) as specificationTimemax,
   //  max(techMapPrice) as techMapPricemax,
   //  max(techMapTime) as techMapTimemax,
   //  max(layoutPatternPrice) as layoutPatternPricemax,
   //  max(layoutPatternTime) as layoutPatternTimemax,
   //  max(confessionCardPrice) as confessionCardPricemax,
   //  max(confessionCardTime) as confessionCardTimemax,
   //  max(cutPrice) as cutPricemax,
   //  max(cutTime) as cutTimemax,
   //  max(tailoringPrice) as tailoringPricemax,
   //  max(tailoringTime) as tailoringTimemax
   //  FROM wp_cost_estimate WHERE cardProductId=$card_id
   //      ");
   //  $avgtime = 0;
   //  $avgsum = 0;
   //  $minsum = 0;
   //  $mintime = 0;
   //  $maxsum = 0;
   //  $maxtime = 0;
   //  foreach($avgsum_results as $result) {
   //      if ($techPic == 1) {
   //         $avgsum += $result->techPicPriceAvg; $avgtime += $result->techPicTimeAvg;
	// 	   $minsum += $result->techPicPricemin; $mintime += $result->techPicTimemin;
	// 	   $maxsum += $result->techPicPricemax; $maxtime += $result->techPicTimemax;
   //      }
   //      if ($patternsBaseSize == 1) {
   //          $avgsum += $result->patternsBaseSizePriceAvg; $avgtime += $result->patternsBaseSizeTimeAvg;
	// 		$minsum += $result->patternsBaseSizePricemin; $mintime += $result->patternsBaseSizeTimemin;
	// 		$maxsum += $result->techPicPricemax; $maxtime += $result->techPicTimemax;
   //      }
   //      if ($gradation == 1) {
   //          $avgsum += $result->gradationPriceAvg; $avgtime += $result->gradationTimeAvg;
	// 		$minsum += $result->gradationPricemin; $mintime += $result->gradationTimemin;
	// 		$maxsum += $result->gradationPricemax; $maxtime += $result->gradationTimemax;
   //      }
   //      if ($techDescription == 1) {
   //          $avgsum += $result->techDescriptionPriceAvg; $avgtime += $result->techDescriptionTimeAvg;
	// 		$minsum += $result->techDescriptionPricemin; $mintime += $result->techDescriptionTimemin;
	// 		$maxsum += $result->techDescriptionPricemax; $maxtime += $result->techDescriptionTimemax;
   //      }
   //      if ($specification == 1) {
   //          $avgsum += $result->specificationPriceAvg; $avgtime += $result->specificationTimeAvg;
	// 		$minsum += $result->specificationPricemin; $mintime += $result->specificationTimemin;
	// 		$maxsum += $result->specificationPricemax; $maxtime += $result->specificationTimemax;
   //      }
   //      if ($techMap == 1) {
   //          $avgsum += $result->techMapPriceAvg; $avgtime += $result->techMapTimeAvg;
	// 		$minsum += $result->techMapPricemin; $mintime += $result->techMapTimemin;
	// 		$maxsum += $result->techMapPricemax; $maxtime += $result->techMapTimemax;
   //      }
   //      if ($layoutPattern == 1) {
   //          $avgsum += $result->layoutPatternPriceAvg; $avgtime += $result->layoutPatternTimeAvg;
	// 		$minsum += $result->layoutPatternPricemin; $mintime += $result->layoutPatternTimemin;
	// 		$maxsum += $result->layoutPatternPricemax; $maxtime += $result->layoutPatternTimemax;
   //      }
   //      if ($confessionCard == 1) {
   //          $avgsum += $result->confessionCardPriceAvg; $avgtime += $result->confessionCardTimeAvg;
	// 		$minsum += $result->confessionCardPricemin; $mintime += $result->confessionCardTimemin;
	// 		$maxsum += $result->confessionCardPricemax; $maxtime += $result->confessionCardTimemax;
   //      }
   //      if ($cut == 1) {
   //          $avgsum += $result->cutPriceAvg; $avgtime += $result->cutTimeAvg;
	// 		$minsum += $result->cutPricemin; $mintime += $result->cutTimemin;
	// 		$maxsum += $result->cutPricemax; $maxtime += $result->cutTimemax;
   //      }
   //      if ($tailoring == 1) {
   //          $avgsum += $result->tailoringPriceAvg; $avgtime += $result->tailoringTimeAvg;
	// 		$minsum += $result->tailoringPricemin; $mintime += $result->tailoringTimemin;
	// 		$maxsum += $result->tailoringPricemax; $maxtime += $result->tailoringTimemax;
   //      }
   //  }

	// $personMax=$personsPriceSort[0];
	// $personMin=$personsPriceSort[count($personsPriceSort)-1];
	// $personFast=$personsTimeSort[count($personsTimeSort)-1];
	// $personAvg=$personsPriceSort[intdiv(count($personsPriceSort),2)];

	// $response="$avgsum, $avgtime, $minsum, $mintime, $maxsum, $maxtime";
    $response .= "
	 <table style='text-align: center;    border: 1px solid;'>
  <tr>
    <th>Тип поставщика</th>
    <th>Стоимость услуги</th>
    <th>Сроки</th>
	 <th>Поставщик</th>
  </tr>
  <tr>
    <td>Самый дешевый</td>
    <td>$personMin->sum</td>
    <td>$personMin->time</td>
	 <td><a href='#'>".get_userdata($personMin->wendorId)->user_login."</a></td>
  </tr>
  <tr>
    <td>Самый дорогой</td>
	 <td>$personMax->sum</td>
    <td>$personMax->time</td>
	 <td><a href='#'>".get_userdata($personMax->wendorId)->user_login."</a></td>
  </tr>
  <tr>
    <td>Самый быстрый</td>
    <td>$personFast->sum</td>
    <td>$personFast->time</td>
	 <td><a href='#'>".get_userdata($personFast->wendorId)->user_login."</a></td>
  </tr>
  <tr>
    <td>Средний</td>
    <td>$personAvg->sum</td>
    <td>$personAvg->time</td>
	 <td><a href='#'>".get_userdata($personAvg->wendorId)->user_login."</a></td>
  </tr>
  
</table>

	 ";

    echo $response;

    wp_die();
}
//ddddd 
