<?php
use App\Core\Model;
?>
<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

    <div class="bg-gradient-red border-bottom-white py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="avatar avatar-xxl mr-md-32pt mb-32pt mb-md-0">
                <img src="<?= $person->avatar ?>" width="104" class="avatar-img rounded-circle" alt="student">
            </div>
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0"><?= ucfirst ($person->first_name) . " " . ucfirst($person->last_name)    ?>
                </h2>
                <p class="lead text-white-50 d-flex align-items-center"><?= ucfirst($person->profil) ?> -
                    <?= ucfirst($person->gender) ?></p>
            </div>
        </div>
    </div>

    <div class="page-section bg-gradient-white">
        <div class="container page__container">
            <h2 class="display-5">Understand <span class="text-capitalize text-primary-light"><?=WEBSITE_NAME ?></span>
                in one video.</h2>
            <div class="js-player embed-responsive embed-responsive-16by9 mb-32pt">
                <div class="player embed-responsive-item">
                    <div class="player__content">
                        <div class="player__image" style="--player-image: url(assets/images/illustration/player.svg)">
                        </div>
                        <a href="#" class="player__play">
                            <span class="material-icons">play_arrow</span>
                        </a>
                    </div>
                    <div class="player__embed d-none">
                        <iframe class="embed-responsive-item"
                            src="https://player.vimeo.com/video/97243285?title=0&amp;byline=0&amp;portrait=0"
                            allowfullscreen=""></iframe>
                    </div>
                </div>
            </div>

            <div class="page-heading">
                <h4>Some Courses</h4>
                <a href="/course/courses" class="ml-sm-auto text-underline">More Courses</a>
            </div>
            <div class="pb-8pt pb-lg-40pt">
                <div class="position-relative carousel-card">
                    <div class="js-mdk-carousel row d-block" id="carousel-courses">
                        <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-courses"
                            role="button" data-slide="next">
                            <span class="carousel-control-icon material-icons"
                                aria-hidden="true">keyboard_arrow_right</span>
                            <span class="sr-only">Next</span>
                        </a>
                        <div class="mdk-carousel__content">
                            <?php foreach($courses as $course): ?>
                                <?php 
                                    $instructor_id = Model::find('person_id', 'courses_assign', 'course_id', $course['course_id']);
                                    if($instructor_id == null){
                                        $instructor_fname = null;
                                        $instructor_lname = null;
                                    }else{
                                        $instructor_fname = Model::find('first_name', 'persons', 'person_id', $instructor_id);
                                        $instructor_lname = Model::find('last_name', 'persons', 'person_id', $instructor_id);
                                    }
                                ?>
                                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                                    <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal "
                                        data-partial-height="40" data-toggle="popover" data-trigger="click">
                                        <a href="/course/course-details/<?= $course['course_id'] ?>" class="js-image" data-position="">
                                            <img src="<?= $course['course_image'] ?>" width="430" height="168" alt="course">
                                            <span class="overlay__content">
                                                <span class="overlay__action d-flex flex-column text-center">
                                                    <i class="fa fa-book-reader fa-5x"></i>
                                                    <small>view course</small>
                                                </span>
                                            </span>
                                        </a>
                                        <div class="mdk-reveal__content">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="flex">
                                                        <a class="card-title" href="/course/course-details/<?= $course['course_id'] ?>"><?= $course['course_name'] ?></a>
                                                        <small class="text-50 font-weight-bold mb-4pt"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="popoverContainer d-none">
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="card-title mb-0"><?= $course['course_name'] ?></div>
                                                <p class="lh-1 mb-0">
                                                    <span class="text-black-50 small">with</span>
                                                    <span class="text-black-50 small font-weight-bold"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></span>
                                                </p>
                                            </div>
                                        </div>
                                        <p class="my-16pt text-black-70"><?=  substr($course['course_description'], 0, 150); ?></p>
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="d-flex align-items-center mb-4pt">
                                                    <span
                                                        class="material-icons icon-16pt text-black-50 mr-4pt">money</span>
                                                    <p class="flex text-black-50 lh-1 mb-0"><small><?= number_format($course['course_price']) ?> FCFA</small></p>
                                                </div>
                                            </div>
                                            <div class="col text-right">
                                                <a href="/course/course-details/<?= $course['course_id'] ?>" class="btn btn-primary">More Infos</a>
                                            </div>
                                        </div>
    
                                    </div>
    
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require("../layouts/_foot.php"); ?>

</div>
<!-- // END Header Layout Content -->