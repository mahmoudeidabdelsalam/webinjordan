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

    $today = date("m/d/Y");

    $day = date('Y-m-d');

    $birthDate = get_field('birth_date', $patient_id);

    $medication = get_field('medication', $post->ID);

    $previous_medication = get_field('previous_medication', $post->ID);

    


    $birthDate = explode("/", $birthDate);
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y") - $birthDate[2]) - 1) : (date("Y") - $birthDate[2]));

    $disease_duration = get_the_time('Y-m-d', $patient_id);

    $date1 = strtotime($disease_duration);
    $date2 = strtotime($day);

    $diff = abs($date1 - $date2);  

    $years = floor($diff / (365*60*60*24));  
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));  
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)); 

    $disease = $years . ' years / ' . $months . ' months / ' . $days . ' days';

    foreach($fields as $field) {
      if($field['name'] == 'visite_type') {
        $Name = $field['name'];
        $Key = $field['key'];
        $array[$Key] = get_field($Name, $post->ID) - 1;
      } elseif($field['name'] == 'date_of_consultation') {
        $Key = $field['key'];
        $array[$Key] = $today;
      } elseif($field['name'] == 'current_age') {
        $Key = $field['key'];
        $array[$Key] = $age;
      } elseif($field['name'] == 'disease_duration') {
        $Key = $field['key'];
        $array[$Key] = $disease;
      } elseif($field['key'] == 'field_5e00d061f8eb8') {
        $array["field_5e00d061f8eb8"] = array_merge($medication, $previous_medication);
      } elseif($field['key'] == 'field_5e00d01cf8eb7') {
        $array["field_5e00d01cf8eb7"] = array_merge($medication, $previous_medication);
      } elseif($field['key'] == 'field_5e00cf59f8eb6') {
        $array["field_5e00cf59f8eb6"] = "";
      } elseif($field['key'] == 'field_5e00d09ef8eb9') {
        $array["field_5e00d09ef8eb9"] = "";
      } else {
        $Name = $field['name'];
        $Key = $field['key'];
        $array[$Key] = get_field($Name, $post->ID);
      }
    }

    // var_dump($array);

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

  <style>
    .nice-select {
      display: none;
    }
    [data-name="final_medication"] {
        opacity: .8;
        pointer-events: none;
    }

    [data-name="final_medication"] span.select2-selection.select2-selection--multiple {
        border: none;
        background-color: #eee;
        padding: 4px 10px 10px;
    }

    [data-name="final_medication"] span.select2-selection.select2-selection--multiple li.select2-selection__choice.ui-sortable-handle {
        background: transparent;
        border: none;
        border-right: 1px solid #ccc;
        border-radius: 0;
    }

    [data-name="final_medication"] span.select2-selection.select2-selection--multiple li.select2-selection__choice.ui-sortable-handle span.select2-selection__choice__remove {
        display: none;
    }
  </style>
<script type="text/javascript"> 
    $('#form_5df69132505ce > div > div.af-submit.acf-form-submit > button').text("continue To Disease monitoring");
    
    
    var previous_value;
    $("#acf-field_5e00cf59f8eb6").on('shown.bs.select', function(e) {
      previous_value = $(this).val();
    }).change(function() {

      $("#acf-field_5e00d061f8eb8 option[value='" + previous_value + "']").remove();
      previous_value = $(this).val();
    });



    $("#acf-field_5e00cf59f8eb6").on("change", function () {
      var selectedCountry = $(this).children("option:last:selected").val();
      var optionText = $(this).children("option:last:selected").text();
      $('[data-key="field_5e00d061f8eb8"] ul.select2-selection__rendered').append('<li class="select2-selection__choice ui-sortable-handle" title="' + optionText + '">"' + optionText + '"</li>');
      $("#acf-field_5e00d061f8eb8").append('<option value="' + selectedCountry + '" selected="selected"> '+ optionText + '</option>').trigger("change");
    });
</script>




