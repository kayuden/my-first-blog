<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Premier Blog PHP</title>
    <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'styles.css'?>">        
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/my-first-php-blog">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/my-first-php-blog">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/my-first-php-blog/posts">Les articles</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['auth'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/my-first-php-blog/logout">Se déconnecter</a>
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