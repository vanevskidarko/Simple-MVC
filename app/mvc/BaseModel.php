<?php

namespace mvc;

use PDO;
use PDOException;

class BaseModel
{
    protected $db;

    public function __construct()
    {
        // load db config from file
        $config = require_once __DIR__ . '../../../config/config.php';

        // connect to db with try catch

        try {
            $this->db = new PDO(
                "mysql:host={$config['database']['host']};dbname={$config['database']['name']}",
                $config['database']['user'],
                $config['database']['password']
            );
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // add common methods for CRUD operations, query execution, etc.

    public function execute($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, $params = [])
    {
        $stmt = $this->execute($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data)
    {
        $keys = array_keys($data);
        $values = array_values($data);

        $sql = "INSERT INTO {$table} (" . implode(',', $keys) . ") VALUES (" . implode(',', array_fill(0, count($values), '?')) . ")";

        $this->execute($sql, $values);
    }

    public function update($table, $data, $where)
    {
        $keys = array_keys($data);
        $values = array_values($data);

        $sql = "UPDATE {$table} SET ";

        foreach ($keys as $key) {
            $sql .= "{$key} = ?,";
        }

        $sql = rtrim($sql, ',');
        $sql .= " WHERE {$where}";

        $this->execute($sql, $values);
    }

    public function delete($table, $where)
    {
        $sql = "DELETE FROM {$table} WHERE {$where}";
        $this->execute($sql);
    }
}
