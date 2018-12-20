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
        <style>
            .modal-dialog{margin:0 auto !important;}
            .btn-group .btn {
                transition: background-color .3s ease;
            }
            .panel-table .panel-body {
                padding: 0;
            }
            .table > thead > tr > th {
                border-bottom: none;
            }
            .panel-footer, .panel-table .panel-body .table-bordered {
                border-style: none;
                margin: 0;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type {
                text-align: center;
                width: 50px;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th.col-tools {
                text-align: center;
                width: 120px;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th:last-of-type,
            .panel-table .panel-body .table-bordered > tbody > tr > td:last-of-type {
                border-right: 0;
            }
            .panel-table .panel-body .table-bordered > thead > tr > th:first-of-type,
            .panel-table .panel-body .table-bordered > tbody > tr > td:first-of-type {
                border-left: 0;
            }
            .panel-table .panel-body .table-bordered > tbody > tr:first-of-type > td {
                border-bottom: 0;
            }
            .panel-table .panel-body .table-bordered > thead > tr:first-of-type > th {
                border-top: 0;
            }
            .pagination > li > a, .pagination > li > span {
                border-radius: 50% !important;
                margin: 0 5px;
            }
            .pagination {
                margin: 0;
            }
        </style>
        <!-- new -->
    </head>
    <body>
        <!-- custom first_page -->
        <!--top nav start=======-->
        <?php echo $this->Element('sellerDashboard/header') ?>
        <!-- top nav end===========-->
        <div class="wrapper" id="wrapper">
            <div class="left-sidebar new_left_slide_bar" id="show-nav">
                <ul class="side-nav">
                    <li>
                        <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href='Profile.html'><span class="icon-profile_edit_icon"></span> Edit Profile
                        </a>
                    </li>
                    <li>
                        <a href='product_info.html'><span class="icon-Product_info"></span> Product Information
                        </a>
                    </li>
                    <li>
                        <a href='option.html'><span class="fa fa-tasks"></span> Option
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal_track"><span class="icon-tranck-order"></span> Track Products
                        </a>
                    </li>
                    <li>
                        <a href='shipping.html' class="active"><span class="fa fa-credit-card"></span> Shipping Method
                        </a>
                    </li> 
                    <li>
                        <a href='orders.html'> <span class="fa fa-book" aria-hidden="true"></span> Orders
                        </a>
                    </li>
                    <li>
                        <a href='Set_offer.html'> <span class="fa fa-gift" aria-hidden="true"></span> Set Offers
                        </a>
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

            <div class="right-container" id="right-container">
                <div class="container-fluid">
                    <div class="">
                        <div class="">
                            <div class="col-md-12">
                                <button class="pull-left new_add_table_use">
                                    <a href='shipping.html' class='date_shipping'>
                                        Labezo
                                    </a>
                                </button>
                                <form method="post">
                                    <input type="hidden" name="form_name" value="search_data">                                   
                                    <div class="pull-left padding_use_pul" id="serech_show"><input type="text" name="product_info" placeholder="#0258"><button type="submit">Get Detail</button></div>
                                </form>
                                <button class="pull-right new_add_table_use new_add_table_margin date_shipping_active">
                                    <a href='labaso.html' class='date_shipping'>
                                        Me 
                                    </a>
                                </button>
                                <div class="clearfix"></div>
                                <div class="table-responsive page">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Product Name</th>
                                                <th>Product Model</th> 
                                                <th>Option</th> 
                                                <th><center>Quantity</center></th>
                                                <th><center>Shipping Address</center></th>
                                        <th>Order Date</th>
                                        <!-- <th>Status</th> -->
                                        <th>Update Status</th>
                                        </tr>
                                        </thead>
                                        <tbody class="product">
                                            <?php if(count($order['product_order']) > 0) {
                                            foreach ($order['product_order'] as $order_detail) { ?>
                                            <tr>
                                                <td><?php echo $order_detail['product_order']['order_id'] ?></td>
                                                <td><?php echo $order_detail['product']['product_name'] ?></td>
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
                                                <td><center><?php echo $order_detail['product_order']['quantity'] ?></center></td>
                                                <td><center><?php echo $order_detail['shipping_address']['address1'] ?>,
                                            <?php echo $order_detail['shipping_address']['city'] ?>, <?php echo $order_detail['shipping_address']['state'] ?>, <?php echo $order_detail['shipping_address']['country'] ?> ( <?php echo $order_detail['shipping_address']['postal_code'] ?> )</center></td>
                                        <td><?php echo date('d-M-y',strtotime($order_detail['product_order']['order_date'])) ?></td>
                                        <!-- <td>
                                            <select class="box_list" id="box_enabled">
                                                <option>Accepted</option>
                                                <option>In progress</option>
                                                <option>Shipped</option>
                                                <option>Delivered</option>
                                                <option>Completed</option>
                                            </select>
                                        </td> -->
                                        <td>
                                            <!-- <button class="active_use_button update_button" id=""><center>UPDATE</center></button> -->
                                            <div>
                                                <form class="labaso_form" method="post">
                                                    <input type="hidden" name="form_name" value="labaso_form">
                                                    <input type="hidden" name="order_id" value="<?php echo $order_detail['product_order']['id'] ?>">
                                                    <select class="box_list labaso_drop" name="order_status">
                                                        <option value="">Select Status</option>
                                                        <option value="3" <?php echo ($order_detail['product_order']['order_status'] == '3' ? 'selected="selected"' : '') ?>>Accepted</option>
                                                        <option value="4" <?php echo ($order_detail['product_order']['order_status'] == '4' ? 'selected="selected"' : '') ?>>In progress</option>
                                                        <option value="5" <?php echo ($order_detail['product_order']['order_status'] == '5' ? 'selected="selected"' : '') ?>>Shipped</option>
                                                        <option value="1" <?php echo ($order_detail['product_order']['order_status'] == '1' ? 'selected="selected"' : '') ?>>Delivered</option>
                                                        <option value="6" <?php echo ($order_detail['product_order']['order_status'] == '6' ? 'selected="selected"' : '') ?>>Completed</option>
                                                    </select>
                                                    <button class="active_use_button labaso_btn" type="submit" id="save_button"><center>Save</center></button>
                                                </form>
                                            </div>                                            
                                        </td>
                                        </tr>
                                            <?php } } else { ?>
                                        <tr>
                                            <td colspan="12"><center><b>No Record Found</b></center></td>
                                        </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="clearfix"></div>
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