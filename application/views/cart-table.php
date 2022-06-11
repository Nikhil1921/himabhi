<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-9">
    <div class="or-cart-content-table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-subtotal">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->cart->contents()): foreach ($this->cart->contents() as $item): ?>
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
                        <td colspan="6" class="text-center"><strong>No items available.</stro></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>
<div class="col-lg-3">
    <div class="or-cart-total-warpper text-center headline pera-content top-sticky">
        <?php if($this->cart->contents()): ?>
            <h3>Cart Totals</h3>
            <table>
                <tbody>
                    <tr>
                        <td>
                            <p class="v-title">Subtotal	</p>
                        </td>
                        <td>
                            <p class="v-price">&#x20B9; <?= $this->cart->total() ?>.00</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p class="v-title">Total</p>
                        </td>
                        <td>
                            <p class="v-price">&#x20B9; <?= $this->cart->total() ?>.00</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <?= anchor('checkout', 'Procced To Checkout', 'class="d-flex justify-content-center align-items-center"') ?>
        <?php else: ?>
            <?= anchor('shop', 'Shop Now', 'class="mt-5 d-flex justify-content-center align-items-center"') ?>
        <?php endif ?>
    </div>
</div>