<?php
// add_action('af/form/editing/post_created/key=form_5df69132505ce', 'insert_visit_handle', 10, 3);
// function insert_visit_handle($post, $form, $args)
// {

// 	$my_post = array(
// 		'ID' => $post->ID,
// 		'post_title' => $post->ID,
// 	);
// 	wp_update_post($my_post);
// //	var_dump($post);
// 	$patient_id = $_GET['add_new_visit'];
// 	update_field('patient__id', intval($patient_id), $post->ID);
// 	$patient_vists = array();
// 	$patient_vist_data = get_field('visits', intval($patient_id));
// 	if (empty($patient_vist_data)) {
// 		$patient_vists[] = $post->ID;
// 		update_field('visits', $patient_vists, intval($patient_id));
// 	} else {
// 		foreach ($patient_vist_data as $vists_data) {
// 			$patient_vists[] = $vists_data;
// 		}
// 		$patient_vists[] = $post->ID;
// 		update_field('visits', $patient_vists, intval($patient_id));

// 	}
// 	/*Update Final medic While insert data */
// 	$patient_id = get_field('patient__id', $post->ID);
// 	$medication = get_field('medication', $post->ID);

// 	$previous_medication = get_field('previous_medication', $post->ID);
// 	$the_final_medic = array_unique(array_merge($medication, $previous_medication));
// 	if (empty($medication)) {
// 		update_field('final_medication', $previous_medication, $post->ID);
// 		/// update final from previous if there is no medic
// 	} else {
// 		update_field('final_medication', $the_final_medic, $post->ID);

// 	}

// 	wp_redirect(home_url('admin/?edit_visit=' . $post->ID . '&patient_id=' . $patient_id. '&disease_monitoring=1&new_visit_aded='.$post->ID .''));
// 	exit;
// }

// function pravious_medication_and_final($value, $field, $form, $args)
// {
// 	/* pravious visit medication */
// 	if ($_GET['add_new_visit']) {
// 		$patient_id = $_GET['add_new_visit'];

// 		$get_frist_prev_medica = get_field('previous_medication', intval($patient_id));
// 		$old__prev_medic = [];

// 		// if this new visits get last visit
// 		$patient_visits = get_field('visits', intval($patient_id));
// 		if (!$patient_visits) {
// 			foreach ($get_frist_prev_medica as $frist_prev_medica) {
// 				if ($frist_prev_medica['the_medical']) {
// 					$old__prev_medic[] = $frist_prev_medica['the_medical'];
// 				}
// 			}

// 			return array_unique($old__prev_medic);
// 		} else {
// 			$last_visit = end($patient_visits);
// 			$pravious_medic = get_field('final_medication', $last_visit);

// 			return $pravious_medic;
// 		}

// 	} else {

// 		return $value;
// 	}


// }

// add_filter('af/field/prefill_value/name=previous_medication', 'pravious_medication_and_final', 10, 4);
// Scheduled Action Hook
function filter_removed_medic_from_medication( ) {
	$visites = get_posts(array(
		'post_type' => 'visites',
		'posts_per_page' => -1,
	));
	if ($visites) {
		foreach ($visites as $visit) {
			$stop_patient_medic = get_field('why_you_stop_patiet_from_this_medication__', $visit->ID);
			if ($stop_patient_medic) {
				/// if there is stopped medica
				$medication = get_field('medication', $visit->ID);
				$previous_medication = get_field('previous_medication', $visit->ID);
				$final_medication = get_field('final_medication', $visit->ID);
				$all_mwdica = array_unique(array_merge($medication, $previous_medication, $final_medication));
				$medica_stoped = [];  /// all stoped medic pushed
				foreach ($stop_patient_medic as $stoppped) {
					$medica_stoped[] = $stoppped['medic'];    //addd medic to stopped medica
				}
				$result = array_intersect($medica_stoped, $all_mwdica);
// 			var_dump($result);
				if ($result) {
					//tehre is medica in stooped and in medication
					$previous_medication_arr = [];
					$final_medication_arr = [];
					$medication_arr = [];
					$medic_kind = array(
						'previous_medication' => $previous_medication,
						'final_medication' => $final_medication,
						'medication' => $medication

					);
					foreach ($medic_kind as $medica => $val) {
						$result_last = array_diff($val, $result);
						if ($medica === 'previous_medication') {
							update_field('previous_medication', $result_last, $visit->ID);
						} elseif ($medica === 'final_medication') {
							update_field('final_medication', $result_last, $visit->ID);

						} elseif ($medica === 'medication') {
							update_field('medication', $result_last, $visit->ID);

						}

					}

				}


//				var_dump($result);

			}
		}
	}
}
add_filter( 'cron_schedules', 'isa_add_every_three_minutes' );
function isa_add_every_three_minutes( $schedules ) {
	$schedules['every_three_minutes'] = array(
		'interval'  => 180,
		'display'   => __( 'Every 3 Minutes', 'textdomain' )
	);
	return $schedules;
}

add_action( 'filter_removed_medic_from_medication', 'filter_removed_medic_from_medication' );

// Schedule Cron Job Event
function update_removed_medica() {
	if ( ! wp_next_scheduled( 'filter_removed_medic_from_medication' ) ) {
		wp_schedule_event( time(), 'every_three_minutes', 'filter_removed_medic_from_medication' );
	}
}
add_action( 'wp', 'update_removed_medica' );


 