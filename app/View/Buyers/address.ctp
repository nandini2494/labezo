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
        <!--search jQuery-->
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
                                    <li><a href="my_order.html"><label>My Orders </label></a></li>
                                    <li><a href="change_pwd.html"><label>Change Password </label></a></li>
                                    <li><a href="address.html"><label class="active">Addresses </label></a></li>
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
                        <div class="col-md-9 ">
                            <div class="personal_info">
                                <div class="title">
                                    <h4>Personal Information</h4>
                                </div>

                                <form method="post">
                                    <?php foreach ($result as $data) { ?>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Name:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" placeholder="" type="text" name="name" value="<?php echo $data['buyer_register']['name'] ?>">
                                        </div></br>

                                    </div></br>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Street Address:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="address" placeholder="" type="text"  cols="40" rows="3" ><?php echo $data['buyer_register']['address'] ?></textarea></br>
                                        </div>

                                    </div></br>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Landmark:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" name="landmark" placeholder="" type="text" value="<?php echo $data['buyer_register']['landmark'] ?>"><br/>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Phone Number:</label>
                                        </div>
                                        <div class="col-md-9">

                                            <input class="form-control" name="phone" placeholder="" type="text" value="<?php echo $data['buyer_register']['phone_no'] ?>"><br/>
                                        </div>

                                    </div></br>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>State:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="state">
                                                <option value="">Select</option>
                                                <option value="Andaman and Nicobar" <?php echo ($data['buyer_register']['state'] == 'Andaman and Nicobar' ? 'selected="selected"' : '') ?>>Andaman and Nicobar</option>
                                                <option value="Andhra Pradesh" <?php echo ($data['buyer_register']['state'] == 'Andhra Pradesh' ? 'selected="selected"' : '') ?>>Andhra Pradesh</option>
                                                <option value="Arunachal Pradesh" <?php echo ($data['buyer_register']['state'] == 'Arunachal Pradesh' ? 'selected="selected"' : '') ?>>Arunachal Pradesh</option>
                                                <option value="Assam" <?php echo ($data['buyer_register']['state'] == 'Assam' ? 'selected="selected"' : '') ?>>Assam</option>
                                                <option value="Bihar" <?php echo ($data['buyer_register']['state'] == 'Bihar' ? 'selected="selected"' : '') ?>>Bihar</option>
                                                <option value="Chandigarh" <?php echo ($data['buyer_register']['state'] == 'Chandigarh' ? 'selected="selected"' : '') ?>>Chandigarh</option>
                                                <option value="Chhattisgarh" <?php echo ($data['buyer_register']['state'] == 'Chhattisgarh' ? 'selected="selected"' : '') ?>>Chhattisgarh</option>
                                                <option value="Dadra and Nagar Haveli" <?php echo ($data['buyer_register']['state'] == 'Dadra and Nagar Haveli' ? 'selected="selected"' : '') ?>>Dadra and Nagar Haveli</option>
                                                <option value="Daman and Diu" <?php echo ($data['buyer_register']['state'] == 'Daman and Diu' ? 'selected="selected"' : '') ?>>Daman and Diu</option>
                                                <option value="Delhi" <?php echo ($data['buyer_register']['state'] == 'Delhi' ? 'selected="selected"' : '') ?>>Delhi</option>
                                                <option value="Goa" <?php echo ($data['buyer_register']['state'] == 'Goa' ? 'selected="selected"' : '') ?>>Goa</option>
                                                <option value="Gujarat" <?php echo ($data['buyer_register']['state'] == 'Gujarat' ? 'selected="selected"' : '') ?>>Gujarat</option>
                                                <option value="Haryana" <?php echo ($data['buyer_register']['state'] == 'Haryana' ? 'selected="selected"' : '') ?>>Haryana</option>
                                                <option value="Himachal Pradesh" <?php echo ($data['buyer_register']['state'] == 'Himachal Pradesh' ? 'selected="selected"' : '') ?>>Himachal Pradesh</option>
                                                <option value="Jammu and Kashmir" <?php echo ($data['buyer_register']['state'] == 'Jammu and Kashmir' ? 'selected="selected"' : '') ?>>Jammu and Kashmir</option>
                                                <option value="Jharkhand" <?php echo ($data['buyer_register']['state'] == 'Jharkhand' ? 'selected="selected"' : '') ?>>Jharkhand</option>
                                                <option value="Karnataka" <?php echo ($data['buyer_register']['state'] == 'Karnataka' ? 'selected="selected"' : '') ?>>Karnataka</option>
                                                <option value="Kerala" <?php echo ($data['buyer_register']['state'] == 'Kerala' ? 'selected="selected"' : '') ?>>Kerala</option>
                                                <option value="Lakshadweep" <?php echo ($data['buyer_register']['state'] == 'Lakshadweep' ? 'selected="selected"' : '') ?>>Lakshadweep</option>
                                                <option value="Madhya Pradesh" <?php echo ($data['buyer_register']['state'] == 'Madhya Pradesh' ? 'selected="selected"' : '') ?>>Madhya Pradesh</option>
                                                <option value="Maharashtra" <?php echo ($data['buyer_register']['state'] == 'Maharashtra' ? 'selected="selected"' : '') ?>>Maharashtra</option>
                                                <option value="Manipur" <?php echo ($data['buyer_register']['state'] == 'Manipur' ? 'selected="selected"' : '') ?>>Manipur</option>
                                                <option value="Meghalaya" <?php echo ($data['buyer_register']['state'] == 'Meghalaya' ? 'selected="selected"' : '') ?>>Meghalaya</option>
                                                <option value="Mizoram" <?php echo ($data['buyer_register']['state'] == 'Mizoram' ? 'selected="selected"' : '') ?>>Mizoram</option>
                                                <option value="Nagaland" <?php echo ($data['buyer_register']['state'] == 'Nagaland' ? 'selected="selected"' : '') ?>>Nagaland</option>
                                                <option value="Odisha" <?php echo ($data['buyer_register']['state'] == 'Odisha' ? 'selected="selected"' : '') ?>>Odisha</option>
                                                <option value="Pondicherry" <?php echo ($data['buyer_register']['state'] == 'Pondicherry' ? 'selected="selected"' : '') ?>>Pondicherry</option>
                                                <option value="Punjab" <?php echo ($data['buyer_register']['state'] == 'Punjab' ? 'selected="selected"' : '') ?>>Punjab</option>
                                                <option value="Rajasthan" <?php echo ($data['buyer_register']['state'] == 'Rajasthan' ? 'selected="selected"' : '') ?>>Rajasthan</option>
                                                <option value="Sikkim" <?php echo ($data['buyer_register']['state'] == 'Sikkim' ? 'selected="selected"' : '') ?>>Sikkim</option>
                                                <option value="Tamil Nadu" <?php echo ($data['buyer_register']['state'] == 'Tamil Nadu' ? 'selected="selected"' : '') ?>>Tamil Nadu</option>
                                                <option value="Telangana" <?php echo ($data['buyer_register']['state'] == 'Telangana' ? 'selected="selected"' : '') ?>>Telangana</option>
                                                <option value="Tripura" <?php echo ($data['buyer_register']['state'] == 'Tripura' ? 'selected="selected"' : '') ?>>Tripura</option>
                                                <option value="Uttar Pradesh" <?php echo ($data['buyer_register']['state'] == 'Uttar Pradesh' ? 'selected="selected"' : '') ?>>Uttar Pradesh</option>
                                                <option value="Uttrakhand" <?php echo ($data['buyer_register']['state'] == 'Uttarakhand' ? 'selected="selected"' : '') ?>>Uttarakhand</option>
                                                <option value="West Bengal" <?php echo ($data['buyer_register']['state'] == 'West Bengal' ? 'selected="selected"' : '') ?>>West Bengal</option>
                                                <option value="Army Post Office" <?php echo ($data['buyer_register']['state'] == 'Army Post Office' ? 'selected="selected"' : '') ?>>Army Post Office</option>
                                            </select></br>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>City:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" name="city" placeholder="" type="text" value="<?php echo $data['buyer_register']['city'] ?>"></br>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Pincode:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" name="pincode" placeholder="" type="text" value="<?php echo $data['buyer_register']['pin_code'] ?>"></br>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Country:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" name="country" placeholder="Country" type="text" value="<?php echo $data['buyer_register']['country'] ?>"></br>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-warning pull-right">Save Change</button>
                                    </div><br/><br/>
                                    <?php } ?>
                                </form>
                                <div class="clearfix"> </div>

                                <!-- <div class="well well1"> <span>
                                        <b>Mamta Sharma</b></span><br> 
                                    <span>c12, sector2 noida</span><br> 
                                    <span>noida sectore 15<br>
                                        metro station</span><br>
                                    <span>Noida - 121301</span><br> 
                                    <span>Uttar Pradesh</span><br> <span>Ph: 7988995568</span>
                                    <br> <br>

                                    <div>
                                        <input type="radio" " onclick="setDefaultAddress('CNTCTA17DA868A262447EAFD781BC7')"> &nbsp; <span>Default Address</span></div> </div> 
                                <div class="account_page_address_info_btn"> <a href="#" onclick="deleteAddress('CNTCTA17DA868A262447EAFD781BC7');
                                        return false;">Delete address</a> </div>  -->

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