<?php defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($prods)) 
    $prods = $this->main->getAll('products', 'id, t_title, slug', ['is_deleted' => 0]);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title><?= ucwords($title) ?> | <?= APP_NAME ?></title>
        <?= link_tag('assets/images/favicon.png', 'shortcut icon', 'image/png') ?>
        <?= link_tag('assets/images/favicon.png', 'icon', 'image/png') ?>

        <?= link_tag("assets/css/bootstrap.min.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/fontawesome-all.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/flaticon.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/animate.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/video.min.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/jquery.mCustomScrollbar.min.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/rs6.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/slick.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/slick-theme.css", 'stylesheet', 'text/css') ?>
        <?= link_tag("assets/css/style.css", 'stylesheet', 'text/css') ?>
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.0.0/css/all.css">
    </head>
    <body class="organio-wrapper">
        <div id="preloader"></div>
        <div class="up">
            <a href="javascript:;" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
        </div>
        <!-- Start of header section ============================================= -->
        <header id="organio-header" class="organio-header-section header-style-two">
            <div class="organio-header-corona-slug text-center">
                <marquee>Due to the COVID 19 pandamic, our stuffs are maintaing health safety!</marquee>
            </div>
            <div class="or-header-search-wrapper">
                <div class="container">
                    <div class="or-header-search-wrapper-content d-flex justify-content-between align-items-center">
                        <div class="mobile_menu_button1 open_mobile_menu">
                            <i class="fal fa-bars"></i>
                        </div>
                        <div class="mobile_menu_wrap">
                            <div class="mobile_menu_overlay open_mobile_menu"></div>
                            <div class="mobile_menu_content">
                                <div class="mobile_menu_close open_mobile_menu">
                                    <i class="fal fa-times"></i>
                                </div>
                                <div class="m-brand-logo">
                                    <?= anchor('', img('assets/images/logo.png')); ?>
                                </div>
                                <nav class="mobile-main-navigation clearfix ul-li">
                                    <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                        <li><?= anchor("shop", "Shop"); ?></li>
                                        <li><?= anchor("about", "About"); ?></li>
                                        <li><?= anchor("special-features", "Special Features"); ?></li>
                                        <li><?= anchor("why-himabhi", "Why Himabhi"); ?></li>
                                        <?php foreach($prods as $p):
                                            echo "<li>".anchor($p['slug'], $p['t_title'])."</li>";
                                        endforeach ?>
                                        <li><?= anchor("contact", "Contact"); ?></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="site-logo">
                            <?= anchor('', img('assets/images/logo.png')); ?>
                        </div>
                        <div class="or-header-login-register d-flex">
                            <div class="login-register-button">
                                <?= anchor('login', '<i class="fa-solid fa-right-to-bracket"></i>', 'title="Login"'); ?>
                            </div>
                            <div class="or-header-e-commerce-btn">
                                <a href="tel:<?= $this->config->item('mobile') ?>" title="Call"><i class="fa-solid fa-mobile-notch"></i></a>
                                <a class="or-canvas-cart-trigger" href="cart"><i class="fal fa-shopping-cart"></i><span>03</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="mobile_menu position-relative">
                        <div class="mobile_menu_button open_mobile_menu">
                            <i class="fal fa-bars"></i>
                        </div>
                        <div class="mobile_menu_wrap">
                            <div class="mobile_menu_overlay open_mobile_menu"></div>
                            <div class="mobile_menu_content">
                                <div class="mobile_menu_close open_mobile_menu">
                                    <i class="fal fa-times"></i>
                                </div>
                                <div class="m-brand-logo">
                                    <?= anchor('', img('assets/images/logo.png')); ?>
                                </div>
                                <nav class="mobile-main-navigation  clearfix ul-li">
                                    <ul id="m-main-nav" class="navbar-nav text-capitalize clearfix">
                                        <li><?= anchor("shop", "Shop"); ?></li>
                                        <li><?= anchor("about", "About"); ?></li>
                                        <li><?= anchor("special-features", "Special Features"); ?></li>
                                        <li><?= anchor("why-himabhi", "Why Himabhi"); ?></li>
                                        <?php foreach($prods as $p):
                                            echo "<li>".anchor($p['slug'], $p['t_title'])."</li>";
                                        endforeach ?>
                                        <li><?= anchor("contact", "Contact"); ?></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- /Mobile-Menu -->
                    </div>
                </div>
            </div>
            <div class="or-header-main-menu">
                <div class="container">
                    <div class="or-header-category-menu-content d-flex justify-content-between">
                        <div class="or-header-category-title-navigation d-flex">
                            <div class="or-header-main-navigation ul-li">
                                <nav class="main-navigation-area">
                                    <ul class="menu-navigation">
                                        <li><?= anchor("shop", "Shop"); ?></li>
                                        <?php foreach($prods as $p):
                                            echo "<li>".anchor($p['slug'], $p['t_title'])."</li>";
                                        endforeach ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Start of Slider section ============================================= -->

        <?php if (isset($bread)): ?>
            <section id="or-breadcrumbs" class="or-breadcrumbs-section position-relative" data-background="<?= base_url('assets/images/bg-page-title.jpg') ?>">
                <div class="background_overlay"></div>
                <div class="container">
                    <div class="or-breadcrumbs-content text-center">
                        <div class="page-title headline"><h1><?= reset($bread) ?></h1></div>
                        <div class="or-breadcrumbs-items ul-li">
                            <ul>
                                <li><?= anchor("", "Home"); ?></li>
                                <li><?= end($bread) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif ?>
        
        <?= $contents ?>

        <section id="or-footer-3" class="or-footer-section-3" data-background="<?= base_url('assets/images/footer-bg.png') ?>">
            <div class="container">
                <div class="footer-widget-wrapper-3">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">	
                            <div class="or-footer-widget headline pera-content ul-li-block">
                                <div class="or-logo-widget">
                                    <?= anchor('', img('assets/images/logo.png')); ?>
                                    <p class="text-justify">Ayurvedic medicine is one of the world’s oldest holistic healing systems. It was developed more than 10,000 years ago in India.</p>
                                    <div class="footer-social">	
                                        <a href="https://www.facebook.com/himabhiayurveda/?hc_ref=ARSo3t45d1w_Qm4GU9wMrvSXvYm3KWU6Qizv-BL_hEd_8JkA2S-qy7vdPhsYylT43tY&fref=nf" target="_blank" tabindex="0"><i class="fab fa-facebook-f"></i></a>
                                        <a href="https://www.instagram.com/ayurvedhimabhi/?utm_medium=copy_link" target="_blank" tabindex="0"><i class="fab fa-instagram"></i></a>
                                        <a href="https://www.youtube.com/channel/UCeiLxnrgh88kf8SeaTNdRLA" target="_blank" tabindex="0"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">	
                            <div class="or-footer-widget  headline-2 pera-content ul-li-block">
                                <div class="or-menu-widget">
                                    <h2 class="widget-title">Our Products</h2>
                                    <ul>
                                        <?php foreach($prods as $p):
                                            echo "<li>".anchor($p['slug'], $p['t_title'])."</li>";
                                        endforeach ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">	
                            <div class="or-footer-widget  headline-2 pera-content ul-li-block">
                                <div class="or-menu-widget">
                                    <h2 class="widget-title">Quick Links</h2>
                                    <ul>
                                        <li><?= anchor('', "Home"); ?></li>
                                        <li><?= anchor('about', "About Us"); ?></li>
                                        <li><?= anchor('shop', "Shop"); ?></li>
                                        <li><?= anchor('shipping-policy', "Shipping Policy"); ?></li>
                                        <li><?= anchor('terms-and-conditions', "Terms And Conditions"); ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">	
                            <div class="or-footer-widget headline pera-content ul-li-block">
                                <div class="or-contact-widget">
                                    <h2 class="widget-title">Official info:</h2>
                                    <ul>
                                        <li><i class="fas fa-phone"></i> <span><?= $this->config->item('mobile') ?></span></li>
                                        <li><i class="fa-brands fa-whatsapp"></i> <span><?= $this->config->item('whatsapp') ?></span></li>
                                        <li><i class="fas fa-envelope"></i> <span> <?= $this->config->item('email') ?> </span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="or-footer-copyright-wrapper">
                <div class="container">
                    <div class="or-footer-copyright-wrapper  d-flex justify-content-between align-items-center">
                        <div class="or-footer-copyright-3">
                            @ 2022 <a href="https://www.himabhi.com/" target="_blank">Himabhi - Direct from Mother Nature</a>. Designed by <a href="https://visionartinfotech.com/" target="_blank">Vision Art Infotech</a>
                        </div>
                        <div class="footer-payment">
                            <?= img('assets/images/bg/payments.png'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
            }
        </script>
        <script type="text/javascript">
            const menuLinks = document.querySelectorAll(".menu-link");

            menuLinks.forEach((link) => {
                link.addEventListener("click", () => {
                    menuLinks.forEach((link) => {
                        link.classList.remove("is-active");
                    });
                    link.classList.add("is-active");
                });
            });
        </script>
        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
        <!-- For Js Library -->
        <?= script("assets/js/jquery.min.js") ?>
        <?= script("assets/js/bootstrap.min.js") ?>
        <?= script("assets/js/popper.min.js") ?>
        <?= script("assets/js/jquery.magnific-popup.min.js") ?>
        <?= script("assets/js/appear.js") ?>
        <?= script("assets/js/slick.js") ?>
        <?= script("assets/js/jquery.counterup.min.js") ?>
        <?= script("assets/js/waypoints.min.js") ?>
        <?= script("assets/js/jquery.mCustomScrollbar.concat.min.js") ?>
        <?= script("assets/js/wow.min.js") ?>
        <?= script("assets/js/imagesloaded.pkgd.min.js") ?>
        <?= script("assets/js/jquery.zoomit.min.js") ?>
        <?= script("assets/js/jquery.inputarrow.js") ?>
        <?= script("assets/js/parallax-scroll.js") ?>
        <?= script("assets/js/rbtools.min.js") ?>
        <?= script("assets/js/rs6.min.js") ?>
        <?= script("assets/js/script.js") ?>
    </body>
</html>