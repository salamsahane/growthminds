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
                <h2 class="pb-2 display-4">Courses</h2>
                <?php if($query->count('course_id') > 0): ?>
                <?php foreach(array_chunk($courses, 3) as $course_set): ?>
                    <div class="row">
                        <?php foreach($course_set as $course): ?>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="<?= $course['course_image'] ?>" alt="Image <?= $course['course_name'] ?>" class="card-img-top" width="200" height="200">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="/admin/course/course-infos/<?= $course['course_id'] ?>"><?= $course['course_name'] ?></a></h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info">No Course Available</div>
                <?php endif; ?>
            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->