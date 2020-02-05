<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card z-depth-2">
                <div class="card-content grey-text text-darken-1">
                    <span class="card-title blue-text text-darken-2">Activation de Compte</span>
                    <p>Hello <?= $first_name ?>! <br/> To activate your account, click on the link below:</p>
                </div>
                <div class="card-action blue darken-2">
                    <a href="<?= WEBSITE_URL . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'account' . DIRECTORY_SEPARATOR . 'activation' . DIRECTORY_SEPARATOR .  App\Core\Model::getDB()->lastInsertId() . DIRECTORY_SEPARATOR . $token ?>" class="waves-effect waves-light btn-large white blue-text text-darken-2">Activate Account</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>