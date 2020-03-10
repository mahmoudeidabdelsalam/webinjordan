<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sar
 */
?>
<!-- Javascript Files -->
<!--<script src="--><?php //bloginfo('template_directory'); ?><!--/js/jquery-2.2.2.min.js"></script>-->
<script src="<?php bloginfo('template_directory'); ?>/js/notiflix-1.9.1.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/aos.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/dataTables.responsive.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.nice-select.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/moment-with-locales.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap-datetimepicker.js"></script>
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_ar.min.js"></script>
<script>
    Notiflix.Loading.Init({svgColor:"#1976d3",});
    $('#ev-date').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY'
    });
    $('#ev-date1').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY'
    });
    $('#ev-date2').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY'
    });
    $('#ev-date3').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY'
    });
    $('#ev-date4').datetimepicker({
        useCurrent: false,
        format: 'DD/MM/YYYY'
    });
    $(document).ready(function () {
        // var pravious_medic = $('#previous_medication select').val();
        // // alert(pravious_medic);
        // // $('#stop_patient_medic').hide();
        // $('#previous_medication').on('change', function () {
        //     if ($('#previous_medication select').val() != null) {
        //         if ($('#previous_medication select').val() !== pravious_medic) {
        //             // $('#stop_patient_medic').show();
        //             Notiflix.Report.Warning(' why stop This ? ', '"Pleas Sellect Why You Stop This Medication for This patient ? ', 'Okay');
        //             $('#stop_patient_medic').css('border', '1px solid rgb(79, 51, 51)')
        //         }
        //     }

        //     //
        // });
        /*add button to check box new */
        $('.acf-checkbox-list .button').addClass('btn');
        $('button.acf-button.af-submit-button').addClass('btn');
        //    morning_stifness
        $('input[name=morning_stifness]').change(function () {
            if ($('input[name=morning_stifness]:checked').val() == 1) {
                $('.morning_yes_div').removeClass('hidden');
            }else{
                $('.morning_yes_div').addClass('hidden');
            }
        });
        $('input[name=joint_pain]').change(function () {
            if ($('input[name=morning_stifness]:checked').val() == 1) {
                $('.joint_pain_yes_div').removeClass('hidden');
            }else{
                $('.joint_pain_yes_div').addClass('hidden');
            }
        });
        $('input[name=joint_swelling]').change(function () {
            if ($('input[name=morning_stifness]:checked').val() == 1) {
                $('.joint_swelling_yes_div').removeClass('hidden');
            }else{
                $('.joint_swelling_yes_div').addClass('hidden');
            }
        });
        $('input[name=malignancy]').change(function () {
            if ($('input[name=morning_stifness]:checked').val() == 1) {
                $('.malignancy_-_yes_div').removeClass('hidden');
            }else{
                $('.malignancy_-_yes_div').addClass('hidden');
            }
        });
        $('#print_patient_data').click(function () {
            //https://printjs.crabbly.com/
            console.log(sessionStorage.getItem('patient_data'));
             printJS({
                printable: JSON.parse(sessionStorage.getItem('patient_data')),
                type: 'json',
                properties: ['name', 'email'],
                header: '<h3 class="custom-h3">My custom header</h3>',
                style: '.custom-h3 { color: red; }'
            })

        });

    });

</script>
<?php require get_template_directory() . '/inc/front_dash/alerts.php'; ?>
<?php wp_footer(); ?>
</body>
</html>
