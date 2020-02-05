<?php

use App\Models\QueryBuilder;
use App\Utils\Funcs;

require('../layouts/admin/_left-panel.php'); ?>
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require('../layouts/admin/_nav.php') ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="col-md-6 offset-md-3">
                        <h1 class="pb-2 display-4">New Course</h1>
                        <div class="card">
                            <div class="card-header">Complete the Form</div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off">
                                    <?php $form::getErrors(); ?>
                                    <div class="form-group">
                                        <label for="course_name" class="form-control-label">Course Name:</label>
                                        <input type="text" name="course_name" id="course_name" value="<?= $form::getInput('course_name') ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="number_topics" class="form-control-label">Number of topics:</label>
                                        <input type="number" name="number_topics" id="number_topics" value="<?= $form::getInput('number_topics') ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <label for="course_price" class="form-control-label">Course Price:</label>
                                            <div class="input-group">
                                                <input type="number" name="course_price" id="course_price" value="<?= $form::getInput('course_price') ?>" class="form-control" placeholder="In XAF">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-control-label">Description:</label>
                                        <textarea name="description" id="description" cols="10" rows="10" class="form-control"><?= $form::getInput('description') ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Course" name="add" class="btn btn-outline-secondary btn-lg btn-block">
                                    </div>
                                </form>
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