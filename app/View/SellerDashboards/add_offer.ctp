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
        <?php echo $this->Html->css('sellerDashboard/colorpicker.css') ?>
        <?php echo $this->Html->css('sellerDashboard/add_option.css') ?>
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
                            <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard </a>                           
                        </li>
                        <li>
                            <a href='Profile.html'><span class="icon-profile_edit_icon"></span> Edit Profile </a>                            
                        </li>
                        <li>
                            <a href='product_info.html'><span class="icon-Product_info"></span> Product Information </a>                            
                        </li>
                        <li>
                            <a href='option.html'><span class="fa fa-tasks"></span> Option
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal_track"><span class="icon-tranck-order"></span> Track Products </a>                            
                        </li>
                        <li>
                            <a href='shipping.html'><span class="fa fa-credit-card"></span> Shipping Method </a>                           
                        </li> 
                        <li>
                            <a href='orders.html'> <span class="fa fa-book" aria-hidden="true"></span> Orders </a>                           
                        </li>
                        <li>
                            <a href='Set_offer.html' class="active_page"> <span class="fa fa-gift" aria-hidden="true"></span> Set Offers </a>                            
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
                <form method="post" enctype="multipart/form-data">
                    <div class='container-fluid'>
                        <?php if(count($offer_data) > 0) {
                        foreach ($offer_data as $offer) { ?>
                        <div class='row bg_use_div_option'>                            
                            <h1><i class="fa fa-pencil" aria-hidden="true"></i> Edit Offer
                                <input type="submit" name="form_button" value="Update" class="btn btn-info right"/>
                            </h1>
                            <div class='form-group from_group_use_div_data'>

                                <label>
                                    <p>Product Name</p>
                                </label>
                                <label>
                                    <select name="product_name">
                                        <option value="">Select Product</option>
                                        <?php foreach ($product as $product_val) { ?>
                                        <option value="<?php echo $product_val['product']['product_id'] ?>" <?php echo ($product_val['product']['product_id'] == $offer['set_offer']['product_id'] ? 'selected="selected"' : '') ?>><?php echo $product_val['product']['product_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </label>

                            </div>                                                       

                            <div class='form-group from_group_use_div_data'>
                                <label>
                                    <p>Set Offer</p>
                                </label>
                                <label>
                                    <div class="clearf_class_color">
                                        <input type="radio" name="offer_type" value="In Amount" <?php echo ($offer['set_offer']['offer_type'] == 'In Amount' ? 'checked' : '') ?>/> In Amount 
                                        <div class='left_use_percentage'>
                                            <input type="radio" name="offer_type" value="In Percentage" <?php echo ($offer['set_offer']['offer_type'] == 'In Percentage' ? 'checked' : '') ?>/> In Percentage
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class='form-group from_group_use_div_data'>
                                <label>
                                    <p>Offer Amount</p>
                                </label>
                                <label>
                                    <input type="text" name="offer_amount" value="<?php echo $offer['set_offer']['offer_amount'] ?>">
                                </label>
                            </div>

                            <div class='form-group from_group_use_div_data'>
                                <label>
                                    <p>To Date</p>
                                </label>
                                <label>
                                    <input type="date" name="to_date" value="<?php echo $offer['set_offer']['to_date'] ?>">
                                </label>

                            </div>

                            <div class='form-group from_group_use_div_data div_data'>
                                <label>
                                    <p>From Date</p>
                                </label>
                                <label>
                                    <input type="date" name="from_date" value="<?php echo $offer['set_offer']['from_date'] ?>">
                                </label>
                            </div>
                        </div>
                        <?php } } else { ?>
                        <div class='row bg_use_div_option'>                            
                            <h1><i class="fa fa-pencil" aria-hidden="true"></i> Add Offer
                                <input type="submit" name="form_button" value="Save" class="btn btn-info right"/>
                            </h1>
                            <div class='form-group from_group_use_div_data'>

                                <label>
                                    <p>Product Name</p>
                                </label>
                                <label>
                                    <select name="product_name">
                                        <option value="">Select Product</option>
                                        <?php foreach ($product as $product_val) { ?>
                                        <option value="<?php echo $product_val['product']['product_id'] ?>"><?php echo $product_val['product']['product_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </label>

                            </div>                           

                            <div class='form-group from_group_use_div_data'>
                                <label>
                                    <p>Set Offer</p>
                                </label>
                                <label>
                                    <div class="clearf_class_color">
                                        <input type="radio" name="offer_type" value="In Amount"/> In Amount 
                                        <div class='left_use_percentage'>
                                            <input type="radio" name="offer_type" value="In Percentage"/> In Percentage
                                        </div>
                                    </div>
                                </label>
                            </div>

                            <div class='form-group from_group_use_div_data'>
                                <label>
                                    <p>Offer Amount</p>
                                </label>
                                <label>
                                    <input type="text" name="offer_amount">
                                </label>

                            </div>

                            <div class='form-group from_group_use_div_data'>
                                <label>
                                    <p>To Date</p>
                                </label>
                                <label>
                                    <input type="date" name="to_date">
                                </label>
                            </div>

                            <div class='form-group from_group_use_div_data div_data'>
                                <label>
                                    <p>From Date</p>
                                </label>
                                <label>
                                    <input type="date" name="from_date">
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </form>    
            </div>
        </div>        

        <!-- custom first_page end -->
        <?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>
        <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>      
        <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
        <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

    </body>
</html>