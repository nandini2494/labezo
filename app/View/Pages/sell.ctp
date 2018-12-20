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
    </head>
    <body class="bkg">
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
        <div class="clearfix"></div>
        <div class="heading_title container well1">
            <h2>Sell Across  <strong> All Southeast Asia</strong> With Labezo </h2>
            <hr class="hr1"/>

            <hr class="hr2"/>
            <hr class="hr1"/>
        </div>

        <div class="sell">
            <?php if(isset($message)){?>
            <p class="err"><?php echo $message?></p>
            <?php }?>

            <div class="well">
                <p><b>Note: </b><small>Your privacy is very important to us. To better serve you, the form information you enter is recorded in real time.</small></p>
            </div>
            <div class="">

                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                            <p>Step 1</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Step 2</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                            <p>Step 3</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                            <p>Step 4</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
                            <p>Step 5</p>
                        </div>
                    </div>
                </div>

                <form role="form" action="" method="post">
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h4>1. Contact Information</h4>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" placeholder='Name' name="name" data-toggle="tooltip" title="please right in english character" required="">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="number" placeholder='Phone' name="phone" data-toggle="tooltip" title="please right in english character" required="">
                                </div>
                                <div class="form-group">
                                    <label>Registered Address (where your business registration is from)</label>
                                    <input class="form-control" type="text" placeholder='Registered Address ' name="address" data-toggle="tooltip" title="please right in english character" required="">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder='city' data-toggle="tooltip" name="city" title="please right in english character" required="">
                                </div>
                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" type="text" placeholder='Country' name="country" data-toggle="tooltip" title="please right in english character" required=""></input>
                                </div>
                                <button class="submit-btn nextBtn" type="button" >Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h4>2. SELLER INFORMATION</h4>
                                </br>
                                <div class="form-group">
                                    <label>Choose your Labezo store display name</label>
                                    <input class="form-control" type="text" placeholder='Example:ABC Store' name="store_name" data-toggle="tooltip" title="please right in english character"></input>
                                </div>
                                <div class="form-group">
                                    <label>Brands you wish to sell</label>
                                    <input class="form-control" type="mail" placeholder='Not Specified' name="brand_name" data-toggle="tooltip" title="please right in english character"></input>
                                </div>
                                <div class="form-group">
                                    <label>What is your main category?</label>
                                    <input type="text" class="form-control" name="category_name" placeholder="Main Category">                        
                                </div>
                                <div class="form-group">
                                    <label>Main page (URL) of your online store</label>
                                    <input class="form-control" type="text" placeholder='Example: http://www.aliexpress.com/store/123456 ' name="url_name" data-toggle="tooltip" title="please right in english character"></input>
                                </div>
                                <div class="form-group">
                                    <label>Where did you hear about selling on Labezo</label>
                                    <input type="text" class="form-control" name="selling_on" placeholder="">
                                </div>
                                <button class="submit-btn nextBtn" type="button" >Next</button>
                            </div>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <h4>3. LOGISTIC INFORMATION</h4>
                            <div class="form-group">
                                <label>Warehouse Address (where the returns will go)</label>
                                <input class="form-control" type="text" placeholder='Street' name="street" data-toggle="tooltip" title="please right in english character"></input></br>
                                <input class="form-control" type="text" placeholder='City' name="city2" data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <div class="form-group">
                                <label>Warehouse contact person</label>
                                <input class="form-control" type="mail" placeholder='Name' name="contact_person" data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <div class="form-group">
                                <label>Warehouse contact phone</label>
                                <input class="form-control" type="text" placeholder='Phone' name="contact_phone" data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <div class="form-group">
                                <label>Sortation center</label></br>
                                <input  type="Checkbox" placeholder='Registered Address' name="sortation_center[]" value="China, Shenzhen"> &nbsp; China, Shenzhen</input></br>
                                <input  type="Checkbox" placeholder='Registered Address' name="sortation_center[]" value="China, Yiwu"> &nbsp; China, Yiwu</input></br>
                                <input  type="Checkbox" placeholder='Registered Address' name="sortation_center[]" value="China, HongKong"> &nbsp; China, HongKong</input></br>
                                <input  type="Checkbox" placeholder='Registered Address' name="sortation_center[]" value="Korea, Seoul"> &nbsp;  Korea, Seoul</input></br>
                                <p><small>For international sellers, please select Hong Kong as your sortation center</small></p>

                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <input class="form-control" type="text" placeholder='Country' name="country2" data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <button class="submit-btn nextBtn" type="button" >Next</button>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-4">
                        <div class="col-xs-12">
                            <h4>4. LEGAL INFORMATION</h4>
                            </br>
                            <div class="form-group">
                                <label>Your Company Name</label>
                                <input class="form-control" name="company_name" type="text" placeholder='Example: Shanghai Yimao Youxian Gongsi Ltd  (注册公司名称）'  data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <div class="form-group">
                                <label>Legal Representative Name/ Director Name*</label>
                                <input class="form-control" type="mail" placeholder='Name' name="director_name" data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <div class="form-group">
                                <label>Business Registration Number*</label>
                                <input class="form-control" type="text" name="reg_no" placeholder='Registration Number' data-toggle="tooltip" title="please right in english character"></input>
                            </div>
                            <div class="form-group">
                                <label>Please upload a scanned copy of your Business Registration*</label>
                                <input type="file" placeholder='Registered Address' name="business_reg" data-toggle="tooltip" title="please right in english character"></input>
                                <p><small>No personal BR. No CR.</small></p>
                            </div>

                            <input type="checkbox" name="term_cond"> &nbsp; I have read, understood and agreed to the terms and conditions of the Crossborder Marketplace Contract and the Crossborder Logistics Services Contract.</input>

                            <p>Click <a href=""> HERE </a> to download the <strong> Crossborder Marketplace Contract </strong> and</p>

                            <p>Click <a href=""> HERE </a> to download the <strong> Crossborder Logistics Services Contract. </strong> and</p>
                            <button class="submit-btn nextBtn" type="button" >Next</button>
                        </div>
                    </div>

                    <div class="row setup-content" id="step-5">
                        <div class="col-xs-12">
                            <h4>5. Sign Up</h4>

                            <div class="form-group">
                                <label>Enter Email</label>
                                <input class="form-control" type="email" placeholder='Email' name="email" required="">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder='Password' name="password" required="">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input class="form-control" type="password" placeholder='Confirm Password' name="confim_pass" required="">
                            </div>

                            <div class="form-group">
                                <button class="submit-btn" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="clearfix"></div>

        <div class="clearfix"></div>
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

        <script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
        <?php echo $this->Html->script('custom.js') ?>
        <script>
            $("document").ready(function () {
                $(window).bind("scroll", function () {
                    if ($(window).scrollTop() > 300) {

                        $(".Menu_bar").addClass('Menu_bar_fixed');

                    } else
                    {
                        $(".Menu_bar").removeClass('Menu_bar_fixed');
                    }

                });

            });
        </script>
    </body>
</html>