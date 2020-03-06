<?php if ($_GET['edit_visit']): ?>
    <style type="text/css">
        .wrap-content {
            /*margin-left: 300px;*/
            float: none;
            /*padding: 50px 40px;*/
            /*transition: all .3s;*/
        }

        label {
            padding: 6px;
            font-size: 13px;
            color: #32383e;
        }

        .requierdasa {
            /* border: 1px solid red; */
            margin: 11px;
            box-shadow: 0px 0px 7px 1px #e50a0a;
        }

        form#disease_monitoring {
            margin-top: 22px;
        }
    </style>
    <div class="content-top col-xs-12">
        <div class="logo-co">
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="">
            <div class="co-head">
                <h3>
                    Edit
                    <span> Visit</span>
                </h3>
            </div>
        </div>
        <div class="co-extra">
			<?php if ($_GET['disease_monitoring']): ?>

                <a href="<?php echo home_url('admin/?edit_visit=' . $_GET['edit_visit'] . '&patient_id=' . $_GET['patient_id']); ?>">
                    Edit visit</a>        <a
                        href="<?php echo home_url('admin/?edit_case=' . $_GET['patient_id'] . ''); ?>"> edit
                    patient </a>

			<?php else: ?>
                <a href="<?php echo home_url('admin/?edit_visit=' . $_GET['edit_visit'] . '&patient_id=' . $_GET['patient_id'] . '&disease_monitoring=1&new_visit_aded=' . $_GET['edit_visit'] . ''); ?>"
                   style="z-index: 1"
                   class="btn">disease monitoring</a>


			<?php endif; ?>
        </div>

    </div>
	<?php if (!$_GET['disease_monitoring']): ?>
        <div class="case-head col-xs-12">
            <h3>Visit Details</h3>

        </div>

		<?php echo do_shortcode('[advanced_form form="form_5df69132505ce" post="' . intval($_GET['edit_visit']) . '"]'); ?>

	<?php else: ?>
        <div class="case-head col-xs-12">
            <h3>DISEASE MONITORING</h3>

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="t-bottom col-xs-12">

            <form action="#" method="get" id="disease_monitoring" style="">
                <div class="f-item col-md-8 col-xs-12">


                    <div class="form-group hum-wrap col-xs-12">
                        <h5>Mark the swollen joints on mannequin</h5>
                        <div class="has-hum">


                            <div class="hors">
                                <label class="bot bot1">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="1">
                                    <span></span>
                                </label>
                                <label class="bot bot2">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="2">
                                    <span></span>
                                </label>
                                <label class="bot bot3">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="3">
                                    <span></span>
                                </label>
                                <label class="bot bot4">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="4">
                                    <span></span>
                                </label>
                                <label class="bot bot5">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="5">
                                    <span></span>
                                </label>
                                <label class="bot bot6">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="6">
                                    <span></span>
                                </label>
                                <label class="bot bot7">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="7">
                                    <span></span>
                                </label>
                                <label class="bot bot8">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="8">
                                    <span></span>
                                </label>
                                <label class="bot bot9">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="9">
                                    <span></span>
                                </label>
                                <label class="bot bot10">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="10">
                                    <span></span>
                                </label>
                                <label class="bot bot11">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="11">
                                    <span></span>
                                </label>
                                <label class="bot bot12">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="12">
                                    <span></span>
                                </label>
                                <label class="bot bot13">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="13">
                                    <span></span>
                                </label>
                                <label class="bot bot14">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="14">
                                    <span></span>
                                </label>
                                <label class="bot bot15">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="15">
                                    <span></span>
                                </label>
                                <label class="bot bot16">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="16">
                                    <span></span>
                                </label>
                                <label class="bot bot17">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="17">
                                    <span></span>
                                </label>
                                <label class="bot bot18">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="18">
                                    <span></span>
                                </label>
                                <label class="bot bot19">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="19">
                                    <span></span>
                                </label>
                                <label class="bot bot20">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="20">
                                    <span></span>
                                </label>
                                <label class="bot bot21">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="21">
                                    <span></span>
                                </label>
                                <label class="bot bot22">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="22">
                                    <span></span>
                                </label>
                                <label class="bot bot23">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="23">
                                    <span></span>
                                </label>
                                <label class="bot bot24">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="24">
                                    <span></span>
                                </label>
                                <label class="bot bot25">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="25">
                                    <span></span>
                                </label>
                                <label class="bot bot26">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="26">
                                    <span></span>
                                </label>
                                <label class="bot bot27">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="27">
                                    <span></span>
                                </label>
                                <label class="bot bot28">
                                    <input type="checkbox" name="mark_the_swollen_joints_on_mannequin" value="28">
                                    <span></span>
                                </label>
                            </div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/horl.png" alt=""
                                 class="human">
                        </div>
                    </div>
                    <div class="form-group hum-wrap2 col-xs-12">
                        <h5>Mark the tender joints on mannequin</h5>
                        <div class="has-hum">
                            <div class="hors">
                                <label class="bot bot1">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="1">
                                    <span></span>
                                </label>
                                <label class="bot bot2">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="2">
                                    <span></span>
                                </label>
                                <label class="bot bot3">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="3">
                                    <span></span>
                                </label>
                                <label class="bot bot4">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="4">
                                    <span></span>
                                </label>
                                <label class="bot bot5">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="5">
                                    <span></span>
                                </label>
                                <label class="bot bot6">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="6">
                                    <span></span>
                                </label>
                                <label class="bot bot7">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="7">
                                    <span></span>
                                </label>
                                <label class="bot bot8">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="8">
                                    <span></span>
                                </label>
                                <label class="bot bot9">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="9">
                                    <span></span>
                                </label>
                                <label class="bot bot10">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="10">
                                    <span></span>
                                </label>
                                <label class="bot bot11">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="11">
                                    <span></span>
                                </label>
                                <label class="bot bot12">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="12">
                                    <span></span>
                                </label>
                                <label class="bot bot13">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="13">
                                    <span></span>
                                </label>
                                <label class="bot bot14">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="14">
                                    <span></span>
                                </label>
                                <label class="bot bot15">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="15">
                                    <span></span>
                                </label>
                                <label class="bot bot16">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="16">
                                    <span></span>
                                </label>
                                <label class="bot bot17">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="17">
                                    <span></span>
                                </label>
                                <label class="bot bot18">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="18">
                                    <span></span>
                                </label>
                                <label class="bot bot19">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="19">
                                    <span></span>
                                </label>
                                <label class="bot bot20">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="20">
                                    <span></span>
                                </label>
                                <label class="bot bot21">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="21">
                                    <span></span>
                                </label>
                                <label class="bot bot22">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="22">
                                    <span></span>
                                </label>
                                <label class="bot bot23">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="23">
                                    <span></span>
                                </label>
                                <label class="bot bot24">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="24">
                                    <span></span>
                                </label>
                                <label class="bot bot25">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="25">
                                    <span></span>
                                </label>
                                <label class="bot bot26">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="26">
                                    <span></span>
                                </label>
                                <label class="bot bot27">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="27">
                                    <span></span>
                                </label>
                                <label class="bot bot28">
                                    <input type="checkbox" name="mark_the_tender_joints_on_mannequin" value="28">
                                    <span></span>
                                </label>
                            </div>
                            <img src="<?php bloginfo('template_directory'); ?>/images/horl.png" alt=""
                                 class="human">
                        </div>
                    </div>
                    <hr>

                    <button type="button" class="btn btn-success" id="finsih_mark" style="margin:  auto">finish mark
                    </button>
                    <button type="button" class="btn btn-success" id="culc_data" style="margin:  auto">calculate now
                    </button>
                </div>
                <div class="f-item col-md-4 col-xs-12">
                    <div class="f-head col-xs-12">
                        <h3>DISEASE MONITORING </h3>
                    </div>
                    <div class="form-group  col-xs-12">
                        <label for="tender_joint">Tender joint </label>
                        <input type="text" name="tender_joint" id="tender_joint" class="form-control" value="" title=""
                               placeholder="Tender joint">
                    </div>
                    <div class="form-group   col-xs-12">
                        <label for="swollen_joint">Swollen joints </label>

                        <input type="text" name="swollen_joint" id="swollen_joint" class="form-control" value=""
                               title="" placeholder="Swollen joints">
                    </div>
                    <div class="form-group   col-xs-12">
                        <label for="crp">crp</label>

                        <input type="text" name="crp" id="crp" class="form-control" value=""
                               title="" placeholder="CRP">
                    </div>
                    <div class="form-group   col-xs-12">
                        <label for="esr">ESR</label>

                        <input type="text" name="esr" id="esr" class="form-control" value=""
                               title="" placeholder="ESR">
                    </div>
                    <div class="form-group   col-xs-12">
                        <label for="patient_global">Patient Global Health (mm)</label>

                        <input type="text" name="patient_global_helth" id="patient_global" class="form-control" value=""
                               title="" placeholder="Patient Global Health (mm)">
                    </div>
                    <div class="form-group   col-xs-12">
                        <label for="patient_global_assessment">
                            Patient Global Assessment (VAS in cm)</label>

                        <input type="text" name="patient_global_assessment" id="patient_global_assessment"
                               class="form-control" value=""
                               title="" placeholder="Patient Global Assessment (VAS in cm)">
                    </div>
                    <div class="form-group   col-xs-12">
                        <label for="evulator_global_assesment">
                            Evaluator Global Assessment (VAS in cm)</label>

                        <input type="text" name="evulator_global_assesment" id="evulator_global_assesment"
                               class="form-control" value=""
                               title="" placeholder="Evaluator Global Assessment (VAS in cm)">
                    </div>

                    <div class="form-group  col-xs-12" id="culc_type_container">
                        <label for="das_28_type_">calculate type</label>
                        <select name="das_28_type_" id="das_28_type_" class="form-control">
                            <option value="-1">Select</option>
                            <option value="0">3 Variables ESR</option>
                            <option value="1">3 Variables CRP</option>
                            <option value="2">4 Variables ESR</option>
                            <option value="3">4 Variables CRP</option>

                        </select>

                    </div>

                </div>
                <div class="f-item col-md-12 col-xs-12  " id="culculate_container">
                    <div class="f-head col-xs-12">
                        <h3>calculate reasult</h3>
                    </div>
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">type</th>
                            <th scope="col">reasult</th>
                            <th scope="col">status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Das 28</td>
                            <td id="das_value">0</td>
                            <td id="das_reasult">none</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>SDAI</td>
                            <td id="sdai_value">0</td>
                            <td id="sdai_status">none</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>CDAI</td>
                            <td id="cdai_value">0</td>
                            <td id="cdai_status">none</td>
                        </tr>
                        </tbody>
                    </table>


                </div>


            </form>
        </div>
	<?php endif; ?>

