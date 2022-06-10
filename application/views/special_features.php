<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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