<!DOCTYPE HTML>
<html>
    <head>
        <title>Labezo</title>
        <!--css-->
        <?php echo $this->Html->css('buyer/bootstrap.css') ?>
        <?php echo $this->Html->css('buyer/style.css') ?>
        <?php echo $this->Html->css('buyer/font-awesome.css') ?> 
        <?php echo $this->Html->css('buyer/asRange.css') ?> 
        <!--css-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/themes/smoothness/jquery-ui.css">
        <?php echo $this->Html->script('buyer/jquery.min.js') ?>
        <?php echo $this->Html->script('buyer/main.js') ?>
        <?php echo $this->Html->script('buyer/responsiveslides.min.js') ?>
        <?php echo $this->Html->script('buyer/jquery-asRange.js') ?>

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
                <h3><a href="index.html">Home</a> / <span>Products</span></h3>
            </div>
        </div>
        <!--banner-->
        <!--content-->
        <div class="content">
            <div class="products-agileinfo">

                <div class="">
                    <div class="product-agileinfo-grids w3l">
                        <div class="col-md-2 product-agileinfo-grid <?php if(isset($this->params['url']['category_id'])) { echo "catagry_section"; } else { echo "";} ?>">
                            <?php if(isset($this->params['url']['category_id'])) { ?>
                            <div class="categories">
                                <h3>Categories</h3>
                                <ul class="tree-list-pad">
                                    <?php foreach ($category_val['category'] as $value) {
                                    foreach($category_val['main'] as $parent) { ?>
                                    <li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><?php echo $parent['category_desc']['name']; ?></label>
                                        <ul>
                                            <li><input type="checkbox" id="item-0-0" /><label for="item-0-0"><a href="products.html?category_id=<?php echo $value['category_desc']['category_id'] ?>&main_id=<?php echo $parent['category_desc']['category_id'] ?>"><?php echo $value['category_desc']['name']; ?></a></label>
                                                <ul>
                                                    <?php foreach ($category_val['child'] as $child) { ?>
                                                    <li><a class="subcategory_data" href="products.html?category_id=<?php echo $child['category_desc']['category_id'] ?>&main_id=<?php echo $parent['category_desc']['category_id'] ?>"><?php echo $child['category_desc']['name'] ?></a></li>                                                    
                                                    <?php } } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>  
                                    <?php } ?>
                                </ul>
                            </div>     
                            <?php } ?>

                            <?php if(isset($offer_val)) { ?>
                            <?php if(count($offer_val) > 0) { ?>
                            <div class="brand-w3l">                               
                                <h3>Offers</h3>
                                <ul>
                                    <?php foreach ($offer_val as $offer) { foreach($category_val['main'] as $parent_val) { ?>
                                    <li><a href="products.html?category_id=<?php echo $offer['product']['category'] ?>&main_id=<?php echo $parent_val['category_desc']['category_id'] ?>&filter_data=<?php echo $offer['set_offer']['offer_amount'] ?>"><?php echo $offer['set_offer']['offer_amount'] ?>% Off</a></li>   
                                    <?php } } ?>
                                </ul>
                            </div>
                            <?php }  } ?>
                            <?php if(isset($max_price)) { ?>
                            <div class="price">
                                <h3>Price Range</h3>
                                <ul class="dropdown-menu6">
                                    <li>     
                                        <div id="range"> <span id="currentVal"></span> </div>                                            
                                            <?php
                                            foreach($max_price as $max_data) { 
                                            if(isset($max_price_data)) {
                                            ?>
                                        <input type="hidden" id="max_price" value="<?php echo number_format($max_data[0]['maximum']) ?>">
                                        <input type="hidden" id="max_value" value="<?php echo $max_price_data ?>">
                                            <?php } else { ?>
                                        <input type="hidden" id="max_price" value="<?php echo number_format($max_data[0]['maximum']) ?>">
                                        <input type="hidden" id="max_value" value="<?php echo number_format($max_data[0]['maximum']) ?>">
                                            <?php } } ?>
                                            <?php if(isset($min_price)) { ?>
                                        <input type="hidden" id="min_price" value="<?php echo $min_price ?>">
                                            <?php } else { ?>
                                        <input type="hidden" id="min_price" value="0">
                                            <?php } ?>                                         
                                    </li>			
                                </ul>
                            </div>
                            <?php } ?>
                            <!-- <div class="top-rates">
                                <h3>Top Rates products</h3>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/r.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                        <p><del>$100.00</del> <em class="item_price">$09.00</em></p>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/r1.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Duis aute irure </a></h6>
                                        <p><del>$100.00</del> <em class="item_price">$19.00</em></p>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/r2.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Lorem ipsum dolor </a></h6>
                                        <p><del>$100.00</del> <em class="item_price">$39.00</em></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="recent-grids">
                                    <div class="recent-left">
                                        <a href="single.html"><img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/r3.jpg" alt=""></a>	
                                    </div>
                                    <div class="recent-right">
                                        <h6 class="best2"><a href="single.html">Ut enim ad minim </a></h6>
                                        <p><em class="item_price">$39.00</em></p>
                                    </div>	
                                    <div class="clearfix"> </div>
                                </div>
                            </div> -->
                            <?php if(isset($brand_val)) { ?>
                            <div class="brand-w3l brand_filter_data">
                                <h3>Brands Filter</h3>
                                <ul>
                                    <?php foreach ($brand_val['product'] as $brand_data) { ?>
                                    <li><input type="checkbox" onclick='selectBrand("<?php echo $brand_data['product']['brand'] ?>")' <?php if(isset($this->params['url']['brand'])) { if (($this->params['url']['brand']) == $brand_data['product']['brand']) { echo "checked"; } else { echo "";} } ?>>&nbsp;&nbsp;<?php echo $brand_data['product']['brand'] ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php } ?>

                        </div>
                        <div class="col-md-9 product-agileinfon-grid1 w3l">
                            <div class="product-agileinfon-top">
                                <div class="col-md-4 product-agileinfon-top-left">
                                    <img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/img1.jpg" alt="">
                                </div>
                                <div class="col-md-4 product-agileinfon-top-left">
                                    <img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/img2.jpg" alt="">
                                </div>
                                <div class="col-md-4 product-agileinfon-top-left">
                                    <img class="img-responsive " src="<?php echo DOMAIN_NAME ?>img/img1.jpg" alt="">
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mens-toolbar">
                                <p >Showing 1–9 of 21 results</p>
                                <p class="showing">Sorting By
                                    <select>
                                        <option value=""> Name</option>
                                        <option value="">  Rate</option>
                                        <option value=""> Color </option>
                                        <option value=""> Price </option>
                                    </select>
                                </p> 
                                <p>Show
                                    <select>
                                        <option value=""> 9</option>
                                        <option value="">  10</option>
                                        <option value=""> 11 </option>
                                        <option value=""> 12 </option>
                                    </select>
                                </p>
                                <div class="clearfix"></div>		
                            </div>
                            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                    <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><img src="<?php echo DOMAIN_NAME ?>img/menu1.png"></a></li>
                                        <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile"><img src="<?php echo DOMAIN_NAME ?>img/menu.png"></a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                                            <div class="product-tab prod1">
                                                <?php if(count($product_val['product']) > 0) {
                                                foreach ($product_val['product'] as $product) { ?>
                                                <div class="col-md-3 product-tab-grid simpleCart_shelfItem">
                                                    <div class="grid-arr">
                                                        <div  class="grid-arrival">
                                                            <figure>		
                                                                <a href="single.html?id=<?php echo $product['product']['product_id'] ?>" class="new-gri">
                                                                    <div class="grid-img">
                                                                        <img src="<?php echo DOMAIN_NAME ?><?php echo $product['product']['image'] ?>" class="img-responsive img_product"  alt="">
                                                                    </div>                                        
                                                                </a>		
                                                            </figure>	
                                                        </div>
                                                        <div class="starrr rating_color" data-rating='<?php echo round($product[0]['AVG(review.rating)']) ?>'></div>
                                                        <div class="women">
                                                            <h6><a href="single.html?id=<?php echo $product['product']['product_id'] ?>"><?php echo $product['product']['product_name'] ?></a></h6>                                                          
                                                            <?php if($product['product']['product_id'] == $product['set_offer']['product_id']) { 
                                                            if($product['set_offer']['from_date'] >= date('Y-m-d')) {
                                                                if($product['set_offer']['offer_type'] == 'In Amount') {
                                                                    $amount = $product['product']['price'] - $product['set_offer']['offer_amount'];
                                                                } else if($product['set_offer']['offer_type'] == 'In Percentage') {
                                                                    $amount = $product['product']['price'] - (($product['product']['price'] * $product['set_offer']['offer_amount'])/100);
                                                                }
                                                            ?>
                                                            <p><del><?php echo number_format($product['product']['price'],2) ?> <?php echo $product['product']['currency'] ?></del><em class="item_price"><?php echo number_format($amount,2) ?> <?php echo $product['product']['currency'] ?></em></p>
                                                            <?php } else { ?>
                                                            <p><del></del><em class="item_price"><?php echo number_format($product['product']['price'],2) ?> <?php echo $product['product']['currency'] ?></em></p>        
                                                            <?php } } else { ?>
                                                            <p><del></del><em class="item_price"><?php echo number_format($product['product']['price'],2) ?> <?php echo $product['product']['currency'] ?></em></p>
                                                            <?php } ?>
                                                            <a href="single.html?id=<?php echo $product['product']['product_id'] ?>" data-text="View" class="my-cart-b item_add">View</a>
                                                            <?php if(isset($wishlist)) {
                                                                if(count($wishlist) > 0) {
                                                                foreach ($wishlist as $wishlist_data) { 
                                                                    $user_data = $this->Session->read('uid');
                                                                    if($wishlist_data['wishlist']['product_id'] == $product['product']['product_id']) {
                                                            ?>
                                                            <p class='button_wishlist' onclick='whishlistRemove("<?php echo $wishlist_data['wishlist']['user_id'] ?>", "<?php echo $product['product']['product_id'] ?>")'><i class="fa fa-heart fill_heart" aria-hidden="true"></i></p>
                                                            <?php break; } else { ?>
                                                            <p class='button_wishlist' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $product['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                                            <?php  } } } else { ?>
                                                            <p class='button_wishlist' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $product['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                                            <?php } } ?>                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } } else { ?>
                                                <h3>No Products Available</h3>
                                                <?php } ?>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                                            <?php if(count($product_val['product']) > 0) {
                                            foreach ($product_val['product'] as $product_data) { ?>
                                            <div class="product-tab1 prod3">
                                                <div class="col-md-4 product-tab1-grid">
                                                    <div class="grid-arr">
                                                        <div  class="grid-arrival">
                                                            <figure>		
                                                                <a href="single.html?id=<?php echo $product_data['product']['product_id'] ?>" class="new-gri">
                                                                    <div class="grid-img">
                                                                        <img  src="<?php echo DOMAIN_NAME ?><?php echo $product_data['product']['image'] ?>" class="img-responsive"  alt="">
                                                                    </div>			
                                                                </a>		
                                                            </figure>	
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 product-tab1-grid1 simpleCart_shelfItem">
                                                    <div class="block">
                                                        <div class="starbox small ghosting"> </div>
                                                    </div>
                                                    <div class="women">
                                                        <h6><a href="single.html?id=<?php echo $product_data['product']['product_id'] ?>"><?php echo $product_data['product']['product_name'] ?></a></h6>
                                                        <p><?php echo $product_data['product']['product_desc'] ?></p>
                                                        <?php if($product_data['product']['product_id'] == $product_data['set_offer']['product_id']) { 
                                                            if($product_data['set_offer']['from_date'] >= date('Y-m-d')) {
                                                            if($product_data['set_offer']['offer_type'] == 'In Amount') {
                                                                $amount = $product_data['product']['price'] - $product_data['set_offer']['offer_amount'];
                                                            } else if($product['set_offer']['offer_type'] == 'In Percentage') {
                                                                $amount = $product_data['product']['price'] - (($product_data['product']['price'] * $product_data['set_offer']['offer_amount'])/100);
                                                            }
                                                        ?>
                                                        <p><del><?php echo number_format($product_data['product']['price'],2) ?> <?php echo $product_data['product']['currency'] ?></del><em class="item_price"><?php echo number_format($amount,2) ?> <?php echo $product_data['product']['currency'] ?></em></p>
                                                        <?php } else { ?>
                                                        <p><del></del><em class="item_price"><?php echo number_format($product_data['product']['price'],2) ?> <?php echo $product_data['product']['currency'] ?></em></p>        
                                                        <?php } } else { ?>
                                                        <p><del></del><em class="item_price"><?php echo number_format($product_data['product']['price'],2) ?> <?php echo $product_data['product']['currency'] ?></em></p>
                                                        <?php } ?>
                                                        <a href="single.html?id=<?php echo $product_data['product']['product_id'] ?>" data-text="View" class="my-cart-b item_add">View</a>
                                                        <?php if(isset($wishlist)) {
                                                            if(count($wishlist) > 0) {
                                                            foreach ($wishlist as $wishlist_data) { 
                                                                $user_data = $this->Session->read('uid');
                                                                if($wishlist_data['wishlist']['product_id'] == $product['product']['product_id']) {
                                                        ?>
                                                        <p class='button_wishlist_grid' onclick='whishlistRemove("<?php echo $wishlist_data['wishlist']['user_id'] ?>", "<?php echo $product['product']['product_id'] ?>")'><i class="fa fa-heart fill_heart" aria-hidden="true"></i></p>
                                                        <?php } else { ?>
                                                        <p class='button_wishlist_grid' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $product['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                                        <?php  } } } else { ?>
                                                        <p class='button_wishlist_grid' onclick='whishlistAdd("<?php if($this->Session->check('uid')) { echo $user_id['id']; } else { echo $user_id;} ?>", "<?php echo $product['product']['product_id'] ?>")'><i class="fa fa-heart" aria-hidden="true"></i></p>
                                                        <?php } } ?>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <?php } } else { ?>
                                            <h3>No Products Available</h3>
                                            <?php } ?>
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

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
    <script>
        (function () {
            var max_price = $("#max_price").val();
            var min_price = $("#min_price").val();
            var max_value = $("#max_value").val();
            $("#range").slider({
                range: "min",
                min: 0,
                max: max_price,
                values: [min_price, max_value],
                slide: function (e, ui) {
                    var min_data = ui.values[0];
                    var max_data = ui.values[1];
                    window.location = "<?php echo DOMAIN_NAME."labezo_buyer/products.html?category_id=".$this->params['url']['category_id']."&main_id=".$this->params['url']['main_id']."&min_price=" ?>" + min_data + "<?php echo "&max_price=" ?>" + max_data;
                }
            });
        }).call(this);
    </script>

    <script>
        function selectBrand(value) {
            window.location = "<?php echo DOMAIN_NAME."labezo_buyer/products.html?category_id=".$this->params['url']['category_id']."&main_id=".$this->params['url']['main_id']."&brand=" ?>" + value;
        }
    </script>
    
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