<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
    <div class="or-cart-content-table table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="product-remove">&nbsp;</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-thumbnail">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php if($wishlist): foreach ($wishlist as $item): $img = json_decode($item['image']); ?>
                    <tr>
                        <td class="product-thumbnail"> 
                            <?= anchor($item['slug'], img($this->config->item('products').$img->main, '', 'class="cart-thumb-img"')) ?>
                        </td>
                        <td class="product-name" data-title="Product"> 
                            <?= anchor($item['slug'], $item['t_title'].' - '.$item['packing']) ?>
                        </td>
                        <td class="product-price product-subtotal" data-title="Price"> <span class="amount"><bdi><span class="Price-currencySymbol">&#x20B9;</span><?= $item['price'] ?>.00</bdi></span></td>
                        <td class="product-remove"> <a href="javascript:;" onclick="wish.delete('<?= my_crypt($item['p_id']) ?>')" class="remove">×</a></td>
                    </tr>
                <?php endforeach; else: ?>
                    <tr>
                        <td colspan="4" class="text-center"><strong>No items available.</stro></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</div>