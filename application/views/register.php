<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-contact-form" class="or-contact-form-section mt-5">
    <div class="container">
        <div class="or-contact-form-wrapper">
            <div class="or-section-title headline pera-content text-center middle-align">
                <span class="sub-title">Register</span>
                <h2>By register you can purchase our products.</h2>
            </div>
            <div class="or-contact-form-content">
                <?= form_open($redirect) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <label for="f_name">First name *</label>
                                <input type="text" name="f_name" id="f_name" maxlength="20" value="<?= set_value('f_name') ?>" />
                                <?= form_error('f_name') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <label for="l_name">Last name *</label>
                                <input type="text" name="l_name" id="l_name" maxlength="20" value="<?= set_value('l_name') ?>" />
                                <?= form_error('l_name') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <label for="mobile">Mobile *</label>
                                <input type="text" name="mobile" id="mobile" maxlength="10" value="<?= set_value('mobile') ?>" />
                                <?= form_error('mobile') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <label for="email">Email ID *</label>
                                <input type="email" name="email" id="email" maxlength="100" value="<?= set_value('email') ?>" />
                                <?= form_error('email') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <label for="password">Password *</label>
                                <input type="password" name="password" id="password" maxlength="100" />
                                <?= form_error('password') ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="or-contact-input">
                                <label for="address">Address *</label>
                                <textarea name="address" id="address"><?= set_value('address') ?></textarea>
                                <?= form_error('address') ?>
                            </div>
                        </div>
                    </div>
                    <div class="or-contact-btn text-center">
                        <button type="submit">Register</button>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>