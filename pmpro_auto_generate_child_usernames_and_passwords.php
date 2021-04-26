<?php

/**
 * This will generate information for username, password and password 2. This is great for free levels.
 * Adjust the $generate_data_level ID's to allow data generation for specific levels.
 * Use CSS to hide these fields on the checkout page from the frontend.
 * Add this code to your PMPro Customizations Plugin - https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/
 */

// Function to make fields optional for free levels.
function my_generate_fields_for_users() {

	if ( !isset( $_REQUEST['level'] ) ) {
		return;
	}

	$generate_data_levels = array( '1', '2', '5' ); // Level ID's to generate data for.

	if ( ! in_array( $_REQUEST['level'], $generate_data_levels ) ) {
		return;
	}

	// Generate Email Address as username.
	if(!empty($_REQUEST['bemail'])) {
    		$_REQUEST['username'] = $_REQUEST['bemail'];
    	}
    
  	if(!empty($_POST['bemail'])) {
    		$_POST['username'] = $_POST['bemail'];
	}
    
  	if(!empty($_GET['bemail'])) {
   		 $_GET['username'] = $_GET['bemail'];
	}
	
	// Generate passwords.
	if( ! empty( $_REQUEST['username'] ) && empty( $_REQUEST['password'] ) ) {
		$_REQUEST['password'] = wp_generate_password( 12, true, false );	// Generate Password.
		$_REQUEST['password2'] = $_REQUEST['password'];
	}
}
add_action( 'init', 'my_generate_fields_for_users' );
