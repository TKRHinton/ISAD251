<?php
include_once 'nav_bar.php';
include_once '../src/model/orders.php';
include_once '../src/model/order_items.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

if(!isset($db)) {
    $db = new DbContext();
}

if(isset($_POST['Customers_Delete']))
{
    $request = new orders($_POST['Order_ID'],$_POST['Table_Number'],$_POST['Order_Description'],$_POST['First_Name'],$_POST['Order_Date']);
    $success = $db->Customers_Delete($request);
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
        <h1 class="w3-jumbo"><b>Cancel orders</b></h1>


    </div>

    <!-- Form to Delete Users Order -->
    <div class="w3-container" id="contact" style="margin-top:75px">
        <h1 class="w3-xxxlarge w3-text-red"><b>Orders</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Please Enter you name to see orders</p>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="w3-section">
                <label>Order ID</label>
                <input class="w3-input w3-border" type="number" name="Order_ID" required maxlength="10">
            </div>
    </div>
    <button name = "Customers_Delete" type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom">Confirm</button>
    </form>
    <?php
    $resultString = "<div class=\"row\"><div class=\"col-sm-12\"><div class=\"card border-success mb-3\">
                    <div class=\"card-header bg-success text-white\"> Your Order has been deleted</div></div></div></div>";
    if ($success > 0) {
        echo $resultString;
     //   alert($request);
    }
    ?>





</div>
</body>



<?php
include_once 'footer.php';
?>

