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
        <?php echo $this->Html->script('buyer/responsiveslides.min.js') ?>
        <?php echo $this->Html->script('buyer/jmain.js') ?>

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
        <?php echo $this->Html->script("buyer/bootstrap-3.1.1.min.js") ?>
        <?php echo $this->Html->script("buyer/jstarbox.js") ?>
        <?php echo $this->Html->script("buyer/jstarbox.js") ?>
        <?php echo $this->Html->css("buyer/jstarbox.css") ?>

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
                                    <li><a href="my_order.html"><label>My Orders </label></a></li>
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
                                    <li><a href="return_product.html"><label class="active">Return Product</label></a></li>
                                    <li><a href="<?php echo Router::url(['controller' => 'buyers/logout']) ?>"><label>Logout </label></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-9 ">
                            <div class="personal_info">
                                <div class="title">
                                    <h4>Return Product</h4>
                                </div>
                                <?php if($error_val == 'submit') { ?>
                                <div class="form-group error_msg"><p>Return Product Details Submitted Successfully</p></div>                                                                    
                                <?php } elseif($error_val == 'error') { ?> 
                                <div class="form-group error_msg"><p>Something Wrong. Order Id and Product Name must be correct.</p></div>
                                <?php } ?>
                                <form method="post">

                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Order Id:</label>
                                        <input class="form-control" name="order_id" placeholder="Order Id" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Product Name:</label>
                                        <input class="form-control" name="product_name" placeholder="Product Name" type="text" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity:</label>
                                        <input class="form-control" name="quantity" type="text" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Reason for Return:</label>
                                        <ul>
                                            <li>
                                                <p>
                                                    <input type="radio" name="reason" id="check1" value="Dead on Arrival" required=""> <label class='normal_font' for='check1'>Dead on Arrival</label>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="radio" name="reason" id="check2" value="Faulty, please supply details" required=""> <label class='normal_font' for='check2'>Faulty, please supply details</label>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="radio" id='check3' name="reason" value="Order Error" required=""> <label class='normal_font' for='check3'>Order Error </label>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="radio" name="reason" id="check4" value="Other, please supply details" required=""> <label class='normal_font' for='check4'>Other, please supply details</label>
                                                </p>
                                            </li>
                                            <li>
                                                <p>
                                                    <input type="radio" name="reason" id="check5" value="Received Wrong Item" required=""> <label class='normal_font' for='check5'>Received Wrong Item </label>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label><span style="color:red;">*</span> Product is Opened</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="radio" name="product_open" id="check_yes" value="Yes" required=""> <label class='normal_font_radio' for='check_yes'>Yes</label>&nbsp;&nbsp;
                                        <input type="radio" name="product_open" id="check_no" value="No" required=""> <label class='normal_font_radio' for='check_no'>No</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Faulty or other details:</label>
                                        <input class="form-control" name="other_detail" placeholder="Faulty or other details" type="text">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-warning pull-right">SUBMIT</button>
                                    </div>
                                </form>
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