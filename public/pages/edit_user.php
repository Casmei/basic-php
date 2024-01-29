<h1>Edit User</h1>

<?php
    $user = find('users', 'id', $_GET['id']);
?>

<div class="my-4">
    <?= get('message') ?>
</div>

<form action="/pages/forms/update_user.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input
            type="text"
            name="name"
            value="<?=$user->name;?>"
            id="create-user-name"
            class="form-control"
            placeholder="Jon"
        />
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Last Name</label>
        <input
            type="text"
            name="lastname"
            value="<?=$user->lastname;?>"
            id="create-user-lastname"
            class="form-control"
            placeholder="Doe"
        />
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
            type="text"
            name="email"
            value="<?=$user->email;?>"
            id="create-user-email"
            class="form-control"
            placeholder="jon@doe.com"
        />
    </div>

    <input type="hidden" name="id" value="<?=$user->id;?>">

    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
