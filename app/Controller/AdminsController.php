<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class AdminsController extends AppController {

    private $a_model;
    public $components = array('Email');
    
    public function beforeFilter() {
        $this->loadModel("AdminsModel");
        $this->a_model = new AdminsModel();
        session_start();
    }

    public function admin_index() {
        if ($this->request->is('post')) {
            $data = $this->a_model->login($this->request->data);
            if ($data != 0) {
                $this->Session->write('udata', $data);
                $this->redirect('/admin/index.html');
            }
        }
    }

    public function index() {
        error_reporting(0);
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('total_sale',$this->a_model->totalSales());
            $this->set('total_seller',$this->a_model->totalSeller());
            $this->set('total_product',$this->a_model->totalProducts());
            $this->set('profile', $this->a_model->profileView($user));
            if($this->request->is('post')) {
                $this->set('total_sale', $this->a_model->totalSaleDate($this->request->data));
                $this->set('total_seller', $this->a_model->totalSellerDate($this->request->data));
                $this->set('total_product', $this->a_model->totalproduct($this->request->data));
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function new_orders() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('order', $this->a_model->orderDetailsUser());
            $this->set('profile', $this->a_model->profileView($user));
            if ($this->request->is('post')) {
                if ($this->request->data('form_name') == 'order_update') {
                    $this->a_model->updateOrderAdmin($this->request->data);
                    $this->redirect("/admin/New_Orders.html");
                }
                if ($this->request->data('form_name') == 'search_data') {
                    $this->set('order', $this->a_model->getOrder($this->request->data));
                }
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function buyer() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));
            $data = $this->a_model->buyerList();
            $this->set('result', $data);
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }
    
    public function Profile() {
       if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile',$this->a_model->profileView($user));           
            if($this->request->is('post')) {
                $this->a_model->editProfileData($this->request->data, $user);
                $this->redirect('/admin/Profile.html');
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        } 
    }

    public function new_seller() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));

            $data = $this->a_model->newsellerList();
            $this->set("result", $data);
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }
    
    public function image() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));
            $this->set('banner_image', $this->a_model->viewBanner());
            $this->set('top_left_image', $this->a_model->viewTopLeftImage());
            $this->set('top_right_image', $this->a_model->viewTopRightImage());
            $this->set('bottom_left_image', $this->a_model->viewBottomLeftImage());
            $this->set('bottom_right_image', $this->a_model->viewBottomRightImage());
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function seller() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));

            $data = $this->a_model->sellerList();
            $this->set("result", $data);
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function category_manage() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('data', $this->a_model->viewCategory());
            $this->set('profile', $this->a_model->profileView($user));
            if ($this->request->is('post')) {
                $this->set('data', $this->a_model->getCategory($this->request->data));
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function add_category() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('value', $this->a_model->viewCategory());
            $this->set('profile', $this->a_model->profileView($user));

            if ($this->request->is('post')) {
                $this->a_model->addCategory($this->request->data);
                $this->redirect("/admin/Category_Manage.html");
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function edit_category() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));

            if ($this->params['url']['id']) {
                $id = $this->params['url']['id'];
                $this->set('value', $this->a_model->selectCategory($id));
                $this->set('data', $this->a_model->view_editCategory($id));

                if ($this->request->is('post')) {
                    $this->a_model->editCategory($this->request->data, $id);
                    $this->redirect("/admin/Category_Manage.html");
                }
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function delete_category() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->a_model->deleteCategory($this->request->data);
        }
    }

    public function view_product() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));

            $id = $this->params['url']['id'];
            $this->set('results', $this->a_model->productList($id));
            $this->set('category', $this->a_model->viewCategory());
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function product_manage() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('value', $this->a_model->categoryName());
            $this->set('result', $this->a_model->viewProduct());
            $this->set('profile', $this->a_model->profileView($user));
            if ($this->request->is('post')) {
                $this->set('result', $this->a_model->getProductInfo($this->request->data));
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function option_manage() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function shipping_manage() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('order', $this->a_model->orderDetails());
            $this->set('profile', $this->a_model->profileView($user));
            if ($this->request->is('post')) {
                if ($this->request->data('form_name') == 'shipping_data') {
                    $this->a_model->updateOrder($this->request->data);
                    $this->redirect("/admin/Shipping_Manage.html");
                }
                if ($this->request->data('form_name') == 'search_shipping_data') {
                    $this->set('order', $this->a_model->getShippingData($this->request->data));
                }
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function return_product() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));
            $this->set('return_data', $this->a_model->returnProductAdmin());
            if($this->request->is('post')) {
                $this->a_model->updateReturn($this->request->data);
                if($this->request->data('select_list') == 'Amount transfered') {
                    $order_id = $this->request->data('order_id');
                    $email = $this->request->data('email');
                    $subject = "Amount Transfered";
                    $this->__sendEmail($email, $order_id, $subject);
                    $this->redirect('/admin/Return_Product.html');
                } elseif($this->request->data('select_list') == 'Completed') {
                    $this->a_model->updateReturnOrder($this->request->data);
                } else {
                    $this->redirect('/admin/Return_Product.html');
                }
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }
    
    public function __sendEmail($email, $order_id, $subject) {
        $this->Email->smtpOptions = array(
            'port' => '587',
            'timeout' => '60',
            'host' => 'smtp.gmail.com',
            'username' => 'saini.vikas630@gmail.com',
            'password' => 'life-xperience',
            'transport' => 'Smtp',
            'tls' => TRUE,
            'client' => NULL
        );  
        $this->set('order_id', $order_id);
        $this->Email->delivery = 'Smtp';
        $this->Email->sendAs = 'html';
        $this->Email->template = 'amount_transfered';
        $this->Email->to = $email;
        $this->Email->subject = $subject;
        $this->Email->from = 'noreplay@labezo.com';
        $this->Email->send();
    }
    
    public function seller_product() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata'); 
            $this->set('return_data', $this->a_model->returnProductSeller());
            $this->set('profile', $this->a_model->profileView($user));
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function news_latter() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function coupon_code() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('coupon', $this->a_model->viewCoupon());
            $this->set('profile', $this->a_model->profileView($user));
            if($this->request->is('post')) {
                $this->set('coupon', $this->a_model->getCoupon($this->request->data));
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function offer_manage() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('offer', $this->a_model->setOffer());
            $this->set('profile', $this->a_model->profileView($user));
            if ($this->request->is('post')) {
                $this->set('offer', $this->a_model->getOffer($this->request->data));
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }

    public function edit_product() {
        error_reporting(0);
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->a_model->editProduct($this->request->data);
        }
    }

    public function delete_product() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->a_model->deleteProduct($this->request->data);
        }
    }

    public function update_user() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->a_model->updateSeller($this->request->data('id'));
        }
    }

    public function add_coupon() {
        if ($this->Session->check('udata')) {
            $user = $this->Session->read('udata');
            $this->set('profile', $this->a_model->profileView($user));
            if (isset($this->params['url']['id'])) {
                $id = $this->params['url']['id'];
                $this->set('coupon', $this->a_model->viewCouponCode($id));
            }
            if ($this->request->is('post')) {
                if ($this->request->data('form_button') == 'Save') {
                    $coupon = $this->a_model->addCoupon($this->request->data);
                    $this->loadModel('BuyersModel');
                    $emails = $this->BuyersModel->find('all',array(
                                        'fields'=>array('email'),
                    ));
                    foreach ($emails as $email){
                        $subject = "Coupon Code of Labezo";
                        $to_email = $email['BuyersModel']['email'];
                        $this->send($to_email, $coupon, $subject);
                    }
                    $this->redirect('/admin/Coupon_Code.html');
                }
                if($this->request->data('form_button') == 'Update') {
                    $coupon = $this->a_model->editCoupon($this->request->data, $id);
                    $this->redirect('/admin/Coupon_Code.html');
                }
            }
        } else {
            $this->redirect('/admin/admin_index.html');
        }
    }
    
    public function send($to_email, $coupon, $subject) {
        $this->Email->smtpOptions = array(
            'port' => '587',
            'timeout' => '60',
            'host' => 'smtp.gmail.com',
            'username' => 'saini.vikas630@gmail.com',
            'password' => 'life-xperience',
            'transport' => 'Smtp',
            'tls' => TRUE,
            'client' => NULL
        );
        $this->Email->delivery = 'Smtp';
        $this->Email->from = 'noreplay@labezo.com';
        $this->Email->to = $to_email;
        $this->set('data', $coupon);
        $this->Email->subject = $subject;
        $this->Email->template = 'send_coupon';
        $this->Email->sendAs = 'html';
        $this->Email->send();
    }
    
    public function delete_coupon($data) {
        if($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $this->a_model->deleteCoupon($this->request->data);
        }
    }
    
    public function delete_seller() {
        if($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $this->a_model->deleteSeller($this->request->data('delete_seller_id'));
        }
    }
    
    public function upload_top_banner() {
        if($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $status = $this->a_model->uploadTopBanner($this->request->data);            
            if ($status['status'] == 0) {
                echo json_encode(array(
                    "0",
                    $status['msg']
                ));
            } else {
                echo json_encode(array(
                    "1",
                    $status['url']
                ));
            }
        }
    }
    
    public function crop_cover_photo() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->a_model->cropCoverPhoto($this->request->data('x'), $this->request->data('y'), $this->request->data('h'), $this->request->data('w'), $this->request->data('photo_url'), $this->request->data('tagert_w'), $this->request->data('tagert_h'));
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect("/admin/admin_index.html");
    }

}
