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
        <?php echo $this->Html->css('admin/seller.css') ?>
        
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
                            <a href='Seller.html' class='active'><span class="icon-8"></span> Seller
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
                    <div class="accordion">

                        <?php if(count($result) > 0) {
                        foreach ($result as $data) { 
                        ?>
                        <dt>
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">+ <?php echo $data['seller']['name'] ?> <span class='pull-right use_below'><?php echo $data['seller']['email'] ?></span><br/>&nbsp;&nbsp;&nbsp;<?php echo $data['seller']['phone'] ?></a>

                        </dt>
                        <dd class="accordion-content accordionItem is-collapsed" id="accordion1" aria-hidden="true">
                            <div class='class_main_start'>
                                <div class="container-fluid new_container_use_div">
                                    <!-- new_div experec -->

                                    <!-- new_div experec end -->
                                    <div>

                                        <!-- left column -->
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="text-center">
                                                    <?php if(!empty($data['seller']['profile_pic'])) { ?>
                                                <img src="<?php echo DOMAIN_NAME ?><?php echo $data['seller']['profile_pic'] ?>" class="avatar img-circle img-thumbnail image_form" alt="avatar">
                                                    <?php } else { ?>
                                                <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail image_form" alt="avatar">
                                                    <?php } ?>

                                            </div>
                                        </div>
                                        <!-- edit form column -->
                                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <h3 class="control-label_ine">1. Contact Information</h3>
                                                    <div class="control-label_ine_line"></div>

                                                    <label class="col-lg-3 control-label">Name:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="elementId" value="<?php echo $data['seller']['name'] ?>" type="text" disabled="">
                                                    </div><div class="clearfix"></div>

                                                </div>
                                                <div class="form-group">                                                   
                                                    <label class="col-lg-3 control-label">Email:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" id="elementId_a" value="<?php echo $data['seller']['email'] ?>" type="text" disabled="">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Phone:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" value="<?php echo $data['seller']['phone'] ?>" id="elementId_b" type="text" disabled="">
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Registered Address :</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="<?php echo $data['seller']['address'] ?>" id="elementId_c" type="text" disabled="">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">city:</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="<?php echo $data['seller']['city'] ?>" id="elementId_d" disabled="" type="text">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Country:</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="<?php echo $data['seller']['country'] ?>" id="elementId_e" disabled="" type="text">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"></label>

                                                </div>
                                                
                                            </form>

                                        </div>
                                    </div>
                                </div>	
                                <div class="container-fluid new_div_margin_l">

                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <h3 class="control-label_ine">2. SELLER INFORMATION</h3>
                                                <div class="control-label_ine_line"></div>
                                                <label class="col-lg-10 col-lg-offset-1 ">Choose your Lazada store display name:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['store_name'] ?>" id="elementId_f" disabled="" type="text">
                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-lg-10 col-lg-offset-1 ">Brands you wish to sell:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['brand_name'] ?>" id="elementId_g" type="text" disabled="">
                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-lg-10 col-lg-offset-1 ">What is your main category:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['main_category'] ?>" id="elementId_h" disabled="" type="text">
                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <label class="col-lg-10 col-lg-offset-1 ">Main page (URL) of your online store:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['main_url'] ?>" id="elementId_i" disabled="" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <label class="col-lg-10 col-lg-offset-1 ">Where did you hear about selling on Lazada:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" id="elementId_j" value="<?php echo $data['seller']['selling_on'] ?>" disabled="" type="text">
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <h3 class="control-label_ine">3. LOGISTIC INFORMATION</h3>
                                                <div class="control-label_ine_line"></div>
                                                <label class="col-lg-10 col-lg-offset-1">Warehouse Address:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['street'] ?>" id="elementId_k" disabled="" type="text">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">City:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['city2'] ?>" id="elementId_l" type="text" disabled="">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">Warehouse contact person:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['contact_person'] ?>" id="elementId_m" type="text" disabled="">
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">Warehouse contact phone :</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['contact_phone'] ?>" id="elementId_n" disabled="" type="text">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">Sortation center:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <ul class="drop_lis_uk">
                                                        <li>
                                                            <input type="checkbox" disabled="" id="elementId_s" value="China, Shenzhen" <?php echo ($data['seller']['sortation_center'] == 'China, Shenzhen' ? 'checked' : '') ?>> China, Shenzhen
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" disabled="" id="elementId_t" value="China, Yiwu" <?php echo ($data['seller']['sortation_center'] == 'China, Yiwu' ? 'checked' : '') ?>> China, Yiwu
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" disabled="" id="elementId_u" value="China, HongKong" <?php echo ($data['seller']['sortation_center'] == 'China, HongKong' ? 'checked' : '') ?>> China, HongKong
                                                        </li>
                                                        <li>
                                                            <input type="checkbox" disabled="" id="elementId_v" value="Korea, Seoul" <?php echo ($data['seller']['sortation_center'] == 'Korea, Seoul' ? 'checked' : '') ?>> Korea, Seoul
                                                        </li>

                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">Country:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['country2'] ?>" id="elementId_o" type="text" disabled="">
                                                </div>

                                            </div>
                                        </form>
                                        <div class="clearfix"></div>
                                        <form class="form-horizonta" role="form">
                                            <div class="form-group">
                                                <h3 class="control-label_ine">4. LEGAL INFORMATION</h3>
                                                <div class="control-label_ine_line"></div>
                                                <label class="col-lg-10 col-lg-offset-1">Your Company Name:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['company_name'] ?>" id="elementId_p" disabled="" type="text">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">Legal Representative Name/ Director Name:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['director_name'] ?>" id="elementId_q" disabled="" type="text">
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-10 col-lg-offset-1">Business Registration Number:</label>
                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <input class="form-control" value="<?php echo $data['seller']['reg_number'] ?>" id="elementId_r" disabled="" type="text">
                                                </div>

                                            </div>




                                        </form></div>

                                </div> 
                                
                            </div>
                        </dd>
                        <?php } } else { ?>
                        <dt class="new_seller">
                        <center>No Sellers are Available</center>
                        </dt>
                        <?php } ?>
                    </div>


                    <div class='clearfix'></div>

                </div>
            </div>
                
        </div>
    </div>

    <div class='clearfix'></div>







    <!-- custom first_page end -->
        <?php echo $this->Html->script('admin/latest_jquery.js') ?>
    <script>
        //uses classList, setAttribute, and querySelectorAll
