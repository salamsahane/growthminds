<?php

use App\Models\QueryBuilder;

require('../layouts/admin/_left-panel.php'); ?>
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require('../layouts/admin/_nav.php') ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <h2 class="pb-2 display-4">Programs</h2>
                <!-- Add program -->
                <div class="row mb-15">
                    <div class="col-md-6 offset-md-6 col-sm-6">
                        <button type="button" class="btn btn-outline-primary pull-right" data-toggle='modal' data-target="#programModal"><i class="fa fa-plus"></i> New Program</button>
                    </div>
                    <div class="modal fade" id="programModal" tabindex="-1" role="dialog" aria-labelledby="programModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="programModalLabel">Add a New Program</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" autocomplete="off">
                                    <div class="modal-body">
                                        <?php $form::getErrors(); ?>
                                        <div class="form-group">
                                            <label for="program_name" class="form-control-label">Program Name:</label>
                                            <input type="text" name="program_name" id="program_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="new_program" class="btn btn-primary">Add Program</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- List programs -->
                <?php if($number_programs > 0): ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Program</th>
                                <th scope="col">Number of Fields</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($programs as $program): ?>
                            <?php 
                                $query = new QueryBuilder;
                                $query
                                    ->from('fields')
                                    ->where('program_id = :program_id')
                                    ->setParam('program_id', $program['program_id']);
                                $number_fields = $query->count('field_id');
                                $fields = $query->fetchAll();
                             ?>
                            <tr>
                                <td><strong><?= $program['program_name'] ?></strong></td>
                                <td>
                                    <button tabindex="0" type="button" class="btn btn-info" data-toggle="popover" data-trigger="focus" title="Fields" data-content="<?php foreach($fields as $field){echo "&#9899; " . $field['field_name'] . "<br/>";} ?>">
                                        <span class="badge badge-notifications"><?= $number_fields ?></span>
                                        <?= ($number_fields > 1) ? 'Fields' : 'FIeld' ?>
                                    </button>
                                </td>
                                <td><button type="button" class="btn btn-danger btn-block" onclick="deleteRecord('program', '<?= $program['program_id'] ?>')">Delete</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No Program Available</div>
                <?php endif; ?>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->