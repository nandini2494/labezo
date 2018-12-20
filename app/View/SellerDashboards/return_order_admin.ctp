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
                            <a href='shipping.html'><span class="fa fa-credit-card"></span> Shipping Method
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
                            <a href='return_order.html' class="active">
                                <span class="icon-return_order"></span>
                                Return Orders</a>
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
                                <div class="panel panel-default panel-table new_table_use">
                                    <div class="panel-heading">

                                        <div class="row">

                                            <div class="pull-left">
                                                <!-- <div class="padding_use_pul" id="serech_show"><input type="text" placeholder="#0258"><button>Get Product	</button></div> -->
                                                <h3 class="panel-title">&nbsp; Return Orders Details</h3>

                                            </div>
                                            <div class="pull-right">
                                                <a href="return_order.html" class="active_use_button_use">Me</a>
                                            </div>
                                            <!-- <div class="pull-right">
                                                <div class="pull-right">
                                                    <div class="btn-group" data-toggle="buttons">
                                                        <label class="btn btn-success btn-filter" data-target="completed">
                                                            <input type="radio" name="options" id="option1" autocomplete="off">
                                                            Returned
                                                        </label>
                                                        <label class="btn btn-warning btn-filter active" data-target="pending">
                                                            <input type="radio" name="options" id="option2" autocomplete="off"> Pending
                                                        </label>
                                                        <label class="btn btn-default btn-filter" data-target="all">
                                                            <input type="radio" name="options" id="option3" autocomplete="off"> All
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <table id="mytable" class="table table-striped table-bordered table-list">
                                            <thead>
                                                <tr>
                                                    <th class="col-text">Order Id</th>
                                                    <th class="col-text">Buyer Email</th>
                                                    <th class="col-text">Buyer Address</th>
                                                    <th class="col-text">Date</th>
                                                    <th class="col-text">Return Reason</th>
                                                    <th class="col-text">Product Name</th>
                                                    <th class="col-text">Quantity</th>
                                                    <th class="col-text">Product Open</th>
                                                    <th class="col-text">Other Details</th>
                                                    <th class="col-text">Return Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                <?php if(count($return_product) > 0) {
                                                    foreach ($return_product as $product) {
                                                ?>
                                            <tr data-status="pending">
                                                <td class="hidden-xs"><center><?php echo $product['return_product']['order_id'] ?></center></td>
                                            <td><?php echo $product['buyer_register']['email'] ?></td>
                                            <td><?php echo $product['buyer_register']['address'] ?>, <?php echo $product['buyer_register']['city'] ?>, <?php echo $product['buyer_register']['state'] ?>, <?php echo $product['buyer_register']['country'] ?> (<?php echo $product['buyer_register']['pin_code'] ?>)</td>
                                            <td><?php echo date('d-M-Y',strtotime($product['return_product']['order_submit'])) ?></td>
                                            <td><?php echo $product['return_product']['return_reason'] ?></td>
                                            <td><?php echo $product['return_product']['product_name'] ?></td>
                                            <td><?php echo $product['return_product']['quantity'] ?></td>
                                            <td><?php echo $product['return_product']['product_open'] ?></td>
                                            <td><?php echo $product['return_product']['other_detail'] ?></td>
                                            <td><?php echo $product['return_product']['return_status'] ?></td>
                                            </tr>
                                            <?php } } else { ?>
                                            <tr data-status="pending"><td colspan="12"><center><b>No Records Found</b></center></td></tr>
                                                <?php } ?>
                                                                                       
                                            </tbody>
                                        </table>

                                    </div><div class='clearfix'></div>

                                    <div class='clearfix'></div>
                                </div>
                            </div>
                        </div>
                    </div>    

                    <nav aria-label="Page navigation" class="text-center">
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
                        <div class='clearfix'></div>
                    </nav>            
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