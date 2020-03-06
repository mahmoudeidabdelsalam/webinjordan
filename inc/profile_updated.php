<?php

function update_doctor_data($user, $form, $args)
{
	// Do something with the updated user.
	// $user is a WP_User object.
	wp_redirect(home_url('/admin/?RA-Dashboard=1&profile_updated=1'));
	exit;

}

add_action('af/form/editing/user_updated/key=form_5e5cd425b0b41', 'update_doctor_data', 10, 3);
function notic_profile_updated()
{
	?>
	<?php if ($_GET['profile_updated']): ?>
    <script type="text/javascript">
        Notiflix.Report.Success('hello <?php echo _wp_get_current_user()->display_name; ?> ', ' your profile has been updated.  ', 'okay');
    </script>
<?php endif; ?>
<?php }

add_action('wp_footer', 'notic_profile_updated');