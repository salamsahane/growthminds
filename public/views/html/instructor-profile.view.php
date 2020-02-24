<?php
use App\Models\QueryBuilder;

?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

    <div class="bg-gradient-red border-bottom-white py-40pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="<?= $person->avatar ?>" width="104" class="mr-md-32pt mb-32pt mb-md-0"
                alt="instructor">
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0"><?= ucfirst($person->first_name) . ' ' . ucfirst($person->last_name); ?></h2>
                <p class="lead text-white-50 d-flex align-items-center"><?= ucfirst($person->gender) ?> <span
                        class="ml-16pt d-flex align-items-center"><?= ucfirst($person->email) ?></span></p>
            </div>
            <a href="/instructor/edit-profile/<?= $person->person_id ?>" class="btn btn-outline-white">Edit account</a>
        </div>
    </div>

    <div class="container page__container page-section">
        <div class="mb-heading d-flex align-items-conter">
            <h4 class="flex m-0">Courses Assign</h4>
        </div>
        <div class="row">
            <?php if($number_courses > 0): ?>
                <?php foreach($courses as $course): ?>
                    <?php 
                        $q = (new QueryBuilder)
                                ->from('courses')
                                ->where('course_id = :course_id')
                                ->setParam('course_id', $course['course_id']);
                        $row = $q->fetchObj();    
                    ?>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal " data-partial-height="40" data-toggle="popover" data-trigger="click">
                            <a href="/course/course-details/<?= $row->course_id ?>" class="js-image" data-position="">
                                <img src="<?= $row->course_image ?>" alt="<?= $row->course_name ?>" width="200" height="200">
                            </a>
                            <div class="mdk-reveal__content">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex">
                                            <a class="card-title mb-4pt" href="/course/course-details/<?= $row->course_id ?>"><?= $row->course_name ?></a>
                                        </div>
                                        <a href="instructor-edit-course.html" class="ml-4pt material-icons text-black-20 card-course__icon-favorite">edit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="popoverContainer d-none">
                            <div class="media">
                                <div class="media-body">
                                    <div class="card-title mb-0"><?= $row->course_name ?></div>
                                </div>
                            </div>

                            <p class="my-16pt text-black-70"><?= substr($row->course_description, 0, 150); ?></p>

                            <div class="row align-items-center">
                                <div class="col text-right">
                                    <a href="/course/course-details/<?= $row->course_id ?>" class="btn btn-primary">More Infos</a>
                                </div>
                            </div>

                        </div>
                        </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="alert alert-info">
                    No Course Assign
                </div>
            <?php endif ?>
        </div>
    </div>

    <?php require('../layouts/_foot.php') ?>

</div>
<!-- // END Header Layout Content -->