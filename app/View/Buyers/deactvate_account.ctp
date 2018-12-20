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
        <?php echo $this->Html->script('buyer/jquery.min.js') ?>
        <?php echo $this->Html->script('buyer/main.js') ?>
        <?php echo $this->Html->script('buyer/bootstrap-3.1.1.min.js') ?>
        
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
                                    <li><a href="deactvate_account.html"><label class="active">Deactivate Account </label></a></li>
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
                                    <h4>Deactivate Account</h4>
                                    <div class="alert alert-danger hide">
                                        Please fill Account Password..
                                    </div>

                                </div>

                                <form method="post" id="orderform">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Email:</label>
                                        </div>
                                        <?php foreach ($result_data as $data) { ?>
                                        <div class="col-md-9">
                                            <p><?php echo $data['buyer_register']['email'] ?></p>
                                        </div>
                                        <?php } ?>

                                        <br/>

                                    </div><br/>
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Password:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" name="password" type="password" id="initials"></input>
                                        </div>

                                        <br/>

                                    </div><br/>


                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-warning pull-right">Confirm Deactivation</button>
                                    </div><br/><br/>


                                </form>

                                <script>

                                    $('#orderform').submit(function () {
                                        if ($('#initials').val() == '') {
                                            $(".alert-danger").removeClass("hide");
                                            return false;
                                        }
                                    });
                                </script>
                                <!--  <div>
                               <p><b>When you deactivate your account</b></p>
                               <ul>
                               <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                 <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                                <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                              
                               
                               </ul>
                               
                               
                               
                               </div> -->
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