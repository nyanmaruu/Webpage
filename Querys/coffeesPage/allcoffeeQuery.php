<?php
require __DIR__ . '/../../Classes/Connection/Connection.php';

class AllProducts extends Dbh
{
    protected function getAllData()
    {

        $stmt = $this->connect()->prepare('SELECT * FROM products');

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    protected function getOneProduct($id)
    {

        $stmt = $this->connect()->prepare('SELECT * FROM products Where id = ?');

        if (!$stmt->execute(array($id))) {

            $stmt = null;
            header("location: http://localhost/webpage/?oldal=allCoffee&productId=1&error=stmtFailed");
            exit();
        } else {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
