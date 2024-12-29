<h1 class="text-center mb-4 mt-4">Administration des articles</h1>

<a href="/my-first-blog/admin/posts/create" class="btn btn-success my-3">Créer un nouvel article</a>

  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titre</th>
          <th scope="col">Auteur</th>
          <th scope="col">Publié le</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
            <?php foreach($params['posts'] as $post): ?>
                <tr>
                    <th scope="row"><?= $post->id ?></th>
                    <td><?= $post->title ?></td>
                    <td><?= $post->username ?></td>
                    <td><?= $post->getCreationDate() ?></td>
                    <td>
                        <a href="/my-first-blog/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning">Modifier</a>
                        <form action="/my-first-blog/admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline"  onsubmit="return confirm('Voulez-vous supprimer cet article ?');">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
      </tbody>
    </table>
  </div>
  