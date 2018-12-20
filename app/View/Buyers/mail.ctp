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
        
        <?php echo $this->Html->script('buyer/jquery.min.js') ?>
        <?php echo $this->Html->script('buyer/main.js') ?>
        <?php echo $this->Html->script('buyer/jquery.min.js') ?>
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
        <style>
            .err{background-color: #000;color: #fff;padding: 5px !important;text-align: center;}
        </style>
    </head>
    <body>
        <!--header-->
        <div class="header">
            <?php echo $this->Element('buyer/header_top') ?>
            <?php echo $this->Element('buyer/header') ?>
        </div>
        <!--header-->
        <!--banner-->
        <div class="banner1">
            <div class="container">
                <h3><a href="index.html">Home</a> / <span>Mail Us</span></h3>
            </div>
        </div>
        <!--banner-->
        <!--content-->
        <div class="content">
            <!--contact-->
            <div class="mail-w3ls">
                <div class="container">
                    <h2 class="tittle">Mail Us</h2>
                    <div class="mail-grids">
                        <div class="mail-top">
                            <div class="col-md-4 mail-grid">
                                <i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>
                                <h5>Address</h5>
                                <p>9th floor - Palace Building - 221B Walk of Fame - USA</p>
                            </div>
                            <div class="col-md-4 mail-grid">
                                <i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>
                                <h5>Phone</h5>
                                <p>Telephone:  +1 800 603 6035</p>
                            </div>
                            <div class="col-md-4 mail-grid">
                                <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                                <h5>E-mail</h5>
                                <p>E-mail:<a href="mailto:example@mail.com"> example@mail.com</a></p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="map-w3">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d673607.6340751307!2d-104.44001811743372!3d48.738351336759585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5321f600f5170943%3A0x94f2e8e71e1dfc7a!2sE+Comertown+Rd%2C+Westby%2C+MT+59275%2C+USA!5e0!3m2!1sen!2sin!4v1467080368135"  allowfullscreen></iframe>
                        </div>
                        <div class="mail-bottom">
                            <h4>Get In Touch With Us</h4>
                            <?php if(isset($value)) { ?>
                            <p class="err"><?php echo $value ?></p><br/>
                            <?php } ?>
                            <form method="post">
                                <input name="user_name" type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Name';
                                        }" required="">
                                <input name="user_email" type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Email';
                                        }" required="">
                                <input name="user_phone" type="number" placeholder="Phone" required="">
                                <textarea name="message" onfocus="this.value = '';" onblur="if (this.value == '') {
                                            this.value = 'Message...';
                                        }" required="">Message...</textarea>
                                <input type="submit" value="Submit" >
                                <input type="reset" value="Clear" id="clear">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--contact-->
        </div>
        <!--content-->
        <!---footer--->
        <footer>
            <div class="footer-top">
                <div class="footer_menu">
                    <ul>
                        <li><a href="http://www.acumaxtechnologies.com/labaso.com/term-contitions.html">Term And Contitions</a></li>
                        <!-- <li><a href="seller.html">Seller Policy</a></li>
                        <li><a href="buyer.html">Buyer Policy</a></li> -->
                        <li><a href="http://www.acumaxtechnologies.com/labaso.com/Privacy.html">Privacy Policy</a></li>
                        <li><a href="http://www.acumaxtechnologies.com/labaso.com/faq.html">Help &amp; Faq</a></li>
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
            $("#clear").click(function () {
                $("form").trigger("reset");
            });
        </script>
        
    </body>
</html>