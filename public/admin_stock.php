<?php
include_once 'nav_bar.php';
include_once '../src/model/DbContext.php';
include_once '../src/model/items.php';

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

<!-- PAGE CONTENT -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">

    <!-- Header -->
    <div class="w3-container" style="margin-top:80px" id="showcase">
        <h1 class="w3-jumbo"><b>Admin Stock</b></h1>
        <h1 class="w3-xxxlarge w3-text-red"><b>Items</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
        <p>Check items here </p>

    </div>


    <!-- Table that displays the Items that are in the database -->
    <div class="w3-container">
        <h2>Items In stock</h2>
        <p>Item Information, To edit used the buttons below or use the navagation bar</p>
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
        <div class="w3-container" style="margin-top:80px" id="showcase">
        <form action="Admin_Add.php">
            <button class="button button1">Add Item</button>
        </form>
        <form action="Admin_Edit.php">
            <button class="button button2">Edit Item</button>
        </form>
        <form action="Admin_Delete.php">
            <button class="button button3">Delete Item</button>
        </form>
        </div>

    </div>







    <?php
    include_once 'footer.php';
    ?>
