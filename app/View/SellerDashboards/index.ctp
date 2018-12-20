<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labezo</title>

        <?php echo $this->Html->css('sellerDashboard/bootstrap.min.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <?php echo $this->Html->css('sellerDashboard/custom.css') ?>
        <?php echo $this->Html->css('sellerDashboard/custom_font/stylesheet.css') ?>
        <!-- new  -->
        <style>
            .modal-dialog{margin:0 auto !important;}
        </style>
    </head>
    <body>
        <!-- custom first_page -->
        <!--top nav start=======-->
        <?php echo $this->Element('sellerDashboard/header') ?>
        <!--    top nav end===========-->
        <div class="wrapper" id="wrapper">
            <div class="left-container" id="left-container">
                <!-- begin SIDE NAV USER PANEL -->
                <div class="left-sidebar new_left_slide_bar" id="show-nav">
                    <ul class="side-nav">
                        <li>
                            <a href='index.html' class='active'> <span class="fa fa-dashboard"></span> Dashboard </a>                            
                        </li>
                        <li>
                            <a href='Profile.html'><span class="icon-profile_edit_icon"></span> Edit Profile </a>                           
                        </li>
                        <li>
                            <a href='product_info.html'><span class="icon-Product_info"></span> Product Information </a>                           
                        </li>
                        <li>
                            <a href='option.html'><span class="fa fa-tasks"></span> Option </a>                           
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal_track"><span class="icon-tranck-order"></span> Track Products </a>                           
                        </li>
                        <li>
                            <a href='shipping.html'><span class="fa fa-credit-card"></span> Shipping Method </a>                           
                        </li> 
                        <li>
                            <a href='orders.html'> <span class="fa fa-book" aria-hidden="true"></span> Orders </a>                           
                        </li>
                        <li>
                            <a href='Set_offer.html'> <span class="fa fa-gift" aria-hidden="true"></span> Set Offers </a>                           
                        </li> 
                        <li>
                            <a href='rating.html'> <span class="icon-rating_and_review"></span> Ratting and Reviews</a>
                        </li> 
                        <li>
                            <a href='return_order.html'>
                                <span class="icon-return_order"></span>
                                Return Orders
                            </a>
                        </li>
                    </ul> 
                    <div class='clearfix'></div>

                </div>
                <!-- END SIDE NAV USER PANEL -->
            </div>
            <div class="right-container" id="right-container">
                <div class="container-fluid">
                    <!-- new_div experec -->
                    <section id="counter" class="counter">
                        <div class="main_counter_area">
                            <div class="overlay p-y-3">
                                <div class="container">
                                    <div class="row">
                                        <div class="main_counter_content text-center white-text wow fadeInUp">
                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="single_counter p-y-2 m-t-1" id="shiva">
                                                    <i class="fa fa-heart m-b-1"></i>
                                                    <h2 class="statistic-counter count"><?php echo $wishlist_count ?></h2>
                                                    <p>Wish List Product</p>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-12 col-xs-12">
                                                <div class="single_counter p-y-2 m-t-1" id="shiva">
                                                    <i class="fa fa-shopping-cart m-b-1" aria-hidden="true"></i>
                                                    <h2 class="statistic-counter count"><?php echo $order_count ?></h2>
                                                    <p>Total Orders</p>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-12 col-xs-12">
                                                <div class="single_counter p-y-2 m-t-1" id="shiva">
                                                    <i class="fa fa-expand m-b-1" aria-hidden="true" ></i>
                                                    <h2 class="statistic-counter count"><?php echo $total_amount[0][0]['SUM(product_order.payment_amount)'] ?></h2>
                                                    <p>Total Amount</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End of counter Section -->
                    <!-- new_div experec end -->
                    <div class="service-container">
                        <div class="singleservice">  

                            <span class="icon-tranck-order"></span>
                            <h2 class="servicetitle">
                                Product Information
                            </h2>
                            E-book or print, my goal is to make a captivating image that is true to your novel.<div class='clearfix'></div><br/>
                            <a href='product_info.html' class='hide_div_get_info'>Get Information</a>
                        </div>
                        <div class="singleservice">  
                            <span class="icon-Product_info"></span>
                            <h2 class="servicetitle">
                                Track Products
                            </h2>
                            From app icons to illustrations, look sharp with scalable, crisp, and lively graphics.
                            <div class='clearfix'></div><br/>
                            <a href="#" data-toggle="modal" data-target="#myModal_track" class='hide_div_get_info'>Order Track's</a>
                        </div>
                        <div class="singleservice">  
                            <span class="icon-rating_and_review"></span>
                            <h2 class="servicetitle">
                                Ratting and Reviews
                            </h2>  
                            From app icons to illustrations, look sharp with scalable, crisp, and lively graphics.
                            <div class='clearfix'></div>
                            <br/>
                            <a href='rating.html' class='hide_div_get_info'>Ratting and Reviews</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>   

    <!-- custom first_page end -->
    <?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>
    <script>
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 2000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>  
    
    <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>
    <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
    <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>
</body>
</html>