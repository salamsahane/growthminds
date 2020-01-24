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
                <h2 class="pb-2 display-4">Edit My Account</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Change Profile Picture</strong>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                    <?php if(isset($form_pic)){$form_pic::getErrors();} ?>
                                    <div class="mx-auto d-block">
                                        <img src="/assets/images/img-holder.jpg" alt="image placeholder" id="profilePicturePlaceholder" onclick="triggerClick()" class="rounded-circle mx-auto d-block" width="200" height="200">
                                        <h4 class="text-center mt-2 mb-3 display-4">Profile Picture</h4>
                                        <input type="file" name="profilepicture" onchange="displayImage(this)" id="profilePicture" style="display: none">
                                    </div>
                                    <div class="form-group mx-auto d-block">
                                        <input type="submit" value="Change Picture" name="change_picture" class="btn btn-outline-success mx-auto d-block">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Change Password</strong>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off">
                                    <?php if(isset($form_pass)){$form_pass::getErrors();} ?>
                                    <div class="form-group">
                                        <label for="actual_password" class="form-control-label">Actual password:</label>
                                        <input type="password" name="actual_password" id="actual_password" value="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password" class="form-control-label">New password:</label>
                                        <input type="password" name="new_password" id="new_password" value="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password_confirm" class="form-control-label">Confirm new password:</label>
                                        <input type="password" name="new_password_confirm" id="new_password_confirm" value="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Change password" name="change_password" class="btn btn-outline-primary">
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