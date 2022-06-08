<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="shop-area pt-90 pb-90">
    <div class="container">
        <div class="row font_family">
            <?php foreach ($careers as $c): ?>
                <div class="col-lg-12">
                    <div class="border-bottom pb-30">
                        <h2><?= $c['c_title'] ?></h2>
                        <div class="trainers-information">
                            <ul>
                                <li><span>Eligibility Criteria:</span> <?= $c['eligibility'] ?></li>
                                <li><span>Height:</span> <?= $c['height'] ?> cm</li>
                                <li><span>Document Required:</span> <?= $c['documents'] ?></li>
                            </ul>
                        </div>
                        <ul class="font_family mt-2 list-style">
                            <?php 
                                $desc = explode('|', $c['description']);

                                array_walk($desc, function($v, $k){
                                    echo "<li><p>$v</p></li>";
                                });
                            ?>
                        </ul>
                        <h4 class="mt-2">Be a Part of Our Team</h4>
                        <div class="cart-add mt-3">
                            <?= anchor('apply?job-id='.my_crypt($c['id']), 'Apply Now', 'class="btn-1"'); ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>