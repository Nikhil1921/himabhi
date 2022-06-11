<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="or-page-not-found" class="or-page-not-found-section">
		<div class="container">
			<div class="or-page-not-found-content text-center">
				<div class="or-page-not-found-img">
					<?= img('assets/images/404.png') ?>
				</div>
				<div class="or-page-not-found-text headline pera-content">
					<h3>Page Not Found</h3>
					<p>Something went wrong, Looks like this page doesn't exist anymore.</p>
                    <?= anchor('', 'Back to Home', 'class=""') ?>
				</div>
			</div>
		</div>
	</section>