<?php if ($_GET['add_new_visit']): ?>
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
					<span> Visit</span>
				</h3>
			</div>
		</div>
		<div class="co-extra">
			<a href="<?php home_url('admin/?reports=1'); ?>" class="btn">reports</a>
		</div>
	</div>
	<div class="case-head col-xs-12">
		<h3>Visit  Details</h3>

	</div>

<?php echo  do_shortcode('[advanced_form form="form_5df69132505ce"]'); ?>
 

 <?php endif; ?>
<script type="text/javascript"> 
    $('#form_5df69132505ce > div > div.af-submit.acf-form-submit > button').text("continue To Disease monitoring");
</script>
