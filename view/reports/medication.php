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
    <div class="co-extra">
        <a href="<?php echo home_url('admin/?filter=1'); ?>" class="btn cases">cases</a>
    </div>
</div>
<?php $total_patient = wp_count_posts('patient')->publish; ?>
<div class="content-mid col-xs-12">
    <div class="adv-filter col-xs-12">
        <form action="<?php echo home_url('admin/'); ?>" method="get" enctype="multipart/form-data">
            <input type="hidden" name="reports" value="<?php echo $_GET['reports']; ?>">
            <input type="hidden" name="generate_report" value="1">
            <div class="form-group" style="width: 30%; ">
                <select class="form-control" id="medic_category" name="medic_cat" style="display: none;">
                    <option selected="" disabled="">Medication Category</option>
					<?php do_action('get_medic_category'); ?>
                </select>
            </div>
            <div class="form-group" id="medic_medic_top" style="width: 30%; display: none;">
                <select class="form-control" id="the_medic" name="medic">
                    <option selected="" disabled="">Select the Medication:</option>
                    <option selected="" disabled="">Medication</option>
					<?php do_action('get_medications'); ?>
                </select>
            </div>


            <div class="form-group" id="the_condition" style="width: 30%; display: none">
                <select class="form-control the_condition" name="condition">
                    <option selected="" disabled="">Medication Condition:</option>
                    <option value="treatment">On treatment</option>
                    <option value="discontinued">Discontinued</option>
                </select>
            </div>
            <div class="form-group" id="from_treatment" style="width: 30%; display: none">
                <select name="from_treatment" class="form-control from_treatment" style="display: none;">
                    <option selected="" disabled="">From</option>
					<?php do_action('get_years_data'); ?>

                </select>
            </div>

            <div class="form-group" id="from_discont" style="width: 30%; display: none">
                <select name="from_discont" class="form-control" style="display: none;">
                    <option selected="" disabled="">From</option>
					<?php do_action('get_years_data'); ?>

                </select>
            </div>
            <div id="to_discont" class="form-group" style="width: 30%; display: none">
                <select name="to_discont" class="form-control" style="display: none;">
                    <option selected="" disabled="">To</option>
					<?php do_action('get_years_data'); ?>
                </select>
            </div>
            <div class="form-group" id="reason_discont" style="width: 30%; display: none">
                <select name="reason_discont" class="form-control reason_discont" style="display: none;">
                    <option selected="" disabled="">Reason of Discontinuation
                    </option>
					<?php do_action('get_reason_'); ?>
                </select>
            </div>
            <div class="form-group" style="width: 20%;">
                <button type="submit" class="btn">Report</button>
            </div>

        </form>
    </div>
	<?php $patient_query = new WP_Query(array(
		'post_type' => 'patient',
		'posts_per_page' => -1,
		'author__in' => (_wp_get_current_user()->ID),
		'medication_default_report' => 1,
		'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash')

	)); ?>
	<?php $patient_data = $patient_query->posts; ?>

	<?php
	$the_patient = []; // alll fet patient
	$medic = intval($_GET['medic']);
	$reason_discont = intval($_GET['reason_discont']);
	$medic_condtion = $_GET['condition'];
	$all_visits_medica = [];
	$last_patient_visits = []; // lasts patient visits
	$treatment_patient_medica = array(); // return patient id
	$tratment_year = intval($_GET['from_treatment']);
	$from_treatment_patient = [];
	$discontinued_patient_medic = []; // return patient stop  spasfic medic
	$discontinued_patient_reason = []; // return patient stop  spasfic reason
	$from_discont = intval($_GET['from_discont']) ?: 2000;
	$to_discont = intval($_GET['to_discont']) ?: intval(date('Y'));
	$data_discont_range = range($from_discont, $to_discont);
	$patient_discount_from_to = [];
	$all_patent_ID = [];
	// get all patient ID

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
				<?php // treatment condtion ?>
				<?php if ($_GET['condition'] == 'treatment'): ?>
					<?php if ($last_patient_visits): ?>
						<?php foreach ($last_patient_visits as $lastvisito): ?>

							<?php
							$last_visit_patient = intval(get_field('patient__id', intval($lastvisito)));
							$all_medias__treatment_1 = [];
							$mdicals = get_field('medication', intval($lastvisito));
							$previous_medication = get_field('previous_medication', intval($lastvisito));
							$final_medication = get_field('final_medication', intval($lastvisito));
