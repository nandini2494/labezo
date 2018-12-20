<?php

App::uses('Model', 'Model');

class BuyersModel extends Model {

    public $useTable = "buyer_register";

    public function userSignup($data) {
        $this->useTable = "buyer_register";
        @extract($data);
        $sql = "SELECT * FROM buyer_register WHERE email = '$email'";
        $query = $this->query($sql);
        if (count($query) > 0) {
            return "Email Id already registered";
        } else {
            if ($password == $confirm_password) {
                $sql = "INSERT INTO buyer_register SET firstname='$firstname',lastname='$lastname',email='$email',password='$password'";
                $this->query($sql);
                return "Registered Successfully";
            } else {
                return "Password and Confirm Password must be same";
            }
        }
    }

    public function login($data) {
        $this->useTable = "buyer_register";
        @extract($data);
        $sql = "SELECT * FROM buyer_register WHERE email='$email' && password='$password'";
        $query = $this->query($sql);
        if (count($query) > 0) {
            foreach ($query as $row) {
                $udata = array();
                $udata['id'] = $row['buyer_register']['id'];
            }
            return $udata;
        } else {
            return 0;
        }
    }

    public function viewCategory() {
        $this->useTable = "category_desc";
        //$sql['category'] = $this->query("SELECT category_desc.category_id, category.parent_id,category_desc.name FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id GROUP BY category_desc.category_id");
        $sql['category'] = $this->query("SELECT category_desc.category_id, category_desc.name FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id = '0'");
        $sql['sub_category'] = $this->query("SELECT category.category_id, category.parent_id,category_desc.name FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id GROUP BY category_desc.category_id");
        return $sql;
    }

    public function category() {
        $this->useTable = "category_desc";
        $sql = "SELECT category_desc.name,category.category_image FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id = '0' ORDER BY category_desc.category_id ASC LIMIT 6";
        return $this->query($sql);
    }

    public function contactDetails($data) {
        $this->useTable = "contact_us";
        @extract($data);
        $sql = "INSERT INTO contact_us SET name='$user_name',email='$user_email',phone='$user_phone',message='$message'";
        $query = $this->query($sql);
        return "Your Query has been sent successfully";
    }

    public function userProfile($data) {
        $this->useTable = "buyer_register";
        $id = $data['id'];
        $sql = "SELECT * FROM buyer_register WHERE id = '$id'";
        $query = $this->query($sql);
        return $query;
    }

    public function updateProfile($data, $uid) {
        $this->useTable = "buyer_register";
        $id = $uid['id'];
        @extract($data);
        $sql = "UPDATE buyer_register SET firstname='$firstname',lastname='$lastname',phone='$phone',gender='$gender',email='$email' WHERE id='$id'";
        $query = $this->query($sql);
    }

    public function updatePassword($data, $uid) {
        $this->useTable = "buyer_register";
        $id = $uid['id'];
        @extract($data);
        $sql1 = "SELECT * FROM buyer_register WHERE id='$id'";
        $query1 = $this->query($sql1);
        foreach ($query1 as $row) {
            if ($old_password != $row['buyer_register']['password']) {
                return "Invalid Old Password";
            }
        }
        if ($new_password != $confirm_new) {
            return "Password and Confirm Password must be same";
        } else {
            $sql = "UPDATE buyer_register SET password='$new_password' WHERE id='$id'";
            $query = $this->query($sql);
            if ($query) {
                return "Changed Password Successfully";
            }
        }
    }

    public function updateAddress($data, $uid) {
        $this->useTable = "buyer_register";
        $id = $uid['id'];
        @extract($data);
        $sql = "UPDATE buyer_register SET name='$name',address='$address',landmark='$landmark',phone_no='$phone',state='$state',city='$city',pin_code='$pincode',country='$country' WHERE id='$id'";
        $query = $this->query($sql);
        return TRUE;
    }

    public function product_view_category() {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, seller.*, set_offer.*, AVG(review.rating),category.* FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id INNER JOIN seller ON product.seller_id = seller.id INNER JOIN category ON category.category_id = product.category WHERE product.quantity > 0 GROUP BY product.product_id ORDER BY product.product_id asc LIMIT 4");
        //$sql['offer'] = $this->query("SELECT set_offer.*, product.* FROM set_offer INNER JOIN product ON set_offer.product_id = product.product_id WHERE set_offer.from_date >= CURDATE()");        
        return $sql;
    }

    public function product_view_seller() {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, seller.*, set_offer.*, AVG(review.rating) FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id INNER JOIN seller ON product.seller_id = seller.id WHERE product.quantity > 0 GROUP BY product.product_id ORDER BY seller.id asc LIMIT 4");
        return $sql;
    }

    public function review_view() {
        $this->useTable = "product";
        $sql = $this->query("SELECT review.product_id, AVG(review.rating) FROM product INNER JOIN review ON product.product_id = review.product_id GROUP BY review.product_id ORDER BY product.product_id asc LIMIT 4");
        return $sql;
    }

    public function single_data($id) {
        $this->useTable = 'product';
        $current_date = date('Y-m-d');
        $sql['product'] = $this->query("SELECT * FROM product WHERE product_id='$id'");
        $sql['image'] = $this->query("SELECT * FROM image_desc WHERE product_id='$id'");
        $sql['product_option'] = $this->query("SELECT option_name.*, product_option.* FROM option_name INNER JOIN product_option ON option_name.option_id = product_option.option_id WHERE product_option.product_id='$id' && (product_option.option_quantity > 0) GROUP BY product_option.option_id");
        $sql['option_name'] = $this->query("SELECT * FROM product_option WHERE product_id='$id'");
        $sql['product_option_desc'] = $this->query("SELECT * FROM option_description");
        $sql['rating'] = $this->query("SELECT AVG(rating) FROM review GROUP BY product_id HAVING product_id='$id'");
        $sql['offer'] = $this->query("SELECT * FROM set_offer WHERE product_id='$id'");
        return $sql;
    }

