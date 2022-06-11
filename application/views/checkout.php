<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-checkout" class="or-checkout-section">
    <div class="container">
        <div class="or-checkout-form-area">
            <div class="row">
                <?php if($this->cart->contents()): ?>
                    <div class="col-lg-6">
                        <div class="or-checkout-form headline pera-content">
                            <h2>Billing Details</h2>
                            <?= form_open('', 'id="checkout-form"') ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="or-bill-form">
                                        <label for="f_name">First name *</label>
                                        <input type="text" name="f_name" id="f_name" maxlength="20" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="or-bill-form">
                                        <label for="l_name">Last name *</label>
                                        <input type="text" name="l_name" id="l_name" maxlength="20" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="or-bill-form">
                                        <label for="mobile">Mobile *</label>
                                        <input type="text" name="mobile" id="mobile" maxlength="10" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="or-bill-form">
                                        <label for="email">Email ID *</label>
                                        <input type="email" name="email" id="email" maxlength="100" />
                                    </div>
                                </div>
                                <?php if(!$this->session->auth): ?>
                                    <div class="col-md-6">
                                        <div class="or-bill-form">
                                            <label for="password">Password *</label>
                                            <input type="password" name="password" id="password" maxlength="100" />
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div class="col-md-12">
                                    <div class="or-bill-form">
                                        <label for="address">Address *</label>
                                        <textarea name="address" id="address"></textarea>
                                    </div>
                                </div>
                                <h2>Additional Information</h2>
                                <div class="col-md-12">
                                    <div class="or-bill-form">
                                        <textarea name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="or-checkout-form headline pera-content">
                            <h2>Your Order</h2>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total-h">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($this->cart->contents() as $item): ?>
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            <?= $item['name'] ?>&nbsp;	
                                            <strong class="product-quantity">×&nbsp;<?= $item['qty'] ?></strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="Price-currencySymbol">&#x20B9;</span><?= $item['subtotal'] ?>.00
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <th class="product-name">Total</th>
                                        <th class="product-name"><span class="Price-currencySymbol">&#x20B9;</span><?= $this->cart->total() ?>.00</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="or-checkout-pay-item-wrapper">
                            <div class="or-checkout-pay-item">
                                <input type="radio" name="payment_type" value="Cash on delivery" checked="" id="cod" />
                                <label for="cod">Cash on delivery</label>
                            </div>
                            <div class="or-checkout-pay-item">
                                <input type="radio" name="payment_type" value="Online payment" id="online" />
                                <label for="online">Online payment</label>
                            </div>
                            <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our 
                                <?= anchor('privacy-policy', "privacy policy", 'target="_blank"'); ?>.
                            </p>
                            <div class="or-btn-2">
                                <a class="d-flex justify-content-center align-items-center" onclick="cart.checkout();" href="javascript:;">Place Order</a>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <?php 
                            /* echo form_open('', 'id="update-qty"');
                            foreach ($this->cart->contents() as $k => $item):
                                echo form_hidden('cart['.$item['id'].']', $item['qty'], 'class="cart"');
                            endforeach;
                            echo form_close(); */
                        ?>
                    </div>
                <?php else: ?>
                    <div class="col-lg-12">
                        <div class="or-cart-total-warpper text-center headline pera-content top-sticky">
                            <strong>No items available.</strong>
                            <div class="col-lg-4 offset-4">
                                <?= anchor('shop', 'Shop Now', 'class="mt-5 d-flex justify-content-center align-items-center"') ?>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>