<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class SellerDashboardsController extends AppController {

    public $components = array('Email');

    public function beforeFilter() {
        $this->loadModel('SellerDashboardsModel');
        $this->sellerDashboard_model = new SellerDashboardsModel();
        session_start();
    }

    public function index() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('wishlist_count', $this->sellerDashboard_model->countWishlist($user));
            $this->set('order_count', $this->sellerDashboard_model->countOrder($user));
            $this->set('total_amount', $this->sellerDashboard_model->totalAmount($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function profile() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $data = $this->sellerDashboard_model->userProfile($user);
            $this->set('profile', $data);
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));

            if ($this->request->is('post')) {
                $this->sellerDashboard_model->updateProfile($this->request->data, $user);
                $this->redirect("/sellerDashboard/Profile.html");
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function updateUser() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->updateProfile($this->request->data);
        }
    }

    public function product_info() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('data', $this->sellerDashboard_model->viewProduct($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                $this->set('data', $this->sellerDashboard_model->searchProduct($this->request->data));
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function option_desc() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo json_encode($this->sellerDashboard_model->option_view($this->request->data('id')));
        }
    }

    public function add_product() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            $this->set('option', $this->sellerDashboard_model->viewOption());
            $this->set('category', $this->sellerDashboard_model->viewMainCategory());
            if ($this->request->is('post')) {
                $this->sellerDashboard_model->addProduct($this->request->data, $user);
                $this->redirect("/sellerDashboard/product_info.html");
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function edit_product() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $id = $this->params['url']['id'];
            $this->set('option', $this->sellerDashboard_model->viewOption());
            $this->set('results', $this->sellerDashboard_model->productList($id));
            $this->set('category', $this->sellerDashboard_model->viewMainCategory());
            $this->set('category_value', $this->sellerDashboard_model->viewCategory());
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                $this->sellerDashboard_model->editProduct($this->request->data, $id);
                $this->redirect("/sellerDashboard/product_info.html");
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function delete_product_option() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->deleteProductOption($this->request->data('opt_id'));
        }
    }

    public function delete_product_desc() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->deleteProductDesc($this->request->data('opt_desc_id'));
        }
    }

    public function delete_option_desc() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->deleteOptionDesc($this->request->data('opt_desc'));
        }
    }

    public function option() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));

            $this->set('data', $this->sellerDashboard_model->viewOption());
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function add_option() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));

            if ($this->request->is('post')) {
                $this->sellerDashboard_model->addOption($this->request->data);
                $this->redirect("/sellerDashboard/option.html");
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function edit_option() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));

            if ($this->params['url']['id']) {
                $id = $this->params['url']['id'];
                $this->set('data', $this->sellerDashboard_model->viewOption_edit($id));

                if ($this->request->is('post')) {
                    $this->sellerDashboard_model->editOption($this->request->data, $id);
                    $this->redirect("/sellerDashboard/option.html");
                }
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function delete_option() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->deleteOption($this->request->data);
        }
    }

    public function shipping() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('order', $this->sellerDashboard_model->orderDetailsSeller($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                $this->set('order', $this->sellerDashboard_model->getProductShipped($this->request->data, $user));
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function labaso() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('order', $this->sellerDashboard_model->orderDetailsLabaso($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                if ($this->request->data('form_name') == 'labaso_form') {
                    $this->sellerDashboard_model->orderUpdateLabaso($this->request->data);
                    $this->redirect('/sellerDashboard/labaso.html');
                }
                if ($this->request->data('form_name') == 'search_data') {
                    $this->set('order', $this->sellerDashboard_model->getInfoLabaso($this->request->data, $user));
                }
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function orders() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('order', $this->sellerDashboard_model->orderDetails($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                if ($this->request->data('form_name') == 'update_val') {
                    $this->sellerDashboard_model->updateOrderDeliver($this->request->data);
                    $this->redirect('/sellerDashboard/orders.html');
                }
                if ($this->request->data('form_name') == 'search_order') {
                    $this->set('order', $this->sellerDashboard_model->getProductOrder($this->request->data, $user));
                }
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function set_offer() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('offer', $this->sellerDashboard_model->setOffer($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                if ($this->request->data('form_name') == 'set_offer') {
                    $this->set('offer', $this->sellerDashboard_model->getOfferInfo($this->request->data, $user));
                }
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function add_offer() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('product', $this->sellerDashboard_model->viewProduct($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if (isset($this->params['url']['id'])) {
                $id = $this->params['url']['id'];
                $this->set('offer_data', $this->sellerDashboard_model->viewOffer($id));
            }
            if ($this->request->is('post')) {
                if ($this->request->data('form_button') == 'Save') {
                    $this->sellerDashboard_model->addOffer($this->request->data, $user);
                    $this->redirect('/sellerDashboard/Set_offer.html');
                }
                if ($this->request->data('form_button') == 'Update') {
                    $this->sellerDashboard_model->editOffer($this->request->data, $id);
                    $this->redirect('/sellerDashboard/Set_offer.html');
                }
            }
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function delete_offer() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            $this->sellerDashboard_model->deleteOffer($this->request->data);
        }
    }

    public function rating() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('rating_data', $this->sellerDashboard_model->ratingView());
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    public function return_order() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('return_product', $this->sellerDashboard_model->returnProductSeller($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
            if ($this->request->is('post')) {
                $this->sellerDashboard_model->updateProduct($this->request->data);
                if ($this->request->data('select_list') == 'Amount transfered') {
                    $order_id = $this->request->data('order_id');
                    $email = $this->request->data('email');
                    $subject = "Amount Transfered";
                    $this->__sendEmail($email, $order_id, $subject);
                    $this->redirect("/sellerDashboard/return_order.html");
                } elseif ($this->request->data('select_list') == 'Completed') {
                    $this->sellerDashboard_model->updateReturnOrder($this->request->data);
                    $this->redirect("/sellerDashboard/return_order.html");
                } else {
                    $this->redirect("/sellerDashboard/return_order.html");
                }
            }
        } else {
            $this->redirect(['controller' => '/']);
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
        $this->Email->from = $email;
        $this->Email->send();
    }

    public function return_order_admin() {
        error_reporting(0);
        if ($this->Session->check('user_id')) {
            $user = $this->Session->read('user_id');
            $this->set('return_product', $this->sellerDashboard_model->returnProductAdmin($user));
            $this->set('profile_pic', $this->sellerDashboard_model->userImage($user));
        } else {
            $this->redirect(['controller' => '/']);
        }
    }

    /* public function add_product1() {
      if ($this->request->is('ajax')) {
      $this->autoRender = FALSE;
      $user = $this->Session->read('user_id');
      echo $this->sellerDashboard_model->addProduct($this->request->data, $user);
      }
      } */

    public function delete_product() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->deleteProduct($this->request->data);
        }
    }

    public function order_track() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->orderTrack($this->request->data('order_id'));
        }
    }

    public function change_category() {
        if ($this->request->is('ajax')) {
            $this->autoRender = FALSE;
            echo $this->sellerDashboard_model->viewSubCategory($this->request->data('category_id'));
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect(['controller' => '/']);
    }

}
