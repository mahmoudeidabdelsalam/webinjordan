<?php if ($_GET['all_centers']): ?>
    <div class="content-top col-xs-12">
        <div class="logo-co">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
            <div class="co-head">
                <h3>
                    All medical
                    <span>Centers</span>
                </h3>
            </div>
        </div>

        <div class="co-extra">
            <a href="<?php echo home_url('admin/?add_medical_center=1'); ?>" class="btn cases">add new center</a>
        </div>
    </div>
    <div class="content-mid col-xs-12">

        <div class="adv-table col-xs-12">
            <table class="table" id="data-table-th">
                <thead>
                <tr>
                    <th>ID.</th>
                    <th>Center name</th>
                    <th>Center phone</th>
                    <th>center email</th>
                    <th>
                        <img src="<?php bloginfo('template_directory'); ?>/images/edit.png" alt="">
                    </th>
                    <th>
                        <img src="<?php bloginfo('template_directory'); ?>/images/eye.png" alt="">
                    </th>
                </tr>
                </thead>
                <tbody>
				<?php $args = array(
					'role' => 'medical_center',
					'role__in' => array(),
					'role__not_in' => array(),
					'meta_key' => '',
					'meta_value' => '',
					'meta_compare' => '',
					'meta_query' => array(),
					'date_query' => array(),
					'include' => array(),
					'exclude' => array(),
					'orderby' => 'login',
					'order' => 'ASC',
					'offset' => '',
					'search' => '',
					'number' => '',
					'count_total' => false,
					'fields' => 'all',
					'who' => '',
				);
				$users_centers = get_users($args); ?>
				<?php foreach ($users_centers as $user): ?>
					<?php
					$medical_center_name = get_field('medical_center_name', 'user_' . $user->ID);
					$medica_phone = get_field('medica_phone', 'user_' . $user->ID);
					$medical_center_email = get_field('medical_center_email', 'user_' . $user->ID);
					?>
                    <tr>
                        <td><?php echo $user->ID ?: '0'; ?></td>
                        <td><?php echo $medical_center_name ?: 'none'; ?></td>
						<td><?php echo $medica_phone ?: 'none'; ?></td>
                        <td>
                            <a href="tel:<?php echo $medical_center_email ?: 'none'; ?>"><?php echo $medical_center_email ?: 'none'; ?></a>
                        </td>
                        <td>
                            <a href="<?php echo home_url('admin/?edit_center=' .$user->ID. ''); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/images/edit.png" alt="">
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo home_url('admin/?edit_center=' . $user->ID . ''); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/images/eye.png" alt="">
                            </a>
                        </td>
                    </tr>
				<?php endforeach; ?>


                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>