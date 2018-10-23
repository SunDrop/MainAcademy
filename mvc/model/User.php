<?php

namespace Model;

class User
{
    private $pdo;
    public $id;
    public $name;
    public $salary;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $params = ['id' => $id];
        $stmt->execute($params);
        $data = $stmt->fetch();
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->salary = $data['salary'];
    }

    public function getAllIds()
    {
        $sql = "SELECT id FROM user";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $ret = [];
        foreach ($data as $item) {
            $ret[] = $item['id'];
        }
        return $ret;
    }

    public function asArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'salary' => $this->salary,
        ];
    }

    public function findByName($name)
    {

    }
}