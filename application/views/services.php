<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="services-area" class="pt-80 pb-80 inner-services-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="hading-title">Our <span>Services</span></h2>
            </div>
            <?php foreach ($this->config->item('services') as $k => $service): ?>
            <div class="col-lg-4 col-sm-6">
                <div class="services-item wow fadeInUp" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <?= anchor($service['slug'], img($this->config->item('service').$service['image']).'<h5 class="services-title-title">'.$service['name'].'</h5>'); ?>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>