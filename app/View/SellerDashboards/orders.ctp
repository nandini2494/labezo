<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labezo</title>
        <!-- Bootstrap include file -->
        <?php echo $this->Html->css('sellerDashboard/bootstrap.min.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
        <?php echo $this->Html->css('sellerDashboard/custom.css') ?>
        <?php echo $this->Html->css('sellerDashboard/custom_font/stylesheet.css') ?>
        <?php echo $this->Html->css('sellerDashboard/order.css') ?>
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
                            <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard</a>                           
                        </li>
                        <li>
                            <a href='Profile.html'><span class="icon-profile_edit_icon"></span> Edit Profile</a>                           
                        </li>
                        <li>
                            <a href='product_info.html'><span class="icon-Product_info"></span> Product Information</a>                           
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
                            <a href='orders.html' class='active'> <span class="fa fa-book" aria-hidden="true"></span> Orders</a>                          
                        </li>
                        <li>
                            <a href='Set_offer.html'> <span class="fa fa-gift" aria-hidden="true"></span>Set Offers</a>                           
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

                <div class='container-fluid'>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default panel-table new_table_use new_para_div">
                                    <div class="panel-heading">
                                        <div class="row">
                                            <form method="post">
                                                <input type="hidden" name="form_name" value="search_order">
                                                <div class="pull-left">
                                                    <h3 class="panel-title">&nbsp; Orders Detail's</h3>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="padding_use_pul" id="serech_show"><input type="text" name="product_info" placeholder="#0258"><button type="submit">Get Product</button></div>
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
                                                    <!-- <th class="col-text">Order Status</th> -->
                                                    <th class="col-text">Update Shipping Status</th>
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
                                            <td>$<?php echo number_format($order_detail['product_order']['amount'],2) ?></td>                                                                                           
                                            <!-- <td></td> -->
                                            <td>                                            
                                                <div>
                                                    <form class="form_order" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="form_name" value="update_val">
                                                        <select class='box_list' name='deliver_type'>
                                                            <option value="By Me">By Me</option>
                                                            <option value="By Labezo">By Labezo</option>
                                                        </select>
                                                        <input type="hidden" name="order_id" value="<?php echo $order_detail['product_order']['order_id'] ?>">
                                                        <button class='active_use_button' type="submit">UPDATE</button>
                                                    </form>
                                                </div>                                                                                          
                                            </td>
                                            </tr>
                                                <?php } } else { ?>
                                            <tr>
                                                <td colspan="14"><center><b>No Records Found</b></center></td>
                                            </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>   
                                    </div><div class='clearfix'></div>

                                    <div class='clearfix'></div>
                                </div>
                            </div>
                        </div>
                    </div>                                  
                </div>

            </div>
        </div>

        <!-- custom first_page end -->
<?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>

        <script>
            $(document).ready(function () {
                $('#show_text').click(function () {
                    ('#serech_show').show()
                });
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
<?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<?php echo $this->Html->script('sellerDashboard/scripts.js') ?>
<?php echo $this->Html->script('sellerDashboard/custom.js') ?>
<?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

    </body>
</html>