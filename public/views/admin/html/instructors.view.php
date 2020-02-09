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
                <h2 class="pb-2 display-4">Instructors</h2>
                <?php foreach(array_chunk($instructors, 3) as $instructor_set): ?>
                    <div class="row">
                        <?php foreach($instructor_set as $instructor): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img src="<?= $instructor['avatar'] ?>" alt="Avatar <?= $instructor['first_name'] ?>" class="rounded-circle mx-auto d-block" width="120" height="120">
                                            <h4 class="text-sm-center mt-2 mb-1 display-4"><?= ucfirst($instructor['first_name']) . ' ' . ucfirst($instructor['last_name']) ?></h4>
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <a class="btn btn-primary" href="/admin/instructor/profile/<?= $instructor['person_id']; ?>">View Profile</a>
                                            <button class="btn btn-danger delete-admin" id="deleteAdmin" onclick="deleteRecord('instructor', <?= $instructor['person_id']; ?>)">Delete</button>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <strong class="cart-title mb-3">Profile</strong>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->