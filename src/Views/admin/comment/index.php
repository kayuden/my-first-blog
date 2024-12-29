<h1 class="text-center mb-4 mt-4">Administration des commentaires</h1>

<?php if (empty($params['comments'])): ?>
    <p class="mb-3 text-center">Aucun commentaire à valider</p>
<?php else: ?>
    <h2 class="mb-3">Commentaires à valider</h2>


<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Contenu</th>
            <th scope="col">Auteur</th>
            <th scope="col">Publié le</th>
            <th scope="col">Lien vers l'article associé</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
                <?php foreach($params['comments'] as $comment): ?>
                    <tr>
                        <th scope="row"><?= $comment->id ?></th>
                        <td><?= $comment->content ?></td>
                        <td><?= $comment->username ?></td>
                        <td><?= $comment->getCreationDate() ?></td>
                        <td><a href="/my-first-blog/posts/<?= $comment->post_id ?>" class="link-underline-primary"><?= $comment->post_title ?></a></td>
                        <td>
                            <a href="/my-first-blog/admin/comments/validate/<?= $comment->id ?>" class="btn btn-success">Valider</a>
                            <form action="/my-first-blog/admin/comments/delete/<?= $comment->id ?>" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous supprimer ce commentaire ?');">
                                <button type="submit" class="btn btn-danger">X</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php endif ?>
