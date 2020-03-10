<?php

use App\Models\QueryBuilder;

?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="bg-gradient-red py-32pt">
        <div class="container d-flex flex-column flex-sm-row align-items-sm-center">
            <div class="flex">
                <h1 class="text-white text-uppercase flex mb-0">Specialties</h1>
            </div>
        </div>
    </div>
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
                        <h4>All Programs</h4>
                        <p class="ml-sm-auto text-70 mb-0"><strong><?= $number_specialties ?></strong> results in all programs</p>
                    </div>

                    <div class="row">
                        <?php foreach($specialties as $specialty): ?>
                            <?php 
                                $q = (new QueryBuilder)
                                        ->from("courses_per_specialty")
                                        ->where("specialty_id = :specialty_id")
                                        ->setParam("specialty_id", $specialty['specialty_id']);
                                $number_courses = $q->count('course_id');    
                            ?>
                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                                        <a href="/specialty/specialty-details/<?= $specialty['specialty_id'] ?>" class="js-image" data-position="center">
                                            <img src="<?= $specialty['specialty_image'] ?>" alt="specialty" width="430" height="168">
                                            <!-- <span class="overlay__content">
                                                <span class="overlay__action d-flex flex-column text-center">
                                                    <i class="fa fa-box-open fa-5x"></i>
                                                    <small>View specialty</small>
                                                </span>
                                            </span> -->
                                        </a>
                                        <div class="mdk-reveal__content">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex">
                                                        <a class="card-title" href="/specialty/specialty-details/<?= $specialty['specialty_id'] ?>"><?= $specialty['specialty_name'] ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popoverContainer d-none">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="card-title mb-0"><?=$specialty['specialty_name'] ?></div>
                                            </div>
                                        </div>

                                        <p class="my-16pt text-black-70"><?= substr($specialty['specialty_description'], 0, 150); ?>...</p>

                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="d-flex align-items-center mb-4pt">
                                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">book</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small><?= $number_courses ?>&nbsp;<?= $number_courses <= 1 ? 'Course' : 'Courses'; ?></small></p>
                                                </div>
                                                <div class="d-flex align-items-center mb-4pt">
                                                    <span class="material-icons icon-16pt text-black-50 mr-4pt">money</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small><?= number_format($specialty['specialty_price']) ?> FCFA</small></p>
                                                </div>
                                            </div>
                                            <div class="col text-right">
                                                <a href="/specialty/specialty-details/<?= $specialty['specialty_id'] ?>" class="btn btn-primary">More Infos</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                        <?php endforeach ?>
                    </div>
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
                            <ul class="accordion js-accordion m-0" id="programs">
                                <li class="accordion__item open">
                                    <a class="accordion__toggle" data-toggle="collapse" data-parent="#programs"
                                        href="#program-all">
                                        <span class="flex">Category</span>
                                        <span class="accordion__toggle-icon material-icons">keyboard_arrow_down</span>
                                    </a>
                                    <nav class="accordion__menu collapse show" id="program-all">
                                        <a class="accordion__menu-link active" href="/specialty/specialties">All Programs</a>
                                        <?php foreach($programs as $program): ?>
                                            <?php
                                                $q = (new QueryBuilder)
                                                        ->from("fields")
                                                        ->where("program_id = :program_id")
                                                        ->setParam('program_id', $program['program_id']);
                                                $number_fields = $q->count('field_id');
                                                $fields = $q->fetchAll();
                                            ?>
                                            <div>
                                                <a href="#<?= strtolower($program['program_name']) ?>" class="accordion__menu-link" data-toggle="collapse"><?= $program['program_name'] ?></a>
                                                <?php if($number_fields > 0): ?>
                                                    <div class="collapse" id="<?= strtolower($program['program_name']) ?>">
                                                        <nav class="accordion__submenu">
                                                            <?php foreach($fields as $field): ?>
                                                                <a href="#"><?= $field['field_name'] ?></a>
                                                            <?php endforeach; ?>
                                                        </nav>
                                                    </div>
                                                <?php endif ?>
                                            </div>
                                        <?php endforeach ?>
                                    </nav>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php require("../layouts/_foot.php"); ?>
</div>
<!-- // END Header Layout Content -->