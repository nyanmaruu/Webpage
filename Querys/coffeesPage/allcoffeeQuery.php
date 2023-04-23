<?php
require __DIR__ . '/../../Classes/Connection/Connection.php';

class Querys extends Dbh
{
    protected function getAllData()
    {

        $stmt = $this->connect()->prepare('SELECT * FROM products');

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
