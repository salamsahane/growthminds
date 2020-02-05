<?php

namespace App\Models;

use App\Core\Model;
use Exception;

class QueryBuilder extends Model
{

    private $table;

    private $order = [];

    private $limit;

    private $offset;

    private $where;

    private $fields = ["*"];

    private $params = [];

    //Insert variables
    private $prams;

    private $InsertFields;

    private $value;

    //Update Variables
    private $set;


    public function from(string $table, ?string $alias = null): self
    {
        $this->table = $alias === null ? $table : "$table $alias";
        return $this;
    }

    public function where(string $condition): self
    {
        $this->where = $condition;
        return $this;
    }

    public function setParam(?string $key,  $value): self
    {
        if(is_null($key)){
            $this->params[] = $value;
        }else{
            $this->params[$key] = $value;
        }

        return $this;
    }

    public function select(...$fields): self
    {
        if(is_array($fields[0])){
            $fields = $fields[0];
        }
        if($this->fields === ['*']){
            $this->fields = $fields;
        }else{
            $this->fields = array_merge($this->fields, $fields);
        }
        return $this;
    }

    public function orderBy(string $key, string $direction): self
    {
        $direction = strtoupper($direction);
        if(!in_array($direction, ['ASC', 'DESC'])){
            $this->order = $key;
        }else{
            $this->order[] = "$key $direction";
        }
        return $this;
    }

    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function page(int $page): self
    {
        return $this->offset($this->limit * ($page - 1));
    }

    public function toSQL(): string
    {
        $fields = implode(', ', $this->fields);
        $sql = "SELECT $fields FROM {$this->table}";
        if($this->where){
            $sql .= " WHERE " . $this->where;
        }
        if(!empty($this->order)){
            $sql .= " ORDER BY " . implode(', ', $this->order);
        }
        if($this->limit > 0){
            $sql .= " LIMIT " . $this->limit;
        }
        if(!is_null($this->offset)){
            $sql .= " OFFSET " . $this->offset;  
        }
        return $sql;
    }

    public function fetch(string $field): ?string
    {
        $query = Model::getDB()->prepare($this->toSQL());
        $query->execute($this->params);
        $result = $query->fetch();
        if($result === false){
            return null;
        }
        return $result[$field] ?? null;
    }

    public function fetchAll(): ?array
    {
        $query = Model::getDB()->prepare($this->toSQL());
        $query->execute($this->params);
        return $query->fetchAll() ?? null;
    }

    public function fetchObj(?String $class = null)
    {
        try{
            $query = Model::getDB()->prepare($this->toSQL());
            $query->execute($this->params);
            if($class == null){
                $result = $query->fetch(\PDO::FETCH_OBJ);
            }else{
                $result = $query->fetchObject($class);
            }
            return $result;
        }catch(Exception $e){
            die("Error: " . $this->toSQL . $e->getMessage());
        }
    }

    public function count($field): int
    {
        return (int)(clone $this)->select("COUNT({$field}) count")->fetch('count');
    }

    //Insert QueryBuilder

    public function insertInTo($table): self
    {
        $this->table = $table;
        return $this;
    }

    public function fields(array $fields): self
    {
        $this->InsertFields = implode(',', $fields);
        return $this;
    }

    public function values(string $values): self
    {
        $this->values = $values;
        return $this;
    }

    public function params(array $params): self
    {
        foreach($params as $param){
            $this->prams[] = $param;
        }
        return $this;
    }

    public function toSQLInsert(): string
    {
        $sql = "INSERT INTO {$this->table}(" . $this->InsertFields . ") VALUES(" . $this->values . ")";
        return $sql;
    }

    public function insert(): bool
    {
        try{
            $query = Model::getDB()->prepare($this->toSQLInsert());
            $execute = $query->execute($this->prams);
            return $execute;
        }catch(Exception $e){
            die($this->toSQLInsert() . ' : ' . $e->getMessage());
        }
    }

    //Update QueryBulder

    public function update(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function set(string $condition): self
    {
        $this->set = $condition;
        return $this;
    }

    public function toSQLUpdate(): string{
        $sql = "UPDATE $this->table SET " . $this->set;
        if($this->where){
            $sql .= " WHERE " . $this->where;
        }
        return $sql;
    }

    public function updateTable(): bool
    {
        try{
            $query = Model::getDB()->prepare($this->toSQLUpdate());
            $execute = $query->execute($this->params);
            return $execute;
        }catch(Exception $e){
            die("error:" . $this->toSQLUpdate() . " - " . $e->getMessage());
        }
    }

    //Delete QueryBuilder
    public function delete(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function toSQLDelete(): string
    {
        $sql = "DELETE FROM $this->table";
        if($this->where){
            $sql .= " WHERE " . $this->where;
        }
        return $sql;
    }

    public function deleteRecord(): bool
    {
        $query = Model::getDB()->prepare($this->toSQLDelete());
        $execute = $query->execute($this->params);
        return $execute;
    }

}