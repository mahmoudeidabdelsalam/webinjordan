<?php function insert_case_frist_step()
{
	$data = [
	];
	//add visit to doctor
	$this_user = _wp_get_current_user();

	$doctor_patient = get_field('patient', 'user_' . $this_user->ID);
	if (!in_array(intval($_POST['post_id']), $doctor_patient)) {
		// if patient ot in doctor 
		if ($this_user->caps['doctor']) {
			// if current user doctor
			$doctor_patient[] = intval($_POST['post_id']);
			update_field('patient', $doctor_patient, 'user_' . $this_user->ID);
		}
	}

	//Edit Case Read Inputss Vlaue
	if ($_POST['read_case_edit_data']) {
		$fields = get_fields(intval($_POST['post_id']));
		wp_send_json_success($fields);

	}
	// update Edit Case
	if ($_POST['update_data'] && intval($_POST['post_id']) > 0) {
		$id = $_POST['post_id'];

		foreach ($_POST['update_data'] as $datalop) {
			update_field($datalop['name'], $datalop['value'], $id);
		}
		$data['profile_updated'] = $id;
		$data['post_id'] = $id;

		if ($id) {
			wp_send_json_success($data);
		}

	}

	//add comorbiditiesname
	if ($_POST['comorbiditiesname'] && $_POST['data_id']) {
		$id = wp_insert_post(array('post_title' => $_POST['comorbiditiesname'], 'post_type' => 'comorbidities', 'post_status' => 'Publish'));

		$data['comorbidities_id'] = $id;
		$data['comorbidities_input'] = '<li> <label> <input type="checkbox" class="comorbidities" checked
                                                               value="' . $id . '"
                                                               name="comorbidities[]">
                                                        <span>' . get_the_title($id) . '</span>
                                                    </label>
                                                </li>';


		if ($id) {
			wp_send_json_success($data);
		} else {
			wp_send_json_error();
		}
	}

	///Draft
	if ($_POST['paint_to_drfat']) {
		$datax = update_field('status', 'draft', $_POST['paint_to_drfat']);
		if ($datax) {
			//updated
			$data['patient_update'] = 1;
			wp_send_json_success($data);
		} else {
			$error = ['Pleas Refersh Your page and Try again !'];
			wp_send_json_error($error);
		}
	}
	//discared

	if ($_POST['paint_to_remove']) {
		if ($_POST['paint_to_remove'] > 0) {
			$trash = wp_trash_post($_POST['paint_to_remove']);
			if ($trash) {
				$data['link_to_redirect'] = home_url('admin/?filter=1&removed_user=' . $_POST['paint_to_remove'] . '');
				wp_send_json_success($data);
			}
		}
	}
	//update step 2
	if ($_POST['step_2data'] && intval($_POST['step_2_post_id']) > 0) {
		$id = $_POST['step_2_post_id'];
		$Comorbidities = array();
		global $weight_in_kg;
		global $height_in_cm;
		foreach ($_POST['step_2data'] as $datalop) {
			if ($datalop['name'] === 'comorbidities[]') {
				$Comorbidities[] = $datalop['value'];
			}

			if ($datalop['name'] === 'weight_in_kg') {
				$weight_in_kg = $datalop['value'];
				update_field($datalop['name'], $datalop['value'], $id);

			}
			if ($datalop['name'] === 'height_in_cm') {
				$height_in_cm = $datalop['value'];
				update_field($datalop['name'], $datalop['value'], $id);

			}
//			// update radio
//			if ($datalop['name'] === 'first_joint_symptoms') {
//				update_field($datalop['name'], $datalop['value'], $id);
//			}
			update_field($datalop['name'], $datalop['value'], $id);
		}
		$height_in_cm_m2 = intval($height_in_cm) * 4;
		$bmi = $height_in_cm_m2 / intval($weight_in_kg);
		update_field('bmi_a', $bmi, $id);


		$integerIDs = array_map('intval', $Comorbidities);
		update_field('comorbidities', $integerIDs, $id);


		$data['profile_updated'] = $id;
		$data['post_id'] = $id;

		if ($id) {
			wp_send_json_success($data);
		}

	}

// update step 1
	if ($_POST['datainputs'] && intval($_POST['post_id']) > 0) {
		$id = $_POST['post_id'];

		foreach ($_POST['datainputs'] as $datalop) {
			update_field($datalop['name'], $datalop['value'], $id);
		}
		$data['profile_updated'] = $id;
		$data['post_id'] = $id;

		if ($id) {
			wp_send_json_success($data);
		}

	}
// new post step 1
	if ($_POST['datainputs'] && $_POST['post_id'] == 0) {
    $id = wp_insert_post(array('post_title' => 'random', 'post_type' => 'patient', 'post_status' => 'Publish'));

    $patient_name = $_POST['datainputs'][0]['value'];
    $birthDate = $_POST['datainputs'][7]['value'];

    $birthDate = get_fields( $id, 'birth_date');

    $birthDate = explode("/", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));
    $today = date("m/d/Y");


    $custom_tax = array('location' => array(14));

    $visite_id = wp_insert_post(
      array(
        'post_title' => $patient_name, 
        'post_type' => 'visites', 
        'post_status' => 'Publish', 
        'tax_input' => array( 'visites_category' => array(30)),
      )
    );

    update_field('field_5df7eb97de807', $visite_id, $id);
    update_field( 'field_5df6892476151', $id, $visite_id );
    update_field( 'field_5df67f70eae5b', $today, $visite_id );
    update_field( 'field_5df67f92eae5c', $age, $visite_id );



		$paint = array(
			'ID' => $id,
			'post_title' => $id,
			'post_author' => _wp_get_current_user()->ID,

		);
		$tag = array(intval($_POST['category_p'])); // Correct. This will add the tag with the id 5.

		wp_set_post_terms($id, $tag, 'patient_category');
		wp_update_post($paint);
		$data['post_id'] = $id;
		foreach ($_POST['datainputs'] as $datalop) {
			update_field($datalop['name'], $datalop['value'], $data['post_id']);
		}
		update_field('status', 'active', $id);
		if ($id) {
			wp_send_json_success($data);
		}
	}

