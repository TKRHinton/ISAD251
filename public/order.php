<?php
include_once 'nav_bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>The Red Sea Bar</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
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


    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="First_Name">First Name</label>
                <input type="text" class="form-control" id="First_Name" placeholder="First Name">
            </div>
            <div class="form-group col-md-6">
                <label for="Table_Number">Table Number</label>
                <input type="number" class="form-control" id="Table_Number" placeholder="Check the Sign on your table">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">Item</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Quantity</label>
                <input type="text" class="form-control" id="How Many">
            </div>

            <div class="form-group col-md-6">
                <label for="inputCity">Order Description</label>
                <input type="text" class="form-control" id="Order_Description" placeholder="Anything we like to know?">
            </div>
        </div>
        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div>
        <button type="submit" class="w3-button w3-block w3-padding-large w3-red w3-margin-bottom"> Make Order</button>
    </form>











<?php
include_once 'footer.php';
?>


