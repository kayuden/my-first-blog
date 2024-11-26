<a href="/my-first-php-blog/posts" class="btn btn-secondary mt-2">Retour aux articles</a>


<?php $_SESSION['post_id'] = (int) $params['post']->id; ?>

<h1><?= $params['post']->title ?></h1>
<h2>Par <?= $params['post']->username ?></h2>
<p class="font-italic mt-3"><?= $params['post']->chapo ?></p>
<p><?= $params['post']->content ?></p>

<h2>Commentaires (<?= count($params['comment']) ?>)</h2>

<?php if (isset($_SESSION['isAdmin'])): ?> <!-- si connecté -->
    <?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">Votre commentaire a bien été soumis à la validation.</div>
    <?php endif ?>

    <div>
        <form action="/my-first-php-blog/comments/create" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="content" id="content" placeholder="Ajouter un commentaire" required>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
<?php endif ?>

<div class="mt-3">
    <?php if (!empty($params['comment'])): ?>
            <?php foreach ($params['comment'] as $comment): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <small class="text-info"><span class="text-primary font-weight-bold"><?= $comment->username ?></span> <?= $comment->getCreationDate() ?></small>
                        <p><?= $comment->content ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
    <?php else: ?>
        <p>Aucun commentaire</p>
    <?php endif; ?>
</div>