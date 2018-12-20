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
        <?php echo $this->Html->css('sellerDashboard/styles.imageuploader.css') ?>
        <?php echo $this->Html->css('sellerDashboard/colorpicker.css') ?>
        <?php echo $this->Html->css('sellerDashboard/add_product.css') ?>
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
                            <a href='Profile.html'><span class="icon-profile_edit_icon"></span> Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href='product_info.html' class='active_page'><span class="icon-Product_info"></span> Product Information
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

                <form method="post" enctype="multipart/form-data">
                    <input class="btn btn-info button_save" type='submit' value='Save'/>

                    <div class='container-fluid'>
                        <div class="">
                            <div class="">
                                <div class="board">
                                    <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                                    <div class="board-inner">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <div class="liner"></div>
                                            <li class="active">
                                                <a href="#home" data-toggle="tab" title="General">
                                                    <span class="round-tabs one">
                                                        <i class="fa fa-book" aria-hidden="true"></i>
                                                    </span> 
                                                </a></li>
                                            <li><a href="#settings" data-toggle="tab" title="Image">
                                                    <span class="round-tabs four">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                    </span> 
                                                </a></li>

                                            <li><a href="#doner" data-toggle="tab" title="
                                                   Option">
                                                    <span class="round-tabs five">
                                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </span> </a>
                                            </li>

                                        </ul></div>


                                    <div class="tab-content">                                       
                                        <div class="tab-pane fade in active" id="home">   
                                            <?php foreach ($results['product'] as $result) {  ?>              
                                            <h3 class="head text-center">General</h3>
                                            <div class='form_container'>
                                                <div class='form-group'>                                                    
                                                    <h4>Product Name</h4>
                                                    <label>
                                                        <input type='text' placeholder="Product Name" name='product_name' value="<?php echo $result['product']['product_name'] ?>"/>
                                                    </label><div class='clearfix'></div>
                                                    <h4>Description</h4>
                                                    <textarea rows='5' placeholder="Decription" name='description'><?php echo $result['product']['product_desc'] ?></textarea>
                                                    <h4>Model</h4>
                                                    <label>
                                                        <input type='text' placeholder="Model" name='model' value="<?php echo $result['product']['product_model'] ?>"/>
                                                    </label><div class='clearfix'></div> 

                                                    <h4>Price</h4>
                                                    <label>
                                                        <input type='text' placeholder="Price" name='price' value="<?php echo $result['product']['price'] ?>"/>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Currency</h4>
                                                    <label>
                                                        <select name="currency" required="">
                                                            <option value="">--Select Currency--</option>
                                                            <option value="USD" <?php echo ($result['product']['currency'] == 'USD' ? 'selected = "selected"' : '') ?>>USD</option>
                                                            <option value="EUR" <?php echo ($result['product']['currency'] == 'EUR' ? 'selected = "selected"' : '') ?>>EUR</option>
                                                            <option value="CAD" <?php echo ($result['product']['currency'] == 'CAD' ? 'selected = "selected"' : '') ?>>CAD</option>
                                                        </select>
                                                    </label><div class='clearfix'></div>
                                                    
                                                    <h4>Brand</h4>
                                                    <label>
                                                        <input type='text' placeholder="Brand" name='brand' value="<?php echo $result['product']['brand'] ?>"/>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Quantity</h4>
                                                    <label>
                                                        <input type='text' placeholder="No. of Product" name='quantity' value="<?php echo $result['product']['quantity'] ?>"/>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Main Category</h4>
                                                    <label>
                                                        <select name="main_category" required="" class="main_category">
                                                            <option value="">Select Category</option>
                                                            <?php foreach ($category as $cate) { ?>
                                                            <option value="<?php echo $cate['category_desc']['category_id'] ?>" <?php echo ($result['product']['main_category'] == $cate['category_desc']['category_id'] ? 'selected="selected"' : '') ?>><?php echo $cate['category_desc']['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </label>

                                                    <h4>Sub Category</h4>
                                                    <label>
                                                        <select name="category" class="sub_category">
                                                            <option value="">Select Category First</option>                                                           
                                                        </select>
                                                    </label>

                                                    <h4>Status</h4>
                                                    <label>
                                                        <select name="status">
                                                            <option value="">Select</option>
                                                            <option value="1" <?php echo ($result['product']['status'] == '1' ? 'selected="selected"' : '') ?>>Enabled</option>
                                                            <option value="0" <?php echo ($result['product']['status'] == '0' ? 'selected="selected"' : '') ?>>Disabled</option>
                                                        </select>
                                                    </label>
                                                    <div class='clearfix'></div>

                                                </div>

                                            </div> 

                                        </div>

                                        <div class="tab-pane fade" id="settings">
                                            <h3 class="head text-center">Image</h3> 
                                            <div class='row'>
                                                <div class="inner_container row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <table class='table_use_option'>
                                                            <thead>
                                                                <tr class='bg_use_new_option'>
                                                                    <td colspan="2">Image</td>
                                                                </tr>                                                                                                              
                                                            </thead>  

                                                            <tbody>
                                                                <tr class='input_type_new'>
                                                                    <td>
                                                                        <input type="hidden" name="image_hidden" value="<?php echo $result['product']['image'] ?>">
                                                                        <?php if(!empty($result['product']['image'])) { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?><?php echo $result['product']['image'] ?>" class="img_default">
                                                                        <?php } else { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?>img/default.png" class="img_default">
                                                                        <?php } ?>

                                                                    </td>                                                                    
                                                                    <td>
                                                                        <input type='file' class='file_img' id='file_data' name='main_image'>
                                                                        <label for='file_data' class='button_upload'>Upload file</label>
                                                                    </td>                                                                    
                                                                </tr>                                                                                                                              
                                                            </tbody>       
                                                            <?php } ?>
                                                            <div class='clearfix'></div>
                                                        </table>
                                                    </div> 

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <table class='table_use_option'>
                                                            <thead>
                                                                <tr class='bg_use_new_option'>
                                                                    <td colspan="3" class="add_image">Additional Image</td>
                                                                </tr>                                                                                                              
                                                            </thead>   
                                                            <tbody class="append_row">

                                                                <?php foreach ($results['images'] as $images) { ?>
                                                                <tr class='input_type_new'>                                                                   
                                                                    <td>
                                                                        <input type="hidden" name="add_img_hidden[]" value="<?php echo $images['image_desc']['product_image'] ?>">
                                                                        <input type="hidden" name="img_id[]" value="<?php echo $images['image_desc']['image_id'] ?>">
                                                                        <?php if(!empty($images['image_desc']['product_image'])) { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?><?php echo $images['image_desc']['product_image'] ?>" class="img_default">
                                                                        <?php } else { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?>img/default.png" class="img_default">
                                                                        <?php } ?>

                                                                    </td>
                                                                    <td colspan='2' class="add_image">
                                                                        <input type='file' class='file_img' id='file_upload<?php echo $images['image_desc']['image_id'] ?>' name='product_image1[]'>
                                                                        <label for='file_upload<?php echo $images['image_desc']['image_id'] ?>' class='button_upload'>Upload file</label>
                                                                    </td>
                                                                </tr> 
                                                                <?php } ?>

                                                            </tbody>     
                                                            <tbody>
                                                                <tr class='bg_use_new_option'>
                                                                    <td colspan='7'><i class="fa fa-plus-circle pull-right plus_incon_div" id="plus_item" aria-hidden="true"></i></td>
                                                                </tr>
                                                            </tbody>
                                                            <div class='clearfix'></div>
                                                        </table>
                                                    </div> 
                                                </div>    
                                            </div>    
                                        </div> 
                                        <div class="tab-pane fade" id="doner">

                                            <div class='row'>
                                                <div class='inner_container row'>
                                                    <div class='col-sm-2 width_use_div'>
                                                        <ul class="nav nav-pills nav-stacked" id="option"> 
                                                            <input type="hidden" id="counter" value="<?php echo count($results['option']) ?>">
                                                            <?php $a1 = 0;
                                                            foreach($results['option'] as $option_val1) { ?>
                                                            <li class='list_val'><a data-toggle='tab' href='#tab_option<?php echo $a1 ?>' class='anchor_val'><i class='fa fa-minus-circle anchor_val' id='remove_data' aria-hidden='true' onclick='valueData("<?php echo $option_val1['option_name']['option_id'] ?>")'></i><?php echo $option_val1['option_name']['option_name'] ?></a></li>                                                            
                                                            <?php $a1++; } ?>
                                                        </ul>

                                                        <div class='input_use_div'>
                                                            <input type='text' id='text_1'/>
                                                            <ul class='li_use_div'>                                                              
                                                                <?php foreach ($option as $options) { ?>
                                                                <li id='<?php echo $options['option_name']['option_id'] ?>'><?php echo $options['option_name']['option_name'] ?></li>
                                                                <?php } ?>                                                              
                                                            </ul>
                                                        </div>
                                                    </div>

                                                    <div class='col-sm-10'>
                                                        <div class='tab-content' id='div_function'>
                                                           <?php 
                                                           $a = 0;
                                                           foreach($results['option'] as $option_val) { ?>
                                                            <div class='tab-pane' id='tab_option<?php echo $a ?>'>
                                                                <input type='hidden' name='option_id1[]' id='option_val<?php echo $a ?>' value='<?php echo $option_val['option_name']['option_id'] ?>'>
                                                                <aside class='new_show_hide_use'>
                                                                    <div class='col-lg-8 col-md-8 col-sm-12 col-xs-12'>
                                                                        <div class='form-group custom_font-edit'>
                                                                            <h4>Required</h4>
                                                                            <select name='require1[]'>
                                                                                <option <?php echo ($option_val['product_option']['require_val'] == 'Yes' ? 'selected="selected"' : '') ?>>Yes</option>
                                                                                <option <?php echo ($option_val['product_option']['require_val'] == 'No' ? 'selected="selected"' : '') ?>>No</option>
                                                                            </select>
                                                                        </div>
                                                                    </div><div class='clearfix'></div>
                                                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 use_class'>
                                                                        <div class='clearfix'></div>
                                                                        <table class='table_use_option' border='3'>
                                                                            <thead>
                                                                                <tr class='bg_use_new_option'>
                                                                                    <td>Option Value</td>
                                                                                    <td>Quantity</td>
                                                                                    <td>Subtract Stock</td>
                                                                                    <td>Price</td>
                                                                                    <td>Weight</td>
                                                                                    <td></td>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody class='append_div_data<?php echo $option_val['option_name']['option_id'] ?>'>

                                                                                <?php foreach ($results['option_desc'] as $opt_data) { 
                                                                                    if($option_val['option_name']['option_id'] == $opt_data['product_option']['option_id']) {
                                                                                ?>
                                                                                <tr class='input_type_new'>                                                                                   
                                                                                    <td>
                                                                                        <input type="hidden" name="pro_desc_id[<?php echo $opt_data['product_option']['option_id'] ?>][]" value="<?php echo $opt_data['product_option']['product_op_id'] ?>">
                                                                                        <select id='select_id' name='option_name1[<?php echo $opt_data['product_option']['option_id'] ?>][]'>
                                                                                            <?php foreach ($results['option_name'] as $opt_name) { 
                                                                                                if($option_val['option_name']['option_id'] == $opt_name['option_description']['option_id']) {
                                                                                            ?>
                                                                                            <option value="<?php echo $opt_name['option_description']['option_desc_id']?>" <?php echo ($opt_data['product_option']['option_desc_id'] == $opt_name['option_description']['option_desc_id'] ? 'selected="selected"' : '') ?>><?php echo $opt_name['option_description']['option_desc_name'] ?></option>
                                                                                            <?php } } ?>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type='text' placeholder='quantity' name='option_quantity1[<?php echo $opt_data['product_option']['option_id'] ?>][]' value='<?php echo $opt_data['product_option']['option_quantity'] ?>'>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select name='stock1[<?php echo $opt_data['product_option']['option_id'] ?>][]'>
                                                                                            <option <?php echo ($opt_data['product_option']['option_stock_sub'] == 'Yes' ? 'selected="selected"' : '') ?>>Yes</option>
                                                                                            <option <?php echo ($opt_data['product_option']['option_stock_sub'] == 'No' ? 'selected="selected"' : '') ?>>No</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class='break_space' name='price_prefix1[<?php echo $opt_data['product_option']['option_id'] ?>][]'>
                                                                                            <option <?php echo ($opt_data['product_option']['option_price_prefix'] == '+' ? 'selected="selected"' : '') ?>>+</option>
                                                                                            <option <?php echo ($opt_data['product_option']['option_price_prefix'] == '-' ? 'selected="selected"' : '') ?>>-</option>
                                                                                        </select>
                                                                                        <input type='text' placeholder='price' name='option_price1[<?php echo $opt_data['product_option']['option_id'] ?>][]' value="<?php echo $opt_data['product_option']['option_price'] ?>">
                                                                                    </td>
                                                                                    <td>
                                                                                        <select class='break_space' name='weight_prefix1[<?php echo $opt_data['product_option']['option_id'] ?>][]'>
                                                                                            <option <?php echo ($opt_data['product_option']['option_weight_prefix'] == '+' ? 'selected="selected"' : '') ?>>+</option>
                                                                                            <option <?php echo ($opt_data['product_option']['option_weight_prefix'] == '-' ? 'selected="selected"' : '') ?>>-</option>
                                                                                        </select>
                                                                                        <input type='text' placeholder='weight' name='option_weight1[<?php echo $opt_data['product_option']['option_id'] ?>][]' value="<?php echo $opt_data['product_option']['option_weight'] ?>"/>
                                                                                    </td>
                                                                                    <td class='width_div'><i class='fa fa-times-circle' aria-hidden='true' onclick='delete_desc(<?php echo $opt_data['product_option']['product_op_id'] ?>)'></i></td>
                                                                                </tr> 
                                                                                <?php }  } ?>

                                                                            </tbody>
                                                                            <tbody>
                                                                                <tr class='bg_use_new_option'>
                                                                                    <td colspan='7'><i class='fa fa-plus-circle pull-right plus_incon_div' onclick='addValue("<?php echo $option_val['option_name']['option_id'] ?>")' aria-hidden='true'></i></td>
                                                                                </tr>
                                                                            </tbody>
                                                                            <div class='clearfix'></div>
                                                                        </table>
                                                                        <div class='clearfix'></div>
                                                                    </div>
                                                                </aside>
                                                            </div>
                                                           <?php $a++; } ?>
                                                        </div>    
                                                    </div>                                                     
                                                </div>
                                            </div>

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>

        <div class="modal fade" id="pro_opt" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="option_id2" id="option_id1">
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-success" id='delete_option'><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                    </div>
                </div>
                <!-- /.modal-content --> 
            </div>
            <!-- /.modal-dialog --> 
        </form>
    </div>
    <!-- custom first_page end -->
        <?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>

    <script>
        $(document).on('click', '#custom_button', function () {
            $(this).closest('tr').remove();
            return false;
        });
    </script>

    <script>
        var a = 0;
        $("#plus_item").click(function () {
            $(".append_row").append(
                    "<tr class='input_type_new'>" +
                    "<td><img src='<?php echo DOMAIN_NAME ?>img/default.png' class='img_default'></td>" +
                    "<td>" +
                    "<input type='file' class='file_img' id='file_upload" + a + "' name='product_image[]'>" +
                    "<label for='file_upload" + a + "' class='button_upload'>Upload file</label>" +
                    "</td>" +
                    "<td class='width_div add_image'><i class='fa fa-minus-circle' aria-hidden='true' id='custom_button'></i></td>" +
                    "</tr>"
                    );
            a++;
        });
    </script>
    
    <script>
        $(document).ready(function () {
            $('#text_1').click(function () {
                $('.li_use_div').show();
            });
            var a = $('#counter').val();
            var p = $('#counter').val();
            $('.li_use_div li').click(function () {
                $("#option").append(
                        "<li class='list_val'><a data-toggle='tab' href='#tab_option" + a + "' class='anchor_val'><i class='fa fa-minus-circle' id='remove_data' aria-hidden='true'></i>" + $(this).text() + "</a></li>"
                        );
                $("#div_function").append(
                        "<div class='tab-pane' id='tab_option" + a + "'>" +
                        "<input type='hidden' name='option_id[]' id='option_val" + a + "' value='" + $(this).attr('id') + "'>" +
                        "<aside class='new_show_hide_use'>" +
                        "<div class='col-lg-8 col-md-8 col-sm-12 col-xs-12'>" +
                        "<div class='form-group custom_font-edit'>" +
                        "<h4>Required</h4>" +
                        "<select name='require[]'>" +
                        "<option>Yes</option>" +
                        "<option>No</option>" +
                        "</select>" +
                        "</div>" +
                        "</div><div class='clearfix'></div>" +
                        "<div class='col-lg-12 col-md-12 col-sm-12 col-xs-12 use_class'>" +
                        "<div class='clearfix'></div>" +
                        "<table class='table_use_option' border='3'>" +
                        "<thead>" +
                        "<tr class='bg_use_new_option'>" +
                        "<td>Option Value</td>" +
                        "<td>Quantity</td>" +
                        "<td>Subtract Stock</td>" +
                        "<td>Price</td>" +
                        "<td>Weight</td>" +
                        "<td></td>" +
                        "</tr>" +
                        "</thead>" +
                        "<tbody class='append_div_data' id='append_data" + $(this).attr('id') + "" + a + "'>" +
                        "</tbody>" +
                        "<tbody>" +
                        "<tr class='bg_use_new_option'>" +
                        "<td colspan='7'><i class='fa fa-plus-circle pull-right plus_incon_div' aria-hidden='true'></i></td>" +
                        "</tr>" +
                        "</tbody>" +
                        "<div class='clearfix'></div>" +
                        "</table>" +
                        "<div class='clearfix'></div>" +
                        "</div>" +
                        "</aside>" +
                        "</div>"
                        );
                $('.li_use_div').hide();
                var data_id = $('#option_val' + a + '').val();
                $(".plus_incon_div").click(function () {
                    $("#append_data" + data_id + "" + (a - 1) + "").append(
                            "<tr class='input_type_new'>" +
                            "<td>" +
                            "<select id='select_id" + p + "' name='option_name[" + data_id + "][]'>" +
                            "</select>" +
                            "</td>" +
                            "<td>" +
                            "<input type='text' placeholder='quantity' name='option_quantity[" + data_id + "][]'>" +
                            "</td>" +
                            "<td>" +
                            "<select name='stock[" + data_id + "][]'>" +
                            "<option>Yes</option>" +
                            "<option>No</option>" +
                            "</select>" +
                            "</td>" +
                            "<td>" +
                            "<select class='break_space' name='price_prefix[" + data_id + "][]'>" +
                            "<option>+</option>" +
                            "<option>-</option>" +
                            "</select>" +
                            "<input type='text' placeholder='price' name='option_price[" + data_id + "][]'>" +
                            "</td>" +
                            "<td>" +
                            "<select class='break_space' name='weight_prefix[" + data_id + "][]'>" +
                            "<option>+</option>" +
                            "<option>-</option>" +
                            "</select>" +
                            "<input type='text' placeholder='weight' name='option_weight[" + data_id + "][]'/>" +
                            "</td>" +
                            "<td class='width_div'><i class='fa fa-minus-circle' aria-hidden='true' id='custom_button'></i></td>" +
                            "</tr>"
                            );

                    $.ajax({
                        url: "<?php echo Router::url(['controller' => 'sellerDashboards/option_desc']) ?>",
                        type: "post",
                        data: {'id': data_id},
                        success: function (data) {
                            var value = JSON.parse(data);
                            var html_data = "<select id='select_id" + (p - 1) + "' name='option_name[" + data_id + "][]'>";
                            for (var i = 0; i < value.length; i++) {
                                html_data += "<option value=" + value[i].option_description.option_desc_id + ">" + value[i].option_description.option_desc_name + "</option>";
                            }
                            html_data += "</select>";
                            $("#select_id" + (p - 1) + "").replaceWith(html_data);
                        }
                    });
                    p++;
                });
                a++;
            });
        });
    </script>

    <script>
        function valueData(id) {
            //$("#pro_opt").modal("show");
            if (confirm("Are you sure")) {
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'sellerDashboards/delete_product_option']) ?>",
                    type: "post",
                    data: {"opt_id": id},
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        }
    </script>        

    <script>
        var p1 = 0;
        function addValue(pro_id) {
            $(".append_div_data" + pro_id + "").append(
                    "<tr class='input_type_new'>" +
                    "<td>" +
                    "<select id='select_id" + pro_id + "" + p1 + "' name='option_name[" + pro_id + "][]'>" +
                    "</select>" +
                    "</td>" +
                    "<td>" +
                    "<input type='text' placeholder='quantity' name='option_quantity[" + pro_id + "][]'>" +
                    "</td>" +
                    "<td>" +
                    "<select name='stock[" + pro_id + "][]'>" +
                    "<option>Yes</option>" +
                    "<option>No</option>" +
                    "</select>" +
                    "</td>" +
                    "<td>" +
                    "<select class='break_space' name='price_prefix[" + pro_id + "][]'>" +
                    "<option>+</option>" +
                    "<option>-</option>" +
                    "</select>" +
                    "<input type='text' placeholder='price' name='option_price[" + pro_id + "][]'>" +
                    "</td>" +
                    "<td>" +
                    "<select class='break_space' name='weight_prefix[" + pro_id + "][]'>" +
                    "<option>+</option>" +
                    "<option>-</option>" +
                    "</select>" +
                    "<input type='text' placeholder='weight' name='option_weight[" + pro_id + "][]'/>" +
                    "</td>" +
                    "<td class='width_div'><i class='fa fa-minus-circle' aria-hidden='true' id='custom_button'></i></td>" +
                    "</tr>"
                    );
            $.ajax({
                url: "<?php echo Router::url(['controller' => 'sellerDashboards/option_desc']) ?>",
                type: "post",
                data: {'id': pro_id},
                success: function (data) {
                    var value = JSON.parse(data);
                    var html_data = "<select id='select_id" + pro_id + "" + (p1 - 1) + "' name='option_name[" + pro_id + "][]'>";
                    for (var i = 0; i < value.length; i++) {
                        html_data += "<option value=" + value[i].option_description.option_desc_id + ">" + value[i].option_description.option_desc_name + "</option>";
                    }
                    html_data += "</select>";
                    $("#select_id" + pro_id + "" + (p1 - 1) + "").replaceWith(html_data);
                }
            });
            p1++;
        }
    </script>    

    <script>
        function delete_desc(id) {
            //$("#pro_opt").modal("show");
            if (confirm("Are you sure")) {
                $.ajax({
                    url: "<?php echo Router::url(['controller' => 'sellerDashboards/delete_product_desc']) ?>",
                    type: "post",
                    data: {"opt_desc_id": id},
                    success: function (data) {
                        location.reload();
                    }
                });
            }
        }
    </script> 

    <script>
        $('.main_category').change(function () {
            var cat = $(this).val();
            $.ajax({
                url: "<?php echo Router::url(['controller' => 'sellerDashboards/change_category']) ?>",
                type: "POST",
                data: {'category_id': cat},
                success: function (data) {
                    if (data.length > 0) {
                        var response = JSON.parse(data);
                        var data_length = response.length;
                        var html = '<select name="category" class="sub_category">';
                        html += '<option value="">Select Sub Category</option>';
                        for (var i = 0; i < data_length; i++) {
                            html += '<option value=' + response[i].category_desc.category_id + '>' + response[i].category_desc.name + '</option>';
                        }
                        html += "</select>";
                        $('.sub_category').replaceWith(html);
                    }
                    if (data == 0) {
                        var html1 = '<select name="category" class="sub_category">';
                        html1 += '<option value="">Select Category First</option>';
                        html1 += '</select>';
                        $('.sub_category').replaceWith(html1);
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            var main_cat = '<?php echo $result['product']['main_category'] ?>';
            var sub_cat = '<?php echo $result['product']['category'] ?>';
            $.ajax({
                url: "<?php echo Router::url(['controller' => 'sellerDashboards/change_category']) ?>",
                type: "POST",
                data: {'category_id': main_cat},
                success: function (data) {
                    if (data.length > 0) {
                        var response = JSON.parse(data);
                        var data_length = response.length;
                        var html = '<select name="category" class="sub_category">';
                        html += '<option value="">Select Sub Category</option>';
                        for (var i = 0; i < data_length; i++) {
                            if (sub_cat == response[i].category_desc.category_id) {
                                html += '<option value=' + response[i].category_desc.category_id + ' selected>' + response[i].category_desc.name + '</option>';
                            } else {
                                html += '<option value=' + response[i].category_desc.category_id + '>' + response[i].category_desc.name + '</option>';
                            }
                        }
                        html += "</select>";
                        $('.sub_category').replaceWith(html);
                    }
                    if (data == 0) {
                        var html1 = '<select name="category" class="sub_category">';
                        html1 += '<option value="">Select Category First</option>';
                        html1 += '</select>';
                        $('.sub_category').replaceWith(html1);
                    }
                }
            });
        });
    </script>

        <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>  
        <?php echo $this->Html->script('sellerDashboard/colorpicker-colors.js') ?>
        <?php echo $this->Html->script('sellerDashboard/colorpicker.js') ?>               
       <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
       <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

</body>
</html>