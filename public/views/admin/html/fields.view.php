<?php

use App\Core\Model;
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
                <h2 class="pb-2 display-4">Fields</h2>
                <!-- Add Field -->
                <div class="row mb-15">
                    <div class="col-md-6 offset-md-6 col-sm-6">
                        <button type="button" class="btn btn-outline-primary pull-right" data-toggle='modal' data-target="#fieldModal"><i class="fa fa-plus"></i> New Field</button>
                    </div>
                    <div class="modal fade" id="fieldModal" tabindex="-1" role="dialog" aria-labelledby="fieldModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="fieldModalLabel">Add a New Field</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="POST" autocomplete="off">
                                    <div class="modal-body">
                                        <?php $form::getErrors(); ?>
                                        <div class="form-group">
                                            <label for="field_name" class="form-control-label">Name of the Field:</label>
                                            <input type="text" name="field_name" id="field_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="program" class="form-control-label">Program:</label>
                                            <select name="program" id="program" class="form-control">
                                                <option value=""></option>
                                                <?php Funcs::setOptions('programs', 'program_name', 'program_id'); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="new_field" class="btn btn-primary">Add Field</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if($number_fields > 0): ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Field Name</th>
                                <th scope="col">Program</th>
                                <th scope="col">Number of Specialties</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($fields as $field): ?>
                            <?php 
                                $query = new QueryBuilder;
                                $query
                                    ->from('specialties')
                                    ->where('field_id = :field_id')
                                    ->setParam('field_id', $field['field_id']);
                                $number_specialties = $query->count('field_id');
                                $specialties = $query->fetchAll();
                                $program = Model::find('program_name', 'programs', 'program_id', $field['program_id']);
                             ?>
                            <tr>
                                <td><strong><?= $field['field_name'] ?></strong></td>
                                <td><span><?= $program; ?></span></td>
                                <td>
                                    <button tabindex="0" type="button" class="btn btn-info" data-toggle="popover" data-trigger="focus" title="Specialties" data-content="<?php foreach($specialties as $specialty){echo "&#9899; " . $specialty['specialty_name'] . "<br/>";} ?>">
                                        <span class="badge badge-notifications"><?= $number_specialties ?></span>
                                        <?= ($number_specialties > 1) ? 'Specialties' : 'specialty' ?>
                                    </button>
                                </td>
                                <td><button type="button" class="btn btn-danger btn-block" onclick="deleteRecord('field', '<?= $field['field_id'] ?>')">Delete</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No Field Available</div>
                <?php endif; ?>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->