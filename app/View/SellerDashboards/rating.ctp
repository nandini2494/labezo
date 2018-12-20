<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labezo</title>
        <!-- Bootstrap include file -->
        <?php echo $this->Html->css('sellerDashboard/bootstrap.min.css') ?>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> 
        <?php echo $this->Html->css('sellerDashboard/custom.css') ?>
        <?php echo $this->Html->css('sellerDashboard/custom_font/stylesheet.css') ?>
        <?php echo $this->Html->css('sellerDashboard/rating.css') ?>
        <style>
            .rating_color {
                color:#1565c0 !important;
                font-size: 15px;
            }
            .slide-content{text-transform: capitalize;}
            .item .image_use{max-width: 55% !important;}
            .color_trans {background: transparent !important;}
        </style>
        <!-- new  -->
    </head>
    <body>
        <!-- custom first_page -->
        <!--top nav start=======-->
    <?php echo $this->Element('sellerDashboard/header') ?>
        <!--    top nav end===========-->
        <div class="wrapper" id="wrapper">
            <div class="left-container" id="left-container">
                <!-- begin SIDE NAV USER PANEL -->
                <div class="left-sidebar new_left_slide_bar" id="show-nav">
                    <ul class="side-nav">
                        <li>
                            <a href='index.html'> <span class="fa fa-dashboard"></span> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href='Profile.html'><span class="icon-profile_edit_icon"></span> Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href='product_info.html'><span class="icon-Product_info"></span> Product Information
                            </a>
                        </li>
                        <li>
                            <a href='option.html'><span class="fa fa-tasks"></span> Option
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#myModal_track"><span class="icon-tranck-order"></span> Track Products
                            </a>
                        </li>
                        <li>
                            <a href='shipping.html'><span class="fa fa-credit-card"></span> Shipping Method
                            </a>
                        </li> 
                        <li>
                            <a href='orders.html'> <span class="fa fa-book" aria-hidden="true"></span> Orders
                            </a>
                        </li>
                        <li>
                            <a href='Set_offer.html'> <span class="fa fa-gift" aria-hidden="true"></span> Set Offers
                            </a>
                        </li> 
                        <li>
                            <a href='rating.html' class="active"> <span class="icon-rating_and_review"></span> Ratting and Reviews</a>
                        </li> 
                        <li>
                            <a href='return_order.html'>
                                <span class="icon-return_order"></span>
                                Return Orders</a>
                        </li>
                    </ul> 

                    <div class='clearfix'></div>
                </div>
                <!-- END SIDE NAV USER PANEL -->
            </div>
            <div class="right-container" id="right-container">

                <div class='container-fluid'>

                    <div class="">
                        <div class="">
                            <div class="col-xs-10 col-xs-offset-1">
                                <h4>Ratting and Reviews <i class="fa fa-star raiting_row" aria-hidden="true"></i> by <a href="#" class="btn btn-primary btn-xs" target="_blank"><span class="icon-rating_and_review"></span>Visitors</a></h4>
                            </div>
                        </div>
                        <hr>
                        <!-- Begin of rows -->
                        <div class="row carousel-row">
                            <?php if(count($rating_data) > 0) {
                            foreach ($rating_data as $rating) { ?>
                            <div class="col-xs-10 col-xs-offset-1 slide-row">
                                <div id="carousel-1" class="carousel slide slide-carousel" data-ride="carousel">
                                    <!-- Indicators -->
                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">
                                        <div class="item active color_trans">
                                            <?php if(!empty($rating['product']['image'])) { ?>
                                            <img src="<?php echo DOMAIN_NAME ?><?php echo $rating['product']['image'] ?>" class="image_use" alt="Image" title='produc_image'/>
                                            <?php } else { ?>
                                            <img src="http://lorempixel.com/150/150?rand=1" alt="Image" title='produc_image'/>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="slide-content">
                                    <h4><?php echo $rating['review']['name'] ?></h4>
                                    <p><div class="starrr rating_color" data-rating='<?php echo $rating['review']['rating'] ?>'></div></p>
                                    <p>
                                        <?php echo $rating['review']['message'] ?>
                                    </p>
                                </div>
                                <div class="slide-footer">
                                    <span class='pull-left'>
                                        <h5><strong>&nbsp;&nbsp;<?php echo $rating['review']['email'] ?></strong></h5>
                                    </span>

                                </div>
                            </div>    
                            <?php } } else { ?>
                            <div class="col-xs-10 col-xs-offset-1 slide-row">
                                <h5><strong><center>No Records Found</center></strong></h5>
                            </div>
                            <?php } ?>
                        </div>


                    </div>       


                </div>

            </div>


            <div class="col-md-12">
                <div class="clearfix"></div>
                <ul class="pagination pull-right">
                    <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                </ul>
            </div>

        </div>

<!-- custom first_page end -->
<?php echo $this->Html->script('sellerDashboard/latest_jquery.js') ?>

<script>
    $(document).ready(function () {
        $('#show_text').click(function () {
            ('#serech_show').show()
        });
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?php echo $this->Html->script('sellerDashboard/old_jauery.js') ?>

<script>
    var __slice = [].slice;

    (function ($, window) {
        var Starrr;

        Starrr = (function () {
            Starrr.prototype.defaults = {
                rating: void 0,
                numStars: 5,
                change: function (e, value) {}
            };

            function Starrr($el, options) {
                var i, _, _ref,
                        _this = this;

                this.options = $.extend({}, this.defaults, options);
                this.$el = $el;
                _ref = this.defaults;
                for (i in _ref) {
                    _ = _ref[i];
                    if (this.$el.data(i) != null) {
                        this.options[i] = this.$el.data(i);
                    }
                }
                this.createStars();
                this.syncRating();

                this.$el.on('starrr:change', this.options.change);
            }

            Starrr.prototype.createStars = function () {
                var _i, _ref, _results;

                _results = [];
                for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                    _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty rating_color'></span>"));
                }
                return _results;
            };

            Starrr.prototype.setRating = function (rating) {
                if (this.options.rating === rating) {
                    rating = void 0;
                }
                this.options.rating = rating;
                this.syncRating();
                return this.$el.trigger('starrr:change', rating);
            };

            Starrr.prototype.syncRating = function (rating) {
                var i, _i, _j, _ref;

                rating || (rating = this.options.rating);
                if (rating) {
                    for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                    }
                }
                if (rating && rating < 5) {
                    for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                        this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                    }
                }
                if (!rating) {
                    return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            };

            return Starrr;

        })();
        return $.fn.extend({
            starrr: function () {
                var args, option;

                option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
                return this.each(function () {
                    var data;

                    data = $(this).data('star-rating');
                    if (!data) {
                        $(this).data('star-rating', (data = new Starrr($(this), option)));
                    }
                    if (typeof option === 'string') {
                        return data[option].apply(data, args);
                    }
                });
            }
        });
    })(window.jQuery, window);

    $(function () {
        return $(".starrr").starrr();
    });

    $(document).ready(function () {

        $('#hearts').on('starrr:change', function (e, value) {
            $('#count').html(value);
        });

        $('#hearts-existing').on('starrr:change', function (e, value) {
            $('#count-existing').html(value);
        });
    });
</script>

<?php echo $this->Html->script('sellerDashboard/custom.js') ?>
<?php echo $this->Html->script('sellerDashboard/bootstrap.min.js') ?>

</body>
</html>