<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="home-five-about pt-120 pb-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-7">
				<div class="home-three-about-content">
                    <?php $title = explode('|', $data['title']) ?>
					<h2 class="hading-title">
                        <?= reset($title) ?><span><?= end($title) ?></span>
                    </h2>
					<p><?= $data['description'] ?></p>
				</div>
			</div>
			<div class="col-lg-5"> 
				<div class="right">
					<?= img($this->config->item('service').$data['image']) ?>
				</div>
			</div>
		</div>
	</div>
</section>