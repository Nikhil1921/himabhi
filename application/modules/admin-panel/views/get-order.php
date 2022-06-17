<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="col-lg-12">
    <table class="table">
        <tbody>
            <?php if($sub_orders): foreach ($sub_orders as $item): ?>
                <tr>
                    <td> 
                        <?= img($item['image'], '', 'height="50"') ?>
                    </td>
                    <td> 
                        <?= $item['name'] ?>
                    </td>
                    <td> &#x20B9;<?= $item['price'] ?>.00</td>
                    <td> <?= $item['quantity'] ?></td>
                    <td> &#x20B9;<?= $item['price'] * $item['quantity'] ?>.00</td>
                </tr>
            <?php endforeach; else: ?>
                <tr>
                    <td colspan="5" class="text-center"><strong>No orders available.</stro></td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>