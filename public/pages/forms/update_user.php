<?php

require "../../../bootstrap.php";

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

$data = validate([
    'name' => 'required|string',
    'lastname' => 'required|string',
    'email' => 'required|string|email',
], "/edit_user&id={$id}");

$updated = update('users', $data, ['id', $id]);

if ($updated) {
    return redirect("/home");
}