
<div class="heder-bottom">
    <div class="container1">
        <div class="logo-nav">
            <div class="logo-nav-left">
            <!-- 	<h1><a href="index.html">Labaso <span>Shop anywhere</span></a></h1> -->
                <img src="<?php echo DOMAIN_NAME ?>img/small-logo.png" class="img-responsive">
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav nav1 navbar-nav navbar-nav1">
                            <li class="active"><a href="index.html" class="act">Home</a></li>	
                            <!-- Mega Menu -->
                            <?php foreach ($result['category'] as $data) { ?>                                                                                
                            <li class="dropdown">
                                <a href="#" class=""><?php echo $data['category_desc']['name'] ?><b class="caret"></b></a>

                                <?php $count = 0; foreach ($result['sub_category'] as $sub) {
                                    if($data['category_desc']['category_id'] == $sub['category']['parent_id']) {
                                        if($count == 0) { ?>
                                <ul class="dropdown-content custom_drop dropdown-menu dropdown-menu1 multi-column columns-3">
                                    <div class="row" id="category_data">
                                        <div class="col-sm-12  multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <?php $count++; } ?>

                                                <li><a href="products.html?category_id=<?php echo $sub['category']['category_id'] ?>&main_id=<?php echo $data['category_desc']['category_id'] ?>"><?php echo $sub['category_desc']['name'] ?></a></li>
                                                <?php  }   }                                                                                              
                                                if($count > 0) { ?>
                                            </ul>
                                        </div>


                                        <div class="clearfix"></div> 

                                    </div>

                                </ul>
                                <?php }  ?>                                                       

                            </li>
                            <?php } ?>                                       
                            <li><a href="mail.html">Contact Us</a></li>
                        </ul>

                    </div>
                </nav>
            </div>
            <!-- <div class="logo-nav-right">
                    
            </div> -->
            <div class="header-right2">
                <div class="cart box_1">
                    <a href="cart.html">
                        <h3> <div class="total">
                                <span class="simpleCart_total"></span> (<span class="simpleCart_quantity"><?php echo $cart_length ?></span> items)</div>
                            <img src="<?php echo DOMAIN_NAME ?>img/bag.png" alt="" />
                        </h3>
                    </a>                   
                    <div class="clearfix"> </div>
                </div>	
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#bs-megadropdown-tabs').children('ul').children('li').each(function () {
            if ($(this).children('ul').length == 0) {
                $(this).children('a').children('b').remove();
            }
        });
    });
</script>