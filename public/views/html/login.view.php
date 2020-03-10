<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="bg-gradient-red py-32pt">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <img src="/assets/images/illustration/student/128/white.svg" class="mr-md-32pt mb-32pt mb-md-0"
                alt="student">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-0">Login In</h1>
                <p class="lead measure-lead text-white-50">Account Management</p>
            </div>
            <a href="signup" class="btn btn-outline-white flex-column">
                Don't have an account?
                <span class="btn__secondary-text">Sign up Today!</span>
            </a>
        </div>
    </div>
    <div class="bg-white pt-32pt pb-32pt pb-md-64pt pt-sm-64pt pb-32pt">
        <div class="container page__container">
            <form method="POST" autocomplete="off"
                class="col-md-5 p-0 mx-auto">
                <?php $form::getErrors(); ?>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input id="email" type="email" name="email" class="form-control" value="<?= $form::getInput('email') ?>" placeholder="Your email address ...">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" name="password" class="form-control"
                        placeholder="Your password ...">
                    <p class="text-right"><a href="reset-password" class="small">Forgot your password?</a></p>
                </div>
                <div class="text-center">
                    <button class="btn btn-lg btn-accent" type="submit" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
    <?php require("../layouts/_foot.php"); ?>
</div>
<!-- // END Header Layout Content -->