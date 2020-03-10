<?php /**
 * Template Name: admin
 *
 * @package WordPress
 * @subpackage elryad
 * @since elryad v1.0
 */
?>
<?php do_action('if_current_user_new_doctor'); ?>
<?php if ($_GET['add_new_visit']): ?>
    <?php //acf_form_head(); ?>
<?php endif; ?>

<?php get_header(); ?>
<div class="wrap-content">

    <?php if ($_GET['filter'] == 1): ?>
        <?php get_template_part('/view/doctor/filter'); ?>


    <?php endif; ?>

    <?php include get_template_directory() . '/view/doctor/new_case.php'; ?>
    <?php include get_template_directory() . '/view/doctor/edit_case.php'; ?>
    <?php include get_template_directory() . '/view/doctor/view_case.php'; ?>
    <?php include get_template_directory() . '/view/doctor/cases_status.php'; ?>
    <?php include get_template_directory() . '/view/doctor/add_new_visit.php'; ?>
    <?php include get_template_directory() . '/view/doctor/Patient_visits.php'; ?>
    <?php include get_template_directory() . '/view/doctor/edit_visit.php'; ?>
    <?php include get_template_directory() . '/view/doctor/view_visits.php'; ?>
    <?php include get_template_directory() . '/view/centers/add_medical_center.php'; ?>
    <?php include get_template_directory() . '/view/centers/all_centers.php'; ?>
    <?php include get_template_directory() . '/view/centers/edit_centers.php'; ?>
    <?php include get_template_directory() . '/view/doctor/RA-Dashboard.php'; ?>
    <?php include get_template_directory() . '/view/doctor/visit-reports.php'; ?>
    <?php include get_template_directory() . '/view/doctor/edit_profile_doctor.php'; ?>

    <?php if ($_GET['reports'] == 'medication'): ?>
        <?php include get_template_directory() . '/view/reports/medication.php'; ?>

        <!--		--><?php //get_template_part('/view/doctor/reports'); ?>
    <?php endif; ?>
    <?php if ($_GET['advanced'] == '2'): ?>
        <?php include get_template_directory() . '/view/doctor/Advanced-filter.php'; ?>


    <?php endif; ?>

</div>
</div>

<div class="modal fade" id="case_pop">
    <div class="modal-dialog">
        <div class="modal-content col-xs-12">
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            <div class="modal-body col-xs-12">
                <div class="login-card col-xs-12">
                    <div class="login-img col-md-7 col-xs-12">
                        <h3>
                            <span>Add New</span>
                            Case
                        </h3>
                        <img src="<?php bloginfo('template_directory'); ?>/images/new-case.png" alt=""
                             class="l-stock">
                    </div>
                    <div class="login-form col-md-5 col-xs-12">
                        <div class="l-head">
                            <h3>Choose a</h3>
                            <p>Category</p>
                        </div>
                        <form action="<?php home_url('admin/'); ?>" method="get">
                            <div class="form-group">
                                <h5>Diseasse Category</h5>
                                <label>EX: Rhematoid</label>
                                <?php
                                $patient_category = get_terms('patient_category', array(
                                    'hide_empty' => false,
                                ));

                                ?>
                                <select name="category" id="category" class="form-control" required>
                                    <option disabled selected> Select Category</option>
                                    <?php if ($patient_category): ?>
                                       <!-- <?php foreach ($patient_category as $cat): ?> -->
                                            <option value="<?php echo $cat->term_id; ?>"><?php echo $cat->name; ?></option>
                                        <!-- <?php endforeach; ?> -->
                                    <?php endif; ?>
                                </select>
                                <input type="hidden" name="new_case" value="1">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn">
                                    <i class="fa fa-arrow-right"></i>
                                    <span>add</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php get_footer(); ?>
