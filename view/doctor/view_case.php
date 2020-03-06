<?php if ($_GET['view_case']): ?>

	<div class="content-top col-xs-12">
		<div class="logo-co">
			<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
			<div class="co-head">
				<h3>
					Edit
					<span> case </span>
				</h3>
			</div>
		</div>
		<div class="co-extra">
			<a href="<?php home_url('admin/?reports=1'); ?>" class="btn">reports</a>
		</div>
	</div>
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


						<?php
						$post_id = intval($_GET['view_case']);
						$profile_img = get_field('profile_img', $post_id);

						?>
						<img src="<?php if ($profile_img): ?><?php echo $profile_img; ?><?php else: ?> <?php bloginfo('template_directory'); ?>/images/upload-oic.png<?php endif; ?>"
						     alt=""
						     class="up-icon">
						<input type="hidden" value="<?php echo $_GET['edit_case']; ?>" name="post_id" id="post_id">
						<input type="file" name="profile_img" id="profile_img"
						       onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
						<img src="" id="blah">
					</label>
				</div>
				<div class="t-btns">
					<button type="reset" class="btn btn-danger remove_paint">Discard</button>
					<button type="reset" class="btn save_draft">Save as draft</button>
				</div>
			</div>
			<div class="t-bottom col-xs-12">
				<form action="#" id="frist_step">
					<div class="f-item col-md-4 col-xs-12">
						<div class="f-head col-xs-12">
							<h3>Personal Information</h3>
						</div>
						<div class="form-group">
							<input type="text" name="patient_name" class="form-control" placeholder="Patient Name">
						</div>
						<div class="form-group">
							<input type="text" name="saudi_id" class="form-control" placeholder="Saudi ID">
						</div>
						<div class="form-group">
							<input type="text" name="iqama_number" class="form-control" placeholder="Iqama Number">
						</div>
							<div class="form-group">
							<input name="file_no" type="text" class="form-control" placeholder="File Number">
						</div>
						<div class="form-group">
							<input type="text" name="doctor_name" class="form-control" placeholder="Doctor Name">
						</div>
						<div class="form-group">
							<input type="text" name="cilinic_name" class="form-control"
							       placeholder="Hospital/Clinic Name">
						</div>
						<div class="form-group">
							<?php $gender = get_field('gender', $post_id)['value']; ?>
							<!--                            --><?php //var_dump($gender); ?>
							<h4 class="gender">Gender</h4>
							<label>
								<input type="radio" value="0" name="gender" <?php if ($gender == "0") {
									echo 'checked';
								} ?>>
								<span>Male</span>
							</label>
							<label>
								<input type="radio" value="1" name="gender" <?php if ($gender == "1") {
									echo 'checked';
								} ?>>
								<span>Female</span>
							</label>
						</div>
					
					<!-- 	<div class="form-group">
							<input name="hospitalclinic_id" type="text" class="form-control"
							       placeholder="Hospital/Clinic ID">
						</div>-->
					<!--	<div class="form-group">
							<input type="text" name="nationalty" class="form-control" placeholder="Nationality">
						</div> -->
						<!--<div class="form-group">
							<input type="text" name="helth_card_number_" class="form-control"
							       placeholder="HEalth Card Number">
						</div>-->
						
						<div class="form-group">
							<input type="text" name="birth_date" class="form-control" placeholder="Date of Birth"
							       id="ev-date">
						</div>
						<div class="form-group">
						    <?php $smooker = get_field('smooker',intval($_GET['view_case']));
                              ?>
							<h4>Smoking status</h4>
							<label>
								<input type="radio" name="smooker" value="1" <?php if ($smooker =='1'){echo 'checked';} ?>>
								<span>Current smoker</span>
							</label>
							<label>
								<input type="radio" name="smooker" value="2" <?php if ($smooker =='2'){echo 'checked';} ?>>
								<span>Ex-smoker</span>
							</label>
								<label>
								<input type="radio" name="smooker" value="3" <?php if ($smooker =='3'){echo 'checked';} ?>>
								<span>Never smoked</span>
							</label>
						</div>
						
						
					</div>
					<div class="f-item col-md-8 col-xs-12">
						<div class="f-head col-xs-12">
							<h3>Contact Information</h3>
						</div>
						<?php $country_ = get_field('country_',$post_id); ?>
						<div class="form-group col-md-6 col-xs-12">
							<select class="form-control" name="country_">
								<?php
								$country = new WP_Query(array('post_type' => 'country', 'posts_per_page' => -1)); ?>
								<?php if ($country->have_posts()): while ($country->have_posts()):$country->the_post(); ?>
									<option value="<?php echo get_the_ID(); ?>" <?php if ($country_ == get_the_ID()): ?>selected <?php endif; ?>><?php the_title(); ?></option>

								<?php endwhile; endif;
								wp_reset_query(); ?>

							</select>
						</div>
							<?php $citya = get_field('city',$post_id); ?>
						<div class="form-group col-md-6 col-xs-12">
							<select class="form-control" name="city">
								<?php
								$city = new WP_Query(array('post_type' => 'city', 'posts_per_page' => -1)); ?>
								<?php if ($city->have_posts()): while ($city->have_posts()):$city->the_post(); ?>
									<option value="<?php echo get_the_ID(); ?>" <?php if ($citya == get_the_ID()): ?> selected <?php endif; ?>><?php the_title(); ?></option>

								<?php endwhile; endif;
								wp_reset_query(); ?>

							</select>
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<input type="text" name="mobile_number" class="form-control"
							       placeholder="Mobile Number">
						</div>
					<!--	<div class="form-group col-md-6 col-xs-12">
							<input type="text" name="land_line_number_" class="form-control"
							       placeholder="Landline Number">
						</div> -->
					<!--	<div class="form-group col-xs-12">
							<input type="text" name="adress" class="form-control" placeholder="Addres">
						</div> -->
					
						
					<!--	<div class="form-group col-md-6 col-xs-12">
							<input type="text" name="zip_code" class="form-control" placeholder="Zip Code">
						</div> -->
						<div class="form-group col-md-6 col-xs-12">
							<input type="email" name="email_" class="form-control" placeholder="Email Address">
						</div>
					<!--	<div class="f-head col-xs-12" style="margin-top: 45px;">
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
						</div>-->
						<div class="f-head col-xs-12" style="margin-top: 70px;">
							<h3>Work & Education</h3>
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<select class="form-control" name="occupation">
								<?php $occupation = get_field('occupation',$post_id);?>
								<?php
								$Occupation = new WP_Query(array('post_type' => 'occupation', 'posts_per_page' => -1)); ?>
								<?php if ($country->have_posts()): while ($Occupation->have_posts()):$Occupation->the_post(); ?>
									<option value="<?php echo get_the_ID(); ?>"  <?php if ($occupation == get_the_ID()):?>selected <?php endif; ?>><?php the_title(); ?></option>

								<?php endwhile; endif;
								wp_reset_query(); ?>

							</select>
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<?php $education_level = get_field('education_level',$post_id); ?>
							<select class="form-control" name="education_level">
								<option selected disabled>Education Level</option>
								<?php
								$Education = new WP_Query(array('post_type' => 'education_level', 'posts_per_page' => -1)); ?>
								<?php if ($Education->have_posts()): while ($Education->have_posts()):$Education->the_post(); ?>
									<option  <?php if ($education_level == get_the_ID()): ?>selected <?php endif; ?>value="<?php echo get_the_ID(); ?>"><?php the_title(); ?></option>
								<?php endwhile; endif;
								wp_reset_query(); ?>

							</select>
						</div>
					</div>
					<div class="f-item col-md-12 col-xs-12">
						<button type="button" id="frist_step_do" class="btn save next-step update_all">Continue</button>
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
					        <?php $first_joint_symptoms = get_field('first_joint_symptoms',intval($_GET['view_case']));
                              ?>
							<h5>Duration Of First Joint Symptoms Before Seeking Medical Advice</h5>
							<ul>
								<li>
									<label>
										<input type="radio" name="first_joint_symptoms" value="2" <?php if ($first_joint_symptoms =="2"){echo 'checked';} ?>>
										<span>Less than 3 months</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="first_joint_symptoms" value="3" <?php if ($first_joint_symptoms =="3"){echo 'checked';} ?>>
										<span>3-5 months</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="first_joint_symptoms" value="4" <?php if ($first_joint_symptoms =="4"){echo 'checked';} ?>>
										<span>6-11 months</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="first_joint_symptoms" value="5" <?php if ($first_joint_symptoms =="5"){echo 'checked';} ?>>
										<span>12-23 months</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="first_joint_symptoms" value="6" <?php if ($first_joint_symptoms =="6"){echo 'checked';} ?>>
										<span>24-35 months</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="first_joint_symptoms" value="7" <?php if ($first_joint_symptoms =="7"){echo 'checked';} ?>>
										<span>More than 35 months</span>
									</label>
								</li>
							
							</ul>
							
							<br />
							<?php $were_these_symptoms_initially_palindromic = get_field('were_these_symptoms_initially_palindromic',intval($_GET['view_case']));
                              ?>
							<!--	<h5>Were these symptoms initially palindromi</h5>
						
									<label>
										<input type="radio" name="were_these_symptoms_initially_palindromic" value="1" <?php if ($were_these_symptoms_initially_palindromic =='1'){echo 'checked';} ?>>
										<span>Yes</span>
									</label>
							
									<label>
										<input type="radio" name="were_these_symptoms_initially_palindromic" value="0" <?php if ($were_these_symptoms_initially_palindromic =='0'){echo 'checked';} ?>>
										<span>No</span>
									</label>
									
									<br /> -->	<br />
									   <div>
									       <?php $medical_insurance = get_field('medical_insurance',intval($_GET['view_case']));
                              ?>
                            <h5>Is The Patient Medically Insured</h5>
                            <label>
                                <input type="radio" name="medical_insurance" value="1" <?php if ($medical_insurance =='1'){echo 'checked';} ?>>
                                <span>yes</span>
                            </label>
                            <label>
                                <input type="radio" name="medical_insurance" value="0" <?php if ($medical_insurance =='0'){echo 'checked';} ?>>
                                <span>no</span>
                            </label>
                            
                            	<br /><br />

                             <?php $number_of_visits = get_field('number_of_visits',intval($_GET['view_case']));
                              ?>
                                    <h5>Number healthcare provider visit prior to rheumatology clinic referral</h5>
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="1" <?php if ($number_of_visits =='1'){echo 'checked';} ?>>
                                                <span>1</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="2" <?php if ($number_of_visits =='2'){echo 'checked';} ?>>
                                                <span>2</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="3" <?php if ($number_of_visits =='3'){echo 'checked';} ?>>
                                                <span>3</span>
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="radio" name="number_of_visits" value="4" <?php if ($number_of_visits =='4'){echo 'checked';} ?>>
                                                <span>More than 3</span>
                                            </label>
                                        </li>


                                    </ul>
                                    <br />
                                    <?php $family_history_of_autoimmune_disease = get_field('family_history_of_autoimmune_disease',intval($_GET['view_case']));
                              ?>
                                     <h5>Family history of autoimmune disease</h5>
                            <ul>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="1" <?php if ($family_history_of_autoimmune_disease =="1"){echo 'checked';} ?>>
                                <span>Rheumatoid Arthritis</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="2" <?php if ($family_history_of_autoimmune_disease =="2"){echo 'checked';} ?>>
                                <span>SLE</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="3" <?php if ($family_history_of_autoimmune_disease =="3"){echo 'checked';} ?>>
                                <span>Sjogren</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="4" <?php if ($family_history_of_autoimmune_disease =="4"){echo 'checked';} ?>>
                                <span>Scleroderma</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="5" <?php if ($family_history_of_autoimmune_disease =="5"){echo 'checked';} ?>>
                                <span>Psoriasis</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="6" <?php if ($family_history_of_autoimmune_disease =="6"){echo 'checked';} ?>>
                                <span>Ankylosing Spondyloarthritis</span>
                            </label></li>
                            <li><label>
                                <input type="radio" name="family_history_of_autoimmune_disease" value="7" <?php if ($family_history_of_autoimmune_disease =="7"){echo 'checked';} ?>>
                                <span>Other</span>
                            </label></li>
                          
                            </ul>

                        </div>
                        <br />
                        
                        
                        
                        <div>
                       
                             <!-- <?php $number_of_visits = get_field('number_of_visits',intval($_GET['view_case']));
                              ?>
							<h5>Number of visits patient made to see a healthcare professional before being referred to rheumatology clinic</h5>
							<ul>
								<li>
									<label>
										<input type="radio" name="number_of_visits" value="1" <?php if ($number_of_visits =='1'){echo 'checked';} ?>>
										<span>1</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="number_of_visits" value="2" <?php if ($number_of_visits =='2'){echo 'checked';} ?>>
										<span>2</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="number_of_visits" value="3" <?php if ($number_of_visits =='3'){echo 'checked';} ?>>
										<span>3</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="number_of_visits" value="4" <?php if ($number_of_visits =='4'){echo 'checked';} ?>>
										<span>More than 3</span>
									</label>
								</li>
								
							
							</ul> -->
							
							</div>

                        
						</div>
					    
					    
					    <div class="form-group col-md-6 col-xs-12">
					        
					        <h5>Age At presentation</h5>
							<input type="text" class="form-control" name="age_of_presentation"
							       value="age_of_presentation">
						</div>
						<div class="form-group col-md-6 col-xs-12">
                              <h5>Date Of The First Rheumatologist Visit</h5>
                            <input type="text" class="form-control" name="date_of_the_first_presentation_to_rheumatologist" id="ev-date2">
                        </div>
					<!--	<div class="form-group col-md-6 col-xs-12">
							<input type="text" class="form-control" name="early_symptopms"
							       placeholder="Early Symptopms"
							       value="Early Symptopms">
						</div> -->
						
						<!--<div class="form-group col-md-6 col-xs-12">
                             <h5>Date of first persistent patient reported joint pain</h5>
                            <input type="text" class="form-control" name="date_of_first_persistent_patient_reported_joint_pain"
                                   id="ev-date4">
                        </div>-->
                        
                        
                         <div class="form-group col-md-6 col-xs-12">
                       <?php $initial_referral_to_rheumatologist_from = get_field('initial_referral_to_rheumatologist_from',intval($_GET['view_case']));
                              ?>
                              
							<h5>Source Of Referral</h5>
							<ul>
								<li>
									<label>
										<input type="radio" name="initial_referral_to_rheumatologist_from" value="1" <?php if ($initial_referral_to_rheumatologist_from =='1'){echo 'checked';} ?>>
										<span>Family physician</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="initial_referral_to_rheumatologist_from" value="2" <?php if ($initial_referral_to_rheumatologist_from =='2'){echo 'checked';} ?>>
										<span>Orthopedic</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="initial_referral_to_rheumatologist_from" value="3" <?php if ($initial_referral_to_rheumatologist_from =='3'){echo 'checked';} ?>>
										<span>Internist</span>
									</label>
								</li>
								<li>
									<label>
										<input type="radio" name="initial_referral_to_rheumatologist_from" value="4" <?php if ($initial_referral_to_rheumatologist_from =='4'){echo 'checked';} ?>>
										<span>Dermalogist</span>
									</label>
								</li>
									<li>
									<label>
										<input type="radio" name="initial_referral_to_rheumatologist_from" value="5" <?php if ($initial_referral_to_rheumatologist_from =='5'){echo 'checked';} ?>>
										<span>Other</span>
									</label>
								</li>
							
							</ul>
							
							</div>
                        <div class="form-group col-md-6 col-xs-12">
						    <h5>Date Of Referral</h5>
							<input type="text" class="form-control" name="date_of_referal"
							       id="ev-date3">
						</div>

                        
                        <!--
                        <div class="form-group col-md-6 col-xs-12">
							<input type="text" class="form-control" placeholder="Initial Refering by GP"
							       name="initial_refering_by_gp">
						</div>
						
						<div class="form-group col-md-6 col-xs-12">
							<input type="text" class="form-control" placeholder="Number of Visits"
							       name="number_of_visits">
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<h4>Medical Insurance</h4>
							<label>
								<input type="radio" name="medical_insurance" value="1">
								<span>yes</span>
							</label>
							<label>
								<input type="radio" name="medical_insurance" value="0" checked>
								<span>no</span>
							</label>
						</div>
						<div class="form-group col-md-6 col-xs-12">
							<h4>Previous Specialist</h4>
							<label>
								<input type="radio" name="previous_specialist" value="1">
								<span>yes</span>
							</label>
							<label>
								<input type="radio" value="0" name="previous_specialist" checked>
								<span>no</span>
							</label>
						</div>
						-->
						
						
						<div class="form-group col-md-6 col-xs-12">
						<?php $family_history_of_arthritis = get_field('family_history_of_arthritis',intval($_GET['view_case']));
                              ?>
                            <h5>Family History of Rheumatoid Arthritis</h5>
                            <label>
                                <input type="radio" name="family_history_of_arthritis" value="1" <?php if ($family_history_of_arthritis =='1'){echo 'checked';} ?>>
                                <span>yes</span>
                            </label>
                            <label>
                                <input type="radio" name="family_history_of_arthritis" value="0" <?php if ($family_history_of_arthritis =='0'){echo 'checked';} ?>>
                                <span>no</span>
                            </label>
                        </div>
                       
						
						<div class="upload-items">
                                <h5>Medical Reports</h5>
                                <br />
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
                                <br />
                            </div>
                            <br />
						
				
						
					<!--	<div class="f-head col-xs-12">
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

							<div class="upload-items">
								<h5>Medical Reports</h5>
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
							</div>
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
								<button type="button" id="calculate_bmx" onclick="" class="btn save">
									Calculate (BMI)
								</button>
							</div>
						</div> -->
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
							<h3>Initial Symptoms</h3>
						</div>
					
                            
                            <div class="form-group col-md-12 col-xs-12">
                            <div class="form-group col-md-6 col-xs-12">
                            <div class="sm-item col-xs-12">
                                <?php $morning_stifness = get_field('morning_stifness',intval($_GET['view_case']));
                              ?>
                                <h5>Morning Stifness</h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="morning_stifness" value="1" <?php if ($morning_stifness =="1"){echo 'checked';} ?>>
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="morning_stifness" value="0"  <?php if ($morning_stifness =="0"){echo 'checked';} ?>>
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="sm-item col-xs-12">
                                <?php $joint_pain = get_field('joint_pain',intval($_GET['view_case']));
                              ?>
                                <h5>Joint Pain</h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_pain" value="1" <?php if ($joint_pain =="1"){echo 'checked';} ?>>
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_pain" value="0" <?php if ($joint_pain =="0"){echo 'checked';} ?>>
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            <div class="form-group col-md-6 col-xs-12">
                            <div class="sm-item col-xs-12">
                                  <?php $joint_swelling = get_field('joint_swelling',intval($_GET['view_case']));
                              ?>
                                <h5>Joint Swelling</h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_swelling" value="1" <?php if ($joint_swelling =="1"){echo 'checked';} ?>>
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="joint_swelling" value="0" <?php if ($joint_swelling =="0"){echo 'checked';} ?>>
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                           <!-- <div class="sm-item col-xs-12">
                                <?php $skin_rash = get_field('skin_rash',intval($_GET['view_case']));
                              ?>
                                <h5>Skin Rash</h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="skin_rash" value="1" <?php if ($skin_rash =='1'){echo 'checked';} ?>>
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="skin_rash" value="0" <?php if ($skin_rash =='0'){echo 'checked';} ?>>
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>-->
                            <div class="sm-item col-xs-12">
                                <?php $malignancy = get_field('malignancy',intval($_GET['view_case']));
                              ?>
                                <h5>Malignancy</h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="malignancy" value="1" <?php if ($malignancy =="1"){echo 'checked';} ?>>
                                            <span>yes</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="malignancy" value="0" <?php if ($malignancy =="0"){echo 'checked';} ?>>
                                            <span>no</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            </div>
                            </div>
                            
                            <!--
							<ul>
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
							</ul>-->
							<div class="form-group col-md-4 col-xs-12">
                         
                            
                          <!--  <div class="col-xs-12">
                                <?php $solid_tumor = get_field('solid_tumor',intval($_GET['view_case']));
                              ?>
                                <h5>Solid Tumor</h5>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="1" <?php if ($solid_tumor =='1'){echo 'checked';} ?>>
                                            <span>Lung</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="2" <?php if ($solid_tumor =='2'){echo 'checked';} ?>>
                                            <span>Breast</span>
                                        </label>
                                    </li>
                                     <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="3" <?php if ($solid_tumor =='3'){echo 'checked';} ?>>
                                            <span>Thyroid</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="4" <?php if ($solid_tumor =='4'){echo 'checked';} ?>>
                                            <span>Asopharyngeal</span>
                                        </label>
                                    </li>
                                     <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="5" <?php if ($solid_tumor =='5'){echo 'checked';} ?>>
                                            <span>Bone</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="6" <?php if ($solid_tumor =='6'){echo 'checked';} ?>>
                                            <span>Kidney</span>
                                        </label>
                                    </li>
                                     <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="7" <?php if ($solid_tumor =='7'){echo 'checked';} ?>>
                                            <span>Ovarian</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="8" <?php if ($solid_tumor =='8'){echo 'checked';} ?>>
                                            <span>Testis</span>
                                        </label>
                                    </li>
                                      <li>
                                        <label>
                                            <input type="radio" name="solid_tumor" value="9" <?php if ($solid_tumor =='9'){echo 'checked';} ?>>
                                            <span>Brain</span>
                                        </label>
                                    </li>
                                </ul>
                            </div> -->
						</div> 
						<!-- <div class="form-group col-md-4 col-xs-12">
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
						</div>
						<div class="form-group col-md-4 col-xs-12">
							<div class="sm-item col-xs-12">
								<h5>Morning Stifness</h5>
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
						
					</div>
					<div class="f-item col-md-12 col-xs-12">
						<button type="button" id="step_2" class="btn save next-step update_all">Save & Continue</button>
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
				<form action="#" method="get" id="form_step_3">
					<div class="f-item col-md-8 col-xs-12">
						<!-- <div class="form-group col-md-6 col-xs-12">
							<input type="text" class="form-control" name="date_of_first_examination"
							       placeholder="Date of first examination"
							       id="ev-date3">
							<img src="<?php bloginfo('template_directory'); ?>/images/calendar.png" alt=""
							     class="calendar">
						</div> -->
						<div class="form-group col-md-6 col-xs-12">
						     <?php $squeeze_test = get_field('squeeze_test',intval($_GET['view_case']));
                              ?>
							<h4>Squeeze Test</h4>
							<ul>
							 <label>
                                <input type="radio" name="squeeze_test" value="1" <?php if ($squeeze_test =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                            <label>
                                <input type="radio" name="squeeze_test" value="0" <?php if ($squeeze_test =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                            <label>
                                    <input type="radio" name="squeeze_test" value="2" <?php if ($squeeze_test =="2"){echo 'checked';} ?>>
                                    <span>Not Done</span>
                                </label>
							</ul>
						</div>
						<div class="form-group col-md-6 col-xs-12">
						    <?php $swelling = get_field('swelling',intval($_GET['view_case']));
                              ?>
							<h4>Swelling </h4>
							<ul>
						<label>
                                <input type="radio" name="swelling" value="1" <?php if ($swelling =="1"){echo 'checked';} ?>>
                                <span>positive</span>
                            </label>
                            <label>
                                <input type="radio" name="swelling" value="0" <?php if ($swelling =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                             <label>
                                    <input type="radio" name="swelling" value="2" <?php if ($swelling =="2"){echo 'checked';} ?>>
                                    <span>Not Done</span>
                                </label>
							</ul>
						</div>
						<div class="form-group col-md-6 col-xs-12">
						    <?php $tendernes = get_field('tendernes',intval($_GET['view_case']));
                              ?>
							<h4>Tendernes</h4>
							<ul>
							<label>
                                <input type="radio" name="tendernes" value="1" <?php if ($tendernes =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                            <label>
                                <input type="radio" name="tendernes" value="0" <?php if ($tendernes =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                            <label>
                                    <input type="radio" name="tendernes" value="2" <?php if ($tendernes =="2"){echo 'checked';} ?>>
                                    <span>Not Done</span>
                                </label>
							</ul>
						</div>
					<!--	<div class="form-group hum-wrap col-md-6 col-xs-12">
							<div class="has-hum">
								<img src="<?php bloginfo('template_directory'); ?>/images/human.png" alt=""
								     class="human">
							</div>
						</div>
						<div class="form-group hum-wrap2 col-md-6 col-xs-12">
							<div class="has-hum">
								<img src="<?php bloginfo('template_directory'); ?>/images/human.png" alt=""
								     class="human">
							</div>
						</div> -->
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
									<!--	<input type="text" class="form-control" id="dose" placeholder="Dose"
										       name="dose">
										<input type="text" id="dosage_form" class="form-control"
										       placeholder="Dosage Form"
										       name="dosage_form">
										<input type="text" id="recommendations" class="form-control"
										       placeholder="Recommendations"
										       name="recommendations">
										<input type="text" id="comments_previous_medc" class="form-control"
										       placeholder="Comments" name="comments"> -->
										<button type="button" class="btn" id="previous_medication">add</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					
					
					
					
					
					
						  <div class="f-item col-md-12 col-xs-12">
                     <div class="f-head col-xs-12">
                                <h3>Investigation</h3>
                            </div>
                         <div class="form-group col-md-4 col-xs-12">
                           <!-- <div class="sm-item">
                               <?php $working_diagnosis = get_field('working_diagnosis',intval($_GET['view_case']));
                              ?>
                             
                             <h5>Working Diagnosis</h5>
                            <ul>
                                <li>
                                    <label>
                                        <input type="radio" name="working_diagnosis" value="1" <?php if ($working_diagnosis =='1'){echo 'checked';} ?>>
                                        <span>Early RA (less than 6 month)</span>
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="radio" name="working_diagnosis" value="2" <?php if ($working_diagnosis =='2'){echo 'checked';} ?>>
                                        <span>Estabished RA</span>
                                    </label>
                                </li>
                              
                            </ul>
                            </div> -->
                           <div class="sm-item">
                                 <?php $rf_serology = get_field('rf_serology',intval($_GET['view_case']));
                              ?>
                            <h4>RF serology</h4>
                            <ul>
                            <label>
                                <input type="radio" name="rf_serology" value="1" <?php if ($rf_serology =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="rf_serology" value="0"  <?php if ($rf_serology =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                            <label>
                                <input type="radio" name="rf_serology" value="2"  <?php if ($rf_serology =="2"){echo 'checked';} ?>>
                                <span>Not done</span>
                            </label>
                            </ul>
                        </div>
                           <div class="sm-item">
                                  <?php $anti_ccp = get_field('anti_ccp',intval($_GET['view_case']));
                              ?>
                            <h4>Anti-CCP</h4>
                            <ul>
                            <label>
                                <input type="radio" name="anti-ccp" value="1" <?php if ($anti_ccp =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="anti-ccp" value="0" <?php if ($anti_ccp =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                             <label>
                                <input type="radio" name="anti-ccp" value="2" <?php if ($anti_ccp =="2"){echo 'checked';} ?>>
                                <span>Not Done</span>
                            </label>
                            </ul>
                        </div>
                           <div class="sm-item">
                             <?php $ana = get_field('ana',intval($_GET['view_case']));
                              ?>
                            <h4>ANA</h4>
                            <ul>
                            <label>
                                <input type="radio" name="ana" value="1" <?php if ($ana =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="ana" value="0" <?php if ($ana =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                            <label>
                                <input type="radio" name="ana" value="2" <?php if ($ana =="2"){echo 'checked';} ?>>
                                <span>Not Done</span>
                            </label>
                            </ul>
                        </div>
                           <div class="sm-item">
                                <?php $anti_ssa = get_field('anti-ssa',intval($_GET['view_case']));
                              ?>
                                <h4>Anti-SSA</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="anti-ssa" value="1" <?php if ($anti_ssa =="1"){echo 'checked';} ?>>
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="anti-ssa" value="0" <?php if ($anti_ssa =="0"){echo 'checked';} ?>>
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                     <input type="radio" name="anti-ssa" value="2" <?php if ($anti_ssa =="2"){echo 'checked';} ?>>
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                             <div class="sm-item">
                                  <?php $anti_ssb = get_field('anti-ssb',intval($_GET['view_case']));
                              ?>
                                <h4>Anti-SSB</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="anti-ssb" value="1" <?php if ($anti_ssb =="1"){echo 'checked';} ?>>
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="anti-ssb" value="0" <?php if ($anti_ssb =="0"){echo 'checked';} ?>>
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                     <input type="radio" name="anti-ssb" value="2" <?php if ($anti_ssb =="2"){echo 'checked';} ?>>
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                        
                        </div>
                         <div class="form-group col-md-4 col-xs-12">
                           
                        
                            
                             <div class="sm-item">
                                 <?php $apa = get_field('apa',intval($_GET['view_case']));
                              ?>
                            <h4>APA</h4>
                            <ul>
                            <label>
                                <input type="radio" name="apa" value="1"  <?php if ($apa =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="apa" value="0"  <?php if ($apa =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                             <label>
                                <input type="radio" name="apa" value="2"  <?php if ($apa =="2"){echo 'checked';} ?>>
                                <span>Not Done</span>
                            </label>
                            </ul>
                        </div>
                             <div class="sm-item">
                                  <?php $quantiferontb_gold = get_field('quantiferontb_gold',intval($_GET['view_case']));
                              ?>
                                <h4>Quantiferon/TB gold</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="quantiferontb_gold" value="1" <?php if ($quantiferontb_gold =="1"){echo 'checked';} ?>>
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="quantiferontb_gold" value="0" <?php if ($quantiferontb_gold =="0"){echo 'checked';} ?>>
                                        <span>Negative</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="quantiferontb_gold" value="2" <?php if ($quantiferontb_gold =="2"){echo 'checked';} ?>>
                                        <span>Indetermined</span>
                                    </label>
                                </ul>
                            </div>
                            
                              <div class="sm-item">
                                  <?php $hepatitis_b = get_field('hepatitis_b',intval($_GET['view_case']));
                              ?>
                            <h4>HBsAg</h4>
                            <ul>
                            <label>
                                <input type="radio" name="hepatitis_b" value="1" <?php if ($hepatitis_b =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="hepatitis_b" value="0" <?php if ($hepatitis_b =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                            <label>
                                <input type="radio" name="hepatitis_b" value="2" <?php if ($hepatitis_b =="2"){echo 'checked';} ?>>
                                <span>Not Done</span>
                            </label>
                            </ul>
                        </div>
                              <div class="sm-item">
                               <?php $hbsab = get_field('hbsab',intval($_GET['view_case']));
                              ?>
                                <h4>HBsAb</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hbsab" value="1"  <?php if ($hbsab =="1"){echo 'checked';} ?>>
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hbsab" value="0" <?php if ($hbsab =="0"){echo 'checked';} ?>>
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                        <input type="radio" name="hbsab" value="2" <?php if ($hbsab =="2"){echo 'checked';} ?>>
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                                </div>
                              <div class="sm-item">
                                  <?php $hbcab = get_field('hbcab',intval($_GET['view_case']));
                              ?>
                                <h4>HBcAb</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="hbcab" value="1" <?php if ($hbcab =="1"){echo 'checked';} ?>>
                                        <span>Positive</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="hbcab" value="0" <?php if ($hbcab =="0"){echo 'checked';} ?>>
                                        <span>Negative</span>
                                    </label>
                                     <label>
                                        <input type="radio" name="hbcab" value="2" <?php if ($hbcab =="2"){echo 'checked';} ?>>
                                        <span>Not Done</span>
                                    </label>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="form-group col-md-4 col-xs-12">
                           
                            
                             <div class="sm-item">
                                 <?php $hepatitis_c = get_field('hepatitis_c',intval($_GET['view_case']));
                              ?>
                            <h4>HCVAb</h4>
                            <ul>
                            <label>
                                <input type="radio" name="hepatitis_c" value="1" <?php if ($hepatitis_c =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="hepatitis_c" value="0" <?php if ($hepatitis_c =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                            <label>
                                <input type="radio" name="hepatitis_c" value="2" <?php if ($hepatitis_c =="2"){echo 'checked';} ?>>
                                <span>Not Done</span>
                            </label>
                            </ul>
                        </div>
                             <div class="sm-item">
                                 <?php $lft_ = get_field('lft_',intval($_GET['view_case']));
                              ?>
                                <h4>LFT</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="lft_" value="1" <?php if ($lft_ =="1"){echo 'checked';} ?>>
                                        <span>Normal</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="lft_" value="0" <?php if ($lft_ =="0"){echo 'checked';} ?>>
                                        <span>Abnormal</span>
                                    </label>
                                
                                </ul>
                            </div>
                             <div class="sm-item">
                                 <?php $renal_function_ = get_field('renal_function_',intval($_GET['view_case']));
                              ?>
                                <h4>Renal function</h4>
                                <ul>
                                    <label>
                                        <input type="radio" name="renal_function_" value="1" <?php if ($renal_function_ =="1"){echo 'checked';} ?>>
                                        <span>Normal</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="renal_function_" value="0" <?php if ($renal_function_ =="0"){echo 'checked';} ?>>
                                        <span>Abnormal</span>
                                    </label>
                                
                                </ul>
                            </div>
                             <div class="sm-item">
                             
                                 <input type="text" class="form-control" name="hemoglobin_level_gdl"
                                   value="Hemoglobin level g/dl">
                                
                            </div>
                             <div class="sm-item">
                                 <?php $hiv = get_field('hiv',intval($_GET['view_case']));
                              ?>
                            <h4>HIV</h4>
                            <ul>
                            <label>
                                <input type="radio" name="hiv" value="1" <?php if ($hiv =="1"){echo 'checked';} ?>>
                                <span>Positive</span>
                            </label>
                           <label>
                                <input type="radio" name="hiv" value="0" <?php if ($hiv =="0"){echo 'checked';} ?>>
                                <span>Negative</span>
                            </label>
                             <label>
                                <input type="radio" name="hiv" value="2" <?php if ($hiv =="2"){echo 'checked';} ?>>
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
                            <textarea class="form-control" name="additional_notes"></textarea>
                        </div>
                    </div>
				
				
					<div class="f-item col-md-12 col-xs-12">
						<button type="submit" class="btn save update_all">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endif; ?>