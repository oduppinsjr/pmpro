<?php

/*
 * Adds a "Renewal" column to the Orders list and order CSV export
 * to show if the order is a membership renewal.
 */
function my_pmpro_is_order_renewal( $order ) {
	global $wpdb;

	//check for earlier orders with the same user_id and membership_id
	$sqlQuery = "SELECT id FROM $wpdb->pmpro_membership_orders WHERE 
			user_id = '" . esc_sql($order->user_id) . "' AND 
			membership_id = '" . esc_sql($order->membership_id) . "' AND 
			id <> '" . esc_sql($order->id) . "' AND
			timestamp < '" . date("Y-m-d H:i:s", $order->timestamp) . "' 
			LIMIT 1";

	$earlier_order = $wpdb->get_var($sqlQuery);				
	if(empty($earlier_order))
		return false;

	//must be recurring
	return true;
}

/*
 *	add recurring column to orders table
 */
//table header
function my_pmpro_orders_extra_cols_renewal_header()
{
?>
<th>Renewal?</th>
<?php
}
add_action('pmpro_orders_extra_cols_header', 'my_pmpro_orders_extra_cols_renewal_header');

//table body
function my_pmpro_orders_extra_cols_renewal_body($order)
{
	?>
	<td>
	<?php
	if( my_pmpro_is_order_renewal( $order ) )
		echo "Yes";
	else
		echo "No";
	?>
	</td>
	<?php
}
add_action('pmpro_orders_extra_cols_body', 'my_pmpro_orders_extra_cols_renewal_body');

/*
	add recurring column to orders export
*/
function my_pmpro_orders_csv_extra_columns_renewal($columns)
{
	$columns['renewal'] = 'my_pmpro_orders_csv_recurring_column_renewal';
	return $columns;
}
add_filter('pmpro_orders_csv_extra_columns', 'my_pmpro_orders_csv_extra_columns_renewal');

function my_pmpro_orders_csv_recurring_column_renewal($order)
{
	if(my_pmpro_is_order_renewal($order))
		return "Yes";
	else
		return "No";
}
