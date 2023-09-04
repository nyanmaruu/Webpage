<?php
require __DIR__ . '/../../Classes/Connection/Connection.php';

class ProfilePageDataAdmin extends Dbh
{

    protected function getUsers()
    {


        $stmt = $this->connect()->prepare('SELECT user_name,id FROM users');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    protected function deleteOrder($orderId)
    {


        $stmt = $this->connect()->prepare('DELETE FROM `product_orders` WHERE order_id = :orderId');
        $stmt->bindValue(':orderId', $orderId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getOrderDatas()
    {

        $stmt = $this->connect()->prepare('SELECT
        b.id,a.name,a.email,a.address,SUM(c.total_price) AS total_ordered_price,b.created_at FROM
        users_address a INNER JOIN orders b ON b.user_id = a.user_id INNER JOIN
        product_orders c ON c.order_id = b.id GROUP BY a.name,a.email,a.address,b.created_at ORDER BY b.created_at ASC;');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
