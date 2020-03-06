<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sar
 */

get_header();
?>
<style>
    div#rcaptcha {
        float: right;
    }
</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div id="loading">
    <div class="loading">
    </div>
</div>
<div class="wrapper col-xs-12">
    <div class="login-wrapper col-xs-12">
        <div class="login-inner col-xs-12"
             style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg.jpg);">
            <div class="login-card col-xs-12">
                <div class="login-img col-md-7 col-xs-12">
                    <img src="images/logo.png" alt="" class="logo">
                    <img src="images/login-stock.png" alt="" class="l-stock">
                </div>
                <div class="login-form col-md-5 col-xs-12">
                    <div class="l-head">
                        <h3>login</h3>
                        <p>Hello, let’s get started</p>
                    </div>

                    <form id="login_form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <h5>User Name</h5>
                            <label>Type your username</label>
                            <input type="text" name="the_user_name" class="form-control"
                                   data-error="user name requierd">
                            <img src="<?php bloginfo('template_directory'); ?>/images/user-ico.png" alt="">
                        </div>
                        <div class="form-group">
                            <h5>Password</h5>
                            <label>Type your Password</label>
                            <input type="password" name="user_pass" class="form-control" data-error="password reqierd">
                            <img src="<?php bloginfo('template_directory'); ?>/images/password-ico.png" alt="">
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <div class="g-recaptcha" id="rcaptcha" style="margin-left: 90px;" data-sitekey="6LfDX98UAAAAAH-joad1JBc8D9cIIJQ73azhyVtV"></div>
                            </div>
                            <h5>
                                Forgot Password? <a onclick="javascript:void(0);" data-toggle="modal"
                                                    data-target="#exampleModal">Reset</a>
                            </h5>
                            <button type="submit" value="sa" name="make_login_now" class="btn">
                                <i class="fa fa-arrow-right"></i>
                                <span>login</span>
                            </button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reset_pass" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="email" placeholder="please enter your email to rescive new password" required
                               name="the_email" class="form-control" data-error="user name requierd">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">reset password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script type="text/javascript">

	<?php if ($_GET['not_activate']): ?>
    Notiflix.Report.Warning('soory your account pending', '"please wait after account activeting " <br><br>- ', 'okay');
	<?php
	endif;
	?>
    function valid_form_data() {


        var validation = ['the_user_name', 'user_pass'];
        var error = [];
        $.each(validation, function (index, value) {
            var valuas = $('[name="' + value + '"]').val();
            if (!valuas) {
                error.push(value);
                Notiflix.Notify.Failure($('[name="' + value + '"]').data('error'));

            }
        });

        console.log(error);
        var response = grecaptcha.getResponse();

        if (response.length == 0) {
            Notiflix.Notify.Failure('Please check captcha Frist');

        }

        if (response.length == 0) {

            return false;

        } else {
            return true;
        }
        if (error.length !== 0) {
            return false;
        } else {
            return true;
        }

    }

    $('#login_form').submit(function (evas) {
        Notiflix.Block.Circle('.login-form', 'Logging in...');

        evas.preventDefault();
        if (valid_form_data() == true) {

            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    username: $('[name="the_user_name"]').val(),
                    password: $('[name="user_pass"]').val(),
                    action: "make_user_login"
                },
                success: function (response) {
                    if (response.success == true && response.data.user_logged_in == 1) {
                        window.location.href = "<?php echo home_url('admin/?RA-Dashboard=1&welcome_login=1'); ?>"; //Will take you to Google.


                    }
                    else if (response.data.error_auth) {
                        Notiflix.Report.Failure('soory you cant login !', '' + response.data.error_auth + '', 'okay');

                    }
                   

                    Notiflix.Block.Remove('.login-form', 1000);

                }
            })
                .done(function (msg) {

                    Notiflix.Loading.Remove(600);
                });
        } else {
            Notiflix.Block.Remove('.login-form', 1000);

        }

    })
    $("#reset_pass").submit(function (evas) {
        Notiflix.Block.Circle('.modal-content', 'reseting password...');
        evas.preventDefault();
        var the_email = $('[name="the_email"]').val();
        if (the_email !== 0) {
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    the_email: the_email,
                    action: "reset_email_pass"
                },
                success: function (response) {
                    console.log(response);
                    if (response.success == true && response.data.emill_sent.length > 10) {
                        Notiflix.Notify.Success(response.data.emill_sent);

                    } else if (response.data.no_email == 1) {
                        Notiflix.Notify.Failure("soory the email you enter not registerd !");

                    }

                }
            })

        }

    });
</script>
