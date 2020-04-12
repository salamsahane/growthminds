<?php

use App\Utils\Funcs;

?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0" style="scroll-behavoir: smooth;">
    <div class="mdk-box bg-dark mdk-box--bg-gradient-red js-mdk-box mb-0" data-effects="blend-background">
        <div class="mdk-box__content">
            <div class="hero py-64pt text-center text-sm-left">
                <div class="container">
                    <h1 class="text-white"><?= ucfirst($course->course_name); ?></h1>
                    <div class="row">
                        <div class="col-md-7">
                            <p class="lead text-white-50 measure-hero-lead text-justify">
                                <?= $course->course_description ?></p>
                        </div>
                        <div class="col-md-5">
                            <img src="<?= $course->course_image ?>" alt="<?= $course->course_name ?>" class="rounded">
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
                    <div class="media align-items-center">
                        <span class="media-left mr-16pt">
                            <img src="<?= $instructor_avatar ?>" width="40" alt="avatar" class="rounded-circle">
                        </span>
                        <div class="media-body">
                            <a class="card-title m-0"
                                href="#"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></a>
                            <p class="text-50 lh-1 mb-0">Instructor</p>
                        </div>
                    </div>
                </li>
                <li class="nav-item navbar-list__item">
                    <i class="fa fa-list-alt"></i>&nbsp;&nbsp;<?= $number_topics ?>
                    <?= $number_topics <= 1 ? "Topic" : "Topics"; ?>
                </li>
                <?php if($person == null || $person->profil != "instructor"): ?>
                <li class="nav-item navbar-list__item">
                    <i class="fa fa-money-bill-wave"></i>&nbsp;&nbsp;<?= number_format($course->course_price) ?> FCFA
                </li>
                <?php endif ?>
            </ul>
        </div>
    </div>

    <?php if(!Funcs::is_logged_in() || $person->profil == 'Prospect' || ($person->profil == 'instructor' && $course_assign->person_id != $person->person_id)):?>
        <div class="page-section border-bottom-2">
            <div class="container page__container">
                <h4>Table of Contents</h4>
                <div class="card-group card-group--lg-up mb-0">
                    <div class="card col-lg-7 p-0">
                        <ul class="accordion accordion--boxed js-accordion list-group-flush" id="course-toc">
                            <li class="accordion__item open">
                                <a class="accordion__toggle" data-toggle="collapse" data-parent="#course-toc"
                                    href="#course-toc-2">
                                    <span class="flex">Course Topics</span>
                                    <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                </a>
                                <div class="accordion__menu">
                                    <ul class="list-unstyled collapse show" id="course-toc-2">
                                        <?php if($number_topics > 0) : foreach($topics as $topic): ?>
                                        <li class="accordion__menu-link">
                                            <span class="material-icons icon-16pt icon--left text-muted">lock</span>
                                            <a class="flex" href="#"><?= $topic['topic_title'] ?></a>
                                        </li>
                                        <?php endforeach; else: ?>
                                        <li class="accordion__menu-link">
                                            <div class="alert alert-info">No Topic</div>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>
                    <div class="card col-lg-5 p-0 mb-0 justify-content-center border-left-lg">
                        <div class="card-body flex-0 text-center">
                            <div>
                                <i class="material-icons text-muted">timer</i>
                            </div>
                            <h4 class="my-8pt"><strong>Unlock All Content</strong></h4>
                            <p class="text-70 mb-24pt">Get access to all Topics in the Course</p>
                            <a href="/course/purchase/<?= $course->course_id ?>" class="btn btn-outline-primary mb-8pt">Purchase Course</a>
                            <?php if(!Funcs::is_logged_in()): ?>
                            <p>Have an account? <a href="/account/login">Login</a></p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif($person->profil == "instructor" && $number_topics > 0): ?>
        <div class="container page__container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="border-left-2 page-section pl-32pt" oncopy="return false" oncut="return false" onpaste="return false">
                        <?php foreach($topics as $i => $topic): ?>
                            <div class="d-flex align-items-center page-num-container">
                                <div class="page-num" id="<?= strtolower(str_replace(" ", "", $topic['topic_title'])); ?>"><?= $i + 1 ?></div><h4><?= $topic['topic_title'] ?></h4>
                                <?php if($person->profil == "instructor"): ?>
                                &nbsp;&nbsp;&nbsp;
                                <a href="/course/edit-topic/<?= $course->course_id ?>/<?= $topic['topic_id'] ?>" class="btn btn-link btn-small"><i class="fa fa-edit"></i></a>
                                <?php endif; ?>
                            </div>
                            <?php if($topic['topic_content'] != null): ?>
                                <p class="text-70 mb-24pt"><?= $topic['topic_content'] ?></p>
                            <?php else: ?>
                                <div class="alert alert-info">
                                    No content
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-3 page-nav">
                    <div class="page-section">
                        <div class="page-nav__content">
                            <h4 class="mb-16pt">Table of contents</h4>
                        </div>
                        <nav class="nav page-nav__menu">
                            <?php foreach($topics as $topic): ?>
                                <a class="nav-link" href="#<?= strtolower(str_replace(" ", "", $topic['topic_title'])); ?>"><?= ucwords($topic['topic_title']); ?></a>
                            <?php endforeach; ?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="container page__container">
            <div class="alert alert-light border-1 border-left-4 border-left-primary mt-24pt" role="alert">
                <strong>Info!</strong>
                No topic available
            </div>
        </div>
    <?php endif; ?>


    <?php require('../layouts/_foot.php') ?>

</div>
<!-- // END Header Layout Content -->