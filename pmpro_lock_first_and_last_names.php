/**
 * This recipe assigns the readonly attribute to the fields
 * first_name and last_name on the PMPro profile edit page
 * on the front-end and the user profile page in the
 * WordPress dashboard (back-end)
 *
 * You can add this recipe to your site by creating a custom plugin
 * or using the Code Snippets plugin available for free in the WordPress repository.
 * Read this companion article for step-by-step directions on either method.
 * https://www.paidmembershipspro.com/create-a-plugin-for-pmpro-customizations/
 */

function read_only_first_and_last_names_javascript() {

	// Bail if admin or not logged in user.
	if ( ! is_user_logged_in() || current_user_can( 'manage_options' ) ) {
		return;
	}

	global $current_user;
	// Bail if first and last name values empty
	if ( empty( get_user_meta( $current_user->ID, 'first_name' ) ) && empty( get_user_meta( $current_user->ID, 'last_name' ) ) ) {
		return;
	}
	?>
<script>jQuery(document).ready(function ($) {
	$('#first_name').attr('readonly', true);
	$('#last_name').attr('readonly', true);
});	</script>
	<?php
}

function read_only_first_and_last_names_init() {
	// We're on the WP Dashboard but not an admin.
	global $pagenow;
	if ( is_admin() && 'profile.php' === $pagenow ) {
		add_action( 'admin_footer', 'read_only_first_and_last_names_javascript' );
	}
}
add_action( 'init', 'read_only_first_and_last_names_init' );

function read_only_first_and_last_names_wp() {
	// Bail if PMPro Core not active
	if ( ! defined( 'PMPRO_VERSION' ) ) {
		return false;
	}
	// We're on the front end profile edit page.
	global $pmpro_pages;
	if ( is_page( $pmpro_pages['member_profile_edit'] ) ) {
		add_action( 'wp_footer', 'read_only_first_and_last_names_javascript' );
	}
}
add_action( 'wp', 'read_only_first_and_last_names_wp' );
