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
                <a href="<?= Funcs::previous_page(); ?>" class="btn btn-light"><i class="fas fa-arrow-left"></i> Back</a>
            </div>
            <!-- Course Infos -->
            <h2 class="pb-2 display-4">
                <?= $course->course_name ?>
            </h2>
            <div class="row mb-4">
                <div class="col-md-4">
                    <img src="<?= $course->course_image ?>" alt="<?= $course->course_name ?>" class="shadow-sm rounded">
                </div>
                <div class="col-md-8">
                    <p>
                        <?= $course->course_description  ?>
                    </p>
                    <p class="lead">
                        Status: <?= str_replace('-',' ', ucfirst($course->status)) ?> | 
                        Instructor: <a href="/admin/instructor/profile/<?= $instructor_id ?>" style="text-decoration: underline"><?= ucfirst($instructor->first_name) . ' ' . ucfirst($instructor->last_name) ?></a>
                    </p>
                    <div class="row">
                        <div class="col-md-8">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fas fa-list-alt"></i>
                                    <?= ($number_topics <= 1) ? $number_topics . ' Topic' : $number_topics . ' Topics' ?> / <?= $course->number_chapter ?> Topics</li>
                                <li class="list-inline-item"><i class="fas fa-money-bill-wave"></i>
                                    <?= number_format($course->course_price) ?> FCFA</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <a href="/admin/course/edit-course/<?= $course->course_id ?>" class="btn btn-info"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <button class="btn btn-danger"
                                onclick="deleteRecord('course', '<?= $course->course_id ?>')"><i
                                    class="fas fa-trash-alt"></i> Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Course Topic -->
            <h3 class="pb-2 display-5">Topics</h3>
            <!-- Add Topic -->
            <div class="row mb-15">
                <div class="col-md-6 offset-md-6 col-sm-6">
                    <button type="button" class="btn btn-outline-primary pull-right" data-toggle='modal'
                        data-target="#fieldModal"><i class="fa fa-plus"></i> New Topic</button>
                </div>
                <div class="modal fade" id="fieldModal" tabindex="-1" role="dialog" aria-labelledby="fieldModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fieldModalLabel">Add a New Topic</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" autocomplete="off">
                                <?php $form::getErrors(); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="topic_title" class="form-control-label">Topic TItle:</label>
                                        <input type="text" name="topic_title" id="topic_title" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="add_topic" class="btn btn-primary">Add Topic</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($number_topics > 0): ?>
                <div class="accordion" id="accordionTopics">
                    <?php foreach($topics as $topic): ?>
                        <div class="card">
                            <div class="card-header" id="heading<?= $topic['topic_id'] ?>">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?= $topic['topic_id'] ?>"
                                                aria-expanded="true" aria-controls="collapse<?= $topic['topic_id'] ?>">
                                                <?= $topic['topic_title'] ?>
                                            </button>
                                        </h2>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-inline pull-right">
                                            <li class="list-inline-item"><a href="#" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a></li>
                                            <li class="list-inline-item"><button type="button" class="btn btn-danger" onclick="deleteTopic(<?= $course->course_id ?>, <?= $topic['topic_id'] ?>)"><i class="fas fa-trash"></i> Delete</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div id="collapse<?= $topic['topic_id'] ?>" class="collapse" aria-labelledby="heading<?= $topic['topic_id'] ?>"
                                data-parent="#accordionTopics">
                                <div class="card-body">
                                    <?php if($topic['topic_content'] == null): ?>
                                        <div class="alert alert-info">No Content Available</div>
                                    <?php else: ?>
                                        <?= $topic['topic_content']; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    No Topic for this Course
                </div>
            <?php endif; ?>
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <?php require('../layouts/admin/_foot.php'); ?>
</div>
<!-- /#right-panel -->