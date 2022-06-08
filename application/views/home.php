<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="home-three-hero">
    <div class="hero-three-slider owl-carousel owl-theme">
        <?php foreach ($banners as $banner): ?>
        <div class="hero-three-item bg-com" style="background-image: url(<?= base_url($banner) ?>);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="hero-three-text text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</section>
<section id="installation-area" class="pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 installation-col">
                <div class="installation-img">
                    <?= img("assets/images/about.png") ?>
                </div>
            </div>
            <div class="col-lg-6 installation-col">
                <div class="installation-content">
                    <h2 class="hading-title">Welcome to Bulls Watch
                    <span>Security Services & Surveillance Squad </span> </h2>
                    <p>We are having 10+ Years Experience in Security Services. We offer Highly Educated & Trained Staff to our clients all over Gujarat. Our security professional work round the clock towards the common objective of protecting the assets, property and life. With a sharp focus on security, we extend our services in close co-operation with customer providing specialized and customized security solutions.</p>
                    <ul class="twocolumn list-icons">
                        <li>Security Guard</li>
                        <li>Event Management</li>
                        <li>Gun-Man</li>
                        <li>Surveillance Staff</li>
                        <li>Bouncer</li>
                    </ul>
                    <?= anchor('about', 'About Us', 'class="btn-1 hover-effect"'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="services-area" class="pt-80 pb-80 inner-services-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="hading-title">Our <span>Services</span></h2>
            </div>
            <?php foreach ($this->config->item('services') as $k => $service): ?>
            <div class="col-lg-4 col-sm-6">
                <div class="services-item wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <?= anchor($service['slug'], img($this->config->item('service').$service['image']).'<h5 class="services-title-title">'.$service['name'].'</h5>'); ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<section id="inquery" class="quote-four-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-6 col-md-12">
                <div class="quote-content">
                    <h4>Request a Quote</h4>
                    <form class="hero-form" id="contact-form" method="post">
                        <div class="form-group">
                            <input type="text" name="name" maxlength="100" class="hero-input-box" placeholder="Name" />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" maxlength="100" class="hero-input-box" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" maxlength="10" class="hero-input-box" placeholder="Phone Number" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="company" maxlength="50" class="hero-input-box" placeholder="Company" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="requirements" maxlength="255" class="hero-input-box" placeholder="Requirements" />
                        </div>
                        <button type="submit" class="btn-4 hover-effect">submit request</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>