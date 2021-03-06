<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Admin_Edit']))
{
    $request = new items($_POST['Item_ID'],$_POST['Item_Name'],$_POST['Item_Description'],$_POST['Price']);
    $success = $db->Admin_Edit($request);
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

    <body>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:340px;margin-right:40px">

            <!-- Header -->
            <div class="w3-container" style="margin-top:80px" id="showcase">
                <h1 class="w3-jumbo"><b>Admin Edit Item</b></h1>


            </div>

            <div class="w3-container" style="margin-top:80px" id="showcase">
                <h1 class="w3-xxxlarge w3-text-red"><b>Edit Item Below</b></h1>
                <hr style="width:50px;border:5px solid red" class="w3-round">
                <p>Enter the details of the item you want to edit down below </p>
            </div>

            <!-- Form For The User to order Their Item -->
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-row" >

                    <div class="form-group col-md-6">
                        <label for="Item_ID">Item ID</label>
                        <input name = "Item_ID" type="text" class="form-control" id="Item_ID" placeholder="Item Name" maxlength = "10">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="Table_Number">Item Name</label>
                        <input name = "Item_Name" type="text" class="form-control" id="Table_Name" placeholder="Item Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Item Description</label>
                        <input name = "Item_Description" type="text" class="form-control" id="Order_Description" placeholder="Description Of the Product">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Price</label>
                        <input name = "Price" type="number" min="0" max="999" step=".01" class="form-control" id="Price">
                    </div>
                </div>
                <button name = "Admin_Edit" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom"> Add Item</button>
            </form>
            <?php
            $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><div class=\"card border-success mb-3\">
                    <div class=\"card-header bg-success text-white\"> Your Order has been made Sucessfully</div></div></div></div>";
           if ($success > 0) {
                echo $resultString;

            }
            ?>



        </div>
    </body>



<?php
include_once 'footer.php';
?>

