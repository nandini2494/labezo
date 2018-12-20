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
                    <?php foreach ($profile as $data) { 
                        if($data['admin']['profile_pic'] == '') {
                    ?>
                    <a href="Profile.html" class="user-profile"> <span class=""><img class="img-responsive" src="http://lorempixel.com/200/200/people/9/"></span> </a>
                    <?php } else { ?>
                    <a href="Profile.html" class="user-profile"> <span class=""><img class="img-responsive" src="<?php echo DOMAIN_NAME ?><?php echo $data['admin']['profile_pic'] ?>"></span> </a>
                    <?php } } ?>
                </li>
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#">Edit          
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li> <a href="Profile.html"><i class="fa fa-user"></i> Profile</a> </li>

                        <li> <a href="<?php echo Router:: url(['controller' => 'admins/logout']) ?>"><i class="fa fa-power-off"></i> Logout</a> </li>
                    </ul>
                </li>
                <li class=""><a href="#"><i class="fa fa-envelope"></i> <span class="badge">5</span></a> </li>
                <li class=""><a href="#"><i class="fa fa-bell"></i> <span class="badge">9</span></a> </li>
            </ul>
        </div>
    </div>
</nav>