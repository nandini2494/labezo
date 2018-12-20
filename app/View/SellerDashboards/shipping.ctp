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
        <?php echo $this->html->css('sellerDashboard/order.css') ?>
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
                                Return Orders</a>
                        </li>
                    </ul> 

                    <div class='clearfix'></div>
                </div>
                <!-- END SIDE NAV USER PANEL -->
            </div>
            <div class="right-container" id="right-container">

                <div class="container-fluid">

                    <div class="">
                        <div class="">


                            <div class="col-md-12">

                                <button class="pull-left new_add_table_use  date_shipping_active">
                                    <a href='shipping.html' class='date_shipping'>
                                        Labezo</a></button>
                                <form method="post">
                                    <div class="pull-left padding_use_pul" id="serech_show"><input type="text" name="product_info" placeholder="#0258"><button type="submit">Get Detail</button></div>
                                </form>
                                <button class="pull-right new_add_table_use new_add_table_margin">
                                    <a href='labaso.html' class='date_shipping'>
                                        Me </a></button>

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
                                                <th><center>Shipping Adress</center></th>
                                        <th>Order Date</th>
                                        <th>Status</th>

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
                                            <?php echo $order_detail['shipping_address']['city'] ?>, <?php echo $order_detail['shipping_address']['country'] ?> ( <?php echo $order_detail['shipping_address']['postal_code'] ?> )</center></td>
                                        <td><?php echo date('d-M-Y',strtotime($order_detail['product_order']['order_date'])) ?></td>
                                        <td>
                                            <?php if($order_detail['product_order']['order_status'] == 0) { ?>
                                            Ordered
                                            <?php } else if($order_detail['product_order']['order_status'] == 1) { ?>
                                            Delivered
                                            <?php } else if($order_detail['product_order']['order_status'] == 2) { ?>
                                            Cancelled
                                            <?php } else if($order_detail['product_order']['order_status'] == 3) { ?>
                                            Accepted
                                            <?php } else if($order_detail['product_order']['order_status'] == 4) { ?>
                                            In progress
                                            <?php } else if($order_detail['product_order']['order_status'] == 5) { ?>
                                            Shipped
                                            <?php } else if($order_detail['product_order']['order_status'] == 6) { ?>
                                            Completed
                                            <?php } ?>
                                        </td>                                           
                                        </tr>
                                        <?php } } else { ?>
                                        <tr>
                                            <td colspan="9"><center><b>No Records Found</b></center></td>
                                        </tr>
                                        <?php } ?>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>
                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input class="form-control " type="text" placeholder="T-shirt">
                                    </div>
                                    <div class="form-group">

                                        <input class="form-control " type="text" placeholder="$100">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control" placeholder="Lorem Ipsum is simply Lorem Ipsum is simply"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Dresses">
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="2" class="form-control" placeholder="Adidas"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Update</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                    </div>

                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                </div>
                                <div class="modal-body">

                                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                                </div>
                                <div class="modal-footer ">
                                    <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;No</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
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