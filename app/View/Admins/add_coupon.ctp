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
                            <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard </a>                            
                        </li>
                        <li>
                            <a href='New_Orders.html'><span class="icon-9"></span> New Orders </a>                            
                        </li>
                        <!-- <li>
                            <a href='Buyer.html'><span class="icon-2"></span> Buyer </a>                           
                        </li> -->
                        <li>
                            <a href='New_Seller.html'><span class="icon-2"></span> New Seller </a>                            
                        </li>
                        <li>
                            <a href='Seller.html'><span class="icon-8"></span> Seller </a>                            
                        </li>                        
                        <li>
                            <a href='Category_Manage.html'><span class="icon-1"></span> Category Manager </a>                            
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
                            <a href='Coupon_Code.html' class="active"> <span class="icon-7"></span> Coupon Code Manager</a>
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
                    <div class='new_div_max_use'>
                        <form method="post" enctype="multipart/form-data">
                            <?php
                            if(isset($coupon)) {
                            if(count($coupon) > 0) { 
                                foreach ($coupon as $coupon_data) {
                            ?>
                            <h2>Edit Coupon</h2>
                            <div class='form-group custom'>
                                <p>Coupon Code</p>
                                <label>
                                    <input type='text' name='coupon_code' placeholder="Coupon Code" value="<?php echo $coupon_data['set_coupon']['coupon_code'] ?>" required=""/> 
                                </label>
                            </div>                           
                            <div class='form-group custom'>
                                <p>Amount</p>
                                <label>
                                    <input type='text' name='amount' placeholder="Amount" value="<?php echo $coupon_data['set_coupon']['amount'] ?>" required=""/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Type</p>
                                <label>
                                    <select name="type" required="">
                                        <option value="">Select Type</option>
                                        <option value="Fixed" <?php echo ($coupon_data['set_coupon']['type'] == 'Fixed' ? 'selected="selected"' : '') ?>>Fixed</option>
                                        <option value="Percentage" <?php echo ($coupon_data['set_coupon']['type'] == 'Percentage' ? 'selected="selected"' : '') ?>>Percentage</option>
                                    </select>  
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>To Date</p>
                                <label>
                                    <input type='date' name='to_date' value="<?php echo $coupon_data['set_coupon']['to_date'] ?>" required=""/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>From Date</p>
                                <label>
                                    <input type='date' name='from_date' value="<?php echo $coupon_data['set_coupon']['from_date'] ?>" required=""/> 
                                </label>
                            </div>                                                       
                            <div class='form-group custom'>                            
                                <input class="btn btn-primary button_save" type="submit" name="form_button" value="Update"/>
                            </div>
                            <?php } } } else { ?>  
                            <h2>Add Coupon</h2>
                            <div class='form-group custom'>
                                <p>Coupon Code</p>
                                <label>
                                    <input type='text' name='coupon_code' placeholder="Coupon Code" required=""/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Amount</p>
                                <label>
                                    <input type='text' name='amount' placeholder="Amount" required=""/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Type</p>
                                <label>
                                    <select name="type" required="">
                                        <option value="">Select Type</option>
                                        <option value="Fixed">Fixed</option>
                                        <option value="Percentage">Percentage</option>
                                    </select>  
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>To Date</p>
                                <label>
                                    <input type='date' name='to_date' required=""/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>From Date</p>
                                <label>
                                    <input type='date' name='from_date' required=""/> 
                                </label>
                            </div>                           
                            <div class='form-group custom'>                            
                                <input class="btn btn-primary button_save" type="submit" name="form_button" value="Save"/>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class='clearfix'></div>

        <!-- custom first_page end -->
        <?php echo $this->Html->script('admin/latest_jquery.js') ?>        
        <?php echo $this->Html->script('admin/old_jauery.js') ?>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <?php echo $this->Html->script('admin/scripts.js') ?>
        <?php echo $this->Html->script('admin/dcalendar.picker.js') ?>
        <?php echo $this->Html->script('admin/custom.js') ?>
        <?php echo $this->Html->script('admin/bootstrap.min.js') ?>

    </body>
</html>