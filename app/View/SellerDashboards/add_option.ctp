
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
        <?php echo $this->Html->css('sellerDashboard/add_option.css') ?>
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
                            <a href='product_info.html'><span class="icon-Product_info"></span> Product Information
                            </a>
                        </li>
                        <li>
                            <a href='option.html'  class='active_page'><span class="fa fa-tasks"></span> Option
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
                    <div class='container-fluid'>
                        <div class='row bg_use_div_option'>
                            <h1><i class="fa fa-pencil" aria-hidden="true"></i> Add Option
                                <input type="submit" value="Save" class="btn btn-info right"/>
                            </h1>
                            <div class='form-group from_group_use_div'>

                                <label>
                                    <p>Option Name</p>
                                </label>
                                <label>
                                    <input type='text' placeholder='Option Name' name='option_name' required=""/>
                                </label>

                            </div>
                            <div class='form-group from_group_use_div'>

                                <label>
                                    <p>Type</p>
                                </label>
                                <label>
                                    <select name="option_type" required="">
                                        <option value="">Select</option>
                                        <option>Radio</option>
                                        <option>Checkbox</option>
                                        <option>Text</option>
                                        <option>TextArea</option>
                                    </select>
                                </label>

                            </div>
                            <div class='form-group from_group_use_div'>

                                <label>
                                    <p>Sort Order</p>
                                </label>
                                <label>
                                    <input type='text' placeholder='Sort Order'  name='option_sort' required=""/>
                                </label>

                            </div>

                            <table border="1" class="table_use">
                                <thead>
                                    <tr>    
                                        <th><h1 class='color_div_option'>Option Value Name</h1></th>
                                        <th><h1>Image</h1></th>
                                        <th><h1>Sort Order</h1></th>
                                        <th><h1>Add More</h1></th>
                                    </tr>
                                </thead>
                                <tbody class="append_div">
                                    <tr>
                                        <td>
                                            <input type='text' class='table_input' placeholder='Option Value Name' name='option_value[]' required=""/> 
                                        </td>
                                        <td>
                                            <input type='file' class='table_input' placeholder='Option Value Name' name='option_image[]'/> 
                                        </td>
                                        <td>
                                            <input type='rext' class='table_input' placeholder='Sort Order' name='sort_order[]'/>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>                                    
                                </tbody>
                                <tbody>
                                    <tr>
                                        <td colspan="4"><i class="fa fa-plus-circle plus_use pull-right" aria-hidden="true"></i></td>
                                    </tr>
                                </tbody>
                            </table>                              
                        </div>
                    </div>
                </form>    
            </div>
        </div>        

        <!-- custom first_page end -->
        <?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>
        
        <script>
            $(".plus_use").click(function () {
                $(".append_div").append(
                        "<tr>" +
                        "<td>" +
                        "<input type='text' class='table_input' placeholder='Option Value Name' name='option_value[]' required=''/>" +
                        "</td>" +
                        "<td>" +
                        "<input type='file' class='table_input' placeholder='Option Value Name' name='option_image[]'/>" +
                        "</td>" +
                        "<td>" +
                        "<input type='rext' class='table_input' placeholder='Sort Order' name='sort_order[]'/>" +
                        "</td>" +
                        "<td>" +
                        "<i class='fa fa-minus-circle circle' class='table_input' id='remove_div' aria-hidden='true'></i>" +
                        "</td>" +
                        "</tr>"
                        );
            });
        </script>

        <script>
            $(document).on('click', '#remove_div', function () {
                $(this).closest('tr').remove();
                return false;
            });
        </script>

    <?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>      
    <?php echo $this->Html->script('sellerDashboard/custom.js') ?>
    <?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

    </body>
</html>