//							var_dump($last_visit_patient);
							$all_medias__treatment_1 = array(
								'medical' => $mdicals,
								'prev_medica' => $previous_medication,
								'final' => $final_medication
							);
							foreach ($all_medias__treatment_1 as $medic_s) {
								if ($medic_s) {
									foreach ($medic_s as $medi) {
										$all_medias__treatment_1[] = $medi;
									}
								}

							}
							$get_all_visit_medic = array_unique($all_medias__treatment_1);

							if (in_array($medic, $get_all_visit_medic)) {

								/// if last visit medic has $_GET MEIC than it Condtion is treatment
								$treatment_patient_medica[] = intval($last_visit_patient);
							}

							?>

						<?php endforeach; ?>
					<?php endif; ?>
				<?php endif; // treatment condtion ?>

				<?php // from_treatment
				if ($_GET['from_treatment']) {
					/// get visit than get visit data if year === $_GET['from_treatment']
					if ($patient_visit) {
						foreach ($patient_visit as $the_visit) {
							$all_medicas_treatment = [];
							$visit_year = get_the_time('Y', $the_visit);
							$the_patient_treatment = intval(get_field('patient__id', intval($the_visit)));
							$mdicals = get_field('medication', intval($the_visit));
							$previous_medication = get_field('previous_medication', intval($the_visit));
							$final_medication = get_field('final_medication', intval($the_visit));
							$all_medias__treatment = array(
								'medical' => $mdicals,
								'prev_medica' => $previous_medication,
								'final' => $final_medication
							);
							foreach ($all_medias__treatment as $medic_s) {
								if ($medic_s) {
									foreach ($medic_s as $medi) {
										$all_medicas_treatment[] = $medi;
									}
								}

							}
							$get_all_visit_medic = array_unique($all_medicas_treatment);

							if (in_array($medic, $get_all_visit_medic) && $visit_year == $tratment_year) {
								$from_treatment_patient[] = $the_patient_treatment;
							}
						}
					}

				}

				?>


				<?php foreach ($patient_visit as $visit): ?>
					<?php
					// visit data
					$all_medicas = [];
					$the_patient_id_ = intval(get_field('patient__id', intval($visit)));
					$mdicals = get_field('medication', intval($visit));
					$previous_medication = get_field('previous_medication', intval($visit));
					$final_medication = get_field('final_medication', intval($visit));
					$all_medias_ready = array(
						'medical' => $mdicals,
						'prev_medica' => $previous_medication,
						'final' => $final_medication
					);
					foreach ($all_medias_ready as $medic_s) {
						if ($medic_s) {
							foreach ($medic_s as $medi) {
								$all_medicas[] = $medi;
							}
						}

					}
					$all_medic_ = array_unique($all_medicas);
					if (in_array($medic, $all_medic_)) {
						//if (in_array($final_medication)) {
						// if $_GET medic in vists medic
						$the_patient[] = $the_patient_id_;
					}
					?>
				<?php endforeach; ?>
				<?php if ($_GET['condition'] === 'discontinued') {
					foreach ($patient_visit as $visit) {
//						var_dump($visit);
						$why_stop_medic = get_field('why_you_stop_patiet_from_this_medication__', $visit);
						if ($why_stop_medic) {
							//from - to date


							foreach ($why_stop_medic as $stopmedica) {


								if ($stopmedica['medic'] === $medic) {
									$data_of_visit_data = intval(get_the_time('Y', $visit));
									if (in_array($data_of_visit_data, $data_discont_range)) {
										$patient_discount_from_to[] = $patient->ID;
									}

									$discontinued_patient_medic[] = $patient->ID;
								}
								if ($stopmedica['whay__'] === $reason_discont) {
									$discontinued_patient_reason[] = $patient->ID;
								}


							}
						}
					}

				} ?>

			<?php endif; ?>
		<?php /*end patient*/
		endforeach; ?>
	<?php endif; ?>

	<?php
	//	$get_all_patient_ = array_merge( $the_patient, $treatment_patient_medica );
	//	$get_allpatient   = array_unique( $get_all_patient_ );
	//	var_dump(array_unique($data_discont_range));
	//	var_dump($treatment_patient_medica);

	?>

	<?php $table_patient_report = array(
		'all_patient' => array(
			'name' => 'all patient',
			'data' => $all_patent_ID
		),
		'the_patient_used_medic' => array(
			'name' => 'patient used medic',
			'data' => array_unique($the_patient)

		),
		'on_treatment' => array(
			'name' => 'On Treatment',
			'data' => array_unique($treatment_patient_medica)
		),
		'on_treatment_from' => array(
			'name' => 'on treatment From ' . $tratment_year,
			'data' => array_unique($from_treatment_patient)
		),
		'discontinued_patient' => array(
			'name' => ' discountinued Patient',
			'data' => array_unique($discontinued_patient_medic)
		),
		'discontinued_patient_reason' => array(
			'name' => ' discountinued Patient for reason',
			'data' => array_unique($discontinued_patient_reason)
		),
		'patient_from_to' => array(
			'name' => 'patient from ' . $from_discont . ' to ' . $to_discont,
			'data' => array_unique($patient_discount_from_to)
		)


	); ?>

    <div class="rep-blocks col-xs-12">
        <div class="block col-md-6 col-xs-12">
            <div class="inner">
                <div class="i-img">
                    <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                </div>
                <div class="i-data">
                    <span><?php echo count($patient_data); ?></span>
                    <h3>All Patient </h3>
                </div>
            </div>
        </div>

		<?php if ($_GET['generate_report']): ?>

			<?php if ($_GET['medic']): ?>
                <div class="block col-md-6 col-xs-12">
                    <div class="inner">
                        <div class="i-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                        </div>
                        <div class="i-data">
                            <span><?php echo count(array_unique($the_patient)); ?>
                            
                            </span>
                            <h3>Patient Used Medic</h3>
                        </div>
                    </div>
                </div>


                <div class="block col-md-6 col-xs-12">
                    <div class="inner">
                        <div class="i-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/docs.png" alt="">
                        </div>
                        <div class="i-data">

                        <span><?php echo round((count(array_unique($the_patient)) * 100) / count($patient_data)); ?>
                            %</span>
                            <h3>Patients percentage</h3>
                        </div>
                    </div>
                </div>


				<?php if ($_GET['condition'] == "treatment"): ?>
                    <div class="block col-md-6 col-xs-12">
                        <div class="inner">
                            <div class="i-img">
                                <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                            </div>
                            <div class="i-data">
                                <span><?php echo count(array_unique($treatment_patient_medica));


	                                ?>
                                
                                </span>
                                <h3>On treatment</h3>

                            </div>
                        </div>
                    </div>
					<?php if ($_GET['from_treatment']): ?>
                        <div class="block col-md-6 col-xs-12">
                            <div class="inner">
                                <div class="i-img">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                                </div>
                                <div class="i-data">
                                    <span><?php echo count(array_unique($from_treatment_patient)); ?></span>
                                    <h3>On treatment From <?php echo $_GET['from_treatment']; ?></h3>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($_GET['condition'] == "discontinued"): ?>
                    <div class="block col-md-6 col-xs-12">
                        <div class="inner">
                            <div class="i-img">
                                <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                            </div>
                            <div class="i-data">
                                <span><?php echo count(array_unique($discontinued_patient_medic)); ?></span>
                                <h3>discontinued patient</h3>
                            </div>
                        </div>
                    </div>
					<?php if ($_GET['reason_discont']): ?>
                        <div class="block col-md-6 col-xs-12">
                            <div class="inner">
                                <div class="i-img">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                                </div>
                                <div class="i-data">
                                    <span><?php echo count(array_unique($discontinued_patient_reason)); ?></span>
                                    <h3>Reason of Discontinuation</h3>
                                    <p><?php echo get_the_title(intval($_GET['reason_discont'])); ?></p>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
					<?php if ($_GET['from_discont'] || $_GET['to_discont']): ?>
                        <div class="block col-md-6 col-xs-12">
                            <div class="inner">
                                <div class="i-img">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/patient.png" alt="">
                                </div>
                                <div class="i-data">
                                    <span><?php echo count(array_unique($patient_discount_from_to)); ?></span>
                                    <h3>From To Date Patient</h3>
									<?php echo 'from : ' . $from_discont . ' To : ' . $to_discont; ?>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
    </div>

    <div class="col-xs-12">
		<?php if ($table_patient_report): ?>
            <div class="tabs">
                <div class="tabs-header">
                    <div class="border"></div>
                    <ul><?php $xa = 1;
						foreach ($table_patient_report as $patient => $val): ?>
							<?php
							$data = $val['data'];
							$name = $val['name'];

							?>
							<?php if ($data): ?>
                                <li <?php if ($patient == 'all_patient'): ?> class="active" <?php endif; ?>><a
                                            href="#tab-<?php echo $patient; ?>" tab-id="<?php echo $patient; ?>"
                                            ripple="ripple"
                                            ripple-color="#FFF"><?php echo $name; ?></a>
                                </li>
							<?php endif; ?>
							<?php $xa++; endforeach; ?>

                    </ul>
                    <nav class="tabs-nav"><i class="material-icons" id="prev" ripple="ripple"
                                             ripple-color="#FFF">&#xE314;</i><i class="material-icons" id="next"
                                                                                ripple="ripple"
                                                                                ripple-color="#FFF">&#xE315;</i></nav>
                </div>
                <div class="tabs-content" style="height: auto!important;">

					<?php $xa = 1;
					foreach ($table_patient_report as $patient => $val): ?>
						<?php
						$data = $val['data'];
						$name = $val['name'];

						?>
						<?php if ($data): ?>
                            <div class="tab  <?php if ($patient == 'all_patient'): ?> active <?php endif; ?> "
                                 tab-id="<?php echo $patient; ?>">

                                <div class="adv-table col-xs-12">
                                    <table class="table" id="data-table-th">
                                        <thead>
                                        <tr>
                                            <th>File No.</th>
                                            <th>Patient Name</th>
                                            <th>Patient Status</th>
                                            <th>Gender</th>
                                            <th>Duration (month)</th>
                                            <th>
                                                <img src="<?php bloginfo('template_directory'); ?>/images/edit.png"
                                                     alt="">
                                            </th>
                                            <th>
                                                <img src="<?php bloginfo('template_directory'); ?>/images/eye.png"
                                                     alt="">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

										<?php
										$filter1_query_arg = array(
											'post_type' => 'patient',
//											'patient_query' => 'filter1',
											'posts_per_page' => -1,
											'author__in' => array(_wp_get_current_user()->ID),
//											'facetwp' => true, // we added this

											'post__in' => $data
										);
										$filter_1query = new WP_Query($filter1_query_arg);

										//			var_dump($filter_1query);
										?>
										<?php if ($filter_1query->have_posts()):while ($filter_1query->have_posts()):$filter_1query->the_post(); ?>


											<?php if (($pat == get_field('patient__id')) && (get_field('visite_type') == 14)) {

												$datecon = get_field('date_of_consultation');
												$datetod = date("Y/m/d");
												$date1 = strtotime($datecon);
												$date2 = strtotime($datetod);

// Formulate the Difference between two dates 
												$diff = abs($date2 - $date1);


// To get the year divide the resultant date into 
// total seconds in a year (365*60*60*24) 
												$years = floor($diff / (365 * 60 * 60 * 24));

												echo $years;
												$ts1 = $date1;
												$ts2 = $date2;

												$year1 = date('Y', $ts1);
												$year2 = date('Y', $ts2);

												$month1 = date('m', $ts1);
												$month2 = date('m', $ts2);

												$diff = (($year2 - $year1) * 12) + ($month2 - $month1);

												$duration1 = $diff;
												echo 'dssd';
												echo $duration1;

// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 


											} ?>


                                            <tr>
                                                <td><?php echo get_field('file_no') ?: '0'; ?></td>
                                                <td><?php echo get_field('patient_name') ?: 'none'; ?></td>
												<?php $status = get_field('status'); ?>
                                                <td><?php echo $status['label']; ?></td>
												<?php $gender = get_field('gender'); ?>
                                                <td><?php echo $gender['label'] ?: 'empty'; ?></td><?php echo $duration1; ?>
                                                <td><?php echo get_field('duration') ?: '0'; ?></td>
                                                <td>
                                                    <a href="<?php echo home_url('admin/?edit_case=' . get_the_ID() . ''); ?>">
                                                        <img src="<?php bloginfo('template_directory'); ?>/images/edit.png"
                                                             alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo home_url('admin/?view_case=' . get_the_ID() . ''); ?>">
                                                        <img src="<?php bloginfo('template_directory'); ?>/images/eye.png"
                                                             alt="">
                                                    </a>
                                                </td>
                                            </tr>
											<?php

											$pat = get_field('patient__id');


											?>
										<?php endwhile; endif;
										wp_reset_query(); ?>


                                        </tbody>
                                    </table>
                                </div>

                            </div>
						<?php endif; ?>
						<?php $xa++; endforeach; ?>
                </div>
            </div>
		<?php endif; ?>
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
<script type="text/javascript">
    $(document).ready(function () {

        $('#the_medic').on('change', function () {
            // var medica = $('#the_medic').val();
            $('#the_condition').css('display', 'block');
        });


        $('#medic_category').on('change', function () {
            Notiflix.Loading.Standard();

            var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            var get_medic_ajax = $.post(ajaxurl, {
                action: "get_the_medic_of_category",
                category: this.value
            }, function (respone) {
                if (respone.success == true) {
                    var data_ajaxo = respone.data.option
                    var data_ajaxo_li = respone.data.li

                    $('select#the_medic option').each(function () {
                        this.remove();

                    });
                    // $('#medic_medic_top .nice-select').remove();
                    $('select#the_medic').append(data_ajaxo);

                    $('#the_medic').niceSelect('update');
                    $('#medic_medic_top').css('display', 'block');
                } else {
                    Notiflix.Report.Failure('soory no medic', '"<?php the_field('no_medic_in_category_', 'option'); ?>" <br><br>', 'Okay');
                }


                // $('#medic_medic_top .nice-select').append(data_ajaxo_li);

                console.log(data_ajaxo);
            }, 'json');

            get_medic_ajax.done(function (data) {
                // alert(data);
                Notiflix.Loading.Remove(600);

            });
            get_medic_ajax.fail(function (data) {
                alert(data);
            });
        });

        $('.the_condition').on('change', function () {
            var medic_condtion = $('.the_condition').val();
            if (medic_condtion == "treatment") {
                $('#from_treatment').css('display', 'block');
                ///
                $('#from_discont').css('display', 'none');
                $('#to_discont').css('display', 'none');
                $('#reason_discont').css('display', 'none');
            } else if (medic_condtion == "discontinued") {
                $('#from_discont').css('display', 'block');
                $('#to_discont').css('display', 'block');
                $('#reason_discont').css('display', 'block');
                ///
                $('#from_treatment').css('display', 'none');

            }


            // alert(medic_condtion);
        });
        //  var medic_category = $('#medic_category').val();
        // if (medic_category === null){
        //     $('#medic_medic_top').css('display','none');
        // }
        // $('#medic_category').on('change',function () {
        //     var medic_category = $('#medic_category').val();
        //
        //     if (medic_category === null){
        //         $('#medic_medic_top').css('display','none');
        //     }else {
        //         $('#medic_medic_top').css('display','block important');
        //     }
        // });

        // alert(medica);

    });


    $(document).ready(function () {

        // Intial Border Position
        var activePos = $('.tabs-header .active').position();

        // Change Position
        function changePos() {

            // Update Position
            activePos = $('.tabs-header .active').position();

            // Change Position & Width
            $('.border').stop().css({
                left: activePos.left,
                width: $('.tabs-header .active').width()
            });
        }

        changePos();

        // Intial Tab Height
        var tabHeight = $('.tab.active').height();

        // Animate Tab Height
        function animateTabHeight() {

            // Update Tab Height
            tabHeight = $('.tab.active').height();

            // // Animate Height
            // $('.tabs-content').stop().css({
            //     height: tabHeight + 'px'
            // });
        }

        animateTabHeight();

        // Change Tab
        function changeTab() {
            var getTabId = $('.tabs-header .active a').attr('tab-id');

            // Remove Active State
            $('.tab').stop().fadeOut(300, function () {
                // Remove Class
                $(this).removeClass('active');
            }).hide();

            $('.tab[tab-id=' + getTabId + ']').stop().fadeIn(300, function () {
                // Add Class
                $(this).addClass('active');

                // Animate Height
                animateTabHeight();
            });
        }

        // Tabs
        $('.tabs-header a').on('click', function (e) {
            e.preventDefault();

            // Tab Id
            var tabId = $(this).attr('tab-id');

            // Remove Active State
            $('.tabs-header a').stop().parent().removeClass('active');

            // Add Active State
            $(this).stop().parent().addClass('active');

            changePos();

            // Update Current Itm
            tabCurrentItem = tabItems.filter('.active');

            // Remove Active State
            $('.tab').stop().fadeOut(300, function () {
                // Remove Class
                $(this).removeClass('active');
            }).hide();

            // Add Active State
            $('.tab[tab-id="' + tabId + '"]').stop().fadeIn(300, function () {
                // Add Class
                $(this).addClass('active');

                // Animate Height
                animateTabHeight();
            });
        });

        // Tab Items
        var tabItems = $('.tabs-header ul li');

        // Tab Current Item
        var tabCurrentItem = tabItems.filter('.active');

        // Next Button
        $('#next').on('click', function (e) {
            e.preventDefault();

            var nextItem = tabCurrentItem.next();

            tabCurrentItem.removeClass('active');

            if (nextItem.length) {
                tabCurrentItem = nextItem.addClass('active');
            } else {
                tabCurrentItem = tabItems.first().addClass('active');
            }

            changePos();
            changeTab();
        });

        // Prev Button
        $('#prev').on('click', function (e) {
            e.preventDefault();

            var prevItem = tabCurrentItem.prev();

            tabCurrentItem.removeClass('active');

            if (prevItem.length) {
                tabCurrentItem = prevItem.addClass('active');
            } else {
                tabCurrentItem = tabItems.last().addClass('active');
            }

            changePos();
            changeTab();
        });

        // Ripple
        $('[ripple]').on('click', function (e) {
            var rippleDiv = $('<div class="ripple" />'),
                rippleOffset = $(this).offset(),
                rippleY = e.pageY - rippleOffset.top,
                rippleX = e.pageX - rippleOffset.left,
                ripple = $('.ripple');

            rippleDiv.css({
                top: rippleY - (ripple.height() / 2),
                left: rippleX - (ripple.width() / 2),
                background: $(this).attr("ripple-color")
            }).appendTo($(this));

            window.setTimeout(function () {
                rippleDiv.remove();
            }, 1500);
        });
        $('.tabs-content').css('height', 'auto');
        $('.tabs-header a').on('click', function () {
            $('.tabs-content').css('height', 'auto');

        });
    });
</script>