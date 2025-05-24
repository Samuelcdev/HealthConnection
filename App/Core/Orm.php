<?php

class Orm
{
    protected $id;
    protected $table;
    protected $database;

    public function __construct($id, $table, $database)
    {
        $this->id = $id;
        $this->table = $table;
        $this->database = $database;
    }

    public function getAll()
    {

        $sql = "SELECT * FROM $this->table";

        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    public function getById($id)
    {

        $sql = "SELECT * FROM $this->table WHERE $this->id = :id";

        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;

    }

    public function updateById($id, $data)
    {

        $sql = "UPDATE $this->table SET";

        foreach ($data as $key => $value) {
            $sql .= "$key = :$key, ";
        }

        $sql = trim($sql, ",");
        $sql .= " WHERE $this->id = :id";
        $stmt = $this->database->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(":id", $id);
        $stmt->execute();

    }

    public function deleteById($id)
    {

        $sql = "DELETE FROM $this->table WHERE $this->id = :id";

        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function insert($data)
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $this->table ($columns) VALUES ($placeholders)";
        $stmt = $this->database->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        return $stmt->execute();
    }
}