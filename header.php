<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sar
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Css Files -->
    <!--        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet">-->
    <link href="<?php bloginfo('template_directory'); ?>/css/notiflix-1.9.1.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory'); ?>/css/style.css" rel="stylesheet">
    <!--    <link href="css/bootstrap-rtl.min.css" rel="stylesheet">-->
    <!--    <link href="css/style-ar.css" rel="stylesheet">-->
    <link href="<?php bloginfo('template_directory'); ?>/css/style-res.css" rel="stylesheet">

    <title><?php bloginfo('name'); ?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/faveicon.png">
	<?php wp_head(); ?>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-2.2.2.min.js"></script>
    <style type="text/css">
        .facetwp-type-fselect .fs-wrap.fs-default {
            height: 45px;
            border: 1px solid #1976d3;
            border-radius: 10px;
            width: 100%;
            color: #1976d3;
            font-family: pop-light;
        }

        .facetwp-type-fselect .fs-label-wrap {
            border: navajowhite;
            line-height: 106%;
            top: 8px;
        }

        .facetwp-type-fselect .fs-dropdown {
            width: 97%;
            margin-top: 18px;
            box-shadow: 0 0 15px 0px #ccc;
        }

        .fs-dropdown {
            width: 100%;
        }

        .fs-dropdown {
            width: 93% !important;
            border-radius: 0px;
            top: 38px;
        }

        .fs-dropdown {
        }

        .fs-dropdown .fs-options {
        }

        .fs-dropdown .fs-options div {
            height: 32px;
        }

        .fs-option.selected.g0 {
        }

        .fs-option.selected {
            background-color: #1976d3;
            color: #fff !important;
        }

        .fs-option.selected .fs-option-label {
            color: #fff;
        }

        .facetwp-type-fselect .fs-wrap, .facetwp-type-fselect .fs-dropdown {
            width: 100% !important;
        }

        .fs-wrap {
            height: 41px;
            border: 1px solid #1976d3;
            border-radius: 10px;
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php if (!is_home() && !is_page(2418)): ?>
<?php
$user_ = _wp_get_current_user();
$roles = $user_->roles;
?>

<div id="loading">
    <div class="loading">
    </div>
</div>
<div class="wrapper col-xs-12">
    <div class="mob-head">
        <div class="container">
            <div class="logo">
                <a href="<?php echo home_url('admin'); ?>">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo.png"
                         alt="<?php bloginfo('name'); ?>">
                </a>
            </div>
            <button type="button" class="on-sidebar">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    <div class="sidebar">
        <div class="side-inner">
            <div class="side-top">
                <button type="button" class="off-sidebar" data-tool="tooltip" title="show / hide sidebar"
                        data-placement="right">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="user-area">
                    <img src="<?php bloginfo('template_directory'); ?>/images/reg-user-ico.png" alt="">
                    <h3><?php echo $user_->user_login; ?></h3>
                    <p><?php foreach ($roles as $role) {
							echo $role . ',';
						} ?> </p>
                </div>
				<?php if (in_array('doctor', $roles) || in_array('administrator', $roles)): ?>

                    <div class="new-case">
                        <a href="#" data-toggle="modal" data-target="#case_pop" data-tool="tooltip" title="add new case"
                           data-placement="right">
                            <i></i>
                            <span>Add New Case</span>
                        </a>
                    </div>
				<?php endif; ?>
            </div>
            <div class="side-middle">
                <ul>
                    <li>
                        <a href="<?php echo home_url('admin/?RA-Dashboard=1'); ?>" data-tool="tooltip"
                           title="Dashboard" data-placement="right">
                            <img src="<?php bloginfo('template_directory'); ?>/images/draft.png" alt="">
                            <span>Dashboard</span>
                        </a>
                    </li>
					<?php if (in_array('doctor', $roles)): ?>
                        <li>
                            <a href="<?php echo home_url('admin/?edit_profile=1'); ?>" data-tool="tooltip"
                               title="Search Cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>my profile</span>
                            </a>
                        </li>   <li>
                            <a href="<?php echo home_url('admin/?filter=1'); ?>" data-tool="tooltip"
                               title="Search Cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/search-ico.png" alt="">
                                <span>Search Cases</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo home_url('admin/?RA-Dashboard=1'); ?>" data-tool="tooltip"
                               title="search cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>Rheumatoid arthritis</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-tool="tooltip"
                               title="search cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>SPA</span>
                            </a>
                        </li>

<!--                        <li>-->
<!--                            <a href="--><?php //echo home_url('/admin/?visits_reports=1'); ?><!--" data-tool="tooltip"-->
<!--                               title="Visit reports" data-placement="right">-->
<!--                                <img src="--><?php //bloginfo('template_directory'); ?><!--/images/active-cases.png" alt="">-->
<!--                                <span>Visit reports</span>-->
<!--                            </a>-->
<!--                        </li> -->


                        <!-- <li>
                            <a href="<?php echo home_url('admin/?cases_status=active '); ?>" data-tool="tooltip" title="active cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>Active Cases</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('admin/?cases_status=draft'); ?>" data-tool="tooltip" title="draft cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/draft.png" alt="">
                                <span>Draft Cases</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('admin/?cases_status=drooped'); ?>" data-tool="tooltip" title="dropped out" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/dropped.png" alt="">
                                <span>Dropped-out</span>
                            </a>
                        </li> -->
					<?php endif; ?>
	                <?php if (in_array('medical_center', $roles) || in_array('administrator', $roles)): ?>
                        <li>
                            <a href="<?php echo home_url('admin/?edit_profile=1'); ?>" data-tool="tooltip"
                               title="Search Cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>my profile</span>
                            </a>
                        </li>   <li>
                            <a href="<?php echo home_url('admin/?filter=1'); ?>" data-tool="tooltip"
                               title="Search Cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/search-ico.png" alt="">
                                <span>Search Cases</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo home_url('admin/?RA-Dashboard=1'); ?>" data-tool="tooltip"
                               title="search cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>Rheumatoid arthritis</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-tool="tooltip"
                               title="search cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>SPA</span>
                            </a>
                        </li>

                        <!--                        <li>-->
                        <!--                            <a href="--><?php //echo home_url('/admin/?visits_reports=1'); ?><!--" data-tool="tooltip"-->
                        <!--                               title="Visit reports" data-placement="right">-->
                        <!--                                <img src="--><?php //bloginfo('template_directory'); ?><!--/images/active-cases.png" alt="">-->
                        <!--                                <span>Visit reports</span>-->
                        <!--                            </a>-->
                        <!--                        </li> -->


                        <!-- <li>
                            <a href="<?php echo home_url('admin/?cases_status=active '); ?>" data-tool="tooltip" title="active cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>Active Cases</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('admin/?cases_status=draft'); ?>" data-tool="tooltip" title="draft cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/draft.png" alt="">
                                <span>Draft Cases</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo home_url('admin/?cases_status=drooped'); ?>" data-tool="tooltip" title="dropped out" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/dropped.png" alt="">
                                <span>Dropped-out</span>
                            </a>
                        </li> -->
	                <?php endif; ?>
                     <?php if (in_array('administrator', $roles)): ?>
                        <li>
                            <a href="<?php echo home_url('admin/?all_centers=1'); ?>" data-tool="tooltip"
                               title="search cases" data-placement="right">
                                <img src="<?php bloginfo('template_directory'); ?>/images/active-cases.png" alt="">
                                <span>medical centers</span>
                            </a>
                        </li>
					<?php endif; ?>
                </ul>
            </div>
            <div class="side-bottom">
                <a href="<?php echo wp_logout_url(); ?>" data-tool="tooltip" title="logout" data-placement="right">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logout.png" alt="">
                    <span>Logout</span>
                </a>
            </div>
        </div>
    </div>
    <div class="overlay-s"></div>

<?php endif; ?>