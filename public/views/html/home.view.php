<?php

use App\Core\Model;

?>
<div class="mdk-box mdk-box bg-dark js-mdk-box position-relative overflow-hidden mb-0"
    data-effects="parallax-background blend-background">

    <div class="mdk-box__bg">
        <div class="mdk-box__bg-front"
            style="background-image: url(/assets/images/Thinkstock_475924741-CampusUSA-multiethnic-college-students-in-caps-and-gowns.jpg); filter: blur(3px)">
        </div>
    </div>
    <div class="mdk-box__content">
        <div class="container page__container py-64pt py-md-112pt">
            <div class="row align-items-center text-center text-md-left">
                <div class="col-sm-12 col-md-10 col-lg-10 order-1 order-md-0">
                    <h1 class=" text-dark">Learn <span
                            class="d-block d-md-inline-block text-scramble js-text-scramble">Development</span></h1>
                    <p class="lead mb-32pt mb-lg-48pt text-dark" style="width: 400px">Management, Technology and
                        Creative Skills taught by
                        national experts. Explore a wide range of knowledge with our professional courses.</p>
                    <a href="/course/courses" class="btn btn-lg btn-white btn--raised mb-16pt">Browse Courses</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bg-white border-bottom-2 py-16pt py-sm-24pt py-md-32pt ">
    <div class="container page__container">
        <div class="row align-items-center">
            <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                <div
                    class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-primary-light">subscriptions</i>
                </div>
                <div class="flex">
                    <p class="mb-0"><strong>500+ Courses</strong></p>
                    <p class="text-black-70 mb-0">Explore a wide range of knowledge.</p>
                </div>
            </div>
            <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                <div
                    class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-primary-light">verified_user</i>
                </div>
                <div class="flex">
                    <p class="mb-0"><strong>By National Experts</strong></p>
                    <p class="text-black-70 mb-0">Professional course content from the best instructors.</p>
                </div>
            </div>
            <div class="d-flex col-md align-items-center">
                <div
                    class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-primary-light">update</i>
                </div>
                <div class="flex">
                    <p class="mb-0"><strong>Unlimited Access</strong></p>
                    <p class="text-black-70 mb-0">Unlock course or specialty and learn any topic with one subscription.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-section bg-white">
    <div class="container page__container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-3">WELCOME</h1>
                <p class="text-justify text-black-70">
                    Online education is changing the world. The world now are days is facing many challenges with both
                    economical, social and political instability, Health crises and more.
                    All this discord the educational sector which gave birth to a situation where schools are look down or
                    destroy. As a result, many student willing to continue with studies are finding their selves in a critical
                    situation.
                    Today, with the amazing technological evolution of the world and the facilities it brings especially the
                    internet, the concept of <span class="">ONLINESTUDIES</span> came to life.
                    ONLINESTUDIES makes it easy for students to connect with online
                    university programs, courses, blended learning platforms, and remote course providers. The future of
                    higher education is online and international and domestic students trust ONLINESTUDIES.
                </p>
            </div>
            <div class="col-md-4 d-flex align-content-center">
                <img src="/assets/images/logo/logotext.png" alt="Growthminds logo" style="width: 300px; height: 300px">
            </div>
        </div>
    </div>
</div>

