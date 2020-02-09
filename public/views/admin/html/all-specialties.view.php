<?php

use App\Core\Model;
use App\Models\QueryBuilder;

require('../layouts/admin/_left-panel.php'); ?>
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php require('../layouts/admin/_nav.php') ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <h2 class="pb-2 display-4">Specialties</h2>
                <?php if($query->count('specialty_id') > 0): ?>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Specialty Name</th>
                                <th scope="col">Field</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach($specialties as $specialty): ?>
                            <?php 
                                $field = Model::find('field_name', 'fields', 'field_id', $specialty['field_id']);
                             ?>
                            <tr>
                                <td><a href="/admin/specialty/specialty-infos/<?= $specialty['specialty_id'] ?>"><?= $specialty['specialty_name'] ?></a></td>
                                <td><?= $field ?></td>
                                <td><button type="button" class="btn btn-danger btn-block" onclick="deleteRecord('specialty', '<?= $specialty['specialty_id'] ?>')">Delete</button></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info">No Specialty Available</div>
                <?php endif; ?>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->