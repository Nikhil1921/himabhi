<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title"><?= $operation ?> <?= $title ?></h4>
    </div>
    <div class="card-body">
        <?= form_open() ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Name', 'r_name', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "r_name",
                            'name' => "r_name",
                            'maxlength' => 100,
                            'required' => "",
                            'value' => set_value('r_name') ? set_value('r_name') : (isset($data['r_name']) ? $data['r_name'] : '')
                        ]); ?>
                        <?= form_error('r_name') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Date', 'created_at', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => 'date',
                            'id' => "created_at",
                            'name' => "created_at",
                            'required' => "",
                            'value' => set_value('created_at') ? set_value('created_at') : (isset($data['created_at']) ? $data['created_at'] : '')
                        ]); ?>
                        <?= form_error('created_at') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Product', 'p_id', 'class="col-form-label"') ?>
                        <select name="p_id" id="p_id" class="form-control">
                            <?php array_walk($prods, function($prod) use ($data) { ?>
                                <option value="<?= e_id($prod['id']) ?>" <?= set_value('p_id') ? set_select('p_id', e_id($prod['id'])) : (isset($data['p_id']) && $data['p_id'] === $prod['id'] ? 'selected' : '') ?>><?= $prod['t_title'] ?></option>
                            <?php }) ?>
                        </select>
                        <?= form_error('p_id') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?= form_label('Description', 'description', 'class="col-form-label"') ?>
                        <?= form_textarea([
                            'class' => "form-control",
                            'id' => "description",
                            'maxlength' => 500,
                            'name' => "description",
                            'value' => set_value('description') ? set_value('description') : (isset($data['description']) ? $data['description'] : '')
                        ]); ?>
                        <?= form_error('description') ?>
                    </div>
                </div>
                <div class="col-12"></div>
                <div class="col-6 col-md-3">
                    <?= form_button([
                        'type'    => 'submit',
                        'class'   => 'btn btn-outline-primary btn-round btn-block col-12',
                        'content' => 'SAVE'
                    ]); ?>
                </div>
                <div class="col-6 col-md-3">
                    <?= anchor("$url", 'CANCEL', 'class="btn btn-outline-danger btn-round btn-block col-12"'); ?>
                </div>
            </div>
        <?= form_close() ?>
    </div>
</div>