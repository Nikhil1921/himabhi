<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-main-cart" class="or-main-cart-section">
    <div class="container">
        <div class="or-main-cart-content">
            <div class="row">
                <div class="col-lg-<?= $orders ? 12 : 9 ?>">
                    <div class="or-cart-content-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-name">Order ID</th>
                                    <th class="product-quantity">Order Date</th>
                                    <th class="product-quantity">Last updated</th>
                                    <th class="product-subtotal">Status</th>
                                    <th class="product-price">Total</th>
                                    <th class="product-price">View order</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($orders): foreach ($orders as $item): ?>
                                    <tr>
                                        <td class="product-subtotal"> <?= $item['order_id'] ?></td>
                                        <td class="product-subtotal"> <?= date('d-m-Y h:i A', $item['created_at']) ?></td>
                                        <td class="product-subtotal"> <?= date('d-m-Y h:i A', $item['update_at']) ?></td>
                                        <td class="product-subtotal"> <?= $item['status'] ?></td>
                                        <td class="product-subtotal"> <span><bdi><span class="Price-currencySymbol">&#x20B9;</span> <?= $item['total_price'] ?>.00</bdi></span></td>
                                        <td class="product-remove"> <a href="user/view-order/<?= e_id($item['id']) ?>" class="text-success fa fa-eye"> </a></td>
                                    </tr>
                                <?php endforeach; else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>No orders available.</stro></td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php if(!$orders): ?>
                <div class="col-lg-3">
                    <div class="or-cart-total-warpper text-center headline pera-content top-sticky">
                        <?= anchor('shop', 'Shop Now', 'class="mt-5 d-flex justify-content-center align-items-center"') ?>
                    </div>
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>