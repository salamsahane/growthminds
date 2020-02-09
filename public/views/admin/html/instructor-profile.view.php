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
            <div class="mb-2">
                <a href="/admin/instructor/instructors" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <!-- Course Infos -->
            <h2 class="pb-2 display-4">
                <?= $instructor->first_name . ' ' . $instructor->last_name ?>
            </h2>
            <div class="row mb-4">
                <div class="col-md-4 mb-5">
                    <img src="<?= $instructor->avatar ?>" alt="<?= $instructor->first_name ?>" class="shadow-sm rounded mb-3" width="300" height="300">
                    <h4 class="mb-2"><?= $instructor->email ?></h4>
                    <h4 class="mb-2"><?= ucfirst($instructor->gender) ?></h4>
                    <h4 class="mb-2"><?= $instructor->active == '1' ? 'Is Active' : 'Not Active'; ?></h4>
                    <h4>Added On <?= date("l d F, Y", strtotime($instructor->creation_date)) ?></h4>
                </div>
                <div class="col-md-8">
                    <!-- Course Assign -->
                    <h3 class="pb-2 display-5">Course Assign</h3>
                    <!-- Add Topic -->
                    <div class="row mb-15">
                        <div class="col-md-6 offset-md-6 col-sm-6">
                            <button type="button" class="btn btn-outline-primary pull-right" data-toggle='modal'
                                data-target="#assignCourseModal"><i class="fa fa-plus"></i> Assign New Course</button>
                        </div>
                        <div class="modal fade" id="assignCourseModal" tabindex="-1" role="dialog" aria-labelledby="assignCourseModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="assignCourseModalLabel">Assign a New Course</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" autocomplete="off">
                                        <?php $form::getErrors(); ?>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="course" class="form-control-label">Course:</label>
                                                <select name="course" id="course" class="form-control" required>
                                                    <option value=""></option>
                                                    <?php Funcs::setOptions('courses', 'course_name', 'course_id', 'status', 'not-assign') ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="assign_course" class="btn btn-primary">Assign Him the Course</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Courses Assign to Instructors -->
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
                                   <td><button type='button' class="btn btn-danger" onclick="removeCourse(<?= $course['course_id'] ?>)">Remove Him the Course</button></td>
                               </tr> 
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <div class="alert alert-info">
                        No Course Assign
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            
            
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->