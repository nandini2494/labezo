<?php

App::uses('Model', 'Model');

class SellerDashboardsModel extends Model {

    public function userProfile($user) {
        $this->useTable = "seller";
        $id = $user['id'];
        $sql = "SELECT * FROM seller WHERE id='$id'";
        $query = $this->query($sql);
        return $query;
    }

    public function updateProfile($update_data, $user) {
        $id = $user['id'];
        $this->useTable = "seller";
        @extract($update_data);
        if (!empty($_FILES['profile_pic']['name'])) {
            $image = $_FILES['profile_pic']['name'];
            $target = "img/" . $image;
            move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target);
        } else {
            $target = $user_pic;
        }
        $sql = "UPDATE seller SET name='$user_name',phone='$phone',address='$address',city='$city',country='$country',store_name='$store_name',brand_name='$brands',main_category='$main_category',main_url='$main_url',selling_on='$selling_on',street='$street',city2='$city2',contact_person='$contact_person',contact_phone='$contact_phone',sortation_center='$sortation_center',country2='$country2',company_name='$company_name',director_name='$director_name',reg_number='$reg_no',profile_pic='$target' WHERE id='$id'";
        $query = $this->query($sql);
        return TRUE;
    }
    
    public function viewCategory() {
        $this->useTable = 'category_desc';
        $sql = "SELECT category_desc.*,category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id != '0'";
        $query = $this->query($sql);
        return $query;
    }

    public function viewMainCategory() {
        $this->useTable = 'category_desc';
        $sql = "SELECT category_desc.*,category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id = '0'";
        $query = $this->query($sql);
        return $query;
    }
    
    public function viewSubCategory($id) {
        $this->useTable = 'category_desc';
        if($id != '') {
        $sql = "SELECT category_desc.*,category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id = '$id'";
        $query = $this->query($sql);
        return json_encode($query);
        } else {
            return 0;
        }
    }

    public function viewProduct($user) {
        $this->useTable = "product";
        $seller_id = $user['id'];
        $sql = "SELECT * FROM product WHERE seller_id='$seller_id'";
        $query = $this->query($sql);
        return $query;
    }

    public function productList($id) {
        $this->useTable = "product";
        $data['product'] = $this->query("SELECT * FROM product WHERE product_id='$id'");
        $data['images'] = $this->query("SELECT * FROM image_desc WHERE product_id='$id'");
        $data['option'] = $this->query("SELECT product_option.*, option_name.* FROM product_option INNER JOIN option_name ON product_option.option_id=option_name.option_id WHERE product_option.product_id='$id' GROUP BY option_name.option_id");
        $data['option_desc'] = $this->query("SELECT * FROM product_option WHERE product_id='$id'");
        $data['option_name'] = $this->query("SELECT * FROM option_description");
        return $data;
    }

    public function addProduct($data, $user) {
        $this->useTable = "product";
        $seller_id = $user['id'];
        @extract($data);
        $size = getimagesize($_FILES['main_image']['tmp_name']);
        if (!empty($_FILES['main_image']['name'])) {
            if ($_FILES['main_image']['size'] <= '50000' && $size[0] == '300' && $size[1] == '400') {
                $main_tmp = "img/" . $_FILES['main_image']['name'];
                move_uploaded_file($_FILES['main_image']['tmp_name'], "img/" . $_FILES['main_image']['name']);
            }
        } else {
            $main_tmp = "";
        }
        $sql = "INSERT INTO product SET product_model='$model',product_name='$product_name',product_desc='$description',price='$price',currency='$currency',brand='$brand',quantity='$quantity',image='$main_tmp',main_category='$main_category',category='$category',seller_id='$seller_id',status='$status'";
        $this->query($sql);
        $sql2 = "SELECT * FROM product ORDER BY product_id DESC LIMIT 1";
        $query = $this->query($sql2);
        foreach ($query as $value) {
            $id = $value['product']['product_id'];
        }
        for ($i = 0; $i < count($_FILES['product_image']['tmp_name']); $i++) {
            $size = $_FILES['product_image']['tmp_name'][$i];
            if (!empty($_FILES['product_image']['name'][$i])) {
                if ($_FILES['product_image']['size'][$i] <= '50000' && $size[0] == '800' && $size[1] == '1000') {
                    $image_tmp = "img/" . $_FILES['product_image']['name'][$i];
                    move_uploaded_file($_FILES['product_image']['tmp_name'][$i], "img/" . $_FILES['product_image']['name'][$i]);
                }
            } else {
                $image_tmp = "";
            }
            $sql3 = "INSERT INTO image_desc SET product_id='$id',product_image='$image_tmp'";
            $this->query($sql3);
        }

        for ($j = 0; $j < count($option_id); $j++) {
            $option_id_tmp = $option_id[$j];
            $require_tmp = $require[$j];
            for ($k = 0; $k < count($option_name[$option_id_tmp]); $k++) {
                $option_name_tmp = $option_name[$option_id_tmp][$k];
                $option_quantity_tmp = $option_quantity[$option_id_tmp][$k];
                $stock_tmp = $stock[$option_id_tmp][$k];
                $price_prefix_tmp = $price_prefix[$option_id_tmp][$k];
                $option_price_tmp = $option_price[$option_id_tmp][$k];
                $weight_prefix_tmp = $weight_prefix[$option_id_tmp][$k];
                $option_weight_tmp = $option_weight[$option_id_tmp][$k];
                $sql4 = "INSERT INTO product_option SET product_id='$id',option_id='$option_id_tmp',require_val='$require_tmp',option_desc_id='$option_name_tmp',option_quantity='$option_quantity_tmp',option_stock_sub='$stock_tmp',option_price='$option_price_tmp',option_price_prefix='$price_prefix_tmp',option_weight='$option_weight_tmp',option_weight_prefix='$weight_prefix_tmp'";
                $this->query($sql4);
            }
        }
    }

    public function editProduct($data, $id) {
        $this->useTable = "product";
        @extract($data);
        $size = getimagesize($_FILES['main_image']['tmp_name']);
        if (!empty($_FILES['main_image']['name'])) {
            if ($_FILES['main_image']['size'] <= '50000' && $size[0] == '300' && $size[1] == '400') {
                $main_tmp = "img/" . $_FILES['main_image']['name'];
                move_uploaded_file($_FILES['main_image']['tmp_name'], "img/" . $_FILES['main_image']['name']);
            }
        } else {
            $main_tmp = "$image_hidden";
        }
        $sql = "UPDATE product SET product_model='$model',product_name='$product_name',product_desc='$description',price='$price',currency='$currency',brand='$brand',quantity='$quantity',image='$main_tmp',main_category='$main_category',category='$category',status='$status' WHERE product_id='$id'";
        $this->query($sql);
        for ($i = 0; $i < count($img_id); $i++) {
            $size2 = getimagesize($_FILES['product_image1']['tmp_name'][$i]);
            if (!empty($_FILES['product_image1']['name'][$i])) {
                if ($_FILES['product_image1']['size'][$i] <= '50000' && $size2[0] == '800' && $size2[1] == '1000') {
                    $image_tmp = "img/" . $_FILES['product_image1']['name'][$i];
                    move_uploaded_file($_FILES['product_image1']['tmp_name'][$i], "img/" . $_FILES['product_image1']['name'][$i]);
                }
            } else {
                $image_tmp = $add_img_hidden[$i];
            }
            $add_img_id_tmp = $img_id[$i];
            $sql1 = "UPDATE image_desc SET product_image='$image_tmp' WHERE image_id='$add_img_id_tmp'";
            $this->query($sql1);
        }
        for ($j = 0; $j < count($_FILES['product_image']['name']); $j++) {
            $size3 = getimagesize($_FILES['product_image']['tmp_name'][$j]);
            if (!empty($_FILES['product_image']['name'][$j])) {
                if ($_FILES['product_image']['size'][$j] <= '50000' && $size3[0] == '800' && $size3[1] == '1000') {
                    $image_tmp1 = "img/" . $_FILES['product_image']['name'][$j];
                    move_uploaded_file($_FILES['product_image']['tmp_name'][$j], "img/" . $_FILES['product_image']['name'][$j]);
                }
            } else {
                $image_tmp1 = "";
            }
            $sql2 = "INSERT INTO image_desc SET product_image='$image_tmp1', product_id='$id'";
            $this->query($sql2);
        }
        for ($k = 0; $k < count($option_id1); $k++) {
            $option_id1_tmp = $option_id1[$k];
            $require1_tmp = $require1[$k];
            for ($l = 0; $l < count($option_name1[$option_id1_tmp]); $l++) {
                $pro_desc_id_tmp = $pro_desc_id[$option_id1_tmp][$l];
                $option_name1_tmp = $option_name1[$option_id1_tmp][$l];
                $option_quantity1_tmp = $option_quantity1[$option_id1_tmp][$l];
                $stock1_tmp = $stock1[$option_id1_tmp][$l];
                $option_price1_tmp = $option_price1[$option_id1_tmp][$l];
                $price_prefix1_tmp = $price_prefix1[$option_id1_tmp][$l];
                $weight_prefix1_tmp = $weight_prefix1[$option_id1_tmp][$l];
                $option_weight1_tmp = $option_weight1[$option_id1_tmp][$l];
                $sql3 = "UPDATE product_option SET require_val='$require1_tmp',option_desc_id='$option_name1_tmp',option_quantity='$option_quantity1_tmp',option_stock_sub='$stock1_tmp',option_price='$option_price1_tmp',option_price_prefix='$price_prefix1_tmp',option_weight='$option_weight1_tmp',option_weight_prefix='$weight_prefix1_tmp' WHERE product_op_id='$pro_desc_id_tmp'";
                $this->query($sql3);
            }
            for ($m = 0; $m < count($option_name[$option_id1_tmp]); $m++) {
                $option_name_tmp = $option_name[$option_id1_tmp][$m];
                $option_quantity_tmp = $option_quantity[$option_id1_tmp][$m];
                $stock_tmp = $stock[$option_id1_tmp][$m];
                $option_price_tmp = $option_price[$option_id1_tmp][$m];
                $price_prefix_tmp = $price_prefix[$option_id1_tmp][$m];
                $weight_prefix_tmp = $weight_prefix[$option_id1_tmp][$m];
                $option_weight_tmp = $option_weight[$option_id1_tmp][$m];
                $sql4 = "INSERT INTO product_option SET product_id='$id',option_id='$option_id1_tmp',require_val='$require1_tmp',option_desc_id='$option_name_tmp',option_quantity='$option_quantity_tmp',option_stock_sub='$stock_tmp',option_price='$option_price_tmp',option_price_prefix='$price_prefix_tmp',option_weight='$option_weight_tmp',option_weight_prefix='$weight_prefix_tmp'";
                $this->query($sql4);
            }
        }
        for ($p = 0; $p < count($option_id); $p++) {
            $option_id_tmp = $option_id[$p];
            $require_tmp = $require[$p];
            for ($q = 0; $q < count($option_name[$option_id_tmp]); $q++) {
                $option_name_tmp = $option_name[$option_id_tmp][$q];
                $option_quantity_tmp = $option_quantity[$option_id_tmp][$q];
                $stock_tmp = $stock[$option_id_tmp][$q];
                $option_price_tmp = $option_price[$option_id_tmp][$q];
                $price_prefix_tmp = $price_prefix[$option_id_tmp][$q];
                $weight_prefix_tmp = $weight_prefix[$option_id_tmp][$q];
                $option_weight_tmp = $option_weight[$option_id_tmp][$q];
                $sql5 = "INSERT INTO product_option SET product_id='$id',option_id='$option_id_tmp',require_val='$require_tmp',option_desc_id='$option_name_tmp',option_quantity='$option_quantity_tmp',option_stock_sub='$stock_tmp',option_price='$option_price_tmp',option_price_prefix='$price_prefix_tmp',option_weight='$option_weight_tmp',option_weight_prefix='$weight_prefix_tmp'";
                $this->query($sql5);
            }
        }
    }

    public function deleteProduct($data) {
        $this->useTable = "product";
        @extract($data);
        $sql = "DELETE FROM product WHERE product_id='$product_id3'";
        $this->query($sql);
        $sql = "DELETE FROM product_option WHERE product_id='$product_id3'";
        $this->query($sql);
        $sql = "DELETE FROM image_desc WHERE product_id='$product_id3'";
        $this->query($sql);
    }

    public function addOption($data) {
        $this->useTable = "option_name";
        @extract($data);
        $sql = "INSERT INTO option_name SET option_name='$option_name', sort_order='$option_sort', option_type='$option_type'";
        $this->query($sql);
        $sql2 = "SELECT * FROM option_name ORDER BY option_id DESC LIMIT 1";
        $query = $this->query($sql2);
        foreach ($query as $value) {
            $id = $value['option_name']['option_id'];
        }
        for ($i = 0; $i < count($option_value); $i++) {
            $op_val_tmp = $option_value[$i];
            if (!empty($_FILES['option_image']['name'][$i])) {
                $op_img_tmp = "img/" . $_FILES['option_image']['name'][$i];
                move_uploaded_file($_FILES['option_image']['tmp_name'][$i], "img/" . $_FILES['option_image']['name'][$i]);
            } else {
                $op_img_tmp = "";
            }
            $sort_order_tmp = $sort_order[$i];
            $sql1 = "INSERT INTO option_description SET option_id='$id', option_desc_name='$op_val_tmp', option_desc_sort='$sort_order_tmp', option_image='$op_img_tmp'";
            $this->query($sql1);
        }
    }

    public function viewOption() {
        $this->useTable = "option_name";
        $sql = "SELECT * FROM option_name";
        $query = $this->query($sql);
        return $query;
    }

    public function option_view($id) {
        $this->useTable = "option_description";
        $sql = "SELECT * FROM option_description WHERE option_id='$id'";
        $query = $this->query($sql);
        return $query;
    }

    public function viewOption_edit($id) {
        $this->useTable = "option_name";
        //$sql = "SELECT GROUP_CONCAT(option_name.option_name),GROUP_CONCAT(option_name.sort_order),GROUP_CONCAT(option_name.option_type),GROUP_CONCAT(option_description.option_desc_name),GROUP_CONCAT(option_description.option_desc_sort),GROUP_CONCAT(option_description.option_image),GROUP_CONCAT(option_description.option_desc_id) FROM option_name INNER JOIN option_description ON option_name.option_id = option_description.option_id WHERE option_name.option_id = '$id'";
        $sql['name'] = $this->query("SELECT * FROM option_name WHERE option_id='$id'");
        $sql['description'] = $this->query("SELECT * FROM option_description WHERE option_id='$id'");
        return $sql;
    }

    public function editOption($data, $id) {
        $this->useTable = "option_name";
        @extract($data);
        $sql = "UPDATE option_name SET option_name='$option_name',sort_order='$option_sort',option_type='$option_type' WHERE option_id='$id'";
        $this->query($sql);
        for ($i = 0; $i < $count; $i++) {
            if (!empty($_FILES['option_image']['name'][$i])) {
                $op_img_tmp = "img/" . $_FILES['option_image']['name'][$i];
                move_uploaded_file($_FILES['option_image']['tmp_name'][$i], "img/" . $_FILES['option_image']['name'][$i]);
            } else {
                $op_img_tmp = $image[$i];
            }
            $op_desc_name = $option_value[$i];
            $op_desc_sort = $sort_order[$i];
            $desc_id_tmp = $desc_id[$i];
            $sql1 = "UPDATE option_description SET option_desc_name='$op_desc_name',option_desc_sort='$op_desc_sort',option_image='$op_img_tmp' WHERE option_desc_id='$desc_id_tmp'";
            $this->query($sql1);
        }

        for ($j = 0; $j < count($default_id); $j++) {
            if ($default_id[$j] == 'default') {
                $op_val_tmp1 = $option_value1[$j];
                if (!empty($_FILES['option_image1']['name'][$j])) {
                    $op_img_tmp1 = "img/" . $_FILES['option_image1']['name'][$j];
                    move_uploaded_file($_FILES['option_image1']['tmp_name'][$j], "img/" . $_FILES['option_image1']['name'][$j]);
                } else {
                    $op_img_tmp1 = "";
                }
                $sort_order_tmp1 = $sort_order1[$j];
                $sql3 = "INSERT option_description SET option_desc_name='$op_val_tmp1',option_desc_sort='$sort_order_tmp1',option_image='$op_img_tmp1',option_id='$id'";
                $this->query($sql3);
            }
        }
    }

    public function deleteOption($data) {
        $this->useTable = "option_name";
        @extract($data);
        $sql = "DELETE FROM option_name WHERE option_id='$option_id'";
        $sql1 = "DELETE FROM option_description WHERE option_id='$option_id'";
        $this->query($sql);
        $this->query($sql1);
        return TRUE;
    }

    public function deleteProductOption($opt_id) {
        $this->useTable = "product_option";
        $sql = "DELETE FROM product_option WHERE option_id='$opt_id'";
        $this->query($sql);
    }

    public function deleteProductDesc($opt_desc_id) {
        $this->useTable = "product_option";
        $sql = "DELETE FROM product_option WHERE product_op_id='$opt_desc_id'";
        $this->query($sql);
    }

    public function deleteOptionDesc($opt_desc) {
        $this->useTable = "option_description";
        $sql = "DELETE FROM option_description WHERE option_desc_id='$opt_desc'";
        $this->query($sql);
    }

    public function ratingView() {
        $this->useTable = "review";
        $sql = "SELECT review.*, product.image FROM review INNER JOIN product ON review.product_id = product.product_id";
        return $this->query($sql);
    }

    public function orderDetails($user) {
        $this->useTable = "product_order";
        $seller_id = $user['id'];
        $sql['product_order'] = $this->query("SELECT product_order.*, shipping_address.*, product.*, seller.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product_order.product_id = product.product_id INNER JOIN seller ON product.seller_id = seller.id WHERE product_order.order_deliver_status = '' && seller.id = '$seller_id' ORDER BY product_order.id DESC");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_description'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function addOffer($data, $user) {
        $this->useTable = "set_offer";
        @extract($data);
        $user_id = $user['id'];
        $sql1 = "SELECT * FROM set_offer WHERE product_id = $product_name";
        $query1 = $this->query($sql1);
        if (count($query1) > 0) {
            $sql2 = "UPDATE set_offer SET product_id='$product_name',seller_id='$user_id',offer_type='$offer_type',offer_amount='$offer_amount',to_date='$to_date',from_date='$from_date' WHERE product_id='$product_name'";
            $this->query($sql2);
        } else {
            $sql = "INSERT INTO set_offer SET product_id='$product_name',seller_id='$user_id',offer_type='$offer_type',offer_amount='$offer_amount',to_date='$to_date',from_date='$from_date'";
            $this->query($sql);
        }
    }

    public function setOffer($user) {
        $this->useTable = "set_offer";
        $user_id = $user['id'];
        $sql = "SELECT set_offer.*, product.* FROM set_offer INNER JOIN product ON set_offer.product_id = product.product_id WHERE set_offer.seller_id = '$user_id'";
        return $this->query($sql);
    }

    public function viewOffer($id) {
        $this->useTable = "set_offer";
        $sql = "SELECT * FROM set_offer WHERE id='$id'";
        return $this->query($sql);
    }

    public function editOffer($data, $id) {
        $this->useTable = "set_offer";
        @extract($data);
        $sql = "UPDATE set_offer SET product_id='$product_name',offer_type='$offer_type',offer_amount='$offer_amount',to_date='$to_date',from_date='$from_date' WHERE id = '$id'";
        $this->query($sql);
    }

    public function deleteOffer($data) {
        $this->useTable = "set_offer";
        @extract($data);
        $sql = "DELETE FROM set_offer WHERE id = '$offer_data'";
        $this->query($sql);
    }

    public function updateOrderDeliver($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = "UPDATE product_order SET order_deliver_status = '$deliver_type' WHERE order_id='$order_id'";
        $this->query($sql);
    }

    public function orderDetailsSeller($user) {
        $this->useTable = "product_order";
        $seller_id = $user['id'];
        $sql['product_order'] = $this->query("SELECT product_order.*, shipping_address.*, seller.*,product.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product.product_id = product_order.product_id INNER JOIN seller ON seller.id = product.seller_id WHERE (product_order.order_deliver_status = 'By Me' || product_order.order_deliver_status = 'By Seller') && seller.id = '$seller_id' ORDER BY product_order.id DESC");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_description'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function orderDetailsLabaso($user) {
        $this->useTable = "product_order";
        $seller_id = $user['id'];
        $sql['product_order'] = $this->query("SELECT product_order.*, shipping_address.*, seller.*,product.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product.product_id = product_order.product_id INNER JOIN seller ON seller.id = product.seller_id WHERE (product_order.order_deliver_status = 'By Me' || product_order.order_deliver_status = 'By Seller') && seller.id = '$seller_id' && (product_order.order_status != 2) && (product_order.order_status != 6) ORDER BY product_order.id DESC");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_description'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function orderUpdateLabaso($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = "UPDATE product_order SET order_status='$order_status' WHERE id='$order_id'";
        $this->query($sql);
    }

    public function orderTrack($order_id) {
        $this->useTable = "product_order";
        $sql = "SELECT * FROM product_order WHERE order_id='$order_id'";
        return json_encode($this->query($sql));
    }

    public function searchProduct($data) {
        $this->useTable = "product";
        @extract($data);
        $sql = "SELECT * FROM product WHERE product_name = '$product_info' || product_id='$product_info' || product_model='$product_info' || brand='$product_info'";
        return $this->query($sql);
    }

    public function getProductShipped($data, $user) {
        $this->useTable = "product_order";
        @extract($data);
        $id = $user['id'];
        $sql = "SELECT product_order.*, shipping_address.*,option_description.*, seller.*,product.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product.product_id = product_order.product_id INNER JOIN seller ON seller.id = product.seller_id LEFT JOIN option_description ON product_order.product_option_desc = option_description.option_desc_id WHERE (product_order.order_deliver_status = 'By Me' || product_order.order_deliver_status = 'By Seller') && seller.id = '$id' && (product_order.order_id = '$product_info' || product_order.product_id='$product_info' || product_order.product_name='$product_info' || product_order.product_model='$product_info' || product_order.order_date='$product_info')";
        return $this->query($sql);
    }

    public function getProductOrder($data, $user) {
        $this->useTable = "product_order";
        @extract($data);
        $seller_id = $user['id'];
        $sql = "SELECT product_order.*, shipping_address.*,option_description.*, product.*, seller.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product_order.product_id = product.product_id INNER JOIN seller ON product.seller_id = seller.id LEFT JOIN option_description ON product_order.product_option_desc = option_description.option_desc_id WHERE product_order.order_deliver_status = '' && seller.id = '$seller_id' && (product_order.order_id = '$product_info' || product_order.order_date = '$product_info' || product_order.product_name = '$product_info' || product_order.product_model = '$product_info' || shipping_address.email = '$product_info' || shipping_address.mobile = '$product_info' || shipping_address.firstname = '$product_info')";
        return $this->query($sql);
    }

    public function getInfoLabaso($data, $user) {
        $this->useTable = "product_order";
        @extract($data);
        $seller_id = $user['id'];
        $sql = "SELECT product_order.*, shipping_address.*, product.*, option_description.*, seller.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product.product_id = product_order.product_id INNER JOIN seller ON product.seller_id = seller.id LEFT JOIN option_description.option_desc_id = product_order.product_option_desc WHERE (product_order.order_deliver_status = 'By Me' || product_order.order_deliver_status = 'By Seller') && seller.id = '$seller_id' && (product_order.order_id = '$product_info' || product_order.order_date = '$product_info' || product_order.product_name = '$product_info' || product_order.product_model = '$product_info' || shipping_address.email = '$product_info' || shipping_address.mobile = '$product_info') && product_order.order_status != '2'";
        return $this->query($sql);
    }

    public function getOfferInfo($data, $user) {
        $this->useTable = "set_offer";
        @extract($data);
        $seller_id = $user['id'];
        $sql = "SELECT set_offer.*, product.* FROM set_offer INNER JOIN product ON set_offer.product_id = product.product_id  WHERE (product.product_id='$offer_data' || product.product_name='$offer_data' || product.product_model='$offer_data' || set_offer.offer_type='$offer_data') && set_offer.seller_id='$seller_id'";
        return $this->query($sql);
    }
    
    public function countWishlist($user) {
        $this->useTable = "wishlist";
        $seller_id = $user['id'];
        $sql = "SELECT wishlist.product_id FROM product INNER JOIN wishlist ON product.product_id = wishlist.product_id WHERE product.seller_id = '$seller_id'";
        return count($this->query($sql));
    }
    
    public function countOrder($user) {
        $this->useTable = "product_order";
        $seller_id = $user['id'];
        $sql = "SELECT product_order.product_id FROM product_order INNER JOIN product ON product.product_id = product_order.product_id WHERE product.seller_id = '$seller_id' AND product_order.payment_status = 'Completed'";
        return count($this->query($sql));
    }
    
    public function totalAmount($user) {
        $this->useTable = "product_order";
        $seller_id = $user['id'];
        $sql = "SELECT SUM(product_order.payment_amount) FROM product_order INNER JOIN product ON product_order.product_id = product.product_id WHERE product.seller_id = '$seller_id' AND product_order.payment_status = 'Completed' GROUP BY product_order.order_id";
        return $this->query($sql);
    }
    
    public function returnProductSeller($user) {
        $this->useTable = "return_product";
        $seller_id = $user['id'];
        $sql = "SELECT return_product.*, product.*, buyer_register.*, product_order.* FROM return_product INNER JOIN product ON return_product.product_name = product.product_name INNER JOIN buyer_register ON return_product.user_id = buyer_register.id INNER JOIN product_order ON product_order.order_id = return_product.order_id WHERE product.seller_id = '$seller_id' AND product_order.order_deliver_status = 'By Me'";
        return $this->query($sql);
    }
    
    public function returnProductAdmin($user) {
        $this->useTable = "return_product";
        $seller_id = $user['id'];
        $sql = "SELECT return_product.*, product.*, buyer_register.*, product_order.* FROM return_product INNER JOIN product ON return_product.product_name = product.product_name INNER JOIN buyer_register ON return_product.user_id = buyer_register.id INNER JOIN product_order ON product_order.order_id = return_product.order_id WHERE product.seller_id = '$seller_id' AND product_order.order_deliver_status = 'By Labezo'";
        return $this->query($sql);
    }
    
    public function updateProduct($data) {
        $this->useTable = "return_product";
        @extract($data);
        $sql = "UPDATE return_product SET return_status = '$select_list' WHERE id = '$return_id'";
        $this->query($sql);
    }
    
    public function updateReturnOrder($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = $this->query("SELECT * FROM product WHERE product_name = '$product'");
        foreach ($sql as $row) {
            $product_id = $row['product']['product_id'];
        } 
        $sql1 = "UPDATE product_order SET order_status = '7' WHERE order_id = '$order_id' AND product_id = '$product_id'";
        $this->query($sql1);
    }
    
    public function userImage($user) {
        $id = $user['id'];
        $this->useTable = "seller";
        $sql = "SELECT * FROM seller WHERE id = '$id'";
        return $this->query($sql);
    }
 
}
