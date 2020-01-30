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
                <h1 class="pd-2 display-4">Program Tree Diagram</h1>
                <div class="tree-content">
                    <div class="tree">
                        <ul>
                            <li>
                                <a href="#"><?= $program ?></a>
                                <ul>
                                    <?php foreach($fields as $field): ?>
                                    <?php 
                                        $query = new QueryBuilder;
                                        $query->from('specialties')
                                            ->where("field_id = :field_id")
                                            ->setParam('field_id', $field['field_id']);
                                        $specialties = $query->fetchAll();
                                        $hasSpecialty = $query->count('specialty_id');
                                    ?>
                                        <li>
                                            <a href="#"><?= $field['field_name'] ?></a>
                                            <?php if($hasSpecialty > 0): ?>
                                            <ul>
                                                <?php foreach($specialties as $specialty): ?>
                                                    <li>
                                                        <a href="#"><?= $specialty['specialty_name'] ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->