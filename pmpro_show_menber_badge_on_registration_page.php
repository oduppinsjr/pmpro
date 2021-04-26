<?php

/*
  Sample method to show a level's Member Badge on the three column layout of the 
  Membership Levels page when using the Advanced Levels Page Shortcode Add On.
*/
function my_pmproal_before_level_member_badge( $level_id, $layout ) {
	if( function_exists( 'pmpromb_getBadgeForLevel' ) ) {
		$image = pmpromb_getBadgeForLevel($level_id);
		if( ! empty( $image ) && $layout == '3col' ) {
			echo '<img class="pmpro_member_badge" src="' . esc_url($image) . '" border="0" />';
		}
	}
}
add_action( 'pmproal_before_level', 'my_pmproal_before_level_member_badge', 10, 2);
