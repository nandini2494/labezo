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
                                Return Orders
                            </a>
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
                                                </a>
                                            </li>

                                            <li><a href="#doner" data-toggle="tab" title="Option">
                                                    <span class="round-tabs five">
                                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home">

                                            <h3 class="head text-center">General</h3>
                                            <div class='form_container'>
                                                <div class='form-group'>
                                                    <h4>Product Name</h4>
                                                    <label>
                                                        <input type='text' placeholder="Product Name" name='product_name' />
                                                    </label><div class='clearfix'></div>
                                                    <h4>Description</h4>
                                                    <textarea rows='5' placeholder="Decription" name='description'></textarea>
                                                    <h4>Model</h4>
                                                    <label>
                                                        <input type='text' placeholder="Model" name='model' />
                                                    </label><div class='clearfix'></div> 

                                                    <h4>Price</h4>
                                                    <label>
                                                        <input type='text' placeholder="Price" name='price' />
                                                    </label><div class='clearfix'></div>
                                                    
                                                    <h4>Currency</h4>
                                                    <label>
                                                        <select name="currency" required="">
                                                            <option value="">--Select Currency--</option>
                                                            <option value="USD">USD</option>
                                                            <option value="EUR">EUR</option>
                                                            <option value="CAD">CAD</option>
                                                        </select>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Brand</h4>
                                                    <label>
                                                        <input type='text' placeholder="Brand" name='brand' />
                                                    </label><div class='clearfix'></div>

                                                    <h4>Quantity</h4>
                                                    <label>
                                                        <input type='text' placeholder="No. of Product" name='quantity' />
                                                    </label><div class='clearfix'></div>

                                                    <h4>Main Category</h4>
                                                    <label>
                                                        <select name="main_category" required="" class="main_category">
                                                            <option value="">Select Category</option>
                                                            <?php foreach ($category as $cate) { ?>
                                                            <option value="<?php echo $cate['category_desc']['category_id'] ?>"><?php echo $cate['category_desc']['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Sub Category</h4>
                                                    <label>
                                                        <select name="category" class="sub_category">
                                                            <option value="">Select Category First</option>
                                                        </select>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Status</h4>
                                                    <label>
                                                        <select name="status">
                                                            <option value="">Select</option>
                                                            <option value="1">Enabled</option>
                                                            <option value="0">Disabled</option>
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
                                                                    <td><img src="<?php echo DOMAIN_NAME ?>img/default.png" class="img_default"></td>
                                                                    <td>
                                                                        <input type='file' class='file_img' id='file_upload1' name='main_image'>
                                                                        <label for='file_upload1' class='button_upload'>Upload file</label>
                                                                    </td>
                                                                </tr>                                                                                                                              
                                                            </tbody>                                                   
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
                var a = 0;
                var p = 0;
                $('.li_use_div li').click(function () {
                    $("#option").append(
                            "<li class='list_val'><a data-toggle='tab' href='#tab_option" + a + "' class='anchor_val'><i class='fa fa-minus-circle anchor_val' id='remove_data' aria-hidden='true'></i>" + $(this).text() + "</a></li>"
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
                            "<tbody class='append_div_data" + a + "'>" +
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
                        $(".append_div_data" + (a - 1) + "").append(
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
                        if(data == 0){
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