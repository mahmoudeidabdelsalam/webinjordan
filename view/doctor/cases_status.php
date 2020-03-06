<?php if ($_GET['cases_status']): ?>
<div class="content-top col-xs-12">
    <div class="logo-co">
        <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
        <div class="co-head">
            <h3>
                Active
                <span>cases</span>
            </h3>
        </div>
    </div>
    <div class="co-extra">
        <a href="<?php echo home_url('admin/?reports=1'); ?>" class="btn">reports</a>
    </div>
</div>
<div class="content-mid col-xs-12">

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
				'post_type' => 'patient',
				'patient_query' => 'filter1',
				'meta_key' => 'status',
				'meta_value' => $_GET['cases_status'],
                'posts_per_page' => -1,
				'author__in' => array(1),
				'facetwp' => true, // we added this


			);
			$filter_1query = new WP_Query($filter1_query_arg);
			//			var_dump($filter_1query);
			?>
			<?php if ($filter_1query->have_posts()):while ($filter_1query->have_posts()):$filter_1query->the_post(); ?>

                <tr>
                    <td><?php echo get_field('file_no') ?: '0'; ?></td>
                    <td><?php echo get_field('patient_name') ?: 'none'; ?></td>
					<?php $status = get_field('status'); ?>
                    <td><?php echo $status['label']; ?></td>
					<?php $gender = get_field('gender'); ?>
                    <td><?php echo $gender['label'] ?: 'empty'; ?></td>
                    <td>
                        <a href="<?php echo home_url('admin/?edit_case=' . get_the_ID() . ''); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/images/edit.png" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="<?php echo home_url('admin/?view_case=' . get_the_ID() . ''); ?>">
                            <img src="<?php bloginfo('template_directory'); ?>/images/eye.png" alt="">
                        </a>
                    </td>
                </tr>

			<?php endwhile; endif;
			wp_reset_query(); ?>


            </tbody>
        </table>
    </div>
</div>
<?php endif; ?>