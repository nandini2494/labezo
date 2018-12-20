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
                            <a href='Category_Manage.html' class='active'><span class="icon-1"></span> Category Manager
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
                <div class='clearfix'></div>
                <div class="container-fluid">

                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="">


                            <div class="col-md-12">
                                <form method="post">
                                    <a class="pull-right new_add_table_use" href="add_category.html">Add Information</a>
                                    &nbsp;&nbsp;
                                    <h4 class="pull-left">Category Information</h4>
                                    <div class="pull-left padding_use_pul" id="serech_show"><input type="text" name="info" placeholder="#0258"><button type="submit">Get Product</button></div>
                                </form>
                                <div class="clearfix"></div>
                                <div class="table-responsive page">


                                    <table id="mytable" class="table table-bordred table-striped">

                                        <thead>
                                            <tr>
                                                <th>Category Name</th>                                                
                                                <th>Status</th>
                                                <th>Edit</th> 
                                                <th>Delete</th> 
                                            </tr>
                                        </thead>
                                        <tbody class="product">
                                            <?php
                                            if(count($data) > 0) {
                                            foreach ($data as $result) {                                                
                                            ?>
                                            <tr>
                                                <td><?php echo $result['category_desc']['name'] ?></td>
                                                <td>
                                                    <?php if($result['category_desc']['status'] == '1') { ?>
                                                    Enabled
                                                    <?php } elseif ($result['category_desc']['status'] == '0') { ?>
                                                    Disabled
                                                    <?php } ?>
                                                </td>                                                
                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a class="btn btn-primary btn-xs" href="edit_category.html?id=<?php echo $result['category_desc']['category_id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></p></td>
                                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" onclick='deleteData("<?php echo $result['category_desc']['category_id'] ?>")'><span class="glyphicon glyphicon-trash"></span></button></p></td>

                                            </tr>
                                            <?php } } else { ?>
                                            <tr>
                                                <td colspan="9"><center><b>No Record Found</b></center></td>
                                        </tr>

                                            <?php } ?>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>
                    </div>                   

                    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <form id="deleteModal" method="post">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="cate_id" id="category_id">
                                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                                    </div>
                                    <div class="modal-footer ">
                                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;No</button>
                                    </div>
                                </div>
                                <!-- /.modal-content --> 
                            </div>
                            <!-- /.modal-dialog --> 
                        </form>
                    </div>

                </div></div>
        </div>
    </div>
    <div class='clearfix'></div>     

    <!-- custom first_page end -->
<?php echo $this->Html->script('admin/latest_jquery.js') ?>	
<?php echo $this->Html->script('admin/old_jauery.js') ?>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>

    <script>
                                                    function deleteData(id) {
                                                        $("#category_id").val(id);
                                                        $("#delete").modal("show");
                                                    }
    </script>

    <script>
        $("#deleteModal").submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo Router::url(['controller' => 'admins/delete_category']) ?>",
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
<?php echo $this->Html->script('admin/scripts.js') ?>	
<?php echo $this->Html->script('admin/dcalendar.picker.js') ?>
<?php echo $this->Html->script('admin/custom.js') ?>
<?php echo $this->Html->script('admin/bootstrap.min.js') ?>

</body>
</html>