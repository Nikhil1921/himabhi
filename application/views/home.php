<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Start of Slider section ============================================ -->
<section id="organio-slider" class="organio-slider-section">
    <rs-module-wrap id="rev_slider_15_1_wrapper" data-alias="home-1" data-source="gallery" style="visibility:hidden;background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
        <rs-module id="rev_slider_15_1" style="" data-version="6.5.5">
            <rs-slides>
                <?php foreach($banners as $k => $banner): ?>
                <rs-slide style="position: absolute;" data-key="rs-5<?= $k ?>" data-title="Slide" data-dim="w:['100%','100%','100%','100%'];" data-in="o:0;" data-out="a:false;">
                    <?= img($banner['banner'], '', 'class="rev-slidebg tp-rs-img" data-bg="c:#f3f3f3;" data-parallax="off" data-no-retina') ?>
                    <rs-group
                        id="slider-15-slide-5<?= $k ?>-layer-1" 
                        data-type="group"
                        data-xy="xo:30px,30px,22px,22px;y:m;yo:-30px,-30px,0,0;"
                        data-text="w:normal;s:20,16,12,7;l:0,20,15,9;"
                        data-dim="w:800px,800px,400px,400px;h:372px,372px,302px,262px;"
                        data-rsp_o="off"
                        data-rsp_bd="off"
                        data-frame_0="o:1;"
                        data-frame_1="sp:0;"
                        data-frame_999="o:0;st:w;sR:9000;sA:9000;"
                        style="z-index:13;">
                    </rs-group>
                </rs-slide>
                <?php endforeach ?>
            </rs-slides>
        </rs-module>
    </rs-module-wrap>
    <!-- END REVOLUTION SLIDER -->
</section>
<!-- End of Slider section ============================================= -->
<!-- Start of Feeatur section============================================= -->
<section id="specialfeatures" class="or-feature-section">
    <div class="container">
        <div class="or-section-title-3 text-center pera-content headline-2">
            <h2>Our Special <span>Features</span></h2>
            <p>It’s based on the belief that health and wellness depend on a delicate balance between the mind, body, and soul.Our main goal is to promote good health.</p>
        </div>
        <div class="or-feature-content position-relative">
            <span class="section-deco1 position-absolute">
                <?= img('assets/images/side-lineart2.png') ?>
            </span>
            <span class="section-deco2 position-absolute">
                <?= img('assets/images/side-lineart1.png') ?>
            </span>
            <span class="section-deco3 position-absolute">
                <?= img('assets/images/side-lineart.png') ?>
            </span>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="or-feature-innerbox text-center headline-2 pera-content">
                        <div class="or-feature-img">
                            <?= img('assets/images/best-herbs.png') ?>
                        </div>
                        <div class="or-feature-text">
                            <h3>Best Herbs, Best Results</h3>
                            <p>Only the top quality herbs, sourced directly from Himalayas, are selected with strict quality control to ensure great results.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="or-feature-innerbox text-center headline-2 pera-content">
                        <div class="or-feature-img">
                            <?= img('assets/images/quality-control.png') ?>
                        </div>
                        <div class="or-feature-text">
                            <h3>Strict Quality Control</h3>
                            <p>Himabhi Products are prepared in small batches under direct supervision of our experts with experience of 40 years, ensuring adherence to guidelines making sure you get great quality with every product.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="or-feature-innerbox text-center headline-2 pera-content">
                        <div class="or-feature-img">
                            <?= img('assets/images/100natural.png') ?>
                        </div>
                        <div class="or-feature-text">
                            <h3>100% natural, No Side Effects</h3>
                            <p>We don’t use any artificial chemicals or steroids in any himabhi products. Hence no side effects & it’s perfectly safe.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Feeatur section============================================= -->
