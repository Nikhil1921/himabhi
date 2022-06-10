<?php defined('BASEPATH') OR exit('No direct script access allowed');
$imgs = $data['image'];
?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?= $operation ?></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <?= form_label('Title', '', 'class="col-form-label"') ?>
                    <?= form_input([
                        'class' => "form-control",
                        'disabled' => true,
                        'value' => $data['t_title']
                    ]); ?>
                </div>
            </div>
            <div class="col-md-12">
                <?= validation_errors(); ?>
            </div>
        </div>
        <?= form_open_multipart('', '', ['image' => 'main']) ?>
        <div class="row">
            <div class="col-md-12"><?= form_label('Main Image', '', 'class="col-form-label"') ?></div>
            <div class="col-md-3">
                <?= form_input([
                    'id' => "image",
                    'name' => "image",
                    'type' => "file",
                    'accept' => "image/jpg, image/jpeg, image/png",
                    'onchange' => 'this.form.submit()'
                ]); ?>
            </div>
            <?php if(is_file($this->path.$imgs->main)): ?>
                <div class="col-md-3">
                    <?= img($this->path.$imgs->main, '', 'height="170" width="100%"') ?>
                </div>
            <?php endif ?>
        </div>
        <?= form_close() ?>
        <?= form_open_multipart('', '', ['image' => 'desription']) ?>
        <div class="row">
            <div class="col-md-12"><?= form_label('Description Image', '', 'class="col-form-label"') ?></div>
            <div class="col-md-3">
                <?= form_input([
                    'id' => "image",
                    'name' => "image",
                    'type' => "file",
                    'accept' => "image/jpg, image/jpeg, image/png",
                    'onchange' => 'this.form.submit()'
                ]); ?>
            </div>
            <?php if(is_file($this->path.$imgs->desription)): ?>
                <div class="col-md-3">
                    <?= img($this->path.$imgs->desription, '', 'height="170" width="100%"') ?>
                </div>
            <?php endif ?>
        </div>
        <?= form_close() ?>
        <?php foreach($imgs->images as $k => $img): ?>
            <?= form_open_multipart('', '', ['image' => $k]) ?>
                <div class="row">
                    <div class="col-md-12"><?= form_label('Inner Image'.str_replace('img', ' ', $k) , '', 'class="col-form-label"') ?></div>
                    <div class="col-md-3">
                        <?= form_input([
                            'id' => "image",
                            'name' => "image",
                            'type' => "file",
                            'accept' => "image/jpg, image/jpeg, image/png",
                            'onchange' => 'this.form.submit()'
                        ]); ?>
                    </div>
                    <?php if(is_file($this->path.$img)): ?>
                        <div class="col-md-3">
                            <?= img($this->path.$img, '', 'height="170" width="100%"') ?>
                        </div>
                    <?php endif ?>
                </div>
            <?= form_close() ?>
        <?php endforeach ?>
        <div class="row mt-4">
            <div class="col-6 col-md-3">
                <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger btn-round btn-block col-12"'); ?>
            </div>
        </div>
    </div>
</div>