<h1>Inscription</h1>

<?php if (isset($_SESSION['errors'])): ?>

<?php foreach($_SESSION['errors'] as $errorsArray): ?>
    <?php foreach($errorsArray as $errors): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
<?php endforeach ?>

<?php endif ?>
<?php session_destroy()?>

<form action="/my-first-php-blog/register" method="POST">
    <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="username" id="username" required autocomplete="off">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" id="email" required autocomplete="off">
    </div>
    <div class="form-group">
        <label for="email-conf">Confirmation de l'e-mail</label>
        <input type="email" class="form-control" name="email-conf" id="email-conf" required autocomplete="off">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" pattern=".{16,}" required>
    </div>
    <div class="form-group">
        <label for="password-conf">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="password-conf" id="password-conf" pattern=".{16,}" required>
    </div>
    <button type="submit" class="btn btn-primary">S'inscrire</button>
</form>