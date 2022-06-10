<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-contact-info" class="or-contact-info-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="or-contact-innerbox headline or-contact-innerbox-layout1">
                    <div class="item--inner bg-image">
                        <div class="item--icon icon-psb">
                            <i aria-hidden="true" class="flaticon-phone-call"></i>
                        </div>
                        <h4 class="item--title">Call us</h4>
                        <div class="item--description"><a href="tel:<?= $this->config->item('mobile') ?>"></a><?= $this->config->item('mobile') ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="or-contact-innerbox headline or-contact-innerbox-layout1">
                    <div class="item--inner bg-image">
                        <div class="item--icon icon-psb">
                            <i class="fa-brands fa-whatsapp"></i>
                        </div>
                        <h4 class="item--title">What's app</h4>
                        <div class="item--description"><a href="https://api.whatsapp.com/send?phone=<?= $this->config->item('whatsapp') ?>"></a><?= $this->config->item('whatsapp') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="or-contact-innerbox headline or-contact-innerbox-layout1">
                    <div class="item--inner bg-image">
                        <div class="item--icon icon-psb">
                            <i aria-hidden="true" class="flaticon-email"></i>
                        </div>
                        <h4 class="item--title">Write us:</h4>
                        <div class="item--description"><a href="mailto:<?= $this->config->item('email') ?>"><?= $this->config->item('email') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="or-contact-form" class="or-contact-form-section">
    <div class="container">
        <div class="or-contact-form-wrapper">
            <div class="or-section-title headline pera-content text-center middle-align">
                <span class="sub-title">Contact Us</span>
                <h2>Write us or send us massage if you have any query</h2>
            </div>
            <div class="or-contact-form-content">
                <?= $this->session->success ? '<div class="alert alert-success">'.$this->session->success.'</div>' : '' ?>
                <?= $this->session->error ? '<div class="alert alert-danger">'.$this->session->error.'</div>' : '' ?>
                <?= form_open(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <input type="text" name="name" maxlength="50" value="<?= set_value('name') ?>" placeholder="Your Name" />
                                <?= form_error('name') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <input type="email" name="email" maxlength="100" value="<?= set_value('email') ?>" placeholder="example@email.com" />
                                <?= form_error('email') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <input type="text" name="phone" maxlength="10" value="<?= set_value('phone') ?>" placeholder="your Cell number" />
                                <?= form_error('phone') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <input type="text" name="address" maxlength="150" value="<?= set_value('address') ?>" placeholder="your address" />
                                <?= form_error('address') ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="or-contact-input">
                                <textarea name="message" maxlength="500" placeholder="Message..."><?= set_value('message') ?></textarea>
                                <?= form_error('message') ?>
                            </div>
                        </div>
                    </div>
                    <div class="or-contact-btn text-center">
                        <button type="submit">Send your message</button>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>