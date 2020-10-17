<?php

namespace UNIS\Db;

abstract class Table
{
    protected $table;
    protected $db;
    public function __construct(\Pdo $db)
    {
        $this->db = $db;
    }
    public function add(array $data)
    {
        $columns = array_keys(self::prepareInsert($data));
        $values = array_values(self::prepareInsert($data));
        $query = "INSERT INTO {$this->table} (";
        $query .= implode(', ', $columns);
        $query .= ') VALUES (';
        $query .= implode(', ', $values) . ')';
        $stmt = $this->db->prepare($query);
        try {
            return $stmt->execute();
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
    public function fetchAll()
    {
        $query = "SELECT * FROM {$this->table}";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function find(int $id)
    {
    }
    public function update(array $data, int $id)
    {
    }
    public function delete(int $id)
    {
    }
    private function prepareInsert(array $data)
    {
        array_pop($data);
        array_walk($data, function (&$value) {
            $value = $this->db->quote($value);
        });
        return $data;
    }
}
