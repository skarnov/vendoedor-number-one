<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <meta name="robots" content="">
        <title><?php echo $title; ?></title>
        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <!-- Customizable CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/red.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">
        <!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            <!-- TOP NAVIGATION -->
            <nav class="top-bar animate-dropdown">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 no-margin">
                        <ul>
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>product/about">About</a></li>
                            <li><a href="<?php echo base_url(); ?>product/supplier">Our Supplier</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 no-margin">
                        <ul class="right">
                            <li class="dropdown">
                                <div id="google_translate_element" style="border: 1px solid red; width: 93%; "></div>
                                <script type="text/javascript">
                                    function googleTranslateElementInit() {
                                        new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,es,pt,zh-CN', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
                                    }
                                </script>
                                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>                          
                            </li>
                            <?php
                            $customer_id = $this->session->userdata('customer_id');
                            $customer_name = $this->session->userdata('customer_name');
                            if (!$customer_id) {
                                ?>
                                <li><a href="<?php echo base_url() ?>product/signup">Register</a></li>
                                <li><a href="#" data-toggle="modal" data-target="#basicModal">Login</a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="<?php echo base_url() ?>">Hello! <?php echo $customer_name; ?></a></li>
                                <li><a href="<?php echo base_url(); ?>user_administrator/logout">Logout</a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- TOP NAVIGATION : END -->
            <!-- HEADER -->
            <header>
                <div class="container no-padding">
                    <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                        <!-- LOGO -->
                        <div class="logo">
                            <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>images/logo.jpg"></a>
                        </div>
                        <!-- LOGO : END -->	
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
                        <div class="contact-row">
                            <div class="phone inline">
                                <i class="fa fa-phone"></i>  (+351) 915217259
                            </div>
                            <div class="contact inline">
                                <i class="fa fa-envelope"></i> info@<span class="le-color">vdn1.com</span>
                            </div>
                        </div>
                        <!-- SEARCH AREA -->
                        <div class="search-area">
                            <form action="<?php echo base_url() ?>product/search" method="POST">
                                <div class="control-group">
                                    <input class="search-field" required name="text" placeholder="Search for item" />
                                    <select name="category_id" class="categories-filter animate-dropdown search_button" tabindex="1">
                                        <option role="presentation" value="">Select Category</option>
                                        <?php
                                            foreach ($all_category as $v_category) {
                                        ?>
                                        <option name="category_id" value="<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></option>                                                 
                                        <?php
                                            }
                                        ?>
                                    </select>
                                    <button type="submit" class="search-button"></button>    
                                </div>
                            </form>                        
                        </div>
                        <!-- SEARCH AREA : END -->	
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
                        <div class="top-cart-row-container">
                            <div class="wishlist-compare-holder">
                                <div class="wishlist ">
                                    <a href="<?php echo base_url() ?>cart/show_cart"><i class="fa fa-heart"></i>  Cart <span class="value"></span> </a>
                                </div>
                                <div class="compare">
                                    <a href="<?php echo base_url() ?>product/checkout"><i class="fa fa-exchange"></i> Checkout <span class="value"></span> </a>
                                </div>
                            </div>
                                <?php
                                $subtotal = $this->cart->total();
                                $total = $subtotal;
                                $grand_total = $total;
                                $sdata = array();
                                $sdata['grand_total'] = $grand_total;
                                $this->session->set_userdata($sdata);
                                ?>
                            <!-- SHOPPING CART DROPDOWN -->
                            <div class="top-cart-holder dropdown animate-dropdown" id="shopping_button">
                                <div class="basket">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="basket-item-count">
                                            <span class="count"><?php echo $rows = count($this->cart->contents()); ?></span>
                                            <img src="<?php echo base_url() ?>assets/images/icon-cart.png" alt="" />
                                        </div>
                                        <div class="total-price-basket"> 
                                            <span class="lbl">your cart:</span>
                                            <span class="total-price">
                                                <span class="sign">&euro;</span><span class="value"><?php echo $total; ?></span>
                                            </span>
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $contents = $this->cart->contents();
                                        foreach ($contents as $v_contents) {
                                            ?>
                                            <li>
                                                <div class="basket-item">
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                            <div class="thumb">
                                                                <img alt="" src="<?php echo base_url() . $v_contents['image']; ?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-8 no-margin">
                                                            <div class="title">&nbsp; &nbsp;<?php echo $v_contents['name']; ?></div>
                                                            <div class="price">&nbsp; &nbsp; &euro;<?php echo $v_contents['subtotal']; ?></div>
                                                        </div>
                                                    </div>
                                                    <a class="close-btn" href="<?php echo base_url(); ?>cart/remove/<?php echo $v_contents['rowid']; ?>"></a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                        <li class="checkout">
                                            <div class="basket-item">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="<?php echo base_url(); ?>cart/show_cart" class="le-button inverse">View cart</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <?php
                                                        if ($total == NULL) {
                                                            ?>
                                                            <a href=""></a>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a class="le-button big" href="<?php echo base_url() ?>checkout">checkout</a>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- SHOPPING CART DROPDOWN : END  -->		
                    </div>
                </div>
            </header>
            <!-- HEADER : END -->
            <div id="top-banner-and-menu">
                <div class="container">
                    <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
                        <!-- TOP NAVIGATION -->
                        <div class="side-menu animate-dropdown">
                            <div class="head"><i class="fa fa-list"></i> product company</div>        
                            <nav class="yamm megamenu-horizontal" role="navigation">
                                <ul class="nav">
                                    <?php
                                    foreach ($all_company as $v_company) {
                                        ?>
                                    <li class="dropdown menu-item">
                                        <a href="#" class="dropdown-toggle" style="text-transform: capitalize;" data-toggle="dropdown"> <?php echo $v_company->company_name; ?></a>
                                        <ul class="dropdown-menu mega-menu">
                                            <li class="yamm-content">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <?php
                                                        foreach ($all_category as $v_category) {
                                                            if ($v_category->company_id == $v_company->company_id && $v_category->category_publication_status == '1') {
                                                                ?>
                                                                <ul class="list-unstyled">
                                                                    <li><a href="<?php echo base_url(); ?>product/product_listing/<?php echo $v_company->company_name; ?>/<?php echo $v_category->category_id; ?>"><?php echo $v_category->category_name; ?></a></li>
                                                                </ul>
                                                                <?php
                                                            }
                                                        }
                                                        ?> 
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                        <!-- TOP NAVIGATION : END -->	
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
                        <!-- SECTION – HERO -->
                        <div id="hero">
                            <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                                <?php
                                foreach ($all_slider as $v_slider) {
                                    ?>
                                    <div class="item" style="background-image: url(<?php echo base_url() . $v_slider->slider_image; ?>);">
                                        <div class="container-fluid">
                                            <div class="caption vertical-center text-left">
                                                <div class="big-text fadeInDown-1">
                                                    <?php echo $v_slider->slider_heading; ?>
                                                </div>
                                                <div class="excerpt fadeInDown-2">
                                                    <?php echo $v_slider->slider_subheading; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- SECTION – HERO : END -->			
                    </div>
                </div>
            </div>
            <div id="result" ><?php echo $maincontent; ?></div>
            <!-- FOOTER -->
            <footer id="footer" class="color-bg">
                <div class="link-list-row">
                    <div class="container no-padding">
                        <div class="col-xs-12 col-md-4 ">
                            <!-- CONTACT INFO -->
                            <div class="contact-info">
                                <div class="footer-logo">
                                    <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>images/logo.jpg"></a>
                                </div>
                                <p class="regular-bold"> Feel free to contact us via phone,email or just send us mail.</p>
                                <p>
                                    Mundo Espontâneo Adress - Rua Neves Ferreira Nº7 4Eº 1170-273 Nº Contributor - 513467009
                                </p>
                                <div class="social-icons">
                                    <h3>Get in touch</h3>
                                    <ul>
                                        <li><a href="http://facebook.com/transvelo" class="fa fa-facebook"></a></li>
                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                        <li><a href="#" class="fa fa-pinterest"></a></li>
                                        <li><a href="#" class="fa fa-linkedin"></a></li>
                                        <li><a href="#" class="fa fa-stumbleupon"></a></li>
                                        <li><a href="#" class="fa fa-dribbble"></a></li>
                                        <li><a href="#" class="fa fa-vk"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- CONTACT INFO : END -->   
                        </div>
                        <div class="col-xs-12 col-md-8 no-margin">
                            <section class="section sign-in inner-right-xs">
                                <form action="<?php echo base_url(); ?>user_manager/contact_us" method="POST" role="form" class="login-form cf-style-1">
                                    <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                                    <div class="field-row col-xs-6">
                                        <label>Name</label>
                                        <input type="text" required name="name" style="background-color: white; color: black; border: 1px solid red;" class="le-input">
                                    </div>
                                    <div class="field-row col-xs-6">
                                        <label>Email</label>
                                        <input type="email" required name="email" style="background-color: white; color: black; border: 1px solid red;" class="le-input">
                                    </div>
                                    <div class="field-row col-xs-12">
                                        <label>Message</label>
                                        <textarea name="message" class="le-input" style="background-color: white; color: black; border: 1px solid red;"></textarea>
                                    </div>
                                    <div class="buttons-holder col-xs-12">
                                        <button type="submit" class="le-button huge">Send</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="copyright-bar">
                    <div class="container">
                        <div class="col-xs-12 col-sm-6 no-margin">
                            <div class="copyright">
                                &copy; <a href="index.html">VDN1.com 2015</a> - all rights reserved
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 no-margin">
                            <div class="payment-methods ">
                                <a href="http://www.skshanto.com/" style="color:white;">Powered By Evis Technology</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- FOOTER : END -->
            <!-- ADD TO CART FAILED MODAL-->
            <div class="modal fade" id="add_to_cart_failed" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title red-text" id="myModalLabel">ADD TO CART FAILED</h4>
                        </div>
                        <div class="modal-body">
                            <h4 class="red-text">CHECKOUT FIRST !!</h4>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END OF ADD TO CART FAILED MODAL-->
            <!-- ADD TO CART MODAL-->
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModal" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Shopping Cart</h4>
                        </div>
                        <div class="modal-body">
                            <h3>Success!</h3>
                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" type="button" class="btn btn-primary">Continue Shopping</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END OF ADD TO CART MODAL-->
            <!--LOGIN ALERT BOX-->
            <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Login</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url() ?>user_administrator/customer_login_check" method="POST" role="form" class="login-form cf-style-1">
                                <h3 style="color:red">
                                    <?php
                                    $exc = $this->session->userdata('exception');
                                    if (isset($exc)) {
                                        echo $exc;
                                        $this->session->unset_userdata('exception');
                                    }
                                    ?>
                                </h3>
                                <div style="background-color:wheat;"><?php echo validation_errors(); ?></div><br/>
                                <div class="field-row">
                                    <label>Email</label>
                                    <input type="email" required name="customer_email" class="le-input">
                                </div>
                                <div class="field-row">
                                    <label>Password</label>
                                    <input type="password" required name="customer_password" class="le-input">
                                </div>
                                <div class="field-row clearfix">
                                    <span class="pull-left">
                                        <label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
                                    </span>
                                    <span class="pull-right">
                                        <a href="#" class="content-color bold">Forgotten Password ?</a>
                                    </span>
                                </div>
                                <div class="buttons-holder">
                                    <button type="submit" class="le-button huge">Secure Login</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <!--END OF LOGIN ALERT BOX-->
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/echo.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.easing-1.3.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
        <script type="text/javascript">
            var xmlhttp = false;
            try {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
            } 
            catch (e) {
                try {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (E) {
                xmlhttp = false;
                }
            }
            if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
            xmlhttp = new XMLHttpRequest();
            }
            function addToCart(productId)
            {
                quantity = document.getElementById('product_buy_quantity'+productId).value;
                if (productId) {
                serverPage = '<?php echo base_url(); ?>cart/ajax_add_to_cart/' + productId + '/' + quantity;
                xmlhttp.open("GET", serverPage);
                xmlhttp.onreadystatechange = function()
                {
                    document.getElementById('shopping_button').innerHTML = xmlhttp.responseText ; 
                }
                xmlhttp.send(null);
                }
            }
        </script>
    </body>
</html>