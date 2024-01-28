<?php

function load(): string
{
    $page = htmlspecialchars($_GET['page']);

    $page = (!$page) ? 'pages/home.php' : "pages/{$page}.php";

    if (!file_exists($page)) {
        throw new \Exception('Opa, alguma coisa errada aconteceu');
    }

    return $page;
}