<?php
include_once 'nav_bar.php';
include_once '../src/model/items.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/AllOrders.php';
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <title>The Red Sea Bar</title>
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="Stylesheet" href="../assests/css/buttons.css">
<style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}

</style>

<body>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo"><b>Admin Orders</b></h1>
        <h1 class="w3-xxxlarge w3-text-red"><b>Customer Orders</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">

    </div>

    <!-- Table that displays the Items that are in the database -->
    <div class="w3-container">
        <h2>All Current Orders</h2>
        <p>All Orders that where made by customers</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Table_Number</th>
                <th>First_Name</th>

                <th>Items_ID</th>
                <th>Quanitity</th>
                <th>Order Description</th>
                <th>Order_Date</th>

            </tr>
            </thead>
            <tbody>

            <?php
            //gets all the data from orderss and order_items tables
            $Order_Row = "";

            $db = new DbContext();
            $Orders = $db->View_All_Orders();

            if($Orders)
            {
                foreach ($Orders as $item)
                {
                    $Order_Row .= "<tr><td>" . $item->Order_ID() . "</td>" . "<td>" . $item->Table_Number() . "</td>" ."<td>" . $item->First_Name() .
                        "</td>" ."<td>" . $item->Order_Date() . "</td>"."<td>" . $item->Items_ID_Items() . "</td>"."<td>" . $item->Quantity() . "</td>"
                        ."<td>" . $item->Order_Description() . "</td></tr>";
                }
            }
            echo $Order_Row;

            ?>

            </tbody>
        </table>
    </div>





    <?php
    include_once 'footer.php';
    ?>
