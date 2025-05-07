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

        $sql = "INSERT INTO $this->table (";

        foreach ($data as $key => $value) {
            $sql .= ":$key";
        }

        $sql = trim($sql, ",");
        $sql .= ") VALUES (";

        foreach ($data as $key => $value) {
            $sql .= ":$key, ";
        }

        $sql = trim($sql, ",");
        $sql .= ")";
        $stmt = $this->database->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->execute();

    }

    public function paginate($page, $limit)
    {
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM  $this->table LIMIT $offset";

        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return [
            "data" => $data,
        ];
    }
}