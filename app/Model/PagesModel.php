<?php

App::uses('Model', 'Model');

class PagesModel extends Model {

    public function sellerInfo($info) {
        $this->useTable = "seller";
        @extract($info);
        if (!empty($_FILES['business_reg']['name'])) {
            $image = $_FILES['business_reg']['name'];
            $target = "img/" . $image;
            move_uploaded_file($_FILES['business_reg']['tmp_name'], $target);
        } else {
            $target = '';
        }
        $query = $this->query("SELECT * FROM seller WHERE email = '$email'");
        if (count($query) == 0) {
            if ($password == $confim_pass) {
                if(isset($_POST['sortation_center'])) {
                    $sort_tmp = implode('*', $_POST['sortation_center']);
                } else {
                    $sort_tmp = '';
                }
                if(isset($_POST['term_cond'])) {
                    $term = '1';
                } else {
                    $term = '0';
                }
                $sql = $this->query("INSERT INTO seller SET name='$name',phone='$phone',address='$address',city='$city',country='$country',store_name='$store_name',brand_name='$brand_name',main_category='$category_name',main_url='$url_name',selling_on='$selling_on',street='$street',city2='$city2',contact_person='$contact_person',contact_phone='$contact_phone',sortation_center='$sort_tmp',country2='$country2',company_name='$company_name',director_name='$director_name',reg_number='$reg_no',business_reg='$target',term_conditon='$term',verify='0',email = '$email', password = '$password'");
                return "Your Information is submitted successfully";
            } else {
                return "Password and Confirm Password must be same";
            }
        } else {
            return "Email Id already exist.";
        }
    }

    public function loginUser($data) {
        $this->useTable = "seller";
        @extract($data);
        $sql = "SELECT * FROM seller WHERE email='$email'";
        $query = $this->query($sql);
        if (count($query) == 0) {
            return array("status" => FALSE, "msg" => "EmailId doesnot exist");
        } else {
            foreach ($query as $data) {
                if ($password != $data['seller']['password']) {
                    return array("status" => FALSE, "msg" => "Entered Password is wrong");
                } else {
                    if ($data['seller']['verify'] == '0') {
                        return array("status" => FALSE, "msg" => "You are not verified Seller");
                    } else {
                        $user_id = array();
                        $user_id['id'] = $data['seller']['id'];
                        return array("status" => TRUE, "msg" => $user_id);
                    }
                }
            }
        }
    }

}
