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
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <h1 class="pb-2 display-4">Add Instructor</h1>
                        <div class="card">
                            <div class="card-header">Complete the Form</div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off">
                                    <?php $form::getErrors(); ?>
                                    <div class="form-group">
                                        <label for="first_name" class="form-control-label">First Name:</label>
                                        <input type="text" name="first_name" id="first_name" value="<?= $form::getInput('first_name') ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name" class="form-control-label">Last Name:</label>
                                        <input type="text" name="last_name" id="last_name" value="<?= $form::getInput('last_name') ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-control-label">E-mail:</label>
                                        <input type="email" name="email" id="email" value="<?= $form::getInput('email') ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="form-control-label">Gender:</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value=""></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="course" class="form-control-label">Course Assign:</label>
                                        <select name="course" id="course" class="form-control">
                                            <option value=""></option>
                                            <?php Funcs::setOptions('courses', 'course_name', 'course_id', 'status', 'not-assign') ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i>
                                            Login password will be sent to the user after the activation of his account. 
                                            The account will be deleted 24 hours after his creation if it has not been activated.
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Instructor" name="add" class="btn btn-outline-secondary btn-lg btn-block">
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