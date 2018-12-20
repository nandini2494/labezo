
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
        <?php echo $this->Html->css('sellerDashboard/styles.imageuploader.css') ?>        
        <style>
            .modal-dialog{margin:0 auto !important;}
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
                border: solid 1px #b3a7a7;
            }
            .btn-warning:hover{background:#111975 ;}
            .btn-warning,.btn-success{background:#060c52;border:none;}
            .btn-primary,.btn-danger{background:#060c52;border:none;}
            .btn-warning,.btn-success:hover{background:#111975 ;}
            .btn-primary,.btn-danger:hover{background:#111975 ;}
        </style>
        <!-- new  -->
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
                            <a href='option.html' class='active'><span class="fa fa-tasks"></span> Option
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

                <div class='container-fluid'>

                    <div class="">
                        <div class="">


                            <div class="col-md-12">

                                <a class='pull-right new_add_table_use' href="add_option.html">Add Option</a>
                                &nbsp;&nbsp;                                

                                <div class='clearfix'></div>
                                <div class="table-responsive page">

                                    <table id="mytable" class="table table-bordred table-striped">

                                        <thead>
                                        <th>Option Name</th>
                                        <th>Sort Order</th>                                        
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        </thead>
                                        <tbody class="product">

                                            <?php 
                                                if(count($data) > 0) {
                                                foreach ($data as $value) {                                                                                               
                                            ?>
                                            <tr>
                                                <td><?php echo $value['option_name']['option_name'] ?></td>
                                                <td><?php echo $value['option_name']['sort_order'] ?></td>                                                                                                                                                       
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="edit_option.html?id=<?php echo $value['option_name']['option_id'] ?>" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" onclick='delete_data("<?php echo $value['option_name']['option_id'] ?>")'><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                            </tr>
                                        <?php } } else { ?>
                                            <tr><td colspan="12"><center><b>No Product Found</b></center></td></tr>
                                        <?php } ?>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>

                                </div>

                            </div>                            
                        </div>
                    </div>                  

                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <form method="post" id="delete_modal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="option_id" id="option_id1">
                                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                                    </div>
                                    <div class="modal-footer ">
                                        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                                    </div>
                                </div>
                                <!-- /.modal-content --> 
                            </div>
                            <!-- /.modal-dialog --> 
                        </form>
                    </div>

                </div>

            </div>
        </div>

        <!-- custom first_page end -->
    <?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>    

        <script>
            function delete_data(id) {
                $("#option_id1").val(id);
                $("#delete").modal("show");
            }
        </script>

        <script>
            $("#delete_modal").submit(function () {
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'sellerDashboards/delete_option']) ?>",
                    type: "post",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        location.reload();
                    }
                });
            });
        </script>   

    <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>  
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <?php echo $this->Html->script('sellerDashboard/scripts.js') ?>	
    <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
    <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

    </body>
</html>