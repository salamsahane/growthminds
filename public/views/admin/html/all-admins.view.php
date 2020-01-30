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
                <h2 class="pb-2 display-4">Administrators</h2>
                <?php foreach(array_chunk($admins, 3) as $admin_set): ?>
                    <div class="row">
                        <?php foreach($admin_set as $admin): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <img src="<?= $admin['avatar'] ?>" alt="Avatar <?= $admin['first_name'] ?>" class="rounded-circle mx-auto d-block" width="120" height="120">
                                            <h4 class="text-sm-center mt-2 mb-1 display-4"><?= ucfirst($admin['first_name']) . ' ' . ucfirst($admin['last_name']) ?></h4>
                                        </div>
                                        <?php if($admin['person_id'] != 2): ?>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?= $admin['person_id']; ?>">More Infos</button>
                                            <?php if(Funcs::is_super_admin() == true): ?>
                                            <button class="btn btn-danger delete-admin" id="deleteAdmin" onclick="deleteRecord('admin', <?= $admin['person_id']; ?>)">Delete</button>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="card-footer">
                                        <strong class="cart-title mb-3">Profile</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modal<?= $admin['person_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal<?= $admin['person_id'] ?>Label" style="display:none;" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal<?= $admin['person_id'] ?>Label"><?= ucfirst($admin['first_name']) . ' ' . ucfirst($admin['last_name']) ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?= $admin['email'] ?></p>
                                            <p><?= ucfirst($admin['gender']) ?></p>
                                            <p><?= ($admin['active'] == '1') ? "Is Active" : "Not Active" ?></p>
                                            <p>Added On <?= date("l d F, Y", strtotime($admin['creation_date'])) ?></p>
                                        </div>
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