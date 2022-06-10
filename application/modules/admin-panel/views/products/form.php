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
                        <?= form_label('Title', 't_title', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'id' => "t_title",
                            'name' => "t_title",
                            'maxlength' => 150,
                            'required' => "",
                            'onkeyup' => "document.getElementById('slug').value = this.value.trim().toLowerCase().replaceAll(' ', '-')",
                            'value' => set_value('t_title') ? set_value('t_title') : (isset($data['t_title']) ? $data['t_title'] : '')
                        ]); ?>
                        <?= form_error('t_title') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Slug', 'slug', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "slug",
                            'name' => "slug",
                            'maxlength' => 150,
                            'readonly' => 'readonly',
                            'required' => "",
                            'value' => set_value('slug') ? set_value('slug') : (isset($data['slug']) ? $data['slug'] : '')
                        ]); ?>
                        <?= form_error('slug') ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?= form_label('Features', 'features', 'class="col-form-label"') ?>
                        <select class="selectpicker col-12" name="features[]" id="features" data-style="btn btn-info btn-round" multiple title="Choose Features">
                            <?php foreach($features as $f): ?>
                            <option value="<?= e_id($f['id']) ?>" <?php 
                                        if(set_value('features'))
                                            echo set_select('features', e_id($f['id']));
                                        elseif(isset($data['prod_features']))
                                            array_walk_recursive($data['prod_features'], function($val) use ($f) {
                                                echo $val === $f['id'] ? 'selected' : '';
                                            });
                                     ?>><?= $f['f_title'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <?= form_label('Ingredients', 'ingredient', 'class="col-form-label"') ?>
                        <select class="selectpicker col-12" name="ingredients[]" id="ingredient" data-style="btn btn-info btn-round" multiple title="Choose Ingredients">
                            <?php foreach($ingredients as $i): ?>
                            <option value="<?= e_id($i['id']) ?>" <?php 
                                if(set_value('ingredients'))
                                    echo set_select('ingredients', e_id($f['id']));
                                elseif(isset($data['ingredients']))
                                    array_walk_recursive($data['ingredients'], function($val) use ($i) {
                                        echo $val === $i['id'] ? 'selected' : '';
                                    });
                            ?>><?= $i['i_title'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Price', 'price', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "price",
                            'name' => "price",
                            'maxlength' => 6,
                            'required' => "",
                            'value' => set_value('price') ? set_value('price') : (isset($data['price']) ? $data['price'] : '')
                        ]); ?>
                        <?= form_error('price') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Quantity', 'quantity', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "quantity",
                            'name' => "quantity",
                            'maxlength' => 6,
                            // 'required' => "",
                            'value' => set_value('quantity') ? set_value('quantity') : (isset($data['quantity']) ? $data['quantity'] : '')
                        ]); ?>
                        <?= form_error('quantity') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Sub Title', 't_sub_title', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "t_sub_title",
                            'name' => "t_sub_title",
                            'maxlength' => 150,
                            'required' => "",
                            'value' => set_value('t_sub_title') ? set_value('t_sub_title') : (isset($data['t_sub_title']) ? $data['t_sub_title'] : '')
                        ]); ?>
                        <?= form_error('t_sub_title') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= form_label('Packing', 'packing', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "packing",
                            'name' => "packing",
                            'maxlength' => 10,
                            'required' => "",
                            'value' => set_value('packing') ? set_value('packing') : (isset($data['packing']) ? $data['packing'] : '')
                        ]); ?>
                        <?= form_error('packing') ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= form_label('Short Description', 'short_description', 'class="col-form-label"') ?>
                        <?= form_textarea([
                            'class' => "form-control",
                            'id' => "short_description",
                            'name' => "short_description",
                            'maxlength' => 300,
                            'required' => "",
                            'value' => set_value('short_description') ? set_value('short_description') : (isset($data['short_description']) ? $data['short_description'] : '')
                        ]); ?>
                        <?= form_error('short_description') ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= form_label('Quote', 'quote', 'class="col-form-label"') ?>
                        <?= form_input([
                            'class' => "form-control",
                            'type' => "text",
                            'id' => "quote",
                            'name' => "quote",
                            'maxlength' => 500,
                            'required' => "",
                            'value' => set_value('quote') ? set_value('quote') : (isset($data['quote']) ? $data['quote'] : '')
                        ]); ?>
                        <?= form_error('quote') ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= form_label('Description', 'description', 'class="col-form-label"') ?>
                        <?= form_textarea([
                            'class' => "form-control",
                            'id' => "description",
                            'name' => "description",
                            'required' => "",
                            'value' => set_value('description') ? set_value('description') : (isset($data['description']) ? $data['description'] : '')
                        ]); ?>
                        <?= form_error('description') ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <?= form_label('Sub Description', 'sub_description', 'class="col-form-label"') ?>
                        <?= form_textarea([
                            'class' => "form-control",
                            'id' => "sub_description",
                            'name' => "sub_description",
                            'required' => "",
                            'value' => set_value('sub_description') ? set_value('sub_description') : (isset($data['sub_description']) ? $data['sub_description'] : '')
                        ]); ?>
                        <?= form_error('sub_description') ?>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-check-radio">
                            <label class="form-check-label">
                            <?= form_radio([
                                'class' => "form-check-input",
                                'name' => "feature_title",
                                'value' => 'Features: Many problems one solution',
                                'checked' => true
                            ]); ?>
                            Features: Many problems one solution
                            <span class="form-check-sign"></span>
                            </label>
                        </div>
                        <div class="form-check-radio">
                            <label class="form-check-label">
                            <?= form_radio([
                                'class' => "form-check-input",
                                'name' => "feature_title",
                                'value' => 'Benifits:',
                                'checked' => set_value('feature_title') ? set_radio('feature_title', 'Benifits:') : (isset($data['feature_title']) && $data['feature_title'] === 'Benifits:' ? true : false)
                            ]); ?>
                            Benifits:
                            <span class="form-check-sign"></span>
                            </label>
                        </div>
                        <div class="form-check-radio">
                            <label class="form-check-label">
                            <?= form_radio([
                                'class' => "form-check-input",
                                'name' => "feature_title",
                                'value' => 'How to Use',
                                'checked' => set_value('feature_title') ? set_radio('feature_title', 'How to Use') : (isset($data['feature_title']) && $data['feature_title'] === 'How to Use' ? true : false)
                            ]); ?>
                            How to Use
                            <span class="form-check-sign"></span>
                            </label>
                        </div>
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