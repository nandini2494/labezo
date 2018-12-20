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

        <style>
            .modal-dialog{margin:0 auto !important;}
            .save_detail {display: none;}
            .image_form {
                border-radius: 50%;
                max-width: 200px;
                max-height: 200px;
                height: 200px;
                width: 200px;
            }
        </style>
        <!-- new  -->
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
                            <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href='Profile.html' class="active"><span class="icon-profile_edit_icon"></span> Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href='product_info.html'><span class="icon-Product_info"></span> Product Information
                            </a>
                        </li>
			<li>
                            <a href='option.html'><span class="fa fa-tasks"></span> Option
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal_track"><span class="icon-tranck-order"></span> Track Products
                            </a>
                        </li>
                        <li>
                            <a href='shipping.html'><span class="fa fa-credit-card"></span> Shipping Method
                            </a>
                        </li> 
                        <li>
                            <a href='orders.html'> <span class="fa fa-book" aria-hidden="true"></span> Orders
                            </a>
                        </li>
                        <li>
                            <a href='Set_offer.html'> <span class="fa fa-gift" aria-hidden="true"></span> Set Offers
                            </a>
                        </li> 
                        <li>
                            <a href='rating.html'> <span class="icon-rating_and_review"></span> Ratting and Reviews</a>
                        </li> 
                        <li>
                            <a href='return_order.html'>
                                <span class="icon-return_order"></span>
                                Return Orders</a>
                        </li>
                    </ul> 
                    
                    <div class='clearfix'></div>
                </div>
                <!-- END SIDE NAV USER PANEL -->
            </div>
            <div class="right-container" id="right-container">

                <?php foreach ($profile as $data) { ?>
                <form id="updateForm" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="user_pic" id="user_pic" value="<?php echo $data['seller']['profile_pic'] ?>">
                    <div class="container-fluid">
                        <!-- new_div experec -->

                        <!-- new_div experec end -->
                        <div>
                            <h1 class="page-header div_header">Edit Profile</h1>
                            <div class="row margin_use_div">
                                <!-- left column -->
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="text-center">
                                        <?php if($data['seller']['profile_pic'] != "") { ?>
                                        <img src="<?php echo DOMAIN_NAME ?><?php echo $data['seller']['profile_pic'] ?>" class="avatar img-circle img-thumbnail image_form" alt="avatar">
                                        <?php } else { ?>
                                        <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail image_form" alt="avatar">
                                        <?php } ?>
                                        <h4 class='class_h4'>Upload New photo...</h4>
                                        <input type="file" name="profile_pic" disabled id='elementId_w' class="text-center center-block well well-sm">
                                    </div>
                                </div>
                                <!-- edit form column -->
                                <div class="col-md-8 col-sm-6 col-xs-12 personal-info">                               


                                    <div class="form-group">
                                        <h3 class='control-label_ine'>1. Contact Information</h3>
                                        <div class='control-label_ine_line'></div>


                                        <label class="col-lg-3 control-label">Name:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="user_name" id='elementId' value="<?php echo $data['seller']['name'] ?>" type="text" disabled />
                                        </div><div class='clearfix'></div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Email:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="email" id='elementId_a' value="<?php echo $data['seller']['email'] ?>" type="text" disabled />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Phone:</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" name="phone" value="<?php echo $data['seller']['phone'] ?>" id='elementId_b' type="text" disabled />
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Registered Address :</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="address" value="<?php echo $data['seller']['address'] ?>" id='elementId_c' type="text" disabled />
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">city:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="city" value="<?php echo $data['seller']['city'] ?>" id='elementId_d'  disabled type="text">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Country:</label>
                                        <div class="col-md-8">
                                            <input class="form-control" name="country" value="<?php echo $data['seller']['country'] ?>" id='elementId_e'  disabled type="text">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"></label>

                                    </div>


                                </div>
                            </div>
                        </div>	



                    </div>
                    <div class='container-fluid'>

                        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                            <div class="form-group">
                                <h3 class="control-label_ine">2. SELLER INFORMATION</h3>
                                <div class="control-label_ine_line"></div>
                                <label class="col-lg-10 col-lg-offset-1 ">Choose your Lazada store display name:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="store_name" value="<?php echo $data['seller']['store_name'] ?>" id='elementId_f' disabled  type="text" />
                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-10 col-lg-offset-1 ">Brands you wish to sell:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="brands" value="<?php echo $data['seller']['brand_name'] ?>" id='elementId_g' type="text" disabled />
                                </div>

                            </div>
                            <div class="form-group">

                                <label class="col-lg-10 col-lg-offset-1 ">What is your main category:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="main_category" value="<?php echo $data['seller']['main_category'] ?>" id='elementId_h' disabled type="text" />
                                </div>

                            </div>
                            <div class="form-group">

                                <label class="col-lg-10 col-lg-offset-1 ">Main page (URL) of your online store:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="main_url" value="<?php echo $data['seller']['main_url'] ?>"  id='elementId_i' disabled type="text">
                                </div>
                            </div>
                            <div class="form-group">

                                <label class="col-lg-10 col-lg-offset-1 ">Where did you hear about selling on Lazada:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="selling_on" id='elementId_j' value="<?php echo $data['seller']['selling_on'] ?>" disabled type="text">
                                </div>

                            </div>
                        </div>
                        <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12'>
                            <div class="form-group">
                                <h3 class="control-label_ine">3. LOGISTIC INFORMATION</h3>
                                <div class="control-label_ine_line"></div>
                                <label class="col-lg-10 col-lg-offset-1">Warehouse Address:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="street" value="<?php echo $data['seller']['street'] ?>" id='elementId_k' disabled type="text" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">City:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="city2" value="<?php echo $data['seller']['city2'] ?>" id='elementId_l' type="text" disabled />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">Warehouse contact person:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="contact_person" value="<?php echo $data['seller']['contact_person'] ?>" id='elementId_m' type="text" disabled />
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">Warehouse contact phone :</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="contact_phone" value="<?php echo $data['seller']['contact_phone'] ?>" id='elementId_n' disabled type="text" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">Sortation center:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <ul class='drop_lis_uk'>
                                        <li>
                                            <input type='checkbox' name="sortation_center" disabled id='elementId_s' value="China, Shenzhen" <?php echo ($data['seller']['sortation_center'] == 'China, Shenzhen' ? 'checked' : '') ?>/> China, Shenzhen
                                        </li>
                                        <li>
                                            <input type='checkbox' name="sortation_center" disabled id='elementId_t' value="China, Yiwu"  <?php echo ($data['seller']['sortation_center'] == 'China, Yiwu' ? 'checked' : '') ?>/> China, Yiwu
                                        </li>
                                        <li>
                                            <input type='checkbox' name="sortation_center" disabled id='elementId_u' value="China, HongKong" <?php echo ($data['seller']['sortation_center'] == 'China, HongKong' ? 'checked' : '') ?>/> China, HongKong
                                        </li>
                                        <li>
                                            <input type='checkbox' name="sortation_center" disabled id='elementId_v' value="Korea, Seoul" <?php echo ($data['seller']['sortation_center'] == 'Korea, Seoul' ? 'checked' : '') ?>/> Korea, Seoul
                                        </li>

                                    </ul>

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">Country:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="country2" value="<?php echo $data['seller']['country2'] ?>" id='elementId_o' type="text" disabled />
                                </div>

                            </div>

                            <div class='clearfix'></div>

                            <div class="form-group">
                                <h3 class="control-label_ine">4. LEGAL INFORMATION</h3>
                                <div class="control-label_ine_line"></div>
                                <label class="col-lg-10 col-lg-offset-1">Your Company Name:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="company_name" value="<?php echo $data['seller']['country2'] ?>" id='elementId_p'  disabled type="text" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">Legal Representative Name/ Director Name:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="director_name" value="<?php echo $data['seller']['director_name'] ?>" id='elementId_q' disabled type="text" />
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-lg-10 col-lg-offset-1">Business Registration Number:</label>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <input class="form-control" name="reg_no" value="<?php echo $data['seller']['reg_number'] ?>"  id='elementId_r' disabled type="text" />
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- <button type="button" class='pull-right ed_t-button_detail edit_detail' data-toggle="tooltip"  data-placement="left" title="Edit Contact Details">Edit</button>
                    <button type="submit" class='pull-right ed_t-button_detail save_detail' data-toggle="tooltip"  data-placement="left" title="Edit Contact Details">Save</button> -->
                    <button type="button" class='pull-right ed_t-button_detail edit_detail'>Edit</button>
                    <button type="submit" class='pull-right ed_t-button_detail save_detail'>Save</button>

                </form>

                <?php } ?>               
            </div>
        </div>

    <!-- custom first_page end -->
    <?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>
    <script>
        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

        $(document).ready(function () {
            $('.edit_detail').click(function () {
                $(".save_detail").show();
                $(this).hide();

                document.getElementById('elementId').disabled = false
                document.getElementById('elementId_a').disabled = true
                document.getElementById('elementId_b').disabled = false
                document.getElementById('elementId_c').disabled = false
                document.getElementById('elementId_d').disabled = false
                document.getElementById('elementId_e').disabled = false
                document.getElementById('elementId_f').disabled = false
                document.getElementById('elementId_g').disabled = false
                document.getElementById('elementId_h').disabled = false
                document.getElementById('elementId_i').disabled = false
                document.getElementById('elementId_j').disabled = false
                document.getElementById('elementId_k').disabled = false
                document.getElementById('elementId_l').disabled = false
                document.getElementById('elementId_m').disabled = false
                document.getElementById('elementId_n').disabled = false
                document.getElementById('elementId_o').disabled = false
                document.getElementById('elementId_p').disabled = false
                document.getElementById('elementId_q').disabled = false
                document.getElementById('elementId_r').disabled = false
                document.getElementById('elementId_s').disabled = false
                document.getElementById('elementId_t').disabled = false
                document.getElementById('elementId_u').disabled = false
                document.getElementById('elementId_v').disabled = false
                document.getElementById('elementId_w').disabled = false

            });

            /* $('.save_detail').click(function () {
             $(".firs_name").show();
             $(this).hide();
             
             document.getElementById('elementId').disabled = true
             document.getElementById('elementId_a').disabled = true
             document.getElementById('elementId_b').disabled = true
             document.getElementById('elementId_c').disabled = true
             document.getElementById('elementId_d').disabled = true
             document.getElementById('elementId_e').disabled = true
             document.getElementById('elementId_f').disabled = true
             document.getElementById('elementId_g').disabled = true
             document.getElementById('elementId_h').disabled = true
             document.getElementById('elementId_i').disabled = true
             document.getElementById('elementId_j').disabled = true
             document.getElementById('elementId_k').disabled = true
             document.getElementById('elementId_l').disabled = true
             document.getElementById('elementId_m').disabled = true
             document.getElementById('elementId_n').disabled = true
             document.getElementById('elementId_o').disabled = true
             document.getElementById('elementId_p').disabled = true
             document.getElementById('elementId_q').disabled = true
             document.getElementById('elementId_r').disabled = true
             document.getElementById('elementId_s').disabled = true
             document.getElementById('elementId_t').disabled = true
             document.getElementById('elementId_u').disabled = true
             document.getElementById('elementId_v').disabled = true
             document.getElementById('elementId_w').disabled = true
             
             }); */

        });
    </script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>    

    <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>
    <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
    <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

</body>
</html>