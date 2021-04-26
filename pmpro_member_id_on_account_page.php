<?php

/**
 * This shows the WordPress User ID as a Member ID on the Paid Memberships Pro Account Page.
 * Add the code below to your PMPro Customizations Plugin - https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/
 * www.paidmembershipspro.com
 */

function pmpro_add_user_id_account() {
	global $current_user;

	echo '<li><strong>Member ID: </strong>' . $current_user->ID . '</li>';
}
add_action( 'pmpro_account_bullets_top', 'pmpro_add_user_id_account' );
