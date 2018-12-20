<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labezo</title>
        <!-- Bootstrap include file -->
        <?php echo $this->Html->css("admin/bootstrap.min.css") ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
        <?php echo $this->Html->css("admin/custom.css") ?>
        <?php echo $this->Html->css("admin/custom_font/stylesheet.css") ?>
        <?php echo $this->Html->css("admin/dcalendar.picker.css") ?>
        <!-- new  -->
        <style>
            .modal-dialog{margin:0 auto !important;}
        </style>
    </head>
    <body>
        <!-- custom first_page -->
        <!--top nav start=======-->
        <?php echo $this->Element('adminDashboard/header') ?>
        <!--    top nav end===========-->
        <div class="wrapper" id="wrapper">
            <div class="left-container" id="left-container">
                <!-- begin SIDE NAV USER PANEL -->
                <div class="left-sidebar new_left_slide_bar" id="show-nav">
                    <ul class="side-nav">
                        <li>
                            <a href='index.html'  class='active'> <span class="fa fa-dashboard"></span> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href='New_Orders.html'><span class="icon-9"></span> New Orders
                            </a>
                        </li>
                        <!-- <li>
                            <a href='Buyer.html'><span class="icon-2"></span> Buyer
                            </a>
                        </li> -->
                        <li>
                            <a href='New_Seller.html'><span class="icon-2"></span> New Seller
                            </a>
                        </li>
                        <li>
                            <a href='Seller.html'><span class="icon-8"></span> Seller
                            </a>
                        </li>                        
                        <li>
                            <a href='Category_Manage.html'><span class="icon-1"></span> Category Manager
                            </a>
                        </li> 
                        <li>
                            <a href='Product_Manage.html' > <span class="fa fa-product-hunt" aria-hidden="true"></span> Product Manager
                            </a>
                        </li>
                        <li>
                            <a href='image.html' > <span class="fa fa-picture-o" aria-hidden="true"></span> Image Manager
                            </a>
                        </li>
                        <!-- <li>
                            <a href='Option_Manage.html'><i class="fa fa-tasks" aria-hidden="true"></i> Option Manager
                            </a>
                        </li> -->
                        <li>
                            <a href='Shipping_Manage.html'> <span class="icon-3"></span> Shipping Manager</a>
                        </li> 
                        <li>
                            <a href='Return_Product.html'> <span class="icon-4"></span> Return Products</a>
                        </li>
                        <li>
                            <a href='News_Latter.html'> <span class="icon-5"></span> News Latter Manager</a>
                        </li>
                        <li>
                            <a href='Coupon_Code.html'> <span class="icon-7"></span> Coupon Code Manager</a>
                        </li>
                        <li>
                            <a href='Offer_Manage.html'> <span class="icon-6"></span> Offer Manager</a>
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
                                            <div class="col-md-11 col-sm-11 col-xs-12">
                                                <div class="single_counter p-y-2 m-t-1">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    <h2 class="statistic-counter count">1000</h2>
                                                    <h3>Total Visitors</h3>
           <!-- <p>Wish List Product</p> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- End of counter Section -->
                    <!-- new_div experec end -->
                    <div class="counter">
                        <div class="contanier-fluid">
                            <div class="row">
                                <div class='data_detai_1 new_date_use'>
                                    <form method="post" name="form">
                                        <h2>Choose Your Date</h2>
                                        <div class='class_use form-group'>
                                            <label>&nbsp; Form
                                                <input class="form-control" id="demo" name="from" required type="text">
                                            </label>
                                            <label>
                                                &nbsp;To
                                                <input class="form-control" id="demo_1" name="to" required type="text"/>
                                                <input type='submit' value='Get Sale Now'/>
                                            </label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="employees">
                                    <p class="counter-count"><?php echo $total_sale ?></p>
                                    <p class="employee-p">Total Sales</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="customer">
                                    <p class="counter-count"><?php echo $total_seller ?></p>
                                    <p class="customer-p">Total Sellers</p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div class="design">
                                    <p class="counter-count"><?php echo $total_product ?></p>
                                    <p class="design-p">Total Products</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<div id="myModal_track" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Track Your Order</h4>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label class='order_id_use'>Order Id</label><div class='clearfix'></div>
                    <span class='posit_use_over'><input type='text' name='text' placeholder='#0055'>
                        <button title='Go Now'>Track</button>
                    </span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<!-- custom first_page end -->
<?php echo $this->Html->script("admin/latest_jquery.js") ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script>
    $('.counter-count').each(function () {
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

<?php echo $this->Html->script("admin/old_jauery.js") ?>
<?php echo $this->Html->script("admin/dcalendar.picker.js") ?>

<script>
    $('#demo').dcalendarpicker();
    $('#calendar-demo').dcalendar();
    $('#demo_1').dcalendarpicker();
    $('#calendar-demo').dcalendar();
</script>
<?php echo $this->Html->script("admin/custom.js") ?>
<?php echo $this->Html->script("admin/bootstrap.min.js") ?>

</body>
</html>