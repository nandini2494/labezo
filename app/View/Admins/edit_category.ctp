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
                            <a href='Category_Manage.html' class="active"><span class="icon-1"></span> Category Manager
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
                    <div class='new_div_max_use'>
                        <form method="post" enctype="multipart/form-data">
                            <h2>Edit Category</h2>
                        <?php foreach ($data as $result) { ?>
                            <input type="hidden" name="cat_img" value="<?php echo $result['category']['category_image'] ?>">
                            <div class='form-group custom'>
                                <p>Name</p>
                                <label>
                                    <input type='text' name='cat_name' placeholder="Category Name" required="" value="<?php echo $result['category_desc']['name'] ?>"/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Description</p>
                                <label>
                                    <textarea name='description' placeholder="Description"><?php echo $result['category_desc']['description'] ?></textarea> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Title</p>
                                <label>
                                    <input type='text' name='title' placeholder="Title" value="<?php echo $result['category_desc']['title'] ?>"/> 
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Meta Description</p>
                                <label>
                                    <textarea name='meta_description' placeholder="Meta Description"><?php echo $result['category_desc']['meta_description'] ?></textarea>  
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Meta Keyword</p>
                                <label>
                                    <input type="text" name='meta_keyword' placeholder="Meta Keyword" value="<?php echo $result['category_desc']['meta_keyword'] ?>"/>  
                                </label>
                            </div>
                            <div class='form-group custom'>
                                <p>Image</p>
                            <?php if($result['category']['category_image']) { ?>
                                <img class="img_use_form_inner" src="<?php echo DOMAIN_NAME ?><?php echo $result['category']['category_image'] ?>">
                            <?php } ?>
                                <label>
                                    <input type="file" name="category_img" class="file_use_div">  
                                </label>
                            </div><div class='clearfix'></div>
                            <div class='form-group custom'>
                                <p>Parent</p>
                                <label>
                                    <select name="parent_id">
                                        <option value="">Select Parent Category</option>
                                        <?php foreach($value as $values) { ?>
                                        <option value="<?php echo $values['category_desc']['category_id'] ?>" <?php echo ($values['category_desc']['category_id'] == $result['category']['parent_id'] ? 'selected="selected"' : '') ?>><?php echo $values['category_desc']['name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                                <div class='clearfix'></div>
                            </div>
                            <div class='clearfix'></div>
                            <div class='form-group custom'>
                                <p>Status</p>
                                <label>
                                    <select name="status" required="">
                                        <option value="">Select Status</option>
                                        <option value="1" <?php echo ($result['category_desc']['status'] == '1' ? 'selected="selected"' : '') ?>>Enable</option>
                                        <option value="0" <?php echo ($result['category_desc']['status'] == '0' ? 'selected="selected"' : '') ?>>Disable</option>                                    
                                    </select>
                                </label>
                            </div>
                        <?php } ?>
                            <div class='form-group custom'>                            
                                <input class="btn btn-primary button_save" type="submit" name="submit" value="Save"/>
                            </div>
                        </form>
                    </div>


                </div></div>
        </div>
    </div>
    <div class='clearfix'></div>
</div>



<!-- custom first_page end -->
<?php echo $this->Html->script('admin/latest_jquery.js') ?>	
<script>
    $(function () {

        $('.form-group.-animated .form-control, .form-group.-overlayed .form-control').keyup(function (event) {
            if ($(this).val() != '') {
                $(this).parent('.form-group').addClass('-active');
            } else {
                $(this).parent('.form-group').removeClass('-active');
            }
        });

        $('.form-group.-animated .form-control, .form-group.-overlayed .form-control').focusin(function (event) {
            $(this).parent('.form-group').addClass('-focus');
        });

        $('.form-group.-animated .form-control, .form-group.-overlayed .form-control').focusout(function (event) {
            $(this).parent('.form-group').removeClass('-focus');
        });

    })
</script>

<script>
    $("#modal1").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo Router:: url(['controller' => 'admins/add_menu']) ?>",
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
    function editData(id, menu_name, total_product, img) {
        $("#menu_id").val(id);
        $("#menu_name").val(menu_name);
        $("#total_product").val(total_product);
        $("#user_pic").val(img);
        $("#edit").modal('show');
    }
</script>

<script>
    function deleteData(id) {
        $("#user_id").val(id);
        $("#delete").modal('show');
    }
</script>

<script>
    $("#edit1").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo Router::url(['controller' => 'admins/edit_menu']) ?>",
            type: "POST",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                //alert(data);
                location.reload();
            }
        });
    });
</script>

<script>
    $("#delete_modal").submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo Router::url(['controller' => 'admins/delete_menu']) ?>",
            type: "POST",
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                //alert(data);
                location.reload();
            }
        });
    });
</script>

<?php echo $this->Html->script('admin/old_jauery.js') ?>
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<?php echo $this->Html->script('admin/scripts.js') ?>
<?php echo $this->Html->script('admin/dcalendar.picker.js') ?>
<?php echo $this->Html->script('admin/custom.js') ?>
<?php echo $this->Html->script('admin/bootstrap.min.js') ?>

</body>
</html>