<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'styles.css'?>">        
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/my-first-blog">Mon Premier Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/my-first-blog">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/my-first-blog/posts">Les derniers articles</a>
            </li>
            
            <?php if (isset($_SESSION['user_id'])): ?> <!-- si connecté -->
                <?php if ($_SESSION['isAdmin'] === 1): ?> <!-- si connecté -->
                    <li class="nav-item">
                        <a class="nav-link btn btn-secundary text-danger" href="/my-first-blog/admin/posts">Gestion des articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secundary text-danger" href="/my-first-blog/admin/comments">Gestion des commentaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secundary text-danger" href="/my-first-blog/admin/users">Gestion des utilisateurs</a>
                    </li>
                <?php endif ?>
            <?php endif ?>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (!isset($_SESSION['user_id'])): ?>  <!-- si déconnecté -->
            <li class="nav-item">
                <a class="nav-link btn btn-outline-dark mr-2" href="/my-first-blog/register">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-primary text-primary" href="/my-first-blog/login">Connexion</a>
            </li>
            <?php endif ?>
            <?php if (isset($_SESSION['user_id'])): ?> <!-- si connecté -->
            <li class="nav-item">
                <a class="nav-link btn btn-outline-danger text-danger" href="/my-first-blog/logout">Se déconnecter</a>
            </li>
            <?php endif ?>
        </ul>
    </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
</body>
</html>