<?php
//Login 28/NOV

function reset_user_pass_admin()
{
	$email = $_REQUEST['the_email'];
	$error = [];
	$sucess = [];
	if (email_exists($email)) {
		$get_user = get_user_by_email($email);
		$pass = wp_generate_password(12);
		$set_pass = wp_set_password($pass, $get_user->ID);
		if ($set_pass) {
			wp_mail($get_user->user_email, "new password", $pass);
			$sucess['emill_sent'] = "new password sent to your email ";

		}
	} else {
		$error["no_email"] = 1;
	}

	if ($sucess) {
		wp_send_json_success($sucess);
	} else {
		wp_send_json_error($error);
	}

}

add_action('wp_ajax_reset_email_pass', 'reset_user_pass_admin');
add_action('wp_ajax_nopriv_reset_email_pass', 'reset_user_pass_admin');
function user_ajax_login()
{
	$error = [];
	$sucess = [];
	$creds = array(
		'user_login' => $_REQUEST['username'],
		'user_password' => $_REQUEST['password'],
		'remember' => true
	);
	$user_auth = wp_authenticate($_REQUEST['username'], $_REQUEST['password']);
	if (is_wp_error($user_auth)) {
		$error['error_auth'] = $user_auth->get_error_message();
	} else {
		$user_logina = wp_signon($creds, false);
		if (is_wp_error($user_logina)) {
			$error[] = $user_logina->get_error_message();
		} else {
			$sucess['user_logged_in'] = 1;
		}

	}
	if ($sucess) {
		wp_send_json_success($sucess);

	} else {
		wp_send_json_error($error);
	}

}

add_action('wp_ajax_make_user_login', 'user_ajax_login');
add_action('wp_ajax_nopriv_make_user_login', 'user_ajax_login');

 function after_logout()
{

		wp_redirect(home_url('?logout=true&'));
		exit;


}

add_action('wp_logout', 'after_logout',9999);



///after login
function if_user_not_admin()
{
	$current_user_role = _wp_get_current_user()->roles;
	if (is_admin() && is_user_logged_in()) {
		if (!in_array('administrator', $current_user_role) && !defined('DOING_AJAX')) {
			wp_redirect(home_url('admin'));
			exit;
			///do no thing
		} else {
			//not admin

		}
	}
}

add_action('init', 'if_user_not_admin');
/**
 * Capture user login and add it as timestamp in user meta data
 *
 */

function user_last_login($user_login, $user)
{
	update_user_meta($user->ID, 'last_login', time());
}

add_action('wp_login', 'user_last_login', 10, 2);

/**
 * Display last login time
 *
 */

function wpb_lastlogin()
{
	$last_login = get_the_author_meta('last_login');
	$the_login_date = human_time_diff($last_login);
	return $the_login_date;
}

/**
 * Add Shortcode lastlogin
 *
 */

add_shortcode('lastlogin', 'wpb_lastlogin');
// add query ar if is admin without get ?filter = 1
 