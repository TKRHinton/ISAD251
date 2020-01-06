<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Customers_Order']))
{
    $request = new AllOrders($_POST['Order_ID']);
    $success = $db->Customers_Order($request);
}

if(isset($_POST['Order_ID']))
{
    echo finduser($_POST['Order_ID']);

}
?>
<!DOCTYPE html>
<html lang="en">
<title>The Red Sea Bar</title>
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
        <h1 class="w3-jumbo"><b>check orders</b></h1>


    </div>

    <!-- Asks use for Order ID -->
    <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-red"><b>Orders</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Please Enter you Order ID to see orders</p>
        <form <?php echo $_SERVER['PHP_SELF']; ?>>
            <div class="w3-section">
                <label>Order ID</label>
                <input class="w3-input w3-border" type="text" name="OrderID">
            </div>

            <button name = "CheckOrder" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Confirm</button>
        </form>
    </div>


    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-xxxlarge w3-text-red"><b>Your orders</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Here are your orders </p>
    </div>

    <!-- Table that displays the Items that are in the database -->
    <div class="w3-container">
        <h2>All Your Current Orders</h2>
        <p>All Orders that you made</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Table_Number</th>
                <th>First_Name</th>
                <th>Order_Date</th>
                <th>Items Name</th>
                <th>Quanitity</th>
                <th>Order Description</th>
            </tr>
            </thead>
            <tbody>

            <?php
            function finduser($user)
            {
            $Order_Row = "";

            $db = new DbContext();
            $Orders = $db->Customers_Order($user);

            if($Orders)
            {
                foreach ($Orders as $item)
                {
                    $Order_Row .= "<tr><td>" . $item->Order_ID() . "</td>" . "<td>" . $item->Table_Number() . "</td>" ."<td>" . $item->First_Name() .
                        "</td>" ."<td>" . $item->Order_Date() . "</td>"."<td>" . $item->Items_ID_Items() . "</td>"."<td>" . $item->Quantity() . "</td>"
                        ."<td>" . $item->Order_Description() . "</td></tr>";
                }
            }
            echo $user;
            echo $Order_Row;

            }
            ?>


            </tbody>
        </table>
    </div>



</div>
</body>



    <?php
    include_once 'footer.php';
    ?>
