<?php

function connect(): PDO
{
    $pdo = new PDO("pgsql:host='localhost';dbname='blog';user='postgres';password='postgres'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    echo "Conexão bem-sucedida!";
    return $pdo;
}

function create(string $table, array $fields): bool
{
    if (!is_array($fields)) {
        $fields = (array)$fields;
    }

    $sql = "insert into {$table}";
    $sql .= "(" . implode(',', array_keys($fields)) . ")";
    $sql .= "values(:". implode(',:', array_keys($fields)) .")";

    $pdo = connect();
    $insert = $pdo->prepare($sql);

    return $insert->execute($fields);
}

function all(string $table)
{
    $pdo = connect();

    $sql = "select * from {$table}";
    $list = $pdo->query($sql);
    $list->execute();

    return $list->fetchAll();
}

function update() {}

function find(string $table, string $field, string $value)
{
    $pdo = connect();
    $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
    $sql = "select * from {$table} where {$field} = :{$field}";

    $find = $pdo->prepare($sql);
    $find->bindValue($field, $value);
    $find->execute();

    return $find->fetch();
}

function delete() {}