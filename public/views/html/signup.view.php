<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-64pt bg-gradient-red">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="/assets/images/illustration/student/128/white.svg" class="mr-md-32pt mb-32pt mb-md-0"
                alt="student">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Sign Up</h1>
                <p class="lead measure-lead text-white-50">Change your future today with over 1.000 professional courses
                    from the top industry leading teachers and professionals.</p>
            </div>
        </div>
    </div>

    <div class="bg-white py-32pt py-lg-64pt">
        <div class="container page__container">
            <form method="POST" autocomplete="off"
                class="col-md-6 p-0 mx-auto">
                <?php $form::getErrors(); ?>
                <div class="form-group">
                    <label for="first_name">First name:</label>
                    <input id="first_name" name="first_name" type="text" value="<?= $form::getInput('first_name') ?>" class="form-control"
                        placeholder="Your First name ...">
                </div>
                <div class="form-group">
                    <label for="last_name">Last name:</label>
                    <input id="last_name" name="last_name" type="text" value="<?= $form::getInput('last_name') ?>" class="form-control"
                        placeholder="Your Last name ...">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input id="email" name="email" type="email" value="<?= $form::getInput('email') ?>" class="form-control"
                        placeholder="Your email address ...">
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Your gender...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" class="form-control"
                        placeholder="Your password ...">
                </div>
                <div class="form-group mb-24pt">
                    <label for="password_confirm">Password Confirmation:</label>
                    <input id="password_confirm" name="password_confirm" type="password" class="form-control"
                        placeholder="Confirm password ...">
                </div>
                <p class="text-muted">
                  By signing up to this website, you agree with our <a href="/policy/privacy-policy">Privacy Policy</a> and respecting our <a href="/policy/terms-conditions">Terms and Conditions</a> of Usage.
                </p>
                <button class="btn btn-lg btn-accent" type="submit" name="signup">Create account</button>
            </form>
        </div>
    </div>

    <?php require("../layouts/_foot.php"); ?>

</div>
<!-- // END Header Layout Content -->