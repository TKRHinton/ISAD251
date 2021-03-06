<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Customers_Add']))
{
    $request = new order_items($_POST['Order_ID'],$_POST['Items_ID_Items'], $_POST['Quantity'] );
    $success = $db->Customers_Add($request);
}


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
        <h1 class="w3-jumbo"><b>Add orders</b></h1>


    </div>


    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-xxxlarge w3-text-red"><b>Your orders</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Here are your orders </p>
    </div>

    <!-- Form For The User to order Their Item -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="First_Name">Order_ID</label>
                <input name = "Order_ID" type="number" class="form-control" id="Order_ID" placeholder="Your Order ID number that was assigned to you">
            </div>
            <div class="form-group col-md-6">
                <label for="Table_Number">Quantity</label>
                <input name = "Quantity" type="number" class="form-control" id="Quantity" placeholder="How many do you want" maxlength="2">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Items_ID_Items">Item</label>
                <input name = "Items_ID_Items" type="number" class="form-control" id="Items_ID_Items" placeholder="Your Item ID number that was assigned to you" maxlength="10">
            </div>

        <button name = "Customers_Add" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom"> Add To Order</button>
        </div>
    </form>
    <?php
    $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><dive class=\"card border-success mb-3\">
                    <div class=\"card-header bg-success text-white\"> Your Order has been made </div></div></div></div>";
    if ($success > 0) {
        echo $resultString;

    }
    ?>

    <!-- Shows the Use a menu -->
    <div class="w3-container">
        <h2></h2>
        <h2>Item Menu</h2>
        <p>Here is the Items and ID Numbers</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Item ID</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $Item_Row = "";

            $db = new DbContext();
            $items = $db->View_items();

            if($items)
            {
                foreach ($items as $item)
                {
                    $Item_Row .= "<tr><td>" . $item->Item_ID() . "</td>" . "<td>" . $item->Item_Name() . "</td>" ."<td>" . $item->Item_Description() . "</td>" ."<td>" . $item->Price() . "</td></tr>";
                }
            }
            echo $Item_Row;

            ?>


            </tbody>
        </table>

    </div>




</div>
</body>



<?php
include_once 'footer.php';
?>

