
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
        <?php echo $this->Html->css('admin/styles.imageuploader.css') ?>
        <?php echo $this->Html->css('admin/dcalendar.picker.css') ?>
        <?php echo $this->Html->css('admin/add_category.css') ?>
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
                        <li class="active">
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

                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="">


                            <div class="col-md-12">


                                &nbsp;&nbsp;

                                <form method="post">
                                    <h4 class="pull-left">Product Information</h4>
                                    <div class="pull-left padding_use_pul" id="serech_show"><input type="text" name="product_info" placeholder="#0258"><button type="submit">Get Product</button></div>
                                </form>
                                <div class="clearfix"></div>
                                <div class="table-responsive page">


                                    <table id="mytable" class="table table-bordred table-striped">

                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Seller ID</th>
                                                <th>Seller Name</th>
                                                <th>Image</th>
                                                <th>Model</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>                                        
                                                <th>View</th> 
                                            </tr>
                                        </thead>
                                        <tbody class="product">

                                            <?php 
                                            if(count($result) > 0) {
                                            foreach ($result as $data) { 
                                            ?>
                                            <tr>
                                                <td><?php echo $data['product']['product_name'] ?></td>
                                                <td><?php echo $data['product']['seller_id'] ?></td>
                                                <td><?php echo $data['seller']['name'] ?></td>
                                                <td><img src="<?php echo DOMAIN_NAME ?><?php echo $data['product']['image'] ?>" class="img_useful"></td>
                                                <td><?php echo $data['product']['product_model'] ?></td>
                                                <td><?php echo $data['product']['price'] ?></td>
                                                <td><?php echo $data['product']['quantity'] ?></td>
                                                <td>
                                                    <?php if($data['product']['status'] == '1') { ?>
                                                    Enabled
                                                    <?php } elseif ($data['product']['status'] == '0') { ?>
                                                    Disabled
                                                    <?php } ?>
                                                </td>                                                
                                                <td><a href="view_product.html?id=<?php echo $data['product']['product_id'] ?>">view</a></td>
                                            </tr>
                                            <?php } } else { ?>
                                            <tr><td colspan="9"><center><b>No Product Found</b></center></td></tr>
                                            <?php } ?>

                                        </tbody>

                                    </table>

                                    <div class="clearfix"></div>

                                </div>

                            </div>

                        </div>
                    </div>


                    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <form id="edit_modal" method="post" enctype="multipart/form-data">
                            <div class="modal-dialog bounceInDown">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <input type="hidden" id="edit_id" name="edit_name">
                                        <input type="hidden" id="size_guide1" name="size_guide2"> 
                                        <input type="hidden" id="product_img2" name="product_img1"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading"> Edit Information</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="#form-control-2">Product Name</label>
                                            <input class="form-control" id="product_id" name="product_name" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="#form-control-2">Cost</label>
                                            <input class="form-control" id="cost" name="price" type="text" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label for="#form-control-2">Description</label>
                                            <textarea rows="2" class="form-control" id="desc" name="description" placeholder=""></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select class="list_dres" id="category" name="category_name">

                                            <?php foreach ($value as $values) { ?>
                                                <option value="<?php echo $values['category']['category_name'] ?>"><?php echo $values['category']['category_name'] ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h4 class="margin_nonw_size">Size Guide</h4>
                                            <input type="file" id="resume" class="file_use_div" title="Pdf File" name="text_box">
                                        </div>
                                        <div class="form-group">
                                            <h4 class="margin_nonw_size">Product Image</h4>
                                            <section role="main" class="l-main">
                                                <header class="site-header">
                                                </header>
                                                <div class="uploader__box js-uploader__box l-center-box">
                                                    <div class="uploader__contents">
                                                        <div id="blah" class="gallery"></div>
                                                        <label class="button button--secondary" id="select_image">Select Files</label>
                                                        <input id="fileinput" class="uploader__file-input" name="product_image[]" type="file" multiple>
                                                    </div>                                                   
                                                </div>
                                            </section> 
                                        </div>
                                        <div class="form-group">
                                            <h4 class="margin_nonw_size">Options</h4><div class='clearfix'></div>
                                            <div class='clearf_class_color'>
                                                <input type='checkbox' name='check' class='show_div'/> color 
                                                <input type='checkbox' name='check' class='show_div_1'/> Size 
                                                <div class='click_show_div'>
                                                    <ul>
                                                        <li><p><input id="color_display" type="checkbox" name="color[]" value="Red"><i class="fa fa-circle firs_box_use" aria-hidden="true"></i> Red</p></li>
                                                        <li><p><input id="color_display" type="checkbox" name="color[]" value="Blue"><i class="fa fa-circle" aria-hidden="true"></i> Blue</p></li>
                                                        <li><p><input id="color_display" type="checkbox" name="color[]" value="Orange"><i class="fa fa-circle" aria-hidden="true"></i> Orange</p></li>
                                                        <li><p><input id="color_display" type="checkbox" name="color[]" value="Green"><i class="fa fa-circle" aria-hidden="true"></i> Green</p></li>

                                                    </ul>
                                                </div>
                                                <div class='click_show_div_1'>
                                                    <ul>
                                                        <li><p><input type='checkbox' name='size[]' value="XXL"/>&nbsp;XXL</p></li>
                                                        <li><p><input type='checkbox' name='size[]' value="XL"/>&nbsp;XL</p></li>
                                                        <li><p><input type='checkbox' name='size[]' value="L"/>&nbsp;L</p></li>
                                                        <li><p><input type='checkbox' name='size[]' value="M"/>&nbsp;M</p></li>
                                                        <li><p><input type='checkbox' name='size[]' value="S"/>&nbsp;S</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="#form-control-2">Brand</label>
                                            <textarea rows="2" class="form-control" id="brand" name="brand_name" placeholder=""></textarea>
                                        </div>
                                    </div>


                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Update</button>
                                    </div>

                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </form>
                    </div>

                    <!-- /.modal-dialog --> 
                </div>

                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <form method="post" id="delete_modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="product_data" id="product_data1">
                                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>

                                </div>
                                <div class="modal-footer ">
                                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;No</button>
                                </div>
                            </div>
                            <!-- /.modal-content --> 
                        </div>
                        <!-- /.modal-dialog --> 
                </div>

            </div></div>

        <div class='clearfix'></div>


        <div id="myModal_1" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content bounceInDown">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Product Information</h4>
                    </div>
                    <div class="modal-body border_uses_div_recipt">

                        <div class="well custom_use_css_div">

                            <div class="row">
                                <div class="text-center">

                                    <h4>Product Information</h4>
                                </div>
                                </span>
                                <table class="table table-hover">

                                    <tbody>
                                        <tr>
                                            <td class='col-md-8'><p>Product Name</p></td>
                                            <td class='col-md-4'><span id="viewproduct_id"></span></td>
                                        </tr>
                                        <tr>
                                            <td class='col-md-8'><p>Cost</p></td>
                                            <td class='col-md-4'><span id="viewprice"></span></td>
                                        </tr>
                                        <tr>
                                            <td class='col-md-8'><p>Description</p></td>
                                            <td class='col-md-4'><span id="viewdesc"></span></td>
                                        </tr>
                                        <tr>
                                            <td class='col-md-8'><p>Categories</p></td>
                                            <td class='col-md-4'><span id="viewcategory"></span></td>
                                        </tr>
                                        <tr>
                                            <td class='col-md-8'><p>Brand</p></td>
                                            <td class='col-md-4'><span id="viewbrand"></span></td>
                                        </tr>
                                        <tr>
                                            <td class='col-md-8'><p>Product Image</p></td>
                                            <td class='col-md-4' id="uploaded_img"></td>                                                                                          
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class='clearfix'></div>
                    </div>

                </div>
            </div>

            <!-- custom first_page end -->
            <?php echo $this->html->script('admin/latest_jquery.js') ?>
            <script>
                $(document).ready(function () {
                    $('.show_div').change(function () {
                        $('.click_show_div').show();
                    });

                    $('.click_show_div ul li ').click(function () {
                        $('.click_show_div').hide();
                    });

                    $('.show_div_1').change(function () {
                        $('.click_show_div_1').show();
                    });
                    $('.click_show_div_1 ul li ').click(function () {
                        $('.click_show_div_1').hide();
                    });
                });
            </script>            

            <?php echo $this->html->script('admin/old_jauery.js') ?>         

            <script>
                function view_product(product_id, price, description, category, product_image, brand) {
                    $("#viewproduct_id").text(product_id);
                    $("#viewprice").text(price);
                    $("#viewdesc").text(description);
                    $("#viewcategory").text(category);
                    $("#viewbrand").text(brand);
                    var html_data = '<td class="col-md-4" id="uploaded_img">';
                    html_data += '<img class="img-responsive max_use" src="<?php echo DOMAIN_NAME ?>' + product_image + '"/>';
                    ;
                    $("#uploaded_img").replaceWith(html_data);
                    $("#myModal_1").modal("show");
                }
            </script>

            <script>
                function edit(id, product_id, price, description, cat, brand, color, size, size_guide, img) {
                    var col = color.split(",");
                    var s = size.split(",");
                    $("#edit_id").val(id);
                    $("#size_guide1").val(size_guide);
                    $("#product_img2").val(img);
                    $("#product_id").val(product_id);
                    $("#cost").val(price);
                    $("#desc").val(description);
                    $('#category option[value="' + cat + '"]').attr('selected', 'selected');
                    for (var j = 0; j < (col.length - 1); j++) {
                        var myNodeList = document.querySelectorAll('input[value="' + col[j] + '"]');
                        for (var i = 0; i < myNodeList.length; i++) {
                            myNodeList[i].checked = true;
                        }
                    }

                    for (var m = 0; m < (s.length - 1); m++) {
                        var myNodeList1 = document.querySelectorAll('input[value="' + s[m] + '"]');
                        for (var n = 0; n < myNodeList1.length; n++) {
                            myNodeList1[n].checked = true;
                        }
                    }
                    $("#brand").val(brand);
                    $("#edit").modal("show");
                }
            </script>

            <script>
                $("#edit_modal").submit(function (e) {
                    e.preventDefault();
                    $.ajax({
                        url: "<?php echo Router:: url(['controller' => 'admins/edit_product']) ?>",
                        type: "POST",
                        data: new FormData(this),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            location.reload();
                        }
                    });
                });
            </script>

            <script>
                function delete_data(id) {
                    $("#product_data1").val(id);
                    $("#delete").modal("show");
                }
            </script>    

            <script>
                $("#delete_modal").submit(function () {
                    $.ajax({
                        url: "<?php echo Router::url(['controller' => 'admins/delete_product']) ?>",
                        type: "post",
                        data: new FormData(this),
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            location.reload();
                        }
                    });
                });
            </script>

            <script>
                $("#select_image").click(function () {
                    $("#fileinput").trigger("click");
                });

                $(function () {
                    // Multiple images preview in browser
                    var imagesPreview = function (input, placeToInsertImagePreview) {

                        if (input.files) {
                            var filesAmount = input.files.length;

                            for (i = 0; i < filesAmount; i++) {
                                var reader = new FileReader();

                                reader.onload = function (event) {
                                    $($.parseHTML('<img style="height:100px;width:200px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                                }

                                reader.readAsDataURL(input.files[i]);
                            }
                        }

                    };

                    $('#fileinput').on('change', function () {
                        imagesPreview(this, 'div.gallery');
                    });
                });
            </script>

            <?php echo $this->html->script('admin/dcalendar.picker.js') ?>
            <?php echo $this->html->script('admin/custom.js') ?>
            <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
            <?php echo $this->Html->script('admin/scripts.js') ?>
            <?php echo $this->html->script('admin/bootstrap.min.js') ?>
    </body>
</html>