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
                        <li>
                            <a href='Buyer.html' class='active'><span class="icon-2"></span> Buyer
                            </a>
                        </li>
                        <li>
                            <a href='New_Seller.html'><span class="icon-8"></span> New Seller
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
                <div class='clearfix'></div>
                <div class="container-fluid">

                    <div class="">
                        <div class="">


                            <div class="col-md-12">

                                <button class="pull-right new_add_table_use" data-placement="left" title="Product Add" data-toggle="modal" data-target="#myModal">Add Information</button>
                                &nbsp;&nbsp;


                                <h4 class="pull-left">Product Information</h4>
                                <div class="pull-left padding_use_pul" id="serech_show"><input type="text" placeholder="#0258"><button>Get Product	</button></div>
                                <div class="clearfix"></div>
                                <div class="table-responsive page">


                                    <table id="mytable" class="table table-bordred table-striped">

                                        <thead>


                                            <tr><th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>Billing Address</th>
                                                <th>Shipping Address</th>
                                                <th>Total Orders Made</th>
                                                <th>Total Amount Paid</th>
                                                <th>Cancelled Products</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr></thead>
                                        <tbody class="product">

                                            <tr>

                                                <td>Vikas</td>
                                                <td>vikasgoswami851@gmail.com</td>

                                                <td>8750967417</td>
                                                <td>E-344 Street no-15 khajoori khass</td>
                                                <td>E-344 Street no-16 Delhi</td>
                                                <td>5000</td>
                                                <td>$5000</td>
                                                <td>500</td>




                                                <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>

                                                <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>

                                            </tr>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>


                                </div>

                            </div>
                            
                        </div>
                    </div>


                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog bounceInDown">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">vikas</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">vikasgoswami851@gmail.com</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">8750967417</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">E-344 Street no-15 khajoori khass</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">E-344 Street no-16 Delhi</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">500</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">$5000</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
                                    </div>
                                    <div class="form-group -animated">
                                        <label for="#form-control-2">500</label>
                                        <input class="form-control" id="form-control-2" type="text"/>
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

                </div></div>
        </div>
    </div>
    <div class='clearfix'></div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog bounceInDown">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Add Buyers Information</h4>
            </div>
            <div class="modal-body">
                <div class="form-group -animated">
                    <label for="#form-control-2">Name</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">Email</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">Contact</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">E-344 Street no-15 khajoori khass</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">E-344 Street no-16 Delhi</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">500</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">$5000</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
                <div class="form-group -animated">
                    <label for="#form-control-2">500</label>
                    <input class="form-control" id="form-control-2" type="text"/>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="fa fa-plus-circle" aria-hidden="true"></span>&nbsp;Add</button>
            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
</div>






<!-- custom first_page end -->
<?php echo $this->Html->script('admin/latest_jquery.js') ?>	
<script>
    $(function () {

        $('.form-group.-animated .form-control, .form-group.-overlayed .form-control').keyup(function (event) {
            if ($(this).val() != '') {
                $(this).parent('.form-group').addClass('-active');
            } else {
                $(this).parent('.form-group').removeClass('-active');
            }
        });

        $('.form-group.-animated .form-control, .form-group.-overlayed .form-control').focusin(function (event) {
            $(this).parent('.form-group').addClass('-focus');
        });

        $('.form-group.-animated .form-control, .form-group.-overlayed .form-control').focusout(function (event) {
            $(this).parent('.form-group').removeClass('-focus');
        });

    })
</script>
<?php echo $this->Html->script('admin/old_jauery.js') ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<?php echo $this->Html->script('admin/scripts.js') ?>
<?php echo $this->Html->script('admin/dcalendar.picker.js') ?>
<?php echo $this->Html->script('admin/custom.js') ?>
<?php echo $this->Html->script('admin/bootstrap.min.js') ?>

</body>
</html>