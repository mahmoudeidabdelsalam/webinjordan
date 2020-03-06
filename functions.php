<?php
/**
 * sar functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sar
 */
require get_template_directory() . '/inc/post_type.php';
///custom option page
function get_users_id()
{
	$users = [];

	$current_user = _wp_get_current_user();
//	return $current_user->roles;
	if (in_array("doctor", $current_user->roles)) {
		$users[] = $current_user->ID;
	}
	if (in_array("medical_center", $current_user->roles)) {
		$users[] = $current_user->ID;
		$get_doctors = get_field('doctors', 'user_'.$current_user->ID);
		if ($get_doctors) {
			foreach ($get_doctors as $doc) {
				array_push($users, $doc);
			}

		}
	}

	if (in_array("administrator", $current_user->roles)) {
		$users[] = $current_user->ID;
		$all_users = get_users();
		if ($all_users) {
			foreach ($all_users as $usr) {
				$users[] = $usr->ID;
			}
		}

	}

	return array_unique($users);

}
add_action('admin_head', function () {
	echo '<style>
li#toplevel_page_wpaie-main {
    display: none;
}
li#toplevel_page_wpdatatables-administration ,li#toplevel_page_edit-post_type-acf-field-group{
   // display: none;
}
a.dashicons.dashicons-admin-generic.acf-hndle-cog.acf-js-tooltip {
    display: none;
}
li#menu-posts-af_form {
//    display: none;
}
</style>';
});
require get_template_directory() . '/inc/front_dash/login.php';
require get_template_directory() . '/inc/front_dash/insert_case.php';
require get_template_directory() . '/inc/front_dash/insert_visit.php';
require get_template_directory() . '/inc/front_dash/edit_visit.php';
require get_template_directory() . '/inc/front_dash/centers.php';
require get_template_directory() . '/inc/power_secure_.php';
require get_template_directory() . '/inc/report_functions.php';
require get_template_directory() . '/inc/sign_up_doctor.php';
require get_template_directory() . '/inc/profile_updated.php';
add_filter('show_admin_bar', '__return_false');
///filter doctor sellector Paintent author is doctors
add_filter('wp_dropdown_users_args', 'change_user_dropdown', 10, 2);

function change_user_dropdown($query_args, $r)
{
// get screen object
	$screen = get_current_screen();

// list users whose role is e.g. 'Editor' for 'post' post type
	if ($screen->post_type == 'patient' || $screen->post_type == 'visites'):
		$query_args['role'] = array('doctor');

		// unset default role
		unset($query_args['who']);
	endif;
	return $query_args;
}

///Option page
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Site General Settings',
		'menu_title' => 'Site Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
	acf_add_options_page(array(
		'page_title' => 'Alert Settings',
		'menu_title' => 'Alert Settings',
		'menu_slug' => 'theme-general-settings-allert',
		'capability' => 'edit_posts',
		'redirect' => false
	));


}

// function output Filters Data   On Site Via Short code
add_action('out_put_filters_cases', 'oput_pu_filters_case');
function oput_pu_filters_case()
{
	$cases_filter_data = get_field('cases_filter_data', 'option');
	if ($cases_filter_data) {
		foreach ($cases_filter_data as $filter) {
			echo '<div class="form-group" style="width: ' . $filter['field_width_'] . '%;">';
			echo do_shortcode($filter['short_code']);
			echo '</div>';
		}
	}
}

/// add action for filter visits >>>
/// https://3alammash.com/sar/admin/?visits_reports=1
add_action('visits_filter_report', 'visits_filter_report');
function visits_filter_report()
{
	$visits_filter = get_field('visits_filter', 'option');
	if ($visits_filter) {
		foreach ($visits_filter as $filter) {
			echo '<div class="form-group" style="width: ' . $filter['field_width_'] . '%;">';
			echo do_shortcode($filter['short_code']);
			echo '</div>';
		}
	}
}

