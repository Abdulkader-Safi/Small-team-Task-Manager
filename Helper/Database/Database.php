<?php

class Database
{
    public $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host=localhost;dbname=task_manager", "abdulkader", "Safi@2020");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "PDO error" . $e->getMessage();
            die();
        }
    }

    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);

        $statement->execute($params);

        return $statement;
    }
}
