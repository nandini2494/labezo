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
                                    <li><a href="my_wishlist.html"><label class="active">My Wishlist </label></a></li>
                                    <li><a href="return_product.html"><label>Return Product</label></a></li>
                                    <li><a href="<?php echo Router::url(['controller' => 'buyers/logout']) ?>"><label>Logout </label></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-9 ">
                            <div class="personal_data">
                                <?php if(count($wishlist) > 0) { ?>
                                <div class="title">
                                    <h4>My Wishlist (<?php echo count($wishlist); ?>)</h4>
                                </div>
                                <?php foreach ($wishlist as $wishlist_data) { ?>
                                <div class="wishlist_body_data">
                                    <div class="wishlist_anchor_data col-lg-12">
                                        <div class="col-lg-4">    
                                            <img src="<?php echo DOMAIN_NAME ?><?php echo $wishlist_data['product']['image'] ?>" class="anchor_image_div">
                                        </div>
                                        <a href="single.html?id=<?php echo $wishlist_data['product']['product_id'] ?>" class="col-lg-6 anchor_div">
                                            <h4 class="product_name_div"><?php echo $wishlist_data['product']['product_name'] ?></h4>
                                            <h4>$<?php echo number_format($wishlist_data['product']['price'],2); ?></h4>
                                        </a>
                                        <div class="col-lg-2">
                                            <i class="fa fa-trash-o delete_wishlist_icon" aria-hidden="true" onclick='delete_data("<?php echo $wishlist_data['wishlist']['user_id'] ?>","<?php echo $wishlist_data['wishlist']['product_id'] ?>")'></i>
                                        </div>
                                    </div>
                                </div>
                                <?php } } else { ?>
                                <div class="title">
                                    <h4>No Wishlist Available</h4>
                                </div>
                                <?php } ?>
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

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <form method="post" id="delete_modal">
                <div class="modal-dialog delete_modal_data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="product_id" id="product_data">
                            <input type="hidden" name="user_id" id="user_data">
                            <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                        </div>
                    </div>
                    <!-- /.modal-content --> 
                </div>
                <!-- /.modal-dialog --> 
            </form>
        </div>
        
        <script>
            function delete_data(user_id, product_id) {
                $("#product_data").val(product_id);
                $("#user_data").val(user_id);
                $("#delete").modal("show");               
            }
        </script>

        <script>
            $("#delete_modal").submit(function () {
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'buyers/delete_whislist']) ?>",
                    type: "post",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        </script> 

    </body>
</html>