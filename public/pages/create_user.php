<h1>Create User</h1>

<div class="my-4">
    <?= get('message') ?>
</div>

<form action="/pages/forms/create_user.php" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input
            type="text"
            name="name"
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
            id="create-user-email"
            class="form-control"
            placeholder="jon@doe.com"
        />
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input
            type="password"
            name="password"
            id="create-user-password"
            class="form-control"
            placeholder="*******"
        />
    </div>

    <div class="d-grid gap-2">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
