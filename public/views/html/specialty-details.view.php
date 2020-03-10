<?php

use App\Models\QueryBuilder;
use App\Core\Model;
use App\Utils\Funcs;

?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="mdk-box bg-dark mdk-box--bg-gradient-red js-mdk-box mb-0" data-effects="blend-background">
        <div class="mdk-box__content">
            <div class="hero py-64pt text-center text-sm-left">
                <div class="container">
                    <h1 class="text-white"><?= ucfirst($specialty->specialty_name); ?></h1>
                    <div class="row">
                        <div class="col-md-7">
                            <p class="lead text-white-50 measure-hero-lead text-justify">
                                <?= $specialty->specialty_description ?></p>
                        </div>
                        <div class="col-md-5">
                            <img src="<?= $specialty->specialty_image ?>" alt="<?= $specialty->specialty_name ?>"
                                class="rounded">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar navbar-expand-sm navbar-submenu navbar-light navbar-list p-0 m-0 align-items-center">
        <div class="container page__container">
            <ul class="nav navbar-nav flex align-items-sm-center">
                <li class="nav-item navbar-list__item">
                    <i class="fa fa-book"></i>&nbsp;&nbsp;<?= $number_courses ?>
                    <?= $number_courses <= 1 ? "Course" : "Courses"; ?>
                </li>
                <?php if($person == null || $person->profil != "instructor"): ?>
                <li class="nav-item navbar-list__item">
                    <i class="fa fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($specialty->specialty_price) ?>
                    FCFA
                </li>
                <?php endif ?>
                <li class="nav-item ml-sm-auto text-sm-center flex-column navbar-list__item">
                    <a href="#" class="btn btn-outline-primary">Buy Now</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="row align-items-end mb-16pt mb-md-32pt">
                <div class="col-md-auto mb-32pt mb-md-0">
                    <div class="page-headline page-headline--title text-center text-md-left p-0">
                        <h2> Courses</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach($courses as $course_set): ?>
                <?php
                        $q = (new QueryBuilder)
                                ->from("courses")
                                ->where("course_id = :course_id")
                                ->setParam("course_id", $course_set['course_id']);
                        $course = $q->fetchObj();

                        $sql = (new QueryBuilder)
                                    ->from("topics")
                                    ->where("course_id = :course_id")
                                    ->setParam("course_id", $course->course_id);
                        $number_topics = $sql->count('topic_id');

                        $instructor_id = Model::find('person_id', 'courses_assign', 'course_id', $course_set['course_id']);
                        $instructor_fname = Model::find('first_name', 'persons', 'person_id', $instructor_id);
                        $instructor_lname = Model::find('last_name', 'persons', 'person_id', $instructor_id);
                    ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal "
                        data-partial-height="40" data-toggle="popover" data-trigger="click">
                        <a href="/course/course-details/<?= $course->course_id ?>" class="js-image" data-position="center">
                            <img src="<?= $course->course_image ?>" alt="course" width="430" height="168">
                            <span class="overlay__content">
                                <span class="overlay__action d-flex flex-column text-center">
                                    <i class="material-icons">play_circle_outline</i>
                                    <small>View course</small>
                                </span>
                            </span>
                        </a>
                        <div class="mdk-reveal__content">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex">
                                        <a class="card-title" href="course.html"><?= $course->course_name ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="popoverContainer d-none">
                        <div class="media">
                            <div class="media-body">
                                <div class="card-title mb-0"><?= $course->course_name ?></div>
                                <p class="lh-1 mb-0">
                                    <span class="text-black-50 small">with</span>
                                    <span class="text-black-50 small font-weight-bold"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></span>
                                </p>
                            </div>
                        </div>

                        <p class="my-16pt text-black-70"><?= substr($course->course_description, 0, 150) ?></p>

                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="d-flex align-items-center mb-4pt">
                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">list</span>
                                    <p class="flex text-black-50 lh-1 mb-0"><small><?= $number_topics ?>&nbsp;<?= ($number_topics <= 1) ? "Topic" : "Topics"; ?></small></p>
                                </div>
                            </div>
                            <div class="col text-right">
                                <a href="/course/course-details/<?= $course->course_id ?>" class="btn btn-primary">View Course</a>
                            </div>
                        </div>

                    </div>

                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>


    <?php require('../layouts/_foot.php') ?>

</div>
<!-- // END Header Layout Content -->