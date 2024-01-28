<h1>Home</h1>
<a
    name="create-user"
    id="create-user"
    class="btn btn-primary"
    href="?page=create_user"
    role="button"
    >Cadastrar usuário</a
>


<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Lastname</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            $users = all('users');

            foreach ($users as $user):
        ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><?= $user->name ?></td>
                <td><?= $user->lastname ?></td>
                <td><?= $user->email ?></td>
                <td>
                    <a
                        href="?page=edit_user&id=<?=$user->id;?>"
                        class="btn btn-secondary"
                    >
                        Editar
                    </a>
                </td>
                <td>
                    <a
                        href="?page=edit_user&id=<?=$user->id;?>"
                        class="btn btn-danger"
                    >
                        Deletar
                    </a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>