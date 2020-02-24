<?php

use App\Models\QueryBuilder;
use App\Core\Model;

?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="navbar navbar-expand-sm navbar-list navbar-submenu navbar-light p-0 m-0">
        <div class="container-fluid align-items-start align-items-sm-center">
            <div class="navbar-list__item">
                <nav class="nav nav-links nav--flush">
                    <a data-toggle="sidebar" data-target="#filters-drawer"
                        class="active nav-link d-flex align-items-center"><span
                            class="material-icons mx-4pt">close</span> Filter &amp; Refine</a>
                </nav>
            </div>
            <div class="navbar-list__item d-flex align-items-center">
                <!-- <nav class="nav nav-links nav--flush mr-24pt">
                    <a href="library-filters.html" class="mr-4pt nav-link"><i class="material-icons">view_module</i></a>
                    <a href="library-filters-list.html" class="nav-link active"><i
                            class="material-icons icon--left">list</i></a>
                </nav> -->
                <div class="ml-auto custom-select-icon">
                    <select name="sort" class="custom-select custom-select-sm custom-select-icon__select">
                        <option>Newest first</option>
                        <option>Oldest first</option>
                        <option>Title (a-z)</option>
                        <option>Title (z-a)</option>
                    </select>
                    <span class="material-icons custom-select-icon__icon">sort</span>
                </div>
            </div>
        </div>
    </div>

    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-responsive-width="768px" data-push>
        <!-- content -->
        <div class="mdk-drawer-layout__content">
            <div class="page-section">
                <div class="container page__container">
                    <div class="page-heading">
                        <h4>Courses</h4>
                        <p class="ml-sm-auto text-70 mb-0"><strong><?= $number_courses ?></strong> results in All categories</p>
                    </div>

                    <?php foreach($courses as $course): ?>
                        <?php
                            $q = (new QueryBuilder)
                                    ->from("topics")
                                    ->where("course_id = :course_id")
                                    ->setParam('course_id', $course['course_id']);
                            $number_topics = $q->count('topic_id');    

                            $instructor_id = Model::find('person_id', 'courses_assign', 'course_id', $course['course_id']);
                            $instructor_fname = Model::find('first_name', 'persons', 'person_id', $instructor_id);
                            $instructor_lname = Model::find('last_name', 'persons', 'person_id', $instructor_id);
                        ?>
                        <div class="card course-list-item o-hidden overlay js-overlay" data-trigger="hover">
                            <div class="media media-stack-xs align-items-stretch">
                                <div class="media-left media__thumbnail mr-0">
                                    <a href="/course/course-details/<?= $course['course_id'] ?>" class="js-image" data-position="center">
                                        <img src="<?= $course['course_image'] ?>" width="430" height="168" alt="course">
                                        <span class="overlay__content">
                                            <span class="overlay__action d-flex flex-column text-center">
                                                <i class="fa fa-book-reader fa-5x"></i>
                                                <small>view course</small>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div class="media-body card-body">
                                    <div class="d-flex">
                                        <div class="flex">
                                            <a class="card-title m-0" href="/course/course-details/<?= $course['course_id'] ?>"><?= ucfirst($course['course_name']) ?></a>
                                            <p class="d-flex flex-wrap lh-1 mb-16pt">
                                                <small class="text-50 font-weight-bold mr-8pt"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></small>
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-50 course-list-item__excerpt"><?= substr($course['course_description'], 0, 150); ?></p>
    
                                    <div class="d-flex align-items-center">
                                        <div class="flex d-flex lh-1">
                                            <small class="text-50 mr-8pt"><?= $number_topics ?> <?= $number_topics <= 1 ? "Topic" : "Topics"; ?></small>
                                            <small class="text-50"><?= number_format($course['course_price']) ?> FCFA</small>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Pagination -->
                    <ul class="pagination justify-content-center pagination-sm">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true" class="material-icons">chevron_left</span>
                                <span>Prev</span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#" aria-label="1">
                                <span>1</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="1">
                                <span>2</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span>Next</span>
                                <span aria-hidden="true" class="material-icons">chevron_right</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- drawer -->
        <div class="mdk-drawer js-mdk-drawer" id="filters-drawer">
            <div class="mdk-drawer__content">
                <div class="mdk-drawer__inner" data-perfect-scrollbar data-perfect-scrollbar-wheel-propagation="true">
                    <div class="pt-md-32pt pt-lg-64pt">
                        <div class="px-24pt mb-24pt mb-md-48pt filter-section">
                            <ul class="accordion js-accordion m-0" id="library-category">
                                <li class="accordion__item open">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#library-category"
                                        href="#library-all">
                                        <span class="flex">Category</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <nav class="accordion__menu collapse" id="library-all">
                                        <a class="accordion__menu-link active" href="#">All
                                            categories</a>
                                        <div>
                                            <a class="accordion__menu-link" href="#library-development"
                                                data-toggle="collapse">Development</a>
                                            <div class="collapse" id="library-development">
                                                <!-- <nav class="accordion__submenu">
                                                    <a href="#">All Development</a>
                                                    <a href="#">Web Development</a>
                                                    <a href="#">JavaScript</a>
                                                    <a href="#">HTML</a>
                                                    <a href="#">CSS</a>
                                                    <a href="#">WordPress</a>
                                                    <a href="#">PHP</a>
                                                    <a href="#">Ruby</a>
                                                    <a href="#">iOS Development</a>
                                                </nav> -->
                                            </div>
                                        </div>
                                        <a class="accordion__menu-link"
                                            href="#">Management</a>
                                        <a class="accordion__menu-link"
                                            href="#">Business</a>
                                        <a class="accordion__menu-link"
                                            href="#">Law</a>
                                    </nav>
                                </li>
                            </ul>
                        </div>

                        <div class="px-24pt filter-section">
                            <ul class="accordion js-accordion mb-24pt mb-md-48pt" id="library-difficulty">
                                <li class="accordion__item open">
                                    <a class="accordion__toggle" data-toggle="collapse"
                                        data-parent="#library-difficulty" href="#library-difficulty-all">
                                        <span class="flex">Difficulty</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <nav class="accordion__menu collapse" id="library-difficulty-all">
                                        <form action="#">
                                            <div class="form-group custom-controls-stacked">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" checked
                                                        id="difficulty-beginner">
                                                    <label class="custom-control-label"
                                                        for="difficulty-beginner">Beginner</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="difficulty-intermediate">
                                                    <label class="custom-control-label"
                                                        for="difficulty-intermediate">Intermediate</label>
                                                </div>
                                            </div>
                                        </form>
                                    </nav>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- // END drawer-layout -->

    <?php require('../layouts/_foot.php'); ?>

</div>
<!-- // END Header Layout Content -->