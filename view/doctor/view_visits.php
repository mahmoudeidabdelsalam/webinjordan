<?php if ($_GET['view_visit'] && !$_GET['disease_monitoring']): ?>
    <style type="text/css">
        .wrap-content {
            /*margin-left: 300px;*/
            float: none;
            /*padding: 50px 40px;*/
            /*transition: all .3s;*/
        }
    </style>
    <div class="content-top col-xs-12">
        <div class="logo-co">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
            <div class="co-head">
                <h3>
                    View
                    <span> Visit</span>
                </h3>
            </div>
        </div>
        <div class="co-extra">
            <a href="<?php echo home_url('admin/?edit_visit=' . $_GET['view_visit'] . '&disease_monitoring=1&this_view_dises=1&new_visit_aded=' . $_GET['view_visit'] . '&patient_id=' . get_field('patient__id', intval($_GET['view_visit'])) . ''); ?>"
               style="z-index: 1"
               class="btn">disease monitoring </a>


     
        </div>
    </div>
    <div class="case-head col-xs-12">
        <h3>Visit Details</h3>

    </div>

	<?php echo do_shortcode('[advanced_form form="form_5df69132505ce" post="' . intval($_GET['view_visit']) . '"]'); ?>


<?php endif; ?>
