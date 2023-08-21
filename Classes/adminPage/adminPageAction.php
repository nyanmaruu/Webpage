<?php
require __DIR__ . '/../../Querys/profilePageQuery.php/adminQuery.php';


class AdminProfile extends ProfilePageDataAdmin
{
    public $querys;

    public function __construct()
    {
        $this->querys = new ProfilePageDataAdmin;
    }
    function deleteOrderData($orderId)
    {
        $this->querys->deleteOrder($orderId);
    }

    function userOrdersAdmin($dateFrom, $dateTo, $userId)
    {
        $output = '';
        $dateUserOrders =  $this->querys->getOrderDatas($dateFrom, $dateTo, $userId);


        if (!empty($dateUserOrders)) {
            $output .=  '
            <table > 
            <tr>
                <th>Name</th>
                <th>Qty</th>
                <th>Total Price</th>
                <th>Ordered At</th>
            </tr>
            ';

            foreach ($dateUserOrders as $row) {
                $output .=

                    '
                        <tr>
                        <td>' . $row["name"] . '</td>
                        <td>' . $row["quantity"] . '</td>
                        <td>' . $row["total_price"] . '$</td>
                        <td>' . $row["created_at"] . '</td>
                        <td>
                <button class="btn btn-sm" onClick="deleteOrder(' . $row["id"] . ')">Delete</button>
            </td>
                        </tr>
    
                ';
            }


            $output .=  '
        </table>
        ';
        } else {
            $output .=  '
        <tr>
<td>There is no order at this time!</td>

</tr>

        ';
        }

        return $output;
    }


    function usersData()
    {
        $output = '';
        $dataUsers =  $this->querys->getUsers();

        foreach ($dataUsers as $row) {
            $output .=

                '
                  <option value="' . $row['id'] . '">' . $row['user_name'] . '</option>
        ';
        }

        return $output;
    }
}
