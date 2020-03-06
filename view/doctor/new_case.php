<?php if ($_GET['new_case'] == 1): ?>
    <div class="content-top col-xs-12">
        <div class="logo-co">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
            <div class="co-head">
                <h3>
                    add
                    <span>new case a</span>
                </h3>
            </div>
        </div>
        <div class="co-extra">
            <a href="<?php home_url('admin/?reports=1'); ?>" class="btn">reports</a>
        </div>
    </div>


<?php
$doctor_id = _wp_get_current_user();
$doctor_name = get_field('doctor_name','user_'.$doctor_id->ID);
$doctor_clinc = get_field('doctor_clinc','user_'.$doctor_id->ID);

?>
    <div class="case-head col-xs-12">
        <h3>Patient Details</h3>
        <ul class="nav-tabs">
            <li class="active">
                <a href="#" data-toggle="tab" data-target="#t1"></a>
            </li>
            <li class="disabled">
                <a href="#" data-toggle="tab" data-target="#t2"></a>
            </li>
            <li class="disabled">
                <a href="#" data-toggle="tab" data-target="#t3"></a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="t1">
            <div class="t-top col-xs-12">
                <div class="t-pic">
                    <label>
                        <img src="<?php bloginfo('template_directory'); ?>/images/upload-oic.png" alt=""
                             class="up-icon">
                        <input type="hidden" value="0" name="post_id" id="post_id">
                        <input type="file" name="profile_img" id="profile_img"
                               onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <img src="" id="blah">
                    </label>
                </div>
                <div class="t-btns">
                    <!--                        <button type="reset" class="btn btn-danger remove_paint">Discard</button>-->
                    <!--                        <button type="reset" class="btn">Save as draft</button>-->
                </div>
            </div>
            <div class="t-bottom col-xs-12">
                <form action="#" id="frist_step">
                    <div class="f-item col-md-4 col-xs-12">
                        <div class="f-head col-xs-12">
                            <h3>Personal Information</h3>
                        </div>
                        <div class="form-group" data-required="1">

                            <input type="text" name="patient_name" class="form-control" placeholder="Patient Name *"
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="saudi_id" class="form-control" placeholder="Saudi ID">
                        </div>
                        <div class="form-group">
                            <input type="text" name="iqama_number" class="form-control" placeholder="Iqama Number">
                        </div>
                        <div class="form-group">
                            <input name="file_no" type="text" class="form-control" placeholder="File Number *" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="doctor_name" class="form-control"  value="<?php echo $doctor_name; ?>" placeholder="Doctor Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="cilinic_name" class="form-control" value="<?php echo $doctor_clinc; ?>"
                                   placeholder="Hospital/Clinic Name">
                        </div>
                        <div class="form-group">
                            <h4 class="gender">Gender</h4>
                            <label>
                                <input type="radio" value="0" name="gender">
                                <span>Male</span>
                            </label>
                            <label>
                                <input type="radio" value="1" name="gender">
                                <span>Female</span>
                            </label>
                        </div>

                        <!-- <div class="form-group">
							 <input name="hospitalclinic_id" type="text" class="form-control"
									placeholder="Hospital/Clinic ID">
						 </div> -->
                        <!--<div class="form-group">
                            <input type="text" name="nationalty" class="form-control" placeholder="Nationality">
                        </div> -->
                        <!-- <div class="form-group">
							 <input type="text" name="helth_card_number_" class="form-control"
									placeholder="HEalth Card Number">
						 </div>-->

                        <div class="form-group">
                            <input type="text" name="birth_date" class="form-control" placeholder="Date of Birth *"
                                   id="ev-date" required>
                        </div>

                        <div class="form-group">
                            <h4>Smoking status</h4>
                            <label>
                                <input type="radio" name="smooker" value="1">
                                <span>Current smoker</span>
                            </label>
                            <label>
                                <input type="radio" name="smooker" value="2">
                                <span>Ex-smoker</span>
                            </label>
                            <label>
                                <input type="radio" name="smooker" value="3">
                                <span>Never smoked</span>
                            </label>
                        </div>

                    </div>
                    <div class="f-item col-md-8 col-xs-12">
                        <div class="f-head col-xs-12">
                            <h3>Contact Information</h3>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select class="form-control" name="country_" data-error="Nationality">
                                <option selected disabled>Nationality *</option>
								<?php
								$country = new WP_Query(array('post_type' => 'country', 'posts_per_page' => -1)); ?>
								<?php if ($country->have_posts()): while ($country->have_posts()):$country->the_post(); ?>
                                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>

								<?php endwhile; endif;
								wp_reset_query(); ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select class="form-control" name="city">
                                <option selected disabled>City of residence</option>
								<?php
								$city = new WP_Query(array('post_type' => 'city', 'posts_per_page' => -1)); ?>
								<?php if ($city->have_posts()): while ($city->have_posts()):$city->the_post(); ?>
                                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>

								<?php endwhile; endif;
								wp_reset_query(); ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <input type="text" name="mobile_number" class="form-control"
                                   placeholder="Mobile Number *">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <input type="email" name="email_" class="form-control" placeholder="Email Address">
                        </div>
                        <!--<div class="form-group col-md-6 col-xs-12">
                            <input type="text" name="land_line_number_" class="form-control"
                                   placeholder="Landline Number">
                        </div> -->
                        <!-- <div class="form-group col-xs-12">
							 <input type="text" name="adress" class="form-control" placeholder="Addres">
						 </div>-->


                        <!-- <div class="form-group col-md-6 col-xs-12">
							 <input type="text" name="zip_code" class="form-control" placeholder="Zip Code">
						 </div>-->

                        <!--   <div class="f-head col-xs-12" style="margin-top: 45px;">
							   <h3>Credit/Debit Card Details</h3>
						   </div>
						   <div class="form-group col-md-6 col-xs-12">
							   <input type="text" name="card_holder" class="form-control" placeholder="CARD HOLDER">
						   </div>
						   <div class="form-group col-md-6 col-xs-12">
							   <input type="text" name="card_number" class="form-control" placeholder="CARD NUMBER">
						   </div>
						   <div class="form-group col-md-6 col-xs-12">
							   <input type="text" name="expire_date_for_card" class="form-control"
									  placeholder="Expiray Date" id="ev-date1">
						   </div>
						   <div class="form-group col-md-6 col-xs-12">
							   <input name="cvs" type="text" class="form-control" placeholder="CVS">
						   </div> -->
                        <div class="f-head col-xs-12" style="margin-top: 70px;">
                            <h3>Work & Education</h3>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select class="form-control" name="occupation" data-error="Occupation">
                                <option selected disabled>Occupation *</option>
								<?php
								$Occupation = new WP_Query(array('post_type' => 'occupation', 'posts_per_page' => -1)); ?>
								<?php if ($country->have_posts()): while ($Occupation->have_posts()):$Occupation->the_post(); ?>
                                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>

								<?php endwhile; endif;
								wp_reset_query(); ?>

                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select class="form-control" name="education_level">
                                <option selected disabled>Education Level</option>
								<?php
								$Education = new WP_Query(array('post_type' => 'education_level', 'posts_per_page' => -1)); ?>
								<?php if ($Education->have_posts()): while ($Education->have_posts()):$Education->the_post(); ?>
                                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
								<?php endwhile; endif;
								wp_reset_query(); ?>

                            </select>
                        </div>
                    </div>
                    <div class="f-item col-md-12 col-xs-12" id="hover_error">
                        <button type="button" id="frist_step_do" class="btn save next-step">Continue</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="t2">
            <div class="t-top col-xs-12">
                <div class="f-head">
                    <h3>Referal & Family History</h3>
                </div>
                <div class="t-btns">
                    <button type="reset" class="btn btn-danger remove_paint">Discard</button>
                    <button type="reset" class="btn save_draft">Save as draft</button>
                </div>
            </div>
            <div class="t-bottom col-xs-12">
                <form id="step_2form" action="#">
                    <div class="f-item col-md-8 col-xs-12">
                        <div class="form-group col-md-6 col-xs-12">


                            <h5>Duration of First Joint Symptoms before seeking medical advice <span class="acf-required">*</span></h5>
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="first_joint_symptoms" value="2">
                                        <span>Less than 3 months</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="first_joint_symptoms" value="3">
                                        <span>3-5 months</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="first_joint_symptoms" value="4">
                                        <span>6-11 months</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="first_joint_symptoms" value="5">
                                        <span>12-23 months</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="first_joint_symptoms" value="6">
                                        <span>24-35 months</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="first_joint_symptoms" value="7">
                                        <span>More than 35 months</span>
                                    </label>
                                </li>
                                
                            </ul>

                            <div>
                                <br/>
                               <!-- <h5>Were these symptoms initially palindromi</h5>

                                <label>
                                    <input type="radio" name="were_these_symptoms_initially_palindromic" value="1">
                                    <span>Yes</span>
                                </label>

                                <label>
                                    <input type="radio" name="were_these_symptoms_initially_palindromic" value="0">
                                    <span>No</span>
                                </label>
                                <br/> --> <br/>
                                <div> 
                                    <h5>Is the patient medically insured</h5>
                                    <label>
                                        <input type="radio" name="medical_insurance" value="1">
                                        <span>yes</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="medical_insurance" value="0">
                                        <span>no</span>
                                    </label>
                                </div>
                                <br/>
                                <div>


                                    <h5>Number healthcare provider visit prior to rheumatology clinic referral</h5>
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="1">
                                                <span>1</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="2">
                                                <span>2</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="3">
                                                <span>3</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="4">
                                                <span>More than 3</span>
                                            </label>
                                        </li>


                                    </ul>

                                </div>
                                <br />
                                  <div>
                            <h5>Family history of autoimmune disease </h5>
                            <ul>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="1">
                                <span>Rheumatoid Arthritis</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="2">
                                <span>SLE</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="3">
                                <span>Sjogren</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="4">
                                <span>Scleroderma</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="5">
                                <span>Psoriasis</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="6">
                                <span>Ankylosing Spondyloarthritis</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="7">
                                <span>Other</span>
                            </label></li>
                          
                            </ul>
                        </div>
                            </div>


                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Age at presentation</h5>
                            <input type="text" class="form-control"
                                   name="age_of_presentation ">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Date of the first Rheumatologist visit</h5>
                            <input type="text" class="form-control"
                                   name="date_of_the_first_presentation_to_rheumatologist" id="ev-date2">
                        </div>
                       

                        <!--<div class="form-group col-md-6 col-xs-12">
                            <h5>Date of first persistent patient reported joint pain</h5>
                            <input type="text" class="form-control" data-error="Date of first persistent patient"
                                   name="date_of_first_persistent_patient_reported_joint_pain"
                                   id="ev-date4">
                        </div>
                        -->
                        <div class="form-group col-md-6 col-xs-12">


                            <h5>Source of referral</h5>
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="initial_referral_to_rheumatologist_from" value="1">
                                        <span>Family physician</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="initial_referral_to_rheumatologist_from" value="2">
                                        <span>Orthopedic</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="initial_referral_to_rheumatologist_from" value="3">
                                        <span>Internist</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="initial_referral_to_rheumatologist_from" value="4">
                                        <span>Dermalogist</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="initial_referral_to_rheumatologist_from" value="5">
                                        <span>Other</span>
                                    </label>
                                </li>

                            </ul>

                        </div>
 <div class="form-group col-md-6 col-xs-12">
                            <h5>Date of referral <span class="acf-required">*</span></h5>
                            <input type="text" data-error="Date of referral" class="form-control" name="date_of_referal"
                                   id="ev-date3">
                        </div>

                        <!--<div class="form-group col-md-6 col-xs-12">
                            <input type="text" class="form-control" name="early_symptopms"
                                   placeholder="Early Symptopms"
                                   value="Early Symptopms">
                        </div> -->

                        <!-- <div class="form-group col-md-6 col-xs-12">
							 <input type="text" class="form-control" placeholder="Initial Refering by GP"
									name="initial_refering_by_gp">
						 </div>
						 <div class="form-group col-md-6 col-xs-12">
							 <input type="text" class="form-control" placeholder="Number of Visits"
									name="number_of_visits">
						 </div> -->

                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Family History of Rheumatoid Arthritis</h5>
                            <label>
                                <input type="radio" name="family_history_of_arthritis" value="1">
                                <span>yes</span>
                            </label>
                            <label>
                                <input type="radio" name="family_history_of_arthritis" value="0">
                                <span>no</span>
                            </label>
                        </div>
                      
                        <div class="upload-items">
                            <h5>Medical Reports</h5>
                            <br/>
                            <button type="button" class="up-btn">
                                <img src="<?php bloginfo('template_directory'); ?>/images/paperclip.png" alt="">
                                <input type="file" name="file_x1" id="file_id1">
                            </button>
                            <button type="button" class="up-btn">
                                <img src="<?php bloginfo('template_directory'); ?>/images/paperclip.png" alt="">
                                <input type="file" name="file_x2" id="file_id2">
                            </button>
                            <button type="button" class="up-btn">
                                <img src="<?php bloginfo('template_directory'); ?>/images/paperclip.png" alt="">
                                <input type="file" name="file_x3" id="file_id3">
                            </button>
                            <button type="button" class="up-btn">
                                <img src="<?php bloginfo('template_directory'); ?>/images/paperclip.png" alt="">
                                <input type="file" name="file_x4" id="file_id4">
                            </button>
                            <br/>
                        </div>
                        <br/>
                        <!-- <div class="form-group col-md-6 col-xs-12">
							 <h4>Previous Specialist</h4>
							 <label>
								 <input type="radio" name="previous_specialist" value="1">
								 <span>yes</span>
							 </label>
							 <label>
								 <input type="radio" value="0" name="previous_specialist" checked>
								 <span>no</span>
							 </label>
						 </div> -->

                        <!--<div class="form-group col-md-6 col-xs-12">
                            <h4>Malignancy</h4>
                            <label>
                                <input type="radio" name="malignancy" value="1">
                                <span>yes</span>
                            </label>
                            <label>
                                <input type="radio" name="malignancy" value="0" checked>
                                <span>no</span>
                            </label>
                        </div> -->

                        <!-- <div class="f-head col-xs-12">
                            <h3>General Inforamtion</h3>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <select class="form-control" name="blood_group">
                                <option selected disabled>Blood Group</option>

								<?php
						$blood_group = new WP_Query(array('post_type' => 'blood_group', 'posts_per_page' => -1)); ?>
								<?php if ($blood_group->have_posts()): while ($blood_group->have_posts()):$blood_group->the_post(); ?>
                                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>

								<?php endwhile; endif;
						wp_reset_query(); ?>

                            </select>

                          
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Body Mass (BMI)</h5>
                            <div class="form-i col-md-6 col-xs-12">
                                <input type="number" id="weight_in_kg" class="form-control" name="weight_in_kg"
                                       placeholder="Weight in KG">
                            </div>
                            <div class="form-i col-md-6 col-xs-12">
                                <input type="number" class="form-control" id="height_in_cm" name="height_in_cm"
                                       placeholder="Height in CM">
                            </div>
                            <div class="form-i col-md-12 col-xs-12">
                                <button type="button" id="calculate_bmx" onclick="calculate_bmx()" class="btn save">
                                    Calculate (BMI)
                                </button>
                            </div>
                        </div>-->
                        <hr>
                    </div>
                    <div class="f-item col-md-4 col-xs-12">
                        <div class="com-item col-xs-12">
                            <div class="inner">
                                <div class="co-head">
                                    <h4>Comorbidities</h4>
                                    <a class="add-com">add new</a>
                                </div>
                                <div class="co-body">
                                    <ul id="all_omorbidities">
										<?php
										$comorbidities = new WP_Query(array('post_type' => 'comorbidities', 'posts_per_page' => -1)); ?>
										<?php if ($comorbidities->have_posts()): while ($comorbidities->have_posts()):$comorbidities->the_post(); ?>
                                            <li>
                                                <label>
                                                    <input type="checkbox" class="comorbidities"
                                                           value="<?php echo get_the_ID(); ?>"
                                                           name="comorbidities[]">
                                                    <span><?php the_title(); ?></span>
                                                </label>
                                            </li>
										<?php endwhile; endif;
										wp_reset_query(); ?>


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="f-item col-md-12 col-xs-12">
                        <div class="f-head col-xs-12">
                            <h3>Initial Symptoms</h3> <br />
                        </div>
                      
                     <div class="col-md-12 col-xs-12">
                        <div class="form-group col-md-6 col-xs-12">
                            <div class="sm-item col-xs-12">
                                <h5>Morning Stifness <span class="acf-required">*</span></h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="morning_stifness" value="1">
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="morning_stifness" value="0">
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="sm-item col-xs-12">
                                <div class="morning_yes_div hidden">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="radio" name="morning_stiffness_duration" value="2">
                                                    <span>15-29 minutes</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="morning_stiffness_duration" value="3">
                                                    <span>30-60 minutes</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="morning_stiffness_duration" value="4">
                                                    <span>more than 60 minutes</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sm-item col-xs-12">

								<?php
								$morning_stifness = get_field("morning_stifness");

								if ($morning_stifness == 1) { ?>

                                    <h5>Morning Stifness Duration</h5>
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="radio" name="morning_stiffness_duration" value="1">
                                                <span>30 minutes</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="morning_stiffness_duration" value="2">
                                                <span>1 hour</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="morning_stiffness_duration" value="3">
                                                <span>More than 1 hour</span>
                                            </label>
                                        </li>
                                    </ul>

									<?php

								}
								?>


                            </div>
                            <div class="sm-item col-xs-12">
                                <h5>Joint Pain <span class="acf-required">*</span></h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_pain" value="1">
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_pain" value="0">
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12">
                                <div class="joint_pain_yes_div hidden">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <!--                                        <h5>Duration of First Joint Symptoms before seeking medical advice <span class="acf-required">*</span></h5>-->
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_pain_yes" value="1">
                                                    <span>1</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_pain_yes" value="2">
                                                    <span>2</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_pain_yes" value="3">
                                                    <span>3</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_pain_yes" value="4">
                                                    <span>4</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_pain_yes" value="5">
                                                    <span>More than 4</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            	</div>
                        <div class="form-group col-md-6 col-xs-12">
                            <div class="sm-item col-xs-12">
                                <h5>Joint Swelling <span class="acf-required">*</span></h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_swelling" value="1">
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_swelling" value="0">
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12">
                                <div class="joint_swelling_yes_div hidden">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <!--                                        <h5>Duration of First Joint Symptoms before seeking medical advice <span class="acf-required">*</span></h5>-->
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_swelling_yes" value="1">
                                                    <span>1</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_swelling_yes" value="2">
                                                    <span>2</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_swelling_yes" value="3">
                                                    <span>3</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_swelling_yes" value="4">
                                                    <span>4</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="joint_swelling_yes" value="5">
                                                    <span>More than 4</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sm-item col-xs-12">
                                <h5>Malignancy <span class="acf-required">*</span></h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="malignancy" value="1" required>
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="malignancy" value="0">
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12">
                                <div class="malignancy_-_yes_div hidden">
                                    <div class="form-group col-md-6 col-xs-12">
                                        <!--                                        <h5>Duration of First Joint Symptoms before seeking medical advice <span class="acf-required">*</span></h5>-->
                                        <ul>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="1">
                                                    <span>Lymphoma</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="2">
                                                    <span>Leukemia</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="3">
                                                    <span>Melanoma</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="4">
                                                    <span>Skin Cancer</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="5">
                                                    <span>Lung</span>
                                                </label>
                                            </li>
                                                <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="6">
                                                    <span>Breast</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="7">
                                                    <span>Thyroid</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="8">
                                                    <span>Colon</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="9">
                                                    <span>Ovarian</span>
                                                </label>
                                            </li>
                                                <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="10">
                                                    <span>Testis</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="11">
                                                    <span>Brain</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="radio" name="malignancy_-_yes" value="12">
                                                    <span>Other</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="sm-item col-xs-12">
								  <h5>History of inflamatory low backpain</h5>
								 <ul>
									 <li>
										 <label>
											 <input type="radio" name="history_of_inflamatory_low_backpain"
													value="1">
											 <span>yes</span>
										 </label>
									 </li>
									 <li>
										 <label>
											 <input type="radio" name="history_of_inflamatory_low_backpain"
													value="0">
											 <span>no</span>
										 </label>
									 </li>
								 </ul>
							 </div> -->


                            <!--    <ul>
									<li>
										<label>
											<input type="radio" value="1" name="does_the_patient_any_of_these_symptoms"
												   checked>
											<span>Joint pain</span>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" value="2" name="does_the_patient_any_of_these_symptoms">
											<span> Joint pain & stifness </span>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" value="3" name="does_the_patient_any_of_these_symptoms">
											<span>Joint pain, stifness, swelling.</span>
										</label>
									</li>
									<li>
										<label>
											<input type="radio" value="4" name="does_the_patient_any_of_these_symptoms">
											<span>Join Stifness, swilling without pain</span>
										</label>
									</li>
								</ul> -->
				 
                        </div>
                    </div>
                
                        <!--  <div class="form-group col-md-4 col-xs-12">
							  <h5>These symptoms are:</h5>
							  <ul>
								  <li>
									  <label>
										  <input type="radio" name="these_symptoms_are" value="1" checked>
										  <span>Less than 6 weeks</span>
									  </label>
								  </li>
								  <li>
									  <label>
										  <input type="radio" name="these_symptoms_are" value="2">
										  <span>+6 weks but les than 3 months</span>
									  </label>
								  </li>
								  <li>
									  <label>
										  <input type="radio" name="these_symptoms_are" value="3">
										  <span>+3 months but less than 6 months</span>
									  </label>
								  </li>
								  <li>
									  <label>
										  <input type="radio" name="these_symptoms_are" value="4">
										  <span>+6 months</span>
									  </label>
								  </li>
							  </ul>
						  </div> -->

                    </div>
                    <div class="f-item col-md-12 col-xs-12" id="hover_error2">
                        <button type="button" id="step_2" class="btn save next-step">Save & Continue</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="t3">
            <div class="t-top col-xs-12">
                <div class="f-head">
                    <h3>Initial Examination</h3>
                </div>
                <div class="t-btns">
                    <button type="reset" class="btn btn-danger remove_paint">Discard</button>
                    <button type="reset" class="btn save_draft">Save as draft</button>
                </div>
            </div>
            <div class="t-bottom col-xs-12">
                <form action="#" id="form_step_3">
                    <div class="f-item col-md-8 col-xs-12">
                        <!--  <div class="form-group col-md-6 col-xs-12">
                            <input type="text" class="form-control" name="date_of_first_examination"
                                   placeholder="Date of first examination"
                                   id="ev-date5">
                            <img src="<?php bloginfo('template_directory'); ?>/images/calendar.png" alt=""
                                 class="calendar">
                        </div> -->
                        <div class="form-group col-md-6 col-xs-12">
                            <h4>Squeeze Test</h4>
                            <ul>
                                <label>
                                    <input type="radio" name="squeeze_test" value="1">
                                    <span>Positive</span>
                                </label>
                                <label>
                                    <input type="radio" name="squeeze_test" value="0">
                                    <span>Negative</span>
                                </label>
                                 <label>
                                    <input type="radio" name="squeeze_test" value="2">
                                    <span>Not Done</span>
                                </label>
                            </ul>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h4>Swelling </h4>
                            <ul>
                                <label>
                                    <input type="radio" name="swelling" value="1">
                                    <span>positive</span>
                                </label>
                                <label>
                                    <input type="radio" name="swelling" value="0">
                                    <span>Negative</span>
                                </label>
                                   <label>
                                    <input type="radio" name="swelling" value="2">
                                    <span>Not Done</span>
                                </label>
                            </ul>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h4>Tendernes</h4>
                            <ul>
                                <label>
                                    <input type="radio" name="tendernes" value="1">
                                    <span>Positive</span>
                                </label>
                                <label>
                                    <input type="radio" name="tendernes" value="0">
                                    <span>Negative</span>
                                </label>
                                 <label>
                                    <input type="radio" name="tendernes" value="2">
                                    <span>Not Done</span>
                                </label>
                            </ul>
                        </div>
                        
                        
                                
                      
                     
                        <div class="form-group hum-wrap col-xs-12">
                            <h5>Mark the swollen joints on mannequin</h5>
                            <div class="has-hum">


                                <div class="hors">
                                    <label class="bot bot1">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="1">
                                        <span></span>
                                    </label>
                                    <label class="bot bot2">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="2">
                                        <span></span>
                                    </label>
                                    <label class="bot bot3">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="3">
                                        <span></span>
                                    </label>
                                    <label class="bot bot4">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="4">
                                        <span></span>
                                    </label>
                                    <label class="bot bot5">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="5">
                                        <span></span>
                                    </label>
                                    <label class="bot bot6">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="6">
                                        <span></span>
                                    </label>
                                    <label class="bot bot7">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="7">
                                        <span></span>
                                    </label>
                                    <label class="bot bot8">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="8">
                                        <span></span>
                                    </label>
                                    <label class="bot bot9">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="9">
                                        <span></span>
                                    </label>
                                    <label class="bot bot10">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="10">
                                        <span></span>
                                    </label>
                                    <label class="bot bot11">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="11">
                                        <span></span>
                                    </label>
                                    <label class="bot bot12">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="12">
                                        <span></span>
                                    </label>
                                    <label class="bot bot13">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="13">
                                        <span></span>
                                    </label>
                                    <label class="bot bot14">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="14">
                                        <span></span>
                                    </label>
                                    <label class="bot bot15">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="15">
                                        <span></span>
                                    </label>
                                    <label class="bot bot16">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="16">
                                        <span></span>
                                    </label>
                                    <label class="bot bot17">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="17">
                                        <span></span>
                                    </label>
                                    <label class="bot bot18">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="18">
                                        <span></span>
                                    </label>
                                    <label class="bot bot19">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="19">
                                        <span></span>
                                    </label>
                                    <label class="bot bot20">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="20">
                                        <span></span>
                                    </label>
                                    <label class="bot bot21">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="21">
                                        <span></span>
                                    </label>
                                    <label class="bot bot22">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="22">
                                        <span></span>
                                    </label>
                                    <label class="bot bot23">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="23">
                                        <span></span>
                                    </label>
                                    <label class="bot bot24">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="24">
                                        <span></span>
                                    </label>
                                    <label class="bot bot25">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="25">
                                        <span></span>
                                    </label>
                                    <label class="bot bot26">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="26">
                                        <span></span>
                                    </label>
                                    <label class="bot bot27">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="27">
                                        <span></span>
                                    </label>
                                    <label class="bot bot28">
                                        <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="28">
                                        <span></span>
                                    </label>
                                </div>
                                <img src="<?php bloginfo('template_directory'); ?>/images/horl.png" alt=""
                                     class="human">
                            </div>
                        </div>
                        <div class="form-group hum-wrap2 col-xs-12">
                            <h5>Mark the tender joints on mannequin</h5>
                            <div class="has-hum">
                                <div class="hors">
                                    <label class="bot bot1">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="1">
                                        <span></span>
                                    </label>
                                    <label class="bot bot2">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="2">
                                        <span></span>
                                    </label>
                                    <label class="bot bot3">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="3">
                                        <span></span>
                                    </label>
                                    <label class="bot bot4">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="4">
                                        <span></span>
                                    </label>
                                    <label class="bot bot5">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="5">
                                        <span></span>
                                    </label>
                                    <label class="bot bot6">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="6">
                                        <span></span>
                                    </label>
                                    <label class="bot bot7">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="7">
                                        <span></span>
                                    </label>
                                    <label class="bot bot8">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="8">
                                        <span></span>
                                    </label>
                                    <label class="bot bot9">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="9">
                                        <span></span>
                                    </label>
                                    <label class="bot bot10">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="10">
                                        <span></span>
                                    </label>
                                    <label class="bot bot11">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="11">
                                        <span></span>
                                    </label>
                                    <label class="bot bot12">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="12">
                                        <span></span>
                                    </label>
                                    <label class="bot bot13">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="13">
                                        <span></span>
                                    </label>
                                    <label class="bot bot14">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="14">
                                        <span></span>
                                    </label>
                                    <label class="bot bot15">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="15">
                                        <span></span>
                                    </label>
                                    <label class="bot bot16">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="16">
                                        <span></span>
                                    </label>
                                    <label class="bot bot17">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="17">
                                        <span></span>
                                    </label>
                                    <label class="bot bot18">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="18">
                                        <span></span>
                                    </label>
                                    <label class="bot bot19">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="19">
                                        <span></span>
                                    </label>
                                    <label class="bot bot20">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="20">
                                        <span></span>
                                    </label>
                                    <label class="bot bot21">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="21">
                                        <span></span>
                                    </label>
                                    <label class="bot bot22">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="22">
                                        <span></span>
                                    </label>
                                    <label class="bot bot23">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="23">
                                        <span></span>
                                    </label>
                                    <label class="bot bot24">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="24">
                                        <span></span>
                                    </label>
                                    <label class="bot bot25">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="25">
                                        <span></span>
                                    </label>
                                    <label class="bot bot26">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="26">
                                        <span></span>
                                    </label>
                                    <label class="bot bot27">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="27">
                                        <span></span>
                                    </label>
                                    <label class="bot bot28">
                                        <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="28">
                                        <span></span>
                                    </label>
                                </div>
                                <img src="<?php bloginfo('template_directory'); ?>/images/horl.png" alt=""
                                     class="human">
                            </div>
                        </div>
                        <hr>

                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Body Mass (BMI)</h5>
                            <div class="form-i col-md-6 col-xs-12">
                                <input type="number" id="weight_in_kg" class="form-control" name="weight_in_kg"
                                       placeholder="Weight in KG">
                            </div>
                            <div class="form-i col-md-6 col-xs-12">
                                <input type="number" class="form-control" id="height_in_cm" name="height_in_cm"
                                       placeholder="Height in CM">
                            </div>
                            <div class="form-i col-md-12 col-xs-12">
                                <button type="button" id="calculate_bmx" onclick="calculate_bmx()" class="btn save">
                                    Calculate (BMI)
                                </button>
                            </div>
                        </div>
                        <hr>

                    </div>
                    <div class="f-item col-md-4 col-xs-12">
                        <div class="com-item col-xs-12">
                            <div class="inner">
                                <div class="co-head">
                                    <h4>Current Medication</h4>
                                </div>
                                <div class="co-body">
                                    <form id="add_previous">
                                        <select class="form-control" id="category_medical" name="category_medical"
                                                style="display: none">
                                            <option selected disabled>Category</option>
											<?php
											$category_mediacl = get_terms('medication_category', array(
												'hide_empty' => false,
											)); ?>
											<?php if ($category_mediacl): ?>
												<?php foreach ($category_mediacl as $cata): ?>
                                                    <option value="<?php echo $cata->term_id; ?>"><?php echo $cata->name; ?></option>
												<?php endforeach; ?>
											<?php endif; ?>
                                        </select>


                                        <select class="form-control" name="the_medical" id="the_medical">
                                            <option selected disabled>Medication</option>
											<?php
											$Medication = new WP_Query(array('post_type' => 'medication', 'posts_per_page' => -1)); ?>
											<?php if ($Medication->have_posts()): while ($Medication->have_posts()):$Medication->the_post(); ?>
                                                <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>

											<?php endwhile; endif;
											wp_reset_query(); ?>

                                        </select>
                                        <!--<input type="text" class="form-control" id="dose" placeholder="Dose"
                                               name="dose">
                                        <input type="text" id="dosage_form" class="form-control"
                                               placeholder="Dosage Form"
                                               name="dosage_form">
                                        <input type="text" id="recommendations" class="form-control"
                                               placeholder="Recommendations"
                                               name="recommendations">
                                        <input type="text" id="comments_previous_medc" class="form-control"
                                               placeholder="Comments" name="comments">-->
                                        <button type="button" class="btn" id="previous_medication">add</button>
                                        <div class="add_medical_here">

                                        </div>
                                    </form>
                                    <ul id="accordion" class="accordion maxmax_inner_prev" style="display: none">


                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="f-item col-md-12 col-xs-12">
                        <div class="f-head col-xs-12">
                            <h3>Investigation</h3>
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                     <div class="sm-item">
                            <h4>RF serology</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="rf_serology" value="1" checked>
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rf_serology" value="0">
                                        <span>Negative</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="rf_serology" value="2">
                                        <span>Not done</span>
                                    </label>
                                </ul>
                            </div>
                            
                            <div class="sm-item">
                                <h4>Anti-CCP</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="anti-ccp" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="anti-ccp" value="0">
                                        <span>Negative</span>
                                    </label>
                                      <label>
                                        <input type="radio" name="anti-ccp" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                            <div class="sm-item">
                                <h4>ANA</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="ana" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="ana" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                     <input type="radio" name="ana" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                             <div class="sm-item">
                                <h4>Anti-SSA</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="anti-ssa" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="anti-ssa" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                     <input type="radio" name="anti-ssa" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                              <div class="sm-item">
                                <h4>Anti-SSB</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="anti-ssb" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="anti-ssb" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                     <input type="radio" name="anti-ssb" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>

                        </div>
                        <div class="form-group col-md-4 col-xs-12">



                            <div class="sm-item">
                                <h4>APA</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="apa" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="apa" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                        <input type="radio" name="apa" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                            <div class="sm-item">
                                <h4>Quantiferon/TB gold</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="quantiferontb_gold" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="quantiferontb_gold" value="0">
                                        <span>Negative</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="quantiferontb_gold" value="2">
                                        <span>Indetermined</span>
                                    </label>
                                </ul>
                            </div>
                        <div class="sm-item">
                                <h4>HBsAg</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hepatitis_b" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hepatitis_b" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                        <input type="radio" name="hepatitis_b" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>

                             <div class="sm-item">
                                <h4>HBsAb</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hbsab" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hbsab" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                        <input type="radio" name="hbsab" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                            <div class="sm-item">
                                <h4>HBcAb</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hbcab" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hbcab" value="0">
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                        <input type="radio" name="hbcab" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>

                        </div>
                        <div class="form-group col-md-4 col-xs-12">



                            <div class="sm-item">
                                <h4>HCVAb</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hepatitis_c" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hepatitis_c" value="0">
                                        <span>Negative</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hepatitis_c" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                              <div class="sm-item">
                                <h4>LFT</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="lft_" value="1">
                                        <span>Normal</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="lft_" value="0">
                                        <span>Abnormal</span>
                                    </label>

                                </ul>
                            </div>
                             <div class="sm-item">
                                <h4>Renal function</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="renal_function_" value="1">
                                        <span>Normal</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="renal_function_" value="0">
                                        <span>Abnormal</span>
                                    </label>

                                </ul>
                            </div>
                             <div class="sm-item">
                             <h4>Hemoglobin level g/dl</h4>
                                 <input type="text" class="form-control" name="hemoglobin_level_gdl">

                            </div>
                            <div class="sm-item">
                                <h4>HIV</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hiv" value="1">
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hiv" value="0">
                                        <span>Negative</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hiv" value="2">
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                            <!-- <select class="form-control" name="initial_diagnosis">
                                <option selected disabled>Initial Diagnosis</option>

								<?php
							$initial_diagnosis = new WP_Query(array('post_type' => 'initial_diagnosis', 'posts_per_page' => -1)); ?>
								<?php if ($initial_diagnosis->have_posts()): while ($initial_diagnosis->have_posts()):$initial_diagnosis->the_post(); ?>
                                    <option value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>

								<?php endwhile; endif;
							wp_reset_query(); ?>

                            </select> -->
                        </div>
                        <div class="form-group col-md-12 col-xs-12">
                            <div class="f-head col-xs-12">
                                <h3>Additional Notes</h3>
                            </div>
                            <textarea class="form-control" data-error="Additional Notes" name="additional_notes"
                                      data-error="Additional Notes"></textarea>
                        </div>
                    </div>

                    <div class="f-item col-md-12 col-xs-12" id="hover_error3">
                        <button type="submit" id="step_3" class="btn save">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif; ?>
