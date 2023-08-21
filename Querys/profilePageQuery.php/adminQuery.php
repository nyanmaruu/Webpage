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


        $stmt = $this->connect()->prepare('DELETE FROM `product_orders` WHERE id = :orderId');
        $stmt->bindValue(':orderId', $orderId);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getOrderDatas($dateFrom, $dateTo, $userId)
    {

        $stmt = $this->connect()->prepare('SELECT a.id,product_id,user_id,name,total_price,quantity,a.created_at
        FROM product_orders a
        INNER JOIN products b
        ON a.product_id = b.id
        WHERE a.created_at BETWEEN :dateFrom  and :dateTo AND user_id = :userId');
        $stmt->bindValue(':userId', $userId);
        $stmt->bindValue(':dateFrom', $dateFrom);
        $stmt->bindValue(':dateTo', $dateTo);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $resultCheck = false;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }

        if (!$resultCheck) {
            return $result;
        }
    }
}
