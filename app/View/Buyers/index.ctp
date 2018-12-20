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

        <link rel="stylesheet" href="css/" type="text/css" media="screen" charset="utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

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
    </head>
    <body>
        <!--header-->
        <div class="header">
            <?php echo $this->Element('buyer/header_top') ?>
            <?php echo $this->Element('buyer/header') ?>
        </div>
        <!--header-->
        <!--banner-->
        <!--accessories-->
        <?php foreach ($banner as $banner_image) { ?>
        <div class="accessories-w3l" style="background: url(<?php echo DOMAIN_NAME ?><?php echo $banner_image['top_banner']['banner_image'] ?>) no-repeat 0px 0px;">
            <div class="container">
                <h3 class="tittle"><?php echo $banner_image['top_banner']['discount'] ?></h3>
                <span><?php echo strtoupper($banner_image['top_banner']['title']) ?></span>
                <!-- <div class="button">
                    <a href="#" class="button1"> Shop Now</a>
                    <a href="#" class="button1"> Quick View</a>
                </div> -->
            </div>
        </div>
        <?php } ?>
        <!--accessories-->
        <!--banner-->
        <!--content-->
        <div class="content">
            <!--banner-bottom-->
            <div class="ban-bottom-w3l">
                <div class="container">
                    <div class="col-md-6 ban-bottom">
                        <div class="ban-top">
                            <?php foreach ($top_left as $top_left_image) { ?>
                            <img src="<?php echo DOMAIN_NAME ?><?php echo $top_left_image['top_banner']['banner_image'] ?>" class="img-responsive" alt=""/>
                            <div class="ban-text">
                                <h4><?php echo $top_left_image['top_banner']['title'] ?></h4>
                            </div>
                            <div class="ban-text2 hvr-sweep-to-top">
                                <h4><?php echo $top_left_image['top_banner']['discount'] ?></h4>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6 ban-bottom3">
                        <div class="ban-top">
                            <?php foreach ($top_right as $top_right_image) { ?>
                            <img src="<?php echo DOMAIN_NAME ?><?php echo $top_right_image['top_banner']['banner_image'] ?>" class="img-responsive" alt=""/>
                            <div class="ban-text1">
                                <h4><?php echo $top_right_image['top_banner']['title'] ?></h4>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="ban-img">
                            <div class=" ban-bottom1">
                                <div class="ban-top">
                                    <?php foreach ($bottom_left as $bottom_left_image) { ?>
                                    <img src="<?php echo DOMAIN_NAME ?><?php echo $bottom_left_image['top_banner']['banner_image'] ?>" class="img-responsive" alt=""/>
                                    <div class="ban-text1">
                                        <h4><?php echo $bottom_left_image['top_banner']['title'] ?></h4>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="ban-bottom2">
                                <?php foreach ($bottom_right as $bottom_right_image) { ?>
                                <div class="ban-top">
                                    <img src="<?php echo DOMAIN_NAME ?><?php echo $bottom_right_image['top_banner']['banner_image'] ?>" class="img-responsive" alt=""/>
                                    <div class="ban-text1">
                                        <h4><?php echo $bottom_right_image['top_banner']['title'] ?></h4>
                                    </div>
                                <?php } ?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!--banner-bottom-->
            <!--new-arrivals-->
            <div class="new-arrivals-w3agile">
                <div class="container">
                    <h2 class="tittle">Trading Products </h2>
                    <div class="arrivals-grids">
                        <?php foreach ($data['product'] as $val) { ?>       

                        <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>		
                                        <a href="products.html?category_id=<?php echo $val['product']['category'] ?>&main_id=<?php echo $val['category']['parent_id'] ?>" class="new-gri">
                                            <div class="grid-img">
                                                <img src="<?php echo DOMAIN_NAME ?><?php echo $val['product']['image'] ?>" class="img-responsive img_index"  alt="">
                                            </div>                                        
                                        </a>		
                                    </figure>	
                                </div>

                                <div class="starrr rating_color" data-rating='<?php echo round($val[0]['AVG(review.rating)']) ?>'></div>

                                <div class="women">
                                    <h6><a href="products.html?id=<?php echo $val['product']['seller_id'] ?>"><?php echo $val['product']['product_name'] ?></a></h6>
                                    <?php if($val['product']['product_id'] == $val['set_offer']['product_id']) { 
                                        if($val['set_offer']['from_date'] >= date('Y-m-d')) {
                                            if($val['set_offer']['offer_type'] == 'In Amount') {
                                            $amount = $val['product']['price'] - $val['set_offer']['offer_amount'];
                                            } else if($val['set_offer']['offer_type'] == 'In Percentage') {
                                            $amount = $val['product']['price'] - (($val['product']['price'] * $val['set_offer']['offer_amount'])/100);
                                            }
                                    ?>
                                    <p><del><?php echo number_format($val['product']['price'],2) ?> <?php echo $val['product']['currency'] ?></del><em class="item_price"><?php echo number_format($amount,2) ?> <?php echo $val['product']['currency'] ?></em></p>
                                        <?php } else { ?>
                                    <p><del></del><em class="item_price"><?php echo number_format($val['product']['price'],2) ?> <?php echo $val['product']['currency'] ?></em></p>        
                                        <?php } } else { ?>
                                    <p><del></del><em class="item_price"><?php echo number_format($val['product']['price'],2) ?> <?php echo $val['product']['currency'] ?></em></p>
                                    <?php } ?>                                    
                                    <a href="products.html?id=<?php echo $val['product']['seller_id'] ?>" data-text="View" class="my-cart-b item_add">View</a>                                   
                                </div>  
                                <?php 
                                if(count($wishlist) > 0) {
                                foreach ($wishlist as $wishlist_data) {                                   
                                    if($wishlist_data['wishlist']['product_id'] == $val['product']['product_id']) {
                                ?>
                                <p class='button_wishlist' onclick='whishlistRemove("<?php echo $wishlist_data['wishlist']['user_id'] ?>", "<?php echo $val['product']['product_id'] ?>")'><i class="fa fa-heart fill_heart" aria-hidden="true"></i></p>
                                <?php 
                                    break;
                                    } else { ?>
                                <p class='button_wishlist' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $val['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                <?php } } } else { ?>
                                <p class='button_wishlist' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $val['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--new-arrivals-->

            <div class="latest-w3">
                <div class="container">
                    <h3 class="tittle1">Category</h3>
                    <div class="latest-grids">
                        <?php foreach ($value as $values) { ?>                                                                               
                        <div class="col-md-4 latest-grid">
                            <div class="latest-top">
                                <img  src="<?php echo DOMAIN_NAME ?><?php echo $values['category']['category_image'] ?>" class="img-responsive"  alt="">
                                <div class="latest-text">
                                    <h4><?php echo $values['category_desc']['name'] ?></h4>
                                </div>                                
                            </div>
                        </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="new-arrivals-w3agile">
                <div class="container">
                    <h3 class="tittle1">Best Sellers</h3>
                    <div class="arrivals-grids">
                        <?php foreach ($seller_data['product'] as $val) { ?>
                        <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                            <div class="grid-arr">
                                <div  class="grid-arrival">
                                    <figure>		
                                        <a href="products.html?id=<?php echo $val['product']['seller_id'] ?>" class="new-gri">
                                            <div class="grid-img">
                                                <img src="<?php echo DOMAIN_NAME ?><?php echo $val['product']['image'] ?>" class="img-responsive img_index"  alt="">
                                            </div>                                        
                                        </a>		
                                    </figure>	
                                </div>

                                <div class="starrr rating_color" data-rating='<?php echo round($val[0]['AVG(review.rating)']) ?>'></div>

                                <div class="women">
                                    <h6><a href="products.html?id=<?php echo $val['product']['seller_id'] ?>"><?php echo $val['product']['product_name'] ?></a></h6>
                                    <?php if($val['product']['product_id'] == $val['set_offer']['product_id']) { 
                                        if($val['set_offer']['from_date'] >= date('Y-m-d')) {
                                            if($val['set_offer']['offer_type'] == 'In Amount') {
                                            $amount = $val['product']['price'] - $val['set_offer']['offer_amount'];
                                            } else if($val['set_offer']['offer_type'] == 'In Percentage') {
                                            $amount = $val['product']['price'] - (($val['product']['price'] * $val['set_offer']['offer_amount'])/100);
                                            }
                                    ?>
                                    <p><del><?php echo number_format($val['product']['price'],2) ?> <?php echo $val['product']['currency'] ?></del><em class="item_price"><?php echo number_format($amount,2) ?> <?php echo $val['product']['currency'] ?></em></p>
                                        <?php } else { ?>
                                    <p><del></del><em class="item_price"><?php echo number_format($val['product']['price'],2) ?> <?php echo $val['product']['currency'] ?></em></p>        
                                        <?php } } else { ?>
                                    <p><del></del><em class="item_price"><?php echo number_format($val['product']['price'],2) ?> <?php echo $val['product']['currency'] ?></em></p>
                                    <?php } ?>                                    
                                    <a href="products.html?id=<?php echo $val['product']['seller_id'] ?>" data-text="View" class="my-cart-b item_add">View</a>                                   
                                </div>  
                                <?php 
                                if(count($wishlist) > 0) {
                                foreach ($wishlist as $wishlist_data) {                                   
                                    if($wishlist_data['wishlist']['product_id'] == $val['product']['product_id']) {
                                ?>
                                <p class='button_wishlist' onclick='whishlistRemove("<?php echo $wishlist_data['wishlist']['user_id'] ?>", "<?php echo $val['product']['product_id'] ?>")'><i class="fa fa-heart fill_heart" aria-hidden="true"></i></p>
                                <?php 
                                    break;
                                    } else { ?>
                                <p class='button_wishlist' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $val['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                <?php } } } else { ?>
                                <p class='button_wishlist' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $val['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <!--new-arrivals-->
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