//if you want this to work in IE8/9 youll need to polyfill these
        (function () {
            var d = document,
                    accordionToggles = d.querySelectorAll('.js-accordionTrigger'),
                    setAria,
                    setAccordionAria,
                    switchAccordion,
                    touchSupported = ('ontouchstart' in window),
                    pointerSupported = ('pointerdown' in window);

            skipClickDelay = function (e) {
                e.preventDefault();
                e.target.click();
            }

            setAriaAttr = function (el, ariaType, newProperty) {
                el.setAttribute(ariaType, newProperty);
            };
            setAccordionAria = function (el1, el2, expanded) {
                switch (expanded) {
                    case "true":
                        setAriaAttr(el1, 'aria-expanded', 'true');
                        setAriaAttr(el2, 'aria-hidden', 'false');
                        break;
                    case "false":
                        setAriaAttr(el1, 'aria-expanded', 'false');
                        setAriaAttr(el2, 'aria-hidden', 'true');
                        break;
                    default:
                        break;
                }
            };
//function
            switchAccordion = function (e) {
                console.log("triggered");
                e.preventDefault();
                var thisAnswer = e.target.parentNode.nextElementSibling;
                var thisQuestion = e.target;
                if (thisAnswer.classList.contains('is-collapsed')) {
                    setAccordionAria(thisQuestion, thisAnswer, 'true');
                } else {
                    setAccordionAria(thisQuestion, thisAnswer, 'false');
                }
                thisQuestion.classList.toggle('is-collapsed');
                thisQuestion.classList.toggle('is-expanded');
                thisAnswer.classList.toggle('is-collapsed');
                thisAnswer.classList.toggle('is-expanded');

                thisAnswer.classList.toggle('animateIn');
            };
            for (var i = 0, len = accordionToggles.length; i < len; i++) {
                if (touchSupported) {
                    accordionToggles[i].addEventListener('touchstart', skipClickDelay, false);
                }
                if (pointerSupported) {
                    accordionToggles[i].addEventListener('pointerdown', skipClickDelay, false);
                }
                accordionToggles[i].addEventListener('click', switchAccordion, false);
            }
        })();
    </script>
        <?php echo $this->Html->script('admin/old_jauery.js') ?>
        <?php echo $this->Html->script('admin/dcalendar.picker.js') ?>
        <?php echo $this->Html->script('admin/custom.js') ?>
        <?php echo $this->Html->script('admin/bootstrap.min.js') ?>

</body>
</html>