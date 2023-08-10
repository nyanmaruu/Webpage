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
            $stmt->execute(); // nem szar ha van.
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

            $stmt = $this->connect()->prepare('UPDATE users_address SET name= :name, email = :email, address = :address, city = :city, zip_code = :zip_code, country = :country where user_id = :userId');
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

    // protected function getOrders()
    // {
    //     $_SESSION["userid"] = $_SESSION["userid"];

    //     if (!empty($_SESSION["userid"])) {
    //         $stmt = $this->connect()->prepare('SELECT * FROM product_orders where user_id = :userId');
    //         $stmt->bindValue(':userId', $_SESSION["userid"]);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }
    // }   
}
