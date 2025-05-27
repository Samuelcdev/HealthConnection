<?php

class Orm
{
    protected $numberDocument;
    protected $table;
    protected $database;

    public function __construct($numberDocument, $table, $database)
    {
        $this->numberDocument = $numberDocument;
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

    public function getById($numberDocument)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->numberDocument = :numberDocument";

        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":numberDocument", $numberDocument);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateById($numberDocument, $data)
    {
        $sql = "UPDATE $this->table SET ";

        foreach ($data as $key => $value) {
            $sql .= "$key = :$key, ";
        }

        $sql = rtrim($sql, ", ");
        $sql .= " WHERE userDocument = :numberDocument";
        $stmt = $this->database->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        $stmt->bindValue(":numberDocument", $numberDocument);
        $stmt->execute();
    }

    public function deleteById($numberDocument)
    {
        $sql = "DELETE FROM $this->table WHERE $this->numberDocument = :numberDocument";

        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(":numberDocument", $numberDocument);
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