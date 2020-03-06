<?php

function form_user_created_centers( $user, $form, $args ) {
	// Do something with the updated user.
	// $user is a WP_User object.
var_dump($user); 
	wp_redirect(home_url('/admin/?all_centers=1&center_created=1&center_id='. $user->ID .''));
	exit;
}


add_action( 'af/form/editing/user_created/key=form_5e285d20b234b', 'form_user_created_centers', 10, 3 );
function form_user_updated( $user, $form, $args ) {
	// Do something with the updated user.
	// $user is a WP_User object.

	wp_redirect(home_url('/admin/?all_centers=1&center_updated=1&center_id='. $user->ID .''));
	exit;
}
add_action( 'af/form/editing/user_updated/key=form_5e285d20b234b', 'form_user_updated', 10, 3 );