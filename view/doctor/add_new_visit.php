<?php if ($_GET['add_new_visit']): ?>
  <style type="text/css">
      .wrap-content {
          float: none;
      }
  </style>

  <?php 
    $patient_id   = $_GET['add_new_visit'];

    $vist_data = get_field('visits', $patient_id);

    $last_visit =  end($vist_data);

    $post = get_post($last_visit);

    $fields = get_field_objects($post->ID);

    $array = [];

    foreach($fields as $field) {
      $Name = $field['name'];
      $Key = $field['key'];
      $array[$Key] = get_field($Name, $post->ID);
    }

    $args = array(
      'values' => $array,
    );
  ?>

    

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

  <?php advanced_form("form_5df69132505ce", $args); ?>

 <?php endif; ?>
<script type="text/javascript"> 
    $('#form_5df69132505ce > div > div.af-submit.acf-form-submit > button').text("continue To Disease monitoring");
</script>
