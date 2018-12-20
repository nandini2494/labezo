<?php

App::uses('Model', 'Model');

class AdminsModel extends Model {

    public function login($data) {
        $this->useTable = "admin";
        @extract($data);
        $sql = "SELECT * FROM admin WHERE username='$username' && password='$password'";
        $query = $this->query($sql);
        if (count($query) > 0) {
            foreach ($query as $row) {
                $udata = array();
                $udata['id'] = $row['admin']['id'];
            }
            return $udata;
        } else {
            return 0;
        }
    }

    public function updateSeller($id) {
        $this->useTable = "seller";
        $sql = "UPDATE seller SET verify='1' WHERE id = '$id'";
        $this->query($sql);
        return TRUE;
    }

    public function sellerList() {
        $this->useTable = "seller";
        $sql = "SELECT * FROM seller WHERE verify='1'";
        $query = $this->query($sql);
        return $query;
    }

    public function newsellerList() {
        $this->useTable = "seller";
        $sql = "SELECT * FROM seller WHERE verify='0'";
        $query = $this->query($sql);
        return $query;
    }

    public function buyerList() {
        $this->useTable = "buyer_register";
        $sql = "SELECT * FROM buyer_register";
        $query = $this->query($sql);
        return $query;
    }

    public function viewCategory() {
        $this->useTable = "category_desc";
        $sql = "SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id";
        $query = $this->query($sql);
        return $query;
    }

    public function selectCategory($id) {
        $this->useTable = "category_desc";
        $sql = "SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category_desc.category_id!='$id'";
        $query = $this->query($sql);
        return $query;
    }

    public function addCategory($data) {
        $this->useTable = "category_desc";
        @extract($data);
        $cat_img = $_FILES['category_img']['name'];
        $target1 = "img/" . $cat_img;
        move_uploaded_file($_FILES['category_img']['tmp_name'], $target1);
        $sql = "INSERT INTO category_desc SET name='$cat_name',description='$description',title='$title',meta_description='$meta_description',meta_keyword='$meta_keyword',status='$status'";
        $sql1 = "INSERT INTO category SET category_image='$target1',parent_id='$parent_id',status='$status'";
        $this->query($sql);
        $this->query($sql1);
    }

    public function view_editCategory($id) {
        $this->useTable = "category_desc";
        $sql = "SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category_desc.category_id = '$id'";
        $query = $this->query($sql);
        return $query;
    }

    public function editCategory($data, $id) {
        $this->useTable = "category_desc";
        @extract($data);
        if (!empty($_FILES['category_img']['name'])) {
            $category_img = $_FILES['category_img']['name'];
            $target1 = "img/" . $category_img;
            move_uploaded_file($_FILES['category_img']['tmp_name'], $target1);
        } else {
            $target1 = $cat_img;
        }
        $sql = "UPDATE category_desc SET name='$cat_name',description='$description',title='$title',meta_description='$meta_description',meta_keyword='$meta_keyword',status='$status' WHERE category_id='$id'";
        $sql1 = "UPDATE category SET category_image='$target1',parent_id='$parent_id',status='$status' WHERE category_id='$id'";
        $this->query($sql);
        $this->query($sql1);
    }

    public function deleteCategory($data) {
        $this->useTable = "category_desc";
        @extract($data);
        $sql = "DELETE FROM category_desc WHERE category_id = '$cate_id'";
        $sql1 = "DELETE FROM category WHERE category_id = '$cate_id'";
        $this->query($sql);
        $this->query($sql1);
    }

    public function categoryName() {
        $this->useTable = "category";
        $sql = "SELECT * FROM category ";
        $query = $this->query($sql);
        return $query;
    }

