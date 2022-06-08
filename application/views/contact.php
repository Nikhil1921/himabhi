<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="contact-area pt-120 pb-120">
    <div class="container">
        <div class="row contact_main">
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p><?= $this->config->item('address') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:<?= $this->config->item('email') ?>"><?= $this->config->item('email') ?></a><br><br>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p><a href="tel:<?= $this->config->item('mobile') ?>"><?= $this->config->item('mobile') ?></a></p><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                    <div class="border-bottom border-top pb-30 pt-35">
                        <h2>Bank Details</h2>
                        <div class="trainers-information">
                            <ul>
                                <li><span>Bank Name:</span> <?= $this->config->item('bank')['name'] ?></li>
                                <li><span>Bank Branch:</span> <?= $this->config->item('bank')['branch'] ?></li>
                                <li><span>Account Number:</span> <?= $this->config->item('bank')['acc_no'] ?></li>
                                <li><span>IFSC Code:</span> <?= $this->config->item('bank')['ifsc'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="col-lg-12 pt-40 pb-30 border-bottom">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped product-table text-center">
                        <thead>
                            <tr>
                                <th><strong>Security Lic. No.</strong></th>
                                <th><strong>GST</strong></th>
                                <th><strong>PF No.</strong></th>
                                <th><strong>ESI No.</strong></th>
                                <th><strong>Labour Lic. No.</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>-</td>
                                <td><?= $this->config->item('gst') ?></td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hading-title">Get In <span>Touch</span></div>
                <form method="POST" id="contact-form" class="contact-form-box row">
                    <div class="col-lg-6  mt-4">
                        <input type="text" maxlength="100" name="name" class="name-box" placeholder="Name" required>
                    </div>
                    <div class="col-lg-6  mt-4">
                        <input type="email" maxlength="100" name="email" class="name-box" placeholder="Email Address" required>
                    </div>
                    <div class="col-lg-6  mt-4">
                        <input type="text" maxlength="10" name="phone" class="name-box" placeholder="Phone Number" required>
                    </div>
                    <div class="col-lg-6  mt-4">
                        <input type="text" maxlength="50" name="company" class="name-box" placeholder="Company" required>
                    </div>
                    <div class="col-lg-6  mt-4">
                        <input type="text" maxlength="255" name="requirements" class="name-box" placeholder="Requirements" required>
                    </div>
                    <div class="col-lg-12 mt-4">
                    <textarea maxlength="255" name="message" id="message-box" placeholder="Message" required></textarea></div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn-1 message-send hover-effect">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-20">
            <div class="col-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.3253727950305!2d72.56793871437482!3d23.048529921142556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8462faf3a6af%3A0xe826666f252a048b!2sKirti%20Sagar%20Complex%2C%20Ravjikaka%20Rd%2C%20near%20aroma%20school%2C%20Shanti%20Nagar%2C%20Usmanpura%2C%20Ahmedabad%2C%20Gujarat%20380013!5e0!3m2!1sen!2sin!4v1652354530756!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>