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
                            <a href='Shipping_Manage.html' class='active'> <span class="icon-3"></span> Shipping Manager</a>
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
                <div class='clearfix'></div>
                <div class="container-fluid">


                    <div class="">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-table new_table_use new_para_div">
                                    <div class="panel-heading">

                                        <div class="row">
                                            <form method="post">
                                                <input type="hidden" name="form_name" value="search_shipping_data">
                                                <div class="pull-left">

                                                    <h3 class="panel-title">&nbsp; Orders Detail's</h3>

                                                </div>
                                                <div class="pull-right">
                                                    <div class="padding_use_pul" id="serech_show"><input type="text" name="order_info" placeholder="#0258"><button type="submit">Get Product</button></div>
                                                </div>
                                            </form>    

                                        </div>
                                    </div>
                                    <div class="panel-body page">                                       

                                        <table id="mytable" class="table table-striped table-bordered table-list">
                                            <thead>
                                                <tr>
                                                    <th class="hidden-xs">Order ID</th>
                                                    <th class="col-text">Order Date</th>
                                                    <th class="col-text">Shipping Address</th>
                                                    <th class="col-text">Customer Name</th>
                                                    <th class="col-text">Customer Phone</th>
                                                    <th class="col-text">Customer Email</th>
                                                    <th class="col-text">Product Name</th>
                                                    <th class="col-text">Product Model</th>
                                                    <th class="col-text">Option</th>
                                                    <th class="col-text">Quantity</th>
                                                    <th class="col-text">Amount</th>
                                                    <th class="col-text">Shipping Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="product">
                                                <?php if(count($order['product_order']) > 0) {
                                                foreach ($order['product_order'] as $order_detail) { ?>
                                                <tr data-status="pending">
                                                    <td class="hidden-xs"><center><?php echo $order_detail['product_order']['order_id'] ?></center></td>
                                            <td><?php echo date('d-M-Y',strtotime($order_detail['product_order']['order_date'])) ?></td>
                                            <td><?php echo $order_detail['shipping_address']['address1'] ?>,
                                                <?php echo $order_detail['shipping_address']['city'] ?></td>
                                            <td><center><?php echo $order_detail['shipping_address']['firstname'] ?> <?php echo $order_detail['shipping_address']['lastname'] ?></center></td>
                                            <td><?php echo $order_detail['shipping_address']['mobile'] ?></td>
                                            <td><?php echo $order_detail['shipping_address']['email'] ?></td>
                                            <td><?php echo $order_detail['product_order']['product_name'] ?></td>
                                            <td><?php echo $order_detail['product_order']['product_model'] ?></td>
                                            <td>
                                                <?php foreach ($order['option'] as $option) {
                                                    foreach ($order['option_description'] as $option_desc) {
                                                    $option_id = explode(',',$order_detail['product_order']['product_option']); 
                                                    $option_desc_id = explode(',',$order_detail['product_order']['product_option_desc']); 
                                                    for($i = 0; $i < count(explode(',',$order_detail['product_order']['product_option'])); $i++) {
                                                        if(($option['option_name']['option_id'] == $option_id[$i]) && ($option_desc['option_description']['option_desc_id'] == $option_desc_id[$i])) {
                                                    ?>
                                                    <p class="para_use"><?php echo $option['option_name']['option_name']; ?> : <?php echo $option_desc['option_description']['option_desc_name'] ?></p>
                                                <?php } } } } ?>
                                            </td>
                                            <td><?php echo $order_detail['product_order']['quantity'] ?></td>
                                            <td>$<?php echo $order_detail['product_order']['amount'] ?></td>                                                                                           
                                            <td><?php echo $order_detail['product_order']['order_deliver_status'] ?></td>                                                                                                                                         
                                            </tr>
                                                <?php } } else { ?>
                                            <tr>
                                                <td colspan="14"><center><b>No Records Found</b></center></td>
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

                    <!-- <nav aria-label="Page navigation" class="text-center">
                        <ul class="pagination new_margin_pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </nav>   -->         
                </div>


                <div class='clearfix'></div>

                <!-- custom first_page end -->
                <?php echo $this->Html->script('admin/latest_jquery.js') ?>
                <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
                <?php echo $this->Html->script('admin/scripts.js') ?>
                <?php echo $this->Html->script('admin/old_jauery.js') ?>
                <?php echo $this->Html->script('admin/custom.js') ?>
                <?php echo $this->Html->script('admin/bootstrap.min.js') ?>
                </body>
                </html>