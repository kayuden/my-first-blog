<div class="container">
    <a href="/my-first-blog/posts" class="btn btn-secondary mt-4 mb-4">Retour aux articles</a>

    <?php $_SESSION['post_id'] = (int) $params['post']->id; ?>

    <div>
        <small><?= $params['post']->getModificationDate() === "" ? "Publié le " . $params['post']->getCreationDate() : "Modifié le " . $params['post']->getModificationDate() ?></small>
    </div>
    <h1 class="text-primary"><?= $params['post']->capitalizeTitleFirstLetter() ?></h1>
    <p class="fw-bold">De <?= $params['post']->username ?></p>
    <p class="font-italic mt-3"><?= $params['post']->chapo ?></p>
    <p><?= $params['post']->content ?></p>

    <h3>Commentaires (<?= count($params['comment']) ?>)</h3>

    <?php if (isset($_SESSION['isAdmin'])): ?> <!-- si connecté -->
        <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">Votre commentaire a bien été soumis à la validation.</div>
        <?php endif ?>

        <div>
            <form action="/my-first-blog/comments/create" method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" name="content" id="content" placeholder="Ajouter un commentaire" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
            </form>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center">
            <a href="/my-first-blog/login">Se connecter</a> pour publier un commentaire.
        </div>
    <?php endif ?>
    <div class="mt-3">
        <?php if (!empty($params['comment'])): ?>
                <?php foreach ($params['comment'] as $comment): ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <small class="text-secondary"><span class="text-black fw-bold"><?= $comment->username ?></span> <?= $comment->getCreationDate() ?></small>
                            <p><?= $comment->content ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
        <?php else: ?>
            <p>Aucun commentaire</p>
        <?php endif; ?>
    </div>
</div>