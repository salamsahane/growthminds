<?php

use App\Utils\Funcs;

require('../layouts/admin/_left-panel.php'); ?>
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require('../layouts/admin/_nav.php') ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="mb-2">
                    <a href="/admin/specialty/specialty-infos/<?= $this->view_data['specialty_id'] ?>" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <h2 class="pb-2 display-4">Edit <?= $specialty->specialty_name ?></h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Change Specialty Cover</strong>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <?php if(isset($form_pic)){$form_pic::getErrors();} ?>
                                    <div class="mx-auto d-block">
                                        <img src="/assets/images/img-holder.jpg" alt="image placeholder" id="profilePicturePlaceholder" onclick="triggerClick()" class="rounded mx-auto d-block" width="300" height="300">
                                        <h4 class="text-center mt-2 mb-3 display-4">Cover Picture</h4>
                                        <input type="file" name="coverpicture" onchange="displayImage(this)" id="profilePicture" style="display: none">
                                    </div>
                                    <div class="form-group mx-auto d-block">
                                        <input type="submit" value="Change Cover" name="change_cover" class="btn btn-outline-success mx-auto d-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Change Specialty Information</strong>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off">
                                    <?php if(isset($form_update)){$form_update::getErrors();} ?>
                                    <div class="form-group">
                                        <label for="specialty_name" class="form-control-label">Specialty Name:</label>
                                        <input type="text" name="specialty_name" id="specialty_name" value="<?= $specialty->specialty_name ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <label for="specialty_price" class="form-control-label">Specialty Price:</label>
                                            <div class="input-group">
                                                <input type="number" name="specialty_price" id="specialty_price" value="<?= $specialty->specialty_price ?>" class="form-control" placeholder="In XAF">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-control-label">Description:</label>
                                        <textarea name="description" id="description" cols="10" rows="10" class="form-control"><?= $specialty->specialty_description ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Infos" name="update_infos" class="btn btn-outline-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->