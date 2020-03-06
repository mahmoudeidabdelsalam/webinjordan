<head>
    <style>
        .rep-blocks .block .inner .i-data h3 {
            color: #fff;
            line-height: 1;
            font-family: pop-medium;
            font-size: 22px;
        }
    </style>
</head>


<?php if ($_GET['RA-Dashboard']): ?>
    <div class="dashboard-doc">
        <div class="content-top col-xs-12">
            <div class="logo-co">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?> ">
                <div class="co-head">
                    <h3>
                        search
                        <span>reports</span>
                    </h3>
                </div>
            </div>
            <div class="co-extra" style="margin-left:10px;">
                <a href="<?php echo home_url('admin/?new_case=1'); ?>" class="btn">Add new case</a>
            </div>
            <div class="co-extra ">
                <a href="<?php echo home_url('admin/?filter=1'); ?>" class="btn cases">cases</a>
            </div>
        </div>


		<?php $patient_query = new WP_Query(array(
			'post_type' => 'patient',
			'posts_per_page' => -1,
			'author' => _wp_get_current_user()->ID,

			'author__in' => get_users_id(),

			'medication_default_report' => 1,
			'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash')

		)); ?>
		<?php $patient_data = $patient_query->posts; ?>
		<?php
		$the_patient = []; // alll fet patient
		$medic = intval($_GET['medic']);

		$all_visits_medica = [];
		$last_patient_visits = []; // lasts patient visits
		$all_patent_ID = [];
		// get all patient ID
		$cdmard_cat = [];
		$biologics_dmard = [];
		$scdmard = [];

		?>
		<?php // medic report start ?>
		<?php if ($patient_data): ?>
			<?php foreach (/*start patient*/
				$patient_data as $patient): ?>

				<?php $patient_visit = get_field('visits', $patient->ID); ?>
				<?php /// get all patint ID
				///
				foreach ($patient_data as $patient) {
					$all_patent_ID[] = $patient->ID;
				}
				?>


				<?php if ($patient_visit): ?>
					<?php

					$last_vist = end($patient_visit);
					if ($last_vist != null) {
						$last_patient_visits[] = $last_vist;

					} ?>


					<?php foreach ($patient_visit as $visit): ?>
						<?php
						// visit data
                    $data_medica = [];
						$the_patient_id_ = intval(get_field('patient__id', intval($visit)));
						//
						$da = get_field('date_of_consultation');
						$mdicals = get_field('medication', intval($visit));
						$previous_medication = get_field('previous_medication', intval($visit));
						$final_medication = get_field('final_medication', intval($visit));

						$all_medicasa = array(
							'medical' => $mdicals,
							'prev_medica' => $previous_medication,
							'final' => $final_medication
						);
						foreach ($all_medicasa as $medic_s) {
							if ($medic_s) {
								foreach ($medic_s as $medi) {
									$data_medica[] = $medi;
								}
							}

						}
						$all_medic_ = array_unique($data_medica);

						foreach ($all_medic_ as $medica) {
							// find medic category
							$terms = get_the_terms($medica, 'medication_category');
							foreach ($terms as $ter) {
								// loop throuh medica category
//                                var_dump($ter->term_id);
								if ($ter->term_id === 7) {
									$cdmard_cat[] = intval($the_patient_id_);
								} elseif ($ter->term_id === 8) {
									$biologics_dmard[] = intval($the_patient_id_);
								} elseif ($ter->term_id === 9) {
									$scdmard[] = intval($the_patient_id_);

								}
							}
						}
						if (in_array($medic, $all_medic_)) {
							//if (in_array($final_medication)) {
							// if $_GET medic in vists medic
							$the_patient[] = $the_patient_id_;

						}
						?>
					<?php endforeach; ?>
					<?php
					$final_medication1 = get_field('final_medication');
					echo $final_medication1; ?>

				<?php endif; ?>
			<?php /*end patient*/
			endforeach; ?>
		<?php endif; ?>



		<?php $table_patient_report = array(
			'all_patient' => array(
				'name' => 'all patient',
				'data' => $all_patent_ID
			),
			'the_patient_used_medic' => array(
				'name' => 'patient used medic',
				'data' => array_unique($the_patient)

			)

		); ?>


        <div class="rep-blocks col-xs-12">
            <div class="block col-md-6 col-xs-12">
                <div class="inner">
                    <div class="i-img">
                        <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt=""">
                    </div>
                    <div class="i-data">


                        <span> <?php echo count($patient_data); ?></span>
                        <h3>All Patients<br/></h3><br/>
                    </div>
                </div>
            </div>
            <div class="block col-md-6 col-xs-12">
                <div class="inner">
                    <div class="i-img">
                        <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt=""">
                    </div>
                    <div class="i-data">

                        <span><?php echo count(array_unique($cdmard_cat)); ?></span>
                        <h3>Patients Used Conventional synthetic DMARDs Medication </h3>
                    </div>
                </div>
            </div>


            <div class="block col-md-6 col-xs-12">
                <div class="inner">
                    <div class="i-img">
                        <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                    </div>
                    <div class="i-data">
                                <span><?php echo count(array_unique($biologics_dmard)); ?>
                                
                                </span>
                        <h3> Patients Used Biologic DMARDs Medication</h3>

                    </div>
                </div>
            </div>
            <div class="block col-md-6 col-xs-12">
                <div class="inner">
                    <div class="i-img">
                        <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                    </div>
                    <div class="i-data">
                        <span><?php echo count(array_unique($scdmard)); ?></span>
                        <h3>Patients Used Targeted synthetic DMARDs Medication</h3>
                    </div>
                </div>
            </div>
        </div>


        <div class="rep-stst col-xs-12">
            <div class="cardo col-md-4 col-xs-12">
                <div class="inner">
                    <img src="<?php bloginfo('template_directory'); ?>/images/gender.png" alt="">
                    <h3>Gender statistics</h3>
                </div>
            </div>
            <div class="cardo col-md-4 col-xs-12">
                <div class="inner">
                    <img src="<?php bloginfo('template_directory'); ?>/images/generation.png" alt="">
                    <h3>Age statistics</h3>
                </div>
            </div>
            <div class="cardo col-md-4 col-xs-12">
                <div class="inner">
                    <img src="<?php bloginfo('template_directory'); ?>/images/dis-statistics.png" alt="">
                    <h3>Diseases statistics</h3>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>

