<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Customers_Make_Order']))//Sends User Input to Function That takes the data and puts in database
{
    $request = new AllOrders($_POST['Order_ID'], $_POST['Table_Number'], $_POST['First_Name'], $_POST['Order_Description'], $_POST['Order_Date'],$_POST['Item'],$_POST['Quantity'] );
    $success = $db->Customers_Make_Order($request);
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
        <h1 class="w3-jumbo"><b>Order Page</b></h1>
    </div>

    <!-- 2nd Header and description -->
    <div class="w3-container" id="designers" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-red"><b>Please Place your order</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Add the items you want to order then enter your name and send the order</p>
        <p>We are l</p>
    </div>

    <!-- Form For The User to order Their Item -->
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="Order_ID">ID Number</label>
                <input name = "Order_ID" type="text" class="form-control" id="Order_ID" maxlength="10" placeholder="Order ID">
            </div>
            <div class="form-group col-md-6">
                <label id = "Order_Date" for="Table_Number">Date</label>
                <input name = "Order_Date" type="date" class="form-control" id="Order_Date"  >
            </div>
        </div>
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="First_Name">First Name</label>
                <input name = "First_Name" type="text" class="form-control" id="First_Name" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="Table_Number">Table Number</label>
                <input name = "Table_Number" type="number" class="form-control" id="Table_Number" placeholder="Check the Sign on your table" maxlength="3">
            </div>
        </div>
        <div class="form-row">
            <!--     <div class="form-group col-md-4">
                <label for="inputState">Item</label>
                <select id="Item" class="form-control" name = "Item">
                    <option selected>Choose...</option>

                    <?php
                    $Item_Row = "";

                    $db = new DbContext();
                    $View_Items = $db->View_items();

                    if($View_Items)
                    {
                        foreach ($View_Items as $items)
                        {
                            $Item_Row .= "<option value=".$items->Item_ID(). ">" .$items->Item_Name(). "</option>";
                        }
                    }
                    echo $Item_Row;

                    ?>


                    <option>...</option>
                </select>
            </div> -->
            <div class="form-group col-md-2">
                <label for="Item">Item</label>
                <input name = "Item" type="number" class="form-control" id="Item" maxlength="10" placeholder="Item ID">
            </div>

            <div class="form-group col-md-2">
                <label for="Quantity">Quantity</label>
                <input name = "Quantity" type="number" class="form-control" id="Quantity" maxlength="2" placeholder="How Much?">
            </div>

            <div class="form-group col-md-6">
                <label for="inputCity">Order Description</label>
                <input name = "Order_Description" type="text" class="form-control" id="Order_Description" placeholder="Anything we like to know?">
            </div>
        </div>
        <button name = "Customers_Make_Order" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom"> Make Order</button>
    </form>

    <div class="w3-container" style="margin-top:80px" id="buttons">

            <button class="button button1" onclick="window.location.href = 'Admin_Add.php'">Add Order</button>


            <button class="button button2" onclick="window.location.href = 'Admin_Edit.php'">Edit Item</button>


            <button class="button button3" onclick="window.location.href = 'Admin_Delete.php'">Delete Item</button>

    </div>


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
    <?php
    //Tells user if the data got pushed to database or not
    $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><div class=\"card border-success mb-3\">
                    <div class=\"card-header bg-success text-white\"> Your Order has been made Sucessfully</div></div></div></div>";
    if ($success > 0) {
        echo $resultString;
    }
    ?>










<?php
include_once 'footer.php';
?>


