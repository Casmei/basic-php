<?php

function connect(): PDO
{
    $pdo = new PDO("pgsql:host='localhost';dbname='blog';user='postgres';password='postgres'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    echo "Conexão bem-sucedida!";
    return $pdo;
}

function create($table, $fields): bool
{
    if (!is_array($fields)) {
        $fields = (array)$fields;
    }

    $sql = "insert into {$table}";
    $sql .= "(" . implode(',', array_keys($fields)) . ")";
    $sql .= "values(:". implode(',:', array_keys($fields)) .")";

    // dd($sql);

    $pdo = connect();
    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);
}

function update() {}

function find() {}

function delete() {}