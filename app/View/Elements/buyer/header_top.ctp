
<?php if($user_id == '0') { ?>
<div class="header-top">
    <div class="container">
        <div class="top-left">
            <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
        </div>
        <div class="top-right">
            <!-- <ul class="cd-header-buttons">
                            
            </ul>  -->

            <ul>

                <!-- <li><a href="checkout.html">Checkout</a></li> -->
                <li><a href="login.html">Login</a></li>
                <li><a href="registered.html">Create Account </a></li>
                <!-- <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                <div id="cd-search" class="cd-search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="Search...">
                    </form>
                </div> -->	
            </ul>


        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php } else { ?>
<div class="header-top">
    <div class="container">
        <div class="top-left">
            <a href="#"> Help  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>
        </div>
        <div class="top-right">
            <!-- <ul class="cd-header-buttons">
                            
            </ul>  -->

            <ul>
                <!-- <li><a href="checkout.html">Checkout</a></li> -->
                <li><a href="my_account.html">Myaccount</a></li>                	
            </ul>

        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php } ?>