<?php endif; ?>
<?php if ($_GET['disease_monitoring']): ?>
    <script type="text/javascript">
        $(document).ready(function () {
            function goToByScroll(id) {
                // Remove "link" from the ID
                id = id.replace("link", "");
                // Scroll
                $('html,body').animate({
                    scrollTop: $("#" + id).offset().top
                }, 'slow');
            }

            $('#finsih_mark').click(function () {
                Notiflix.Loading.Standard();
                var Swollen = [];

                $('[name="mark_the_swollen_joints_on_mannequin"]:checked').each(function (i, e) {
                    Swollen.push($(this).val());
                });
                $('#swollen_joint').val(Swollen.length);

                ////
                var Tender = [];
                $('[name="mark_the_tender_joints_on_mannequin"]:checked').each(function (i, e) {
                    Tender.push($(this).val());
                });
                $('#tender_joint').val(Tender.length);
                console.log(Swollen);
                goToByScroll("disease_monitoring");

                Notiflix.Loading.Remove(600);
            });
            /// sellect data  ///
            var tender_joint = $('input#tender_joint');
            var swollen_joint = $('input#swollen_joint');
            var crp = $('input#crp');
            var esr = $('input#esr');
            var patient_global_helth = $('input#patient_global');
            var patient_global_assessment = $('#patient_global_assessment');
            var evulator_global_assesment = $('#evulator_global_assesment');
            var das_28_type_ = $('select#das_28_type_');
            ///
            $('#culc_data').click(function () {
                Notiflix.Loading.Standard();
                var Swollen_data = [];
                $('[name="mark_the_swollen_joints_on_mannequin"]:checked').each(function (i, e) {
                    Swollen_data.push($(this).val());
                });
                var Tender_data = [];
                $('[name="mark_the_tender_joints_on_mannequin"]:checked').each(function (i, e) {
                    Tender_data.push($(this).val());
                });
                if (das_28_type_.val() == -1) {
                    $('#culc_type_container').addClass('requierdasa');
                } else {
                    $('#culc_type_container').removeClass('requierdasa');
                }


                //
                var montioring = {
                    tender_joint: parseInt(tender_joint.val()),
                    swollen_joint: parseInt(swollen_joint.val()),
                    crp: parseInt(crp.val()),
                    esr: parseInt(esr.val()),
                    patient_global_helth: parseInt(patient_global_helth.val()),
                    patient_global_assessment: parseInt(patient_global_assessment.val()),
                    evulator_global_assesment: parseInt(evulator_global_assesment.val()),
                    das_28_type_: parseInt(das_28_type_.val()),
                    Swollen: Swollen_data,
                    Tender: Tender_data,
                    visit_id:<?php echo $_GET['new_visit_aded']; ?>,
                    patien_id: <?php echo $_GET['patient_id']; ?>,
                    das_28_3var_esr: function () {

                        return (0.56 * Math.sqrt(this.tender_joint) + 0.28 * Math.sqrt(this.swollen_joint) + 0.7 * Math.log(this.esr)) * 1.08 + 0.6;

                    },
                    das_28_3var_crp: function () {

                        return (0.56 * Math.sqrt(this.tender_joint) + 0.28 * Math.sqrt(this.swollen_joint) + 0.36 * Math.log(this.crp + 1)) * 1.1 + 1.15;

                    },
                    das_28_4var_esr: function () {
                        return 0.56 * Math.sqrt(this.tender_joint) + 0.28 * Math.sqrt(this.swollen_joint) + 0.7 * Math.log(this.esr) + 0.014 * this.patient_global_helth


                    },
                    das_28_4var_crp: function () {

                        return 0.56 * Math.sqrt(this.tender_joint) + 0.28 * Math.sqrt(this.swollen_joint) + 0.36 * Math.log(this.crp + 1) + 0.014 * this.patient_global_helth + 0.96

                    },
                    sdai: function () {
                        return this.tender_joint + this.swollen_joint + this.patient_global_assessment + this.evulator_global_assesment + this.crp
                    }
                    ,
                    cdai: function () {
                        return this.tender_joint + this.swollen_joint + this.patient_global_assessment + this.evulator_global_assesment
                    }
                    ,
                    das_28_statusa: function () {
                        if (this.das_28() <= 3.2) {
                            return 1
                        } else if (3.2 < this.das_28() && this.das_28() <= 5.1) {
                            return 2
                        } else if (this.das_28() > 5.1) {
                            return 3
                        }

                    }
                    ,
                    sdai_status: function () {
                        if (this.sdai() > 0.5 && this.sdai() < 3.3) {
                            return 1
                        } else if (this.sdai() > 3.4 && this.sdai() < 11) {
                            return 2
                        } else if (this.sdai() > 11.1 && this.sdai() < 26) {
                            return 3
                        } else if (this.sdai() > 26.1 && this.sdai() < 86) {
                            return 4
                        }

                    },
                    cdai_status: function () {
                        if (this.cdai() > 0 && this.cdai() < 2.8) {
                            return 1
                        } else if (this.cdai() > 2.9 && this.cdai() < 10) {
                            return 2
                        } else if (this.cdai() > 10.1 && this.cdai() < 22) {
                            return 3
                        } else if (this.cdai() > 22.1 && this.cdai() < 76) {
                            return 4
                        }
                    },
                    das_28: function () {
                        if (this.das_28_type_ == -1) {
                            return 0
                        } else if (this.das_28_type_ == 0) {
                            return this.das_28_3var_esr();
                        } else if (this.das_28_type_ == 1) {
                            return this.das_28_3var_crp();
                        } else if (this.das_28_type_ == 2) {
                            return this.das_28_4var_esr();
                        } else if (this.das_28_type_ == 3) {
                            return this.das_28_4var_crp();
                        }


                    }

                }

                /// do function for view data
                if (montioring.das_28_type_ !== -1) {
                    // das 28
                    $('td#das_value').text(montioring.das_28());
                    // update status das 28

                    if (montioring.das_28_statusa() == 1) {
                        $('td#das_reasult').css('background', '#55ca55');
                        $('td#das_reasult').text('State of remission');
                    } else if (montioring.das_28_statusa() == 2) {
                        $('td#das_reasult').css('background', '#f3d12e');
                        $('td#das_reasult').text('Moderate disease activity');
                    } else if (montioring.das_28_statusa() == 3) {
                        $('td#das_reasult').css('background', '#ff1a1a');
                        $('td#das_reasult').text('High disease activity');
                    }
                    //SDAI
                    $('td#sdai_value').text(montioring.sdai());
                    // SDAI status
                    if (montioring.sdai_status() == 1) {
                        $('td#sdai_status').css('background', '#55ca55');
                        $('td#sdai_status').text('State of remission');
                    } else if (montioring.sdai_status() == 2) {
                        $('td#sdai_status').css('background', '#f3d12e');
                        $('td#sdai_status').text('State of LDA');
                    } else if (montioring.sdai_status() == 3) {
                        $('td#sdai_status').css('background', '#ff6f0e');
                        $('td#sdai_status').text('Moderate disease activity');
                    } else if (montioring.sdai_status() == 4) {
                        $('td#sdai_status').css('background', '#ff1a1a');
                        $('td#sdai_status').text('High disease activity');
                    } else {
                        $('td#sdai_status').css('background', '#f9ffed');
                        $('td#sdai_status').text('none');
                    }


                    //cdai
                    $('td#cdai_value').text(montioring.cdai());
                    // cdai status
                    if (montioring.cdai_status() == 1) {
                        $('td#cdai_status').css('background', '#55ca55');
                        $('td#cdai_status').text('State of remission');
                    } else if (montioring.cdai_status() == 2) {
                        $('td#cdai_status').css('background', '#f3d12e');
                        $('td#cdai_status').text('State of LDA');
                    } else if (montioring.cdai_status() == 3) {
                        $('td#cdai_status').css('background', '#ff6f0e');
                        $('td#cdai_status').text('Moderate disease activity');
                    } else if (montioring.cdai_status() == 4) {
                        $('td#cdai_status').css('background', '#ff1a1a');
                        $('td#cdai_status').text('High disease activity');
                    } else if (montioring.cdai_status() == 4) {
                        $('td#cdai_status').css('background', '#f9ffed');
                        $('td#cdai_status').text('none');
                    }
                }

                if (montioring.das_28_type_ != -1) {
                    var the_ajax_data = {
                        das_28_type_: montioring.das_28_type_,
                        tender_joint: montioring.tender_joint,
                        swollen_joint: montioring.swollen_joint,
                        crp: montioring.crp,
                        esr: montioring.esr,
                        patient_global_helth: montioring.patient_global_helth,
                        patient_global_assessment: montioring.patient_global_assessment,
                        evulator_global_assesment: montioring.evulator_global_assesment,
                        Tender: montioring.Tender,
                        Swollen: montioring.Swollen,
                        cdai: montioring.cdai(),
                        sdai: montioring.sdai(),
                        das_28_statusa: montioring.das_28_statusa(),
                        sdai_status: montioring.sdai_status(),
                        cdai_status: montioring.cdai_status(),
                        das_28: montioring.das_28(),
                        visit_id:<?php echo $_GET['new_visit_aded']; ?>,
                        patien_id: <?php echo $_GET['patient_id']; ?>,


                    }
                    console.log(the_ajax_data);
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "<?php echo admin_url('admin-ajax.php'); ?>",
                        data: {
                            action: 'das_save',
                            data_montoring: the_ajax_data,
                            data_json: JSON.stringify(the_ajax_data)
                        },
                        success: function (response) {
                            if (response.success == true) {
                                Notiflix.Confirm.Show('Saved successfully', 'Results have been saved. Do you want to continue editing?\n', 'Yes', 'No', function () {

                                }, function () {

                                    window.location.href = "<?php echo home_url('/admin/?edit_case=' . $_GET['patient_id']); ?>";

                                });

                            }

                        }
                    });

                }

                Notiflix.Loading.Remove(600);

            });
        });
    </script>
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('[name="acf[field_5e35398492f06]"]').val();
        $('[name="acf[field_5e35398492f06]"]').attr('value', 1);
        var datahide = [
            'field_5e45281504ff4', 'field_5e45283404ff5', 'field_5e45284404ff6', 'field_5e45285104ff7', 'field_5e45285d04ff8', 'field_5e45286f04ff9', 'field_5e45288204ffa', 'field_5e4528a004ffb', 'field_5e4e6ba712702', 'field_5e4e6e4c2917b'
        ]

        for (xa = 0; xa < datahide.length; xa++) {
            $('[data-key="' + datahide[xa] + '"]').addClass('acf-hidden');

        }

		<?php $this_visit_have_data = get_field('_disses_json', intval($_GET['edit_visit']));
		if ($this_visit_have_data){
		// this culculate has data
		?>
        Notiflix.Loading.Standard();

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: {
                action: 'get_disess_data',
                visit_ID: <?php echo intval($_GET['edit_visit']); ?>,
            },
            success: function (response) {
                if (response.success == true) {
                    var the_data = JSON.parse(response.data);
                    Object.keys(the_data).forEach(function (key) {
                        if (key == "Tender") {
                            $('[name="mark_the_tender_joints_on_mannequin"]').each(function () {
                                //

                                if (the_data["Tender"].includes(this.value)) {
                                    // if in array tenders
                                    $(this).attr("checked", "checked");
                                }
                            });
                        }
                        if (key == "Swollen") {
                            $('[name="mark_the_swollen_joints_on_mannequin"]').each(function () {
                                //

                                if (the_data["Swollen"].includes(this.value)) {
                                    // if in array tenders
                                    $(this).attr("checked", "checked");
                                }
                            });
                        }
                        if (key == "das_28_type_") {
                            $('[name="das_28_type_"] option').each(function () {
                                if (this.value == the_data[key]) {
                                    $(this).attr("selected", 'selected');
                                }
                            });
                            $('[name="das_28_type_"]').niceSelect("update");
                        }
                        if (key == "cdai_status") {
                            var cdai_status_datas = the_data[key];
                            // cdai status
                            if (cdai_status_datas == 1) {
                                $('td#cdai_status').css('background', '#55ca55');
                                $('td#cdai_status').text('State of remission');
                            } else if (cdai_status_datas == 2) {
                                $('td#cdai_status').css('background', '#f3d12e');
                                $('td#cdai_status').text('State of LDA');
                            } else if (cdai_status_datas == 3) {
                                $('td#cdai_status').css('background', '#ff6f0e');
                                $('td#cdai_status').text('Moderate disease activity');
                            } else if (cdai_status_datas == 4) {
                                $('td#cdai_status').css('background', '#ff1a1a');
                                $('td#cdai_status').text('High disease activity');
                            } else {
                                $('td#cdai_status').css('background', '#f9ffed');
                                $('td#cdai_status').text('none');
                            }

                        }
                        if (key == "das_28_statusa") {
                            var das_28_statusas = the_data[key];
                            if (das_28_statusas == 1) {
                                $('td#das_reasult').css('background', '#55ca55');
                                $('td#das_reasult').text('State of remission');
                            } else if (das_28_statusas == 2) {
                                $('td#das_reasult').css('background', '#f3d12e');
                                $('td#das_reasult').text('Moderate disease activity');
                            } else if (das_28_statusas == 3) {
                                $('td#das_reasult').css('background', '#ff1a1a');
                                $('td#das_reasult').text('High disease activity');
                            }

                        }
                        if (key == "sdai_status") {
                            var sdai_statusza = the_data[key];
                            // SDAI status
                            if (sdai_statusza == 1) {
                                $('td#sdai_status').css('background', '#55ca55');
                                $('td#sdai_status').text('State of remission');
                            } else if (sdai_statusza == 2) {
                                $('td#sdai_status').css('background', '#f3d12e');
                                $('td#sdai_status').text('State of LDA');
                            } else if (sdai_statusza == 3) {
                                $('td#sdai_status').css('background', '#ff6f0e');
                                $('td#sdai_status').text('Moderate disease activity');
                            } else if (sdai_statusza == 4) {
                                $('td#sdai_status').css('background', '#ff1a1a');
                                $('td#sdai_status').text('High disease activity');
                            } else if (sdai_statusza == 4) {
                                $('td#sdai_status').css('background', '#f9ffed');
                                $('td#sdai_status').text('none');
                            }

                        }
                        if (key == "das_28") {
                            // set value of cdai
                            $('td#das_value').text(the_data[key]);

                        }
                        if (key == "cdai") {
                            // set value of cdai
                            $('td#cdai_value').text(the_data[key]);

                        }
                        if (key == "sdai") {
                            //SDAI
                            $('td#sdai_value').text(the_data[key]);

                        }
                        $('[name="' + key + '"]').val(the_data[key]);
                    });
                }
                Notiflix.Loading.Remove(600);

            }
        });

		<?php }?>


		<?php if ($_GET['disease_monitoring'] && $_GET['this_view_dises']):?>
        var allInputs = $( ":input" );

        allInputs.each(function () {
            $(this).attr("disabled","disabled");
        });
		<?php endif; ?>
    });
</script>