<!-- Start of About us section ============================================= -->
<section id="or-about-1" class="or-about-section-1">
    <div class="container">
        <div class="or-about-content-1 position-relative">
            <div class="or-about-img-1 position-absolute">
                <?= img('assets/images/about.jpg') ?>
            </div>
            <div class="or-about-text-area  d-flex justify-content-end">
                <div class="or-about-img-text-wrapper-1">
                    <div class="or-section-title headline pera-content wow fadeInUp">
                        <span class="sub-title">About us</span>
                        <h2>Direct from Mother Nature</h2>
                        <p class="text-justify">Ayurvedic medicine is one of the world’s oldest holistic healing systems. It was developed more than 10,000 years ago in India.	We are as a firm want to make a chain to full fill dreams of millions with natural products, with the help of ayurveda.</p><br>
                        <p class="text-justify">It’s based on the belief that health and wellness depend on a delicate balance between the mind, body, and soul.Our main goal is to promote good health.</p>
                    </div>
                    <div class="or-blog-btn" style="margin-top: 20px!important;">
                        <?= anchor('shop', 'All products <i class="far fa-long-arrow-right"></i>', 'class="d-flex justify-content-center align-items-center"') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of About Us section ============================================= -->
<!-- Start of Trending product  section============================================= -->
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
                                <a href="javascript:;" onclick="cart.add('<?= my_crypt($p['id']) ?>')"><i class="fal fa-shopping-cart"></i></a>
                                <a href="javascript:;" onclick="wish.add('<?= my_crypt($p['id']) ?>')"><i class="fal fa-heart"></i></a>
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
                                <a class="d-flex justify-content-center align-items-center" onclick="cart.add('<?= my_crypt($p['id']) ?>')" href="javascript:;" tabindex="0">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <!-- <div class="or-blog-btn">
            <a class="d-flex justify-content-center align-items-center" href="#">View all posts <i class="far fa-long-arrow-right"></i></a>
        </div> -->
    </div>
