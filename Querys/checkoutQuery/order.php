<?php

class Order extends Dbh
{


    public function setOrder($userId, $name, $email, $city, $address, $zipcode, $country)
    {

        if (!empty($userId)) {


            $db = $this->connect();
            $stmt = $db->prepare('INSERT INTO orders (user_id) VALUES (?);');



            if (!$stmt->execute(array($userId))) {

                $stmt = null;
                header("location: http://localhost/webpage/?oldal=login&error=stmtFailed");
                exit();
            }



            // $stmt = null;
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

                $stmt = $db->prepare('INSERT INTO orders_address (user_id, name, email, address, city, zip_code, country) VALUES (:userId,:name,:email,:address,:city,:zip_code,:country);');
                $stmt->bindValue(':userId', $userId);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':address', $address);
                $stmt->bindValue(':city', $city);
                $stmt->bindValue(':zip_code', $zipcode);
                $stmt->bindValue(':country', $country);
                $stmt->execute();
            }
            $stmt = null;
        } else {
            header("location: http://localhost/webpage/?oldal=login&error=youAreNotLoggedIn");
            exit();
        }
    }
}

// user_addres tábla id, user_id , alap adress