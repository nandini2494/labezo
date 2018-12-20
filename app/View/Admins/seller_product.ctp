<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labezo</title>
        <!-- Bootstrap include file -->
        <?php echo $this->Html->css('admin/bootstrap.min.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
        <?php echo $this->Html->css('admin/custom.css') ?>
        <?php echo $this->Html->css('admin/custom_font/stylesheet.css') ?>
        <?php echo $this->Html->css('admin/styles.imageuploader.css') ?>
        <?php echo $this->Html->css('admin/dcalendar.picker.css') ?>
        <?php echo $this->Html->css('admin/add_category.css') ?>
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
                            <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard
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
                            <a href='Return_Product.html'  class='active'> <span class="icon-4"></span> Return Products</a>
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
                <div class='clearfix'></div>
                <div class="container-fluid">


                    <div class="">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-table new_table_use new_para_div">
                                    <div class="panel-heading">

                                        <div class="row">

                                            <div class="pull-left">

                                                <h3 class="panel-title">&nbsp; Orders Detail's</h3>

                                            </div>
                                            <div class="pull-right">
                                                <a href="Return_Product.html" class="active_use_button_use">Me</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="panel-body page">
                                        <table id="mytable" class="table table-striped table-bordered table-list">
                                            <thead>
                                            <tr>
                                            <th class="hidden-xs"><center>Order ID</center></th>
                                            <th class="col-text"><center>Seller Name</center></th>
                                            <th class="col-text"><center>Buyer Email</center></th>
                                            <th class="col-text"><center>Buyer Address</center></th>
                                            <th class="col-text"><center>Date</center></th>                                           
                                            <th class="col-text"><center>Return Reason</center></th>
                                            <th class="col-text"><center>Product Name</center></th>
                                            <th class="col-text"><center>Qunatity</center></th>
                                            <th class="col-text"><center>Product Open</center></th>
                                            <th class="col-text"><center>Other Details</center></th>
                                            <th class="col-text"><center>Return Status</center></th>
                                            </tr>
                                            </thead>
                                            <tbody class="product">
                                                <?php if(count($return_data) > 0) { 
                                                    foreach ($return_data as $return) {
                                                ?>
                                            <tr data-status="pending">
                                            <td class="hidden-xs"><center><?php echo $return['return_product']['order_id'] ?></center></td>
                                            <td><center><?php echo $return['seller']['name'] ?></center></td>
                                            <td>
                                            <center><?php echo $return['buyer_register']['email'] ?></center>
                                            </td>
                                            <td><?php echo $return['buyer_register']['address'] ?>, <?php echo $return['buyer_register']['city'] ?>, <?php echo $return['buyer_register']['state'] ?>, <?php echo $return['buyer_register']['country'] ?> (<?php echo $return['buyer_register']['pin_code'] ?>)</td>                                                                                        
                                            <td>
                                            <center><?php echo date('d-M-Y',strtotime($return['return_product']['order_submit'])) ?></center>
                                            </td>
                                            <td>
                                            <center><?php echo $return['return_product']['return_reason'] ?></center>
                                            </td>
                                            <td>
                                            <center><?php echo $return['return_product']['product_name'] ?></center>
                                            </td>
                                            <td>
                                            <center><?php echo $return['return_product']['quantity'] ?></center>
                                            </td>
                                            <td>
                                            <center><?php echo $return['return_product']['product_open'] ?></center>
                                            </td>
                                            <td>
                                            <center><?php echo $return['return_product']['other_detail'] ?></center>
                                            </td>
                                            <td><?php echo $return['return_product']['return_status']?></td>                                                                                                                                            
                                            </tr>
                                                <?php } } else { ?>
                                            <tr data-status="pending">
                                                <td colspan="12"><center><b>No Records Found</b></center></td>
                                            </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                    </div><div class="clearfix"></div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>               
                </div>


                <div class='clearfix'></div>

                <!-- custom first_page end -->
                <?php echo $this->html->script('admin/latest_jquery.js') ?>
                <?php echo $this->html->script('admin/old_jauery.js') ?>
                <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
                <?php echo $this->Html->script('admin/scripts.js') ?>
                <?php echo $this->html->script('admin/custom.js') ?>
                <?php echo $this->html->script('admin/bootstrap.min.js') ?>
                </body>
                </html>