    public function getProduct($data) {
        $this->useTable = 'product';
        @extract($data);
        $sql = "SELECT * FROM product WHERE product_id='$product_id'";
        return $this->query($sql);
    }

    public function ratings($data, $user) {
        $this->useTable = "review";
        @extract($data);
        $id = $user['id'];
        $sql = "INSERT INTO review SET user_id='$id',product_id='$product_id',message='$message',name='$user_name',email='$user_email',rating='$rating'";
        $this->query($sql);
    }

    public function productData($seller_id) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*,set_offer.*,AVG(review.rating) FROM product LEFT JOIN set_offer ON set_offer.product_id = product.product_id LEFT JOIN review ON review.product_id = product.product_id WHERE (product.quantity > 0) && product.seller_id='$seller_id' && product.status = 1 GROUP BY product.product_id");
        //$sql['offer'] = $this->query("SELECT set_offer.*, product.* FROM set_offer INNER JOIN product ON set_offer.product_id = product.product_id WHERE set_offer.from_date >= CURDATE()");
        return $sql;
    }

    public function productCategoryData($cat_id) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, set_offer.*, AVG(review.rating) FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id WHERE (product.quantity > 0) && product.category = '$cat_id' && product.status = 1 GROUP BY product.product_id");
        return $sql;
    }
    
    public function productMainCategoryData($cat_id) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, set_offer.*, AVG(review.rating) FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id WHERE (product.quantity > 0) && (product.category = '$cat_id') && product.status = 1 GROUP BY product.product_id");
        return $sql;
    }

    public function cartDetail($data, $session_id, $user_id, $prod_id) {
        $this->useTable = "cart";
        @extract($data);
        $id = $user_id['id'];
        $option_id = array();
        $option_desc_id = array();
        $total_price_val = array();
        $option_quantity = '';
        if (isset($option_name)) {
            foreach ($option_name as $key => $value) {
                array_push($option_id, $key);
                array_push($option_desc_id, $value);
                $sql = "SELECT * FROM product_option WHERE product_id = '$product_id' AND option_id = '$key' AND option_desc_id = '$value'";
                $query = $this->query($sql);
                foreach ($query as $row) {
                    $price_prefix = $row['product_option']['option_price_prefix'];
                    $option_price = $row['product_option']['option_price'];
                    if ($option_quantity == '') {
                        $option_quantity = $row['product_option']['option_quantity'];
                    } else {
                        if ($option_quantity > $row['product_option']['option_quantity']) {
                            $option_quantity = $row['product_option']['option_quantity'];
                        }
                    }
                    if ($price_prefix == '+') {
                        $price = $price + $option_price;
                    } else if ($price_prefix == '-') {
                        $price = $price - $option_price;
                    }
                }
            }
            $option_total_desc = implode(',', $option_desc_id);
            $option_total_id = implode(',', $option_id);
            if ($option_total_desc == ',') {
                $sql1 = "SELECT * FROM cart WHERE product_id ='$product_id' && customer_id='$id' && session_id='$session_id'";
                $query1 = $this->query($sql1);
                if (count($query1) > 0) {
                    foreach ($query1 as $cart) {
                        $cart_id = $cart['cart']['cart_id'];
                        $quan = $cart['cart']['quantity'];
                        $quantity_tmp = $quan + $quantity;
                        if ($quantity_tmp <= $cart['cart']['max_quantity']) {
                            $sql3 = "UPDATE cart SET quantity='$quantity_tmp' WHERE cart_id='$cart_id'";
                            $this->query($sql3);
                        }
                    }
                } else {
                    $sql4 = "INSERT INTO cart SET session_id='$session_id',product_id='$product_id',customer_id='$id',option_desc='',option_id='',quantity='$quantity',model='$model',name='$pro_name',image='$image',price='$price',currency='$currency',max_quantity='$max_quantity'";
                    $this->query($sql4);
                }
            } else {
                $sql5 = "SELECT * FROM cart WHERE product_id ='$product_id' && option_id='$option_total_id' && option_desc='$option_total_desc' && customer_id='$id' && session_id='$session_id'";
                $query5 = $this->query($sql5);
                $max_quantity = $option_quantity;
                if (count($query5) > 0) {
                    foreach ($query5 as $cart) {
                        $cart_id = $cart['cart']['cart_id'];
                        $quan = $cart['cart']['quantity'];
                        $quantity_tmp = $quan + $quantity;
                        if ($quantity_tmp <= $cart['cart']['max_quantity']) {
                            $sql6 = "UPDATE cart SET quantity='$quantity_tmp' WHERE cart_id='$cart_id'";
                            $this->query($sql6);
                        }
                    }
                } else {
                    $sql7 = "INSERT INTO cart SET session_id='$session_id',product_id='$product_id',customer_id='$id',option_desc='$option_total_desc',option_id='$option_total_id',quantity='$quantity',model='$model',name='$pro_name',image='$image',price='$price',currency='$currency',max_quantity='$max_quantity'";
                    $this->query($sql7);
                }
            }
        } else {
            $sql8 = "INSERT INTO cart SET session_id='$session_id',product_id='$product_id',customer_id='$id',option_desc='',option_id='',quantity='$quantity',model='$model',name='$pro_name',image='$image',price='$price',currency='$currency',max_quantity='$max_quantity'";
            $this->query($sql8);
        }
    }

    public function viewCart($session_id, $user_id) {
        $this->useTable = "cart";
        $id = $user_id['id'];
        if ($id > 0) {
            $sql['cart'] = $this->query("SELECT *  FROM cart WHERE customer_id='$id'");
            $sql['option_description'] = $this->query("SELECT * FROM option_description");
            $sql['option'] = $this->query("SELECT * FROM option_name");
            return $sql;
        } else {
            $sql['cart'] = $this->query("SELECT * FROM cart WHERE customer_id='$id' && session_id='$session_id'");
            $sql['option_description'] = $this->query("SELECT * FROM option_description");
            $sql['option'] = $this->query("SELECT * FROM option_name");
            return $sql;
        }
    }

    public function viewCartBuy($user_id) {
        $id = $user_id['id'];
        $sql['cart'] = $this->query("SELECT *  FROM cart WHERE customer_id='$id' ORDER BY cart_id desc LIMIT 1");
        $sql['option_description'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function deletecart($cart_id) {
        $this->useTable = "cart";
        $sql = "DELETE FROM cart WHERE cart_id='$cart_id'";
        $this->query($sql);
    }

    public function updateCart($data) {
        $this->useTable = "cart";
        @extract($data);
        if ($quantity <= $max_qty) {
            $sql = "UPDATE cart SET quantity='$quantity' WHERE cart_id='$cart_id'";
            $this->query($sql);
        }
    }

    public function tempDataCart($data, $user) {
        $this->useTable = "temp_cart";
        $user_id = $user['id'];
        @extract($data);
        $option_id = array();
        $option_desc_id = array();
        $total_price_val = array();
        if (isset($option_name)) {
            foreach ($option_name as $key => $value) {
                array_push($option_id, $key);
                array_push($option_desc_id, $value);
                $sql = "SELECT * FROM product_option WHERE product_id = '$product_id' AND option_id = '$key' AND option_desc_id = '$value'";
                $query = $this->query($sql);
                foreach ($query as $row) {
                    $price_prefix = $row['product_option']['option_price_prefix'];
                    $option_price = $row['product_option']['option_price'];
                    if ($price_prefix == '+') {
                        $price = $price + $option_price;
                    } else if ($price_prefix == '-') {
                        $price = $price - $option_price;
                    }
                }
            }
            $option_total_desc = implode(',', $option_desc_id);
            $option_total_id = implode(',', $option_id);
            $sql1 = "INSERT INTO temp_cart SET customer_id='$user_id',product_id='$product_id',product_name='$pro_name',product_model='$model',option_id='$option_total_id',option_desc='$option_total_desc',quantity='$quantity',price='$price',currency='$currency',image='$image'";
            $this->query($sql1);
        } else {
            $sql2 = "INSERT INTO temp_cart SET customer_id='$user_id',product_id='$product_id',product_name='$pro_name',product_model='$model',option_id='',option_desc='',quantity='$quantity',price='$price',currency='$currency',image='$image'";
            $this->query($sql2);
        }
    }

    public function viewTempCart($user) {
        $user_id = $user['id'];
        $this->useTable = "temp_cart";
        if ($user == '') {
            $sql['cart'] = $this->query("SELECT * FROM temp_cart WHERE customer_id = '0' ORDER BY id desc LIMIT 1");
            $sql['option_description'] = $this->query("SELECT * FROM option_description");
            return $sql;
        } else {
            $sql['cart'] = $this->query("SELECT * FROM temp_cart WHERE customer_id = '$user_id' ORDER BY id desc LIMIT 1");
            $sql['option_description'] = $this->query("SELECT * FROM option_description");
            return $sql;
        }
    }

    public function reviewData($prod_id) {
        $this->useTable = "review";
        $sql = "SELECT * FROM review WHERE product_id = '$prod_id'";
        return $this->query($sql);
    }

    public function signupDetails($data) {
        $this->useTable = "buyer_register";
        @extract($data);
        $sql2 = "SELECT * FROM buyer_register WHERE email = '$email'";
        $query2 = $this->query($sql2);
        if (count($query2) > 0) {
            $sql1 = "UPDATE buyer_register SET password='$password' WHERE email = '$email'";
            $this->query($sql1);
            foreach ($query2 as $query_data) {
                $login_id = $query_data['buyer_register']['id'];
            }
            return $login_id;
        } else {
            $sql3 = "INSERT INTO buyer_register SET email='$email',password='$password'";
            $this->query($sql3);
            $sql4 = "SELECT * FROM buyer_register ORDER BY id desc LIMIT 1";
            $query4 = $this->query($sql4);
            foreach ($query4 as $query_data) {
                $login_id = $query_data['buyer_register']['id'];
            }
            return $login_id;
        }
    }

    public function billingDetails($data, $login_id) {
        $this->useTable = "buyer_register";
        @extract($data);
        $sql = "UPDATE buyer_register SET firstname='$first_name',lastname='$last_name',email='$email',"
                . "phone='$mobile',company='$company',landmark='$landmark',address='$address1',address2='$address2',"
                . "city='$city',pin_code='$zip_code',country='$country',state='$state' WHERE id='$login_id'";
        $this->query($sql);
    }

    public function billingDetailsUser($data, $user_id) {
        $this->useTable = "buyer_register";
        $id = $user_id['id'];
        @extract($data);
        $sql = "UPDATE buyer_register SET firstname='$first_name',lastname='$last_name',email='$email',"
                . "phone='$mobile',company='$company',landmark='$landmark',address='$address1',address2='$address2',"
                . "city='$city',pin_code='$zip_code',country='$country',state='$state' WHERE id='$id'";
        $this->query($sql);
    }

    public function shippingDetails($data, $login_id) {
        $this->useTable = "shipping_address";
        $sql2 = "SELECT * FROM shipping_address WHERE customer_id='$login_id'";
        $query2 = $this->query($sql2);
        @extract($data);
        if (count($query2) > 0) {
            $sql = "UPDATE shipping_address SET firstname='$first_name',lastname='$last_name',email='$email',"
                    . "mobile='$mobile',company='$company',address1='$address1',address2='$address2',city='$city',"
                    . "postal_code='$zip_code',country='$country',state='$state' WHERE customer_id='$login_id'";
            $this->query($sql);
        } else {
            $sql = "INSERT INTO shipping_address SET firstname='$first_name',lastname='$last_name',email='$email',"
                    . "mobile='$mobile',company='$company',address1='$address1',address2='$address2',city='$city',"
                    . "postal_code='$zip_code',country='$country',state='$state'";
            $this->query($sql);
        }
    }

    public function shippingDetailsUser($data, $user_id) {
        $this->useTable = "shipping_address";
        $id = $user_id['id'];
        @extract($data);
        $sql2 = "SELECT * FROM shipping_address WHERE customer_id='$id'";
        $query2 = $this->query($sql2);
        if (count($query2) > 0) {
            $sql = "UPDATE shipping_address SET firstname='$first_name',lastname='$last_name',email='$email',"
                    . "mobile='$mobile',company='$company',address1='$address1',address2='$address2',city='$city',"
                    . "postal_code='$zip_code',country='$country',state='$state' customer_id='$id'";
            $this->query($sql);
        } else {
            $sql = "INSERT INTO shipping_address SET firstname='$first_name',lastname='$last_name',email='$email',"
                    . "mobile='$mobile',company='$company',address1='$address1',address2='$address2',city='$city',"
                    . "postal_code='$zip_code',country='$country',state='$state'";
            $this->query($sql);
        }
    }

    public function shippingSameDetails($login_id) {
        $this->useTable = "shipping_address";
        $sql = "SELECT * FROM buyer_register WHERE id='$login_id'";
        $query = $this->query($sql);
        $sql2 = "SELECT * FROM shipping_address WHERE customer_id='$login_id'";
        $query2 = $this->query($sql2);
        foreach ($query as $query_data) {
            $id_tmp = $query_data['buyer_register']['id'];
            $firstname_tmp = $query_data['buyer_register']['firstname'];
            $lastname_tmp = $query_data['buyer_register']['lastname'];
            $email_tmp = $query_data['buyer_register']['email'];
            $phone_tmp = $query_data['buyer_register']['phone'];
            $landmark_tmp = $query_data['buyer_register']['landmark'];
            $address_tmp = $query_data['buyer_register']['address'];
            $city_tmp = $query_data['buyer_register']['city'];
            $postal_tmp = $query_data['buyer_register']['pin_code'];
            $country_tmp = $query_data['buyer_register']['country'];
            $state_tmp = $query_data['buyer_register']['state'];
            if (count($query2) > 0) {
                $sql1 = "UPDATE shipping_address SET customer_id='$id_tmp', firstname='$firstname_tmp',lastname='$lastname_tmp',"
                        . "email='$email_tmp',mobile='$phone_tmp',landmark='$landmark_tmp',address1='$address_tmp',"
                        . "city='$city_tmp',postal_code='$postal_tmp',country='$country_tmp',state='$state_tmp' WHERE customer_id='$login_id'";
                $this->query($sql1);
            } else {
                $sql1 = "INSERT INTO shipping_address SET customer_id='$id_tmp', firstname='$firstname_tmp',lastname='$lastname_tmp',"
                        . "email='$email_tmp',mobile='$phone_tmp',landmark='$landmark_tmp',address1='$address_tmp',"
                        . "city='$city_tmp',postal_code='$postal_tmp',country='$country_tmp',state='$state_tmp'";
                $this->query($sql1);
            }
        }
    }

    public function shippingSameDetailsUser($user) {
        $this->useTable = "shipping_address";
        $id = $user['id'];
        $sql = "SELECT * FROM buyer_register WHERE id = '$id'";
        $query = $this->query($sql);
        $sql2 = "SELECT * FROM shipping_address WHERE customer_id='$id'";
        $query2 = $this->query($sql2);
        foreach ($query as $query_data) {
            $id_tmp = $query_data['buyer_register']['id'];
            $firstname_tmp = $query_data['buyer_register']['firstname'];
            $lastname_tmp = $query_data['buyer_register']['lastname'];
            $email_tmp = $query_data['buyer_register']['email'];
            $phone_tmp = $query_data['buyer_register']['phone'];
            $landmark_tmp = $query_data['buyer_register']['landmark'];
            $address_tmp = $query_data['buyer_register']['address'];
            $city_tmp = $query_data['buyer_register']['city'];
            $postal_tmp = $query_data['buyer_register']['pin_code'];
            $country_tmp = $query_data['buyer_register']['country'];
            $state_tmp = $query_data['buyer_register']['state'];
            if (count($query2) > 0) {
                $sql1 = "UPDATE shipping_address SET customer_id='$id_tmp', firstname='$firstname_tmp',lastname='$lastname_tmp',"
                        . "email='$email_tmp',mobile='$phone_tmp',landmark='$landmark_tmp',address1='$address_tmp',"
                        . "city='$city_tmp',postal_code='$postal_tmp',country='$country_tmp',state='$state_tmp' WHERE customer_id=$id";
                $this->query($sql1);
            } else {
                $sql1 = "INSERT INTO shipping_address SET customer_id='$id_tmp', firstname='$firstname_tmp',lastname='$lastname_tmp',"
                        . "email='$email_tmp',mobile='$phone_tmp',landmark='$landmark_tmp',address1='$address_tmp',"
                        . "city='$city_tmp',postal_code='$postal_tmp',country='$country_tmp',state='$state_tmp'";
                $this->query($sql1);
            }
        }
    }

    public function billingAddress($user_id) {
        $this->useTable = "buyer_register";
        $id = $user_id['id'];
        $sql = "SELECT * FROM buyer_register WHERE id = '$id'";
        return $this->query($sql);
    }

    public function billingAddressUser($login_id) {
        $this->useTable = "buyer_register";
        $sql = "SELECT * FROM buyer_register WHERE id = '$login_id'";
        return $this->query($sql);
    }

    public function orderDetail($user_id, $order_id) {
        $this->useTable = "product_order";
        $id = $user_id['id'];
        $sql = "SELECT * FROM cart WHERE customer_id='$id'";
        $query = $this->query($sql);
        foreach ($query as $query_data) {
            $product_id = $query_data['cart']['product_id'];
            $price = $query_data['cart']['price'];
            $quantity = $query_data['cart']['quantity'];
            $model = $query_data['cart']['model'];
            $option = $query_data['cart']['option_desc'];
            $option_id = $query_data['cart']['option_id'];
            $product_name = $query_data['cart']['name'];
            $total_price = $price * $quantity;
            $sql1 = "INSERT INTO product_order SET customer_id='$id', order_id='$order_id',product_id='$product_id',product_name='$product_name',product_model='$model',product_option='$option_id',product_option_desc='$option',quantity='$quantity',amount='$total_price',order_date=CURDATE(),order_status='0',payment_status='0'";
            $query_order = $this->query($sql1);
            return TRUE;
            /* if ($option != '') {
              $sql2 = "UPDATE product_option SET option_quantity = (option_quantity - $quantity) WHERE product_id='$product_id' && option_id='$option_id' && option_desc_id='$option'";
              $this->query($sql2);
              } else {
              $sql3 = "UPDATE product SET quantity = (quantity - $quantity) WHERE product_id='$product_id'";
              $this->query($sql3);
              } */
        }
        /* $sql4 = "DELETE FROM cart WHERE customer_id='$id'";
          $this->query($sql4); */
    }

    public function orderDetailUser($login_id, $order_id) {
        $this->useTable = "product_order";
        $sql = "SELECT * FROM cart WHERE customer_id='$login_id'";
        $query = $this->query($sql);
        foreach ($query as $query_data) {
            $product_id = $query_data['cart']['product_id'];
            $price = $query_data['cart']['price'];
            $quantity = $query_data['cart']['quantity'];
            $model = $query_data['cart']['model'];
            $option = $query_data['cart']['option_desc'];
            $option_id = $query_data['cart']['option_id'];
            $product_name = $query_data['cart']['name'];
            $total_price = $price * $quantity;
            $sql1 = "INSERT INTO product_order SET customer_id='$login_id', order_id='$order_id',product_id='$product_id',product_name='$product_name',product_model='$model',product_option='$option_id',product_option_desc='$option',quantity='$quantity',amount='$total_price',order_date=CURDATE(),order_status='0',payment_status='0'";
            $query_order = $this->query($sql1);
            /* if ($option != '') {
              $sql2 = "UPDATE product_option SET option_quantity = (option_quantity - $quantity) WHERE product_id='$product_id' && option_id='$option_id' && option_desc_id='$option'";
              $this->query($sql2);
              } else {
              $sql3 = "UPDATE product SET quantity = (quantity - $quantity) WHERE product_id='$product_id'";
              $this->query($sql3);
              } */
        }
        /* $sql4 = "DELETE FROM cart WHERE session_id='$session_id' && customer_id='0'";
          $this->query($sql4); */
    }

    public function orderDetailDirect($user_id, $order_id) {
        $this->useTable = "product_order";
        $id = $user_id['id'];
        $sql = "SELECT * FROM temp_cart WHERE customer_id='$id' ORDER BY id desc LIMIT 1";
        $query = $this->query($sql);
        foreach ($query as $query_data) {
            $cart_id = $query_data['temp_cart']['id'];
            $product_id = $query_data['temp_cart']['product_id'];
            $price = $query_data['temp_cart']['price'];
            $quantity = $query_data['temp_cart']['quantity'];
            $model = $query_data['temp_cart']['product_model'];
            $option = $query_data['temp_cart']['option_desc'];
            $option_id = $query_data['temp_cart']['option_id'];
            $product_name = $query_data['temp_cart']['product_name'];
            $total_price = $price * $quantity;
            $sql1 = "INSERT INTO product_order SET customer_id='$id', order_id='$order_id',product_id='$product_id',product_name='$product_name',product_model='$model',product_option='$option_id',product_option_desc='$option',quantity='$quantity',amount='$total_price',order_date=CURDATE(),order_status='0',payment_status='0'";
            $query_order = $this->query($sql1);

            /* if ($option != '') {
              $sql2 = "UPDATE product_option SET option_quantity = (option_quantity - $quantity) WHERE product_id='$product_id' && option_id='$option_id' && option_desc_id='$option'";
              $this->query($sql2);
              } else {
              $sql3 = "UPDATE product SET quantity = (quantity - $quantity) WHERE product_id='$product_id'";
              $this->query($sql3);
              }
              $sql4 = "DELETE FROM temp_cart WHERE id='$cart_id'";
              $this->query($sql4); */
        }
    }

    public function orderDetailDirectUser($login_id, $order_id) {
        $this->useTable = "product_order";
        $sql = "SELECT * FROM temp_cart WHERE customer_id='$login_id' ORDER BY id desc LIMIT 1";
        $query = $this->query($sql);
        foreach ($query as $query_data) {
            $id = $query_data['temp_cart']['id'];
            $product_id = $query_data['temp_cart']['product_id'];
            $price = $query_data['temp_cart']['price'];
            $quantity = $query_data['temp_cart']['quantity'];
            $model = $query_data['temp_cart']['product_model'];
            $option = $query_data['temp_cart']['option_desc'];
            $option_id = $query_data['temp_cart']['option_id'];
            $product_name = $query_data['temp_cart']['product_name'];
            $total_price = $price * $quantity;
            $sql1 = "INSERT INTO product_order SET customer_id='$login_id', order_id='$order_id',product_id='$product_id',product_name='$product_name',product_model='$model',product_option='$option_id',product_option_desc='$option',quantity='$quantity',amount='$total_price',order_date=CURDATE(),order_status='0',payment_status='0'";
            $query_order = $this->query($sql1);
            /* if ($option != '') {
              $sql2 = "UPDATE product_option SET option_quantity = (option_quantity - $quantity) WHERE product_id='$product_id' && option_id='$option_id' && option_desc_id='$option'";
              $this->query($sql2);
              } else {
              $sql3 = "UPDATE product SET quantity = (quantity - $quantity) WHERE product_id='$product_id'";
              $this->query($sql3);
              }
              $sql4 = "DELETE FROM temp_cart WHERE id='$id'";
              $this->query($sql4); */
        }
    }

    public function orderConfirm($login_id) {
        $this->useTable = "product_order";
        $sql['order'] = $this->query("SELECT product_order.*, shipping_address.*, buyer_register.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN buyer_register ON buyer_register.id = product_order.customer_id WHERE product_order.customer_id='$login_id' && product_order.order_status = '0' ORDER BY product_order.id desc LIMIT 1");
        foreach ($sql['order'] as $query) {
            $order_id = $query['product_order']['order_id'];
        }
        $sql['order_detail'] = $this->query("SELECT * FROM product_order WHERE customer_id='$login_id' && order_id = '$order_id'");
        return $sql;
    }

    public function orderConfirmUser($user) {
        $this->useTable = "product_order";
        $user_id = $user['id'];
        $sql['order'] = $this->query("SELECT product_order.*, shipping_address.*, buyer_register.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN buyer_register ON buyer_register.id = product_order.customer_id WHERE product_order.customer_id='$user_id' && product_order.order_status = '0' ORDER BY product_order.id desc LIMIT 1");
        foreach ($sql['order'] as $query) {
            $order_id = $query['product_order']['order_id'];
        }
        $sql['order_detail'] = $this->query("SELECT * FROM product_order WHERE customer_id='$user_id' && order_id = '$order_id'");
        return $sql;
    }

    public function myOrderDetail($user) {
        $this->useTable = "product_order";
        $user_id = $user['id'];
        $orderdata = array();
        $query_data = array();
        $sql['order1'] = $this->query("SELECT product_order.*, shipping_address.*, buyer_register.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id INNER JOIN buyer_register ON buyer_register.id = product_order.customer_id WHERE product_order.customer_id='$user_id' GROUP BY product_order.order_id ORDER BY product_order.id DESC");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_desc'] = $this->query("SELECT * FROM option_description");
        array_push($orderdata, $sql);
        foreach ($sql['order1'] as $query) {
            $order_id = $query['product_order']['order_id'];
            $product_id = $query['product_order']['product_id'];
            $sql1['order_detail'] = $this->query("SELECT product_order.*,product.* FROM product_order INNER JOIN product ON product_order.product_id = product.product_id WHERE product_order.customer_id='$user_id' && product_order.order_id = '$order_id'");
            array_push($orderdata, $sql1);
        }
        return $orderdata;
    }

    public function setOrder($data) {
        $this->useTable = "product_order";
        @extract($data);
        $sql1 = "SELECT * FROM product_order WHERE id='$order_id'";
        $query1 = $this->query($sql1);
        foreach ($query1 as $order) {
            $product_id = $order['product_order']['product_id'];
            $product_option = $order['product_order']['product_option'];
            $option_desc = $order['product_order']['product_option_desc'];
            $quantity = $order['product_order']['quantity'];
        }
        $sql = "UPDATE product_order SET order_status = '2' WHERE id = '$order_id'";
        $this->query($sql);
        if ($product_option != '' && $option_desc != '') {
            $sql2 = "UPDATE product_option SET option_quantity = (option_quantity + $quantity) WHERE product_id='$product_id' && option_id='$product_option' && option_desc_id='$option_desc'";
            $this->query($sql2);
        } else {
            $sql3 = "UPDATE product SET quantity = (quantity + $quantity) WHERE product_id='$product_id'";
            $this->query($sql3);
        }
    }

    public function orderTracker($url) {
        $this->useTable = "product_order";
        $sql['order'] = $this->query("SELECT product_order.*, shipping_address.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id WHERE product_order.order_id = '$url' GROUP BY product_order.order_id");
        $sql['order_detail'] = $this->query("SELECT product_order.*,product.* FROM product_order INNER JOIN product ON product_order.product_id = product.product_id WHERE product_order.order_id = '$url'");
        $sql['option'] = $this->query("SELECT * FROM option_name");
        $sql['option_desc'] = $this->query("SELECT * FROM option_description");
        return $sql;
    }

    public function couponCode($data) {
        $this->useTable = "set_coupon";
        @extract($data);
        $current_date = date('Y-m-d');
        $sql = "SELECT * FROM set_coupon WHERE coupon_code='$coupon_code' && from_date >= '$current_date'";
        return $this->query($sql);
    }

    public function shippingView($login_id) {
        $this->useTable = "shipping_address";
        $sql = "SELECT * FROM shipping_address WHERE customer_id = '$login_id'";
        return $this->query($sql);
    }

    public function shippingViewUser($user_id) {
        $this->useTable = "shipping_address";
        $id = $user_id['id'];
        $sql = "SELECT * FROM shipping_address WHERE customer_id='$id'";
        return $this->query($sql);
    }

    public function filterCategoryData($cat_id, $main_id) {
        $this->useTable = "category_desc";
        $sql['main'] = $this->query("SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.category_id = $main_id");
        $sql['category'] = $this->query("SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.category_id = $cat_id");
        $sql['child'] = $this->query("SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id = $cat_id");
        return $sql;
    }
    
    public function filterMainCategoryData($cat_id) {
        $this->useTable = "category_desc";
        $sql['main'] = $this->query("SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.category_id = $cat_id");
        $sql['category'] = $this->query("SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.category_id = $cat_id");
        $sql['child'] = $this->query("SELECT category_desc.*, category.* FROM category_desc INNER JOIN category ON category_desc.category_id = category.category_id WHERE category.parent_id = $cat_id");
        return $sql;
    }

    public function filterOfferData($cat_id) {
        $this->useTable = "product";
        $current_date = date('Y-m-d');
        $sql = "SELECT product.*, set_offer.* FROM product INNER JOIN set_offer ON product.product_id = set_offer.product_id WHERE product.category = '$cat_id' && set_offer.offer_type='In Percentage' && set_offer.from_date >= '$current_date' GROUP BY set_offer.offer_amount";
        return $this->query($sql);
    }

    public function productCategoryDataOffer($cat_id, $filter_amount) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, set_offer.*,AVG(review.rating) FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id WHERE (product.quantity > 0) && product.category = '$cat_id' && set_offer.offer_amount = '$filter_amount' && product.status = 1 GROUP BY product.product_id");
        return $sql;
    }

    public function maxPrice($cat_id) {
        $this->useTable = "product";
        $sql = "SELECT MAX(price) as maximum, category, product_id FROM product WHERE category = '$cat_id'";
        return $this->query($sql);
    }

    public function productCategoryDataPrice($cat_id, $min_price, $max_price) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, set_offer.*,AVG(review.rating) FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id WHERE (product.quantity > 0) && product.category = '$cat_id' && product.status = 1 && (product.price >= '$min_price' && product.price <= '$max_price') GROUP BY product.product_id");
        return $sql;
    }

    public function brandData($cat_id) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT * FROM product WHERE (quantity > 0) && category = '$cat_id' && status = 1 GROUP BY brand");
        return $sql;
    }

    public function productCategoryDataBrand($cat_id, $brand) {
        $this->useTable = "product";
        $sql['product'] = $this->query("SELECT product.*, set_offer.*, AVG(review.rating) FROM product LEFT JOIN set_offer ON product.product_id = set_offer.product_id LEFT JOIN review ON review.product_id = product.product_id WHERE (product.quantity > 0) && product.category = '$cat_id' && product.status = 1 && product.brand = '$brand' GROUP BY product.product_id");
        return $sql;
    }

    public function updateTransactionId($order_id, $txn, $payment_status, $amount) {
        $this->useTable = "product_order";
        $sql = "UPDATE product_order SET txn_id='$txn',payment_status='$payment_status',payment_amount='$amount' WHERE order_id='$order_id'";
        $this->query($sql);
        if ($payment_status == 'Completed') {
            $sql1 = $this->query("SELECT product_order.*, shipping_address.* FROM product_order INNER JOIN shipping_address ON product_order.customer_id = shipping_address.customer_id WHERE product_order.order_id = '$order_id'");
            foreach ($sql1 as $data) {
                $option = $data['product_order']['product_option_desc'];
                $option_id = $data['product_order']['product_option'];
                $quantity = $data['product_order']['quantity'];
                $product_id = $data['product_order']['product_id'];
                $customer_id = $data['product_order']['customer_id'];
                $email = $data['shipping_address']['email'];
                if ($option != '') {
                    $sql2 = "UPDATE product_option SET option_quantity = (option_quantity - '$quantity') WHERE product_id='$product_id' && option_id='$option_id' && option_desc_id='$option'";
                    $this->query($sql2);
                } else {
                    $sql3 = "UPDATE product SET quantity = (quantity - '$quantity') WHERE product_id='$product_id'";
                    $this->query($sql3);
                }
            }
            $sql4 = "DELETE FROM cart WHERE customer_id='$customer_id'";
            $this->query($sql4);
        }
    }

    public function wishlistView($user_id) {
        $this->useTable = "wishlist";
        $id = $user_id['id'];
        $sql = "SELECT * FROM wishlist WHERE user_id = '$id'";
        return $this->query($sql);
    }

    public function wishlistAddDirect($user_id, $product_id) {
        $this->useTable = "wishlist";
        $sql = "INSERT INTO wishlist SET user_id='$user_id', product_id='$product_id'";
        $this->query($sql);
    }

    public function wishlistRemove($user_id, $product_id) {
        $this->useTable = "wishlist";
        $sql = "DELETE FROM wishlist WHERE user_id='$user_id' && product_id='$product_id'";
        $this->query($sql);
    }

    public function LoginInfo($data) {
        $this->useTable = "buyer_register";
        @extract($data);
        $sql = "SELECT * FROM buyer_register WHERE email='$email' && password='$password'";
        $query = $this->query($sql);
        if (count($query) > 0) {
            foreach ($query as $row) {
                $udata = array();
                $udata['id'] = $row['buyer_register']['id'];
                $user_id = $row['buyer_register']['id'];
            }
            $sql1 = $this->query("INSERT INTO wishlist SET user_id='$user_id',product_id='$product_data'");
            return $udata;
        } else {
            return FALSE;
        }
    }

    public function wishlistViewData($user_id) {
        $this->useTable = "wishlist";
        $id = $user_id['id'];
        $sql = "SELECT product.*, wishlist.* FROM wishlist INNER JOIN product ON wishlist.product_id = product.product_id WHERE wishlist.user_id = '$id'";
        return $this->query($sql);
    }

    public function deleteWishlist($data) {
        $this->useTable = "wishlist";
        @extract($data);
        $sql = "DELETE FROM wishlist WHERE user_id='$user_id' && product_id='$product_id'";
        $this->query($sql);
    }

    public function wishlistViewSingle($user_id, $product_id) {
        $this->useTable = "wishlist";
        $id = $user_id['id'];
        $sql = "SELECT * FROM wishlist WHERE user_id='$id' && product_id='$product_id'";
        return $this->query($sql);
    }

    public function returnProduct($data, $user_id) {
        $this->useTable = "return_product";
        $id = $user_id['id'];
        @extract($data);
        $current_date = date('Y-m-d');
        $sql1 = "SELECT * FROM product_order WHERE order_id = '$order_id' AND product_name = '$product_name' AND customer_id = '$id' AND order_status = '6'";
        $query = $this->query($sql1);
        if (count($query) > 0) {
            $sql = "INSERT INTO return_product SET order_id = '$order_id',order_submit = '$current_date',user_id = '$id',product_name = '$product_name',quantity = '$quantity',return_reason = '$reason',product_open = '$product_open',other_detail = '$other_detail',return_status = '0'";
            $this->query($sql);
            return "submit";
        } else {
            return "error";
        }
    }

    public function viewEmail($user_id) {
        $this->useTable = "buyer_register";
        $id = $user_id['id'];
        $sql = "SELECT * FROM buyer_register WHERE id = '$id'";
        return $this->query($sql);
    }

    public function deactivateAccount($data, $user_id) {
        $this->useTable = "buyer_register";
        $id = $user_id['id'];
        @extract($data);
        $sql = "DELETE FROM buyer_register WHERE id = '$id'";
        $this->query($sql);
    }

    public function forgotPassword($data) {
        $this->useTable = "buyer_register";
        @extract($data);
        $sql = "SELECT * FROM buyer_register WHERE email = '$email'";
        $query = $this->query($sql);
        if (count($query) > 0) {
            foreach ($query as $row) {
                $password = $row['buyer_register']['password'];
            }
            $body = '<html>
                <body>Your Password is : <b>' . $password . '</b></body>
                <html>';
            $this->sendEmail($email, $body);
            return "Password has been sent to your email";
        } else {
            return "Email Id doesnot exist";
        }
    }

    public function sendEmail($to, $body) {
        $subject = "Labezo Forgot Password";
        $message = '<html><head><title>Your Login Details</title></head>
                   <body>
                   <h4>Hello </h4>
                   ' . $body . '
                   </body>
                   </html>';

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@labezo.com>' . "\r\n";
        mail($to, $subject, $message, $headers);
    }

    public function reviewRating($user_id) {
        $this->useTable = "review";
        $id = $user_id['id'];
        $sql = "SELECT review.*, product.*, buyer_register.* FROM review INNER JOIN product ON review.product_id = product.product_id INNER JOIN buyer_register ON buyer_register.id = review.user_id WHERE review.user_id = '$id'";
        return $this->query($sql);
    }

    public function viewBuyer($uid) {
        $this->useTable = "buyer_register";
        $id = $uid['id'];
        $sql = "SELECT * FROM buyer_register WHERE id = '$id'";
        return $this->query($sql);
    }
    
    public function bannerImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id='1'");
        return $sql;
    }
    
    public function topLeftImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id='2'");
        return $sql;
    }
    
    public function topRightImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id='3'");
        return $sql;
    }
    
    public function bottomLeftImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id='4'");
        return $sql;
    }
    
    public function bottomRightImage() {
        $this->useTable = "top_banner";
        $sql = $this->query("SELECT * FROM top_banner WHERE id='5'");
        return $sql;
    }

}
