<?php
function getListOfVendors() {
	?>
	<input name="techPic" type="checkbox" />Технический рисунок
	<input name="techPic" type="checkbox" />Технический рисунок
	<?php
	wp_die();
}
function listOfVendors($attrs) {
	   global $wpdb;
	   $id_user=get_current_user_id();
	   $card_id = get_the_ID();
	   $vendors = $wpdp->get_results("SELECT ID, display_name FROM wp_users WHERE ID IN (SELECT wendorId FROM wp_cost_estimate WHERE $card_id=cardProductId)");
	   foreach ($vendors as $vendor) {
			echo 'alert("$vendor->display_name")';
	   }
}
add_action('getListOfVendors', 'getListOfVendors' );

?>