<style>

    #enquirypopup .modal-dialog {
        width: 400px;
        padding: 0px;
        position: relative;
    }

    #enquirypopup .modal-dialog {
        width: 400px;
        padding: 0px;
        position: relative;
    }

    #enquirypopup .modal-dialog:before {
        content: '';
        height: 0px;
        width: 0px;
        border-left: 50px solid #17B6BB;
        border-right: 50px solid transparent;
        border-bottom: 50px solid transparent;
        position: absolute;
        top: 1px;
        left: -14px;
        z-index: 99;
    }

    .custom-modal-header {
        text-align: center;
        color: #17b6bb;
        text-transform: uppercase;
        letter-spacing: 2px;
        border-top: 4px solid;
    }

    #enquirypopup .modal-dialog .close {
        z-index: 99999999;
        color: white;
        text-shadow: 0px 0px 0px;
        font-weight: normal;
        top: 4px;
        right: 6px;
        position: absolute;
        opacity: 1;
    }

    .custom-modal-header .modal-title {
        /* font-weight: bold; */
        font-size: 18px;
    }

    #enquirypopup .modal-dialog:after {
        content: '';
        height: 0px;
        width: 0px;
        /* border-right: 50px solid rgba(255, 0, 0, 0.98); */
        border-right: 50px solid #17b6bb;
        border-bottom: 50px solid transparent;
        position: absolute;
        top: 1px;
        right: -14px;
        z-index: 999999;
    }

    .form-group {
        margin-bottom: 15px !important;
    }

    .form-inline .form-control {
        display: inline-block;
        width: 100%;
        vertical-align: middle;
    }
</style>
<div id="enquirypopup" class="modal fade in" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content row">
            <div class="modal-header custom-modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">New Comorbidities</h4>
            </div>
            <div class="modal-body">
                <form name="info_form" class="form-inline" action="#" method="post">
                    <div class="form-group col-sm-12">
                        <input type="text" class="form-control" name="comorbidities_name" id="comorbidities_name"
                               placeholder="Comorbidities Name Here">
                    </div>

                    <div class="form-group col-sm-12">
                        <button type="submit" id="add_comorbidities" class="btn btn-default pull-right">Add</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>

<!--session plug jquery
$.session.set('some key', 'a value');

$.session.get('some key');
> "a value"

$.session.clear();

$.session.get('some key');
> undefined

$.session.set('some key', 'a value').get('some key');
> "a value"

$.session.remove('some key');

