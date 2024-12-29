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


<div class="container">
    <h1 class="text-center mb-4 mt-4">Se connecter</h1>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger">L'utilisateur et le mot de passe ne correspondent pas.</div>
    <?php endif ?>
    
    <form action="/my-first-blog/login" method="POST">
        <div class="form-group mb-3">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
</div>
