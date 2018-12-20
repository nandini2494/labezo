<?php

echo "" ?>

<nav class="navbar navbar-inverse top-bar navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> <span class="menu-icon" id="menu-icon"><i class="fa fa-times" aria-hidden="true" id="chang-menu-icon"></i></span>
            <a class="pull-left class_pull_use_dvi" href="#"><!-- <img src="#" width="90%"> -->
                <h1>labezo</h1><div class='clearfix'></div>
                <div class='clearfix'></div>
            </a>
            <div class='clearfix'></div>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="myNavbar">

            <ul class="nav navbar-nav">
                <li class="">
                    <?php foreach ($profile_pic as $profile) { ?>
                    <a href="Profile.html" class="user-profile"> <span class=""><img class="img-responsive" src="<?php echo DOMAIN_NAME ?><?php echo $profile['seller']['profile_pic']; ?>"></span> </a>
                    <?php } ?>
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Edit          
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li> <a href="Profile.html"><i class="fa fa-user"></i> Profile</a> </li>

                        <li> <a href="<?php echo Router:: url(['controller' => 'sellerDashboards/logout']) ?>"><i class="fa fa-power-off"></i> Logout</a> </li>
                    </ul>
                </li>
                <li class=""><a href="#"><i class="fa fa-envelope"></i> <span class="badge">5</span></a> </li>
                <li class=""><a href="#"><i class="fa fa-bell"></i> <span class="badge">9</span></a> </li>
            </ul>
        </div>
    </div>
</nav>


<div id="myModal_track" class="modal fade" role="dialog">
    <input type="hidden" name="form_name" value="order_track_modal">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Track Your Order</h4>
            </div>
            <div class="modal-body">
                <div class='form-group'>
                    <label class='order_id_use'>Order Id</label><div class='clearfix'></div>
                    <span class='posit_use_over'><input type='text' name='order_id' id="order_val" placeholder='LAB0123'>
                        <button type="button" id="modal_form" title='Go Now'>Track</button>
                    </span><br/>
                    <div id="product_info">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>   
</div>

<?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>

<script>
    $("#modal_form").click(function () {
        var order = $("#order_val").val();
        $.ajax({
            url: "<?php echo Router::url(['controller' => 'sellerDashboards/order_track']); ?>",
            type: "post",
            data: {"order_id": order},
            success: function (data) {
                var response = JSON.parse(data);
                if (response.length == 0) {
                    $("#product_info").html("Invalid Order Id. This Order Id is not Available.");
                } else {
                    for (var i = 0; i < (response.length); i++) {
                        if (response[i].product_order.order_status == 0) {
                            var order_status = "Ordered";
                        } else if (response[i].product_order.order_status == 1) {
                            var order_status = "Delivered";
                        } else if (response[i].product_order.order_status == 2) {
                            var order_status = "Cancelled";
                        } else if (response[i].product_order.order_status == 3) {
                            var order_status = "Accepted";
                        } else if (response[i].product_order.order_status == 4) {
                            var order_status = "In progress";
                        } else if (response[i].product_order.order_status == 5) {
                            var order_status = "Shipped";
                        } else if (response[i].product_order.order_status == 6) {
                            var order_status = "Completed";
                        }
                        $("#product_info").html("Your Order Status is " + order_status);
                    }
                }
            }
        });
    });
</script>