$.session.get('some key');
> undefined
-->
<?php if ($_GET['new_case']): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            ///save draft
            $('.save_draft').click(function (e) {
                e.preventDefault();
                var paint_to_drfat = $('#post_id').val();
                if (paint_to_drfat > 0) {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {action: 'step_insert_case', paint_to_drfat: $('#post_id').val()},
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {

                                if (response.data.patient_update == 1) {
                                    //suc Upated
                                    Notiflix.Notify.Success('patient Updated To draft !');
                                }

                            }


                        }
                    });

                } else {
                    Notiflix.Notify.Failure('There is No Case In Session Please Complete Frist Step To Allow Remove it!');
                }
            });

            $('.remove_paint').click(function (e) {
                e.preventDefault();
                var paint_to_remove = $('#post_id').val();
                if (paint_to_remove > 0) {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {action: 'step_insert_case', paint_to_remove: $('#post_id').val()},
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {
                                window.location.href = response.data.link_to_redirect; //Will take you to Google.


                            }


                        }
                    });

                } else {
                    Notiflix.Notify.Failure('There is No Case In Session Pleas Complete Frist Step To Allow Remove it!');
                }

            })


            $('#frist_step_do').attr("disabled", "disabled");
            $('#hover_error').hover(function () {
                var reqierd_data = ['patient_name', 'birth_date', 'country_','occupation','mobile_number','file_no','gender'];
                var empty_inputs_holder = [];
                $('#frist_step select').each(function () {
                    var input_name = $(this).attr('name');
                    var place_holder = $(this).attr('placeholder');
                    if (!place_holder){
                        place_holder = $(this).data('error');
                    }                    if (jQuery.inArray(input_name, reqierd_data) != '-1') {
                        if (!$(this).val()) {
                            empty_inputs_holder.push(place_holder);

                        }
                    }

                });
                $('#frist_step input').each(function () {
                    var input_name = $(this).attr('name');
                    var place_holder = $(this).attr('placeholder');
                    if (!place_holder){
                        place_holder = $(this).data('error');
                    }                    if (jQuery.inArray(input_name, reqierd_data) != '-1') {
                        if (!$(this).val()) {
                            empty_inputs_holder.push(place_holder);

                        }
                    }

                });
                if (!$('#frist_step input[name=gender]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the gender is required');
                }
                console.log(empty_inputs_holder);
                if (empty_inputs_holder.length == 0 && $('#frist_step input[name=gender]:checked').val()) {
                    $('#frist_step_do').removeAttr("disabled");


                } else {
                    for (xa = 0; xa < empty_inputs_holder.length; xa++) {
                        Notiflix.Notify.Failure('sorry the ' + empty_inputs_holder[xa] + ' is required');
                    }


                }


            });
            $('#step_2').attr("disabled", "disabled");
            $('#hover_error2').hover(function () {
                var reqierd_data = ['first_joint_symptoms','date_of_first_persistent_patient_reported_joint_pain', 'date_of_referal', 'birth_date','morning_stifness','joint_pain','joint_swelling','malignancy'];
                var empty_inputs_holder = [];
                $('#step_2form select').each(function () {
                    var input_name = $(this).attr('name');
                    var place_holder = $(this).attr('placeholder');
                    if (!place_holder){
                        place_holder = $(this).data('error');
                    }                    if (jQuery.inArray(input_name, reqierd_data) != '-1') {
                        if (!$(this).val()) {
                            empty_inputs_holder.push(place_holder);

                        }
                    }

                });

                $('#step_2form input').each(function () {
                    var input_name = $(this).attr('name');
                    var place_holder = $(this).attr('placeholder');
                    if (!place_holder){
                        place_holder = $(this).data('error');
                    }
                    if (jQuery.inArray(input_name, reqierd_data) != '-1') {
                        if (!$(this).val()) {
                            empty_inputs_holder.push(place_holder);

                        }
                    }

                });
                // radio required
                if (!$('#step_2form input[name=first_joint_symptoms]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the first joint symptoms is required');
                }
               
                if (!$('#step_2form input[name=morning_stifness]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the morning stifness is required');
                }
                if (!$('#step_2form input[name=joint_pain]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the joint pain is required');
                }
                if (!$('#step_2form input[name=joint_swelling]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the first joint swelling is required');
                }
                if (!$('#step_2form input[name=malignancy]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the first malignancy is required');
                }
                console.log(empty_inputs_holder);
                if (empty_inputs_holder.length == 0
                    && ($('#step_2form input[name=first_joint_symptoms]:checked').val())
                    && ($('#step_2form input[name=family_history_of_autoimmune_disease]:checked').val())
                    && ($('#step_2form input[name=morning_stifness]:checked').val())
                    && ($('#step_2form input[name=joint_pain]:checked').val())
                    && ($('#step_2form input[name=joint_swelling]:checked').val())
                    && ($('#step_2form input[name=malignancy]:checked').val())
                ) {
                    $('#step_2').removeAttr("disabled");


                } else {
                    for (xa = 0; xa < empty_inputs_holder.length; xa++) {
                        Notiflix.Notify.Failure('sorry the ' + empty_inputs_holder[xa] + ' is required');
                    }


                }


            });

            $('#step_3').attr("disabled", "disabled");
            $('#hover_error3').hover(function () {
                var reqierd_data = ['additional_notes'];
                var empty_inputs_holder = [];
                $('#form_step_3 select').each(function () {
                    var input_name = $(this).attr('name');
                    var place_holder = $(this).attr('placeholder');
                    if (!place_holder){
                        place_holder = $(this).data('error');
                    }
                    if (jQuery.inArray(input_name, reqierd_data) != '-1') {
                        if (!$(this).val()) {
                            empty_inputs_holder.push(place_holder);

                        }
                    }

                });
                $('#form_step_3 input').each(function () {
                    var input_name = $(this).attr('name');
                    var place_holder = $(this).attr('placeholder');
                    if (!place_holder){
                        place_holder = $(this).data('error');
                    }
                    if (jQuery.inArray(input_name, reqierd_data) != '-1') {
                        if (!$(this).val()) {
                            empty_inputs_holder.push(place_holder);

                        }
                    }

                });
                // radio required
                if (!$('#form_step_3 input[name=squeeze_test]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the squeeze test is required');
                }
                if (!$('#form_step_3 input[name=swelling]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the swelling is required');
                }
                if (!$('#form_step_3 input[name=tendernes]:checked').val()) {
                    Notiflix.Notify.Failure('sorry the tendernes is required');
                }
                
                console.log(empty_inputs_holder);
                if (empty_inputs_holder.length == 0
                    && ($('#form_step_3 input[name=squeeze_test]:checked').val())
                    && ($('#form_step_3 input[name=swelling]:checked').val())
                    && ($('#form_step_3 input[name=tendernes]:checked').val())
                   
                ) {
                    $('#step_3').removeAttr("disabled");


                } else {
                    for (xa = 0; xa < empty_inputs_holder.length; xa++) {
                        Notiflix.Notify.Failure('sorry the ' + empty_inputs_holder[xa] + ' is required');
                    }


                }


            });

            $('#frist_step_do').click(function (evax) {
                evax.preventDefault();


                $("#frist_step").validate();
                var reqierd_data = ['patient_name', 'saudi_id'];
                var arrayData = $('#frist_step').serializeArray();

                // console.log(reqierd_data);
                // $(arrayData).each(function (index) {
                //
                //     console.log(arrayData[index])
                // });
                // console.log(arrayData);

                var post_id = $('#post_id').val();
                var profile_img = jQuery('#profile_img').prop('files')[0]

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: 'step_insert_case',
                        datainputs: arrayData,

                        category_p: <?php echo $_GET['category'] ?: 2; ?>,
                        post_id: $('#post_id').val()
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success == true) {
                            if (response.data.profile_updated > 0) {
                                Notiflix.Notify.Success('Patient success Updated');

                            } else {
                                Notiflix.Notify.Success('Patient success aded');

                            }
                            ///upload file img
                            $('#post_id').val(response.data.post_id);
                            var formData = new FormData();
                            formData.append('action', 'step_insert_case');
                            formData.append('profile', $('#profile_img')[0].files[0]);
                            formData.append('post_id', $('#post_id').val());

                            $.ajax({
                                type: "POST",
                                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                                data: formData,
                                processData: false, // Don’t process the files
                                contentType: false, // Set content type to false as jQuery will tell the server its a query string reques
                                cache: false,
                                success: function (response) {
                                    if (response.success == true && response.data.profile_uploaded > 0) {
                                        Notiflix.Notify.Success('Patient Profile Uploaded !');
                                    }
                                }
                            });

                        }

                    }
                });


            });
            //add ComorbiditiesAdd
            ///step 2
            $('.add-com').click(function (e) {
                e.preventDefault();
                $('#enquirypopup').modal('show');
            });
            //start add add_comorbidities
            $('#add_comorbidities').click(function (e) {
                e.preventDefault();
                var comorbiditiesname = $('#comorbidities_name').val();
                console.log(comorbiditiesname);
                if (comorbiditiesname.length == 0) {
                    Notiflix.Notify.Failure('Sorry Please Type comorbidities Name Frist !');
                } else {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: 'step_insert_case',
                            comorbiditiesname: comorbiditiesname,
                            data_id: $('#post_id').val()
                        },
                        success: function (response) {
                            if (response.success == true) {

                                $("#all_omorbidities").append(response.data.comorbidities_input);

                                Notiflix.Notify.Success('omorbidities success Aded');
                                $('#enquirypopup').modal('hide');


                            }

                        }
                    });

                }
            });

            $('#calculate_bmx').click(function (e) {
                e.preventDefault();
                var height_in_cm = $('#height_in_cm').val();
                var get_height_m2 = height_in_cm * 4
                var weight_in_kg = $('#weight_in_kg').val();
                var Bmi = get_height_m2 / weight_in_kg;
                Notiflix.Report.Success('BMI IS  ' + Bmi + '', '  ');
            });

            //Previous Medication Get Medical

            $('#category_medical').change(function () {

                var meical_cat = this.value
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {action: 'step_insert_case', category_medical: meical_cat},
                    success: function (response) {
                        console.log(response);
                        if (response.success == true) {


                        }

                    }
                });

            });

            // add previous_medication
            $('#category_medical').on('change', function () {
                Notiflix.Loading.Standard();

                var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
                var get_medic_ajax = $.post(ajaxurl, {
                    action: "get_the_medic_of_category",
                    category: this.value
                }, function (respone) {
                    if (respone.success == true) {
                        var data_ajaxo = respone.data.option
                        var data_ajaxo_li = respone.data.li

                        $('#the_medical option').each(function () {
                            this.remove();

                        });
                        // $('#medic_medic_top .nice-select').remove();
                        $('#the_medical').append(data_ajaxo);

                        $('#the_medical').niceSelect('update');
                    } else {
                        Notiflix.Report.Failure('soory no medic', '"<?php the_field('no_medic_in_category_', 'option'); ?>" <br><br>', 'Okay');
                    }


                }, 'json');

                get_medic_ajax.done(function (data) {
                    // alert(data);
                    Notiflix.Loading.Remove(600);

                });
                get_medic_ajax.fail(function (data) {
                    alert(data);
                });
            });

            $('#previous_medication').click(function (e) {
                e.preventDefault();
                Notiflix.Loading.Standard();

                var the_medical = $('#the_medical').val();
                var add_previousa = $('.co-body').find('select, textarea, input').serializeArray();

                // $('#add_previous').serializeArray();
                var category_medicald = $('#category_medical').val();

                if (the_medical === null) {

                    Notiflix.Report.Failure('pleas sellect medic frist', '"<?php the_field('no_medic_in_category_', 'option'); ?>" <br><br>', 'Okay');
                    Notiflix.Loading.Remove(600);

                } else {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: 'step_insert_case',
                            add_previousama: add_previousa,
                            the_post_id: $('#post_id').val()


                        },
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {

                                $('.maxmax_inner_prev').css('display', 'block');
                                $('.maxmax_inner_prev li').each(function () {
                                    $(this).remove();
                                });

                                $('.maxmax_inner_prev').append(response.data);
                                $(function () {
                                    var Accordion = function (el, multiple) {
                                        this.el = el || {};
                                        this.multiple = multiple || false;

                                        // Variables privadas
                                        var links = this.el.find('.link');
                                        // Evento
                                        links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
                                    }

                                    Accordion.prototype.dropdown = function (e) {
                                        var $el = e.data.el;
                                        $this = $(this),
                                            $next = $this.next();

                                        $next.slideToggle();
                                        $this.parent().toggleClass('open');

                                        if (!e.data.multiple) {
                                            $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
                                        }
                                        ;
                                    }

                                    var accordion = new Accordion($('#accordion'), false);
                                });
                                Notiflix.Loading.Remove(600);

                            } else {
                                Notiflix.Loading.Remove(600);

                            }

                        }
                    });

                }

            });

            $('#step_2').click(function () {
                var step_2form_data = $('#step_2form').serializeArray();
                console.log(step_2form_data);


                var post_id = $('#post_id').val();
                var profile_img = jQuery('#profile_img').prop('files')[0]

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: 'step_insert_case',
                        step_2data: step_2form_data,
                        step_2_post_id: $('#post_id').val()
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success == true) {
                            if (response.data.profile_updated > 0) {
                                Notiflix.Notify.Success('Patient success Updated');

                            } else {
                                Notiflix.Notify.Success('Patient success aded');

                            }
                            ///upload file img
                            $('#post_id').val(response.data.post_id);
                            var formData_files = new FormData();
                            formData_files.append('action', 'step_insert_case');
                            formData_files.append('file_id1', $('#file_id1')[0].files[0]);
                            formData_files.append('file_id2', $('#file_id2')[0].files[0]);
                            formData_files.append('file_id3', $('#file_id3')[0].files[0]);
                            formData_files.append('file_id4', $('#file_id4')[0].files[0]);
                            formData_files.append('post_id', $('#post_id').val());
                            formData_files.append('reports_file', 1);
                            console.log(formData_files);
                            $.ajax({
                                type: "POST",
                                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                                data: formData_files,
                                processData: false, // Don’t process the files
                                contentType: false, // Set content type to false as jQuery will tell the server its a query string reques
                                cache: false,
                                success: function (response) {
                                    if (response.success == true && response.data.profile_uploaded > 0) {
                                        Notiflix.Notify.Success('Patient Profile Uploaded !');
                                    }
                                }
                            });

                        }

                    }
                });
            });
            $('#step_3').click(function (ex) {
                ex.preventDefault();
                Notiflix.Loading.Standard();

                var form_step_3 = $('#form_step_3').serializeArray();
                console.log(form_step_3);
                var post_id = $('#post_id').val();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: 'step_insert_case',
                        step_3data: form_step_3,
                        step_3_post_id: $('#post_id').val()
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success == true) {
                            Notiflix.Notify.Success('Patient success Updated');
                        } else {
                            Notiflix.Notify.Success('Patient success aded');

                        }
                        Notiflix.Loading.Remove(600);

                    }
                });
            });

        });
    </script>

