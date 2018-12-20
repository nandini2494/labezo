<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class BuyersController extends AppController {

    private $buyer_model;
    public $components = array('Email');

    public function beforeFilter() {
        $this->loadModel('BuyersModel');
        $this->buyer_model = new Buyersmodel();
        session_start();
    }

    public function index() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('value', $this->buyer_model->category());
        $this->set('banner', $this->buyer_model->bannerImage());
        $this->set('top_left', $this->buyer_model->topLeftImage());
        $this->set('top_right', $this->buyer_model->topRightImage());
        $this->set('bottom_left', $this->buyer_model->bottomLeftImage());
        $this->set('bottom_right', $this->buyer_model->bottomRightImage());
        $this->set('data', $this->buyer_model->product_view_category());
        $this->set('seller_data', $this->buyer_model->product_view_seller());
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $this->set('wishlist', $this->buyer_model->wishlistView($user_id));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }
    }

    public function products() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $this->set('wishlist', $this->buyer_model->wishlistView($user_id));
        if (isset($this->params['url']['id'])) {
            $seller_id = $this->params['url']['id'];
            $this->set('product_val', $this->buyer_model->productData($seller_id));
        } else if (isset($this->params['url']['category_id'])) {
            $cat_id = $this->params['url']['category_id'];
            if (isset($this->params['url']['main_id'])) {
                $main_id = $this->params['url']['main_id'];
                if (isset($this->params['url']['min_price'])) {
                    $min_price = $this->params['url']['min_price'];
                    $max_price = $this->params['url']['max_price'];
                    $this->set('product_val', $this->buyer_model->productCategoryDataPrice($cat_id, $min_price, $max_price));
                    $this->set('max_price', $this->buyer_model->maxPrice($cat_id));
                    $this->set('max_price_data', $max_price);
                    $this->set('min_price', $min_price);
                    $this->set('category_val', $this->buyer_model->filterCategoryData($cat_id, $main_id));
                    $this->set('offer_val', $this->buyer_model->filterOfferData($cat_id));
                    $this->set('brand_val', $this->buyer_model->brandData($cat_id));
                } else {
                    if (isset($this->params['url']['filter_data'])) {
                        $filter_amount = $this->params['url']['filter_data'];
                        $cat_id = $this->params['url']['category_id'];
                        $main_id = $this->params['url']['main_id'];
                        $this->set('product_val', $this->buyer_model->productCategoryDataOffer($cat_id, $filter_amount));
                        $this->set('category_val', $this->buyer_model->filterCategoryData($cat_id, $main_id));
                        $this->set('offer_val', $this->buyer_model->filterOfferData($cat_id));
                    }
                    if (isset($this->params['url']['brand'])) {
                        $brand = $this->params['url']['brand'];
                        $this->set('product_val', $this->buyer_model->productCategoryDataBrand($cat_id, $brand));
                        $this->set('max_price', $this->buyer_model->maxPrice($cat_id));
                        $this->set('category_val', $this->buyer_model->filterCategoryData($cat_id, $main_id));
                        $this->set('offer_val', $this->buyer_model->filterOfferData($cat_id));
                        $this->set('brand_val', $this->buyer_model->brandData($cat_id));
                    } else {
                        $this->set('product_val', $this->buyer_model->productCategoryData($cat_id));
                        $this->set('max_price', $this->buyer_model->maxPrice($cat_id));
                        $this->set('category_val', $this->buyer_model->filterCategoryData($cat_id, $main_id));
                        $this->set('offer_val', $this->buyer_model->filterOfferData($cat_id));
                        $this->set('brand_val', $this->buyer_model->brandData($cat_id));
                    }
                }
            } else {
                $this->set('product_val', $this->buyer_model->productMainCategoryData($cat_id));
                $this->set('max_price', $this->buyer_model->maxPrice($cat_id));
                $this->set('category_val', $this->buyer_model->filterMainCategoryData($cat_id));
                $this->set('offer_val', $this->buyer_model->filterOfferData($cat_id));
                $this->set('brand_val', $this->buyer_model->brandData($cat_id));
            }
        }
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }
    }

    public function mail() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }

        if ($this->request->is('post')) {
            $this->set('value', $this->buyer_model->contactDetails($this->request->data));
        }
    }

    public function checkout() {
        $session_id = session_id();
        $login_id = $this->Session->read('login');
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $order_id = "LAB" . mt_rand(1000, 9999);
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $this->set('login_data', '');
        $this->set('display_data', '');
        if (isset($this->params['url']['tracker'])) {
            $tracker = $this->params['url']['tracker'];
            $this->set('tempCart_data', $this->buyer_model->viewTempCart($user_id));
        } else {
            $this->set('cart_data', $this->buyer_model->viewCart($session_id, $user_id));
        }
        $order_id = "LAB" . mt_rand(1000, 9999);
        if ($this->request->is('post')) {
            if ($this->request->data('form_name') == 'signup_form') {
                $this->Session->write('login', $this->buyer_model->signupDetails($this->request->data));
                $login_id = $this->Session->read('login');
                $this->set('login_data', $login_id);
                $this->set('display_data', 'signup');
                //echo $this->buyer_model->signupDetails($this->request->data);
            }
            if ($this->request->data('form_name') == 'billing_form' && $user_id == 0) {
                $this->buyer_model->billingDetails($this->request->data, $login_id);
                $this->set('login_data', $login_id);
                $this->set('display_data', 'billing_add');
            } else if ($this->request->data('form_name') == 'billing_form' && $user_id > 0) {
                $this->buyer_model->billingDetailsUser($this->request->data, $user_id);
                $this->set('login_data', $user_id);
                $this->set('display_data', 'billing_add');
            }
            if ($this->request->data('form_name') == 'shipping_form') {
                if (($this->request->data('billing_address') == 1) && $user_id == 0) {
                    $this->buyer_model->shippingSameDetails($login_id);
                    $this->set('login_data', $login_id);
                    $this->set('display_data', 'shipping_add');
                    $this->set('shipped_data', $this->buyer_model->shippingView($login_id));
                    if (isset($this->params['url']['tracker'])) {
                        $this->buyer_model->orderDetailDirectUser($login_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    } else {
                        $this->buyer_model->orderDetailUser($login_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    }
                } else if (($this->request->data('billing_address') == 1) && $user_id > 0) {
                    $this->buyer_model->shippingSameDetailsUser($user_id);
                    $this->set('login_data', $user_id);
                    $this->set('display_data', 'shipping_add');
                    $this->set('shipped_data', $this->buyer_model->shippingViewUser($user_id));
                    if (isset($this->params['url']['tracker'])) {
                        $this->buyer_model->orderDetailDirect($user_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    } else {
                        $this->buyer_model->orderDetail($user_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    }
                }
                if (($this->request->data('billing_address') != 1) && $user_id == 0) {
                    $this->buyer_model->shippingDetails($this->request->data, $login_id);
                    $this->set('login_data', $login_id);
                    $this->set('display_data', 'shipping_add');
                    $this->set('shipped_data', $this->buyer_model->shippingView($login_id));
                    if (isset($this->params['url']['tracker'])) {
                        $this->buyer_model->orderDetailDirectUser($login_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    } else {
                        $this->buyer_model->orderDetailUser($login_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    }
                } else if (($this->request->data('billing_address') != 1) && $user_id > 0) {
                    $this->buyer_model->shippingDetailsUser($this->request->data, $user_id);
                    $this->set('login_data', $user_id);
                    $this->set('display_data', 'shipping_add');
                    $this->set('shipped_data', $this->buyer_model->shippingViewUser($user_id));
                    if (isset($this->params['url']['tracker'])) {
                        $this->buyer_model->orderDetailDirect($user_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    } else {
                        $this->buyer_model->orderDetail($user_id, $order_id);
                        $this->Session->write('order_data', $order_id);
                        $this->set('order_val', $this->Session->read('order_data'));
                    }
                }
            }
            if ($this->request->data('form_name') == 'coupon_value' && $user_id == 0) {
                $coupon_data = $this->buyer_model->couponCode($this->request->data);
                $this->set('login_data', $login_id);
                $this->set('display_data', 'shipping_add');
                $this->set('shipped_data', $this->buyer_model->shippingView($login_id));
                if (count($coupon_data) > 0) {
                    $this->set('coupon', $coupon_data);
                } else {
                    $this->set('msg', "Invalid Coupon");
                }
            }

            if ($this->request->data('form_name') == 'coupon_value' && $user_id > 0) {
                $coupon_data = $this->buyer_model->couponCode($this->request->data);
                $this->set('login_data', $user_id);
                $this->set('display_data', 'shipping_add');
                $this->set('shipped_data', $this->buyer_model->shippingViewUser($user_id));
                if (count($coupon_data) > 0) {
                    $this->set('coupon', $coupon_data);
                } else {
                    $this->set('msg', "Invalid Coupon");
                }
            }
            /* if (($this->request->data('form_name') == 'order_value') && $user_id > 0) {
              $this->buyer_model->orderDetail($user_id, $order_id);
              //$this->redirect("/labezo_buyer/order_confirm.html");
              }
              if (($this->request->data('form_name') == 'order_value') && $user_id == 0) {
              $this->buyer_model->orderDetailUser($login_id, $order_id);
              //$this->redirect("/labezo_buyer/order_confirm.html");
              }
              if (isset($this->params['url']['tracker'])) {
              if (($this->request->data('form_name') == 'order_value') && $user_id > 0) {
              $this->buyer_model->orderDetailDirect($user_id, $order_id);
              //$this->redirect("/labezo_buyer/order_confirm.html");
              }
              if (($this->request->data('form_name') == 'order_value') && $user_id == 0) {
              $this->buyer_model->orderDetailDirectUser($login_id, $order_id);
              //$this->redirect("/labezo_buyer/order_confirm.html");
              }
              } */
        }
        if ($user_id > 0) {
            $this->set('billing', $this->buyer_model->billingAddress($user_id));
        } else if ($login_id != 0) {
            $this->set('billing', $this->buyer_model->billingAddressUser($login_id));
        } else {
            $this->set('billing', 0);
        }
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }
    }

    public function order_confirm() {
        error_reporting(0);
        $login_id = $this->Session->read('login');
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('login')) {
            $this->set('order_confirm', $this->buyer_model->orderConfirm($login_id));
            $data1 = $this->buyer_model->orderConfirm($login_id);
            foreach ($data1['order'] as $shipping) {
                $to_email = $shipping['shipping_address']['email'];
            }
            $subject = 'Order Confirmation';
            $this->send($to_email, $data1, $subject);
        }
        if ($this->Session->check('uid')) {
            $this->set('order_confirm', $this->buyer_model->orderConfirmUser($user_id));
            $data2 = $this->buyer_model->orderConfirmUser($user_id);
            foreach ($data2['order'] as $shipping) {
                $to_email = $shipping['shipping_address']['email'];
            }
            $subject = 'Order Confirmation';
            $this->send($to_email, $data2, $subject);
        }
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
        }
    }

    public function __sendEmail($to_email, $data_val, $subject) {
        $this->Email->smtpOptions = array(
            'port' => '587',
            'timeout' => '60',
            'host' => 'smtp.gmail.com',
            'username' => 'saini.vikas630@gmail.com',
            'password' => 'life-xperience',
            'transport' => 'smtp',
            'tls' => TRUE);
        $this->Email->delivery = 'smtp';
        $email_send = new CakeEmail('default');
        $email_send->emailFormat('html');
        $email_send->template('order_confirmation');
        //$email_send->viewVars(array('data' => $data_val));
        $this->set('data', $data_val);
        $email_send->from(array('noreply@labezo.com' => 'Labezo marketplace'));
        $email_send->to($to_email);
        $email_send->subject($subject);
        $email_send->send();
    }

    public function send($to_email, $data_val, $subject) {
        $this->Email->smtpOptions = array(
            'port' => '587',
            'timeout' => '60',
            'host' => 'smtp.gmail.com',
            'username' => 'saini.vikas630@gmail.com',
            'password' => 'life-xperience',
            'transport' => 'Smtp',
            'tls' => TRUE
        );
        //$emailaddresses =array('palletpost.invoice@gmail.com',$email);
        $this->Email->delivery = 'Smtp';
        $this->Email->from = 'noreply@labezo.com';
        $this->Email->to = $to_email;
        $this->set('data', $data_val);
        $this->Email->subject = $subject;
        $this->Email->template = 'order_confirmation';
        $this->Email->sendAs = 'html';
        $this->Email->send();
    }

    public function ipn() {
        $this->autoRender = FALSE;
        if ($this->request->is('post')) {
            $order_id = $this->request->data('custom');
            $request = 'cmd=_notify-validate';
            foreach ($this->request->data as $key => $value) {
                $request .= '&' . $key . '=' . urlencode(html_entity_decode($value, ENT_QUOTES, 'UTF-8'));
            }
            $curl = curl_init('https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($curl);
            if (strcmp($response, 'VERIFIED') == 0 && $this->request->data('payment_status') != NULL) {
                $this->buyer_model->updateTransactionId($order_id, $this->request->data('txn_id'), $this->request->data('payment_status'), $this->request->data('amount'));
            }
            curl_close($curl);
        }
    }

    public function order_cancel() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }
    }

    public function login() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }

        if ($this->request->is('post')) {
            $data = $this->buyer_model->login($this->request->data);
            if ($data > 0) {
                $this->Session->write('uid', $data);
                $this->redirect('/labezo_buyer/index.html');
            } elseif ($data == 0) {
                $this->set('error', "Entered Email Id and Password is incorrect");
            }
        }
    }

    public function forget() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }

        if ($this->request->is('post')) {
            $this->set('forget_data', $this->buyer_model->forgotPassword($this->request->data));
        }
    }

    public function registered() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }

        if ($this->request->is('post')) {
            $data = $this->buyer_model->userSignup($this->request->data);
            $this->set('message', $data);
        }
    }

    public function single() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $prod_id = $this->params['url']['id'];
        $this->set('value', $this->buyer_model->single_data($prod_id));
        $this->set('review_data', $this->buyer_model->reviewData($prod_id));
        $this->set('wishlist', $this->buyer_model->wishlistViewSingle($user_id, $prod_id));
        if ($this->request->is('post')) {
            if ($this->request->data('form_button') == 'add_cart') {
                $this->buyer_model->cartDetail($this->request->data, $session_id, $user_id, $prod_id);
                $this->redirect("/labezo_buyer/cart.html");
            }
            if ($this->request->data('form_button') == 'buy_now') {
                $this->buyer_model->tempDataCart($this->request->data, $user_id, $prod_id);
                $this->redirect("/labezo_buyer/checkout.html?tracker=buy_now");
            }
            /* if ($this->request->data('form_button') == 'add_cart') {
              if ($this->Session->check('cart')) {
              $cart = $this->Session->read('cart');
              $product_details['options'] = $this->request->data('option_desc');
              $product_details['price'] = $this->request->data('price');
              $product_details['image'] = $this->request->data('image');
              $product_details['name'] = $this->request->data('pro_name');
              $product_details['quantity'] = $this->request->data('quantity');
              $product_details['model'] = $this->request->data('model');
              $product_details['product_id'] = $this->request->data('product_id');
              $cart[] = $product_details;
              $this->Session->write('cart', $cart);
              $this->redirect("/labezo_buyer/cart.html");
              } else {
              $product_details['options'] = $this->request->data('option_desc');
              $product_details['price'] = $this->request->data('price');
              $product_details['image'] = $this->request->data('image');
              $product_details['name'] = $this->request->data('pro_name');
              $product_details['quantity'] = $this->request->data('quantity');
              $product_details['model'] = $this->request->data('model');
              $product_details['product_id'] = $this->request->data('product_id');
              $cart[] = $product_details;
              $this->Session->write('cart', $cart);
              $this->redirect("/labezo_buyer/cart.html");
              }
              } */
            if ($this->request->data('form_name') == 'rating_form') {
                $this->buyer_model->ratings($this->request->data, $user_id);
            }
        }
        $this->set('cart_data', $this->Session->read('cart'));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
            $this->set('buyer', $this->buyer_model->viewBuyer($uid));
        } else {
            $this->set('user_id', '0');
        }
    }

    public function cart() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        //$this->set('product_val', $this->Session->read('cart'));
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
        } else {
            $this->set('user_id', '0');
        }
        $this->set('product_val', $this->buyer_model->viewCart($session_id, $user_id));

        /* if ($this->params['url']) {
          $id = $this->params['url']['id'];
          $cart = $this->Session->read('cart');
          for ($i = 0; $i < count($cart); $i++) {
          $product_id = $cart[$i]['product_id'];
          if ($product_id == $id) {
          unset($_SESSION['cart'][$i]);
          }
          }
          $this->redirect("/labezo_buyer/cart.html");
          } */
        if (isset($this->params['url']['cart_id'])) {
            $cart_id = $this->params['url']['cart_id'];
            $this->buyer_model->deletecart($cart_id);
            $this->redirect("/labezo_buyer/cart.html");
        }

        if ($this->request->is('post')) {
            $this->buyer_model->updateCart($this->request->data);
            $this->redirect("/labezo_buyer/cart.html");
        }
    }

    public function my_account() {
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            error_reporting(0);
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
            $data = $this->buyer_model->userProfile($uid);
            $this->set('result', $data);

            if ($this->request->is('post')) {
                $this->buyer_model->updateProfile($this->request->data, $uid);
                $this->redirect('/labezo_buyer/my_account.html');
            }
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function my_order() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('myorder', $this->buyer_model->myOrderDetail($user_id));
        if ($this->request->is('post')) {
            $this->buyer_model->setOrder($this->request->data);
            $this->redirect('/labezo_buyer/my_order.html');
        }
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function change_pwd() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');

            if ($this->request->is('post')) {
                $msg = $this->buyer_model->updatePassword($this->request->data, $uid);
                $this->set("message", $msg);
            }
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function address() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');

            $data = $this->buyer_model->userProfile($uid);
            $this->set('result', $data);

            if ($this->request->is('post')) {
                echo $this->buyer_model->updateAddress($this->request->data, $uid);
                $this->redirect("/labezo_buyer/address.html");
            }
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function profile_setting() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function update_email() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('view_data', $this->buyer_model->viewEmail($user_id));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
            if ($this->request->is('post')) {
                $this->buyer_model->updateEmailData($this->request->data, $uid);
            }
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function deactvate_account() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('result_data', $this->buyer_model->userProfile($user_id));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
            if ($this->request->is('post')) {
                $this->buyer_model->deactivateAccount($this->request->data, $uid);
                session_destroy();
                $this->redirect("/labezo_buyer/index.html");
            }
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function my_wishlist() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('wishlist', $this->buyer_model->wishlistViewData($user_id));
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function review_rating() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        $this->set('review', $this->buyer_model->reviewRating($user_id));
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function return_product() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        if ($this->request->is('post')) {
            $this->set('error_val', $this->buyer_model->returnProduct($this->request->data, $user_id));
        }
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
    }

    public function track() {
        error_reporting(0);
        $session_id = session_id();
        $user_id = $this->Session->read('uid');
        $this->set('cart_length', count($this->buyer_model->viewCart($session_id, $user_id)['cart']));
        $data = $this->buyer_model->viewCategory();
        $this->set('result', $data);
        if ($this->Session->check('uid')) {
            $this->set('user_id', $this->Session->read('uid'));
            $uid = $this->Session->read('uid');
        } else {
            $this->set('user_id', '0');
            $this->redirect("/labezo_buyer/index.html");
        }
        $url = $this->params['url']['order_id'];
        $this->set('order_tracker', $this->buyer_model->orderTracker($url));
    }

    public function wishlist_add_direct() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $this->buyer_model->wishlistAddDirect($this->request->data('id'), $this->request->data('product'));
        }
    }

    public function wishlist_remove() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $this->buyer_model->wishlistRemove($this->request->data('id'), $this->request->data('product'));
        }
    }

    public function login_information() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $data = $this->buyer_model->LoginInfo($this->request->data);
            if ($data == 0) {
                echo $data;
            } else {
                $this->Session->write('uid', $data);
                echo TRUE;
            }
        }
    }

    public function delete_whislist() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $this->buyer_model->deleteWishlist($this->request->data);
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect("/labezo_buyer/index.html");
    }

}
