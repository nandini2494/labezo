<!DOCTYPE HTML>
<html>
    <head>
        <title>Labezo</title>
        <!--css-->
        <?php echo $this->Html->css('buyer/bootstrap.css') ?>
        <?php echo $this->Html->css('buyer/style.css') ?>
        <?php echo $this->Html->css('buyer/font-awesome.css') ?>

        <!--css-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="New Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <?php echo $this->Html->script('buyer/jquery.min.js') ?>

        <!--search jQuery-->
        <?php echo $this->Html->script('buyer/main.js') ?>        
        <!--search jQuery-->
        <?php echo $this->Html->script('buyer/responsiveslides.min.js') ?>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <!--mycart-->
        <?php echo $this->Html->script('buyer/bootstrap-3.1.1.min.js') ?>
        <?php echo $this->Html->script('buyer/jstarbox.js') ?>
        <?php echo $this->Html->css('buyer/jstarbox.css') ?>

        <script type="text/javascript">
            jQuery(function () {
                jQuery('.starbox').each(function () {
                    var starbox = jQuery(this);
                    starbox.starbox({
                        average: starbox.attr('data-start-value'),
                        changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                        ghosting: starbox.hasClass('ghosting'),
                        autoUpdateAverage: starbox.hasClass('autoupdate'),
                        buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                        stars: starbox.attr('data-star-count') || 5
                    }).bind('starbox-value-changed', function (event, value) {
                        if (starbox.hasClass('random')) {
                            var val = Math.random();
                            starbox.next().text(' ' + val);
                            return val;
                        }
                    })
                });
            });
        </script>
        <!--//End-rate-->
    </head>
    <body>
        <!--header-->
        <div class="header">
            <?php echo $this->Element('buyer/header_top') ?>
            <?php echo $this->Element('buyer/header') ?>
        </div>
        <!--header-->
        <div class=" container">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Checkout</a></li>
            </ul>
            <div class="title">
                <h3>Checkout</h3>
            </div>
            <div class='row'>
                <div class="container wrapper">
                    <div class="row cart-head">
                        <div class="container">
                            <div class="row">
                                <p></p>
                            </div>
                            <div class="row">
                                <p></p>
                            </div>
                        </div>
                    </div>    
                    <div class="row cart-body">
                        <div class="form-horizontal">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                                <!--REVIEW ORDER-->
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        Review Order <div class="pull-right"><small><a class="afix-1" href="cart.html">Edit Cart</a></small></div>
                                    </div>
                                    <div class="panel-body">
                                        <?php $total_price = 0; $total = 0;
                                        if(isset($this->params['url']['tracker'])) {
                                        if(htmlspecialchars($this->params['url']['tracker'] == 'buy_now')) {
                                         foreach ($tempCart_data['cart'] as $data) { ?>
                                        <div class="form-group">
                                            <div class="col-sm-3 col-xs-3">
                                                <img class="img-responsive" src="<?php echo DOMAIN_NAME ?><?php echo $data['temp_cart']['image']; ?>" />
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="col-xs-12">Product name: <span><?php echo $data['temp_cart']['product_name']; ?></span></div>
                                                <div class="col-xs-12"><small>Quantity: <span><?php echo $data['temp_cart']['quantity']; ?></span></small></div>
                                            </div>
                                            <div class="col-sm-3 col-xs-3 text-right">
                                                <h6><span></span><?php echo $total_price = number_format($data['temp_cart']['quantity']*$data['temp_cart']['price'],2) ?> <?php echo $data['temp_cart']['currency'] ?></h6>
                                            </div>
                                            <?php $total += $total_price; ?>
                                            <?php $currency = $data['temp_cart']['currency']; ?>
                                        </div>
                                        <div class="form-group"><hr /></div> 
                                        <?php } } } else { 
                                            if($cart_data['cart'] > 0) {
                                        foreach ($cart_data['cart'] as $data) { ?>
                                        <div class="form-group">
                                            <div class="col-sm-3 col-xs-3">
                                                <img class="img-responsive" src="<?php echo DOMAIN_NAME ?><?php echo $data['cart']['image']; ?>" />
                                            </div>
                                            <div class="col-sm-6 col-xs-6">
                                                <div class="col-xs-12">Product name: <span><?php echo $data['cart']['name']; ?></span></div>                                                
                                                <?php foreach ($cart_data['option'] as $option) {
                                                    foreach ($cart_data['option_description'] as $option_desc) {
                                                    $option_id = explode(',',$data['cart']['option_id']); 
                                                    $option_desc_id = explode(',',$data['cart']['option_desc']); 
                                                    for($i = 0; $i < count(explode(',',$data['cart']['option_id'])); $i++) {
                                                        if(($option['option_name']['option_id'] == $option_id[$i]) && ($option_desc['option_description']['option_desc_id'] == $option_desc_id[$i])) {
                                                ?>
                                                <div class="col-xs-12"><small><?php echo $option['option_name']['option_name']; ?>: <span><?php echo $option_desc['option_description']['option_desc_name'] ?></span></small></div>
                                                <?php } } } } ?>
                                                <div class="col-xs-12"><small>Quantity: <span><?php echo $data['cart']['quantity']; ?></span></small></div>
                                            </div>
                                            <div class="col-sm-3 col-xs-3 text-right">
                                                <h6><span></span><?php echo $total_price = number_format($data['cart']['quantity']*$data['cart']['price'],2) ?> <?php echo $data['cart']['currency'] ?></h6>
                                            </div>
                                            <?php $total += $total_price; ?>
                                            <?php $currency = $data['cart']['currency']; ?>
                                        </div>
                                        <div class="form-group"><hr /></div>
                                        <?php } } } ?>
                                        <div class="form-group">
                                            <?php if(isset($coupon)) { 
                                                foreach ($coupon as $coupon_val) {
                                            ?>
                                            <div class="col-xs-12">
                                                <strong>Sub Total</strong>
                                                <div class="pull-right"><span><?php echo number_format($total ,2); ?> <?php echo $currency ?></span></div>
                                            </div>
                                            <div class="col-xs-12">
                                                <strong>Coupon(<?php echo $coupon_val['set_coupon']['coupon_code'] ?>)</strong>
                                                <?php if($coupon_val['set_coupon']['type'] == 'Fixed') { $total_data = $total- $coupon_val['set_coupon']['amount'];} elseif ($coupon_val['set_coupon']['type'] == 'Percentage') { $total_data = $total- (($total*$coupon_val['set_coupon']['amount'])/100); } ?>
                                                <div class="pull-right"><span><?php echo number_format($coupon_val['set_coupon']['amount'] ,2); ?> <?php echo $currency ?></span></div>
                                            </div>
                                            <div class="col-xs-12">
                                                <strong>Order Total</strong>
                                                <div class="pull-right"><span><?php echo number_format($total_data ,2); ?> <?php echo $currency ?></span></div>
                                            </div>
                                            <?php } } else { ?>
                                            <div class="col-xs-12">
                                                <strong>Order Total</strong>
                                                <div class="pull-right"><span><?php echo number_format($total ,2); ?> <?php echo $currency ?></span></div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--REVIEW ORDER END-->
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                                <!-- Login SignUp -->
                                <?php if($user_id == 0) {  ?> 
                                <form method="post">
                                    <input type="hidden" name="form_name" value="signup_form"> 
                                    <div class="panel panel-info">                                                                       
                                        <div class="panel-heading">Login/SignUp </div>
                                        <div class="panel-body <?php if($login_data != '' && (($display_data == 'signup') || ($display_data == 'billing_add') || ($display_data == 'shipping_add'))) { echo "display_none_shipping"; } else { echo "display_active"; } ?>">       
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Enter Email </strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="email" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Set Up Password</strong></div>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control" name="password" required=""/>
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <button type="submit" class="btn btn-primary btn-submit-fix">SignUp</button>
                                                </div>
                                            </div>
                                        </div>                                    
                                    </div>                               
                                </form>
                                <?php } ?>
                                <!-- Login SignUp End -->

                                <!--Billing METHOD-->

                                <form method="post">
                                    <input type="hidden" name="form_name" value="billing_form">
                                    <div class="panel panel-info">                                                                       
                                        <div class="panel-heading">Billing Address</div>
                                        <?php if($billing > 0) {
                                         foreach ($billing as $billing_data) { ?> 
                                        <div class="panel-body <?php if(($user_id > 0 && ($display_data == '')) || ($login_data != '' && ($display_data == 'signup'))) { echo "display_active"; } else { echo "display_none_shipping"; } ?>">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <h4>Billing Address</h4>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">
                                                <div class="col-md-6 col-xs-12">
                                                    <strong>First Name:</strong>
                                                    <input type="text" name="first_name" class="form-control" value="<?php echo $billing_data['buyer_register']['firstname'] ?>" required=""/>
                                                </div>
                                                <div class="span1"></div>
                                                <div class="col-md-6 col-xs-12">
                                                    <strong>Last Name:</strong>
                                                    <input type="text" name="last_name" class="form-control" value="<?php echo $billing_data['buyer_register']['lastname'] ?>" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Email:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="email" class="form-control" name="email" value="<?php echo $billing_data['buyer_register']['email'] ?>" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Mobile Number:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="number" class="form-control" name="mobile" value="<?php echo $billing_data['buyer_register']['phone'] ?>" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Company:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" name="company" value="" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Landmark:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" name="landmark" class="form-control" value="<?php echo $billing_data['buyer_register']['landmark'] ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Address 1:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" name="address1" class="form-control" value="<?php echo $billing_data['buyer_register']['address'] ?>" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Address 2:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" name="address2" class="form-control" value="" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>City:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" name="city" class="form-control" value="<?php echo $billing_data['buyer_register']['city'] ?>" required=""/>
                                                </div>
                                            </div>                                        
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                                <div class="col-md-12">
                                                    <input type="text" name="zip_code" class="form-control" value="<?php echo $billing_data['buyer_register']['pin_code'] ?>" required=""/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Country:</strong></div>
                                                <div class="col-md-12"><input type="text" name="country" class="form-control" value="<?php echo $billing_data['buyer_register']['country'] ?>" required=""/></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Region / State:</strong></div>
                                                <div class="col-md-12"><input type="text" name="state" class="form-control" value="<?php echo $billing_data['buyer_register']['state'] ?>" required=""/></div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <button type="submit" class="btn btn-primary btn-submit-fix">Submit</button>
                                                </div>
                                            </div>
                                        </div>         
                                        <?php } } ?>
                                    </div>                                   
                                </form>
                                <!-- shipping -->

                                <form method="post">
                                    <input type="hidden" name="form_name" value="shipping_form">
                                    <div class="panel panel-info">                                       
                                        <div class="panel-heading show_shipiing_details">Shipping Address</div>
                                        <div class="panel-body <?php if($login_data != '' && ($display_data == 'billing_add')) { echo "display_active"; } else  { echo "display_none_shipping"; } ?>">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <h4>Shipping Address</h4>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Same as Billing Address</strong>&nbsp;&nbsp;&nbsp;
                                                    <input type="checkbox" name="billing_address" value="1" id="billing_same_address"/>
                                                </div>    
                                            </div>
                                            <div id="same_bill">
                                                <div class="form-group">
                                                    <div class="col-md-6 col-xs-12">
                                                        <strong>First Name:</strong>
                                                        <input type="text" name="first_name" class="form-control" value="" />
                                                    </div>
                                                    <div class="span1"></div>
                                                    <div class="col-md-6 col-xs-12">
                                                        <strong>Last Name:</strong>
                                                        <input type="text" name="last_name" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Email:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="email" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Mobile Number:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="mobile" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Company:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="company" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Landmark:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control" name="landmark" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Address 1:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="address1" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Address 2:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="address2" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>City:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="city" class="form-control" value="" />
                                                    </div>
                                                </div>                                        
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Zip / Postal Code:</strong></div>
                                                    <div class="col-md-12">
                                                        <input type="text" name="zip_code" class="form-control" value="" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Country:</strong></div>
                                                    <div class="col-md-12"><input type="text" name="country" class="form-control" value="" /></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12"><strong>Region / State:</strong></div>
                                                    <div class="col-md-12"><input type="text" name="state" class="form-control" value="" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <button type="submit" class="btn btn-primary btn-submit-fix">Submit</button>
                                                </div>
                                            </div>                                                
                                        </div>
                                    </div>
                                </form>    

                                <!-- shipping end -->
                                <div class="clearfix"></div>

                                <!--SHIPPING METHOD END-->
                                <!--CREDIT CART PAYMENT-->
                                <div class="panel panel-info">
                                    <div class="panel-heading heading_panel_card_type"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                                    <div class="panel-body  <?php if($login_data != '' && ($display_data == 'shipping_add')) { echo "display_active"; } else  { echo "display_none_shipping"; } ?>">                                                                                  
                                        <div class="form-group">
                                            <form method="post">
                                                <div class="col-md-12"><strong>Enter Your Coupon Code here</strong></div>
                                                <div class="col-md-12">
                                                    <div class="coupon_code_use">
                                                        <input type="hidden" name="form_name" value="coupon_value">
                                                        <input type="text" class="form-control" name="coupon_code"/>
                                                        <button type="submit">Apply</button> 
                                                        <div class='clearfix'></div>
                                                    </div><div class="clearfix"></div>                                                   
                                                </div>
                                                <div class="col-md-12">
                                                    <?php if(isset($coupon)) { ?>
                                                    <p class="coupon_use_display clearfix">Coupon Applied Successfully</p>
                                                    <?php } ?>
                                                    <?php if(isset($msg)) { ?>
                                                    <p class="coupon_use_display"><?php echo $msg; ?></p>
                                                    <?php } ?>
                                                </div>
                                            </form>
                                            <div class='clearfix'></div>
                                        </div>
                                        <?php 
                                        $paypal_link = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; 
                                        $paypal_username = 'vsaini@acumaxtechnologies.com'; //Business Email
                                        ?>
                                        <div class="form-group">
                                            <?php foreach ($shipped_data as $shipping) { ?>
                                            <form action="<?php echo $paypal_link ?>" method="post">
                                                <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">                                         
                                                <input type="hidden" name="cmd" value="_xclick">
                                                <input type="hidden" name="item_name" value="Labezo">
                                                <!-- <input type="hidden" name="item_number" value="<?php echo $shipping['shipping_address']['']; ?>"> 
                                                <input type="hidden" name="weight" value="<?php echo $order['weight']; ?>">  -->
                                                <?php if(isset($coupon)) {  ?>
                                                <input type="hidden" name="amount" value="<?php echo $total_data; ?>"> 
                                                <?php } else { ?>
                                                <input type="hidden" name="amount" value="<?php echo $total; ?>"> 
                                                <?php } ?>

                                                <input type="hidden" name="first_name" value="<?php echo $shipping['shipping_address']['firstname'];?>">
                                                <input type="hidden" name="last_name" value="<?php echo $shipping['shipping_address']['lastname'];?>">
                                                <input type="hidden" name="address1" value="<?php echo $shipping['shipping_address']['address1'];?>">
                                                <input type="hidden" name="address2" value="<?php echo $shipping['shipping_address']['address2'];?>">
                                                <input type="hidden" name="city" value="<?php echo $shipping['shipping_address']['city']; ?>">
                                                <input type="hidden" name="state" value="<?php echo $shipping['shipping_address']['state']; ?>">
                                                <input type="hidden" name="zip" value="<?php echo $shipping['shipping_address']['postal_code']; ?>">
                                                <input type="hidden" name="country" value="<?php echo $shipping['shipping_address']['country']; ?>">
                                                <input type="hidden" name="currency_code" value="<?php echo $currency; ?>">                                         
                                                <input type='hidden' name='cancel_return' value='<?php echo DOMAIN_NAME ?>labezo_buyer/order_cancel.html'>
                                                <input type='hidden' name='return' value="<?php echo DOMAIN_NAME ?>labezo_buyer/order_confirm.html">
                                                <input type="hidden" name="notify_url" value="<?php echo DOMAIN_NAME?>buyers/ipn">                                               
                                                <input type="hidden" name="custom" value="<?php echo $order_val; ?>">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                                </div>
                                            </form>
                                            <?php } ?>
                                        </div>    
                                    </div>
                                    <!--CREDIT CART PAYMENT END-->
                                </div>
                            </div>
                            <div class="row cart-footer">

                            </div>
                        </div>        
                    </div>
                </div>
                <!-- close area of checkout --
                <div class="row">
    
                    <div class="col-md-6">
    
                        <div class="panel panel-default">
                            <h4  class="panel-heading" data-toggle="collapse" data-target="#Billing"> Billing Details</h4>
    
                            <div class="panel-body collapse in" id="Billing" >
                                <div class="row">
                                    <div class="col-md-6">
    
                                        <fieldset id="account">
    
                                            <div class="form-group" style="display: none;">
                                                <label class="control-label">Customer Group</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="customer_group_id" value="1" checked="checked">
                                                        Default</label>
                                                </div>
                                            </div>
                                            <div class="form-group required ">
                                                <label class="control-label" for="input-payment-firstname">First Name</label>
                                                <input type="text" name="firstname" value="" placeholder="First Name" id="input-payment-firstname" class="form-control">
                                            </div>
                                            <div class="form-group required ">
                                                <label class="control-label" for="input-payment-lastname">Last Name</label>
                                                <input type="text" name="lastname" value="" placeholder="Last Name" id="input-payment-lastname" class="form-control">
                                            </div>
                                            <div class="form-group required ">
                                                <label class="control-label" for="input-payment-email">E-Mail</label>
                                                <input type="text" name="email" value="" placeholder="E-Mail" id="input-payment-email" class="form-control">
                                            </div>
                                            <div class="form-group required ">
                                                <label class="control-label" for="input-payment-telephone">Telephone</label>
                                                <input type="text" name="telephone" value="" placeholder="Telephone" id="input-payment-telephone" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="input-payment-fax">Alternate Mobile Number</label>
                                                <input type="text" name="fax" value="" placeholder="Alternate Mobile Number" id="input-payment-fax" class="form-control">
                                            </div>
                                        </fieldset>
    
    
                                    </div>
                                    <div class="col-md-6">
    
    
                                        <fieldset id="address">
    
                                            <div class="form-group">
                                                <label class="control-label" for="input-payment-company">Company</label>
                                                <input type="text" name="company" value="" placeholder="Company" id="input-payment-company" class="form-control">
                                            </div>
                                            <div class="form-group required ">
                                                <label class="control-label" for="input-payment-address-1">Address 1</label>
                                                <input type="text" name="address_1" value="" placeholder="Address 1" id="input-payment-address-1" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label" for="input-payment-address-2">Address 2</label>
                                                <input type="text" name="address_2" value="" placeholder="Address 2" id="input-payment-address-2" class="form-control">
                                            </div>
                                            <div class="form-group required ">
                                                <label class="control-label" for="input-payment-city">City</label>
                                                <input type="text" name="city" value="" placeholder="City" id="input-payment-city" class="form-control">
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label" for="input-payment-postcode">Post Code</label>
                                                <input type="text" name="postcode" value="" placeholder="Post Code" id="input-payment-postcode" class="form-control">
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label" for="input-payment-country">Country</label>
                                                <select name="country_id" id="input-payment-country" class="form-control">
                                                    <option value=""> --- Please Select --- </option>
                                                    <option value="244">Aaland Islands</option>
                                                    <option value="1">Afghanistan</option>
                                                    <option value="2">Albania</option>
                                                    <option value="3">Algeria</option>
                                                    <option value="4">American Samoa</option>
                                                    <option value="5">Andorra</option>
                                                    <option value="6">Angola</option>
                                                    <option value="7">Anguilla</option>
                                                    <option value="8">Antarctica</option>
                                                    <option value="9">Antigua and Barbuda</option>
                                                    <option value="10">Argentina</option>
                                                    <option value="11">Armenia</option>
                                                    <option value="12">Aruba</option>
                                                    <option value="252">Ascension Island (British)</option>
                                                    <option value="13">Australia</option>
                                                    <option value="14">Austria</option>
                                                    <option value="15">Azerbaijan</option>
                                                    <option value="16">Bahamas</option>
                                                    <option value="17">Bahrain</option>
                                                    <option value="18">Bangladesh</option>
                                                    <option value="19">Barbados</option>
                                                    <option value="20">Belarus</option>
                                                    <option value="21">Belgium</option>
                                                    <option value="22">Belize</option>
                                                    <option value="23">Benin</option>
                                                    <option value="24">Bermuda</option>
                                                    <option value="25">Bhutan</option>
                                                    <option value="26">Bolivia</option>
                                                    <option value="245">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="27">Bosnia and Herzegovina</option>
                                                    <option value="28">Botswana</option>
                                                    <option value="29">Bouvet Island</option>
                                                    <option value="30">Brazil</option>
                                                    <option value="31">British Indian Ocean Territory</option>
                                                    <option value="32">Brunei Darussalam</option>
                                                    <option value="33">Bulgaria</option>
                                                    <option value="34">Burkina Faso</option>
                                                    <option value="35">Burundi</option>
                                                    <option value="36">Cambodia</option>
                                                    <option value="37">Cameroon</option>
                                                    <option value="38">Canada</option>
                                                    <option value="251">Canary Islands</option>
                                                    <option value="39">Cape Verde</option>
                                                    <option value="40">Cayman Islands</option>
                                                    <option value="41">Central African Republic</option>
                                                    <option value="42">Chad</option>
                                                    <option value="43">Chile</option>
                                                    <option value="44">China</option>
                                                    <option value="45">Christmas Island</option>
                                                    <option value="46">Cocos (Keeling) Islands</option>
                                                    <option value="47">Colombia</option>
                                                    <option value="48">Comoros</option>
                                                    <option value="49">Congo</option>
                                                    <option value="50">Cook Islands</option>
                                                    <option value="51">Costa Rica</option>
                                                    <option value="52">Cote D'Ivoire</option>
                                                    <option value="53">Croatia</option>
                                                    <option value="54">Cuba</option>
                                                    <option value="246">Curacao</option>
                                                    <option value="55">Cyprus</option>
                                                    <option value="56">Czech Republic</option>
                                                    <option value="237">Democratic Republic of Congo</option>
                                                    <option value="57">Denmark</option>
                                                    <option value="58">Djibouti</option>
                                                    <option value="59">Dominica</option>
                                                    <option value="60">Dominican Republic</option>
                                                    <option value="61">East Timor</option>
                                                    <option value="62">Ecuador</option>
                                                    <option value="63">Egypt</option>
                                                    <option value="64">El Salvador</option>
                                                    <option value="65">Equatorial Guinea</option>
                                                    <option value="66">Eritrea</option>
                                                    <option value="67">Estonia</option>
                                                    <option value="68">Ethiopia</option>
                                                    <option value="69">Falkland Islands (Malvinas)</option>
                                                    <option value="70">Faroe Islands</option>
                                                    <option value="71">Fiji</option>
                                                    <option value="72">Finland</option>
                                                    <option value="74">France, Metropolitan</option>
                                                    <option value="75">French Guiana</option>
                                                    <option value="76">French Polynesia</option>
                                                    <option value="77">French Southern Territories</option>
                                                    <option value="126">FYROM</option>
                                                    <option value="78">Gabon</option>
                                                    <option value="79">Gambia</option>
                                                    <option value="80">Georgia</option>
                                                    <option value="81">Germany</option>
                                                    <option value="82">Ghana</option>
                                                    <option value="83">Gibraltar</option>
                                                    <option value="84">Greece</option>
                                                    <option value="85">Greenland</option>
                                                    <option value="86">Grenada</option>
                                                    <option value="87">Guadeloupe</option>
                                                    <option value="88">Guam</option>
                                                    <option value="89">Guatemala</option>
                                                    <option value="256">Guernsey</option>
                                                    <option value="90">Guinea</option>
                                                    <option value="91">Guinea-Bissau</option>
                                                    <option value="92">Guyana</option>
                                                    <option value="93">Haiti</option>
                                                    <option value="94">Heard and Mc Donald Islands</option>
                                                    <option value="95">Honduras</option>
                                                    <option value="96">Hong Kong</option>
                                                    <option value="97">Hungary</option>
                                                    <option value="98">Iceland</option>
                                                    <option value="99">India</option>
                                                    <option value="100">Indonesia</option>
                                                    <option value="101">Iran (Islamic Republic of)</option>
                                                    <option value="102">Iraq</option>
                                                    <option value="103">Ireland</option>
                                                    <option value="254">Isle of Man</option>
                                                    <option value="104">Israel</option>
                                                    <option value="105">Italy</option>
                                                    <option value="106">Jamaica</option>
                                                    <option value="107">Japan</option>
                                                    <option value="257">Jersey</option>
                                                    <option value="108">Jordan</option>
                                                    <option value="109">Kazakhstan</option>
                                                    <option value="110">Kenya</option>
                                                    <option value="111">Kiribati</option>
                                                    <option value="253">Kosovo, Republic of</option>
                                                    <option value="114">Kuwait</option>
                                                    <option value="115">Kyrgyzstan</option>
                                                    <option value="116">Lao People's Democratic Republic</option>
                                                    <option value="117">Latvia</option>
                                                    <option value="118">Lebanon</option>
                                                    <option value="119">Lesotho</option>
                                                    <option value="120">Liberia</option>
                                                    <option value="121">Libyan Arab Jamahiriya</option>
                                                    <option value="122">Liechtenstein</option>
                                                    <option value="123">Lithuania</option>
                                                    <option value="124">Luxembourg</option>
                                                    <option value="125">Macau</option>
                                                    <option value="127">Madagascar</option>
                                                    <option value="128">Malawi</option>
                                                    <option value="129">Malaysia</option>
                                                    <option value="130">Maldives</option>
                                                    <option value="131">Mali</option>
                                                    <option value="132">Malta</option>
                                                    <option value="133">Marshall Islands</option>
                                                    <option value="134">Martinique</option>
                                                    <option value="135">Mauritania</option>
                                                    <option value="136">Mauritius</option>
                                                    <option value="137">Mayotte</option>
                                                    <option value="138">Mexico</option>
                                                    <option value="139">Micronesia, Federated States of</option>
                                                    <option value="140">Moldova, Republic of</option>
                                                    <option value="141">Monaco</option>
                                                    <option value="142">Mongolia</option>
                                                    <option value="242">Montenegro</option>
                                                    <option value="143">Montserrat</option>
                                                    <option value="144">Morocco</option>
                                                    <option value="145">Mozambique</option>
                                                    <option value="146">Myanmar</option>
                                                    <option value="147">Namibia</option>
                                                    <option value="148">Nauru</option>
                                                    <option value="149">Nepal</option>
                                                    <option value="150">Netherlands</option>
                                                    <option value="151">Netherlands Antilles</option>
                                                    <option value="152">New Caledonia</option>
                                                    <option value="153">New Zealand</option>
                                                    <option value="154">Nicaragua</option>
                                                    <option value="155">Niger</option>
                                                    <option value="156">Nigeria</option>
                                                    <option value="157">Niue</option>
                                                    <option value="158">Norfolk Island</option>
                                                    <option value="112">North Korea</option>
                                                    <option value="159">Northern Mariana Islands</option>
                                                    <option value="160">Norway</option>
                                                    <option value="161">Oman</option>
                                                    <option value="162">Pakistan</option>
                                                    <option value="163">Palau</option>
                                                    <option value="247">Palestinian Territory, Occupied</option>
                                                    <option value="164">Panama</option>
                                                    <option value="165">Papua New Guinea</option>
                                                    <option value="166">Paraguay</option>
                                                    <option value="167">Peru</option>
                                                    <option value="168">Philippines</option>
                                                    <option value="169">Pitcairn</option>
                                                    <option value="170">Poland</option>
                                                    <option value="171">Portugal</option>
                                                    <option value="172">Puerto Rico</option>
                                                    <option value="173">Qatar</option>
                                                    <option value="174">Reunion</option>
                                                    <option value="175">Romania</option>
                                                    <option value="176">Russian Federation</option>
                                                    <option value="177">Rwanda</option>
                                                    <option value="178">Saint Kitts and Nevis</option>
                                                    <option value="179">Saint Lucia</option>
                                                    <option value="180">Saint Vincent and the Grenadines</option>
                                                    <option value="181">Samoa</option>
                                                    <option value="182">San Marino</option>
                                                    <option value="183">Sao Tome and Principe</option>
                                                    <option value="184">Saudi Arabia</option>
                                                    <option value="185">Senegal</option>
                                                    <option value="243">Serbia</option>
                                                    <option value="186">Seychelles</option>
                                                    <option value="187">Sierra Leone</option>
                                                    <option value="188">Singapore</option>
                                                    <option value="189">Slovak Republic</option>
                                                    <option value="190">Slovenia</option>
                                                    <option value="191">Solomon Islands</option>
                                                    <option value="192">Somalia</option>
                                                    <option value="193">South Africa</option>
                                                    <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                                    <option value="113">South Korea</option>
                                                    <option value="248">South Sudan</option>
                                                    <option value="195">Spain</option>
                                                    <option value="196">Sri Lanka</option>
                                                    <option value="249">St. Barthelemy</option>
                                                    <option value="197">St. Helena</option>
                                                    <option value="250">St. Martin (French part)</option>
                                                    <option value="198">St. Pierre and Miquelon</option>
                                                    <option value="199">Sudan</option>
                                                    <option value="200">Suriname</option>
                                                    <option value="201">Svalbard and Jan Mayen Islands</option>
                                                    <option value="202">Swaziland</option>
                                                    <option value="203">Sweden</option>
                                                    <option value="204">Switzerland</option>
                                                    <option value="205">Syrian Arab Republic</option>
                                                    <option value="206">Taiwan</option>
                                                    <option value="207">Tajikistan</option>
                                                    <option value="208">Tanzania, United Republic of</option>
                                                    <option value="209">Thailand</option>
                                                    <option value="210">Togo</option>
                                                    <option value="211">Tokelau</option>
                                                    <option value="212">Tonga</option>
                                                    <option value="213">Trinidad and Tobago</option>
                                                    <option value="255">Tristan da Cunha</option>
                                                    <option value="214">Tunisia</option>
                                                    <option value="215">Turkey</option>
                                                    <option value="216">Turkmenistan</option>
                                                    <option value="217">Turks and Caicos Islands</option>
                                                    <option value="218">Tuvalu</option>
                                                    <option value="219">Uganda</option>
                                                    <option value="220">Ukraine</option>
                                                    <option value="221">United Arab Emirates</option>
                                                    <option value="222">United Kingdom</option>
                                                    <option value="223" selected="selected">United States</option>
                                                    <option value="224">United States Minor Outlying Islands</option>
                                                    <option value="225">Uruguay</option>
                                                    <option value="226">Uzbekistan</option>
                                                    <option value="227">Vanuatu</option>
                                                    <option value="228">Vatican City State (Holy See)</option>
                                                    <option value="229">Venezuela</option>
                                                    <option value="230">Viet Nam</option>
                                                    <option value="231">Virgin Islands (British)</option>
                                                    <option value="232">Virgin Islands (U.S.)</option>
                                                    <option value="233">Wallis and Futuna Islands</option>
                                                    <option value="234">Western Sahara</option>
                                                    <option value="235">Yemen</option>
                                                    <option value="238">Zambia</option>
                                                    <option value="239">Zimbabwe</option>
                                                </select> 
                                            </div>
                                            <div class="form-group required">
                                                <label class="control-label" for="input-payment-zone">Region / State</label>
                                                <select name="zone_id" id="input-payment-zone" class="form-control"><option value=""> --- Please Select --- </option><option value="3613">Alabama</option><option value="3614">Alaska</option><option value="3615">American Samoa</option><option value="3616">Arizona</option><option value="3617">Arkansas</option><option value="3618">Armed Forces Africa</option><option value="3619">Armed Forces Americas</option><option value="3620">Armed Forces Canada</option><option value="3621">Armed Forces Europe</option><option value="3622">Armed Forces Middle East</option><option value="3623">Armed Forces Pacific</option><option value="3624">California</option><option value="3625">Colorado</option><option value="3626">Connecticut</option><option value="3627">Delaware</option><option value="3628">District of Columbia</option><option value="3629">Federated States Of Micronesia</option><option value="3630">Florida</option><option value="3631">Georgia</option><option value="3632">Guam</option><option value="3633">Hawaii</option><option value="3634">Idaho</option><option value="3635">Illinois</option><option value="3636">Indiana</option><option value="3637">Iowa</option><option value="3638">Kansas</option><option value="3639">Kentucky</option><option value="3640">Louisiana</option><option value="3641">Maine</option><option value="3642">Marshall Islands</option><option value="3643">Maryland</option><option value="3644">Massachusetts</option><option value="3645">Michigan</option><option value="3646">Minnesota</option><option value="3647">Mississippi</option><option value="3648">Missouri</option><option value="3649">Montana</option><option value="3650">Nebraska</option><option value="3651">Nevada</option><option value="3652">New Hampshire</option><option value="3653">New Jersey</option><option value="3654">New Mexico</option><option value="3655">New York</option><option value="3656">North Carolina</option><option value="3657">North Dakota</option><option value="3658">Northern Mariana Islands</option><option value="3659">Ohio</option><option value="3660">Oklahoma</option><option value="3661">Oregon</option><option value="3662">Palau</option><option value="3663">Pennsylvania</option><option value="3664">Puerto Rico</option><option value="3665">Rhode Island</option><option value="3666">South Carolina</option><option value="3667">South Dakota</option><option value="3668">Tennessee</option><option value="3669">Texas</option><option value="3670">Utah</option><option value="3671">Vermont</option><option value="3672">Virgin Islands</option><option value="3673">Virginia</option><option value="3674">Washington</option><option value="3675">West Virginia</option><option value="3676">Wisconsin</option><option value="3677">Wyoming</option></select>
                                            </div>
                                        </fieldset>
                                    </div>
    
                                </div>
    
    
                            </div>
    
                        </div>
                    </div>
                    <div class="col-md-6 ">
                        <div class="panel panel-default">
                            <h4  class="panel-heading" data-toggle="collapse" data-target="#Shopping">Shopping Details</h4>
                            <div class="panel-body collapse in" id="Shopping" >
                                <form class="form-horizontal shadow">
    
    
                                    <div class="form-group required">
                                        <label class=" control-label" for="input-shipping-firstname">First Name</label>
                                        <div class="">
                                            <input type="text" name="firstname"  placeholder="First Name" id="input-shipping-firstname" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-shipping-lastname">Last Name</label>
    
                                        <input type="text" name="lastname" placeholder="Last Name" id="input-shipping-lastname" class="form-control">
    
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="input-shipping-company">Company</label>
    
                                        <input type="text" name="company"  placeholder="Company" id="input-shipping-company" class="form-control">
    
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-shipping-address-1">Address 1</label>
    
                                        <input type="text" name="address_1" placeholder="Address 1" id="input-shipping-address-1" class="form-control">
    
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="input-shipping-address-2">Address 2</label>
    
                                        <input type="text" name="address_2"  placeholder="Address 2" id="input-shipping-address-2" class="form-control">
    
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-shipping-city">City</label>
    
                                        <input type="text" name="city"  placeholder="City" id="input-shipping-city" class="form-control">
    
                                    </div>
                                    <div class="form-group">
                                        <label class=" control-label" for="input-shipping-postcode">Post Code</label>
    
                                        <input type="text" name="postcode"  placeholder="Post Code" id="input-shipping-postcode" class="form-control">
    
                                    </div>
                                    <div class="form-group required">
                                        <label class=" control-label" for="input-shipping-country">Country</label>
    
                                        <select name="country_id" id="input-shipping-country" class="form-control">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="244">Aaland Islands</option>
                                            <option value="1">Afghanistan</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                            <option value="7">Anguilla</option>
                                            <option value="8">Antarctica</option>
                                            <option value="9">Antigua and Barbuda</option>
                                            <option value="10">Argentina</option>
                                            <option value="11">Armenia</option>
                                            <option value="12">Aruba</option>
                                            <option value="252">Ascension Island (British)</option>
                                            <option value="13">Australia</option>
                                            <option value="14">Austria</option>
                                            <option value="15">Azerbaijan</option>
                                            <option value="16">Bahamas</option>
                                            <option value="17">Bahrain</option>
                                            <option value="18">Bangladesh</option>
                                            <option value="19">Barbados</option>
                                            <option value="20">Belarus</option>
                                            <option value="21">Belgium</option>
                                            <option value="22">Belize</option>
                                            <option value="23">Benin</option>
                                            <option value="24">Bermuda</option>
                                            <option value="25">Bhutan</option>
                                            <option value="26">Bolivia</option>
                                            <option value="245">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="27">Bosnia and Herzegovina</option>
                                            <option value="28">Botswana</option>
                                            <option value="29">Bouvet Island</option>
                                            <option value="30">Brazil</option>
                                            <option value="31">British Indian Ocean Territory</option>
                                            <option value="32">Brunei Darussalam</option>
                                            <option value="33">Bulgaria</option>
                                            <option value="34">Burkina Faso</option>
                                            <option value="35">Burundi</option>
                                            <option value="36">Cambodia</option>
                                            <option value="37">Cameroon</option>
                                            <option value="38">Canada</option>
                                            <option value="251">Canary Islands</option>
                                            <option value="39">Cape Verde</option>
                                            <option value="40">Cayman Islands</option>
                                            <option value="41">Central African Republic</option>
                                            <option value="42">Chad</option>
                                            <option value="43">Chile</option>
                                            <option value="44">China</option>
                                            <option value="45">Christmas Island</option>
                                            <option value="46">Cocos (Keeling) Islands</option>
                                            <option value="47">Colombia</option>
                                            <option value="48">Comoros</option>
                                            <option value="49">Congo</option>
                                            <option value="50">Cook Islands</option>
                                            <option value="51">Costa Rica</option>
                                            <option value="52">Cote D'Ivoire</option>
                                            <option value="53">Croatia</option>
                                            <option value="54">Cuba</option>
                                            <option value="246">Curacao</option>
                                            <option value="55">Cyprus</option>
                                            <option value="56">Czech Republic</option>
                                            <option value="237">Democratic Republic of Congo</option>
                                            <option value="57">Denmark</option>
                                            <option value="58">Djibouti</option>
                                            <option value="59">Dominica</option>
                                            <option value="60">Dominican Republic</option>
                                            <option value="61">East Timor</option>
                                            <option value="62">Ecuador</option>
                                            <option value="63">Egypt</option>
                                            <option value="64">El Salvador</option>
                                            <option value="65">Equatorial Guinea</option>
                                            <option value="66">Eritrea</option>
                                            <option value="67">Estonia</option>
                                            <option value="68">Ethiopia</option>
                                            <option value="69">Falkland Islands (Malvinas)</option>
                                            <option value="70">Faroe Islands</option>
                                            <option value="71">Fiji</option>
                                            <option value="72">Finland</option>
                                            <option value="74">France, Metropolitan</option>
                                            <option value="75">French Guiana</option>
                                            <option value="76">French Polynesia</option>
                                            <option value="77">French Southern Territories</option>
                                            <option value="126">FYROM</option>
                                            <option value="78">Gabon</option>
                                            <option value="79">Gambia</option>
                                            <option value="80">Georgia</option>
                                            <option value="81">Germany</option>
                                            <option value="82">Ghana</option>
                                            <option value="83">Gibraltar</option>
                                            <option value="84">Greece</option>
                                            <option value="85">Greenland</option>
                                            <option value="86">Grenada</option>
                                            <option value="87">Guadeloupe</option>
                                            <option value="88">Guam</option>
                                            <option value="89">Guatemala</option>
                                            <option value="256">Guernsey</option>
                                            <option value="90">Guinea</option>
                                            <option value="91">Guinea-Bissau</option>
                                            <option value="92">Guyana</option>
                                            <option value="93">Haiti</option>
                                            <option value="94">Heard and Mc Donald Islands</option>
                                            <option value="95">Honduras</option>
                                            <option value="96">Hong Kong</option>
                                            <option value="97">Hungary</option>
                                            <option value="98">Iceland</option>
                                            <option value="99">India</option>
                                            <option value="100">Indonesia</option>
                                            <option value="101">Iran (Islamic Republic of)</option>
                                            <option value="102">Iraq</option>
                                            <option value="103">Ireland</option>
                                            <option value="254">Isle of Man</option>
                                            <option value="104">Israel</option>
                                            <option value="105">Italy</option>
                                            <option value="106">Jamaica</option>
                                            <option value="107">Japan</option>
                                            <option value="257">Jersey</option>
                                            <option value="108">Jordan</option>
                                            <option value="109">Kazakhstan</option>
                                            <option value="110">Kenya</option>
                                            <option value="111">Kiribati</option>
                                            <option value="253">Kosovo, Republic of</option>
                                            <option value="114">Kuwait</option>
                                            <option value="115">Kyrgyzstan</option>
                                            <option value="116">Lao People's Democratic Republic</option>
                                            <option value="117">Latvia</option>
                                            <option value="118">Lebanon</option>
                                            <option value="119">Lesotho</option>
                                            <option value="120">Liberia</option>
                                            <option value="121">Libyan Arab Jamahiriya</option>
                                            <option value="122">Liechtenstein</option>
                                            <option value="123">Lithuania</option>
                                            <option value="124">Luxembourg</option>
                                            <option value="125">Macau</option>
                                            <option value="127">Madagascar</option>
                                            <option value="128">Malawi</option>
                                            <option value="129">Malaysia</option>
                                            <option value="130">Maldives</option>
                                            <option value="131">Mali</option>
                                            <option value="132">Malta</option>
                                            <option value="133">Marshall Islands</option>
                                            <option value="134">Martinique</option>
                                            <option value="135">Mauritania</option>
                                            <option value="136">Mauritius</option>
                                            <option value="137">Mayotte</option>
                                            <option value="138">Mexico</option>
                                            <option value="139">Micronesia, Federated States of</option>
                                            <option value="140">Moldova, Republic of</option>
                                            <option value="141">Monaco</option>
                                            <option value="142">Mongolia</option>
                                            <option value="242">Montenegro</option>
                                            <option value="143">Montserrat</option>
                                            <option value="144">Morocco</option>
                                            <option value="145">Mozambique</option>
                                            <option value="146">Myanmar</option>
                                            <option value="147">Namibia</option>
                                            <option value="148">Nauru</option>
                                            <option value="149">Nepal</option>
                                            <option value="150">Netherlands</option>
                                            <option value="151">Netherlands Antilles</option>
                                            <option value="152">New Caledonia</option>
                                            <option value="153">New Zealand</option>
                                            <option value="154">Nicaragua</option>
                                            <option value="155">Niger</option>
                                            <option value="156">Nigeria</option>
                                            <option value="157">Niue</option>
                                            <option value="158">Norfolk Island</option>
                                            <option value="112">North Korea</option>
                                            <option value="159">Northern Mariana Islands</option>
                                            <option value="160">Norway</option>
                                            <option value="161">Oman</option>
                                            <option value="162">Pakistan</option>
                                            <option value="163">Palau</option>
                                            <option value="247">Palestinian Territory, Occupied</option>
                                            <option value="164">Panama</option>
                                            <option value="165">Papua New Guinea</option>
                                            <option value="166">Paraguay</option>
                                            <option value="167">Peru</option>
                                            <option value="168">Philippines</option>
                                            <option value="169">Pitcairn</option>
                                            <option value="170">Poland</option>
                                            <option value="171">Portugal</option>
                                            <option value="172">Puerto Rico</option>
                                            <option value="173">Qatar</option>
                                            <option value="174">Reunion</option>
                                            <option value="175">Romania</option>
                                            <option value="176">Russian Federation</option>
                                            <option value="177">Rwanda</option>
                                            <option value="178">Saint Kitts and Nevis</option>
                                            <option value="179">Saint Lucia</option>
                                            <option value="180">Saint Vincent and the Grenadines</option>
                                            <option value="181">Samoa</option>
                                            <option value="182">San Marino</option>
                                            <option value="183">Sao Tome and Principe</option>
                                            <option value="184">Saudi Arabia</option>
                                            <option value="185">Senegal</option>
                                            <option value="243">Serbia</option>
                                            <option value="186">Seychelles</option>
                                            <option value="187">Sierra Leone</option>
                                            <option value="188">Singapore</option>
                                            <option value="189">Slovak Republic</option>
                                            <option value="190">Slovenia</option>
                                            <option value="191">Solomon Islands</option>
                                            <option value="192">Somalia</option>
                                            <option value="193">South Africa</option>
                                            <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                            <option value="113">South Korea</option>
                                            <option value="248">South Sudan</option>
                                            <option value="195">Spain</option>
                                            <option value="196">Sri Lanka</option>
                                            <option value="249">St. Barthelemy</option>
                                            <option value="197">St. Helena</option>
                                            <option value="250">St. Martin (French part)</option>
                                            <option value="198">St. Pierre and Miquelon</option>
                                            <option value="199">Sudan</option>
                                            <option value="200">Suriname</option>
                                            <option value="201">Svalbard and Jan Mayen Islands</option>
                                            <option value="202">Swaziland</option>
                                            <option value="203">Sweden</option>
                                            <option value="204">Switzerland</option>
                                            <option value="205">Syrian Arab Republic</option>
                                            <option value="206">Taiwan</option>
                                            <option value="207">Tajikistan</option>
                                            <option value="208">Tanzania, United Republic of</option>
                                            <option value="209">Thailand</option>
                                            <option value="210">Togo</option>
                                            <option value="211">Tokelau</option>
                                            <option value="212">Tonga</option>
                                            <option value="213">Trinidad and Tobago</option>
                                            <option value="255">Tristan da Cunha</option>
                                            <option value="214">Tunisia</option>
                                            <option value="215">Turkey</option>
                                            <option value="216">Turkmenistan</option>
                                            <option value="217">Turks and Caicos Islands</option>
                                            <option value="218">Tuvalu</option>
                                            <option value="219">Uganda</option>
                                            <option value="220">Ukraine</option>
                                            <option value="221">United Arab Emirates</option>
                                            <option value="222">United Kingdom</option>
                                            <option value="223" selected="selected">United States</option>
                                            <option value="224">United States Minor Outlying Islands</option>
                                            <option value="225">Uruguay</option>
                                            <option value="226">Uzbekistan</option>
                                            <option value="227">Vanuatu</option>
                                            <option value="228">Vatican City State (Holy See)</option>
                                            <option value="229">Venezuela</option>
                                            <option value="230">Viet Nam</option>
                                            <option value="231">Virgin Islands (British)</option>
                                            <option value="232">Virgin Islands (U.S.)</option>
                                            <option value="233">Wallis and Futuna Islands</option>
                                            <option value="234">Western Sahara</option>
                                            <option value="235">Yemen</option>
                                            <option value="238">Zambia</option>
                                            <option value="239">Zimbabwe</option>
                                        </select> 
    
                                    </div>
                                    <div class="form-group required">
                                        <label class="control-label" for="input-shipping-zone">Region / State</label>
    
                                        <select name="zone_id" id="input-shipping-zone" class="form-control"><option value=""> --- Please Select --- </option><option value="3613">Alabama</option><option value="3614">Alaska</option><option value="3615">American Samoa</option><option value="3616">Arizona</option><option value="3617">Arkansas</option><option value="3618">Armed Forces Africa</option><option value="3619">Armed Forces Americas</option><option value="3620">Armed Forces Canada</option><option value="3621">Armed Forces Europe</option><option value="3622">Armed Forces Middle East</option><option value="3623">Armed Forces Pacific</option><option value="3624">California</option><option value="3625">Colorado</option><option value="3626">Connecticut</option><option value="3627">Delaware</option><option value="3628">District of Columbia</option><option value="3629">Federated States Of Micronesia</option><option value="3630">Florida</option><option value="3631" selected="selected">Georgia</option><option value="3632">Guam</option><option value="3633">Hawaii</option><option value="3634">Idaho</option><option value="3635">Illinois</option><option value="3636">Indiana</option><option value="3637">Iowa</option><option value="3638">Kansas</option><option value="3639">Kentucky</option><option value="3640">Louisiana</option><option value="3641">Maine</option><option value="3642">Marshall Islands</option><option value="3643">Maryland</option><option value="3644">Massachusetts</option><option value="3645">Michigan</option><option value="3646">Minnesota</option><option value="3647">Mississippi</option><option value="3648">Missouri</option><option value="3649">Montana</option><option value="3650">Nebraska</option><option value="3651">Nevada</option><option value="3652">New Hampshire</option><option value="3653">New Jersey</option><option value="3654">New Mexico</option><option value="3655">New York</option><option value="3656">North Carolina</option><option value="3657">North Dakota</option><option value="3658">Northern Mariana Islands</option><option value="3659">Ohio</option><option value="3660">Oklahoma</option><option value="3661">Oregon</option><option value="3662">Palau</option><option value="3663">Pennsylvania</option><option value="3664">Puerto Rico</option><option value="3665">Rhode Island</option><option value="3666">South Carolina</option><option value="3667">South Dakota</option><option value="3668">Tennessee</option><option value="3669">Texas</option><option value="3670">Utah</option><option value="3671">Vermont</option><option value="3672">Virgin Islands</option><option value="3673">Virginia</option><option value="3674">Washington</option><option>West Virginia</option><option value="3676">Wisconsin</option><option >Wyoming</option></select>
    
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input type="button" value="Continue"  data-loading-text="Loading..." class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>          
                    </div>
    
                </div>
                <!-- close area of checkout end -->
            </div>
            <!---footer--->
        </div>
        <footer>
            <div class="footer-top">
                <div class="footer_menu">
                    <ul>
                        <li><a href="../term-contitions.html">Term And Contitions</a></li>
                        <!-- <li><a href="seller.html">Seller Policy</a></li>
                        <li><a href="buyer.html">Buyer Policy</a></li> -->
                        <li><a href="../Privacy.html">Privacy Policy</a></li>
                        <li><a href="../faq.html">Help &amp; Faq</a></li>
                        <!-- <li><a href="#">Coupon code</a></li> -->
                    </ul>
                </div>

                <div class="footer-logo">
                    <img src="<?php echo DOMAIN_NAME ?>img/small-logo.png" class="img-responsive">
                </div>
                <div class="clearfix"></div>
                <div class="social_icon">
                    <ul>
                        <li><img src="<?php echo DOMAIN_NAME ?>img/fb.png" class="img-responsive"></li>
                        <li><img src="<?php echo DOMAIN_NAME ?>img/twitter-icon.png" class="img-responsive"></li>
                        <li><img src="<?php echo DOMAIN_NAME ?>img/in.png" class="img-responsive"></li>
                        <li><img src="<?php echo DOMAIN_NAME ?>img/google.png" class="img-responsive"></li>

                    </ul>
                </div>
            </div>
        </footer>
        <!---footer--->
        <div class="clearfix"></div>
        <!--copy-->
        <div class="copy_right">
            <p>© 2017 . All Rights Reserved  <a href="http://www.acumaxtechnologies.com/">AcumaxTechnologies</a></p>
        </div>
        <!--copy-->
        <script>
            $(document).ready(function () {
                /*$('.show_shipiing_details').click(function () {
                 $('.display_none_shipping').toggle('slow');
                 });
                 $('.heading_panel_card_type').click(function () {
                 $('.display_panel_payment').toggle('slow');
                 });*/
                $('.credit_card').click(function () {
                    $('.hide_creadit_form').show();
                });
                $('#billing_same_address').change(function () {
                    if (this.checked) {
                        $('#same_bill').hide();
                    } else {
                        $('#same_bill').show();
                    }
                });
            });
        </script>
    </body>
</html>