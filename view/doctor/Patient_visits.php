<?php if ($_GET['Patient_visits']): ?>
    <div class="content-top col-xs-12">
        <div class="logo-co">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
            <div class="co-head">
                <h3>
                    patient
                    <span>Visits</span>
                </h3>
            </div>
        </div>

    </div>
     <div class="case-head col-xs-12">
        <h3>Patient visits</h3>

    </div>

        <div class="adv-table col-xs-12">
            <table class="table" id="data-table-th">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Visit Date</th>
                    <th>Visit Type</th>
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
				$Visits = get_field('visits', intval($_GET['Patient_visits']));

				?>
				<?php if ($Visits): ?>
					<?php $number = 1;
					foreach ($Visits as $visIts): ?>
						<?php $vist_date = get_field('date_of_consultation', $visIts); ?>
						<?php $visite_type = get_field('visite_type', $visIts); ?>
						<?php $vists_type_name = get_term($visite_type, 'visites_category'); ?>

                        <tr>
                            <td><?php echo $number; ?></td>
                            <td><?php echo $vist_date ? : 'none'; ?></td>
                             <td><?php echo $vists_type_name->name; ?></td>
                             <td>
                                <a href="<?php echo home_url('admin/?edit_visit=' . $visIts . ''); ?>">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/edit.png" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo home_url('admin/?view_visit=' . $visIts . ''); ?>">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/eye.png" alt="">
                                </a>
                            </td>
                        </tr>
						<?php $number++; endforeach; ?>
				<?php endif; ?>


                </tbody>
            </table>
        </div>

<?php endif; ?>