<div class="page-section border-bottom-2">
    <div class="container page__container">
        <div class="row align-items-end mb-16pt mb-md-32pt">
            <div class="col-md-auto mb-32pt mb-md-0">
                <div class="page-headline page-headline--title text-center text-md-left p-0">
                    <h2>Top Courses</h2>
                </div>
            </div>
        </div>

        <div class="row">
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
            <div class="col-sm-6 col-md-4 col-lg-3">

                <div class="card card--elevated card-course overlay js-overlay mdk-reveal js-mdk-reveal "
                    data-partial-height="40" data-toggle="popover" data-trigger="click">


                    <a href="course.html" class="js-image" data-position="center">
                        <img src="<?= $course['course_image'] ?>" width="200" height="200" alt="course">
                    </a>

                    <div class="mdk-reveal__content">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex">
                                    <a class="card-title" href="course.html"><?= $course['course_name'] ?></a>
                                    <small
                                        class="text-50 font-weight-bold mb-4pt"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popoverContainer d-none">
                    <div class="media">
                        <div class="media-body">
                            <div class="card-title mb-0"><?= $course['course_name']; ?></div>
                            <p class="lh-1 mb-0">
                                <span class="text-black-50 small">with</span>
                                <span
                                    class="text-black-50 small font-weight-bold"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></span>
                            </p>
                        </div>
                    </div>

                    <p class="my-16pt text-black-70"><?= substr($course['course_description'], 0, 150) ?>...</p>

                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="d-flex align-items-center mb-4pt">
                                <span class="material-icons icon-16pt text-black-50 mr-4pt">list</span>
                                <p class="flex text-black-50 lh-1 mb-0"><small>12 lessons</small></p>
                            </div>
                            <div class="d-flex align-items-center mb-4pt">
                                <span class="material-icons icon-16pt text-black-50 mr-4pt">money</span>
                                <p class="flex text-black-50 lh-1 mb-0">
                                    <small><?= number_format($course['course_price']) ?> FCFA</small></p>
                            </div>
                        </div>
                        <div class="col text-right">
                            <a href="/course/course-details/<?= $course['course_id'] ?>" class="btn btn-primary">Start
                                Course</a>
                        </div>
                    </div>

                </div>

            </div>
            <?php endforeach; ?>
        </div>
        <div class="pt-md-16pt text-center">
            <a href="/course/courses" class="btn btn-outline-secondary">Browse Courses</a>
        </div>
    </div>
</div>

<div class="page-section bg-white">
    <div class="container page__container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-3"><?= WEBSITE_NAME ?></h1>
                <p class="text-justify text-black-70">
                    <?= WEBSITE_NAME ?> is an online learning platform that enables Cameroonians to access courses and
                    follow an academic curriculum
                    in a variety of fields to prepare themselves for the different examinations. <?= WEBSITE_NAME ?>
                    follows the Cameroonian system of education which ensures you proper course content.
                    <?= WEBSITE_NAME ?> is a very responsive platform, i.e it is flexible and portable and can be access
                    through any device which have access to internet. The user experience of the platform have been work
                    out to enable you navigate properly, smoothly and make it user friendly. <br><br> <a
                        href="/account/signup" class="btn btn-outline-accent">Join us now</a>
                </p>
            </div>
            <div class="col-md-6">
                <h2 id="activity"></h2>
                <div id="imagesCarousel">
                    <img class="d-block w-100" src="/assets/images/undraw_researching.svg"
                        alt="Training program" style="width: 100%; height: 400px;" />
                    <img class="d-block w-100" src="/assets/images/undraw_teaching.svg" alt="Coaching" style="width: 100%; height: 400px;" />
                    <img class="d-block w-100" src="/assets/images/undraw_business_plan.svg"
                        alt="Business Consultancy" style="width: 100%; height: 400px;" />
                    <img class="d-block w-100" src="/assets/images/undraw_breaking_barriers.svg"
                        alt="Motivational Speaking" style="width: 100%; height: 400px;" />
                </div>
            </div>
        </div>
    </div>  
</div>

<div class="page-section bg-gradient-red">
    <div class="container page__container">
        <h2 class="display-5 text-center text-white-50">EMPOWERING STUDENTS TO IMPROVE THEIR WORLD IS OUR MISSION</h2>
    </div>
</div>

