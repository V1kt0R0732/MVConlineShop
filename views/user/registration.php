<?php
require_once(ROOT.'/views/header.php');
?>
<main class="main__content_wrapper">
    <!-- Start login section  -->
    <div class="login__section section--padding mb-80">
        <div class="container">
            <form action="/user/registration/result" method="post">
                <div class="login__section--inner">
                    <div class="row-cols-md-1 row-cols-1 centered account__login_div">
                        <div class="account__login register">
                            <div class="account__login--header mb-25">
                                <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                <p class="account__login--header__desc">Register here if you are a new customer</p>
                            </div>
                            <div class="account__login--inner">
                                <label>
                                    <input class="account__login--input" <?php if(isset($_POST['user_name']) && !empty($_POST['user_name'])) echo "value='{$_POST['user_name']}'";else { ?> placeholder="Username" <?php } ?> type="text" name="user_name">
                                </label>
                                <label>
                                    <input class="account__login--input" <?php if(isset($_POST['email']) && !empty($_POST['email'])) echo "value='{$_POST['email']}'"; else { ?>placeholder="Email Addres" <?php } ?> type="email" name="email">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Password" type="password" name="pass">
                                </label>
                                <label>
                                    <input class="account__login--input" placeholder="Confirm Password" type="password" name="re_pass">
                                </label>
                                <input class="account__login--btn btn mb-10" type="submit" name="send" value="Register">
                                <div class="account__login--remember position__relative">
                                    <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                    <span class="checkout__checkbox--checkmark"></span>
                                    <label class="checkout__checkbox--label login__remember--label" for="check2">
                                        I have read and agree to the terms & conditions</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End login section  -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping1.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping2.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">Visa, Paypal, Master</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping3.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">30 day guarantee</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img class="display-block" src="assets/img/other/shipping4.png" alt="shipping img">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">Support every time</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

</main>
<?php
require_once(ROOT.'/views/footer.php');
?>
