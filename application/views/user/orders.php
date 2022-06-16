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
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($orders): foreach ($orders as $item): ?>
                                    <tr>
                                        <td class="product-remove"> <a href="javascript:;" onclick="cart.delete('<?= $item['rowid'] ?>')" class="remove">×</a></td>
                                        <td class="product-thumbnail"> 
                                            <?= anchor($item['options']['slug'], img($this->config->item('products').$item['options']['image'], '', 'class="cart-thumb-img"')) ?>
                                        </td>
                                        <td class="product-name" data-title="Product"> 
                                            <?= anchor($item['options']['slug'], $item['name']) ?>
                                        </td>
                                        <td class="product-price product-subtotal" data-title="Price"> <span class="amount"><bdi><span class="Price-currencySymbol">&#x20B9;</span><?= $item['price'] ?>.00</bdi></span></td>
                                        <td>
                                            <div class="quantity-field position-relative d-inline-block">
                                                <span class="custom-prev" onclick="cart.update('<?= $item['id'] ?>', '<?= $item['rowid'] ?>', this.innerHTML)">-</span>
                                                    <input type="text" name="<?= $item['rowid'] ?>" value="<?= $item['qty'] ?>" min="1" max="<?= $this->main->check('products', ['id' => my_crypt($item['id'], 'd')], 'quantity'); ?>" readonly class="quantity-input-arrow text-center">
                                                <span class="custom-next" onclick="cart.update('<?= $item['id'] ?>', '<?= $item['rowid'] ?>', this.innerHTML)">+</span>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"> <span><bdi><span class="Price-currencySymbol">&#x20B9;</span><?= $item['subtotal'] ?>.00</bdi></span></td>
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