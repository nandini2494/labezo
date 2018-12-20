<!DOCTYPE html>
<html>
    <head>
        <title>Labezo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <?php echo $this->Html->css('style.css') ?>
        <?php echo $this->Html->css('font/stylesheet.css') ?>
        <?php echo $this->Html->css('responsive.css') ?>     
        <style>
            .err{
                background: #000;
                padding: 5px !important;
                color: #ff1212;
                text-align: center;
            }
        </style>
    </head>
    <body class="login_body">
        <header class="Menu_bar_2">
            <div class="Menu_bar">
                <div class="Menu_bar_left">
                    <image src="<?php echo DOMAIN_NAME ?>img/small-logo.png" class="img-responsive"/>
                </div>
                <nav>
                    <a href="#" id="menu-icon"></a>
                    <ul>
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="faq.html">Help & Faq</a></li>
                        <li><a href="work.html">Work At Labezo</a></li>
                        <li><a href="sell.html">Sell With Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li class="dropdown"><a href="#">Select Country </a>
                            <ul class="dropdown-content drop">
                                <li><a href=""><img src="<?php echo DOMAIN_NAME ?>img/Hongkong.png"/> Hongkong</a></li>
                                <li><a href=""><img src="<?php echo DOMAIN_NAME ?>img/Mexico.png"/> Mexico</a></li>
                                <li><a href=""><img src="<?php echo DOMAIN_NAME ?>img/Philippines.png"/> Philippines</a></li>
                                </div>
                            </ul>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </header>

        <div class="login">
            <div class="login-triangle"></div>

            <h2 class="login-header">Log in</h2>
            
            <?php if(isset($message)){?>
            <p class="err"><?php echo $message?></p>
            <?php }?>
            
            <form class="login-container" method="post">
                <p><input type="email" name="email" placeholder="Email"></p>
                <p><input type="password" name="password" placeholder="Password"></p>
                <p><input type="submit" value="Log in"></p>
            </form>
        </div>

        <footer>
            <div class="footer-top">
                <div class="footer_menu">
                    <ul>
                        <li><a href="term-contitions.html">Term And Contitions</a></li>
                        <li><a href="seller.html">Seller Policy</a></li>
                        <li><a href="buyer.html">Buyer Policy</a></li>
                        <li><a href="Privacy.html">Privacy Policy</a></li>
                        <li><a href="faq.html">Help & Faq</a></li>
                        <li><a href="sell.html">Sell With Us</a></li>
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
        <div class="clearfix"></div>
        <div class="copy_right">
            <p>© 2017 . All Rights Reserved  <a href="http://www.acumaxtechnologies.com/">AcumaxTechnologies</a></p>
        </div>

    </body>
</html>