    public function viewProduct() {
        $this->useTable = "product";
        $sql = "SELECT product.*, seller.* FROM product INNER JOIN seller ON product.seller_id = seller.id";
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

    public function orderDetails() {
        $this->useTable = "product_order";
        $sql['product_order'] = $this->query("SELECT product_order.*, shipping_address.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id WHERE product_order.order_status != '2' && product_order.order_status != '6' ORDER BY product_order.id DESC");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_description'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function setOffer() {
        $this->useTable = "set_offer";
        $sql = "SELECT set_offer.*, seller.*, product.* FROM set_offer INNER JOIN seller ON set_offer.seller_id = seller.id INNER JOIN product ON set_offer.product_id = product.product_id";
        return $this->query($sql);
    }

    public function orderDetailsUser() {
        $this->useTable = "product_order";
        $sql['product_order'] = $this->query("SELECT product_order.*, shipping_address.*,product.*,seller.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product.product_id = product_order.product_id INNER JOIN seller ON product.seller_id = seller.id WHERE product_order.order_deliver_status='By Labezo' ORDER BY product_order.id DESC");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_description'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function updateOrder($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = "UPDATE product_order SET order_deliver_status = '$order_status' WHERE order_id='$order_id'";
        $this->query($sql);
    }

    public function updateOrderAdmin($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = "UPDATE product_order SET order_status='$order_status' WHERE id = '$order_id'";
        $this->query($sql);
    }

    public function getOrder($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = $this->query("SELECT product_order.*, shipping_address.*, product.*, seller.*, option_description.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN product ON product_order.product_id = product.product_id INNER JOIN seller ON product.seller_id = seller.id LEFT JOIN option_description ON product_order.product_option_desc = option_description.option_desc_id WHERE (product_order.product_option_desc = option_description.option_desc_id && product_order.product_option = option_description.option_id) || (product_order.order_id = '$product_info' || product_order.product_id = '$product_info' || product_order.product_name = '$product_info' || product_order.product_model = '$product_info' || seller.name = '$product_info' || shipping_address.firstname = '$product_info' || shipping_address.email = '$product_info' || shipping_address.mobile = '$product_info') && (product_order.order_deliver_status = 'By Labezo')");
        return $sql;
    }

    public function getCategory($data) {
        $this->useTable = "category_desc";
        @extract($data);
        $sql = "SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category_desc.category_id = '$info' || category_desc.name = '$info'";
        return $this->query($sql);
    }

    public function getProductInfo($data) {
        $this->useTable = "product";
        @extract($data);
        $sql = "SELECT product.*, seller.*, category_desc.* FROM product INNER JOIN seller ON product.seller_id = seller.id INNER JOIN category_desc ON category_desc.category_id = product.category WHERE product.product_id = '$product_info' || product.product_model = '$product_info' || product.product_name = '$product_info' || product.brand = '$product_info' || product.price = '$product_info' || category_desc.name = '$product_info' || category_desc.category_id = '$product_info' || product.seller_id = '$product_info' || seller.name = '$product_info'";
        return $this->query($sql);
    }

    public function getShippingData($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = "SELECT product_order.*, shipping_address.*, option_description.* FROM product_order INNER JOIN shipping_address ON shipping_address.customer_id = product_order.customer_id LEFT JOIN option_description ON option_description.option_desc_id = product_order.product_option_desc WHERE (product_order.order_id = '$order_info' || product_order.product_name = '$order_info' || product_order.product_model = '$order_info' || shipping_address.email = '$order_info' || shipping_address.mobile = '$order_info' || option_description.option_desc_id = '$order_info' || option_description.option_desc_name = '$order_info') && product_order.order_deliver_status = ''";
        return $this->query($sql);
    }

    public function getOffer($data) {
        $this->useTable = "set_offer";
        @extract($data);
        $sql = "SELECT set_offer.*, seller.*, product.* FROM set_offer INNER JOIN seller ON set_offer.seller_id = seller.id INNER JOIN product ON set_offer.product_id = product.product_id WHERE set_offer.offer_type = '$product_info' || product.product_id = '$product_info' || product.product_model = '$product_info' || product.product_name = '$product_info' || product.price = '$product_info' || product.brand = '$product_info' || seller.id = '$product_info' || seller.name = '$product_info'";
        return $this->query($sql);
    }

    public function addCoupon($data) {
        $this->useTable = "set_coupon";
        @extract($data);
        $sql = "INSERT INTO set_coupon SET coupon_code='$coupon_code',amount='$amount',type='$type',to_date='$to_date',from_date='$from_date'";
        $this->query($sql);
        $sql1 = "SELECT * FROM set_coupon ORDER BY id desc LIMIT 1";
        return $this->query($sql1);
    }

    public function viewCoupon() {
        $this->useTable = "set_coupon";
        $sql = "SELECT set_coupon.* FROM set_coupon";
        return $this->query($sql);
    }

    public function viewCouponCode($id) {
        $this->useTable = "set_coupon";
        $sql = "SELECT * FROM set_coupon WHERE id='$id'";
        return $this->query($sql);
    }

    public function editCoupon($data, $id) {
        $this->useTable = "set_coupon";
        @extract($data);
        $sql = "UPDATE set_coupon SET coupon_code='$coupon_code',amount='$amount',type='$type',to_date='$to_date',from_date='$from_date' WHERE id='$id'";
        $this->query($sql);
    }

    public function deleteCoupon($data) {
        $this->useTable = "set_coupon";
        @extract($data);
        $sql = "DELETE FROM set_coupon WHERE id = '$coupon_data'";
        $this->query($sql);
    }

    public function getCoupon($data) {
        $this->useTable = "set_coupon";
        @extract($data);
        $sql = "SELECT * FROM set_coupon WHERE coupon_code = '$product_info' || amount = '$product_info' || type = '$product_info'";
        return $this->query($sql);
    }

    public function totalSales() {
        $this->useTable = "product_order";
        $sql = "SELECT * FROM product_order WHERE order_status = '6'";
        return count($this->query($sql));
    }

    public function totalSeller() {
        $this->useTable = "seller";
        $sql = "SELECT * FROM seller WHERE verify = '1'";
        return count($this->query($sql));
    }

    public function totalProducts() {
        $this->useTable = "product";
        $sql = "SELECT * FROM product";
        return count($this->query($sql));
    }

    public function totalSaleDate($data) {
        $this->useTable = "product_order";
        @extract($data);
        $from_date = date('Y-m-d', strtotime($from));
        $to_date = date('Y-m-d', strtotime($to));
        $sql = "SELECT * FROM product_order WHERE order_date >= '$from_date' AND order_date <= '$to_date' AND order_status = '6'";
        return count($this->query($sql));
    }

    public function totalSellerDate($data) {
        $this->useTable = "seller";
        @extract($data);
        $from_date = date('Y-m-d', strtotime($from));
        $to_date = date('Y-m-d', strtotime($to));
        $sql = "SELECT seller.id FROM product INNER JOIN seller ON product.seller_id = seller.id INNER JOIN product_order ON product_order.product_id = product.product_id WHERE product_order.order_date >= '$from_date' AND product_order.order_date <= '$to_date' AND product_order.order_status = '6' GROUP BY seller.id";
        return count($this->query($sql));
    }

    public function totalproduct($data) {
        $this->useTable = "product";
        @extract($data);
        $from_date = date('Y-m-d', strtotime($from));
        $to_date = date('Y-m-d', strtotime($to));
        $sql = "SELECT product.product_id FROM product INNER JOIN product_order ON product_order.product_id = product.product_id WHERE product_order.order_date >= '$from_date' AND product_order.order_date <= '$to_date' AND product_order.order_status = '6' GROUP BY product_order.product_id";
        return count($this->query($sql));
    }

    public function returnProductAdmin() {
        $this->useTable = "return_product";
        $sql = "SELECT return_product.*, product.*, seller.*, buyer_register.*, product_order.* FROM return_product INNER JOIN product ON return_product.product_name = product.product_name INNER JOIN seller ON product.seller_id = seller.id INNER JOIN buyer_register ON buyer_register.id = return_product.user_id INNER JOIN product_order ON  product_order.order_id = return_product.order_id WHERE product_order.order_deliver_status = 'By Labezo' ORDER BY return_product.id desc";
        return $this->query($sql);
    }

    public function returnProductSeller() {
        $this->useTable = "return_product";
        $sql = "SELECT return_product.*, product.*, seller.*, buyer_register.*, product_order.* FROM return_product INNER JOIN product ON return_product.product_name = product.product_name INNER JOIN seller ON product.seller_id = seller.id INNER JOIN buyer_register ON buyer_register.id = return_product.user_id INNER JOIN product_order ON  product_order.order_id = return_product.order_id WHERE product_order.order_deliver_status = 'By Me' ORDER BY return_product.id desc";
        return $this->query($sql);
    }

    public function updateReturn($data) {
        $this->useTable = "return_product";
        @extract($data);
        $sql = "UPDATE return_product SET return_status = '$select_list' WHERE id = '$return_id'";
        $this->query($sql);
    }

    public function updateReturnOrder($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql = $this->query("SELECT * FROM product WHERE product_name = '$product'");
        foreach ($sql as $data) {
            $product_id = $data['product']['product_id'];
        }
        $sql1 = "UPDATE product_order SET order_status = '7' WHERE order_id = '$order_id' AND product_id = '$product_id'";
        $this->query($sql1);
    }

    public function profileView($user) {
        $this->useTable = "admin";
        $id = $user['id'];
        $sql = "SELECT * FROM admin WHERE id = '$id'";
        return $this->query($sql);
    }

    public function editProfileData($data, $user) {
        $this->useTable = "admin";
        $id = $user['id'];
        @extract($data);
        if (!empty($_FILES['profile_pic_data']['name'])) {
            $image = $_FILES['profile_pic_data']['name'];
            $target = "img/" . $image;
            move_uploaded_file($_FILES['profile_pic_data']['tmp_name'], $target);
        } else {
            $target = $user_pic;
        }
        $sql = "UPDATE admin SET username = '$user_name', password = '$password', name = '$admin_name', email = '$email', phone = '$phone', profile_pic = '$target' WHERE id = '$id'";
        $this->query($sql);
    }

    public function deleteSeller($id) {
        $this->useTable = "seller";
        foreach ($id as $seller_id) {
            $sql = $this->query("DELETE FROM seller WHERE id='$seller_id'");
        }
    }

    public function viewBanner() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id = '1'");
        return $sql;
    }
    
