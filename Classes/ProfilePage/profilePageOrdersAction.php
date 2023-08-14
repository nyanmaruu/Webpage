<?php
require __DIR__ . '/../../Classes/ProfilePage/profilePageOrders.php';


class ProfileOrders extends ProfilePageData
{
    public $querys;
    public $ordersData;


    public function __construct()
    {
        $this->querys = new ProfilePageData;
        $data = $this->querys->getOrders();
        if (!empty($data)) {
            foreach ($data as $row) {
                $orderData = new OrdersData($row['user_id'], $row['name'], $row['product_id'], $row['quantity'], $row['total_price'], $row['created_at']);
                $this->ordersData[] = $orderData;
            }
        }
    }

    function listOrders($dateFrom, $dateTo)
    {
        $output = '';
        $dateUserOrders =  $this->querys->getOrderDatas($dateFrom, $dateTo);
        if (!empty($this->ordersData)) {
            $output .=  '
            <table > 
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Total Price</th>
                <th>Ordered At</th>
            </tr>
            ';
        }
        foreach ($dateUserOrders as $row) {
            $output .=

                '
                    <tr>
                    <td>' . $row["name"] . '</td>
                    <td>' . $row["quantity"] . '</td>
                    <td>' . $row["total_price"] . '$</td>
                    <td>' . $row["created_at"] . '</td>
                    </tr>

            ';
        }

        $output .=  '
        </table>
        ';
        return $output;
    }

    function userOrders()
    {
        $output = '';

        if (!empty($this->ordersData)) {
            $output .=  '
            <table > 
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Total Price</th>
                <th>Ordered At</th>
            </tr>
            ';

            foreach ($this->ordersData as $row) {
                $output .=

                    '
  <tr>
    <td>' . $row->getName() . '</td>
    <td>' . $row->getQty() . ' </td>
    <td>' . $row->getTotalPrice() . '$</td>
    <td>' . $row->getCreatedAt() . '</td>
    </tr>
   
                ';
            }

            $output .=  '
            </table>
            <div class="d-flex justify-content-end">
            <a href="http://localhost/webpage/?oldal=profilePage" class="btn">Back</a></div>';
        }
        return $output;
    }
}
