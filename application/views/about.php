<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="inner-about-area pt-120 pb-120">
    <div class="container">
        <div class="row">
            <h2 class="hading-title">Welcome to Bulls Watch <span>Security Services</span> &amp; Surveillance Squad</h2>
            <div class="col-lg-6">
                <div class="inner-about-text">
                    <p>We are having 10+ Years Experience in Security Services. We offer Highly Educated & Trained Staff to our clients all over Gujarat. Our security professional work round the clock towards the common objective of protecting the assets, property and life. With a sharp focus on security, we extend our services in close co-operation with customer providing specialized and customized security solutions.</p>
                    <p>We also provide special security services and private investigation services to clients as per their specific requirement.We also provide armed security personnel licensed to carry guns or pistols to select clients like banks and celebrities/individuals who have threat risk to their life.</p>
                    <p>Bouncers are capable of handle out when the situations turn problematic. Enhance security of your place with Bouncer Servicesprovided by us. It would also help you to add a new feature of safety making it most preferred.</p> 
                    <ul class="twocolumn list-icons">
                        <li>Security Guard</li>
                        <li>Event Management</li>
                        <li>Gun-Man</li>
                        <li>Vigilance Staff</li>
                        <li>Bouncer</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="inner-about-quote">
                    <div class="installation-img">
                        <?= img('assets/images/about.png'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="clint-review-area" class="clint-review-c pt-80 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="hading-title">Welcome to Bulls Watch <span>Security Services</span> &amp; Surveillance Squad</h2>
            </div>
        </div>
        <!-- Clint Review -->
        <div class="row">
            <div class="col-lg-12">
                <div class="clint-review-slider owl-carousel owl-theme">
                    <?php foreach ($testimonials as $test): ?>
                    <div class="clint-review-item">
                        <div class="clint-review-text">
                            <h6><?= $test['t_title'] ?> ! </h6>
                            <p><?= $test['description'] ?></p>
                            <div class="clint-name"><i class="fas fa-quote-left"></i> <?= $test['t_name'] ?></div>
                        </div>
                        <div class="clint-review-img">
                            <?= img($test['image']) ?>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hading-title">Customer <span>Review</span></div>
                <form method="POST" id="contact-form" class="contact-form-box row">
                    <div class="col-lg-6 mt-4">
                        <input type="text" name="name" class="name-box" placeholder="Name" required="" />
                    </div>
                    <div class="col-lg-6 mt-4">
                        <input type="text" name="t_title" class="name-box" placeholder="Title" required="" />
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="image" required="">
                            <label class="custom-file-label" for="image">You can attach : .jpg, .jpeg, .png extensions only*</label>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <textarea name="message" class="review_placeholder" id="message-box" placeholder="Review" required=""></textarea>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn-1 message-send hover-effect mt-3">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>