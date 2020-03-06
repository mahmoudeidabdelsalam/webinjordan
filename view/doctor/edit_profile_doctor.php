<?php if ($_GET['edit_profile'] && in_array("doctor",_wp_get_current_user()->roles)): ?>
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
					edit
					<span> profile</span>
				</h3>
			</div>
		</div>

	</div>
	<div class="case-head col-xs-12">
		<h3>edit profile</h3>

	</div>

	<?php echo  do_shortcode('[advanced_form form="form_5e5cd425b0b41" user="current"]

'); ?>


<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function () {

	    $('.disabled input').attr('disabled',"disabled");
	    $('input#acf-field_5e5cd4fdfd5d1').val(null);
	    // $('button.acf-button.af-submit-button.btn').innerText("update ");
     });
</script>
