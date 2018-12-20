<!DOCTYPE HTML>
<html>
    <head>
        <title>Labezo</title>
        <!--css-->
        <?php echo $this->Html->css('buyer/bootstrap.css') ?>
        <?php echo $this->Html->css('buyer/style.css') ?>
        <?php echo $this->Html->css('buyer/font-awesome.css') ?>

        <!--css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <?php echo $this->Html->script('buyer/jquery.min.js') ?>
        <?php echo $this->Html->script('buyer/main.js') ?>
        <?php echo $this->Html->script('buyer/bootstrap-3.1.1.min.js') ?>
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        <?php echo $this->Html->script('buyer/jquery.flexslider.js') ?>
        <?php echo $this->Html->css('buyer/flexslider.css') ?>
        <?php echo $this->Html->script('buyer/imagezoom.js') ?>
        <script>
            // Can also be used with $(document).ready()
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>

        <!--mycart-->
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
        <?php echo $this->Html->css('buyer/owl.carousel.css') ?> 
        <?php echo $this->Html->script('buyer/owl.carousel.js') ?>

        <script>
            $(document).ready(function () {
                $("#owl-demo").owlCarousel({
                    items: 1,
                    lazyLoad: true,
                    autoPlay: true,
                    navigation: false,
                    navigationText: false,
                    pagination: true,
                });
            });
        </script>

    </head>

    <body>
        <!--header-->
        <div class="header">
        <?php echo $this->Element('buyer/header_top') ?>
        <?php echo $this->Element('buyer/header') ?>
        </div>
        <!--header-->
        <!--banner-->
        <div class="banner1">
            <div class="container">
                <h3><a href="index.html">Home</a> / <span>Single</span></h3>
            </div>
        </div>
        <!--banner-->

        <!--content-->
        <div class="content">
            <!--single-->
            <div class="single-wl3">
                <div class="container">
                    <div class="single-grids">
                        <div class="col-md-12 single-grid">
                            <div clas="single-top">
                                <div class="single-left">
                                    <div class="flexslider">
                                        <?php if(count($value['image']) > 0) { ?>
                                        <ul class="slides">
                                            <?php foreach ($value['product'] as $values2) { ?>
                                            <li data-thumb="<?php echo DOMAIN_NAME ?><?php echo $values2['product']['image'] ?>">
                                                <div class="thumb-image"> <img src="<?php echo DOMAIN_NAME ?><?php echo $values2['product']['image'] ?>" data-imagezoom="true" class="img-responsive"> </div>
                                            </li> 
                                            <?php } ?>
                                            <?php foreach ($value['image'] as $values) { ?>
                                            <li data-thumb="<?php echo DOMAIN_NAME ?><?php echo $values['image_desc']['product_image'] ?>">
                                                <div class="thumb-image"> <img src="<?php echo DOMAIN_NAME ?><?php echo $values['image_desc']['product_image'] ?>" data-imagezoom="true" class="img-responsive"> </div>
                                            </li> 
                                            <?php } ?>
                                        </ul>
                                        <?php } else { ?>
                                        <ul class="slides">
                                            <?php foreach ($value['product'] as $values2) { ?>
                                            <li data-thumb="<?php echo DOMAIN_NAME ?><?php echo $values2['product']['image'] ?>">
                                                <div class="thumb-image"> <img src="<?php echo DOMAIN_NAME ?><?php echo $values2['product']['image'] ?>" data-imagezoom="true" class="img-responsive"> </div>
                                            </li> 
                                            <?php } ?>
                                        </ul>
                                        <?php } ?>
                                    </div>
                                    <?php if(count($wishlist) > 0) {
                                        foreach ($wishlist as $wishlist_data) {  
                                    ?>
                                    <p class='button_wishlist_single' onclick='whishlistRemove("<?php echo $wishlist_data['wishlist']['user_id'] ?>", "<?php echo $values2['product']['product_id'] ?>")'><i class="fa fa-heart fill_heart" aria-hidden="true"></i></p>
                                    <?php } } else { ?>
                                    <p class='button_wishlist_single' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $values2['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                    <?php } ?>
                                </div>
                                <div class="single-right simpleCart_shelfItem">
                                    <?php foreach ($value['product'] as $values1) { ?>
                                    <h4><?php echo $values1['product']['product_name'] ?></h4>
                                    <?php if(count($value['rating']) > 0)  { ?>
                                    <div class="starrr1 rating_color" data-rating='<?php echo round($value['rating'][0][0]['AVG(rating)']) ?>'></div>
                                    <?php } else { ?>
                                    <div class="starrr1 rating_color" data-rating=''></div>
                                    <?php } ?>
                                    <?php if(count($value['offer']) > 0) {
                                    foreach ($value['offer'] as $offer) { 
                                        if($offer['set_offer']['from_date'] >= date('Y-m-d')) {
                                            if($offer['set_offer']['offer_type'] == 'In Amount') {
                                                $amount = $values1['product']['price'] - $offer['set_offer']['offer_amount'];
                                            } else if($offer['set_offer']['offer_type'] == 'In Percentage') {
                                                $amount = $values1['product']['price'] - (($values1['product']['price'] * $offer['set_offer']['offer_amount'])/100);
                                            }
                                    ?>
                                    <p class="price item_price"><?php echo number_format($amount,2) ?> <?php echo $values1['product']['currency'] ?></p>
                                    <?php } else { ?>
                                    <p class="price item_price"><?php echo number_format($values1['product']['price'],2) ?> <?php echo $values1['product']['currency'] ?></p>
                                    <?php } } } else { ?>
                                    <p class="price item_price"><?php echo number_format($values1['product']['price'],2) ?> <?php echo $values1['product']['currency'] ?></p>
                                    <?php } ?>
                                    <div class="description">
                                        <p><span>Quick Overview : </span><?php echo $values1['product']['product_desc'] ?></p>
                                    </div>                                   

                                    <div class="women">
                                        <form method="post">
                                            <input type="hidden" id="quantity_data" name="max_quantity" value="<?php echo $values1['product']['quantity'] ?>">
                                            <input type="hidden" name="product_id" value="<?php echo $values1['product']['product_id'] ?>">                                      
                                            <input type="hidden" name="pro_name" value="<?php echo $values1['product']['product_name'] ?>">
                                            <input type="hidden" name="model" value="<?php echo $values1['product']['product_model'] ?>">
                                            <input type="hidden" name="option_desc" id="option_desc_val">
                                            <input type="hidden" name="option" id="option_val">
                                            <input type="hidden" name="quantity" id="qty_val" value="1">
                                            <input type="hidden" name="price" id="price_val" value="<?php if(isset($amount)) { echo $amount; } else { echo $values1['product']['price']; } ?>">
                                            <input type="hidden" name="image" value="<?php echo $values1['product']['image'] ?>">
                                            <input type="hidden" name="currency" value="<?php echo $values1['product']['currency'] ?>">
                                            <?php if(count($value['product_option']) > 0) { 
                                                foreach ($value['product_option'] as $values3) {
                                            ?>
                                            <ul class='marggin_set'>
                                                <li><p><?php if($values3['product_option']['require_val'] == 'Yes') { ?><span style="color: red;">*</span><?php } ?><?php echo $values3['option_name']['option_name'] ?></p></li>
                                                <li>
                                                    <select name="option_name[<?php echo $values3['option_name']['option_id'] ?>]" <?php echo ($values3['product_option']['require_val'] == 'Yes' ? 'required' : '') ?>>
                                                        <option value="">Select One</option>
                                            <?php
                                            foreach ($value['option_name'] as $values5) {                          
                                                if($values5['product_option']['option_id'] == $values3['product_option']['option_id']) { ?>
                                               <?php foreach ($value['product_option_desc'] as $values4) {                                                    
                                                    if($values5['product_option']['option_desc_id'] == $values4['option_description']['option_desc_id']) {
                                            ?>
                                                    <!-- <li>
                                                        <p onclick='select_option("<?php echo $values5['product_option']['option_quantity'] ?>", "<?php echo $values4['option_description']['option_id'] ?>", "<?php echo $values4['option_description']['option_desc_id'] ?>", "<?php echo $values5['product_option']['option_price_prefix'] ?>", "<?php echo $values5['product_option']['option_price'] ?>", "<?php if(isset($amount)) { echo $amount; } else { echo $values1['product']['price']; } ?>")' data-toggle="tooltip" title="<?php echo $values4['option_description']['option_desc_name'] ?>"><?php echo $values4['option_description']['option_desc_name'] ?></p>
                                                    </li>  -->

                                                    <option value='<?php echo $values4['option_description']['option_desc_id'] ?>'><?php echo $values4['option_description']['option_desc_name'] ?></option>

                                            <?php } } } } ?>
                                                    </select> 
                                                </li>
                                            </ul>
                                            <div class='clearfix'></div>
                                            <?php } } ?>

                                            <div class="color-quality">                                       
                                                <h6>Quantity :</h6>
                                                <div class="quantity"> 
                                                    <div class="quantity-select">                           
                                                        <div class="entry value-minus1">&nbsp;</div>
                                                        <div class="entry value1"><span class="entry_span_use">1</span></div>
                                                        <div class="entry value-plus1 active">&nbsp;</div>
                                                    </div>
                                                </div>                                        
                                            </div>

                                            <div class='space_use'>
                                                <button type="submit" name="form_button" value="add_cart" data-text="Add To Cart" class="my-cart-b item_add">Add To Cart</button>
                                                <button type="submit" name="form_button" value="buy_now" class="my-cart-b item_add">Buy Now</button>
                                            </div>  
                                        <?php } ?>
                                        </form>    
                                    </div>
                                    <div class="social-icon">
                                        <a href="#"><i class="icon"></i></a>
                                        <a href="#"><i class="icon1"></i></a>
                                        <a href="#"><i class="icon2"></i></a>
                                        <a href="#"><i class="icon3"></i></a>
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>

                        <div class="clearfix"> </div>
                    </div>
                    <!--Product Description-->
                    <div class="product-w3agile">

                        <div class="product-grids">
                            <div class="col-md-8 product-grid1">
                                <div class="tab-wl3">
                                    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
                                            <li role="presentation"><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (<?php echo count($review_data); ?>)</a></li>
                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                                <div class="descr">
                                                    <h4>Suspendisse laoreet, augue vel mattis </h4>
                                                    <p class="quote">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
                                                <div class="descr">
                                                    <div class="reviews-top">
                                                        <div class="reviews-left">
                                                            <img src="<?php echo DOMAIN_NAME ?>img/men3.jpg" alt=" " class="img-responsive">
                                                        </div>
                                                        <div class="reviews-right">
                                                            <ul>
                                                                <li><a href="#">Admin</a></li>
                                                                <li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
                                                            </ul>
                                                            <p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>

                                                    <?php if(count($review_data) > 0) { ?>
                                                    <div class="reviews-top review_detail">    
                                                        <h3>Reviews and Ratings</h3><br/>
                                                        <?php foreach ($review_data as $review_val) { ?>
                                                        <div class="reviews-right">
                                                            <ul>
                                                                <li><div id="hearts2" class="starrr1" data-rating='<?php echo $review_val['review']['rating'] ?>'></div></li>                                                               
                                                            </ul>
                                                            <p class="message_use"><?php echo $review_val['review']['message'] ?></p>
                                                            <p class="muted_text"><?php echo $review_val['review']['name'] ?></p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <?php } ?>
                                                    </div>
                                                    <?php } ?>

                                                    <div class="reviews-bottom">
                                                        <h4>Add Reviews</h4>
                                                        <p>Your email address will not be published. Required fields are marked *</p>
                                                        <p>Your Rating</p>
                                                        <div class="block1">                                                        
                                                            <div class="positioner">
                                                                <div id="hearts1" class="starrr" data-rating=''></div>
                                                            </div>                                                                                                                   
                                                        </div>
                                                        <form method="post">
                                                            <input type="hidden" name="form_name" value="rating_form">
                                                            <input type="hidden" name="rating" id="rating_data">
                                                            <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($this->params['url']['id']) ?>">
                                                            <label>Your Review </label>
                                                            <textarea type="text" name="message" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                        this.value = 'Message...';
                                                                    }" required="">Message...</textarea>
                                                            <div class="row">
                                                                <?php if(isset($buyer)) {
                                                                foreach ($buyer as $buyer_data) { ?>
                                                                <div class="col-md-6 row-grid">
                                                                    <label>Name</label>
                                                                    <input type="text" value="<?php echo $buyer_data['buyer_register']['firstname'] ?> <?php echo $buyer_data['buyer_register']['lastname'] ?>" name="user_name" readonly="">
                                                                </div>
                                                                <div class="col-md-6 row-grid">
                                                                    <label>Email</label>
                                                                    <input type="email" value="<?php echo $buyer_data['buyer_register']['email'] ?>" name="user_email" readonly="">
                                                                </div>
                                                                <?php } } else { ?>
                                                                <div class="col-md-6 row-grid">
                                                                    <label>Name</label>
                                                                    <input type="text" value="Name" name="user_name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                                this.value = 'Name';
                                                                            }" required="">
                                                                </div>
                                                                <div class="col-md-6 row-grid">
                                                                    <label>Email</label>
                                                                    <input type="email" value="Email" name="user_email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                                this.value = 'Email';
                                                                            }" required="">
                                                                </div>
                                                                <?php } ?>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <input type="submit" value="SEND">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    <!--Product Description-->
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

        <!-- Modal -->
        <div class="modal fade" id="myModalLogin" role="dialog">
            <div class="modal-dialog login_popup">

                <!-- Modal content-->
                <div class="modal-content">
                    <form method="post" id="modal_login_form">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Login</h4>
                        </div>
                        <div class="modal-body">
                            <div id="password_msg" style="background-color: white; color: red; border: 1px solid #d9d9d9;border-top: 1px solid #c0c0c0;padding:2%; display:none; width: 95%; margin-bottom: 5%;"></div>
                            <div class="type1">
                                <input type="hidden" id="product_val" name="product_data">
                                <label class="modal_label">
                                    <p>Enter Email Id</p>
                                    <input type="text" name="email">
                                </label>
                            </div>  
                            <div class="type2">
                                <label class="modal_label">
                                    <p>Enter Password</p>
                                    <input type="password" name="password">
                                </label>
                            </div>  
                            <div class="type3">
                                <label class="modal_label">
                                    <button type="submit" class="login_button_modal">Login</button>
                                </label>
                            </div> 
                            <div class="type4">
                                <label class="modal_label">
                                    <a href="registered.html" class="signup_button_modal">New to Labezo? Sign Up</a>
                                </label>
                            </div> 
                        </div>
                    </form>    
                </div>

            </div>
        </div>

        <script>
            // Starrr plugin (https://github.com/dobtco/starrr)
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
                        this.$el.on('mouseover.starrr', 'span', function (e) {
                            return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
                        });
                        this.$el.on('mouseout.starrr', function () {
                            return _this.syncRating();
                        });
                        this.$el.on('click.starrr', 'span', function (e) {
                            return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
                        });
                        this.$el.on('starrr:change', this.options.change);
                    }

                    Starrr.prototype.createStars = function () {
                        var _i, _ref, _results;

                        _results = [];
                        for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                            _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
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
                $('#hearts1').on('starrr:change', function (e, value) {
                    $("#rating_data").val(value);
                });
            });

            $(document).ready(function () {
                $('#hearts2').on('starrr:change', function (e, value) {
                    $("#rating_data").val(value);
                });
            });
        </script>

        <script>

            /*function select_option(quantity, option, value, price_prefix, price_option, price) {
             $("#quantity_data").val(quantity);
             $("#option_val").val(option);
             $("#option_desc_val").val(value);
             if (price_prefix == '+') {
             var total_price = parseFloat(price) + parseFloat(price_option);
             } else {
             var total_price = parseFloat(price) - parseFloat(price_option);
             }
             $("#price_val").val(total_price);
             alert(total_price);
             } */
            function select_option(data) {
                var value = data.split(',');               
                    $("#quantity_data").val(value[1]);
            }
        </script>

        <script>
            $(document).ready(function () {
                $('.value-plus1').click(function () {
                    var qty = $("#quantity_data").val();
                    var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) + 1;
                    if (qty != '') {
                        if (newVal <= qty) {
                            divUpd.text(newVal);
                        }
                    } else {
                        divUpd.text(newVal);
                    }

                    $("#qty_val").val(newVal);
                });

                $('.value-minus1').click(function () {
                    var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10) - 1;
                    if (newVal >= 1)
                        divUpd.text(newVal);
                    $("#qty_val").val(newVal);
                });
            });
        </script>

        <script>
            var __slice = [].slice;

            (function ($, window) {
                var Starrr1;

                Starrr1 = (function () {
                    Starrr1.prototype.defaults = {
                        rating: void 0,
                        numStars: 5,
                        change: function (e, value) {}
                    };

                    function Starrr1($el, options) {
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

                        this.$el.on('starrr1:change', this.options.change);
                    }

                    Starrr1.prototype.createStars = function () {
                        var _i, _ref, _results;

                        _results = [];
                        for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                            _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty rating_color'></span>"));
                        }
                        return _results;
                    };

                    Starrr1.prototype.setRating = function (rating) {
                        if (this.options.rating === rating) {
                            rating = void 0;
                        }
                        this.options.rating = rating;
                        this.syncRating();
                        return this.$el.trigger('starrr1:change', rating);
                    };

                    Starrr1.prototype.syncRating = function (rating) {
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

                    return Starrr1;

                })();
                return $.fn.extend({
                    starrr1: function () {
                        var args, option;

                        option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                        return this.each(function () {
                            var data;

                            data = $(this).data('star-rating');
                            if (!data) {
                                $(this).data('star-rating', (data = new Starrr1($(this), option)));
                            }
                            if (typeof option === 'string') {
                                return data[option].apply(data, args);
                            }
                        });
                    }
                });
            })(window.jQuery, window);

            $(function () {
                return $(".starrr1").starrr1();
            });

            $(document).ready(function () {

                $('#hearts').on('starrr1:change', function (e, value) {
                    $('#count').html(value);
                });

                $('#hearts-existing').on('starrr1:change', function (e, value) {
                    $('#count-existing').html(value);
                });
            });
        </script>

        <script>
            function whishlistAdd(user_id, product_id) {
                if (user_id > 0) {
                    $.ajax({
                        url: "<?php echo Router::url(['controller' => 'buyers/wishlist_add_direct']) ?>",
                        type: "post",
                        data: {"id": user_id, "product": product_id},
                        success: function (data) {
                            location.reload();
                        }
                    });
                } else {
                    $("#product_val").val(product_id);
                    $("#myModalLogin").modal("show");
                }
            }
        </script>

        <script>
            function whishlistRemove(user_id, product_id) {
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'buyers/wishlist_remove']) ?>",
                    type: "post",
                    data: {"id": user_id, "product": product_id},
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        </script>

        <script>
            $("#modal_login_form").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'buyers/login_information']) ?>",
                    type: "post",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data == 0) {
                            $("#password_msg").html("Email id and Password must be correct");
                            $("#password_msg").slideDown('slow');
                            setTimeout(function () {
                                $("#password_msg").slideUp('slow');
                            }, 100000);
                        } else {
                            location.reload();
                        }
                    }
                });
            });
        </script>

    </body>
</html>