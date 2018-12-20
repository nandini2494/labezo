<!DOCTYPE HTML>
<html>
    <head>
        <title>Labezo</title>
        <!--css-->
        <?php echo $this->Html->css('buyer/bootstrap.css') ?>
        <?php echo $this->Html->css('buyer/style.css') ?>
        <?php echo $this->Html->css('buyer/font-awesome.css') ?>
        <!--css-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <?php echo $this->Html->script('buyer/jquery.min.js') ?>
        <?php echo $this->Html->script('buyer/main.js') ?>
        <?php echo $this->Html->script('buyer/responsiveslides.min.js') ?>

        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <!--mycart-->
        <?php echo $this->Html->script('buyer/bootstrap-3.1.1.min.js') ?>
        <?php echo $this->Html->script('buyer/jstarbox.js') ?>
        <?php echo $this->Html->css('buyer/jstarbox.css') ?>

        <script type="text/javascript">
            jQuery(function () {
                jQuery('.starbox').each(function () {
                    var starbox = jQuery(this);
                    starbox.starbox({
                        average: starbox.attr('data-start-value'),
                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                        ghosting: starbox.hasClass('ghosting'),
                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                        stars: starbox.attr('data-star-count') || 5
                    }).bind('starbox-value-changed', function (event, value) {
                        if (starbox.hasClass('random')) {
                            var val = Math.random();
                            starbox.next().text(' ' + val);
                            return val;
                        }
                    })
                });
            });
        </script>
        <!--//End-rate-->

        <style>
            .categories a {
                color: #fff;                
            }

            .categories a:hover {
                text-decoration: none;
            }
        </style>

    </head>
    <body>
        <!--header-->
        <div class="header">
            <?php echo $this->Element('buyer/header_top') ?>
            <?php echo $this->Element('buyer/header') ?>
        </div>
        <!--header-->

        <!--content-->
        <div class="content">
            <div class="products-agileinfo products-agileinfo1">

                <div class="">
                    <div class="product-agileinfo-grids product-agileinfo-grids1 w3l">
                        <div class="col-md-2 product-agileinfo-grid catagry_section">
                            <div class="categories">
                                <h3><a href="my_account.html">My Account</a></h3>
                                <ul class="tree-list-pad remove_padding">
                                    <li><a href="my_order.html"><label class="active">My Orders </label></a></li>
                                    <li><a href="change_pwd.html"><label>Change Password </label></a></li>
                                    <li><a href="address.html"><label>Addresses </label></a></li>
                                    <!-- <li><a href="profile_setting.html"><label>Profile Settings </label></a></li>
                                    <li><a href="update_email.html"><label>Update Email/Mobile </label></a></li> -->
                                    <li><a href="deactvate_account.html"><label>Deactivate Account </label></a></li>
                                    <!-- <li><a href="#"><label>Notifications </label></a></li>
                                    <li><a href="#"><label>Gift Card </label></a></li>
                                    <li><a href="#"><label>Wallet </label></a></li>
                                    <li><a href="#"><label>My Saved Cards </label></a></li>
                                    <li><a href="#"><label>My Rewards </label></a></li> -->
                                    <li><a href="review_rating.html"><label>My Reviews & Ratings </label></a></li>
                                    <li><a href="my_wishlist.html"><label>My Wishlist </label></a></li>
                                    <li><a href="return_product.html"><label>Return Product</label></a></li>
                                    <li><a href="<?php echo Router::url(['controller' => 'buyers/logout']) ?>"><label>Logout </label></a></li>
                                </ul>
                            </div>

                        </div>

                        <div class="col-md-9">

                            <?php foreach ($order_tracker['order'] as $order) {
                                $total_price = 0; foreach ($order_tracker['order_detail'] as $order_data) { $total_price += $order_data['product_order']['amount']; }?>
                            <div class="col-md-12 track_deatil_use">
                                <div class="col-md-5 table_detail_div">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td colspan="2" class="table_row_use">Order Details</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table_second_row">
                                            <tr>
                                                <td>Order Id</td>
                                                <td><?php echo $order['product_order']['order_id'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Order Date</td>
                                                <td><?php echo date('D,d-M-Y',strtotime($order['product_order']['order_date'])) ?> <?php echo date('h:i A',strtotime($order['product_order']['order_date'])) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Amount</td>
                                                <td>$<?php echo number_format($total_price, 2) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="col-md-4 table_detail_div">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td colspan="2" class="table_row_use">Address</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table_third_row">
                                            <tr>
                                                <td colspan="2"><?php echo $order['shipping_address']['firstname'] ?> <?php echo $order['shipping_address']['lastname'] ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><?php echo $order['shipping_address']['address1'] ?>, <?php echo $order['shipping_address']['city'] ?>, <?php echo $order['shipping_address']['state'] ?>, <?php echo $order['shipping_address']['country'] ?>(<?php echo $order['shipping_address']['postal_code'] ?>)</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td><?php echo $order['shipping_address']['mobile'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                                <div class="col-md-3 table_detail_div_use">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td colspan="2" class="table_row_use">Manage Order</td>
                                            </tr>
                                        </thead>
                                        <tbody class="table_second_row">
                                            <tr>
                                                <td colspan="2">Request Invoice</td>
                                            </tr>                                           
                                        </tbody>
                                    </table>
                                </div> 
                            </div>
                            <?php } ?>
                            <div class="personal_info info1">
                                <div class="title">
                                    <h4>Order Track</h4>
                                </div>                                

                                <?php $total = 0; foreach ($order_tracker['order_detail'] as $order_detail) { ?>
                                <div class="row row_pad">
                                    <div class="col-md-4 table_data_div">
                                        <table class="data_table">
                                            <tr>
                                                <td>
                                                    <img src="<?php echo DOMAIN_NAME ?><?php echo $order_detail['product']['image'] ?>" class="table_image_div_use">
                                                </td>
                                                <td>
                                                    <?php echo $order_detail['product_order']['product_name'] ?>
                                                    <?php foreach ($order_tracker['option'] as $option) {
                                                    foreach ($order_tracker['option_desc'] as $option_desc) {
                                                    $option_id = explode(',',$order_detail['product_order']['product_option']); 
                                                    $option_desc_id = explode(',',$order_detail['product_order']['product_option_desc']); 
                                                    for($i = 0; $i < count(explode(',',$order_detail['product_order']['product_option'])); $i++) {
                                                        if(($option['option_name']['option_id'] == $option_id[$i]) && ($option_desc['option_description']['option_desc_id'] == $option_desc_id[$i])) {
                                                    ?>
                                                    <p class="para_use"><?php echo $option['option_name']['option_name']; ?> : <?php echo $option_desc['option_description']['option_desc_name'] ?></p>
                                                    <?php } } } } ?>
                                                    <p>Quantity: <?php echo $order_detail['product_order']['quantity'] ?></p>
                                                </td>
                                                <td class="table_row_datat">$<?php echo number_format($order_detail['product_order']['amount'],2) ?></td>
                                                <?php $total += $order_detail['product_order']['amount']; ?>
                                            </tr>
                                        </table>                                        
                                    </div>
                                    <div class="col-md-8 table_data_div">
                                        <div class="shop-tracking-status">
                                            <div class="well2">

                                                <div class="order-status">

                                                    <div class="order-status-timeline">
                                                        <!-- class names: c0 c1 c2 c3 and c4 -->
                                                        <div class="order-status-timeline-completion c0"></div>
                                                    </div>
                                                    
                                                    <?php if($order_detail['product_order']['order_status'] == '2') { ?>
                                                    <div class="image-order-status image-order-status-new active img-circle <?php echo ($order_detail['product_order']['order_status'] == '2' ? 'accept_data' : '') ?>">
                                                        <span class="status">Cancelled</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="image-order-status image-order-status-new active img-circle <?php echo ($order_detail['product_order']['order_status'] == '3' || $order_detail['product_order']['order_status'] == '4' || $order_detail['product_order']['order_status'] == '5' || $order_detail['product_order']['order_status'] == '1' || $order_detail['product_order']['order_status'] == '6' || $order_detail['product_order']['order_status'] == '7' ? 'progress_data' : '') ?>">
                                                        <span class="status">Accepted</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($order_detail['product_order']['order_status'] == '7') {  ?>
                                                    <div class="image-order-status image-order-status-active active img-circle <?php echo ($order_detail['product_order']['order_status'] == '5' || $order_detail['product_order']['order_status'] == '1' || $order_detail['product_order']['order_status'] == '6' || $order_detail['product_order']['order_status'] == '7' ? 'shipped_data' : '') ?>">
                                                        <span class="status">Shipped</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <div class="image-order-status image-order-status-intransit active img-circle <?php echo ($order_detail['product_order']['order_status'] == '1' || $order_detail['product_order']['order_status'] == '6' || $order_detail['product_order']['order_status'] == '7' ? 'deliver_data' : '') ?>">
                                                        <span class="status">Delivered</span>
                                                        <div class="icon"></div>
                                                    </div>

                                                    <div class="image-order-status image-order-status-delivered active img-circle <?php echo ($order_detail['product_order']['order_status'] == '6' || $order_detail['product_order']['order_status'] == '7' ? 'complete_data' : '') ?>">
                                                        <span class="status">Completed</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <div class="image-order-status image-order-status-completed active img-circle <?php echo ($order_detail['product_order']['order_status'] == '7' ? 'complete_data' : '') ?>">
                                                        <span class="status">Returned</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="image-order-status image-order-status-active active img-circle <?php echo ($order_detail['product_order']['order_status'] == '4' || $order_detail['product_order']['order_status'] == '5' || $order_detail['product_order']['order_status'] == '1' || $order_detail['product_order']['order_status'] == '6' ? 'progress_data' : '') ?>">
                                                        <span class="status">In progress</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <div class="image-order-status image-order-status-intransit active img-circle <?php echo ($order_detail['product_order']['order_status'] == '5' || $order_detail['product_order']['order_status'] == '1' || $order_detail['product_order']['order_status'] == '6' ? 'shipped_data' : '') ?>">
                                                        <span class="status">Shipped</span>
                                                        <div class="icon"></div>
                                                    </div>

                                                    <div class="image-order-status image-order-status-delivered active img-circle <?php echo ($order_detail['product_order']['order_status'] == '1' || $order_detail['product_order']['order_status'] == '6' ? 'deliver_data' : '') ?>">
                                                        <span class="status">Delivered</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <div class="image-order-status image-order-status-completed active img-circle <?php echo ($order_detail['product_order']['order_status'] == '6' ? 'complete_data' : '') ?>">
                                                        <span class="status">Completed</span>
                                                        <div class="icon"></div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>    
                                </div> 
                                <?php } ?>
                                <div class="row">
                                    <div class="col-md-12 total_cost_div">
                                        <p class="total_price_row">Total&nbsp;&nbsp;&nbsp;&nbsp;$<?php echo number_format($total, 2) ?></p>                                       
                                    </div>    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>
<!--content-->
<!---footer--->
<footer>
    <div class="footer-top">
        <div class="footer_menu">
            <ul>
                <li><a href="../term-contitions.html">Term And Contitions</a></li>
                <!-- <li><a href="seller.html">Seller Policy</a></li>
                <li><a href="buyer.html">Buyer Policy</a></li> -->
                <li><a href="../Privacy.html">Privacy Policy</a></li>
                <li><a href="../faq.html">Help &amp; Faq</a></li>
                <!-- <li><a href="#">Coupon code</a></li> -->
            </ul>
        </div>

        <div class="footer-logo">
            <img src="<?php echo DOMAIN_NAME ?>img/small-logo.png" class="img-responsive">
        </div>
        <div class="clearfix"></div>
        <div class="social_icon">
            <ul>
                <li><img src="<?php echo DOMAIN_NAME ?>img/fb.png" class="img-responsive"></li>
                <li><img src="<?php echo DOMAIN_NAME ?>img/twitter-icon.png" class="img-responsive"></li>
                <li><img src="<?php echo DOMAIN_NAME ?>img/in.png" class="img-responsive"></li>
                <li><img src="<?php echo DOMAIN_NAME ?>img/google.png" class="img-responsive"></li>
            </ul>
        </div>
    </div>
</footer>
<!---footer--->
<div class="clearfix"></div>
<!--copy-->
<div class="copy_right">
    <p>© 2017 . All Rights Reserved  <a href="http://www.acumaxtechnologies.com/">AcumaxTechnologies</a></p>
</div>
<!--copy-->


</body>
</html>