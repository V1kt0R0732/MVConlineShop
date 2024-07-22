<?php
require_once(ROOT.'/views/header.php');
?>
<main class="main__content_wrapper">
    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <p class="account__welcome--text">Hello, <b><?=$_SESSION['user']['name']?></b>, welcome to your Profile!</p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title h3 mb-20">My Profile</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list"><a href="/profile">Orders</a></li>
                        <li class="account__menu--list active">Settings</li>
                        <li class="account__menu--list"><a href="/user/exit">Log Out</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Edit Your Profile</h2>
                        <div class="account__table--area">
                            <form class="d-block" method="post" action="/user/update">
                                <div class="d-flex">
                                    <input class="checkout__input--field border-radius-5" type="text" name="first_name" <?php if(isset($user['first_name']) && !empty($user['first_name'])) echo "value='{$user['first_name']}'";else {?> placeholder="First_name" <?php } ?>>
                                    <input class="checkout__input--field border-radius-5" type="text" name="last_name" <?php if(isset($user['last_name']) && !empty($user['last_name'])) echo "value='{$user['last_name']}'";else {?> placeholder="Last_name" <?php } ?>>
                                </div>
                                <div class="d-block">
                                    <input class="checkout__input--field border-radius-5" type="text" name="email" <?php if(isset($user['email']) && !empty($user['email'])) echo "value='{$user['email']}'";else {?> placeholder="Email" <?php } ?>>
                                    <input class="checkout__input--field border-radius-5" type="text" name="phone" <?php if(isset($user['phone']) && !empty($user['phone'])) echo "value='{$user['phone']}'";else {?> placeholder="Phone" <?php } ?>>
                                    <input class="checkout__input--field border-radius-5" type="text" name="address" <?php if(isset($user['adress']) && !empty($user['adress'])) echo "value='{$user['adress']}'";else {?> placeholder="Address" <?php } ?>>
                                    <div class="d-flex">
                                        <input class="account__details--footer__btn" type="submit" name="send" value="Apply">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

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
