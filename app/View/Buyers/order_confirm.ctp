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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
        <!--//End-rate-->

        <style>            
            .panel-title {display: inline;font-weight: bold;}
            .checkbox.pull-right { margin: 0; }
            .pl-ziro { padding-left: 0px; }

            .panel {
                border: 0px solid transparent;
                background: #f1f1f1;
            }

            .panel-default>.panel-heading .badge {
                color: #ffffff;
                background-color: transparent;
            }
            .panel-heading {
                border-bottom: 0px solid #555555 !important;
            }

            .panel-default>.panel-heading {
                color: #ffffff;
                background-color: #428bca;
                padding-bottom: 1px !important;
            }
            .container.bgr_width_main {
                width: 50%;
                margin-top: 3%;
            }
            .header h3 {
                margin-top: 0;
                margin-bottom: 0;
                line-height: 40px;
            }    
            .product_confirm{border-bottom: 1px solid;}
        </style>

    </head>
    <body>
        <!--header-->
        <div class="header">
            <?php echo $this->Element('buyer/header_top') ?>
            <?php echo $this->Element('buyer/header') ?>
        </div>
        <!--header-->
        <div class=" container bgr_width_main">

            <?php foreach ($order_confirm['order'] as $order) { ?>
            <div class="col-lg-12">
                <h4><b>Product Name</b></h4>
                <hr />
                <div>
                    <center>  
                        <h4>Success - your order is confirmed!</h4>
                        <h5>Order number: <?php echo $order['product_order']['order_id'] ?></h5>
                        <hr />  
                    </center>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <address>
                                <strong>Shipping Address:</strong><br>
                                <?php echo $order['shipping_address']['firstname'] ?> <?php echo $order['shipping_address']['lastname'] ?><br>
                                <?php echo $order['shipping_address']['email'] ?><br>
                                <?php echo $order['shipping_address']['mobile'] ?><br><br>
                                <?php echo $order['shipping_address']['address1'] ?><br>
                                <?php echo $order['shipping_address']['city'] ?>, <?php echo $order['shipping_address']['state'] ?>, <?php echo $order['shipping_address']['country'] ?> (<?php echo $order['shipping_address']['postal_code'] ?>)
                            </address>

                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Billing Address:</strong><br>
                                <?php echo $order['buyer_register']['firstname'] ?> <?php echo $order['buyer_register']['lastname'] ?><br>
                                <?php echo $order['buyer_register']['email'] ?><br>
                                <?php echo $order['buyer_register']['phone'] ?><br><br>
                                <?php echo $order['buyer_register']['address'] ?><br>
                                <?php echo $order['buyer_register']['city'] ?>, <?php echo $order['buyer_register']['state'] ?>, <?php echo $order['buyer_register']['country'] ?> (<?php echo $order['buyer_register']['pin_code'] ?>)
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr class="product_confirm">
                                            <td><strong>Product Name</strong></td>
                                            <td class="text-right"><strong></strong></td>
                                            <td class="text-right"><strong>Price</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0; foreach ($order_confirm['order_detail'] as $order_detail) { ?>
                                        <tr>
                                            <td><?php echo $order_detail['product_order']['product_name'] ?></td>
                                            <td class="text-right"></td>
                                            <td class="text-right">$<?php echo number_format($order_detail['product_order']['amount'],2) ?></td>
                                            <?php $total += $order_detail['product_order']['amount']; ?>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line text-right"><strong>Total</strong></td>
                                            <td class="no-line text-right">$<?php echo number_format($total,2); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

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