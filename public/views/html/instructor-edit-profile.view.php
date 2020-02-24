<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">

    <!-- <div class="bg-gradient-red border-bottom-white py-40pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="<?= $person->avatar ?>" width="104" class="mr-md-32pt mb-32pt mb-md-0"
                alt="student">
            <div class="flex mb-32pt mb-md-0">
                <h2 class="text-white mb-0">Alexander Watson</h2>
                <p class="lead text-white-50 d-flex align-items-center">Student <span
                        class="ml-16pt d-flex align-items-center"><i class="material-icons icon-16pt mr-4pt">opacity</i>
                        2,300 IQ</span></p>
            </div>
        </div>
    </div> -->

    <div class="container page__container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-9">
                    <div class="page-section">
                        <h4>Basic Information</h4>
                        <?php $form::getErrors(); ?>
                        <div class="list-group list-group-form">
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">First name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="first_name" value="<?= $person->first_name ?>"
                                            placeholder="Your first name ...">
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">Last name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="last_name" value="<?= $person->last_name ?>"
                                            placeholder="Your last name ...">
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">Email address</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" value="<?= $person->email ?>"
                                            placeholder="Your email address ..." readonly>
                                        <small class="form-text text-muted">Note that if you change your email, you will
                                            have to confirm it again.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 page-nav">
                    <div class="page-section pt-lg-112pt">
                        <nav class="nav page-nav__menu">
                            <a class="nav-link active" href="/<?= strtolower($person->profil) ?>/edit-profile/<?= $person->person_id ?>">Basic Information</a>
                            <a class="nav-link" href="/<?= strtolower($person->profil) ?>/change-profile-picture/<?= $person->person_id ?>">Profile Picture</a>
                            <a class="nav-link" href="/<?= strtolower($person->profil) ?>/change-password/<?= $person->person_id ?>">Change Password</a>
                        </nav>
                        <div class="page-nav__content">
                            <button type="submit" class="btn btn-accent" name="save">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>



    <?php require('../layouts/_foot.php') ?>

</div>
<!-- // END Header Layout Content -->