<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.facetwp-facet input').addClass('form-control');
        $('.facetwp-autocomplete-update').removeClass('form-control')
        $('.facetwp-autocomplete-update').addClass('btn');


    });
    $(document).ajaxComplete(function () {
        $('.facetwp-facet input').addClass('form-control');
        $('.facetwp-autocomplete-update').removeClass('form-control')
        $('.facetwp-autocomplete-update').addClass('btn');
    });
</script>
<?php if ($_GET['view_case']): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#post_id').val("<?php echo $_GET['view_case']; ?>")
            ///Read Values//
            var data_form = $.merge($('#frist_step').serializeArray(), $('#step_2form').serializeArray());
            Notiflix.Loading.Circle();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: 'step_insert_case',
                    read_case_edit_data: data_form,
                    post_id: <?php echo $_GET['view_case']; ?>,

                },
                success: function (response) {
                    if (response.success == true) {
                        var obj = response.data;
                        console.log(obj);
                        delete obj["gender"];
                        delete obj["first_joint_symptoms"];
                        delete obj["previous_medication"];
                        delete obj["status"];
                        delete obj["visits"];
                        delete obj["profile_img"];
                        delete obj["file_id1"];
                        delete obj["file_id2"];
                        delete obj["file_id3"];
                        delete obj["file_id4"];

                        Object.keys(obj).forEach(function (key) {
// console.log(key);

                            $('[name="' + key + '"]').val(obj[key]);

                        });
                        $('#NotiflixLoadingWrap').remove();

                    } else {
                        location.reload();

                    }

                }
            });



            $('.save_draft').click(function (e) {
                e.preventDefault();
                var paint_to_drfat = $('#post_id').val();
                if (paint_to_drfat > 0) {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {action: 'step_insert_case', paint_to_drfat: $('#post_id').val()},
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {

                                if (response.data.patient_update == 1) {
                                    //suc Upated
                                    Notiflix.Notify.Success('patient Updated To draft !');
                                }

                            }


                        }
                    });

                } else {
                    Notiflix.Notify.Failure('There is No Case In Session Pleas Complete Frist Step To Allow Remove it!');
                }
            });

            $('.remove_paint').click(function (e) {
                e.preventDefault();
                var paint_to_remove = $('#post_id').val();
                if (paint_to_remove > 0) {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {action: 'step_insert_case', paint_to_remove: $('#post_id').val()},
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {
                                window.location.href = response.data.link_to_redirect; //Will take you to Google.


                            }


                        }
                    });

                } else {
                    Notiflix.Notify.Failure('There is No Case In Session Pleas Complete Frist Step To Allow Remove it!');
                }

            });
            $(" input").prop("disabled", true);
            $(" select").prop("disabled", true);
        });


    </script>
