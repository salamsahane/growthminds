<?php

use App\Core\Model;

?>
<div class="mdk-box mdk-box bg-dark js-mdk-box position-relative overflow-hidden mb-0"
    data-effects="parallax-background blend-background">
    <div class="mdk-box__bg">
        <div class="mdk-box__bg-front"
            style="background-image: url(/assets/images/Thinkstock_475924741-CampusUSA-multiethnic-college-students-in-caps-and-gowns.jpg);"></div>
    </div>
    <div class="mdk-box__content">
        <div class="container page__container py-64pt py-md-112pt">
            <div class="row align-items-center text-center text-md-left">
                <div class="col-md-10 col-lg-10 order-1 order-md-0">
                    <h1 class="text-white">Learn <span
                            class="d-block d-md-inline-block text-scramble js-text-scramble">Development</span></h1>
                    <p class="lead mb-32pt mb-lg-48pt text-white">Management, Technology and Creative Skills taught by
                        national experts. Explore a wide range of skills with our professional tutorials.</p>
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
                    <p class="text-black-70 mb-0">Professional development from the best people.</p>
                </div>
            </div>
            <div class="d-flex col-md align-items-center">
                <div
                    class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                    <i class="material-icons text-primary-light">update</i>
                </div>
                <div class="flex">
                    <p class="mb-0"><strong>Unlimited Access</strong></p>
                    <p class="text-black-70 mb-0">Unlock Library and learn any topic with one subscription.</p>
                </div>
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
                    $instructor_fname = Model::find('first_name', 'persons', 'person_id', $instructor_id);
                    $instructor_lname = Model::find('last_name', 'persons', 'person_id', $instructor_id);
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
                                    <small class="text-50 font-weight-bold mb-4pt"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></small>
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
                                <span class="text-black-50 small font-weight-bold"><?= ucfirst($instructor_fname) . ' ' . ucfirst($instructor_lname) ?></span>
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
                                <p class="flex text-black-50 lh-1 mb-0"><small><?= number_format($course['course_price']) ?> FCFA</small></p>
                            </div>
                        </div>
                        <div class="col text-right">
                            <a href="/course/course-details/<?= $course['course_id'] ?>" class="btn btn-primary">Start Course</a>
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

<div class="page-section">
    <div class="container page__container">
        <div class="page-headline text-center">
            <h2>Feedback</h2>
            <p class="lead measure-lead mx-auto text-black-70">What other students turned professionals have to say
                about us after learning with us and reaching their goals.</p>
        </div>

        <div class="position-relative carousel-card">
            <div class="row d-block js-mdk-carousel" id="carousel-feedback">
                <a class="carousel-control-next js-mdk-carousel-control mt-n24pt" href="#carousel-feedback"
                    role="button" data-slide="next">
                    <span class="carousel-control-icon material-icons" aria-hidden="true">keyboard_arrow_right</span>
                    <span class="sr-only">Next</span>
                </a>
                <div class="mdk-carousel__content">

                    <div class="col-12 col-md-6">
                        <div class="card card--elevated card-body">
                            <blockquote class="mb-0">
                                <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia
                                    distinctio reiciendis iusto id, doloribus optio soluta laborum nobis dolor tempore
                                    velit porro maiores eveniet voluptas officia ipsa magnam aliquam. Perferendis?</p>

                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/people/110/guy-1.jpg" width="40" alt="avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="media-body media-middle">
                                        <p class="mb-0"><a href="#" class="text-body"><strong>Umberto Kass</strong></a>
                                        </p>
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="card card--elevated card-body">
                            <blockquote class="mb-0">
                                <p class="text-70">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia
                                    distinctio reiciendis iusto id, doloribus optio soluta laborum nobis dolor tempore
                                    velit porro maiores eveniet voluptas officia ipsa magnam aliquam. Perferendis?</p>

                                <div class="media">
                                    <div class="media-left">
                                        <img src="assets/images/people/110/guy-2.jpg" width="40" alt="avatar"
                                            class="rounded-circle">
                                    </div>
                                    <div class="media-body media-middle">
                                        <p class="mb-0"><a href="#" class="text-body"><strong>Umberto Kass</strong></a>
                                        </p>
                                        <div class="rating">
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span class="material-icons">star</span></span>
                                            <span class="rating__item"><span
                                                    class="material-icons">star_border</span></span>
                                        </div>
                                    </div>
                                </div>
                            </blockquote>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<div class="js-fix-footer bg-white border-top-2">
    <div class="container page-section py-lg-48pt">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-6 col-md-4 mb-24pt mb-md-0">
                        <h4 class="text-70">Learn</h4>
                        <nav class="nav nav-links nav--flush flex-column">
                            <a class="nav-link" href="library.html">Library</a>
                            <a class="nav-link" href="library-featured.html">Featured</a>
                            <a class="nav-link" href="library-filters.html">Explore</a>
                            <a class="nav-link" href="paths.html">Learning Paths</a>
                        </nav>
                    </div>
                    <div class="col-6 col-md-4 mb-24pt mb-md-0">
                        <h4 class="text-70">Join us</h4>
                        <nav class="nav nav-links nav--flush flex-column">
                            <a class="nav-link" href="pricing.html">Pricing</a>
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="signup.html">Sign Up</a>
                            <a class="nav-link" href="signup-payment.html">Payment</a>
                        </nav>
                    </div>
                    <div class="col-6 col-md-4 mb-32pt mb-md-0">
                        <h4 class="text-70">Community</h4>
                        <nav class="nav nav-links nav--flush flex-column">
                            <a class="nav-link" href="student-discussions.html">Discussions</a>
                            <a class="nav-link" href="student-discussions-ask.html">Ask Question</a>
                            <a class="nav-link" href="student-profile.html">Student Profile</a>
                            <a class="nav-link" href="instructor-profile.html">Instructor Profile</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-md-right">
                <p class="text-70 brand justify-content-md-end">
                    <img class="brand-icon" src="assets/images/logo/black-70%402x.png" width="30" alt="Tutorio"> Growth Minds
                </p>
                <p class="text-muted mb-0 mb-lg-16pt">Growth Minds is an online learning platform that helps anyone achieve
                    their personal and professional goals.</p>
            </div>
        </div>
    </div>
    
    <?php require("../layouts/_foot.php"); ?>
</div>