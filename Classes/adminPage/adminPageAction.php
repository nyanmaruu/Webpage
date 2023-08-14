<?php
require __DIR__ . '/../../Classes/ProfilePage/profilePageOrders.php';
require __DIR__ . '/../../Querys/profilePageQuery.php/adminQuery.php';


class ProfileOrdersAdmin extends ProfilePageDataAdmin
{
    public $querys;
    public $ordersData;

    public function __construct()
    {
        $this->querys = new ProfilePageDataAdmin;
        // $data = $this->querys->getOrdersAdmin();
        // if (!empty($data)) {
        //     foreach ($data as $row) {
        //         $orderData = new OrdersData($row['user_id'], $row['name'], $row['product_id'], $row['quantity'], $row['total_price'], $row['created_at']);
        //         $this->ordersData[] = $orderData;
        //     }
        // }
    }

    function usersData()
    {
        $output = '';
        $dataUsers =  $this->querys->getUsers();

        foreach ($dataUsers as $row) {
            $output .=

                '
                  <option value="' . $row['user_name'] . '">' . $row['user_name'] . '</option>
        ';
        }

        return $output;
    }


    function userOrdersAdmin()
    {
        $output = '';



        foreach ($this->ordersData as $row) {
            $output .=

                '
      <tr>
      <td>' . $row->getId() . '</td>
      <td>' . $row->getProductId() . '</td>
        <td>' . $row->getName() . '</td>
        <td>' . $row->getQty() . ' </td>
        <td>' . $row->getTotalPrice() . '$</td>
        <td>' . $row->getCreatedAt() . '</td>
        </tr>

                    ';
        }


        return $output;
    }
}
