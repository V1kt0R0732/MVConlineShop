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
                        <li class="account__menu--list active"><a href="my-account.html">Dashboard</a></li>
                        <li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li>
                        <li class="account__menu--list"><a href="/user/exit">Log Out</a></li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Orders History</h2>
                        <div class="account__table--area">
                            <table class="account__table">
                                <thead class="account__table--header">
                                <tr class="account__table--header__child">
                                    <th class="account__table--header__child--items">Order</th>
                                    <th class="account__table--header__child--items">Date</th>
                                    <th class="account__table--header__child--items">Orders Status</th>
                                    <th class="account__table--header__child--items">Address</th>
                                    <th class="account__table--header__child--items">Total</th>
                                </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                <?php foreach($orders as $tmp): ?>
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">#<?=$tmp['id']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp['data']['month']?> <?=$tmp['data']['day']?>, <?=$tmp['data']['year']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp['status']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp['adress']?></td>
                                        <td class="account__table--body__child--items">$<?=$tmp['totalPrice']?> USD</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                <tr class="account__table--body__child">
                                    <td class="account__table--body__child--items">
                                        <strong>Order</strong>
                                        <span>#2014</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Date</strong>
                                        <span>November 24, 2022</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Payment Status</strong>
                                        <span>Paid</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Fulfillment Status</strong>
                                        <span>Unfulfilled</span>
                                    </td>
                                    <td class="account__table--body__child--items">
                                        <strong>Total</strong>
                                        <span>$40.00 USD</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
