     <div class="t-btns">
                    <button type="reset" class="btn btn-danger remove_paint">Discard</button>
                    <button type="reset" class="btn save_draft">Save as draft</button>
         <button type="button" id="print_patient_data" class="btn">Print patient Data</button>
                    <a href="<?php echo home_url('admin/?add_new_visit=' . $_GET['edit_case'] . ''); ?>" class="btn ">Add
                        new Visit</a>
					<?php $get_visits = get_field('visits', intval($_GET['edit_case'] ?: $_GET['view_case'])); ?>

         <?php if($get_visits): ?>
                    <a href="<?php echo home_url('admin/?view_visit=' . end($get_visits) . ''); ?>" class="btn ">Last
                        Visit</a>



                    <a href="<?php echo home_url('admin/?Patient_visits=' . $_GET['edit_case'] ?: $_GET['view_case'] . ''); ?>"
                       class="btn ">Patient Visits</a>
          <?php endif; ?>
                </div>