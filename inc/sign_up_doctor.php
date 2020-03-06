<?php
function sign_up_doctor_create()
{
	$doctor_data = $_REQUEST['doctor_data'];
	$doc_new_data = [];
	$errora = [];
	$sucess = [];
	if ($doctor_data) {
		foreach ($doctor_data as $doca) {
			$doc_new_data[$doca['name']] = $doca['value'];
		}
	}
	$user_id = wp_create_user($doc_new_data['user_name'], $doc_new_data['pass1'], $doc_new_data['email']);

	if (is_wp_error($user_id)) {
		$errora['user_alredy_registerd'] = $user_id->get_error_message();

	} else {
		$the_user = new WP_User($user_id);
		$the_user->set_role("doctor");
		$centers_doctors = get_field('doctors', 'user_' . intval($doc_new_data['centers']));
		$doca = [];
		if ($centers_doctors) {
			foreach ($centers_doctors as $docas) {
				$doca[] = intval($docas);
			}
		} else {
			array_push($doca, $user_id);

		}
		array_push($centers_doctors, $user_id);
		update_field('doctors', array_unique($doca), 'user_' . intval($doc_new_data['centers']));
		update_field('doctor_status', false, 'user_' . $user_id);
		update_field('doctor_name', $doc_new_data['full_name'], 'user_' . $user_id);
		update_field('doc_adress', $doc_new_data['adress'], 'user_' . $user_id);
		update_field('phone_num', $doc_new_data['phone_num'], 'user_' . $user_id);
		update_field('doc_adress', $doc_new_data['adress'], 'user_' . $user_id);
		update_field('gander_data', $doc_new_data['gander[]'], 'user_' . $user_id);
		update_field('center', $doc_new_data['centers'], 'user_' . $user_id);
		$creds = array(
			'user_login' => $doc_new_data['user_name'],
			'user_password' => $doc_new_data['pass1'],
			'remember' => true
		);


		$user_logina = wp_signon($creds, false);
		if ($user_logina) {
			$sucess['user_logged_in'] = 1;
		}

	}
	if ($errora) {
		wp_send_json_error($errora);
	} else {
		wp_send_json_success($sucess);
	}

	wp_die();
}

add_action('wp_ajax_register_doctor', 'sign_up_doctor_create');
add_action('wp_ajax_nopriv_register_doctor', 'sign_up_doctor_create');