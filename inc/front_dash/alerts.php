<script type="text/javascript">
	<?php if ($_GET['empty_login']): ?>
    Notiflix.Report.Failure('Empty Data Error', '"Pleas Check Your Login Details " <br><br>- And Try Again ', 'Okay');
	<?php endif; ?>
	<?php if ($_GET['error_login']): ?>
    Notiflix.Report.Failure('Login Error', '"<?php echo $_GET['mesg']; ?>', 'Okay');
	<?php endif; ?>
	<?php if ($_GET['logout'] == true): ?>

    Notiflix.Notify.Warning('You are logged out !');

    <?php endif; ?>
    <?php if ($_GET['not_allow'] == 1): ?>

    Notiflix.Report.Warning('Sorry, '," Sorry, you are not allowed to enter the link!", "okay");

    <?php endif; ?>
    <?php if ($_GET['welcome_login']): ?>
    Notiflix.Report.Success( 'logged in successfully', 'Welcome " <b><?php echo _wp_get_current_user()->user_login; ?>" <b><br><br>  To Your Profile', 'Thanks' );

    <?php endif; ?>

    <?php if ($_GET['removed_user']): ?>
    Notiflix.Report.Success( 'Your Case ID ', '<?php echo  $_GET['removed_user']; ?>" <b>" <b><br><br>Removed', 'Okay' );

    <?php endif; ?>
    <?php if ($_GET['center_updated']): ?>
    Notiflix.Report.Success( 'Center has been updated ', '<?php echo  $_GET['removed_user']; ?>   ', 'Okay' );

    <?php endif; ?>   <?php if ($_GET['center_created']): ?>
    Notiflix.Report.Success( 'Center has been created ', '<?php echo  $_GET['removed_user']; ?>   ', 'Okay' );

    <?php endif; ?>
</script>