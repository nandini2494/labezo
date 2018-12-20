<?php

Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
Router::connect('/index.html', array('controller' => 'pages', 'action' => 'index'));
Router::connect('/about.html', array('controller' => 'pages', 'action' => 'about'));
Router::connect('/faq.html', array('controller' => 'pages', 'action' => 'faq'));
Router::connect('/work.html', array('controller' => 'pages', 'action' => 'work'));
Router::connect('/sell.html', array('controller' => 'pages', 'action' => 'sell'));
Router::connect('/contact.html', array('controller' => 'pages', 'action' => 'contact'));
Router::connect('/term-contitions.html', array('controller' => 'pages', 'action' => 'term_conditions'));
Router::connect('/seller.html', array('controller' => 'pages', 'action' => 'seller'));
Router::connect('/buyer.html', array('controller' => 'pages', 'action' => 'buyer'));
Router::connect('/Privacy.html', array('controller' => 'pages', 'action' => 'privacy'));
Router::connect('/login.html', array('controller' => 'pages', 'action' => 'login'));

Router::connect('/labezo_buyer/index.html', array('controller' => 'buyers', 'action' => 'index'));
Router::connect('/labezo_buyer/products.html', array('controller' => 'buyers', 'action' => 'products'));
Router::connect('/labezo_buyer/mail.html', array('controller' => 'buyers', 'action' => 'mail'));
Router::connect('/labezo_buyer/checkout.html', array('controller' => 'buyers', 'action' => 'checkout'));
Router::connect('/labezo_buyer/login.html', array('controller' => 'buyers', 'action' => 'login'));
Router::connect('/labezo_buyer/registered.html', array('controller' => 'buyers', 'action' => 'registered'));
Router::connect('/labezo_buyer/single.html', array('controller' => 'buyers', 'action' => 'single'));
Router::connect('/labezo_buyer/cart.html', array('controller' => 'buyers', 'action' => 'cart'));
Router::connect('/labezo_buyer/order_confirm.html', array('controller' => 'buyers', 'action' => 'order_confirm'));
Router::connect('/labezo_buyer/order_cancel.html', array('controller' => 'buyers', 'action' => 'order_cancel'));
Router::connect('/labezo_buyer/forget.html', array('controller' => 'buyers', 'action' => 'forget'));

Router::connect('/labezo_buyer/my_account.html', array('controller' => 'buyers', 'action' => 'my_account'));
Router::connect('/labezo_buyer/my_order.html', array('controller' => 'buyers', 'action' => 'my_order'));
Router::connect('/labezo_buyer/change_pwd.html', array('controller' => 'buyers', 'action' => 'change_pwd'));
Router::connect('/labezo_buyer/address.html', array('controller' => 'buyers', 'action' => 'address'));
Router::connect('/labezo_buyer/profile_setting.html', array('controller' => 'buyers', 'action' => 'profile_setting'));
Router::connect('/labezo_buyer/update_email.html', array('controller' => 'buyers', 'action' => 'update_email'));
Router::connect('/labezo_buyer/deactvate_account.html', array('controller' => 'buyers', 'action' => 'deactvate_account'));
Router::connect('/labezo_buyer/review_rating.html', array('controller' => 'buyers', 'action' => 'review_rating'));
Router::connect('/labezo_buyer/track.html', array('controller' => 'buyers', 'action' => 'track'));
Router::connect('/labezo_buyer/my_wishlist.html', array('controller' => 'buyers', 'action' => 'my_wishlist'));
Router::connect('/labezo_buyer/return_product.html', array('controller' => 'buyers', 'action' => 'return_product'));