// upload img 
	if ($_FILES && $_POST['post_id'] > 0) {
		require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/media.php');
		$file_handler = 'profile';
		$attach_id = media_handle_upload($file_handler, $_POST['post_id']);
		update_field('profile_img', $attach_id, $_POST['post_id']);
		$data['profile_uploaded'] = $attach_id;
		wp_send_json_success($data);
	}

	// upload Files Step 2 MEdia Reports
	if ($_FILES && $_POST['reports_file'] == 1) {
		require_once(ABSPATH . 'wp-admin' . '/includes/image.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/file.php');
		require_once(ABSPATH . 'wp-admin' . '/includes/media.php');
		// file 1
		$file_handler_file_id1 = 'file_id1';
		$attach_id_file_id1 = media_handle_upload($file_handler_file_id1, $_POST['post_id']);
		update_field('file_id1', $attach_id_file_id1, $_POST['post_id']);
		// file 2
		$file_handler_file_id2 = 'file_id2';
		$attach_id_file_id2 = media_handle_upload($file_handler_file_id2, $_POST['post_id']);
		update_field('file_id2', $attach_id_file_id2, $_POST['post_id']);
		//file 3
		$file_handler3_file_id3 = 'file_id3';
		$attach_id3_file_id3 = media_handle_upload($file_handler3_file_id3, $_POST['post_id']);
		update_field('file_id3', $attach_id3_file_id3, $_POST['post_id']);
		// file 4
		$file_handler4_file_id4 = 'file_id4';
		$attach_id_file_id4 = media_handle_upload($file_handler4_file_id4, $_POST['post_id']);
		update_field('file_id4', $attach_id_file_id4, $_POST['post_id']);

		$data['profile_uploaded'] = 3;
		wp_send_json_success($data);
	}
	/// update medical post type via Category
	if ($_POST['category_medical']) {
		$category_id = intval($_POST['category_medical']);
		$category = get_term($category_id, 'medication_category');
		$get_medical_forcategory = new WP_Query(array(
			'post_type' => 'medication',
			'tax_query' => array(
				'taxonomy' => 'medication_category',
				'terms' => $category->slug,
				'field' => 'slug',
			),
		));
		$data['options'] = [];
		if ($get_medical_forcategory->have_posts()):while ($get_medical_forcategory->have_posts()): $get_medical_forcategory->the_post();
			$data['options'][] = get_the_ID();

		endwhile; endif;


		if (count($data['options']) > 0) {
			wp_send_json_success($data);

		} else {
			$dataerror = [];
			$dataerror['error_no_medical'] = 1;
			wp_send_json_error($data);
		}

	}


	///previous_medication  adedd
	if ($_POST['previous_medication']) {
		$data_previous_medication = $_POST['previous_medication'];
		var_dump($data_previous_medication);
	}


	//step 3
	if ($_POST['step_3data']) {
		$mark_the_swollen_joints_on_mannequin = [];
		$mark_the_tender_joints_on_mannequin = [];

		$form_step_3 = $_POST['step_3data'];
		if ($form_step_3) {
			foreach ($form_step_3 as $step_done) {

				if ($step_done['name'] === "mark_the_tender_joints_on_mannequin") {
					$mark_the_tender_joints_on_mannequin[] = intval($step_done['value']);
				}

				if ($step_done['name'] === "mark_the_swollen_joints_on_mannequin") {
					$mark_the_swollen_joints_on_mannequin[] = intval($step_done['value']);
				}

				update_field($step_done['name'], $step_done['value'], $_POST['step_3_post_id']);

			}
			// update check >>>
			update_field('mark_the_tender_joints_on_mannequin', $mark_the_tender_joints_on_mannequin, $_POST['step_3_post_id']);
			update_field('mark_the_swollen_joints_on_mannequin', $mark_the_swollen_joints_on_mannequin, $_POST['step_3_post_id']);

		}
 		wp_send_json_success();
	}
	//add_previousama
	if ($_POST['add_previousama']) {
		$post_ida = $_POST['the_post_id'];
		$add_previousama = $_POST['add_previousama'];
		$row_data = [];
		$out_row_data_httml = [];
		if ($add_previousama) {
			foreach ($add_previousama as $prev_data) {
				$row_data[$prev_data['name']] = $prev_data['value'];
			}
		}
		$row_data_aded = add_row('field_5ded575fd84bc', $row_data, $post_ida);
		/*add new row*/
		if ($row_data_aded) {
			/*if row aded*/
			$prev_medica = get_field('field_5ded575fd84bc', $post_ida);
			if ($prev_medica) {
				///get prev medica
				foreach ($prev_medica as $medica) {
					$medica_name = get_the_title(intval($medica['the_medical']));
					$out_row_data_httml[] = '<li>
                                            <div class="link"><i class="fa fa-database"></i>' . $medica_name . '<i class="fa fa-chevron-down"></i></div>
                                            <ul class="submenu">
                                                <li><a href="javascript:void(0)">dose : ' . $medica['dose'] . '</a></li>
                                                <li><a href="javascript:void(0)">Dosage Form : ' . $medica['dosage_form'] . '</a></li>
                                                <li><a href="javascript:void(0)">recommendations : ' . $medica['recommendations'] . '</a></li>
                                                <li><a href="javascript:void(0)">comments : ' . $medica['comments'] . '</a></li>
                                            </ul>
                                        </li>';
				}
			}
			wp_send_json_success(implode("", $out_row_data_httml));
		}

	}
	wp_die();
}


add_action("wp_ajax_step_insert_case", "insert_case_frist_step");
add_action("wp_ajax_nopriv_step_insert_case", "insert_case_frist_step");