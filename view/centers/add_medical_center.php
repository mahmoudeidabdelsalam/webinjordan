<?php if ($_GET['add_medical_center']): ?>
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
					new
					<span> Medical center</span>
				</h3>
			</div>
		</div>

	</div>
	<div class="case-head col-xs-12">
		<h3>Add new center</h3>

	</div>

 	<?php echo  do_shortcode('[advanced_form form="form_5e285d20b234b"  user="new"]'); ?>


<?php endif; ?>