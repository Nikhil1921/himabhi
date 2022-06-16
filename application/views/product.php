<?php defined('BASEPATH') OR exit('No direct script access allowed');
$imgs = json_decode($prod['image']); ?>
<section id="or-shop-details" class="or-shop-details-section">
    <div class="container">
        <div class="or-shop-details-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="shop-details-img-slider-area">
                        <div class="shop-details-img-slider">
                            <?php foreach ($imgs->images as $img): if(! is_file($this->config->item('products').$img)) continue; ?>
                                <div class="shop-details-img-wrap">
                                <?= img($this->config->item('products').$img, '', 'data-zoomed="'.base_url($this->config->item('products').$img).'"') ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                        <div class="shop-details-img-thumb">
                            <?php foreach ($imgs->images as $img): if(! is_file($this->config->item('products').$img)) continue; ?>
                                <div class="or-thumb-img">
                                <?= img($this->config->item('products').$img) ?>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-details-text  headline pera-content">
                        <div class="shop-details-title">
                            <h3><?= $prod['t_title'] ?> </h3>
                        </div>
                        <div class="shop-details-price">&#x20B9;<?= $prod['price'] ?>.00</div>
                        <span><i>inclusive all taxes</i></span>
                        <br><span><strong>Packing:</strong><i><?= $prod['packing'] ?></i></span>
                        <div class="shop-details-text-decs">
                            <?= $prod['description'] ?>
                        </div>
                        <div class="shop-details-option">
                            <span class="option-title">Quantity:</span>
                            <div class="shop-quantity-option d-flex">
                                <div class="quantity-field position-relative  d-inline-block">
                                    <?php $qty = 1; foreach($this->cart->contents() as $val)
                                        if($val['id'] === my_crypt($prod['id']))
                                            $qty = $val['qty']; ?>
                                    <input type="text" name="quantity" readonly value="<?= $qty ?>" min="1" max="<?= $prod['quantity'] ?>" class="quantity-input-arrow quantity-input-2  text-center">
                                </div>
                                <div class="stock-avaiable"><?= $prod['quantity'] ?> pieces available </div>
                            </div>
                        </div>
                        <div class="shop-details-btn ">
                            <a href="javascript:;" onclick="cart.add('<?= my_crypt($prod['id']) ?>')">Add To Cart</a>
                            <a href="javascript:;" onclick="wish.add('<?= my_crypt($prod['id']) ?>')">Add To Wishlist</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="or-testimonial-2" class="or-testimonial-section-2">
    <div class="container">
        <div class="or-testimonial-content-2">
            <div class="row">
                <div class="col-lg-6">
                    <div class="or-testimonial-img-2 text-center">
                        <?= img($this->config->item('products').$imgs->desription) ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="or-testimonial-text-2 headline-2 pera-content">
                        <h2><?= $prod['t_sub_title'] ?></h2>
                        <div class="or-testimonial-slider-content-2 position-relative">
                            <span class="quote-icon position-absolute"><i class="fas fa-quote-right"></i></span>
                            <div class="or-testimonial-slider-2">
                                <div class="or-testimonial-item-2">
                                    <?= $prod['sub_description'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="or-blog-details" class="or-blog-details-section">
    <div class="container">
        <div class="or-blog-details-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="or-blog-details-text-inner headline pera-content">
                        <div class="or-blog-details-item">
                            <div class="blog-details-text headline">
                                <?php if($prod['prod_features']): ?>
                                <h3><?= $prod['feature_title'] ?></h3>
                                <div class="or-blog-details-img-item">
                                    <?php foreach($prod['prod_features'] as $k => $feature): ?>
                                    <div class="row">
                                        <?php if($k%2 === 0): ?>
                                        <div class="col-md-3">
                                            <div class="or-blog-details-img-video">
                                                <?= img($feature['image']) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <?= $feature['description'] ?>
                                        </div>
                                        <?php else: ?>
                                            <div class="col-md-9">
                                                <?= $feature['description'] ?>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="or-blog-details-img-video">
                                                    <?= img($feature['image']) ?>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                                <?php endif ?>
                                <blockquote>
                                    “<?= $prod['quote'] ?>”
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <?php if($prod['reviews']): ?>
                    <div class="or-blog-comment headline">
                        <h3>Reviews</h3>
                        <div class="or-blog-comment-block-wrapper">
                            <?php foreach($prod['reviews'] as $review): ?>
                            <div class="or-blog-comment-block">
                                <div class="or-blog-comment-text headline pera-content position-relative">
                                    <h4><a href="#"><?= $review['r_name'] ?></a></h4>
                                    <span><?= date('F d, Y', strtotime($review['created_at'])) ?> </span>
                                    <p><?= $review['description'] ?></p>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if($prod['ingredients']): ?>
<section id="or-category-2" class="or-category-section-2">
    <div class="container">
        <div class="or-section-title-2 headline text-center">
            <h2>INGREDIENTS</h2>
        </div>
        <div class="or-category-content-2 position-relative">
            <div class="category-slider-2">
                <?php foreach($prod['ingredients'] as $ingredient): ?>
                <div class="organio-inner-item">
                    <div class="or-category-innerbox-2 text-center">
                        <div class="or-category-img-shape position-relative">
                            <div class="or-category-img position-relative">
                                <?= img($ingredient['image']) ?>
                            </div>
                        </div>
                        <div class="or-category-text headline">
                            <h3><a href="javascript:;"><?= $ingredient['i_title'] ?></a></h3>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
            <div class="carousel_nav  clearfix">
                <button type="button" class="or-cat-left_arrow"><i class="far fa-chevron-left"></i></button>
                <button type="button" class="or-cat-right_arrow"><i class="far fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>
<?php endif ?>