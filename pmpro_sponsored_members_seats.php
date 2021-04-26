/*
Define the global array below for your main accounts and sponsored levels.
Array keys should be the main account level.
*/
global $pmprosm_sponsored_account_levels;
$pmprosm_sponsored_account_levels = array(
	1 => array(
		'main_level_id' => 1, //redundant but useful
		'sponsored_level_id' => array(1), //array or single id
		'seat_cost' => 0,
		'max_seats' => 10,
		'sponsored_accounts_at_checkout' => true,
		'apply_seat_cost_to_initial_payment' => true,
		'apply_seat_cost_to_billing_amount' => true
	),
	2 => array(
		'main_level_id' => 1, //redundant but useful
		'sponsored_level_id' => array(2), //array or single id
		'seat_cost' => 100,
		'max_seats' => 10,
		'sponsored_accounts_at_checkout' => true,
		'apply_seat_cost_to_initial_payment' => true,
		'apply_seat_cost_to_billing_amount' => true
	),
	3 => array(
		'main_level_id' => 1, //redundant but useful
		'sponsored_level_id' => array(3), //array or single id
		'seat_cost' => 100,
		'max_seats' => 10,
		'sponsored_accounts_at_checkout' => true,
		'apply_seat_cost_to_initial_payment' => true,
		'apply_seat_cost_to_billing_amount' => true
	),
);
