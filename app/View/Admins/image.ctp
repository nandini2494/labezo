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
        <?php echo $this->Html->css('admin/jquery.Jcrop.css') ?>

        <style>
            .panel-heading {
                background-color: #1565c0 !important;
                text-align: left;
                font-weight: 700;
                padding: 1em 1em 1em 4em;
                display: block;
                text-decoration: none;
                transition: background-color 0.5s ease-in-out;
                cursor: pointer;
            }
            .panel a {
                color: #fff;
            }
            .panel a:hover {
                color: #fff;
                background-color: #1565c0;
                text-decoration: none;
            }
            .panel-group .panel {
                margin-bottom: 1em;
            }
        </style>
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
                            <a href='image.html' class="active"> <span class="fa fa-picture-o" aria-hidden="true"></span> Image Manager
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
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="panel-title">
                                    <a>
                                        Edit Image of Buyer Home Page
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class='new_div_max_use'>
                                        <form method="post" class="banner_form_submit" enctype="multipart/form-data">
                                            <input type="hidden" name="position" id="position_id" value="top_banner">
                                            <h2>Edit Image of Buyer Home Page</h2><br/>
                                            <?php foreach ($banner_image as $banner) { ?>
                                            <div class='form-group custom'>
                                                <input type="hidden" name="banner" value="<?php echo $banner['top_banner']['banner_image'] ?>">
                                                <p>Upload Top Banner Image</p>
                                                <label>
                                                    <input type='file' name='banner_image' class="file_use_div_image"/> 
                                                </label>
                                            </div>                           
                                            <div class='form-group custom'>
                                                <p>Discount</p>
                                                <label>
                                                    <input type='text' name='discount' placeholder="Discount" value="<?php echo $banner['top_banner']['discount'] ?>"/> 
                                                </label>
                                            </div>
                                            <div class='form-group custom'>
                                                <p>Title</p>
                                                <label>
                                                    <input type='text' name='title' placeholder="Title" value="<?php echo $banner['top_banner']['title'] ?>"/> 
                                                </label>
                                            </div>
                                            <?php } ?>                           
                                            <input class="btn btn-primary button_data" type="submit" name="form_button" value="Update"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title">
                                    <a>
                                        Edit Image of Top Left
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <div class='new_div_max_use'>
                                                <form method="post" class="top_left_form_submit" enctype="multipart/form-data">
                                                    <input type="hidden" name="position" id="position_id" value="top_left">
                                                    <h2>Edit Image of Top Left</h2><br/>
                                                    <?php foreach ($top_left_image as $top_left) { ?>
                                                    <div class='form-group custom'>
                                                        <input type="hidden" name="banner" value="<?php echo $top_left['top_banner']['banner_image'] ?>">
                                                        <p>Upload Image</p>
                                                        <label>
                                                            <input type='file' name='left_image' class="file_use_div_image"/> 
                                                        </label>
                                                    </div>                           
                                                    <div class='form-group custom'>
                                                        <p>Discount</p>
                                                        <label>
                                                            <input type='text' name='discount' placeholder="Discount" value="<?php echo $top_left['top_banner']['discount'] ?>"/> 
                                                        </label>
                                                    </div>
                                                    <div class='form-group custom'>
                                                        <p>Title</p>
                                                        <label>
                                                            <input type='text' name='title' placeholder="Title" value="<?php echo $top_left['top_banner']['title'] ?>"/> 
                                                        </label>
                                                    </div>
                                                    <?php } ?>                           
                                                    <input class="btn btn-primary button_data" type="submit" name="form_button" value="Update"/>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="panel-title">
                                    <a>
                                        Edit Image of Top Right
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <div class='new_div_max_use'>
                                        <form method="post" class="top_right_form_submit" enctype="multipart/form-data">

                                            <input type="hidden" name="position" id="position_id" value="top_right">
                                            <h2>Edit Image of Top Right</h2><br/>
                                            <?php foreach ($top_right_image as $top_right) { ?>
                                            <div class='form-group custom'>
                                                <input type="hidden" name="banner" value="<?php echo $top_right['top_banner']['banner_image'] ?>">
                                                <p>Upload Image</p>
                                                <label>
                                                    <input type='file' name='right_image' class="file_use_div_image"/> 
                                                </label>
                                            </div>                           
                                            <div class='form-group custom'>
                                                <p>Title</p>
                                                <label>
                                                    <input type='text' name='title' placeholder="Title" value="<?php echo $top_right['top_banner']['title'] ?>"/> 
                                                </label>
                                            </div>
                                            <?php } ?>                           
                                            <input class="btn btn-primary button_data" type="submit" name="form_button" value="Update"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFour" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h4 class="panel-title">
                                    <a>
                                        Edit Image of Bottom Left
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                                <div class="panel-body">
                                    <div class='new_div_max_use'>
                                        <form method="post" class="bottom_left_form_submit" enctype="multipart/form-data">

                                            <input type="hidden" name="position" value="bottom_left">
                                            <h2>Edit Image of Bottom Left</h2><br/>
                                            <?php foreach ($bottom_left_image as $bottom_left) { ?>
                                            <div class='form-group custom'>
                                                <input type="hidden" name="banner" value="<?php echo $bottom_left['top_banner']['banner_image'] ?>">
                                                <p>Upload Image</p>
                                                <label>
                                                    <input type='file' name='bottom_left_image' class="file_use_div_image"/> 
                                                </label>
                                            </div>                           
                                            <div class='form-group custom'>
                                                <p>Title</p>
                                                <label>
                                                    <input type='text' name='title' placeholder="Title" value="<?php echo $bottom_left['top_banner']['title'] ?>"/> 
                                                </label>
                                            </div>
                                            <?php } ?>                           
                                            <input class="btn btn-primary button_data" type="submit" name="form_button" value="Update"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingFive" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h4 class="panel-title">
                                    <a>
                                        Edit Image of Bottom Right
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                                <div class="panel-body">
                                    <div class='new_div_max_use'>
                                        <form method="post" class="bottom_right_form_submit" enctype="multipart/form-data">

                                            <input type="hidden" name="position" value="bottom_right">
                                            <h2>Edit Image of Bottom Right</h2><br/>
                                            <?php foreach ($bottom_right_image as $bottom_right) { ?>
                                            <div class='form-group custom'>
                                                <input type="hidden" name="banner" value="<?php echo $bottom_right['top_banner']['banner_image'] ?>">
                                                <p>Upload Image</p>
                                                <label>
                                                    <input type='file' name='bottom_right_image' class="file_use_div_image"/> 
                                                </label>
                                            </div>                           
                                            <div class='form-group custom'>
                                                <p>Title</p>
                                                <label>
                                                    <input type='text' name='title' placeholder="Title" value="<?php echo $bottom_right['top_banner']['title'] ?>"/> 
                                                </label>
                                            </div>
                                            <?php } ?>                           
                                            <input class="btn btn-primary button_data" type="submit" name="form_button" value="Update"/>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class='clearfix'></div>

                </div>
            </div>
        </div>

        <div class='clearfix'></div>

        <!-- Modal -->
        <div id="crop_image_modal" class="modal fade" style="width: auto" role="dialog">
            <div class="modal-dialog" style="width: auto; margin: 0px">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Crop Cover Picture</h4>
                    </div>
                    <div class="modal-body">
                        <img id="target">                
                    </div>
                    <div class="modal-footer">
                        <form method="post" id="dtata_to_crop_image">
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                            <input type="hidden" id="photo_url" name="photo_url" />
                            <input type="hidden" id="target_w_id" name="tagert_w" />
                            <input type="hidden" id="target_h_id" name="target_h" />
                            <input type="submit" class="btn btn-default" value="Save">                    
                        </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- model for cropping profile pic -->

        <!-- custom first_page end -->
        <?php echo $this->Html->script('admin/latest_jquery.js') ?>  

        <?php echo $this->Html->script('admin/old_jauery.js') ?>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <?php echo $this->Html->script('admin/scripts.js') ?>
        <?php echo $this->Html->script('admin/dcalendar.picker.js') ?>
        <?php echo $this->Html->script('admin/custom.js') ?>
        <?php echo $this->Html->script('admin/bootstrap.min.js') ?>
        <?php echo $this->Html->script('admin/jquery.Jcrop.js')?>
        <script>
            $(document).on('submit', '#dtata_to_crop_image', function () {
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'admins/crop_cover_photo'])?>",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        if (data == 1) {
                            alert("Banner Uploaded successfully");
                            location.reload();
                        }
                    }
                });
            });
        </script>

        <!-- image cropping tool-->
        <script type="text/javascript">
            $(".banner_form_submit").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'admins/upload_top_banner'])?>",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var status = JSON.parse(data);
                        if (status[0] == 0) {
                            alert(status[1]);
                        } else {
                            var img_src = "<?php echo DOMAIN_NAME ;?>" + status[1];
                            var TARGET_W = 1343;
                            var TARGET_H = 300;
                            $('#target').attr('src', img_src);
                            $('#photo_url').val(status[1]);
                            try {
                                jcrop_api.destroy();
                            } catch (e) {
                            }
                            $('#target').Jcrop({
                                aspectRatio: TARGET_W / TARGET_H,
                                setSelect: [100, 100, TARGET_W, TARGET_H],
                                onSelect: updateCoords
                            }, function () {
                                jcrop_api = this;
                            });
                            $('#target_w_id').val(TARGET_W);
                            $('#target_h_id').val(TARGET_H);
                            $('#crop_image_modal').modal('show');
                        }
                    }
                });
            });

            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }

            $("#crop_btn").click(function () {
                alert($("#x").val() + "-" + $("#y").val() + "-" + $("#w").val() + "-" + $("#h").val());
            });
        </script>
        <!-- image cropping tool/-->


        <script type="text/javascript">
            $(".top_left_form_submit").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'admins/upload_top_banner'])?>",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var status = JSON.parse(data);
                        if (status[0] == 0) {
                            alert(status[1]);
                        } else {
                            var img_src = "<?php echo DOMAIN_NAME ;?>" + status[1];
                            var TARGET_W = 540;
                            var TARGET_H = 586;
                            $('#target').attr('src', img_src);
                            $('#photo_url').val(status[1]);
                            try {
                                jcrop_api.destroy();
                            } catch (e) {
                            }
                            $('#target').Jcrop({
                                aspectRatio: TARGET_W / TARGET_H,
                                setSelect: [100, 100, TARGET_W, TARGET_H],
                                onSelect: updateCoords
                            }, function () {
                                jcrop_api = this;
                            });
                            $('#target_w_id').val(TARGET_W);
                            $('#target_h_id').val(TARGET_H);
                            $('#crop_image_modal').modal('show');
                        }
                    }
                });
            });

            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }

            $("#crop_btn").click(function () {
                alert($("#x").val() + "-" + $("#y").val() + "-" + $("#w").val() + "-" + $("#h").val());
            });
        </script>
        
        <script type="text/javascript">
            $(".top_right_form_submit").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'admins/upload_top_banner'])?>",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var status = JSON.parse(data);
                        if (status[0] == 0) {
                            alert(status[1]);
                        } else {
                            var img_src = "<?php echo DOMAIN_NAME ;?>" + status[1];
                            var TARGET_W = 540;
                            var TARGET_H = 295;
                            $('#target').attr('src', img_src);
                            $('#photo_url').val(status[1]);
                            try {
                                jcrop_api.destroy();
                            } catch (e) {
                            }
                            $('#target').Jcrop({
                                aspectRatio: TARGET_W / TARGET_H,
                                setSelect: [100, 100, TARGET_W, TARGET_H],
                                onSelect: updateCoords
                            }, function () {
                                jcrop_api = this;
                            });
                            $('#target_w_id').val(TARGET_W);
                            $('#target_h_id').val(TARGET_H);
                            $('#crop_image_modal').modal('show');
                        }
                    }
                });
            });

            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }

            $("#crop_btn").click(function () {
                alert($("#x").val() + "-" + $("#y").val() + "-" + $("#w").val() + "-" + $("#h").val());
            });
        </script>
        
        
        <script type="text/javascript">
            $(".bottom_left_form_submit").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'admins/upload_top_banner'])?>",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var status = JSON.parse(data);
                        if (status[0] == 0) {
                            alert(status[1]);
                        } else {
                            var img_src = "<?php echo DOMAIN_NAME ;?>" + status[1];
                            var TARGET_W = 259;
                            var TARGET_H = 259;
                            $('#target').attr('src', img_src);
                            $('#photo_url').val(status[1]);
                            try {
                                jcrop_api.destroy();
                            } catch (e) {
                            }
                            $('#target').Jcrop({
                                aspectRatio: TARGET_W / TARGET_H,
                                setSelect: [100, 100, TARGET_W, TARGET_H],
                                onSelect: updateCoords
                            }, function () {
                                jcrop_api = this;
                            });
                            $('#target_w_id').val(TARGET_W);
                            $('#target_h_id').val(TARGET_H);
                            $('#crop_image_modal').modal('show');
                        }
                    }
                });
            });

            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }

            $("#crop_btn").click(function () {
                alert($("#x").val() + "-" + $("#y").val() + "-" + $("#w").val() + "-" + $("#h").val());
            });
        </script>
        
        
        <script type="text/javascript">
            $(".bottom_right_form_submit").submit(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'admins/upload_top_banner'])?>",
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        var status = JSON.parse(data);
                        if (status[0] == 0) {
                            alert(status[1]);
                        } else {
                            var img_src = "<?php echo DOMAIN_NAME ;?>" + status[1];
                            var TARGET_W = 350;
                            var TARGET_H = 350;
                            $('#target').attr('src', img_src);
                            $('#photo_url').val(status[1]);
                            try {
                                jcrop_api.destroy();
                            } catch (e) {
                            }
                            $('#target').Jcrop({
                                aspectRatio: TARGET_W / TARGET_H,
                                setSelect: [100, 100, TARGET_W, TARGET_H],
                                onSelect: updateCoords
                            }, function () {
                                jcrop_api = this;
                            });
                            $('#target_w_id').val(TARGET_W);
                            $('#target_h_id').val(TARGET_H);
                            $('#crop_image_modal').modal('show');
                        }
                    }
                });
            });

            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            }

            $("#crop_btn").click(function () {
                alert($("#x").val() + "-" + $("#y").val() + "-" + $("#w").val() + "-" + $("#h").val());
            });
        </script>
    </body>
</html>