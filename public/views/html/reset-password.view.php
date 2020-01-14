<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="bg-gradient-red py-32pt">
        <div class="container d-flex flex-column flex-sm-row align-items-sm-center">
            <div class="flex">
                <h1 class="text-white flex mb-0">Reset Password</h1>
                <p class="lead text-white-50">Account Management</p>
            </div>
            <p class="d-sm-none"></p>
            <a href="/home/contact-us" class="btn btn-outline-white flex-column">
                Need Help?
                <span class="btn__secondary-text">Contact us</span>
            </a>
        </div>
    </div>
    <div class="page-section bg-white">
        <div class="container page__container">
            <div class="col-sm-6 mx-auto">
                <div class="alert alert-light border-1 border-left-3 border-left-primary d-flex mb-24pt" role="alert">
                    <i class="material-icons text-primary mr-3">info</i>
                    <div class="text-body">A mail with password reset link will been sent to your email
                        address, if it exists on our system.</div>
                </div>

                <form method="POST" autocomplete="off">
                    <?php $form::getErrors(); ?>
                    <div class="form-group">
                        <label form="email">Email:</label>
                        <input type="email" name="email" id="email" value="<?= $form::getInput('email') ?>" class="form-control" placeholder="Your email address ...">
                        <small class="form-text text-muted">We will email you with link to reset password.</small>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="reset" class="btn btn-accent btn-lg">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require("../layouts/_foot.php"); ?>

</div>
<!-- // END Header Layout Content -->