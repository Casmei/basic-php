<?php

function connect(): PDO
{
    $pdo = new PDO("pgsql:host='localhost';dbname='blog';user='postgres';password='postgres'");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}

function create(string $table, object $fields): bool
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

function update(string $table, object $fields, array $where): int
{
    if (!is_array($fields)) {
        $fields = (array)$fields;
    }

    $pdo = connect();

    $data = array_map(function ($field) {
        return "{$field} = :{$field}";
    }, array_keys($fields));

    $sql = "update {$table} set ";
    $sql .=  implode(',', $data);
    $sql .= " where {$where[0]} = :{$where[0]}";

    $data = array_merge($fields, [$where[0] => $where[1]]);

    $update = $pdo->prepare($sql);
    $update->execute($data);

    return $update->rowCount();
}

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

function deleteDb(string $table, string $field, $value)
{
    $pdo = connect();

    $sql = "delete from {$table} where {$field} = {$value}";
    $delete = $pdo->prepare($sql);
    return $delete->execute();
}