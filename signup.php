<?php
/**
 * Template Name: register-doc
 *
 * @package WordPress
 * @subpackage sar
 * @since sar v1.0
 */

get_header();

?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php do_action('ifuser_not_login'); ?>
<div id="loading">
    <div class="loading">
    </div>
</div>

<div class="wrapper col-xs-12">
    <div class="login-wrapper register col-xs-12">
        <div class="login-inner col-xs-12"
             style="background-image: url(<?php bloginfo('template_directory'); ?>/images/bg.jpg);">
            <div class="login-card col-xs-12">
                <div class="login-img col-md-4 col-xs-12">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo1.png" alt="" class="logo">
                    <img src="<?php bloginfo('template_directory'); ?>/images/new-case.png" alt="" class="l-stock">
                </div>
                <div class="login-form col-md-8 col-xs-12">
                    <div class="l-head">
                        <h3>Sign Up</h3>
                        <p>Creat a New Account</p>
                    </div>
                    <form id="register_doctor">
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>full Name</h5>
                            <label>Type your username</label>
                            <input type="text" name="full_name" errorstring="full name requierd" class="form-control">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/1.png" alt="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>User Name</h5>
                            <label>Type your username</label>
                            <input type="text" name="user_name" errorstring="please enter your username "
                                   class="form-control">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/2.png" alt="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Center Name</h5>
							<?php
							$args = array(
								'role' => 'medical_center',
								'order' => 'ASC',
								'orderby' => 'display_name',

							);

							// Create the WP_User_Query object
							$wp_user_query = get_users($args);

							?>
                            <select class="form-control" name="centers" errorstring="pelas sellect your center ! ">
                                <option disabled>Choose a center name</option>
								<?php if ($wp_user_query): ?>
									<?php foreach ($wp_user_query as $user): ?>
                                        <option value="<?php echo $user->ID; ?>"><?php echo $user->display_name; ?></option>
									<?php endforeach; ?>
								<?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Password</h5>
                            <label>Type your Password</label>
                            <input type="password" name="pass1" errorstring="pease enter your password !"
                                   class="form-control">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/4.png" alt="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Address</h5>
                            <label>Type your address</label>
                            <input type="text" name="adress" errorstring="pease enter your adress !"
                                   class="form-control">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/5.png" alt="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Retype Password</h5>
                            <label>Retype your password</label>
                            <input type="password" name="pass2" errorstring="pelase enter your pass "
                                   class="form-control">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/4.png" alt="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Mobile Number</h5>
                            <label>Type your mobile number</label>
                            <input type="text" name="phone_num" errorstring="please enter your phone "
                                   class="form-control">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/7.png" alt="">
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Gender</h5>
                            <label class="gen-ch">
                                <input type="radio" name="gander[]" value="male" checked>
                                <span>male</span>
                            </label>
                            <label class="gen-ch">
                                <input type="radio" name="gander[]" value="female">
                                <span>female</span>
                            </label>
                        </div>
                        <div class="form-group col-md-6 col-xs-12">
                            <h5>Email Address</h5>
                            <label>Type your email address</label>
                            <input type="text" name="email" class="form-control" errorstring="pleas enter your email">
                            <img src="<?php bloginfo('template_directory'); ?>/images/signup/9.png" alt="">
                        </div>
                        <div class="form-group col-xs-12">
                            <div class="g-recaptcha" id="rcaptcha" style="margin-left: 90px;"
                                 data-sitekey="6LeevN0UAAAAAGwYnP9AucjNHLqIOpHUrUaBAIEO"></div>

                            <h5>
                                Have an account? <a href="<?php bloginfo('home'); ?>">login</a>
                            </h5>
                            <button type="submit" class="btn">
                                <i class="fa fa-arrow-right"></i>
                                <span>sign up</span>
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
<script type="text/javascript">
    $(document).ready(function () {
        function validate_form() {
            $('#g-recaptcha-response').attr('errorstring', "please check captcha for security");
            var valid_data = [];
            var pass1 = $('[name="pass2"]').val();
            var pass2 = $('[name="pass2"]').val();
            $(' :input').each(function () {
                if ($(this)[0].name) {
                    if (!$(this).val()) {
                        $(this).addClass('error');
                        valid_data.push($(this)[0].name);
                    } else {
                        $(this).removeClass('error');
                        $(this).addClass('valid');
                    }
                }

            });
            $.each(valid_data, function (index, value) {
                var error_name = $('[name="' + value + '"]').attr('errorstring');
                Notiflix.Notify.Failure(error_name);
            });
            var response = grecaptcha.getResponse();

            if (response.length == 0) {
                return false;
                Notiflix.Notify.Failure('Please check captcha Frist');

            }


            console.log(valid_data)
            if (pass1 !== pass2 || pass1.length == 0 || pass2.length == 0) {
                $('[name="pass2"]').addClass('error');
                $('[name="pass1"]').addClass('error');
                Notiflix.Notify.Failure('Please check the password and make sure it is the same');
            } else {
                $('[name="pass2"]').addClass('valid');
                $('[name="pass1"]').addClass('valid');
            }
            if (valid_data.length == 0 && pass1 === pass2) {
                return true;
            } else {
                return false;
            }

        }

        $('#register_doctor').submit(function (evanta) {
            Notiflix.Block.Circle('.login-form', 'Please wait...');
            evanta.preventDefault();
            if (validate_form() == true) {
                var the_form_data = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "<?php echo admin_url('admin-ajax.php'); ?>",
                    data: {action: 'register_doctor', doctor_data: the_form_data},
                    success: function (response) {
                        console.log(response);
                        if (response.success == true) {
                            if (response.data.user_logged_in == 1) {
                                Notiflix.Notify.Success('successfully registered');
                                window.location.href = "<?php echo home_url('admin'); ?>"; //Will take you to Google.
                            }


                        }else {
                            Notiflix.Report.Failure('soory cant register', '' + response.data.user_alredy_registerd + '', 'okay');

                        }

                        Notiflix.Block.Remove('.login-form', 1000);

                    }
                });

                console.log('yes good form ');

            } else {
                console.log('not work');
                Notiflix.Block.Remove('.login-form', 1000);

            }
            console.log($(this).serializeArray());

        });
    });
</script>
