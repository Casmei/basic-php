<?php

require "../../../bootstrap.php";

$data = validate([
    'name' => 'required|string',
    'email' => 'required|email',
    'subject' => 'required|string',
    'message' => 'required|string',
]);

if (send($data)) {
    flash('message', 'Email enviado com sucesso!', 'success');
    redirect('contact');
}

