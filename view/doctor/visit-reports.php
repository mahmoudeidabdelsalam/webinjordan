<?php if ($_GET['visits_reports'] == 1): ?>
    <div class="content-top col-xs-12">
        <div class="logo-co">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
            <div class="co-head">
                <h3>
                    Visits
                    <span>Reports</span>
                </h3>
            </div>
        </div>
        <div class="co-extra">
            <a href="<?php echo home_url('admin/?reports=medication'); ?>" class="btn">reports</a>
        </div>
        <div class="co-extra">
            <a href="<?php echo home_url('admin/?advanced=2'); ?>" class="btn cases" style="margin-right:10px;">Advanced
                search</a>
        </div>
    </div>
    <div class="content-mid col-xs-12">
        <div class="adv-filter col-xs-12 filter-sample">
			<?php do_action('visits_filter_report'); ?>
        </div>
        <div class="adv-table col-xs-12">
            <table class="table" id="data-table-th">
                <thead>
                <tr>
                    <th>File No.</th>
                    <th>Patient Name</th>
                    <th>Patient Status</th>
                    <th>Gender</th>
                    <th>
                        <img src="<?php bloginfo('template_directory'); ?>/images/edit.png" alt="">
                    </th>
                    <th>
                        <img src="<?php bloginfo('template_directory'); ?>/images/eye.png" alt="">
                    </th>
                </tr>
                </thead>
                <tbody>

				<?php
				$filter1_query_arg = array(
					'post_type' => 'visites',
					'query_filtera' => true,
					'author' => _wp_get_current_user()->ID,
					'posts_per_page' => -1,
					'author__in' => get_users_id(),
					'facetwp' => true, // we added this
				);
				$filter_1query = new WP_Query($filter1_query_arg);
				$patients = [];
				?>

				<?php if ($filter_1query->have_posts()):while ($filter_1query->have_posts()):$filter_1query->the_post(); ?>
					<?php

					$patient  = intval(get_field('patient__id'));
					if (!in_array($patient,$patients)){
						$patients[]= $patient;
                    }
					?>
				<?php endwhile; endif;
				wp_reset_query(); ?>
				<?php if ($patients): ?>
					<?php foreach ($patients as $post): ?>
						<?php $get_patient = $post; ?>
                        <tr>
                            <td><?php echo get_field('file_no', $get_patient) ?: '0'; ?></td>
                            <td><?php echo get_field('patient_name', $get_patient) ?: 'none'; ?></td>
							<?php $status = get_field('status', $get_patient); ?>
                            <td><?php echo $status['label']; ?></td>
							<?php $gender = get_field('gender', $get_patient); ?>
                            <td><?php echo $gender['label'] ?: 'empty'; ?></td>
                            <td>
                                <a href="<?php echo home_url('admin/?edit_case=' . $get_patient . ''); ?>">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/edit.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo home_url('admin/?view_case=' . $get_patient . ''); ?>">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/eye.png" alt="">
                                </a>
                            </td>
                        </tr>
					<?php endforeach; ?>


				<?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>
<script type="text/javascript">
    $(' body').mousedown(function () {

        $('.fs-option-label span.facetwp-counter').css('display','none');
    });
    $(document).ajaxComplete(function () {
        $('.fs-label-wrap span.facetwp-counter').css('display','none');
    });

</script>
