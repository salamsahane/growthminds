<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="/admin">
                    <img class="align-content" src="/assets/images/admin/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <h1 class="mb-2 display-4">New Password</h1>
                <form method="POST" autocomplete="off">
                    <?php $form::getErrors(); ?>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control" placeholder="New password">
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirm" class="form-control" placeholder="Confirm New password">
                    </div>
                    <button type="submit" name="change_password" class="btn btn-success btn-flat m-b-30 m-t-30">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>