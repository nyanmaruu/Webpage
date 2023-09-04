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

    function userOrdersAdmin()
    {
        $output = '';
        $order = $this->querys->getOrderDatas();

        foreach ($order as $row) {

            $output .=
                '
               <tr>
                    <td>
                        <span class="custom-checkbox">
                            
                        </span>
                    </td>

                    <td>' . $row["name"] . '</td>
                    <td>' . $row["email"] . '</td>
                    <td>' . $row["address"] . '</td>
                    <td>' . $row["total_ordered_price"] . ' $</td>

                    <td>
                        <a onclick="deleteOrder(' . $row["id"] . ')"  class="delete" data-toggle="modal"><i
                                class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
            ';
        }
        echo $output;
    }
}
