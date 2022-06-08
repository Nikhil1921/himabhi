<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="clint-review-area" class="clint-review-c pt-120 pb-120">
    <div class="container">
        <div class="row">
            <?php foreach ($gallery as $g): ?>
            <div class="col-lg-3 mt-4">
                <div class="team-item">
                    <div class="team-img">
                        <?= img($g['image']) ?>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>