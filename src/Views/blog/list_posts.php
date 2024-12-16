<div class="container">
    <h1 class="text-center mb-4 mt-4">Les articles</h1>

    <?php foreach($params['posts'] as $post): ?>
        <div class="card mb-3">
            <div class="card-body">
                <h2 class="text-primary"><?= $post->title ?></h2>
                <p>Par <?= $post->username ?></p>
                <small class="text-secondary">Publié le <?= $post->getCreationDate() ?></small>
                <p class="font-italic mt-3"><?= $post->chapo ?></p>
                <p><?= $post->getSummary() ?></p>
                <a href="/my-first-blog/posts/<?= $post->id ?>" class="btn btn-primary">Lire plus</a>
            </div>
        </div>
    <?php endforeach ?>
</div>