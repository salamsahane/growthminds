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
                        <h1 class="pb-2 display-4">New Specialty</h1>
                        <div class="card">
                            <div class="card-header">Complete the Form</div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off">
                                    <?php $form::getErrors(); ?>
                                    <div class="form-group">
                                        <label for="specialty_name" class="form-control-label">Name of the Specialty:</label>
                                        <input type="text" name="specialty_name" id="specialty_name" value="<?= $form::getInput('specialty_name') ?>" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="program" class="form-control-label">program:</label>
                                        <select name="program" id="programSpecialty" class="form-control programSpecialty">
                                            <option value=''></option>
                                            <?php Funcs::setOptions('programs', 'program_name', 'program_id');  ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="field" class="form-control-label">Field:</label>
                                        <select name="field" id="field" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <label for="specialty_price" class="form-control-label">Specialty Price:</label>
                                            <div class="input-group">
                                                <input type="number" name="specialty_price" id="specialty_price" value="<?= $form::getInput('specialty_price') ?>" class="form-control" placeholder="In XAF">
                                                <div class="input-group-addon">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="form-control-label">Description:</label>
                                        <textarea name="description" id="description" cols="10" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Specialty" name="add" class="btn btn-outline-secondary btn-lg btn-block">
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