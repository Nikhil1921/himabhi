<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-trending-product" class="or-trending-product-section">
    <div class="container">
        <div class="or-trending-product-top d-flex justify-content-between align-items-end">
            <div class="or-section-title-3 pera-content headline-2">
                <h2>Trending <span>Products</span></h2>
                <p>It’s based on the belief that health and wellness depend on a delicate balance between the mind, body, and soul.Our main goal is to promote good health. </p>
            </div>
        </div>
        <div class="or-product-shop-content">
            <div class="container">
                <div class="row">
                    <?php foreach($prods as $p): $imgs = json_decode($p['image']); ?>
                    <div class="col-lg-2 col-sm-12 filtr-item just20" data-category="1, 3, 4" data-sort="Busy streets">
                        <div class="or-product-innerbox-item type-1 text-center position-relative">
                            <div class="e-commerce-btn">
                                <?= form_open('add-to-cart', 'id="prod-icon-'.e_id($p['id']).'"', ['p_id' => e_id($p['id'])]) ?>
                                <a href="javascript:;" onclick="document.getElementById('prod-icon-<?= e_id($p['id']) ?>').submit();"><i class="fal fa-shopping-cart"></i></a>
                                <?= form_close() ?>
                                <a href="javascript:;"><i class="fal fa-heart"></i></a>
                                <a href="javascript:;"><i class="fal fa-eye"></i></a>
                            </div>
                            <div class="or-product-inner-img">
                                <?= img($this->config->item('products').$imgs->main) ?>
                            </div>
                            <div class="or-product-inner-text headline">
                                <h3><?= anchor($p['slug'], $p['t_title'], 'tabindex="0"') ?></h3>
                                <span class="price">&#x20B9;<?= $p['price'] ?>.00</span>
                                <div class="or-product-rate ul-li">
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="or-product-btn text-center">
                                <?= form_open('add-to-cart', 'id="prod-'.e_id($p['id']).'"', ['p_id' => e_id($p['id'])]) ?>
                                <a class="d-flex justify-content-center align-items-center" onclick="document.getElementById('prod-<?= e_id($p['id']) ?>').submit();" href="javascript:;" tabindex="0">Add To Cart</a>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>