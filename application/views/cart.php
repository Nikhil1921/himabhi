<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-main-cart" class="or-main-cart-section">
    <div class="container">
        <div class="or-main-cart-content">
            <div class="row" id="show-cart">
                <?php $this->load->view('cart-table') ?>
            </div>
        </div>
    </div>
</section>