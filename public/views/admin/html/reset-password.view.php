<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="/admin">
                    <img class="align-content" src="/assets/images/admin/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <div class="alert alert-info">
                    <i class="fa fa-info-circle"></i> A mail with password reset link will been sent to your email
                        address, if it exists on our system.</div>
                <form method="POST" autocomplete="off">
                    <?php $form::getErrors(); ?>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" value="<?= $form::getInput('email') ?>" placeholder="Email">
                    </div>
                    <button type="submit" name="reset" class="btn btn-primary btn-flat m-b-30 m-t-30">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</div>