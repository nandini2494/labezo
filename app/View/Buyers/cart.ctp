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
        <?php echo $this->Html->script('buyer/main.js') ?>
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
                <li><a href="#">Shopping Cart</a></li>
            </ul>
            <div class="title">
                <h3>Shopping Cart</h3>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered table_cart_data">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Model</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Price</td>
                            <td class="text-right">Total Price</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                            <?php if(count($product_val['cart']) > 0) {
                            foreach ($product_val['cart'] as $product) {  ?>                        
                        <tr>
                            <td class="text-center">                 
                                <img src="<?php echo DOMAIN_NAME ?><?php echo $product['cart']['image'] ?>" alt="image" title="title" class="img-thumbnail image_product">
                            </td>
                            <td class="text-left">
                                <h4 class="text_name_use"><?php echo $product['cart']['name'] ?></h4>
                                <?php foreach ($product_val['option'] as $option) {
                                    foreach ($product_val['option_description'] as $option_desc) {
                                $option_id = explode(',',$product['cart']['option_id']); 
                                $option_desc_id = explode(',',$product['cart']['option_desc']); 
                                for($i = 0; $i < count(explode(',',$product['cart']['option_id'])); $i++) {
                                    if(($option['option_name']['option_id'] == $option_id[$i]) && ($option_desc['option_description']['option_desc_id'] == $option_desc_id[$i])) {
                                ?>
                                <p class="para_use"><?php echo $option['option_name']['option_name']; ?> : <?php echo $option_desc['option_description']['option_desc_name'] ?></p>
                                <?php } } } } ?>
                            </td>                                
                            <td class="text-left"><?php echo $product['cart']['model'] ?></td>
                            <td class="text-left">
                                <div>
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="input-group btn-block" style="max-width: 200px;">                                       
                                            <input type="hidden" name="cart_id" value="<?php echo $product['cart']['cart_id'] ?>">
                                            <input type="hidden" name="max_qty" value="<?php echo $product['cart']['max_quantity'] ?>">
                                            <input type="text" name="quantity" value="<?php echo $product['cart']['quantity'] ?>" class="form-control">
                                            <span class="input-group-btn">
                                                <button type="submit" name="form_btn" value="update" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Update"><i class="fa fa-refresh"></i></button>
                                            </span>                                        
                                        </div>
                                    </form>
                                </div>
                            </td>                                                                 
                            <!-- <td class="text-left">
                                    <?php foreach ($product_val['option_description'] as $option) {
                                        if($product['cart']['option_id'] == $option['option_description']['option_id'] && $product['cart']['option_desc'] == $option['option_description']['option_desc_id']) { ?>
                                    <?php echo $option['option_description']['option_desc_name'] ?>
                                    <?php } } ?>
                            </td> --> 
                            <td class="text-right"><?php echo number_format($product['cart']['price'],2) ?> <?php echo $product['cart']['currency'] ?></td>
                            <td class="text-right"><?php echo number_format($product['cart']['quantity']*$product['cart']['price'],2) ?> <?php echo $product['cart']['currency'] ?></td>                               
                            <td><a href="<?php echo Router:: url(['controller' => 'buyers/cart?cart_id=']) ?><?php echo $product['cart']['cart_id'] ?>">Remove</a></td>
                        </tr>
                            <?php } } else { ?>
                        <tr>
                            <td colspan="12"><center><b>No Records Found</b></center></td>
                    </tr>
                            <?php } ?>
                    </tbody>

                </table>
            </div>

                <?php if(count($product_val['cart']) > 0) { ?>
            <div class="pull-right check_btn">
                <button class="btn btn-danger"><a href="checkout.html">Checkout</a></button>
                <button class="btn btn-danger"><a href="index.html">Continue Shopping</a></button>
            </div>
                <?php } ?>            


            <!--  <div class="title">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
              <div class="panel panel-default">
      <div class="panel-heading" data-toggle="collapse" data-target="#Coupon_Code">Use Coupon Code</div>
      <div class="panel-body panel-collapse collapse in"  id="Coupon_Code">Panel Content</div>
    </div>
      <div class="panel panel-default">
      <div class="panel-heading" data-toggle="collapse" data-target="#Estimate">Estimate Shipping & Taxes </div>
      <div class="panel-body collapse"  id="Estimate">Panel Content</div>
    </div>
      <div class="panel panel-default">
      <div class="panel-heading" data-toggle="collapse" data-target="#Gift">Use Gift Certificate</div>
      <div class="panel-body collapse"  id="Gift">Panel Content</div>
    </div> -->
        </div>

        <!---footer--->
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
    </body>
</html>