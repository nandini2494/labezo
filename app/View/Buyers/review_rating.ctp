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
                                    <li><a href="review_rating.html"><label class="active">My Reviews & Ratings </label></a></li>
                                    <li><a href="my_wishlist.html"><label>My Wishlist </label></a></li>
                                    <li><a href="return_product.html"><label>Return Product</label></a></li>
                                    <li><a href="<?php echo Router::url(['controller' => 'buyers/logout']) ?>"><label>Logout </label></a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-md-9 ">
                            <div class="personal_info info1">
                                <div class="title">
                                    <h4>Review & Rating</h4>
                                </div>

                                <!-- <ul class="nav nav-pills well">
                                    <li class="active"><a data-toggle="pill" href="#Orders">Product Reviews</a></li>
                                    <li><a data-toggle="pill" href="#Open_Orders">Seller Reviews</a></li>                                                                               
                                </ul> -->

                                <div class="tab-content">
                                    <div id="Orders" class="tab-pane fade in actn active Open_Orders">

                                        <div class="panel panel-default">
                                            <div class="panel-heading m_n_p">
                                                <h4>Your Review</h4>
                                            </div>
                                            <div class="panel-body deliver">
                                                <div role="tabpanel" class="tab-pane fade active in" id="reviews" aria-labelledby="reviews-tab">
                                                    <div class="parent_dsc">
                                                        <?php if(count($review) > 0) {
                                                        foreach ($review as $review_data) { ?>
                                                        <div class="descr">                                                       
                                                            <div class="reviews-top">
                                                                <div class="reviews-left">
                                                                    <img src="<?php echo DOMAIN_NAME ?><?php echo $review_data['product']['image'] ?>" alt=" " class="img-responsive">
                                                                </div>
                                                                <div class="reviews-right">

                                                                    <h3><?php echo $review_data['buyer_register']['firstname'] ?> <?php echo $review_data['buyer_register']['lastname'] ?></h3>
                                                                    <div class="starrr rating_color" data-rating='<?php echo $review_data['review']['rating'] ?>'></div>
                                                                    <p><?php echo $review_data['review']['message'] ?></p>
                                                                </div>
                                                                <p class="email_data_use"><?php echo $review_data['review']['email'] ?></p>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <?php } } else { ?>
                                                        <div class="descr">
                                                            <p class="error_review">No Review and Ratings are Available.</p>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div id="Open_Orders" class="tab-pane fade ">
                                        <div class="deliver">
                                            <h3>You have not written any seller reviews. Write one today!</h3></br>
                                            <h4>Why should I review a seller?</h4></br>
                                            <p>Your rating of the seller has a direct effect on customer perception of the seller on Flipkart. Your rating contributes to the seller’s overall rating. So, please be fair with your appraisal. You may rate/provide feedback for a seller up to 30 days after placing an order.</p>
                                        </div>
                                    </div>
                                    <div id="Cancelled_Orders" class="tab-pane fade">

                                        <p>We aren't finding any cancelled orders (for orders placed in the last 6 months). <a data-toggle="pill" href=".Open_Orders">View all orders</a></p>
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

<script>
    var __slice = [].slice;

    (function ($, window) {
        var Starrr;

        Starrr = (function () {
            Starrr.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function (e, value) {}
            };

            function Starrr($el, options) {
                var i, _, _ref,
                        _this = this;

                this.options = $.extend({}, this.defaults, options);
                this.$el = $el;
                _ref = this.defaults;
                for (i in _ref) {
                    _ = _ref[i];
                    if (this.$el.data(i) != null) {
                        this.options[i] = this.$el.data(i);
                    }
                }
                this.createStars();
                this.syncRating();

                this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function () {
                var _i, _ref, _results;

                _results = [];
                for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                    _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty rating_color'></span>"));
                }
                return _results;
            };

            Starrr.prototype.setRating = function (rating) {
                if (this.options.rating === rating) {
                    rating = void 0;
                }
                this.options.rating = rating;
                this.syncRating();
                return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function (rating) {
                var i, _i, _j, _ref;

                rating || (rating = this.options.rating);
                if (rating) {
                    for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                    }
                }
                if (rating && rating < 5) {
                    for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                    }
                }
                if (!rating) {
                    return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            };

            return Starrr;

        })();
        return $.fn.extend({
            starrr: function () {
                var args, option;

                option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function () {
                    var data;

                    data = $(this).data('star-rating');
                    if (!data) {
                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                    }
                    if (typeof option === 'string') {
                        return data[option].apply(data, args);
                    }
                });
            }
        });
    })(window.jQuery, window);

    $(function () {
        return $(".starrr").starrr();
    });

    $(document).ready(function () {

        $('#hearts').on('starrr:change', function (e, value) {
            $('#count').html(value);
        });

        $('#hearts-existing').on('starrr:change', function (e, value) {
            $('#count-existing').html(value);
        });
    });
</script>


</body>
</html>