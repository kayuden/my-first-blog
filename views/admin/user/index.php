<h1 class="mb-4">Administration des utilisateurs</h1>

<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">E-mail</th>
        <th scope="col">Rôle</th>
        </tr>
    </thead>
    <tbody>
            <?php foreach($params['users'] as $user): ?>
                <tr>
                    <th scope="row"><?= $user->id ?></th>
                    <td><?= $user->username ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <form action="/my-first-php-blog/admin/users/changerole/<?= $user->id ?>" method="POST">
                            <select class="form-select" aria-label="role select" name="is_admin" <?= $user->id === $_SESSION['user_id'] ? 'disabled' : '' ?> onchange="this.form.submit()"> <!-- soumission du formulaire dès qu'une nouvelle option est sélectionnée -->
                                <option value="1" <?= $user->is_admin === 1 ? 'selected' : '' ?>>Administrateur</option>
                                <option value="0" <?= $user->is_admin === 0 ? 'selected' : '' ?>>Utilisateur</option>
                            </select>
                        </form>
                    </td>

                </tr>
            <?php endforeach ?>
    </tbody>
</table>