<?php

function form_post_updated($post, $form, $args)
{

	// Do something with the edited post.
	// $post is a WP_Post object.

	/*Update Final meicaton*/

	$patient_id = get_field('patient__id', $post->ID);
	$medication = get_field('medication', $post->ID);
	$previous_medication = get_field('previous_medication', $post->ID);
	$the_final_medic = array_unique(array_merge($medication, $previous_medication));


	if (empty($previous_medication)) {
		update_field('final_medication', $medication, $post->ID);
	} else {
		update_field('final_medication', $the_final_medic, $post->ID);

	}
	wp_redirect(home_url('/admin/?Patient_visits=' . $patient_id . '&visit_updated=1'));
	exit;
}

add_action('af/form/editing/post_updated/key=form_5df69132505ce', 'form_post_updated', 10, 3);

//function pravious_medication_and_final( $value, $field, $form, $args ) {
// }
//  add_filter( 'af/field/prefill_value/key=FIELD_KEY', 'prefill_form_field', 10, 4 );

/// add disess montoring
function edit_DISEASE_MONITORING()
{
	$data_get = $_POST['data_montoring'];
	$visi_id = intval($data_get['visit_id']);
	update_field("prev_visit_id", 5, $visi_id); // to open deises montioring tab
	update_field("_disses_json", $_REQUEST['data_json'], $visi_id); // to open deises montioring tab

	if ($data_get) {
		foreach ($data_get as $datas => $val) {

			update_field($datas, $val, $visi_id);

		}
		wp_send_json_success('work');

	}
	wp_die();
}

add_action('wp_ajax_das_save', 'edit_DISEASE_MONITORING');
add_action('wp_ajax_nopriv_das_save', 'edit_DISEASE_MONITORING'); // executed when logged out


// get desses montoring data ajax
function desses_montoring_data()
{

	wp_send_json_success(get_field('_disses_json',intval($_REQUEST['visit_ID'])));
	wp_die();
}

add_action('wp_ajax_nopriv_get_disess_data', 'desses_montoring_data');
add_action('wp_ajax_get_disess_data', 'desses_montoring_data');