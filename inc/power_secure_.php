<?php
//Start Secure All get For Current Doctor
function secure_all_our_get()
{
	$secure_get = array('add_new_visit', 'edit_case', 'view_case', 'Patient_visits', 'view_visit');
	$query_string_strip = explode('=', $_SERVER['QUERY_STRING']);

	if (in_array($query_string_strip[0], $secure_get)) {
		$the_author = _wp_get_current_user()->ID;
		$post = get_post(intval($query_string_strip[1]));
		if (intval($post->post_author) === $the_author || in_array("administrator", _wp_get_current_user()->roles)) {

		} else {
			wp_redirect(home_url('admin/?RA-Dashboard=1&not_allow=1'));
			exit;

		}
	}

}

add_action('init', 'secure_all_our_get');
add_action('wp',function (){
	global $post;
	if (!is_user_logged_in() && $post->ID ==186){
		exit(wp_redirect(home_url()));
	}
 });
add_action('template_redirect', 'if_new_doctor_disabl_him');
function if_new_doctor_disabl_him()
{
	if (in_array("doctor", _wp_get_current_user()->roles) && !get_field('doctor_status', 'user_' . _wp_get_current_user()->ID)) {
		add_action('wp_logout',function (){
			wp_redirect(home_url('?logout=true&not_activate=1'));
			exit;
		});
		wp_logout();
	}
}



