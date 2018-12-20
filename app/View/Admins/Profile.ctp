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
                            <a href='Seller.html'><span class="icon-8"></span> Seller
                            </a>
                        </li>                        
                        <li>
                            <a href='Category_Manage.html'><span class="icon-1"></span> Category Manager
                            </a>
                        </li> 
                        <li>
                            <a href='Product_Manage.html' > <i class="fa fa-product-hunt" aria-hidden="true"></i> Product Manager
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
                        <!-- <dt>
                            <a href="#accordion1" aria-expanded="false" aria-controls="accordion1" class="accordion-title accordionTitle js-accordionTrigger">+ Nandini<span class='pull-right use_below'>nandini</span><br/>&nbsp;&nbsp;&nbsp;nandini</a>

                        </dt> -->
                        <dd class="accordion-content" aria-hidden="true">
                            <div class='class_main_start'>
                                <div class="container-fluid new_container_use_div">
                                    <!-- new_div experec -->

                                    <!-- new_div experec end -->
                                    <div>

                                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="post">
                                        <!-- left column -->
                                        <?php foreach ($profile as $data) { ?>
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <div class="text-center">
                                                <input type="hidden" name="user_pic" value="<?php echo $data['admin']['profile_pic'] ?>">
                                                <?php if($data['admin']['profile_pic'] == '') { ?>
                                                <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail image_form" alt="avatar">
                                                <?php } else { ?>
                                                <img src="<?php echo DOMAIN_NAME ?><?php echo $data['admin']['profile_pic'] ?>" class="avatar img-circle img-thumbnail image_form" alt="avatar">
                                                <?php } ?>
                                                <h4 class="class_h4">Upload New photo...</h4>
                                                <input type="file" name="profile_pic_data" class="text-center center-block well well-sm">
                                            </div>
                                        </div>
                                        <!-- edit form column -->
                                        <div class="col-md-8 col-sm-6 col-xs-12 personal-info">                                                                                       
                                                <div class="form-group">
                                                    <h3 class="control-label_ine">Profile</h3>
                                                    <div class="control-label_ine_line"></div>

                                                    <label class="col-lg-3 control-label">Name:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" value="<?php echo $data['admin']['name'] ?>" name="admin_name" type="text">
                                                    </div><div class="clearfix"></div>

                                                </div>
                                                <div class="form-group">                                                   
                                                    <label class="col-lg-3 control-label">Email:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" value="<?php echo $data['admin']['email'] ?>" name="email" type="text">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-3 control-label">Phone:</label>
                                                    <div class="col-lg-8">
                                                        <input class="form-control" value="<?php echo $data['admin']['phone'] ?>" name="phone" type="text">
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Username :</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="<?php echo $data['admin']['username'] ?>" name="user_name" type="text">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Password:</label>
                                                    <div class="col-md-8">
                                                        <input class="form-control" value="<?php echo $data['admin']['password'] ?>" name="password" type="text">
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <button type="submit">Save</button>
                                                </div>                                                                                      
                                        </div>
                                         </form>
                                        <?php } ?>
                                    </div>
                                </div>	

                            </div>
                        </dd>

                    </div>


                    <div class='clearfix'></div>

                </div>
            </div></div>
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