Router::connect('/sellerDashboard/index.html', array('controller' => 'sellerDashboards', 'action' => 'index'));
Router::connect('/sellerDashboard/Profile.html', array('controller' => 'sellerDashboards', 'action' => 'profile'));
Router::connect('/sellerDashboard/product_info.html', array('controller' => 'sellerDashboards', 'action' => 'product_info'));
Router::connect('/sellerDashboard/add_product.html', array('controller' => 'sellerDashboards', 'action' => 'add_product'));
Router::connect('/sellerDashboard/edit_product.html', array('controller' => 'sellerDashboards', 'action' => 'edit_product'));
Router::connect('/sellerDashboard/option.html', array('controller' => 'sellerDashboards', 'action' => 'option'));
Router::connect('/sellerDashboard/add_option.html', array('controller' => 'sellerDashboards', 'action' => 'add_option'));
Router::connect('/sellerDashboard/edit_option.html', array('controller' => 'sellerDashboards', 'action' => 'edit_option'));
Router::connect('/sellerDashboard/shipping.html', array('controller' => 'sellerDashboards', 'action' => 'shipping'));
Router::connect('/sellerDashboard/orders.html', array('controller' => 'sellerDashboards', 'action' => 'orders'));
Router::connect('/sellerDashboard/Set_offer.html', array('controller' => 'sellerDashboards', 'action' => 'set_offer'));
Router::connect('/sellerDashboard/rating.html', array('controller' => 'sellerDashboards', 'action' => 'rating'));
Router::connect('/sellerDashboard/return_order.html', array('controller' => 'sellerDashboards', 'action' => 'return_order'));
Router::connect('/sellerDashboard/add_offer.html', array('controller' => 'sellerDashboards', 'action' => 'add_offer'));
Router::connect('/sellerDashboard/labaso.html', array('controller' => 'sellerDashboards', 'action' => 'labaso'));
Router::connect('/sellerDashboard/return_order_admin.html', array('controller' => 'sellerDashboards', 'action' => 'return_order_admin'));

Router::connect('/admin/admin_index.html', array('controller' => 'admins', 'action' => 'admin_index'));
Router::connect('/admin/index.html', array('controller' => 'admins', 'action' => 'index'));
Router::connect('/admin/New_Orders.html', array('controller' => 'admins', 'action' => 'new_orders'));
Router::connect('/admin/Buyer.html', array('controller' => 'admins', 'action' => 'buyer'));
Router::connect('/admin/New_Seller.html', array('controller' => 'admins', 'action' => 'new_seller'));
Router::connect('/admin/Seller.html', array('controller' => 'admins', 'action' => 'seller'));
Router::connect('/admin/Category_Manage.html', array('controller' => 'admins', 'action' => 'category_manage'));
Router::connect('/admin/add_category.html', array('controller' => 'admins', 'action' => 'add_category'));
Router::connect('/admin/edit_category.html', array('controller' => 'admins', 'action' => 'edit_category'));
Router::connect('/admin/Product_Manage.html', array('controller' => 'admins', 'action' => 'product_manage'));
Router::connect('/admin/view_product.html', array('controller' => 'admins', 'action' => 'view_product'));
Router::connect('/admin/Option_Manage.html', array('controller' => 'admins', 'action' => 'option_manage'));
Router::connect('/admin/Shipping_Manage.html', array('controller' => 'admins', 'action' => 'shipping_manage'));
Router::connect('/admin/Return_Product.html', array('controller' => 'admins', 'action' => 'return_product'));
Router::connect('/admin/News_Latter.html', array('controller' => 'admins', 'action' => 'news_latter'));
Router::connect('/admin/Coupon_Code.html', array('controller' => 'admins', 'action' => 'coupon_code'));
Router::connect('/admin/Offer_Manage.html', array('controller' => 'admins', 'action' => 'offer_manage'));
Router::connect('/admin/add_coupon.html', array('controller' => 'admins', 'action' => 'add_coupon'));
Router::connect('/admin/seller_product.html', array('controller' => 'admins', 'action' => 'seller_product'));
Router::connect('/admin/Profile.html', array('controller' => 'admins', 'action' => 'Profile'));
Router::connect('/admin/image.html', array('controller' => 'admins', 'action' => 'image'));

CakePlugin::routes();

require CAKE . 'Config' . DS . 'routes.php';
