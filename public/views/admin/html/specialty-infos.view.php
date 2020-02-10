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
            <div class="row">
                <div class="col-sm-2 col-md-6">
                    <div class="mb-2">
                        <a href="/admin/specialty/specialties" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                </div>
                <div class=" col-sm-2 col-md-6">
                    <a href="<?= Funcs::previous_page() ?>" class="btn btn-light pull-right">Forward <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <!-- Course Infos -->
            <h2 class="pb-2 display-4">
                <?= $specialty->specialty_name ?>
            </h2>
            <div class="row mb-4">
                <div class="col-md-4">
                    <img src="<?= $specialty->specialty_image ?>" alt="<?= $specialty->specialty_name ?>" class="shadow-sm rounded">
                </div>
                <div class="col-md-8">
                    <p>
                        <?= htmlentities(nl2br($specialty->specialty_description)) ?>
                    </p>
                    <p class="text-muted">
                        <?= $field ?> | <?= $program ?>
                    </p>
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fas fa-book"></i>
                                    <?= ($number_courses <= 1) ? $number_courses . ' Course' : $number_courses . ' Courses' ?></li>
                                <li class="list-inline-item"><i class="fas fa-money-bill-wave"></i>
                                    <?= number_format($specialty->specialty_price) ?> FCFA</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/specialty/edit-specialty/<?= $specialty->specialty_id ?>" class="btn btn-info"><i
                                    class="fas fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course Topic -->
            <h3 class="pb-2 display-5">Courses</h3>
            <!-- Add Topic -->
            <div class="row mb-15">
                <div class="col-md-6 offset-md-6 col-sm-6">
                    <button type="button" class="btn btn-outline-primary pull-right" data-toggle='modal'
                        data-target="#fieldModal"><i class="fa fa-plus"></i> Assign Course</button>
                </div>
                <div class="modal fade" id="fieldModal" tabindex="-1" role="dialog" aria-labelledby="fieldModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fieldModalLabel">Assign a New Course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" autocomplete="off">
                                <div class="modal-body">
                                    <?php $form::getErrors(); ?>
                                    <div class="form-group">
                                        <label for="course_specialty" class="form-control-label">Course:</label>
                                        <input type="text" name="course_specialty" id="course_specialty" class="form-control"
                                            required>
                                        <input type="hidden" name="course_id" id="course_id">
                                            <div class="list-group list-group-flush result-list">
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="add_course" class="btn btn-primary">Add Course</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($number_courses > 0): ?>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($courses as $course): ?>
                            <?php $course_name = Model::find('course_name', 'courses', 'course_id', $course['course_id']); ?>
                            <tr>
                                <td><a href="/admin/course/course-infos/<?= $course['course_id'] ?>"><?= $course_name ?></a></td>
                                <td><button class="btn btn-danger" onclick="removeCourseSpecialty(<?= $course['course_id'] ?>, <?= $specialty->specialty_id ?>)">Remove Course</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info">
                    No Course Assigned to this Specialty
                </div>
            <?php endif; ?>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->