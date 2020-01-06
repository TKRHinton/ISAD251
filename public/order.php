<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Customers_Make_Order']))
{
    $request = new request($_POST['Order_ID'], $_POST['Table_Number'], $_POST['First_Name'], $_POST['Quantity'], $_POST['Order_Description'], $_POST['Item']);
    $success = $db->Customers_Make_Order($request);
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
        <h1 class="w3-jumbo"><b>Order Page</b></h1>
    </div>

    <!-- Header and description -->
    <div class="w3-container" id="designers" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-red"><b>Please Place your order</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Add the items you want to order then enter your name and send the order</p>
        <p>We are l</p>
    </div>

    <!-- Form For The User to order Their Item -->
    <form>
        <div class="form-row" >
            <div class="form-group col-md-6">
                <label for="First_Name">First Name</label>
                <input name = "First_Name" type="text" class="form-control" id="First_Name" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="Table_Number">Table Number</label>
                <input name = "Table_Number" type="number" class="form-control" id="Table_Number" placeholder="Check the Sign on your table">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">Item</label>
                <select id="Item" class="form-control" name = "Item">
                    <option selected>Choose...</option>

                    <?php
                    $Item_Row = "";

                    $db = new DbContext();
                    $View_Items = $db->View_items();

                    if($View_Items)
                    {
                        foreach ($View_Items as $item)
                        {
                            $optionString .= "<option value=" .$item->Item_ID().">". "</option>";
                        }
                    }
                    echo $Item_Row;

                    ?>


                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Quantity</label>
                <input name = "Quantity" type="number" class="form-control" id="How Many">
            </div>

            <div class="form-group col-md-6">
                <label for="inputCity">Order Description</label>
                <input name = "Order_Description" type="text" class="form-control" id="Order_Description" placeholder="Anything we like to know?">
            </div>
        </div>
        <button name = "Customers_Make_Order" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom"> Make Order</button>
    </form>
    <?php
    $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><dive class=\"card border-success mb-3\">
                    <div class=\"card-header bg-success text-white\"> Your Order has been made Sucessfully</div></div></div></div>";
    if ($success > 0) {
        echo $resultString;
        alert($request);
    }
    ?>










<?php
include_once 'footer.php';
?>


