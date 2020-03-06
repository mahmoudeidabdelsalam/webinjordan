<?php // custom medication FUnctions

add_action('get_medications', 'get_medication_function');
function get_medication_function()
{
	$medication = get_posts(array(
		'post_type' => 'medication',
		'posts_per_page' => -1
	));
	if ($medication) {
		//we have medication
		foreach ($medication as $medica) {
			echo '<option value="' . $medica->ID . '">' . get_the_title($medica->ID) . '</option>';
		}
	}

}

/// get all reason
///

add_action('get_reason_', 'get_reason_data');
function get_reason_data()
{
	$get_reason_ = get_posts(array(
		'post_type' => 'stop_medic',
		'posts_per_page' => -1
	));
	if ($get_reason_) {
		//we have medication
		foreach ($get_reason_ as $medica) {
			echo '<option value="' . $medica->ID . '">' . get_the_title($medica->ID) . '</option>';
		}
	}

}

/// year action
///
add_action('get_years_data', 'get_years_data_func');
function get_years_data_func()
{
	$startingYear = date('Y') - 15;
	$endingYear = $startingYear + 20;

	for ($i = $startingYear; $i <= $endingYear; $i++) {
		echo '<option value=' . $i . '>' . $i . '</option>';
	}
}

///  get medic category
add_action('get_medic_category', 'medic_category_function');
function medic_category_function()
{
	$terms = get_terms(array(
		'taxonomy' => 'medication_category',
		'hide_empty' => false,
	));

	if ($terms) {
		foreach ($terms as $term) {
			echo '<option value=' . $term->term_id . '>' . $term->name . '</option>';
		}
	}

}

/// report get medic from category
function get_medica_ajax()
{
	// request term_category get medic for sectino

	$category = intval($_POST['category']);


	$medication = get_posts(array(
		'post_type' => 'medication',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'medication_category',
				'field' => 'term_id',
				'terms' => $category
			)
		)
	));
	$meidc_option = [];
	$meidc_option[]='<option selected="selected" disabled="disabled">select medications</option>';
	$meidc_option_li = [];
	if ($medication) {
		//we have medication
		foreach ($medication as $medica) {
			$meidc_option[] = '<option value="' . $medica->ID . '">' . get_the_title($medica->ID) . '</option>';
			$meidc_option_li[] = '<li data-value="' . $medica->ID . '" class="option">' . get_the_title($medica->ID) . '</li>';
		}

		$nice_sellect = '<div class="nice-select form-control" tabindex="0"><span class="current">Medication</span><ul class="list"><li data-value="Medication" class="option selected disabled">Medication</li>' . implode("", $meidc_option_li) . '

</ul></div>';
		$array_data = array(
			'option' => implode("",$meidc_option),
			'li' => $nice_sellect
		);
		wp_send_json_success($array_data);
	} else {
wp_send_json_error(); 
	}
	wp_die();
}

add_action('wp_ajax_get_the_medic_of_category', 'get_medica_ajax');
