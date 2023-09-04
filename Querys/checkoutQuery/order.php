<?php

class Order extends Dbh
{


    public function setOrder($userId)
    {

        $db = $this->connect();
        $stmt = $db->prepare('SELECT address_id from users_address WHERE user_id = :userid;');
        $stmt->bindValue(':userid', $userId);
        $stmt->execute();
        $id = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $address_id = $id[0]["address_id"];

        if (!empty($userId)) {


            $stmt = $db->prepare('INSERT INTO orders (user_id, address_id) VALUES (:userid, :address_id);');
            $stmt->bindValue(':userid', $userId);
            $stmt->bindValue(':address_id', $address_id);


            if (!$stmt->execute()) {

                $stmt = null;
                header("location: http://localhost/webpage/?oldal=login&error=stmtFailed");
                exit();
            }



            $orderId = $db->lastInsertId();

            if ($userId) {

                foreach ($_SESSION['cart'] as $quantity) {

                    $stmt = $db->prepare('INSERT INTO product_orders (user_id, order_id, product_id, quantity, price, total_price) VALUES (:userId, :orderId, :productId, :quantity, :price, :totalPrice );');

                    $stmt->bindValue(':userId', $userId);
                    $stmt->bindValue(':orderId', $orderId);
                    $stmt->bindValue(':productId', $quantity["id"]);
                    $stmt->bindValue(':quantity', $quantity["quantity"]);
                    $stmt->bindValue(':price', $quantity["baseprice"]);
                    $stmt->bindValue(':totalPrice', ($quantity["baseprice"] * $quantity["quantity"]));
                    $stmt->execute();
                }
            }
            $stmt = null;
        } else {
            header("location: http://localhost/webpage/?oldal=login&error=youAreNotLoggedIn");
            exit();
        }
    }
}
