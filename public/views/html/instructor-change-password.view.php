<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content ">
    <div class="container page__container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-9">
                    <div class="page-section">
                        <h4>Change Password</h4>
                        <?php $form::getErrors(); ?>
                        <div class="list-group list-group-form">
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">Actual password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="actual_password" placeholder="Actual password ...">
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">New password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="new_password" placeholder="New password ...">
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="form-group row mb-0">
                                    <label class="col-form-label col-sm-3">Confirm password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password ...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 page-nav">
                    <div class="page-section pt-lg-112pt">
                        <nav class="nav page-nav__menu">
                            <a class="nav-link" href="/<?= strtolower($person->profil) ?>/edit-profile/<?= $person->person_id ?>">Basic Information</a>
                            <a class="nav-link" href="/<?= strtolower($person->profil) ?>/change-profile-picture/<?= $person->person_id ?>">Profile Picture</a>
                            <a class="nav-link active" href="/<?= strtolower($person->profil) ?>/change-password/<?= $person->person_id ?>">Change Password</a>
                        </nav>
                        <div class="page-nav__content">
                            <button type="submit" name="save" class="btn btn-accent">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php require("../layouts/_foot.php"); ?>

</div>
<!-- // END Header Layout Content -->