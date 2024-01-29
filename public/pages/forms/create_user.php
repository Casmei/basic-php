<?php

require "../../../bootstrap.php";

$data = validate([
    'name' => 'required|string',
    'lastname' => 'required|string',
    'email' => 'required|string|email',
    'password' => 'required|string',
], "create_user");

$register = create('users', $data);

if ($register) {
    flash('message', 'Success user created!', 'success');
    return redirect('create_user');
}