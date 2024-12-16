
<h1><?= $params['post']->title ?? 'Créer un nouvel article' ?></h1>

<form action="<?= isset($params['post']) ? "/my-first-blog/admin/posts/edit/{$params['post']->id}" : "/my-first-blog/admin/posts/create" ?>" method="POST">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= $params['post']->title ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="chapo">Chapo de l'article</label>
        <input type="text" class="form-control" name="chapo" id="chapo" value="<?= $params['post']->chapo ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="content">Contenu de l'article</label>
        <textarea name="content" id="content" rows="8" class="form-control"><?= $params['post']->content ?? '' ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary"><?= isset($params['post']) ? 'Enregistrer les modifications' : 'Enregistrer' ?></button>
    <a href="/my-first-blog/admin/posts" class="btn btn-light">Annuler</a>
</form>