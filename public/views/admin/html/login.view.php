<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="/admin">
                    <img class="align-content" src="/assets/images/admin/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form method="POST" autocomplete="off">
                    <?php $form::getErrors(); ?>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" value="<?= $form::getInput('email') ?>" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember Me
                        </label>
                        <label class="pull-right">
                            <a href="/admin/account/reset-password">Forgotten Password?</a>
                        </label>
                    </div>
                    <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</div>