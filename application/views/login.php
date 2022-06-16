<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-contact-form" class="or-contact-form-section mt-5">
    <div class="container">
        <div class="or-contact-form-wrapper">
            <div class="or-section-title headline pera-content text-center middle-align">
                <span class="sub-title">Login</span>
                <h2>By logged in you can purchase our products.</h2>
            </div>
            <div class="or-contact-form-content">
                <?= $this->session->success ? '<div class="alert alert-success">'.$this->session->success.'</div>' : '' ?>
                <?= $this->session->error ? '<div class="alert alert-danger">'.$this->session->error.'</div>' : '' ?>
                <?= form_open($redirect) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <input type="email" name="email" maxlength="100" value="<?= set_value('email') ?>" placeholder="example@email.com" />
                                <?= form_error('email') ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="or-contact-input">
                                <input type="password" name="password" maxlength="100" placeholder="Your Password" />
                                <?= form_error('password') ?>
                            </div>
                        </div>
                    </div>
                    <p>OR click <?= anchor($this->input->server('QUERY_STRING') ? 'register?'.$this->input->server('QUERY_STRING') : 'register', "Here", 'class="text-success"'); ?> to register</p>
                    <div class="or-contact-btn text-center">
                        <button type="submit">Sign In</button>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</section>