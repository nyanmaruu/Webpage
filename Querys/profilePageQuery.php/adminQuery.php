<?php
require __DIR__ . '/../../Classes/Connection/Connection.php';
session_start();

class ProfilePageDataAdmin extends Dbh
{

    protected function getUsers()
    {

        if ($_SESSION["type_id"] == 1) {
            $stmt = $this->connect()->prepare('SELECT user_name,id FROM users');
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function getOrdersAdmin($name)
    {

        $stmt = $this->connect()->prepare('SELECT a.product_id, a.user_id, u.user_name, b.name, a.total_price, a.quantity, a.created_at
        FROM product_orders a
        INNER JOIN products b ON a.product_id = b.id
        INNER JOIN users u ON a.user_id = u.id
        WHERE u.user_name = :name');
        $stmt->bindValue(':name', $name);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
