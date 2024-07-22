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
                        <li class="account__menu--list active">Orders</li>
                        <li class="account__menu--list"><a href="/user/setting">Settings</a></li>
                        <li class="account__menu--list"><a href="/user/exit">Log Out</a></li>
                    </ul>
                    <div class="coupon-wrapper">
                        <div class="coupon-container">
                            <ul class="coupon">
                                <li>
                                    <h2><?=$coupon['name']?> Code: <?=$coupon['coupon']?></h2>
                                    <p id="timer">Time left: <span id="time">00:00:00</span></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Orders History</h2>
                        <div class="account__table--area">
                        <?php if(isset($orders) && !empty($orders)){ ?>
                            <table class="account__table">
                                <thead class="account__table--header">
                                <tr class="account__table--header__child">
                                    <th class="account__table--header__child--items">Order</th>
                                    <th class="account__table--header__child--items">Date</th>
                                    <th class="account__table--header__child--items">Orders Status</th>
                                    <th class="account__table--header__child--items">Address</th>
                                    <th class="account__table--header__child--items">Coupon</th>
                                    <th class="account__table--header__child--items">Total</th>
                                </tr>
                                </thead>
                                <?php foreach($orders as $tmp): ?>
                                <tbody class="account__table--body mobile__none <?php if($tmp['status'] == 'Замовлення Вже їде до вас') echo " result_order_title_green"; else { echo " result_order_title_aqua"; }?>">
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">#<?=$tmp['id']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp['data']['month']?> <?=$tmp['data']['day']?>, <?=$tmp['data']['year']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp['status']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp['adress']?></td>
                                        <?php if(isset($tmp['coupon_num'], $tmp['coupon_value'])){ ?>
                                            <td class="account__table--body__child--items"><b><?=$tmp['coupon_num']?></b> - <?=$tmp['coupon_value']?>%</td>
                                        <?php } else { ?>
                                            <td class="account__table--body__child--items">None</td>
                                        <?php } ?>
                                        <td class="account__table--body__child--items">$<?=$tmp['totalPrice']?> USD</td>
                                    </tr>
                                </tbody>
                                <tbody <?php if($tmp['status'] == 'Замовлення Вже їде до вас') echo "class='order_result_green'"; else { echo "class='order_result_aqua'"; }?>>
                                    <?php foreach($tmp['products'] as $tmp_2): ?>
                                    <tr class="account__table--body__child ">
                                        <td class="account__table--body__child--items"><?=$tmp_2['num']?></td>
                                        <td class="account__table--body__child--items"><img src="/admin/images/product/<?=$tmp_2['photo']?>" width="50px"></td>
                                        <td class="account__table--body__child--items"><?=$tmp_2['name']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp_2['count']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp_2['price']?></td>
                                        <td class="account__table--body__child--items"><?=$tmp_2['total_price']?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <?php endforeach;?>
                            </table>
                            <?php } else{ ?>
                            <h2>Не має Замволень? Слід зробити --> <a href="/">Main</a></h2>
                            <?php } ?>
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

<script>
    // Получаем данные из PHP
    var creationTime = "<?php echo $coupon['time_created']; ?>";
    var lifetime = <?php echo $coupon['active_day']; ?>;
</script>
<script src="/template/assets/js/timer.js"></script>
<?php
require_once(ROOT.'/views/footer.php');
?>