<?php endif; ?>
<?php if ($_GET['edit_case']): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#post_id').val("<?php echo $_GET['edit_case']; ?>")
            ///Read Values//
            var data_form = $.merge($('#frist_step').serializeArray(), $('#step_2form').serializeArray());
            Notiflix.Loading.Circle();
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: 'step_insert_case',
                    read_case_edit_data: data_form,
                    post_id: <?php echo $_GET['edit_case']; ?>,

                },
                success: function (response) {
                    if (response.success == true) {
                        var obj = response.data;
                        sessionStorage.clear('patient_data');
                        sessionStorage.setItem('patient_data', JSON.stringify(obj));
                         delete obj["gender"];
                        delete obj["first_joint_symptoms"];
                        delete obj["previous_medication"];
                        delete obj["status"];
                        delete obj["visits"];
                        delete obj["profile_img"];
                        delete obj["file_id1"];
                        delete obj["file_id2"];
                        delete obj["file_id3"];
                        delete obj["file_id4"];

                        Object.keys(obj).forEach(function (key) {
// console.log(key);

                            $('[name="' + key + '"]').val(obj[key]);

                        });
                        $('#NotiflixLoadingWrap').remove();

                    } else {
                        location.reload();

                    }

                }
            });
           

            $('.save_draft').click(function (e) {
                e.preventDefault();
                var paint_to_drfat = $('#post_id').val();
                if (paint_to_drfat > 0) {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {action: 'step_insert_case', paint_to_drfat: $('#post_id').val()},
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {

                                if (response.data.patient_update == 1) {
                                    //suc Upated
                                    Notiflix.Notify.Success('patient Updated To draft !');
                                }

                            }


                        }
                    });

                } else {
                    Notiflix.Notify.Failure('There is No Case In Session Pleas Complete Frist Step To Allow Remove it!');
                }
            });

            $('.remove_paint').click(function (e) {
                e.preventDefault();
                var paint_to_remove = $('#post_id').val();
                if (paint_to_remove > 0) {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {action: 'step_insert_case', paint_to_remove: $('#post_id').val()},
                        success: function (response) {
                            console.log(response);
                            if (response.success == true) {
                                window.location.href = response.data.link_to_redirect; //Will take you to Google.


                            }


                        }
                    });

                } else {
                    Notiflix.Notify.Failure('There is No Case In Session Pleas Complete Frist Step To Allow Remove it!');
                }

            })

            $('.update_all').click(function (e) {
                e.preventDefault();
                Notiflix.Loading.Circle();

                var arrayDatax = $.merge($('#frist_step').serializeArray(), $('#step_2form').serializeArray(), $('#form_step_3').serializeArray());
                console.log(arrayDatax);
                // $.session.set("frist_step", arrayData);
                // $.session.set("compareLeftContent","value");
                // alert($.session.get("compareLeftContent"));
                var post_id = $('#post_id').val();
                var profile_img = jQuery('#profile_img').prop('files')[0]

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {
                        action: 'step_insert_case',
                        update_data: arrayDatax,
                        post_id: post_id
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.success == true) {
                            if (response.data.profile_updated > 0) {
                                Notiflix.Notify.Success('Patient success Updated');

                            } else {
                                Notiflix.Notify.Success('Patient success aded');

                            }

                            ///upload file img
                            $('#post_id').val(response.data.post_id);
                            var formData = new FormData();
                            formData.append('action', 'step_insert_case');
                            formData.append('profile', $('#profile_img')[0].files[0]);
                            formData.append('post_id', $('#post_id').val());

                            $.ajax({
                                type: "POST",
                                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                                data: formData,
                                processData: false, // Don’t process the files
                                contentType: false, // Set content type to false as jQuery will tell the server its a query string reques
                                cache: false,
                                success: function (response) {
                                    if (response.success == true && response.data.profile_uploaded > 0) {
                                        Notiflix.Notify.Success('Patient Profile Uploaded !');
                                    }
                                }
                            });
                            $('#NotiflixLoadingWrap').remove();

                        }

                    }
                });


            });
            //add ComorbiditiesAdd
            ///step 2
            $('.add-com').click(function (e) {
                e.preventDefault();
                $('#enquirypopup').modal('show');
            });
            //start add add_comorbidities
            $('#add_comorbidities').click(function (e) {
                e.preventDefault();
                var comorbiditiesname = $('#comorbidities_name').val();
                console.log(comorbiditiesname);
                if (comorbiditiesname.length == 0) {
                    Notiflix.Notify.Failure('Soory Please Type comorbidities Name Frist !');
                } else {
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: 'step_insert_case',
                            comorbiditiesname: comorbiditiesname,
                            data_id: $('#post_id').val()
                        },
                        success: function (response) {
                            if (response.success == true) {

                                $("#all_omorbidities").append(response.data.comorbidities_input);

                                Notiflix.Notify.Success('omorbidities success Aded');
                                $('#enquirypopup').modal('hide');


                            }

                        }
                    });

                }
            });

            $('#calculate_bmx').click(function (e) {
                e.preventDefault();
                var height_in_cm = $('#height_in_cm').val();
                var get_height_m2 = height_in_cm * 4
                var weight_in_kg = $('#weight_in_kg').val();
                var Bmi = get_height_m2 / weight_in_kg;
                Notiflix.Report.Success('BMI IS  ' + Bmi + '', '  ');
            });

        });
    </script>
