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
        <?php echo $this->Html->css('admin/add_product.css') ?>
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
                <form method="post" enctype="multipart/form-data">
                    
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
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#settings" data-toggle="tab" title="Image">
                                                    <span class="round-tabs four">
                                                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                    </span> 
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#doner" data-toggle="tab" title="
                                                   Option">
                                                    <span class="round-tabs five">
                                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                                    </span> 
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="home">
                                            <?php foreach ($results['product'] as $result) {  ?> 
                                            <h3 class="head text-center">General</h3>
                                            <div class='form_container'>
                                                <div class='form-group'>
                                                    <h4>Product Name</h4>
                                                    <label>
                                                        <input type='text' value="<?php echo $result['product']['product_name'] ?>" readonly=""/>
                                                    </label><div class='clearfix'></div>
                                                    <h4>Description</h4>
                                                    <textarea rows='5' readonly=""><?php echo $result['product']['product_desc'] ?></textarea>
                                                    <h4>Model</h4>
                                                    <label>
                                                        <input type='text' value="<?php echo $result['product']['product_model'] ?>" readonly=""/>
                                                    </label><div class='clearfix'></div> 

                                                    <h4>Price</h4>
                                                    <label>
                                                        <input type='text' readonly="" value="<?php echo $result['product']['price'] ?>"/>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Brand</h4>
                                                    <label>
                                                        <input type='text' readonly="" value="<?php echo $result['product']['brand'] ?>"/>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Quantity</h4>
                                                    <label>
                                                        <input type='text' readonly="" value="<?php echo $result['product']['quantity'] ?>"/>
                                                    </label><div class='clearfix'></div>
                                                    
                                                    <h4>Category</h4>
                                                    <label>
                                                        <select>
                                                            <?php foreach ($category as $cate) { ?>
                                                            <option value="<?php echo $cate['category_desc']['category_id'] ?>" <?php echo ($result['product']['category'] == $cate['category_desc']['category_id'] ? 'selected="selected"' : '') ?>><?php echo $cate['category_desc']['name'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </label><div class='clearfix'></div>

                                                    <h4>Status</h4>
                                                    <label>
                                                        <select>                                         
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
                                                                    <td class="border_use">
                                                                        <?php if(!empty($result['product']['image'])) { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?><?php echo $result['product']['image'] ?>" class="img_default">
                                                                        <?php } else { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?>img/default.png" class="img_default">
                                                                        <?php } ?>
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
                                                                    <td class="border_use">
                                                                        <input type="hidden" name="add_img_hidden[]" value="<?php echo $images['image_desc']['product_image'] ?>">
                                                                        <input type="hidden" name="img_id[]" value="<?php echo $images['image_desc']['image_id'] ?>">
                                                                        <?php if(!empty($images['image_desc']['product_image'])) { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?><?php echo $images['image_desc']['product_image'] ?>" class="img_default">
                                                                        <?php } else { ?>
                                                                        <img src="<?php echo DOMAIN_NAME ?>img/default.png" class="img_default">
                                                                        <?php } ?>
                                                                    </td>                                                                    
                                                                </tr> 
                                                                <?php } ?>                                                                                                                              
                                                            </tbody>     
                                                            <tbody>
                                                                
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
                                                            <?php $a1 = 0;
                                                            foreach($results['option'] as $option_val1) { ?>
                                                            <li class='list_val'><a data-toggle='tab' href='#tab_option<?php echo $a1 ?>' class='anchor_val'><i class='fa fa-minus-circle anchor_val' id='remove_data' aria-hidden='true' onclick='valueData("<?php echo $option_val1['option_name']['option_id'] ?>")'></i><?php echo $option_val1['option_name']['option_name'] ?></a></li>                                                            
                                                            <?php $a1++; } ?>
                                                        </ul>                                                                                                               
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
                                                                            <select>
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
                                                                                        <input type="text" value='<?php echo $opt_data['product_option']['option_quantity'] ?>' readonly="">
                                                                                    </td>
                                                                                    <td>
                                                                                        <select>
                                                                                            <option <?php echo ($opt_data['product_option']['option_stock_sub'] == 'Yes' ? 'selected="selected"' : '') ?>>Yes</option>
                                                                                            <option <?php echo ($opt_data['product_option']['option_stock_sub'] == 'No' ? 'selected="selected"' : '') ?>>No</option>
                                                                                        </select>
                                                                                    </td>
                                                                                    <td>
                                                                                        <select>
                                                                                            <option <?php echo ($opt_data['product_option']['option_price_prefix'] == '+' ? 'selected="selected"' : '') ?>>+</option>
                                                                                            <option <?php echo ($opt_data['product_option']['option_price_prefix'] == '-' ? 'selected="selected"' : '') ?>>-</option>
                                                                                        </select>
                                                                                        <input type='text' value="<?php echo $opt_data['product_option']['option_price'] ?>" readonly="">
                                                                                    </td>
                                                                                    <td class='width_div'>
                                                                                        <select class='break_space'>
                                                                                            <option <?php echo ($opt_data['product_option']['option_weight_prefix'] == '+' ? 'selected="selected"' : '') ?>>+</option>
                                                                                            <option <?php echo ($opt_data['product_option']['option_weight_prefix'] == '-' ? 'selected="selected"' : '') ?>>-</option>
                                                                                        </select>
                                                                                        <input type='text' value="<?php echo $opt_data['product_option']['option_weight'] ?>" readonly=""/>
                                                                                    </td>
                                                                                </tr> 
                                                                                <?php }  } ?>

                                                                            </tbody>
                                                                            <tbody>
                                                                                <tr class='bg_use_new_option'>
                                                                                    
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
        <div id="myModal_track" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Track Your Order</h4>
                    </div>
                    <div class="modal-body">
                        <div class='form-group'>
                            <label class='order_id_use'>Order Id</label><div class='clearfix'></div>
                            <span class='posit_use_over'><input type='text' name='text' placeholder='#0055'>
                                <button title='Go Now'>Track</button>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
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

        <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>  
        <?php echo $this->Html->script('sellerDashboard/colorpicker-colors.js') ?>
        <?php echo $this->Html->script('sellerDashboard/colorpicker.js') ?>               
        <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
        <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

    </body>
</html>
