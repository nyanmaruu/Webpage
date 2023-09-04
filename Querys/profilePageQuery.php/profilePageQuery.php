<?php
require __DIR__ . '/../../Classes/Connection/Connection.php';

class ProfilePageData extends Dbh
{



    protected function getUserData()
    {

        if (!empty($_SESSION["userid"])) {
            $stmt = $this->connect()->prepare('SELECT * FROM users_address where user_id = :userId');
            $stmt->bindValue(':userId', $_SESSION["userid"]);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function setAddressData($userId, $name, $email, $city, $address, $zipcode, $country)
    {
        if (!empty($userId)) {
            $stmt = $this->connect()->prepare('SELECT user_id FROM users_address WHERE user_id = :userId ; ');
            $stmt->bindValue(':userId', $userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $_SESSION["address_id"] = $result[0]["user_id"];
        }



        if (!empty($_SESSION["userid"]) && $stmt->rowCount() == 0) {

            $stmt = $this->connect()->prepare('INSERT INTO users_address (user_id, name, email, address, city, zip_code, country) VALUES (:userId,:name,:email,:address,:city,:zip_code,:country);');
            $stmt->bindValue(':userId', $_SESSION["userid"]);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':address', $address);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':zip_code', $zipcode);
            $stmt->bindValue(':country', $country);
            $stmt->execute();
        } else if (!empty($_SESSION["userid"]) && $stmt->rowCount() > 0) {

            $stmt = $this->connect()->prepare('UPDATE users_address SET name = :name, email = :email, address = :address, city = :city, zip_code = :zip_code, country = :country where user_id = :userId');
            $stmt->bindValue(':userId', $_SESSION["userid"]);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':address', $address);
            $stmt->bindValue(':city', $city);
            $stmt->bindValue(':zip_code', $zipcode);
            $stmt->bindValue(':country', $country);
            $stmt->execute();
        } else {
            header("location: http://localhost/webpage/?oldal=login&error=youAreNotLoggedIn");
            exit();
        }
    }

    protected function getOrders()
    {

        if (!empty($_SESSION["userid"])) {
            $stmt = $this->connect()->prepare('SELECT product_id,user_id,name,total_price,quantity,a.created_at
            FROM product_orders a
            INNER JOIN products b
            ON a.product_id = b.id
            WHERE a.user_id = :userId');
            $stmt->bindValue(':userId', $_SESSION["userid"]);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    function getOrderDatas()
    {
        $stmt = $this->connect()->prepare('SELECT
        o.id,
        ua.name,
        ua.email,
        ua.address,
        SUM(po.total_price) AS total_ordered_price,
        CAST(o.created_at AS DATE) AS createdAtDate,
        GROUP_CONCAT(CONCAT(p.name, " (", po.quantity, ")")) AS ordered_products
    FROM
        users_address ua
    INNER JOIN
        orders o ON o.user_id = ua.user_id
    INNER JOIN
        product_orders po ON po.order_id = o.id
    INNER JOIN
        products p ON p.id = po.product_id
    WHERE
        ua.user_id = :userId
    GROUP BY
        o.id,
        ua.name,
        ua.email,
        ua.address,
        createdAtDate
    ORDER BY
        createdAtDate ASC, o.id ASC;
    ');
        $stmt->bindValue(':userId', $_SESSION["userid"]);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
