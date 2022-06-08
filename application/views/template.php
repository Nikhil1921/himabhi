<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title><?= ucwords($title) ?> | <?= APP_NAME ?></title>
        <?= link_tag('assets/images/favicon.png', 'shortcut icon', 'image/png') ?>
        <?= link_tag('assets/images/favicon.png', 'icon', 'image/png') ?>

        <?= link_tag('assets/css/animate.min.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/all.min.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/bootstrap.min.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/magnific-popup.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/carousel.min.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/secrius-style.css', 'stylesheet', 'text/css') ?>
        <?= link_tag('assets/css/responsive.css', 'stylesheet', 'text/css') ?>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id="menu-4" class="menu-4">
            <nav class="navbar navbar-expand-lg top-nav navbar-fixed-top cbp-af-header" id="cssmenu">
                <div class="container navbar-collapse">
                    <div class="logo">
                        <?= anchor('', img('assets/images/logo.jpg'), 'class="header-logo"'); ?>
                    </div>
                    <div class="button"></div>
                    <ul class="navbar-nav ml-auto" id="nav">
                        <li>
                            <?= anchor('', "Home"); ?>
                        </li>
                        <li>
                            <?= anchor('about', " About Us"); ?>
                        </li>
                        <li>
                            <?= anchor('services', "Our Services"); ?>
                        </li>
                        <li>
                            <?= anchor('gallery', "Gallery"); ?>
                        </li>
                        <li>
                            <?= anchor('career', "Career"); ?>
                        </li>
                        <li>
                            <?= anchor('faq', "Faq"); ?>
                        </li>
                        <li>
                            <?= anchor('contact', "Contact"); ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <?php if (isset($bread)): ?>
        <div class="inner-page-hero-area bg-com jarallax">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-page-hero-text">
                            <div class="inner-page-title"><?= $bread ?></div>
                            <ul class="inner-page-u">
                                <li><?= anchor('', "Home", 'class="text-white"'); ?></li>
                                <li><?= $bread ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif ?>
        
        <?= $contents ?>

        <!-- Footer -->
        <footer id="footer-area" class="bg-black section-color bg-com pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="footer-copy-logo pb-70">
                            <li><a href="javascript:;"><?= img('assets/images/logo/logo3.jpg') ?></a></li>
                            <li><a href="javascript:;"><?= img('assets/images/logo/f1.png') ?></a></li>
                            <li><a href="javascript:;"><?= img('assets/images/logo/f2.png') ?></a></li>
                            <li><a href="javascript:;"><?= img('assets/images/logo/f3.png') ?></a></li>
                            <li><a href="javascript:;"><?= img('assets/images/logo/f4.png"') ?></a> </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget pt-40">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget-item mt-40">
                                <h6 class="footer-widget-title">About Us</h6>
                                <p>We have the skilled and qualified staffs to install the security system protects your
                                place and what </p>
                                <p>Skilled and qualified staffs to install the security system protects your place and what
                                are the recent.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget-item mt-40">
                                <h6 class="footer-widget-title">Useful links</h6>
                                <ul class="footer-link">
                                    <li>
                                        <?= anchor('', "Home"); ?>
                                    </li>
                                    <li>
                                        <?= anchor('about', " About Us"); ?>
                                    </li>
                                    <li>
                                        <?= anchor('services', "Our Services"); ?>
                                    </li>
                                    <li>
                                        <?= anchor('gallery', "Gallery"); ?>
                                    </li>
                                    <li>
                                        <?= anchor('career', "Career"); ?>
                                    </li>
                                    <li>
                                        <?= anchor('faq', "FAQ"); ?>
                                    </li>
                                    <li>
                                        <?= anchor('contact', "Contact"); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget-item mt-40">
                                <h6 class="footer-widget-title">SERVICES</h6>
                                <ul class="footer-link">
                                    <?php foreach ($this->config->item('services') as $k => $service): if($k === 6) break ?>
                                        <li>
                                            <?= anchor($service['slug'], $service['name']); ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="footer-widget-item mt-40">
                                <h6 class="footer-widget-title">SERVICES</h6>
                                <ul class="footer-link">
                                    <?php foreach ($this->config->item('services') as $k => $service): if($k <= 5) continue ?>
                                        <li>
                                            <?= anchor($service['slug'], $service['name']); ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
        <!-- Copy Right -->
        <div id="copy-right-area" class="section-color bg-black pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cta-text d-flex flex-lg-row flex-column align-items-center justify-content-start">
                            <div class="text-lg-left text-center">
                                <p>Proudly powered by Amaze Web Solutions</p>
                            </div>
                            <div class="ml-lg-auto">
                                <div class="d-flex flex-row align-items-center justify-content-center">
                                    <p>© Copyrights <?= date('Y') ?> Bulls Watch All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copy Right -->

        <!-- Top Preloader -->
        <div id="preloader">
            <div class="lds-css">
                <div class="preloader-3">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
        <!-- End Top Preloader -->

        <!-- Phone Icon -->
        <div class="phone quick-alo-phone">
            <a href="tel:<?= $this->config->item('mobile') ?>">
                <div class="quick-alo-ph-circle"></div>
                <div class="quick-alo-ph-circle-fill"></div>
                <div class="quick-alo-ph-img-circle"></div>
            </a>
        </div>
        <!-- Phone Icon -->

        <!-- Whatsapp Icon -->
        <a href="https://api.whatsapp.com/send?phone=<?= $this->config->item('mobile') ?>&text=Hello" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>

        <!-- Whatsapp Icon -->
        <?= script("assets/js/jquery-3.4.1.min.js") ?>
        <?= script("assets/js/bootstrap.min.js") ?>
        <?= script("assets/js/popper.min.js") ?>
        <?= script("assets/js/carousel.min.js") ?>
        <?= script("assets/js/wow.min.js") ?>
        <?= script("assets/js/parallax.min.js") ?>
        <?= script("assets/js/jquery.magnific-popup.min.js") ?>
        <?= script("assets/js/counter.js") ?>
        <?= script("assets/js/menu.js") ?>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <?= script("assets/js/secrius-script.js") ?>
        <!-- Modal -->
        <div id="responseModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Response Message</h3>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <h4 id="responseData"></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-1 hover-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
    </body>
</html>