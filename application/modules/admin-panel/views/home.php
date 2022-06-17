<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <?= anchor(admin('banner'), '<div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-danger">
                            <i class="nc-icon nc-image text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                                <p class="card-category">Banners</p>
                                <p class="card-title">'.$this->main->counter('banners', []).'</p><p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>', 'class="text-decoration-none"') ?>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <?= anchor(admin('products'), '<div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-danger">
                            <i class="fa fa-file-text-o text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                                <p class="card-category">Products</p>
                                <p class="card-title">'.$this->main->counter('products', ['is_deleted' => 0]).'</p><p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>', 'class="text-decoration-none"') ?>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <?= anchor(admin('ingredients'), '<div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-danger">
                            <i class="fa fa-file-text-o text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                                <p class="card-category">Ingredients</p>
                                <p class="card-title">'.$this->main->counter('ingredients', ['is_deleted' => 0]).'</p><p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>', 'class="text-decoration-none"') ?>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <?= anchor(admin('features'), '<div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-danger">
                            <i class="fa fa-file-text-o text-danger"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                                <p class="card-category">Features</p>
                                <p class="card-title">'.$this->main->counter('features', ['is_deleted' => 0]).'</p><p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>', 'class="text-decoration-none"') ?>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="datatables table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th class="target">SR. NO.</th>
                            <th>Name</th>
                            <th>mobile</th>
                            <th>address</th>
                            <th>notes</th>
                            <th>payment type</th>
                            <th>payment id</th>
                            <th>total</th>
                            <th>status</th>
                            <th class="target">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <h4 class="title title-up">Order Details</h4>
            </div>
            <div class="modal-body" id="order-details"></div>
            <div class="modal-footer">
                <div class="right-side">
                    <button type="button" class="btn btn-primary btn-link" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>