    public function viewTopLeftImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id = '2'");
        return $sql;
    }
    
    public function viewTopRightImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id = '3'");
        return $sql;
    }
    
    public function viewBottomLeftImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id = '4'");
        return $sql;
    }
    
    public function viewBottomRightImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id = '5'");
        return $sql;
    }

    public function uploadTopBanner($data) {
        $this->useTable = "top_banner";
        @extract($data);
        $allowed_ext = array("jpg", "JPG", "JPEG", "jpeg", "png", "PNG");
        if ($position == 'top_banner') {
            $file_ext = pathinfo($_FILES['banner_image']['name'], PATHINFO_EXTENSION);
            if (!in_array($file_ext, $allowed_ext)) {
                $status = array("status" => 0, "msg" => "Wrong image format not supported..!");
                return $status;
            } else {
                if (!empty($_FILES['banner_image']['name'])) {
                    $image = $_FILES['banner_image']['name'];
                    $target = "img/" . $image;
                    move_uploaded_file($_FILES['banner_image']['tmp_name'], $target);
                } else {
                    $target = $banner;
                }
                $sql = $this->query("UPDATE top_banner SET banner_image='$target',discount='$discount',title='$title', position='top_banner' WHERE id='1'");
                $status = array("status" => 1, "url" => $target);
                return $status;
            }
        }
        
        if ($position == 'top_left') {
            $file_ext = pathinfo($_FILES['left_image']['name'], PATHINFO_EXTENSION);
            if (!in_array($file_ext, $allowed_ext)) {
                $status = array("status" => 0, "msg" => "Wrong image format not supported..!");
                return $status;
            } else {
                if (!empty($_FILES['left_image']['name'])) {
                    $image = $_FILES['left_image']['name'];
                    $target = "img/" . $image;
                    move_uploaded_file($_FILES['left_image']['tmp_name'], $target);
                } else {
                    $target = $banner;
                }
                $sql = $this->query("UPDATE top_banner SET banner_image='$target',discount='$discount',title='$title', position='top_banner' WHERE id='2'");
                $status = array("status" => 1, "url" => $target);
                return $status;
            }
        }
        
        if ($position == 'top_right') {
            $file_ext = pathinfo($_FILES['right_image']['name'], PATHINFO_EXTENSION);
            if (!in_array($file_ext, $allowed_ext)) {
                $status = array("status" => 0, "msg" => "Wrong image format not supported..!");
                return $status;
            } else {
                if (!empty($_FILES['right_image']['name'])) {
                    $image = $_FILES['right_image']['name'];
                    $target = "img/" . $image;
                    move_uploaded_file($_FILES['right_image']['tmp_name'], $target);
                } else {
                    $target = $banner;
                }
                $sql = $this->query("UPDATE top_banner SET banner_image='$target',title='$title', position='top_right' WHERE id='3'");
                $status = array("status" => 1, "url" => $target);
                return $status;
            }
        }
        
        if ($position == 'bottom_left') {
            $file_ext = pathinfo($_FILES['bottom_left_image']['name'], PATHINFO_EXTENSION);
            if (!in_array($file_ext, $allowed_ext)) {
                $status = array("status" => 0, "msg" => "Wrong image format not supported..!");
                return $status;
            } else {
                if (!empty($_FILES['bottom_left_image']['name'])) {
                    $image = $_FILES['bottom_left_image']['name'];
                    $target = "img/" . $image;
                    move_uploaded_file($_FILES['bottom_left_image']['tmp_name'], $target);
                } else {
                    $target = $banner;
                }
                $sql = $this->query("UPDATE top_banner SET banner_image='$target',title='$title', position='bottom_left' WHERE id='4'");
                $status = array("status" => 1, "url" => $target);
                return $status;
            }
        }
        
        if ($position == 'bottom_right') {
            $file_ext = pathinfo($_FILES['bottom_right_image']['name'], PATHINFO_EXTENSION);
            if (!in_array($file_ext, $allowed_ext)) {
                $status = array("status" => 0, "msg" => "Wrong image format not supported..!");
                return $status;
            } else {
                if (!empty($_FILES['bottom_right_image']['name'])) {
                    $image = $_FILES['bottom_right_image']['name'];
                    $target = "img/" . $image;
                    move_uploaded_file($_FILES['bottom_right_image']['tmp_name'], $target);
                } else {
                    $target = $banner;
                }
                $sql = $this->query("UPDATE top_banner SET banner_image='$target',title='$title', position='bottom_right' WHERE id='5'");
                $status = array("status" => 1, "url" => $target);
                return $status;
            }
        }
    }

    public function cropCoverPhoto($x, $y, $h, $w, $url, $target_w, $target_h) {
        $jpeg_quality = 90;
        $img_r = imagecreatefromjpeg($url);
        $dst_r = ImageCreateTrueColor($target_w, $target_h);
        imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $target_w, $target_h, $w, $h);
        imagejpeg($dst_r, $url, $jpeg_quality);
        return 1;
    }

}
