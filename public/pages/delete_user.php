<?php

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$deleted = deleteDb('users', 'id', $id);

if ($deleted) {
    return redirect("home");
}