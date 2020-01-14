<!-- Header Layout Content -->
<div class="mdk-header-layout__content page-content pb-0">
    <div class="bg-gradient-red py-32pt">
        <div class="container d-flex flex-column flex-sm-row align-items-sm-center">
            <div class="flex">
                <h1 class="text-white flex mb-0">New Password</h1>
                <p class="text-white-50 lead">Account Management</p>
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
            <form method="POST" autocomplete="off" class="col-sm-6 mx-auto">
                <?php $form::getErrors(); ?>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="Type a new password ...">
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password:</label>
                    <input id="password_confirm" name="password_confirm" type="password" class="form-control"
                        placeholder="Confirm your new password ...">
                </div>
                <div class="text-center">
                    <button type="submit" name="save_password" class="btn btn-accent btn-lg">Save password</button>
                </div>
            </form>
        </div>
    </div>
    <?php require("../layouts/_foot.php"); ?>
</div>
<!-- // END Header Layout Content -->