<div class="page-section bg-white border-bottom-2">
    <div class="container page__container">
        <div class="page-headline text-center">
            <h2>Some Specialties</h2>
            <p class="lead text-black-70 measure-lead mx-auto">Stop guessing what to learn next and start making
                progress faster based on your current skill level and experience.</p>
        </div>

        <div class="row d-block js-mdk-carousel">
            <div class="mdk-carousel__content">


                <div class="col-12 col-sm-6 col-md-4">

                    <a href="path.html" class="card stack stack--hidden-hover card-featured-path overlay js-overlay">
                        <span class="card-featured-path__content">
                            <span data-position="center" class="js-image" data-height="96">
                                <img src="assets/images/paths/angular_430x168.png" alt="course">
                            </span>
                            <span class="overlay__content">
                                <span class="overlay__action card-title mb-0">Telecommunication</span>
                            </span>
                        </span>
                    </a>

                </div>
                <div class="col-12 col-sm-6 col-md-4">

                    <a href="path.html" class="card stack stack--hidden-hover card-featured-path overlay js-overlay">
                        <span class="card-featured-path__content">
                            <span data-position="left" class="js-image" data-height="96">
                                <img src="assets/images/paths/react_430x168.png" alt="course">
                            </span>
                            <span class="overlay__content">
                                <span class="overlay__action card-title mb-0">Transport and logistic</span>
                            </span>
                        </span>
                    </a>

                </div>
                <div class="col-12 col-sm-6 col-md-4">

                    <a href="path.html" class="card stack stack--hidden-hover card-featured-path overlay js-overlay">
                        <span class="card-featured-path__content">
                            <span data-position="center" class="js-image" data-height="96">
                                <img src="assets/images/paths/swift_430x168.png" alt="course">
                            </span>
                            <span class="overlay__content">
                                <span class="overlay__action card-title mb-0">Software Engineering</span>
                            </span>
                        </span>
                    </a>

                </div>

            </div>
        </div>
        <div class="pt-8pt pt-md-32pt text-center">
            <a href="paths.html" class="btn btn-outline-secondary">Browse Learning Paths</a>
        </div>
    </div>
</div>

<div class="page-section bg-gradient-red">
    <div class="container page__container">
        <div class="page-headline text-center">
            <h2 class="text-center text-white">OUR SLOGAN</h2>
            <h1 class="display-4 text-center text-white" id="type"></h1>
        </div>
        <div class="alert alert-light border-1 border-left-4 border-left-info" role="alert">
            <strong>Note!</strong>
            If you want to know more about <?= WEBSITE_NAME ?>, our objectives and vision, visite the <a
                href="/home/about-us" class="text-primary">About Us Page</a>.
        </div>
    </div>
</div>

<div class="js-fix-footer bg-white">
    <div class="container page-section py-lg-48pt">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6 col-md-4 mb-24pt mb-md-0">
                        <h4 class="text-70">Learn</h4>
                        <nav class="nav nav-links nav--flush flex-column">
                            <a class="nav-link"
                                href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'course/courses' ?>">Courses</a>
                            <a class="nav-link"
                                href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'specialty/specialties' ?>">Specialties</a>
                        </nav>
                    </div>
                    <div class="col-6 col-md-4 mb-24pt mb-md-0">
                        <h4 class="text-70">Join us</h4>
                        <nav class="nav nav-links nav--flush flex-column">
                            <a class="nav-link"
                                href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'account/login' ?>">Login</a>
                            <a class="nav-link" href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'account/signup' ?>">Sign
                                Up</a>
                        </nav>
                    </div>
                    <div class="col-6 col-md-4 mb-32pt mb-md-0">
                        <h4 class="text-70">Community</h4>
                        <nav class="nav nav-links nav--flush flex-column">
                            <a class="nav-link" href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'home/about-us' ?>">About
                                US</a>
                            <a class="nav-link"
                                href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'home/contact-us' ?>">Contact US</a>
                            <a class="nav-link" href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'home/faq' ?>">FAQ</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-right">
                <p class="text-70 brand justify-content-md-end">
                    <img class="brand-icon" src="assets/images/logo/black-70%402x.png" width="30" alt="Tutorio">
                    <?= WEBSITE_NAME ?>
                </p>
                <p class="text-muted mb-0 mb-lg-16pt"><?= WEBSITE_NAME ?> is an online learning platform that helps
                    everyone achieve
                    its personal and professional goals.</p>
            </div>
        </div>
    </div>
    <?php require("../layouts/_foot.php"); ?>
</div>