</section>
<!-- End of Trending product  section============================================= -->
<?php foreach($prods as $k => $p): $imgs = json_decode($p['image']); if($k%2 === 0): ?>
    <section id="or-about-1" class="or-about-section-2">
		<div class="container">
			<div class="or-about-content-1 position-relative">
				<div class="or-about-img-1 position-absolute">
					<?= img($this->config->item('products').$imgs->main) ?>
				</div>
				<div class="or-about-text-area d-flex justify-content-end">
					<div class="or-about-img-text-wrapper-1">
						<div class="or-section-title headline pera-content">
							<h2 class="case-animate-time"><?= $p['t_title'] ?></h2>
							<p class="text-justify"><?= $p['short_description'] ?></p>
						</div>
                        <?php foreach(array_chunk($p['prod_features'], 2) as $features): ?>
                            <div class="or-about-feature-wrapper d-flex">
                                <?php foreach($features as $feature): ?>
                                <div class="or-about-feature-innebox headline pera-content d-flex">
                                    <div class="or-about-feature-icon">
                                        <?= img($feature['image']) ?>
                                    </div>
                                    <div class="or-about-feature-text">
                                        <h3><?= $feature['f_title'] ?></h3>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        <?php endforeach ?>
						<div class="or-blog-btn" style="margin-top: 20px!important;">
                            <?= anchor($p['slug'], 'Read More <i class="far fa-long-arrow-right"></i>', 'class="d-flex justify-content-center align-items-center"'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php else: ?>
    <section id="or-why-choose-2" class="or-why-choose-section-2">
		<div class="container">
			<div class="or-why-choose-content-2">
				<div class="row">
					<div class="col-lg-6">
						<div class="or-why-choose-text-wrapper-2">
							<div class="or-section-title-4 headline-2 pera-content">
								<h2 class="case-animate-time"><?= $p['t_title'] ?></h2>
							    <p class="text-justify"><?= $p['short_description'] ?></p>
							</div>
							<?php foreach(array_chunk($p['prod_features'], 2) as $features): ?>
                                <div class="or-about-feature-wrapper d-flex">
                                    <?php foreach($features as $feature): ?>
                                    <div class="or-about-feature-innebox headline pera-content d-flex">
                                        <div class="or-about-feature-icon">
                                            <?= img($feature['image']) ?>
                                        </div>
                                        <div class="or-about-feature-text">
                                            <h3><?= $feature['f_title'] ?></h3>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            <?php endforeach ?>
							<div class="or-blog-btn" style="margin-top: 20px!important;">
								<?= anchor($p['slug'], 'Read More <i class="far fa-long-arrow-right"></i>', 'class="d-flex justify-content-center align-items-center"'); ?>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="or-why-choose-img-2">
							<?= img($this->config->item('products').$imgs->main) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; endforeach ?>
<!-- Start of Why choose section============================================= -->
<section id="or-why-choose" class="or-why-choose-section">
    <div class="container">
        <div class="or-why-choose-content">  
            <div class="row">
                <div class="col-lg-6">
                    <div class="or-why-choose-feature position-relative">
                        <div class="row">
                            <div class="col-md-6 wow fadeInUp" data-wow-delay="00ms">
                                <div class="or-why-choose-feature-innerbox headline pera-content text-center">
                                    <div class="or-why-choose-feature-icon position-relative d-flex align-items-center justify-content-center">
                                        <?= img('assets/images/icons/Free-from-chemical.png') ?>
                                    </div>
                                    <div class="or-why-choose-feature-text">
                                        <h3>Himabhi ayurved are free from chemicals</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="or-why-choose-feature-innerbox headline pera-content text-center">
                                    <div class="or-why-choose-feature-icon position-relative d-flex align-items-center justify-content-center">
                                        <?= img('assets/images/icons/root-cuase.png') ?>
                                    </div>
                                    <div class="or-why-choose-feature-text">
                                        <h3>Work effectively on the root causes of problems</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 wow fadeInUp" data-wow-delay="200ms">
                                <div class="or-why-choose-feature-innerbox headline pera-content text-center">
                                    <div class="or-why-choose-feature-icon position-relative d-flex align-items-center justify-content-center">
                                        <?= img('assets/images/icons/safe-for-everyone.png') ?>
                                    </div>
                                    <div class="or-why-choose-feature-text">
                                        <h3>Himabhi ayurved are safe for everyone</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 wow fadeInUp" data-wow-delay="400ms">
                                <div class="or-why-choose-feature-innerbox headline pera-content text-center">
                                    <div class="or-why-choose-feature-icon position-relative d-flex align-items-center justify-content-center">
                                        <?= img('assets/images/icons/multiple-benifites.png') ?>
                                    </div>
                                    <div class="or-why-choose-feature-text">
                                        <h3>Multiple benefits in one product</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="600ms">
                    <div class="or-why-choose-text-wrapper">
                        <div class="or-section-title headline pera-content">
                            <span class="sub-title">Why Should We Choose Himabhi Ayurveda Over Chemical Products?</span>
                            <h2 class="case-animate-time" style="font-size: 20px;">Instead of slathering more chemicals on your face, why not switch to safe and effective Ayurvedic remedies?</h2>
                            <p class="text-justify">With the entire world facing a pandemic of this proportion, we have taken a call back to our ways of hygiene passed down by our generations. It is important, now more than ever, to implement tried and tested methods to ensure that you and people around you maintain clean and healthy habits.</p>
                            <p class="text-justify">But with every chemical product that is consumed over in the house, it is imperative to ensure safety standards. In the long term, harsh chemical products come with a range of side effects, including many side effects. Better to shift to Ayurvedic products and healthy life style.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of Why choose section============================================= -->
<!-- Start of shop banner section ============================================= -->			
<section id="visionmission" class="or-shop-banner-section">
    <div class="container">
        <div class="or-shop-banner-content">
            <div class="row">
                <div class="col-lg-6">
                    <div class="or-shop-banner-innerbox position-relative wow fadeInUp ">
                        <div class="or-shop-banner-text headline pera-content">
                            <h3>Our Vision</h3>
                            <p>Responsibility of keeping the traditional system of medicines alive in modern times.</p>
                            <?= anchor('about', 'Read More <i class="fas fa-long-arrow-right"></i>', 'class="sb-btn wow fadeInUp"') ?>
                        </div>
                        <div class="or-shop-banner-img-wrapper">
                            <div class="or-shop-banner-img-1 position-absolute">
                                <?= img("assets/images/vision.png") ?>
                            </div>
                            <div class="or-shop-banner-img-2 position-absolute">
                                <?= img("assets/images/vission-mission-back.png") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="or-shop-banner-innerbox position-relative type-2  wow fadeInUp ">
                        <div class="or-shop-banner-text  headline pera-content">
                            <h3>Our Mission</h3>
                            <p>Contribution in authenticity of products which are purely ayurvedic and their further growth.</p>
                            <?= anchor('about', 'Read More <i class="fas fa-long-arrow-right"></i>', 'class="sb-btn wow fadeInUp"') ?>
                        </div>
                        <div class="or-shop-banner-img-wrapper">
                            <div class="or-shop-banner-img-1 position-absolute">
                                <?= img("assets/images/mission.png") ?>
                            </div>
                            <div class="or-shop-banner-img-2 position-absolute">
                                <?= img("assets/images/vission-mission-back.png") ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start of Slider section ============================================= -->
<!-- Start of team section ============================================= -->
<section id="our-team" class="or-team-section">
    <div class="container">
        <div class="or-section-title headline pera-content text-center middle-align">
            <span class="sub-title">Himabhi Roots</span>
            <h2 class="case-animate-time">Features</h2>
        </div>
        <div class="or-team-content">
            <div class="or-team-content-area">
                <div class="or-team-slider">
                    <div class="organio-inner-item">
                        <div class="or-team-innerbox">
                            <div class="or-team-img position-relative">
                                <?= img('assets/images/freeshipping.jpg') ?>
                            </div>
                            <div class="or-taam-item-holder">
                                <div class="or-team-meta text-center headline position-relative">
                                    <h3><a href="javascript:;">Free<br>Shipping</a></h3>
                                    <div class="team-item-side-img">
                                        <?= img("assets/images/icons/t-icon2.png", '', 'class="side-img"') ?>
                                        <?= img("assets/images/icons/t-icon1.png", '', 'class="side-img"') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="organio-inner-item">
                        <div class="or-team-innerbox">
                            <div class="or-team-img position-relative">
                                <?= img('assets/images/descreet-delivery.jpg') ?>
                            </div>
                            <div class="or-taam-item-holder">
                                <div class="or-team-meta text-center headline position-relative">
                                    <h3><a href="javascript:;">Discreet<br>Packaging</a></h3>
                                    <div class="team-item-side-img">
                                        <?= img("assets/images/icons/t-icon2.png", '', 'class="side-img"') ?>
                                        <?= img("assets/images/icons/t-icon1.png", '', 'class="side-img"') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="organio-inner-item">
                        <div class="or-team-innerbox">
                            <div class="or-team-img position-relative">
                                <?= img('assets/images/secure-transaction.jpg') ?>
                            </div>
                            <div class="or-taam-item-holder">
                                <div class="or-team-meta text-center headline position-relative">
                                    <h3><a href="javascript:;">100% Secure Transactions</a></h3>
                                    <div class="team-item-side-img">
                                        <?= img("assets/images/icons/t-icon2.png", '', 'class="side-img"') ?>
                                        <?= img("assets/images/icons/t-icon1.png", '', 'class="side-img"') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of team section ============================================= -->


<!-- Start of how it work section ============================================= -->
<section id="or-how-it-work" class="or-how-it-work-section">
    <div class="container"> 
        <div class="or-how-it-work-content position-relative">
            <span class="or-hw-shape position-absolute"><img src="assets/img/hw-line.png" alt=""></span>
            <div class="or-section-title-4 headline-2 text-center pera-content">
                <h2>How  it Works</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="or-how-it-work-innerbox d-flex align-items-center">
                        <div class="or-how-it-work-icon d-flex justify-content-center align-items-center">
                            <i class="flaticon-grocery"></i>
                        </div>
                        <div class="or-how-it-work-text">
                            <span>Select Product</span>	
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-how-it-work-innerbox d-flex align-items-center">
                        <div class="or-how-it-work-icon d-flex justify-content-center align-items-center">
                            <i class="flaticon-add-to-cart"></i>
                        </div>
                        <div class="or-how-it-work-text">
                            <span>Add To Cart</span>	
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-how-it-work-innerbox d-flex align-items-center">
                        <div class="or-how-it-work-icon d-flex justify-content-center align-items-center">
                            <i class="flaticon-add-to-cart"></i>
                        </div>
                        <div class="or-how-it-work-text">
                            <span>Check Out</span>	
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="or-how-it-work-innerbox d-flex align-items-center">
                        <div class="or-how-it-work-icon d-flex justify-content-center align-items-center">
                            <i class="flaticon-lorry"></i>
                        </div>
                        <div class="or-how-it-work-text">
                            <span>Waiting to Delivery</span>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of  how it work section ============================================ -->