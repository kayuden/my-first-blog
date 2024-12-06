<h1 class="mb-4">Administration des commentaires</h1>

<?php if (empty($params['comments'])): ?>
    <h2 class="mb-3">Aucun commentaire à valider</h2>
<?php else: ?>
    <h2 class="mb-3">Commentaires à valider</h2>

    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Contenu</th>
        <th scope="col">Auteur</th>
        <th scope="col">Publié le</th>
        <th scope="col">Lien vers l'article associé</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($params['comments'] as $comment): ?>
                <tr>
                    <th scope="row"><?= $comment->id ?></th>
                    <td><?= $comment->content ?></td>
                    <td><?= $comment->username ?></td>
                    <td><?= $comment->getCreationDate() ?></td>
                    <td><a href="/my-first-php-blog/posts/<?= $comment->post_id ?>" class="link-underline-primary"><?= $comment->post_title ?></a></td>
                    <td>
                        <a href="/my-first-php-blog/admin/comments/validate/<?= $comment->id ?>" class="btn btn-success">Valider</a>
                        <form action="/my-first-php-blog/admin/comments/delete/<?= $comment->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer ce commentaire ?');">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
    </tbody>
    </table>
<?php endif ?>