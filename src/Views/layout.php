<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Premier Blog</title>
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary bg-opacity-25">
        <div class="container-fluid">
            <a class="navbar-brand" href="/my-first-blog">Mon Premier Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/my-first-blog/' ? 'active' : '' ?>" aria-current="page" href="/my-first-blog">Accueil</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === '/my-first-blog/posts' ? 'active' : '' ?>" href="/my-first-blog/posts">Les articles</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?> <!-- if connected-->
                    <?php if ($_SESSION['isAdmin'] === 1): ?> <!-- if admin -->
                        <li class="nav-item">
                            <a class="nav-link text-danger " href="/my-first-blog/admin/posts">Partie admin</a>
                        </li>
                    <?php endif ?>
                <?php endif ?>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav ml-auto">
                    <?php if (!isset($_SESSION['user_id'])): ?>  <!-- if disconnected -->
                        <li class="nav-item">
                            <a class="btn btn-secondary text-white me-2 mb-2" href="/my-first-blog/register">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary text-white" href="/my-first-blog/login">Connexion</a>
                        </li>
                    <?php endif ?>
                    <?php if (isset($_SESSION['user_id'])): ?> <!-- if connected -->
                        <li class="nav-item">
                            <a class="btn btn-outline-danger" href="/my-first-blog/logout">Se déconnecter</a>
                        </li>
                    <?php endif ?>
                </ul>
            </span>
            </div>
        </div>
    </nav>
    <div>
        <?= $content ?>
    </div>
</body>
</html>