<?php endif; ?>
<?php if ($_GET['add_new_visit']): ?>
    <script type="text/javascript">
        $('#patient__id input').val('<?php echo $_GET['add_new_visit']; ?>').attr('disabled', 'disabled').hide();
    </script>
<?php endif; ?>
<?php if ($_GET['new_visit_aded']): ?>
    <script>
        Notiflix.Confirm.Show('The visit was added successfully', 'Do you want to complete the edit?', 'Yes', 'No', function () {
        }, function () {
            window.location.href = "<?php echo home_url('admin/?filter=1')?>";
        });
    </script>
<?php endif; ?>
<?php if ($_GET['Patient_visits']): ?>
    <script type="text/javascript">

        $(window).load(function () {
            Notiflix.Loading.Circle();
            if ($(document).ready()) {
                $("#NotiflixLoadingWrap").hide();

            }

        });
        <?php if ($_GET['visit_updated']): ?>
        Notiflix.Report.Success('Visit successful updated', ' ', ' okay');
        <?php endif; ?>


    </script>
<?php endif; ?>
<?php if ($_GET['view_visit']): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $(' form input').prop("disabled", true);
            $('.af-submit').remove();
        });
    </script>
<?php endif; ?>


<style>
#NotiflixNotifyWrap div.notiflix-notify {
    padding: 10px;
    font-size: 20px !important;
    white-space: nowrap;
}

#NotiflixNotifyWrap div.notiflix-notify svg.nmi {
    width: 20px;
}

#NotiflixNotifyWrap div.notiflix-notify span.the-message.with-icon {
    margin: 0 10px 0 30px;
    font-size: 13px;
    padding: 0 !important;
    color: #fff !important;
}
</style>