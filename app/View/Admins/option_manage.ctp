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
                        <li>
                            <a href='Option_Manage.html' class='active'><i class="fa fa-tasks" aria-hidden="true"></i> Option Manager
                            </a>
                        </li> 
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

                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="">


                            <div class="col-md-12">
                                &nbsp;&nbsp;

                                <div class="col-lg-6  col-sm-12 col-lg-offset-4 padding_use_pul" id="serech_show"><h1 class='info_details'>Product Information</h1>
                                    <input type="text" placeholder="#0258"><button>Get Product	</button></div>

                                <div class='clearfix'></div>
                                <div class="clearfix"></div>
                                <div class="table-responsive">


                                    <table id="mytable" class="table table-bordred table-striped">

                                        <thead>


                                            <tr><th>Option Name</th>
                                                <th>Option Parameters</th>
                                                <th>Option Category</th> 
                                            </tr></thead>
                                        <tbody>

                                            <tr>

                                                <td>Red<br/>XL</td>
                                                <td>Red,Green,XXC,XL,XXL</td>

                                                <td>Clothing</td>

                                            </tr>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>
                                    
                                </div>

                            </div>
                            <ul class="pagination pull-right">
                                <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                            </ul>
                        </div>
                    </div>


                </div>


                <div class='clearfix'></div>

                <!-- custom first_page end -->
                <?php echo $this->Html->script('admin/latest_jquery.js') ?>
                <?php echo $this->Html->script('admin/old_jauery.js') ?>
                <?php echo $this->Html->script('admin/custom.js') ?>
                <?php echo $this->Html->script('admin/bootstrap.min.js') ?>
</body>
</html>