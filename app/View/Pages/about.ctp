<!DOCTYPE html>
<html>    
    <head>
        <title>Labezo</title>
        <!--  <meta charset="utf-8"> -->

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Moleskine Notebook with jQuery Booklet" />
        <meta name="keywords" content="jquery, book, flip, pages, moleskine, booklet, plugin, css3 "/>
        <!--my css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <?php echo $this->Html->css('style.css') ?>
        <?php echo $this->Html->css('font/stylesheet.css') ?>
        <?php echo $this->Html->css('responsive.css') ?> 
        <?php echo $this->Html->css('css1/style.css') ?>
        <?php echo $this->Html->css('booklet/jquery.booklet.1.1.0.css') ?>
        <!--end my css-->
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
        <?php echo $this->Html->script('booklet/jquery.easing.1.3.js') ?>
        <?php echo $this->Html->script('booklet/jquery.booklet.1.1.0.min.js') ?>

        <script type="text/javascript">
            Cufon.replace('h1,p,.b-counter');
            Cufon.replace('.book_wrapper a', {hover: true});
            Cufon.replace('.title', {textShadow: '1px 1px #C59471'});
            Cufon.replace('.reference a', {textShadow: '1px 1px #C59471'});
            Cufon.replace('.loading', {textShadow: '1px 1px #000'});
        </script>
    </head>
    <body>
        <header class="Menu_bar_2">
            <div class="Menu_bar">
                <div class="Menu_bar_left">
                    <image src="<?php echo DOMAIN_NAME ?>img/small-logo.png" class="img-responsive"/>
                </div>
                <nav>
                    <a href="#" id="menu-icon"></a>
                    <ul>
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="faq.html">Help & Faq</a></li>
                        <li><a href="work.html">Work At Labezo</a></li>
                        <li><a href="sell.html">Sell With Us</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="login.html">Login</a></li>
                        <li class="dropdown"><a href="#">Select Country </a>
                            <ul class="dropdown-content drop">
                                <li><a href=""><img src="<?php echo DOMAIN_NAME ?>img/Hongkong.png"/> Hongkong</a></li>
                                <li><a href=""><img src="<?php echo DOMAIN_NAME ?>img/Mexico.png"/> Mexico</a></li>
                                <li><a href=""><img src="<?php echo DOMAIN_NAME ?>img/Philippines.png"/> Philippines</a></li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>

        <div class="book_wrapper">
            <a id="next_page_button"></a>
            <a id="prev_page_button"></a>
            <div id="loading" class="loading">Loading pages...</div>
            <div id="mybook" style="display:none;">
                <div class="b-load">
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/1.jpg" alt=""/>
                        <h1>About US</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/1.jpg" alt="" />
                        <h1>Who We Are</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release .</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/3.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p>of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/4.jpg" alt="" />
                        <h1>Our Vision</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/4.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/4.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/7.jpg" alt="" />
                        <h1>Our Mission</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/7.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/7.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/7.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/11.jpg" alt="" />
                        <h1>Testimonial</h1>
                        <p><i>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."</i></p>
                        <small class="pull-right"><b>Mp Sharma</b></small>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/11.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p><i>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."</i></p>
                        <small class="pull-right"><b>Mp Sharma</b></small>

                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/11.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p><i>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."</i></p>
                        <small class="pull-right"><b>Mp Sharma</b></small>
                    </div>
                    <div>
                        <img src="<?php echo DOMAIN_NAME ?>img/11.jpg" alt="" />
                        <h1>&nbsp;</h1>
                        <p><i>"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."</i></p>
                        <small class="pull-right"><b>Mp Sharma</b></small>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <div class="start">
        <div class="selling">
            <h2>Start selling today!</h2>
            <p><a class="button" href="sell.html">Sign Up Now</a></p>
        </div>
    </div>
    <div class="clearfix"></div>
    <footer>
        <div class="footer-top">
            <div class="footer_menu">
                <ul>
                    <li><a href="term-conitions.html">Term And Contitions</a></li>
                    <li><a href="seller.html">Seller Policy</a></li>
                    <li><a href="buyer.html">Buyer Policy</a></li>
                    <li><a href="Privacy.html">Privacy Policy</a></li>
                    <li><a href="faq.html">Help & Faq</a></li>
                    <li><a href="sell.html">Sell With Us</a></li>
                </ul>
            </div>
            <div class="footer-logo">
                <img src="<?php echo DOMAIN_NAME ?>img/small-logo.png" class="img-responsive">
            </div>
            <div class="clearfix"></div>
            <div class="social_icon">
                <ul>
                    <li><img src="<?php echo DOMAIN_NAME ?>img/fb.png" class="img-responsive"></li>
                    <li><img src="<?php echo DOMAIN_NAME ?>img/twitter-icon.png" class="img-responsive"></li>
                    <li><img src="<?php echo DOMAIN_NAME ?>img/in.png" class="img-responsive"></li>
                    <li><img src="<?php echo DOMAIN_NAME ?>img/google.png" class="img-responsive"></li>
                </ul>
            </div>
        </div>
    </footer>
    <div class="clearfix"></div>
    <div class="copy_right">
        <p>© 2017 . All Rights Reserved  <a href="http://www.acumaxtechnologies.com/">AcumaxTechnologies</a></p>
    </div>

    <script>
        $("document").ready(function () {
            $(window).bind("scroll", function () {
                if ($(window).scrollTop() > 300) {

                    $(".Menu_bar").addClass('Menu_bar_fixed');

                } else
                {
                    $(".Menu_bar").removeClass('Menu_bar_fixed');
                }

            });

        });
    </script>



    <script type="text/javascript">
        $(function () {
            var $mybook = $('#mybook');
            var $bttn_next = $('#next_page_button');
            var $bttn_prev = $('#prev_page_button');
            var $loading = $('#loading');
            var $mybook_images = $mybook.find('img');
            var cnt_images = $mybook_images.length;
            var loaded = 0;
            //preload all the images in the book,
            //and then call the booklet plugin

            $mybook_images.each(function () {
                var $img = $(this);
                var source = $img.attr('src');
                $('<img/>').load(function () {
                    ++loaded;
                    if (loaded == cnt_images) {
                        $loading.hide();
                        $bttn_next.show();
                        $bttn_prev.show();
                        $mybook.show().booklet({
                            name: null, // name of the booklet to display in the document title bar
                            width: 800, // container width
                            height: 500, // container height
                            speed: 600, // speed of the transition between pages
                            direction: 'LTR', // direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left
                            startingPage: 0, // index of the first page to be displayed
                            easing: 'easeInOutQuad', // easing method for complete transition
                            easeIn: 'easeInQuad', // easing method for first half of transition
                            easeOut: 'easeOutQuad', // easing method for second half of transition

                            closed: true, // start with the book "closed", will add empty pages to beginning and end of book
                            closedFrontTitle: null, // used with "closed", "menu" and "pageSelector", determines title of blank starting page
                            closedFrontChapter: null, // used with "closed", "menu" and "chapterSelector", determines chapter name of blank starting page
                            closedBackTitle: null, // used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page
                            closedBackChapter: null, // used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page
                            covers: false, // used with  "closed", makes first and last pages into covers, without page numbers (if enabled)

                            pagePadding: 10, // padding for each page wrapper
                            pageNumbers: true, // display page numbers on each page

                            hovers: false, // enables preview pageturn hover animation, shows a small preview of previous or next page on hover
                            overlays: false, // enables navigation using a page sized overlay, when enabled links inside the content will not be clickable
                            tabs: false, // adds tabs along the top of the pages
                            tabWidth: 60, // set the width of the tabs
                            tabHeight: 20, // set the height of the tabs
                            arrows: false, // adds arrows overlayed over the book edges
                            cursor: 'pointer', // cursor css setting for side bar areas

                            hash: false, // enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with 'hash' enabled
                            keyboard: true, // enables navigation with arrow keys (left: previous, right: next)
                            next: $bttn_next, // selector for element to use as click trigger for next page
                            prev: $bttn_prev, // selector for element to use as click trigger for previous page

                            menu: null, // selector for element to use as the menu area, required for 'pageSelector'
                            pageSelector: false, // enables navigation with a dropdown menu of pages, requires 'menu'
                            chapterSelector: false, // enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires 'menu'

                            shadows: true, // display shadows on page animations
                            shadowTopFwdWidth: 166, // shadow width for top forward anim
                            shadowTopBackWidth: 166, // shadow width for top back anim
                            shadowBtmWidth: 50, // shadow width for bottom shadow

                            before: function () {}, // callback invoked before each page turn animation
                            after: function () {}                     // callback invoked after each page turn animation
                        });
                        Cufon.refresh();
                    }
                }).attr('src', source);
            });

        });
    </script>
</body>
</html>