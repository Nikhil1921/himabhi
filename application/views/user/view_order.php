<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-main-cart" class="or-main-cart-section">
    <div class="container">
        <div class="or-main-cart-content">
            <div class="row">
                <?php if($order): ?>
                    <div class="col-lg-4">
                        <h1><?= $order['order_id'] ?></h1>
                        <div class="row">
                            <strong class="col-lg-4">
                                Name
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['f_name'] ?>
                                <?= $order['l_name'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Mobile
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['mobile'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Email
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['email'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Address
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['address'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Notes
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['notes'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Payment Type
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['payment_type'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Payment ID
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['payment_id'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Order date
                            </strong>
                            <span class="col-lg-8">
                                <?= date('d-m-Y h:i A', $order['created_at']) ?>
                            </span>
                            <strong class="col-lg-4">
                                Last update
                            </strong>
                            <span class="col-lg-8">
                                <?= date('d-m-Y h:i A', $order['update_at']) ?>
                            </span>
                            <strong class="col-lg-4">
                                Status
                            </strong>
                            <span class="col-lg-8">
                                <?= $order['status'] ?>
                            </span>
                            <strong class="col-lg-4">
                                Total
                            </strong>
                            <span class="col-lg-8">
                                &#x20B9; <?= $order['total_price'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="or-cart-content-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($order['sub_orders']): foreach ($order['sub_orders'] as $item): ?>
                                        <tr>
                                            <td class="product-thumbnail"> 
                                                <?= anchor($item['slug'], img($item['image'], '', 'class="cart-thumb-img"')) ?>
                                            </td>
                                            <td class="product-name" data-title="Product"> 
                                                <?= anchor($item['slug'], $item['name']) ?>
                                            </td>
                                            <td class="product-price product-subtotal"> <span class="amount"><bdi><span class="Price-currencySymbol">&#x20B9;</span> <?= $item['price'] ?>.00</bdi></span></td>
                                            <td class="product-price product-subtotal"> <?= $item['quantity'] ?></td>
                                            <td class="product-price product-subtotal"> <span class="amount"><bdi><span class="Price-currencySymbol">&#x20B9;</span> <?= $item['price'] * $item['quantity'] ?>.00</bdi></span></td>
                                        </tr>
                                    <?php endforeach; else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center"><strong>No orders available.</stro></td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-lg-3">
                        <div class="or-cart-total-warpper text-center headline pera-content top-sticky">
                            Order details not available.
                            <?= anchor('shop', 'Shop Now', 'class="mt-5 d-flex justify-content-center align-items-center"') ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>